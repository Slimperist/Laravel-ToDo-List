<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TagController;

// Главная страница
Route::get('/', fn() => view('welcome'))->name('home');

// Регистрация и авторизация
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Защищенные маршруты (только для авторизованных пользователей)
Route::middleware('auth')->group(function () {
    // Список задач
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/tasks/search', [TaskController::class, 'search'])->name('tasks.search');
    Route::get('/tasks/tag_filter', [TaskController::class, 'tag_filter'])->name('tasks.tag_filter');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
    Route::get('/tasks/{task}/delete', [TaskController::class, 'destroy'])->name('tasks.delete');
    Route::resource('tags', TagController::class);
});
