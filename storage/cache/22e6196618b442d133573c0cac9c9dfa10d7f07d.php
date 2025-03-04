<div class="container">
    <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>
</div><?php /**PATH C:\laragon\www\php-mvc-project-pacage\resources\Views/layouts/body.blade.php ENDPATH**/ ?>