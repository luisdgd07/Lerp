<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><?php echo trans('app.'.'create'); ?> </h4>
        </div>
        <?php echo Form::open(['route' => 'contacts.api.save', 'class' => 'bs-example form-horizontal ajaxifyForm validator']); ?>

        <div class="modal-body">
            <input type="hidden" name="company" value="<?php echo e($client); ?>">
            <input type="hidden" name="url" value="<?php echo e(url()->previous()); ?>">
            <span id="status"></span>
            <div class="form-group">
                <label class="col-lg-4 control-label"><?php echo trans('app.'.'fullname'); ?> <span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" placeholder="John Doe" name="name" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 control-label"><?php echo trans('app.'.'email'); ?> <span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <input class="form-control" id='email' type="email" placeholder="me@domain.com" name="email" required>
                </div>
            </div>

            <?php if(empty($client)): ?>
            <div class="form-group">
                <label class="col-lg-4 control-label"><?php echo trans('app.'.'company_name'); ?> <span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <input class="form-control" type="text" placeholder="Ex: <?php echo e(get_option('company_name')); ?>" name="company_name" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-4 control-label"><?php echo trans('app.'.'company_email'); ?> <span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <input class="form-control" type="email" placeholder="company@domain.com" name="company_email" required>
                </div>
            </div>

            <?php endif; ?>

            <div class="form-group">
                <label class="col-lg-4 control-label"><?php echo trans('app.'.'phone'); ?> </label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="phone" placeholder="+14081234567">
                </div>
            </div>

            <?php if (\Illuminate\Support\Facades\Blade::check('admin')): ?>
            <div class="form-group">
                <label class="col-lg-4 control-label"><?php echo trans('app.'.'tags'); ?></label>
                <div class="col-lg-8">
                    <select class="select2-tags form-control" name="tags[]" multiple>
                        <?php $__currentLoopData = App\Entities\Tag::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($tag->name); ?>"><?php echo e($tag->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <?php endif; ?>

            <div class="form-group">
                <label class="col-lg-4 control-label"></label>
                <div class="col-lg-8">
                    <div class="text-gray-600 form-check">
                        <label>
                            <input type="hidden" name="invite" value="0">
                            <input type="checkbox" name="invite" value="1">
                            <span class="label-text">Send invitation email</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <?php echo closeModalButton(); ?>

                <?php echo renderAjaxButton(); ?>


            </div>
        </div>
        <?php echo Form::close(); ?>

    </div>


    <?php echo $__env->make('partial.ajaxify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php $__env->startPush('pagestyle'); ?>
    <?php echo $__env->make('stacks.css.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopPush(); ?>
    <?php $__env->startPush('pagescript'); ?>
    <?php echo $__env->make('stacks.js.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script type="text/javascript">
        $(document).ready(function () {
    
    function randString(id) {
        var dataSet = $(id).attr('data-character-set').split(',');
        var possible = '';
        if ($.inArray('a-z', dataSet) >= 0) {
            possible += 'abcdefghijklmnopqrstuvwxyz';
        }
        if ($.inArray('A-Z', dataSet) >= 0) {
            possible += 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }
        if ($.inArray('0-9', dataSet) >= 0) {
            possible += '0123456789';
        }
        if ($.inArray('#', dataSet) >= 0) {
            possible += '![]{}()%&*$#^<>~@|';
        }
        var text = '';
            for (var i = 0; i < $(id).attr('data-size'); i++) {
                text += possible.charAt(Math.floor(Math.random() * possible.length));
            }
        return text;
    }

        $('input[rel="gp"]').each(function () {
            $(this).val(randString($(this)));
        });
        $(".getNewPass").click(function () {
            var field = $(this).closest('div').find('input[rel="gp"]');
            field.val(randString(field));
        });
        $('input[rel="gp"]').on("click", function () {
            $(this).select();
        });
    });
    </script>

    <?php $__env->stopPush(); ?>

    <?php echo $__env->yieldPushContent('pagescript'); ?><?php /**PATH C:\xampp2\htdocs\NETIC360APP\Modules\Contacts\Providers/../Resources/views/modal/create.blade.php ENDPATH**/ ?>