

<?php $__env->startSection('content'); ?>

<section id="content" class="bg-indigo-100">
    <section class="hbox stretch">

        <?php echo $__env->make('settings::partial.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <aside>
            <section class="vbox">

                <header class="clearfix bg-white header b-b">
                    <div class="row m-t-sm">
                        <div class="col-sm-12 m-b-xs">

                            <?php if($section == 'payments'): ?>
                            <a href="<?php echo e(route('settings.index', 'currencies')); ?>" class="btn <?php echo e(themeButton()); ?>"><?php echo trans('app.'.'currencies'); ?></a>
                            <?php endif; ?>

                            <?php if($section == 'theme'): ?>
                            <a href="<?php echo e(route('settings.index', 'css')); ?>" class="btn <?php echo e(themeButton()); ?>"><?php echo trans('app.'.'custom_css'); ?></a>
                            <?php endif; ?>

                            <?php if($section == 'system' || $section == 'mail' || $section == 'integrations' || $section == 'extras'): ?>
                            <?php if (\Illuminate\Support\Facades\Blade::check('admin')): ?>
                            <?php if($section != 'mail'): ?>
                            <a href="<?php echo e(route('settings.index', 'mail')); ?>" class="btn <?php echo e(themeButton()); ?>"><?php echo e(svg_image('solid/envelope-open-text')); ?> Mail Settings</a>
                            <?php endif; ?>
                            <?php if($section != 'integrations'): ?>
                            <a href="<?php echo e(route('settings.index', 'integrations')); ?>" class="btn <?php echo e(themeButton()); ?>"><?php echo e(svg_image('solid/terminal')); ?> <?php echo trans('app.'.'integrations'); ?></a>
                            <?php endif; ?>
                            <?php if($section != 'extras'): ?>
                            <a href="<?php echo e(route('settings.index', 'extras')); ?>" class="btn <?php echo e(themeButton()); ?>"><?php echo e(svg_image('solid/wrench')); ?> <?php echo trans('app.'.'extras'); ?> </a>
                            <?php endif; ?>
                            <a href="<?php echo e(route('settings.test.mail')); ?>" class="btn <?php echo e(themeButton()); ?>" data-toggle="ajaxModal"><?php echo e(svg_image('solid/at')); ?> <?php echo trans('app.'.'test_email'); ?></a>
                            <?php endif; ?>
                            <?php endif; ?>

                            <?php if($section == 'info'): ?>
                            <?php if (\Illuminate\Support\Facades\Blade::check('admin')): ?>
                            <div class="btn-group">
                                <button class="btn <?php echo e(themeButton()); ?> dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo trans('app.'.'import'); ?> <span
                                        class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo e(route('settings.import', ['type' => 'fo'])); ?>" data-toggle="ajaxModal">Freelancer Office</a></li>
                                </ul>
                            </div>
                            <a href="<?php echo e(route('settings.index', 'commands')); ?>" class="btn <?php echo e(themeButton()); ?>"><?php echo e(svg_image('solid/terminal')); ?> Commands</a>
                            <a href="#" class="btn <?php echo e(themeButton()); ?> pull-right" id="updatesInstallBtn" data-rel="tooltip" title="Install available updates">
                                <?php echo e(svg_image('solid/laptop-code')); ?> <?php echo trans('app.'.'install_updates'); ?>
                            </a>
                            <?php endif; ?>
                            <?php endif; ?>

                            <?php if($section == 'support'): ?>
                            <a href="<?php echo e(route('settings.statuses.show')); ?>" class="btn <?php echo e(themeButton()); ?>" data-toggle="ajaxModal" data-rel="tooltip" title="<?php echo trans('app.'.'statuses'); ?>"
                                data-placement="bottom">
                                <?php echo e(svg_image('solid/ellipsis-v')); ?> <?php echo trans('app.'.'statuses'); ?>
                            </a>
                            <?php endif; ?>

                            <?php if($section == 'translations'): ?>
                            <a href="<?php echo e(route('translations.mail')); ?>" class="btn <?php echo e(themeButton()); ?>" data-rel="tooltip" title="Modify email templates" data-placement="bottom">
                                <?php echo e(svg_image('solid/envelope-open')); ?> <?php echo trans('app.'.'emails'); ?>
                            </a>
                            <?php endif; ?>
                            <?php if($section == 'leads'): ?>
                            <a href="<?php echo e(route('settings.stages.show', 'leads')); ?>" class="btn <?php echo e(themeButton()); ?>" data-toggle="ajaxModal" data-rel="tooltip"
                                title="<?php echo trans('app.'.'preview'); ?> " data-placement="bottom">
                                <?php echo e(svg_image('solid/shoe-prints')); ?> <?php echo trans('app.'.'stages'); ?>
                            </a>

                            <a href="<?php echo e(route('settings.sources.show')); ?>" class="btn <?php echo e(themeButton()); ?>" data-toggle="ajaxModal" data-rel="tooltip" title="<?php echo trans('app.'.'source'); ?> "
                                data-placement="bottom">
                                <?php echo e(svg_image('solid/globe')); ?> <?php echo trans('app.'.'source'); ?>
                            </a>

                            <a href="<?php echo e(route('web.lead')); ?>" class="btn <?php echo e(themeButton()); ?> pull-right" data-rel="tooltip" title="Web to Lead form" data-placement="bottom"
                                target="_blank">
                                <?php echo e(svg_image('solid/phone-volume')); ?> <?php echo trans('app.'.'lead_form'); ?>
                            </a>

                            <?php endif; ?>

                            <?php if($section == 'deals'): ?>
                            <a href="<?php echo e(route('settings.stages.show', 'deals')); ?>" class="btn <?php echo e(themeButton()); ?>" data-toggle="ajaxModal" data-rel="tooltip"
                                title="<?php echo trans('app.'.'stages'); ?> " data-placement="bottom">
                                <?php echo e(svg_image('solid/shoe-prints')); ?> <?php echo trans('app.'.'stages'); ?>
                            </a>
                            <a href="<?php echo e(route('settings.pipelines.show')); ?>" class="btn <?php echo e(themeButton()); ?>" data-toggle="ajaxModal" data-rel="tooltip"
                                title="<?php echo trans('app.'.'deal_pipelines'); ?>" data-placement="bottom">
                                <?php echo e(svg_image('solid/chart-line')); ?> <?php echo trans('app.'.'deal_pipelines'); ?>
                            </a>
                            <?php endif; ?>


                        </div>
                    </div>
                </header>
                <section class="scrollable wrapper">
                    <?php echo $__env->make('settings::sections.'.$section, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </section>
            </section>
        </aside>
    </section>
    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen, open" data-target="#nav,html">

    </a>
</section>
<?php if (moduleActive('updates')) { ?>
<?php $__env->startPush('pagescript'); ?>
<script>
    $("#updatesInstallBtn").click(function() {
        $("#updatesInstallBtn").html('Installing updates, please wait..<i class="fas fa-spin fa-spinner"></i>');
        axios.get('<?php echo e(route('updates.install')); ?>')
        .then(function (response) {
            toastr.success(response.data.message, '<?php echo trans('app.'.'response_status'); ?>');
            $("#updatesInstallBtn").html('Update installation completed');
            location.reload();
        })
        .catch(function (error) {
            toastr.warning('Update installation failed or no updates.', '<?php echo trans('app.'.'response_status'); ?>');
            $("#updatesInstallBtn").html('Failed, Try Again');
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php } ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\NETIC360APP\Modules\Settings\Providers/../Resources/views/index.blade.php ENDPATH**/ ?>