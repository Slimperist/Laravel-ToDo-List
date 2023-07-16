@extends('layouts.app')

@section('content')
    <div class="col-sm-12 col-12">
        <h3>Фильтрация по тэгам. Можно использовать мультивыбор ctrl+</h3>
    </div>
    <!-- Форма фильтрации по тэгам -->
    <form action="{{ route('tasks.tag_filter') }}" method="GET">
        <!-- Выпадающий список тэгов -->
        <div class="form-group row">
                <select class="form-control" id="tags" name="tags[]" multiple style="height: 300px;">
                    @foreach ($tags as $tag)
                        <option class="form-control" value="{{ $tag->id }}" {{ in_array($tag->id, $selectedTags) ? 'selected' : '' }}>{{ $tag->name }}</option>
                    @endforeach
                </select>
        </div>
        <!-- Кнопка фильтрации -->
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Применить фильтр</button>
        </div>
    </form>
    @foreach ($tasks as $task)
        <div class="col-sm-4 col-12">
            <div class="card">
                @if ($task->image)
                    <a target="_blank" href="{{ asset('images/' . $task->image) }}"><img class="" src="{{ asset('images/' . $task->image) }}" alt="Card image cap" style="max-width:150px; max-height:150px"></a>
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $task->title }}</h5>
                    <p class="card-text">{{ $task->description }}</p>
                    <ul>
                        @foreach ($task->tags as $tag)
                            <li>{{ $tag->name }}</li>
                        @endforeach
                    </ul>
                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-primary">Редактировать</a>
                    <a href="{{ route('tasks.delete', $task) }}" class="btn btn-primary">Удалить</a>
                </div>
            </div>
        </div>
    @endforeach
@endsection
