
<?php $__env->startSection('content'); ?>
<section id="content">
    <section class="hbox stretch">

        <section class="vbox">
            <header class="px-2 pb-2 bg-white border-b border-gray-400 panel-heading">
                <div class="flex justify-between text-gray-500">
                    <div class="text-xl font-semibold text-gray-600">
                        <?php echo trans('app.'.'create'); ?>
                    </div>
                    <div>
                        <a href="<?php echo e(route('projects.default.config')); ?>" class="btn <?php echo e(themeButton()); ?> pull-right" data-toggle="ajaxModal" data-rel="tooltip"
                            title="Default Settings" data-placement="left">
                            <?php echo e(svg_image('solid/cogs')); ?>
                        </a>
                    </div>
                </div>
            </header>

            <section class="scrollable wrapper bg">
                <div class="row">
                    <?php echo Form::open(['route' => 'projects.api.save', 'data-toggle' => 'validator', 'class' => 'ajaxifyForm']); ?>

                    <div class="col-md-7">
                        <section class="panel panel-default">
                            <header class="panel-heading"><?php echo e(svg_image('regular/clock')); ?> <?php echo trans('app.'.'information'); ?> </header>
                            <div class="panel-body">

                                <input type="hidden" name="auto_progress" value="1">
                                <div class="form-group">
                                    <label><?php echo trans('app.'.'name'); ?> <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="ACME Website Redesign" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label><?php echo trans('app.'.'client'); ?> <span class="text-danger">*</span></label>
                                    <div class="input-group m-b">
                                        <select class="select2-option form-control" name="client_id" required>
                                            <?php if(can('menu_clients')): ?>
                                            <?php $__currentLoopData = classByName('clients')->select('id', 'name')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($client->id); ?>" <?php echo $selectClient==$client->id ? 'selected="selected"' : ''; ?>><?php echo e($client->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                            <option value="<?php echo e(Auth::user()->profile->company); ?>"><?php echo e(optional(Auth::user()->profile->business)->name); ?></option>
                                            <?php endif; ?>
                                            <option value="0">-----None-----</option>
                                        </select>
                                        <span class="input-group-addon">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('clients_create')): ?>
                                            <a href="<?php echo e(route('clients.create')); ?>" data-toggle="ajaxModal" title="<?php echo trans('app.'.'new_company'); ?>  "
                                                data-placement="bottom"><?php echo e(svg_image('solid/user-tie')); ?> <?php echo trans('app.'.'new_client'); ?> </a>
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><?php echo trans('app.'.'progress'); ?></label>
                                    <div class="">
                                        <div id="progress-slider" class="width100-important"></div>
                                        <input id="progress" type="hidden" value="0" name="progress" />
                                    </div>


                                </div>


                                <!-- CAN ASSIGN TEAM -->
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users_assign')): ?>
                                <div class="form-group">
                                    <label><?php echo trans('app.'.'team_members'); ?> </label>
                                    <select name="team[]" class="form-control select2-option" multiple="multiple">
                                        <?php $__currentLoopData = classByName('users')->select('id','username', 'name')->offHoliday()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <?php endif; ?>
                                <!-- / CAN ASSIGN TEAM -->
                                <div class="form-group">
                                    <label><?php echo trans('app.'.'start_date'); ?> <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input class="datepicker-input form-control" size="16" type="text" value="<?php echo e(datePickerFormat(now())); ?>" name="start_date"
                                            data-date-format="<?php echo e(get_option('date_picker_format')); ?>" required>
                                        <label class="input-group-addon btn" for="date">
                                            <?php echo e(svg_image('solid/calendar-alt', 'text-muted')); ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><?php echo trans('app.'.'due_date'); ?> </label>
                                    <div class="input-group">
                                        <input class="datepicker-input form-control" size="16" type="text" value="<?php echo e(datePickerFormat(now()->addDays(30))); ?>" name="due_date"
                                            data-date-format="<?php echo e(get_option('date_picker_format')); ?>" data-date-start-date="moment()" required>
                                        <label class="input-group-addon btn" for="date">
                                            <?php echo e(svg_image('solid/calendar-alt', 'text-muted')); ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><?php echo trans('app.'.'currency'); ?> <span class="text-danger">*</span></label>
                                    <select name="currency" class="form-control select2-option" required>
                                        <?php $__currentLoopData = currencies(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($cur['code']); ?>" <?php echo e(get_option('default_currency') == $cur['code'] ? ' selected' : ''); ?>><?php echo e($cur['native']); ?> -
                                            <?php echo e($cur['title']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="checkbox-primary">
                                        <label>
                                            <input type="checkbox" name="auto_progress" value="1" checked>
                                            <span class="label-text"><?php echo trans('app.'.'auto_progress_on'); ?> -
                                                Calculate progress through tasks</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="checkbox-primary">
                                        <label>
                                            <input type="checkbox" name="is_template" value="1">
                                            <span class="label-text"><?php echo trans('app.'.'this_is_a_project_template'); ?></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(langapp('billing_method')); ?> <span class="text-danger">*</span></label>
                                    <select name="billing_method" class="form-control" id="project_rate" required>
                                        <?php $__currentLoopData = config('projects.billing_methods'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($method); ?>"><?php echo e(humanize($method)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div id="hourly_rate" class="display-none">
                                    <div class="form-group">
                                        <label><?php echo trans('app.'.'hourly_rate'); ?> (<?php echo trans('app.'.'eg'); ?> 50.00)</label>
                                        <input type="text" class="form-control money" name="hourly_rate" value="<?php echo e(get_option('hourly_rate')); ?>">
                                    </div>
                                </div>
                                <div id="fixed_price" class="display-none">
                                    <div class="form-group">
                                        <label><?php echo trans('app.'.'fixed_price'); ?> (<?php echo trans('app.'.'eg'); ?> 300.00 )</label>
                                        <input type="text" class="form-control money" placeholder="300" name="fixed_price" value="0.00">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><?php echo trans('app.'.'estimated_hours'); ?> </label>
                                    <input type="text" class="form-control" placeholder="300" name="estimate_hours" value="100">
                                    <span class="help-block text-muted">A project time estimate helps you track progress against projections</span>
                                </div>
                                <div class="form-group">
                                    <label><?php echo trans('app.'.'description'); ?> <span class="text-danger">*</span></label>
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.inputs.wysiwyg','data' => ['name' => 'description','class' => ''.e(get_option('htmleditor')).'','id' => ''.e(get_option('htmleditor')).'']]); ?>
<?php $component->withName('inputs.wysiwyg'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'description','class' => ''.e(get_option('htmleditor')).'','id' => ''.e(get_option('htmleditor')).'']); ?>

                                     <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                                </div>

                            </div>
                        </section>
                    </div>
                    <div class="col-md-5">
                        <section class="panel panel-default">
                            <header class="panel-heading"><i class="fas fa-cogs"></i> <?php echo trans('app.'.'settings'); ?> </header>
                            <div class="panel-body">
                                <?php $__currentLoopData = Modules\Projects\Entities\ProjectSetting::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="mt-3 border-b border-gray-200">
                                    <?php
                                    $active_settings = array();
                                    $default_settings = json_decode(get_option('default_project_settings'), true);
                                    foreach ($default_settings as $key => &$value) {
                                    if (strtolower($value) == 'on') {
                                    $active_settings[] = $key;
                                    }
                                    }
                                    ?>
                                    <div class="checkbox-primary">
                                        <label class="checkbox-custom">
                                            <input type="checkbox" name="settings[<?php echo e($val->setting); ?>]" <?php echo e((in_array($val->setting, $active_settings)) ? 'checked' : ''); ?>>
                                            <span class="label-text"><?php echo e($val->description); ?></span>
                                        </label>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-group">
                                    <label class="control-label"><?php echo trans('app.'.'tags'); ?> </label>
                                    <select class="form-control select2-tags" name="tags[]" multiple>
                                        <?php $__currentLoopData = App\Entities\Tag::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($tag->name); ?>"><?php echo e($tag->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <?php
                                $data['fields'] = App\Entities\CustomField::whereModule('projects')->orderBy('order', 'desc')->get();
                                ?>
                                <?php echo $__env->make('partial.customfields.createNoCol', $data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            </div>
                        </section>
                    </div>
                    <?php echo renderAjaxButton(); ?>

                    <?php echo Form::close(); ?>

                </div>

            </section>
        </section>

    </section>
    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
</section>
<?php $__env->startPush('pagestyle'); ?>
<?php echo $__env->make('stacks.css.datepicker', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('stacks.css.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('stacks.css.nouislider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('stacks.css.wysiwyg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('pagescript'); ?>
<?php echo $__env->make('stacks.js.datepicker', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('stacks.js.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('stacks.js.nouislider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('stacks.js.wysiwyg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script type="text/javascript">
    $(document).ready(function () {
    $("#project_rate").change(function () {
        var selected_option = $('#project_rate').val();
        if (selected_option === 'hourly_project_rate') {
            $("#hourly_rate").show("fast");
            $("#fixed_price").hide("fast");
        }
        if (selected_option === 'fixed_rate') {
            $("#fixed_price").show("fast");
            $("#hourly_rate").hide("fast");
        }
        if (selected_option === 'hourly_staff_rate' || selected_option === 'hourly_task_rate') {
            $("#fixed_price").hide("fast");
            $("#hourly_rate").hide("fast");
        }
    });
    
    });
</script>

<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\NETIC360APP\Modules\Projects\Providers/../Resources/views/create.blade.php ENDPATH**/ ?>