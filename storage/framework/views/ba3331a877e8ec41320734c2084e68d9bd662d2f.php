<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Список задач</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body class="d-flex flex-column min-vh-100">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?php echo e(route('home')); ?>">To-Do List</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo e(route('tasks.index')); ?>">Список задач</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('tasks.create')); ?>">Добавить задачу</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('tasks.tag_filter')); ?>">Фильтр по тэгам для задач</a>
            </li>


            <form class="form-inline my-2 my-lg-0" action="<?php echo e(route('tasks.search')); ?>" method="GET">
                <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search...">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>

        </ul>

        <?php if(Auth::check()): ?>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link">Привет, <?php echo e(Auth::user()->name); ?>.</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('logout')); ?>">Выйти</a>
                </li>
            </ul>
        <?php else: ?>
            <form class="form-inline my-2 my-lg-0" method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>
                <input class="form-control mr-sm-2" type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
                <input class="form-control mr-sm-2" type="password" id="password" name="password" required>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Вход</button>
            </form>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('register')); ?>">Регистрация</a>
                </li>
            </ul>
        <?php endif; ?>
    </div>
</nav>

<hr>

<div class="container">
    <div class="row">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</div>

<hr>
<!-- Footer -->
<div class="wrapper flex-grow-1"></div>
<footer class="bg-dark footer">
    <p class="text-center text-light">Copyright 2023. All Rights Reserved</p>
</footer>
<!-- Footer -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>
<?php /**PATH C:\OSPanel\domains\to-do\to-do\to-do\resources\views/layouts/app.blade.php ENDPATH**/ ?>