@extends('layouts.app')

@section('content')
    <div class="col-sm-12 col-12">
        <h3>Добавить задачу</h3>
    </div>
    <form id="createTaskForm" method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <div>
            <label for="title">Заголовок:</label>
            <input class="form-control" type="text" id="title" name="title" value="{{ old('title') }}" required>
        </div>
        <div>
            <label for="description">Описание:</label>
            <textarea class="form-control" id="description" name="description" required>{{ old('description') }}</textarea>
        </div>
        <div>
            <label for="image">Картинка:</label>
            <input class="form-control" type="file" id="image" name="image">
        </div>
        <div>
            <label for="tags">Тэги (мультивыбор ctrl):</label>
            <select class="form-control" id="tags" name="tags[]" multiple>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>
        <div id="newTagContainer">
            <label for="newTag">Новый тэг:</label>
                <div class="row">
                    <div class="col">
                        <input class="form-control" type="text" id="newTag" name="newTag">
                    </div>
                    <div class="col">
                        <button class="form-control" type="button" id="addNewTag">Добавить тэг</button>
                    </div>
                </div>
        </div>
        <button class="form-control" type="submit">Создать задачу</button>
        <label for="newTag"><div id="message"></div></label>
        <div id="message"></div>
    </form>

    <div id="message"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#addNewTag').click(function () {
            var newTag = $('#newTag').val();
            // Отправка запроса Ajax для сохранения нового тега
            $.ajax({
                url: '{{ route('tags.store') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // Добавьте CSRF-токен в данные
                    name: newTag
                },
                success: function (response) {
                    // Добавление нового тега в список
                    var option = '<option value="' + response.tag.id + '" selected>' + response.tag.name + '</option>';
                    $('#tags').append(option);
                    $('#newTag').val('');
                    // Вывод сообщения об успешном сохранении
                    $('#message').text('Тэг добавлен');
                },
                error: function (error) {
                    console.log(error);
                    // Обработка ошибки, если необходимо
                }
            });
        });
        $('#createTaskForm').submit(function (e) {
            e.preventDefault();

            var formData = new FormData(this); // Создание объекта FormData для отправки данных формы, включая файлы

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                processData: false, // Отключение обработки данных как строки
                contentType: false, // Отключение автоматического установления заголовка Content-Type
                success: function (response) {
                    // Очистка полей формы
                    $('#title').val('');
                    $('#description').val('');
                    $('#image').val('');

                    // Вывод сообщения об успешном сохранении
                    $('#message').text('Запись добавлена');
                },
                error: function (error) {
                    console.log(error);
                    // Обработка ошибки, если необходимо
                }
            });
        });
    </script>
@endsection
