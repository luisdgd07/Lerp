<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header bg-success">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><?php echo e(__('Default Project Settings')); ?></h4>
        </div>

        <?php echo Form::open(['route' => ['projects.default.setup'], 'class' => 'bs-example form-horizontal ajaxifyForm']); ?>



        <div class="modal-body">
            <p><?php echo e(__('Select your default project settings')); ?></p>

            <?php $defaults = array_keys(json_decode(get_option('default_project_settings'), true)); ?>

            <?php $__currentLoopData = Modules\Projects\Entities\ProjectSetting::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $config): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <div class="checkbox">
                <label>
                    <input name="<?php echo e($config->setting); ?>" type="checkbox" <?php echo e(in_array($config->setting, $defaults) ? 'checked' : ''); ?>>
                    <span class="label-text"><?php echo e($config->description); ?></span>
                </label>
            </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            

            <div class="line line-dashed line-lg pull-in"></div>


        </div>
        <div class="modal-footer">
            
            <?php echo closeModalButton(); ?>

            <?php echo renderAjaxButton(); ?>

            
        </div>
        <?php echo Form::close(); ?>

    </div>
</div>

<?php echo $__env->make('partial.ajaxify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\NETIC360APP\Modules\Projects\Providers/../Resources/views/modal/default_settings.blade.php ENDPATH**/ ?>