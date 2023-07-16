@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center container-fluid">
        <div class="row">
            <div class="col-sm-12 col-12">
                <h3>Регистрация пользователя</h3>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div>
                    <label for="name">Имя:</label>
                    <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}" required>
                </div>
                <div>
                    <label for="password">Пароль:</label>
                    <input class="form-control" type="password" id="password" name="password" required>
                </div>
                <div>
                    <label for="password_confirmation">Подтверждение пароля:</label>
                    <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" required>
                </div>
                <div>
                    <button class="form-control" type="submit">Зарегистрироваться</button>
                </div>
            </form>
        </div>
    </div>
@endsection
