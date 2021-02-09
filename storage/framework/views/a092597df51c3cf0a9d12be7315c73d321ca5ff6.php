<div class="rounded-md shadow-sm">
    <input name="<?php echo e($name); ?>" type="<?php echo e($type); ?>" id="<?php echo e($id); ?>" <?php if($value): ?>value="<?php echo e($value); ?>" <?php endif; ?>
        <?php echo e($attributes->merge(['class' => 'block w-full bg-white border border-gray-200 py-2 px-3 rounded-sm transition duration-150 ease-in-out sm:text-sm sm:leading-5'])); ?> />
</div><?php /**PATH C:\xampp2\htdocs\NETIC360APP\resources\views/components/inputs/text.blade.php ENDPATH**/ ?>