<?php if(!$alreadyConsentedWithCurrency): ?>
<div class="alert bg-indigo-100 border-indigo-600 border" id="currency-alert">
    <button class="close" data-dismiss="alert" type="button">
        <span>×</span>
        <span class="sr-only">
            Close
        </span>
    </button>
    <?php echo trans('app.'.'amount_displayed_in_your_cur'); ?>
    <a class="text-indigo-600 font-bold" href="<?php echo e(route('settings.edit', ['section' => 'system'])); ?>">
        <?php echo e(get_option('default_currency')); ?>

    </a>
</div>

<?php $__env->startPush('pagescript'); ?>
<script>
    $('#currency-alert').on('closed.bs.alert', function () {
            setCookie("acceptCurrency", true, 365);
        });
</script>
<?php $__env->stopPush(); ?>
<?php endif; ?><?php /**PATH C:\xampp2\htdocs\NETIC360APP\resources\views/partial/base_currency.blade.php ENDPATH**/ ?>