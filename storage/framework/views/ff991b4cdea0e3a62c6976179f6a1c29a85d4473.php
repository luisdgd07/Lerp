
<?php $__env->startSection('content'); ?>
<section id="content" class="wrapper-md installer content">
  <div class="container aside-xxl animated fadeInUp">
    <section class="bg-white panel panel-default m-t-sm b-r-xs">
      <header class="text-center panel-heading login-heading">
        <strong>Installation Completed</strong>
      </header>
      <div class="panel-body">
        <?php if(session('message')['status'] === 'success'): ?>
        <div class="alert alert-success">
          <button type="button" class="close" id="close_alert" data-dismiss="alert" aria-hidden="true">
            <i class="fas fa-close" aria-hidden="true"></i>
          </button>
          <span class="text-sm">
            <?php echo e(svg_image('solid/check-circle')); ?> <?php echo e(session('message')['message']); ?>

          </span>
        </div>
        <?php endif; ?>


        <img style="width:100%; height: 230px;" src="https://workice-assets.s3.us-east-2.amazonaws.com/public/media/install_success.svg" alt="">

        <p style="margin: 2rem"><strong>You're good to go! Click My Account to proceed</strong></p>
        <a href="<?php echo e(url('/')); ?>" class="btn btn-block btn-success">My Account</a>
      </div>
    </section>
  </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('installer::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\NETIC360APP\Modules\Installer\Providers/../Resources/views/finished.blade.php ENDPATH**/ ?>