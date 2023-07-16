<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
class TagController extends Controller
{
    public function create()
    {
        return view('tags.create');
    }

    public function store(Request $request)
    {
        $tagName = $request->input('name');
        // Проверяем, существует ли тег с таким именем
        $existingTag = Tag::where('name', $tagName)->first();

        if ($existingTag) {
            // Если тег уже существует, возвращаем сообщение об ошибке
            return response()->json(['message' => 'Такой Тэг уже существует'], 422);
        }
        // Создаем новый тег
        $tag = new Tag();
        $tag->name = $tagName;
        $tag->save();
        // Возвращаем успешный ответ с добавленным тегом
        return response()->json(['tag' => $tag, 'message' => 'Тэг добавлен']);
    }

    public function show(Tag $tag)
    {
        return view('tags.show', compact('tag'));
    }

    public function edit(Tag $tag)
    {
        return view('tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $tag->update([
            'name' => $request->name,
        ]);
        return redirect()->route('tags.show', $tag);
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('tags.index');
    }
}
