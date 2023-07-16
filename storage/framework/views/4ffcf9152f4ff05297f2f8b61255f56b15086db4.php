<h1>Create Tag</h1>

<form method="POST" action="<?php echo e(route('tags.store')); ?>">
    <?php echo csrf_field(); ?>

    <div>
        <label for="name">Tag Name:</label>
        <input type="text" id="name" name="name" value="<?php echo e(old('name')); ?>" required>
    </div>

    <button type="submit">Create</button>
</form>
<?php /**PATH C:\OSPanel\domains\to-do\to-do\to-do\resources\views/tags/create.blade.php ENDPATH**/ ?>