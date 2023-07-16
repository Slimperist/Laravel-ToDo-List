<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class TaskController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $tasks = $user->tasks()->with('tags')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function search(Request $request)
    {
        $user = Auth::user();
        $search = $request->input('search');
        $tasks = $user->tasks()
            ->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', "%$search%")
                    ->orWhere('description', 'LIKE', "%$search%");
            })
            ->get();
        return view('tasks.search', compact('tasks', 'search'));
    }

    public function tag_filter(Request $request)
    {
        $user = Auth::user();
        $selectedTags = $request->input('tags', []);
        $tasks = $user->tasks()
            ->when(count($selectedTags) > 0, function ($query) use ($selectedTags) {
                $query->whereHas('tags', function ($tagQuery) use ($selectedTags) {
                    $tagQuery->whereIn('tags.id', $selectedTags);
                }, '=', count($selectedTags));
            })
            ->get();
        $tags = Tag::all();
        return view('tasks.tag_filter', compact('tasks', 'tags', 'selectedTags'));
    }

    public function create()
    {
        $tags = Tag::all();
        return view('tasks.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $task = new Task();
        $task->fill($validatedData);
        $task->user_id = auth()->id();
        if ($request->hasFile('image')) {
            $task->image = $this->uploadImage($request);
        }
        $task->description = $request->description;
        $task->user_id = auth()->id();
        $task->save();
        $tags = $request->input('tags', []);
        $newTag = $request->input('newTag');
        if ($newTag) {
            $tag = Tag::create([
                'name' => $newTag,
            ]);
            $tags[] = $tag->id;
        }
        $task->tags()->sync($tags);
        return response()->json(['message' => 'Запись добавлена'], 200);
    }

    public function edit(Task $task)
    {
        $tags = Tag::all();
        return view('tasks.edit', compact('task', 'tags'));
    }

    public function update(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $task->image = $this->uploadImage($request);
        } else {
            $task->image = '';
        }
        $task->update();
        $tags = $request->input('tags', []);
        $newTag = $request->input('newTag');
        if ($newTag) {
            $tag = Tag::create([
                'name' => $newTag,
            ]);
            $tags[] = $tag->id;
        }
        $task->tags()->sync($tags);
        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }

    public function uploadImage(Request $request)
    {
        // Проверяем, что загружен файл изображения
        if ($request->hasFile('image')) {
            // Получаем объект файла изображения
            $image = $request->file('image');
            // Создаем путь к папке для сохранения изображения
            $path = public_path('images/');
            // Генерируем уникальное имя для изображения
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            // Сохраняем оригинальное изображение
            $image->move($path, $filename);
            // Создаем объект Intervention Image для работы с изображением
            $img = Image::make($path . $filename);
            // Создаем квадратное превью 150x150px
            $img->fit(150, 150)->save($path . 'thumbnails/' . $filename);
            // Возвращаем путь к оригинальному изображению и к превью
            return $filename;;
        }
    }
}
