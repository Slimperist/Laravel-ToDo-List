@extends('layouts.app')

@section('content')
    <div class="col-sm-12 col-12">
        <h3>Редактировать задачу</h3>
    </div>
    <form method="POST" action="{{ route('tasks.update', $task) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Заголовок:</label>
            <input class="form-control" type="text" id="title" name="title" value="{{ $task->title }}" required autofocus>
        </div>
        <div>
            <label for="description">Описание:</label>
            <textarea class="form-control" id="description" name="description" required>{{ $task->description }}</textarea>
        </div>
        <div>
            <label for="image">Изображение:</label>
            <input class="form-control" type="file" id="image" name="image">
            @if ($task->image)
                <img src="{{ asset('images/thumbnails/' . $task->image) }}" alt="Изображение">
                <button id="clearImage">Удалить изображение</button>
            @endif
        </div>
        <div>
            <label for="tags">Тэги (мультивыбор ctrl):</label>
            <select class="form-control" id="tags" name="tags[]" multiple>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <button class="form-control" type="submit">Сохранить</button>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#clearImage').click(function () {
                $('#image').val('');
                $(this).prev('img').remove();
                $(this).remove();
            });
        });
    </script>
@endsection
