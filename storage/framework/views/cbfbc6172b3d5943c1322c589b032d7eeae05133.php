<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"> <?php echo e(svg_image('solid/plus')); ?> <?php echo trans('app.'.'create'); ?> </h4>
        </div>
        <?php echo Form::open(['route' => 'deals.api.save', 'class' => 'form-horizontal ajaxifyForm', 'data-toggle' =>
        'validator']); ?>

        <input type="hidden" name="user_id" value="<?php echo e(Auth::id()); ?>">
        <div class="modal-body">
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#tab-client-general" data-toggle="tab"><?php echo trans('app.'.'general'); ?> </a></li>
                <li><a href="#tab-client-custom" data-toggle="tab"><?php echo trans('app.'.'custom_fields'); ?> </a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab-client-general">

                    <div class="form-group">
                        <label class="col-sm-4 control-label"><?php echo trans('app.'.'title'); ?> <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" name="title" value="" class="input-sm form-control"
                                placeholder="ABC Deal" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label"><?php echo trans('app.'.'currency'); ?> </label>
                        <div class="col-sm-8">
                            <select name="currency" class="form-control select2-option">
                                <?php $__currentLoopData = currencies(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($cur['code']); ?>"
                                    <?php echo e(get_option('default_currency') == $cur['code'] ? ' selected' : ''); ?>>
                                    <?php echo e($cur['native']); ?> - <?php echo e($cur['title']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 control-label"><?php echo trans('app.'.'deal_value'); ?> <span class="text-danger">*</span> </label>
                        <div class="col-lg-8">
                            <input type="text" name="deal_value" value="0.00" class="input-sm form-control money"
                                required>
                            <span class="help-block">Enter decimal value Ex. 300.00</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 control-label"><?php echo trans('app.'.'source'); ?> <span class="text-danger">*</span> </label>
                        <div class="col-lg-8">
                            <select class="select2-option form-control" name="source" required>
                                <?php $__currentLoopData = App\Entities\Category::select('id', 'name')->whereModule('source')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $source): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($source->id); ?>"><?php echo e($source->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label"><?php echo trans('app.'.'close_date'); ?> <span class="text-danger">*</span> </label>
                        <div class="col-lg-8">
                            <div class="input-group">
                                <input class="datepicker-input form-control" size="16" type="text"
                                    value="<?php echo e(datePickerFormat(now()->addDays(get_option('deal_rotting')))); ?>"
                                    name="due_date" data-date-format="<?php echo e(get_option('date_picker_format')); ?>"
                                    data-date-start-date="moment()" required>
                                <label class="input-group-addon btn" for="date">
                                    <?php echo e(svg_image('solid/calendar-alt', 'text-muted')); ?>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label"><?php echo trans('app.'.'pipeline'); ?> <span class="text-danger">*</span></label>
                        <div class="col-lg-8">
                            <select name="pipeline" class="form-control m-b" id="pipeline-list"
                                onChange="getStages(this.value);" required>
                                <option value="">--Select--</option>
                                <?php $__currentLoopData = App\Entities\Category::whereModule('pipeline')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pipeline): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($pipeline->id); ?>"><?php echo e($pipeline->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label"><?php echo trans('app.'.'stage'); ?> <span class="text-danger">*</span></label>
                        <div class="col-lg-8">
                            <select name="stage_id" class="form-control m-b" id="stage-list" required></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label"><?php echo trans('app.'.'company_name'); ?> <span class="text-danger">*</span> </label>
                        <div class="col-lg-8">
                            <select class="select2-option form-control" name="organization" required>
                                <?php $__currentLoopData = Modules\Clients\Entities\Client::select('id', 'name')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>
                                $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($client->id); ?>" <?php echo e($company == $client->id ? 'selected' : ''); ?>>
                                    <?php echo e($client->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label"><?php echo trans('app.'.'contact_person'); ?> <span class="text-danger">*</span></label>
                        <div class="col-lg-8">
                            <select class="select2-option form-control" name="contact_person" required>
                                <?php $__currentLoopData = app('user')->select('id', 'username', 'name')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($user->id); ?>" <?php echo e($contact == $user->id ? 'selected' : ''); ?>>
                                    <?php echo e($user->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label"><?php echo trans('app.'.'tags'); ?></label>
                        <div class="col-lg-8">
                            <select class="select2-tags form-control" name="tags[]" multiple="multiple">
                                <?php $__currentLoopData = App\Entities\Tag::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($tag->name); ?>"><?php echo e($tag->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade in" id="tab-client-custom">
                    <?php
                    $data['fields'] = App\Entities\CustomField::whereModule('deals')->orderBy('order', 'desc')->get();
                    ?>
                    <?php echo $__env->make('partial.customfields.createWithCol', $data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
        <div class="modal-footer">

            <?php echo closeModalButton(); ?>

            <?php echo renderAjaxButton(); ?>


        </div>
        <?php echo Form::close(); ?>


    </div>
</div>

<?php $__env->startPush('pagestyle'); ?>
<?php echo $__env->make('stacks.css.datepicker', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('stacks.css.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('pagescript'); ?>
<?php echo $__env->make('stacks.js.datepicker', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('stacks.js.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
    $('.money').maskMoney({allowZero: true, thousands: ''});
        function getStages(val) {
            axios.post('<?php echo e(route('deals.ajaxStages')); ?>', {
                        "pipeline": val
                    })
                  .then(function (response) {
                    $("#stage-list").html(response.data);
                  })
                  .catch(function (error) {
                    toastr.error('Oops! Request failed to complete.', '<?php echo trans('app.'.'response_status'); ?> ');
        });
        }
</script>
<?php echo $__env->make('partial.ajaxify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->yieldPushContent('pagestyle'); ?>
<?php echo $__env->yieldPushContent('pagescript'); ?><?php /**PATH C:\xampp2\htdocs\NETIC360APP\Modules\Deals\Providers/../Resources/views/modal/create.blade.php ENDPATH**/ ?>