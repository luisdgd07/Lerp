<tr>
<td class="header">
<a href="<?php echo e($url); ?>" style="display: inline-block;">
<?php if(config('system.logo_on_emails')): ?>
<img src="<?php echo e(getStorageUrl(config('system.media_dir').'/'.get_option('company_logo'))); ?>" class="logo" alt="<?php echo e(get_option('company_name')); ?>" width="150">
<?php else: ?>
<?php echo e($slot); ?>

<?php endif; ?>
</a>
</td>
</tr>
<?php /**PATH C:\xampp2\htdocs\NETIC360APP\resources\views/vendor/mail/html/header.blade.php ENDPATH**/ ?>