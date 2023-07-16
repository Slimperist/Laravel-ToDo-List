@extends('layouts.app')

@section('content')
    <div class="col-sm-12 col-12">
        <h3>Результаты поиска</h3>
    </div>
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
