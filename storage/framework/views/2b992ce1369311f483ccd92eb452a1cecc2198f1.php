<?php $__env->startSection('content'); ?>
    <div class="col-sm-12 col-12">
        <h3>Редактировать задачу</h3>
    </div>
    <form method="POST" action="<?php echo e(route('tasks.update', $task)); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div>
            <label for="title">Заголовок:</label>
            <input class="form-control" type="text" id="title" name="title" value="<?php echo e($task->title); ?>" required autofocus>
        </div>
        <div>
            <label for="description">Описание:</label>
            <textarea class="form-control" id="description" name="description" required><?php echo e($task->description); ?></textarea>
        </div>
        <div>
            <label for="image">Изображение:</label>
            <input class="form-control" type="file" id="image" name="image">
            <?php if($task->image): ?>
                <img src="<?php echo e(asset('images/thumbnails/' . $task->image)); ?>" alt="Изображение">

            <?php endif; ?>
        </div>
        <div>
            <label for="tags">Тэги (мультивыбор ctrl):</label>
            <select class="form-control" id="tags" name="tags[]" multiple>
                <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($tag->id); ?>"><?php echo e($tag->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div>
            <button class="form-control" type="submit">Сохранить</button>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>









<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\to-do\to-do\to-do\resources\views/tasks/edit.blade.php ENDPATH**/ ?>