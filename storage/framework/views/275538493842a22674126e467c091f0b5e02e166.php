<?php $__env->startSection('content'); ?>

    <div class="d-flex justify-content-center align-items-center container-fluid">
        <div class="row">
            <div class="col-sm-12 col-12">
                <h3>Регистрация пользователя</h3>
            </div>
            <form method="POST" action="<?php echo e(route('register')); ?>">
                <?php echo csrf_field(); ?>
                <div>
                    <label for="name">Имя:</label>
                    <input class="form-control" type="text" id="name" name="name" value="<?php echo e(old('name')); ?>" required autofocus>
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input class="form-control" type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" required>
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
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\to-do\to-do\to-do\resources\views/register.blade.php ENDPATH**/ ?>