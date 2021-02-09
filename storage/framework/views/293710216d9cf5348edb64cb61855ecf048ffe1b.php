

<?php $__env->startSection('content'); ?>


<section id="content" class="m-t-lg wrapper-md content">

    <div id="login-darken"></div>
    <div id="login-form" class="container max-w-md aside-xxl animated fadeInUp">
        <span class="navbar-brand mt-8 font-semibold text-center text-2xl leading-8 block <?php echo e(settingEnabled('blur_login') ? 'text-white' : themeText()); ?>">
            <?php $display = get_option('logo_or_icon'); ?>
            <?php if($display == 'logo' || $display == 'logo_title'): ?>
            <img src="<?php echo e(getStorageUrl(config('system.media_dir').'/'.get_option('company_logo'))); ?>" class="img-responsive <?php echo e(($display == 'logo' ? '' : 'thumb-sm mr-1')); ?>">
            <?php elseif($display == 'icon' || $display == 'icon_title'): ?>
            <i class="<?php echo e(get_option('site_icon')); ?>"></i>
            <?php endif; ?>
            <?php if($display == 'logo_title' || $display == 'icon_title'): ?>
            <?php if(get_option('website_name') == ''): ?>
            <?php echo e(get_option('company_name')); ?>

            <?php else: ?>
            <?php echo e(get_option('website_name')); ?>

            <?php endif; ?>
            <?php endif; ?>
        </span>

        <section class="bg-white panel panel-default m-t-sm b-r-xs">
            <header class="px-2 py-3 text-center text-white <?php echo e(themeBg()); ?> border-b border-gray-200 rounded-t-sm">
                <strong><?php echo trans('app.'.'confirm_password_to_continue'); ?></strong>
            </header>
            <form class="panel-body wrapper-lg" method="POST" action="<?php echo e(route('users.reauthenticate.process')); ?>">
                <?php echo e(csrf_field()); ?>

                <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                    <label for="password"><?php echo trans('app.'.'password'); ?></label>

                    <input id="password" type="password" class="form-control" name="password" required>

                    <?php if($errors->has('password')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('password')); ?></strong>
                    </span>
                    <?php endif; ?>

                </div>
                <div class="form-group">
                    <button type="submit" class="btn <?php echo e(themeButton()); ?> btn-block">
                        <?php echo e(svg_image('solid/unlock-alt')); ?> <?php echo trans('app.'.'confirm_password'); ?></button>

                    <p class="mt-1 text-muted"><strong>Tip:</strong> You are entering sudo mode. You will not be asked
                        for your password for a few hours.</p>

                    <a href="<?php echo e(route('dashboard.index')); ?>" class="btn <?php echo e(themeButton()); ?> btn-block">
                        <?php echo e(svg_image('solid/home')); ?>
                        <?php echo trans('app.'.'back'); ?>
                    </a>
                </div>
                <div class="line line-dashed">
                </div>
            </form>

            <?php if(!settingEnabled('hide_branding')): ?>
            <?php echo $__env->make('partial.branding', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>

        </section>

    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\NETIC360APP\resources\views/auth/reauthenticate.blade.php ENDPATH**/ ?>