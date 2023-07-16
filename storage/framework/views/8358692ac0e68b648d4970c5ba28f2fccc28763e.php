<h1><?php echo e($tag->name); ?></h1>

<p>ID: <?php echo e($tag->id); ?></p>
<p>Name: <?php echo e($tag->name); ?></p>

<a href="<?php echo e(route('tags.edit', $tag)); ?>">Edit</a>

<form method="POST" action="<?php echo e(route('tags.destroy', $tag)); ?>">
    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>

    <button type="submit">Delete</button>
</form>
<?php /**PATH C:\OSPanel\domains\to-do\to-do\to-do\resources\views/tags/show.blade.php ENDPATH**/ ?>