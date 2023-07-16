<?php $__env->startSection('content'); ?>
    <div class="col-sm-12 col-12">
        <h3>Результаты поиска</h3>
    </div>
    <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-sm-4 col-12">
            <div class="card">
                <?php if($task->image): ?>
                    <a target="_blank" href="<?php echo e(asset('images/' . $task->image)); ?>"><img class="" src="<?php echo e(asset('images/' . $task->image)); ?>" alt="Card image cap" style="max-width:150px; max-height:150px"></a>
                <?php endif; ?>
                <div class="card-body">
                    <h5 class="card-title"><?php echo e($task->title); ?></h5>
                    <p class="card-text"><?php echo e($task->description); ?></p>
                    <ul>
                        <?php $__currentLoopData = $task->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($tag->name); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <a href="<?php echo e(route('tasks.edit', $task)); ?>" class="btn btn-primary">Редактировать</a>
                    <a href="<?php echo e(route('tasks.delete', $task)); ?>" class="btn btn-primary">Удалить</a>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OSPanel\domains\to-do\to-do\to-do\resources\views/tasks/search.blade.php ENDPATH**/ ?>