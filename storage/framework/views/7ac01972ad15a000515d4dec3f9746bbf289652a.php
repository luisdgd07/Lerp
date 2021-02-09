<div class="modal-dialog">
    <div class="modal-content">

        <?php if(isset($task)): ?>
        <div class="p-2 border-b border-gray-300">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="text-xl text-gray-600 modal-title">
                <?php echo e($task->name); ?>

            </h4>
        </div>

        <div class="text-sm prose-lg modal-body">

            <div class="row">

                <div class="col-sm-6">

                    <div class="py-1">
                        <span class="text-gray-600"><?php echo trans('app.'.'project'); ?></span>
                        <span class="ml-6 font-semibold">
                            <a class="text-indigo-600" href="<?php echo e(route('projects.view', $task->project_id)); ?>">
                                <?php echo e($task->AsProject->name); ?>

                            </a>
                        </span>
                    </div>
                    <?php if($task->milestone_id > 0): ?>
                    <div class="py-1">
                        <span class="text-gray-600"><?php echo trans('app.'.'milestone'); ?></span>
                        <span class="ml-6 font-semibold">
                            <a class="text-indigo-600" href="<?php echo e(route('projects.view', ['project' => $task->project_id, 'tab' => 'milestones', 'item' => $task->milestone_id])); ?>">
                                <?php echo e($task->AsMilestone->milestone_name); ?>

                            </a>
                        </span>
                    </div>
                    <?php endif; ?>

                    <div class="py-1">
                        <span class="text-gray-600"><?php echo trans('app.'.'user'); ?></span>
                        <span class="ml-6 font-semibold">
                            <?php echo e($task->user->name); ?>

                        </span>
                    </div>
                    <div class="py-1">
                        <span class="text-gray-600"><?php echo trans('app.'.'progress'); ?></span>
                        <span class="ml-6 font-semibold text-green-500">
                            <?php echo e($task->progress); ?>%
                        </span>
                    </div>

                </div>


                <div class="col-sm-6">

                    <div class="py-1">
                        <span class="text-gray-600"><?php echo trans('app.'.'start_date'); ?></span>
                        <span class="ml-6 font-semibold text-gray-500">
                            <?php echo e($task->start_date->toDayDateTimeString()); ?>

                        </span>
                    </div>

                    <div class="py-1">
                        <span class="text-gray-600"><?php echo trans('app.'.'due_date'); ?></span>
                        <span class="ml-6 font-semibold text-gray-500">
                            <?php echo e($task->due_date->toDayDateTimeString()); ?>

                        </span>
                    </div>



                </div>


            </div>

            <div class="p-2 text-gray-700 bg-indigo-100 border-t border-gray-200 rounded-lg">
                <?php echo parsedown($task->description); ?>
            </div>


        </div>
        <div class="modal-footer">
            <?php echo closeModalButton(); ?>

            <a href="<?php echo e(route('projects.view', ['project' => $task->project_id, 'tab' => 'tasks', 'item' => $task->id])); ?>" class="btn <?php echo e(themeButton()); ?>">
                <?php echo e(svg_image('solid/info-circle')); ?> <?php echo trans('app.'.'preview'); ?> </a>
        </div>
        <?php endif; ?>
        <?php if(isset($payment)): ?>
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title h3"><?php echo trans('app.'.'payment'); ?> </h4>
        </div>
        <div class="modal-body">
            <ul class="list-group no-radius">
                <li class="list-group-item">
                    <span class="pull-right">
                        <a href="<?php echo e(route('clients.view', $payment->client_id)); ?>"><?php echo e($payment->company->name); ?></a>
                    </span>
                    <?php echo trans('app.'.'client'); ?>
                </li>
                <li class="list-group-item">
                    <span class="pull-right">
                        <a href="<?php echo e(route('invoices.view', $payment->invoice_id)); ?>"><?php echo e($payment->AsInvoice->reference_no); ?></a>
                    </span>
                    <?php echo trans('app.'.'invoice'); ?>
                </li>
                <li class="list-group-item">
                    <span class="pull-right">
                        <label class="label label-success">
                            <?php echo e(dateString($payment->payment_date)); ?>

                        </label>
                    </span>
                    <?php echo trans('app.'.'payment_date'); ?>
                </li>
                <li class="list-group-item">
                    <span class="pull-right"><?php echo e($payment->paymentMethod->method_name); ?></span><?php echo trans('app.'.'payment_method'); ?>
                </li>
                <li class="list-group-item">
                    <span class="pull-right">
                        <label class="label label-success"><?php echo e(formatCurrency($payment->currency, $payment->amount)); ?>

                        </label>
                    </span><?php echo trans('app.'.'amount'); ?>
                </li>
            </ul>
        </div>
        <div class="modal-footer">
            <?php echo closeModalButton(); ?>

            <a href="<?php echo e(route('payments.view', $payment->id)); ?>" class="btn <?php echo e(themeButton()); ?>">
                <?php echo e(svg_image('solid/credit-card')); ?> <?php echo trans('app.'.'preview'); ?>
            </a>
        </div>
        <?php endif; ?>
        <?php if(isset($project)): ?>
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title h3"><?php echo e($project->name); ?></h4>
        </div>
        <div class="modal-body">
            <ul class="list-group no-radius">
                <li class="list-group-item">
                    <span class="pull-right">
                        <a href="<?php echo e(route('clients.view', $project->client_id)); ?>">
                            <?php echo e($project->company->name); ?>

                        </a>
                    </span>
                    <?php echo trans('app.'.'client'); ?>
                </li>
                <li class="list-group-item">
                    <span class="pull-right">
                        <label class="label label-success"><?php echo e(dateTimeFormatted($project->start_date)); ?></label>
                    </span>
                    <?php echo trans('app.'.'start_date'); ?>
                </li>
                <li class="list-group-item">
                    <span class="pull-right">
                        <label class="label label-danger"><?php echo e(dateTimeFormatted($project->due_date)); ?></label>
                    </span>
                    <?php echo trans('app.'.'due_date'); ?>
                </li>
                <li class="list-group-item">
                    <span class="pull-right">
                        <label class="label label-success"><?php echo e($project->progress); ?>%</label>
                    </span>
                    <?php echo trans('app.'.'progress'); ?>
                </li>
            </ul>
            <?php echo parsedown(str_limit($project->description, 255)); ?>
        </div>
        <div class="modal-footer">
            <?php echo closeModalButton(); ?>

            <a href="<?php echo e(route('projects.view', ['project' => $project->id])); ?>" class="btn <?php echo e(themeButton()); ?>">
                <?php echo e(svg_image('solid/clock')); ?> <?php echo trans('app.'.'preview'); ?> </a>
        </div>
        <?php endif; ?>
        <?php if(isset($invoice)): ?>
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><?php echo trans('app.'.'invoice'); ?> <?php echo e($invoice->reference_no); ?></h4>
        </div>
        <div class="modal-body">
            <ul class="list-group no-radius">
                <li class="list-group-item">
                    <span class="pull-right">
                        <a href="<?php echo e(route('clients.view', $invoice->client_id)); ?>"><?php echo e($invoice->company->name); ?></a>
                    </span>
                    <?php echo trans('app.'.'client'); ?>
                </li>
                <li class="list-group-item">
                    <span class="pull-right">
                        <?php echo e($invoice->status); ?>

                    </span>
                    <?php echo trans('app.'.'status'); ?>
                </li>
                <li class="list-group-item">
                    <span class="pull-right">
                        <label class="label label-success">
                            <?php echo e(formatCurrency($invoice->currency, $invoice->due())); ?>

                        </label>
                    </span>
                    <?php echo trans('app.'.'balance_due'); ?>
                </li>
                <li class="list-group-item">
                    <span class="pull-right">
                        <label class="label label-danger">
                            <?php echo e(dateFormatted($invoice->due_date)); ?>

                        </label>
                    </span>
                    <?php echo trans('app.'.'due_date'); ?>
                </li>
            </ul>
            <?php echo parsedown($invoice->notes); ?>
        </div>
        <div class="modal-footer">
            <?php echo closeModalButton(); ?>

            <a href="<?php echo e(route('invoices.view', $invoice->id)); ?>" class="btn <?php echo e(themeButton()); ?>">
                <?php echo e(svg_image('solid/file-alt')); ?> <?php echo trans('app.'.'preview'); ?>
            </a>
        </div>
        <?php endif; ?>
        <?php if(isset($estimate)): ?>
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><?php echo trans('app.'.'estimate'); ?> <?php echo e($estimate->reference_no); ?></h4>
        </div>
        <div class="modal-body">
            <ul class="list-group no-radius">
                <li class="list-group-item">
                    <span class="pull-right">
                        <a href="<?php echo e(route('clients.view', $estimate->client_id)); ?>"><?php echo e($estimate->company->name); ?></a>
                    </span>
                    <?php echo trans('app.'.'client'); ?>
                </li>
                <li class="list-group-item">
                    <span class="pull-right">
                        <?php echo trans('app.'.strtolower($estimate->status)); ?>
                    </span>
                    <?php echo trans('app.'.'status'); ?>
                </li>
                <li class="list-group-item">
                    <span class="pull-right">
                        <label class="label label-danger">
                            <?php echo e(dateFormatted($estimate->due_date)); ?>

                        </label>
                    </span>
                    <?php echo trans('app.'.'expiry_date'); ?>
                </li>
                <li class="list-group-item">
                    <span class="pull-right">
                        <label class="label label-success">
                            <?php echo e(formatCurrency($estimate->currency, $estimate->amount)); ?>

                        </label>
                    </span>
                    <?php echo trans('app.'.'cost'); ?>
                </li>
            </ul>
            <?php echo parsedown($estimate->notes); ?>
        </div>
        <div class="modal-footer">
            <?php echo closeModalButton(); ?>

            <a href="<?php echo e(route('estimates.view', $estimate->id)); ?>" class="btn <?php echo e(themeButton()); ?>">
                <?php echo e(svg_image('solid/file-alt')); ?> <?php echo trans('app.'.'preview'); ?>
            </a>
        </div>
        <?php endif; ?>
        <?php if(isset($deal)): ?>
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><?php echo trans('app.'.'deal'); ?> <?php echo e($deal->title); ?></h4>
        </div>
        <div class="modal-body">
            <ul class="list-group no-radius">
                <li class="list-group-item">
                    <span class="pull-right">
                        <a href="<?php echo e(route('clients.view', $deal->organization)); ?>"><?php echo e($deal->company->name); ?></a>
                    </span>
                    <?php echo trans('app.'.'client'); ?>
                </li>
                <li class="list-group-item">
                    <span class="pull-right">
                        <?php echo e($deal->category->name); ?>

                    </span>
                    <?php echo trans('app.'.'stage'); ?>
                </li>
                <li class="list-group-item">
                    <span class="pull-right">
                        <label class="label label-danger">
                            <?php echo e(formatCurrency($deal->company->currency, $deal->deal_value)); ?>

                        </label>
                    </span>
                    <?php echo trans('app.'.'deal_value'); ?>
                </li>
                <li class="list-group-item">
                    <span class="pull-right">
                        <?php echo e(optional($deal->contact)->name); ?>

                    </span>
                    <?php echo trans('app.'.'contact_person'); ?>
                </li>
                <li class="list-group-item">
                    <span class="pull-right">
                        <label class="label label-info">
                            <?php echo e($deal->AsSource->name); ?>

                        </label>
                    </span>
                    <?php echo trans('app.'.'source'); ?>
                </li>
                <li class="list-group-item">
                    <span class="pull-right">
                        <label class="label label-success">
                            <?php echo e($deal->pipe->name); ?>

                        </label>
                    </span>
                    <?php echo trans('app.'.'pipeline'); ?>
                </li>
            </ul>
        </div>
        <div class="modal-footer">
            <?php echo closeModalButton(); ?>

            <a href="<?php echo e(route('deals.view', $deal->id)); ?>" class="btn <?php echo e(themeButton()); ?>">
                <?php echo e(svg_image('solid/laptop')); ?> <?php echo trans('app.'.'preview'); ?>
            </a>
        </div>
        <?php endif; ?>
        <?php if(isset($lead)): ?>
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><?php echo trans('app.'.'lead'); ?> <?php echo e($lead->name); ?></h4>
        </div>
        <div class="modal-body">
            <ul class="list-group no-radius">
                <li class="list-group-item">
                    <span class="pull-right">
                        <?php echo e($lead->company); ?>

                    </span>
                    <?php echo trans('app.'.'company_name'); ?>
                </li>
                <li class="list-group-item">
                    <span class="pull-right">
                        <?php echo e($lead->status->name); ?>

                    </span>
                    <?php echo trans('app.'.'stage'); ?>
                </li>
                <li class="list-group-item">
                    <span class="pull-right">
                        <label class="label label-danger">
                            <?php echo e(formatCurrency(get_option('default_currency'), $lead->lead_value)); ?>

                        </label>
                    </span>
                    <?php echo trans('app.'.'lead_value'); ?>
                </li>
                <li class="list-group-item">
                    <span class="pull-right">
                        <?php echo e($lead->AsSource->name); ?>

                    </span>
                    <?php echo trans('app.'.'source'); ?>
                </li>
                <li class="list-group-item">
                    <span class="pull-right">
                        <label class="label label-info">
                            <?php echo e($lead->agent->name); ?>

                        </label>
                    </span>
                    <?php echo trans('app.'.'sales_rep'); ?>
                </li>
                <li class="list-group-item">
                    <span class="pull-right">
                        <label class="label label-success">
                            <?php echo e(dateElapsed($lead->due_date)); ?>

                        </label>
                    </span>
                    <?php echo trans('app.'.'due_date'); ?>
                </li>
            </ul>
        </div>
        <div class="modal-footer">
            <?php echo closeModalButton(); ?>

            <a href="<?php echo e(route('leads.view', ['lead' => $lead->id])); ?>" class="btn <?php echo e(themeButton()); ?>">
                <?php echo e(svg_image('solid/laptop')); ?> <?php echo trans('app.'.'preview'); ?>
            </a>
        </div>
        <?php endif; ?>
        <?php if(isset($event)): ?>
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title h3"><?php echo e($event->event_name); ?></h4>
        </div>
        <div class="modal-body">
            <ul class="list-group no-radius">
                <li class="list-group-item">
                    <span class="pull-right">
                        <?php echo e($event->event_name); ?>

                    </span>
                    <?php echo trans('app.'.'event_name'); ?>
                </li>
                <li class="list-group-item">
                    <span class="pull-right">
                        <?php echo e(svg_image('solid/calendar-alt', 'text-danger')); ?> <?php echo e($event->calendar->name); ?>

                    </span>
                    <?php echo trans('app.'.'calendar'); ?>
                </li>
                <li class="list-group-item">
                    <span class="pull-right">
                        <label class="label label-success"><?php echo e(dateTimeFormatted($event->start_date)); ?></label>
                    </span>
                    <?php echo trans('app.'.'start_date'); ?>
                </li>
                <li class="list-group-item">
                    <span class="pull-right">
                        <label class="label label-danger"><?php echo e(dateTimeFormatted($event->end_date)); ?></label>
                    </span>
                    <?php echo trans('app.'.'end_date'); ?>
                </li>
                <?php if(!is_null($event->location)): ?>
                <li class="list-group-item">
                    <span class="pull-right">
                        <?php echo e(svg_image('solid/building')); ?> <label class="label label-danger"> <?php echo e($event->location); ?></label>
                    </span>
                    <?php echo trans('app.'.'venue'); ?>
                </li>
                <?php endif; ?>
                <li class="list-group-item">
                    <div class="text-sm pull-right">
                        <img src="<?php echo e($event->user->profile->photo); ?>" class="inline w-5 rounded-full">
                        <span class="align-middle"><?php echo e($event->user->name); ?></span>
                    </div>
                    <?php echo trans('app.'.'user'); ?>
                </li>
                <?php if($event->project_id > 0): ?>
                <li class="list-group-item">
                    <div class="pull-right">
                        <a class="font-semibold text-indigo-600" href="<?php echo e(route('projects.view', $event->project_id)); ?>">
                            <?php echo e($event->eventable->name); ?>

                        </a>
                    </div>
                    <?php echo trans('app.'.'project'); ?>
                </li>
                <?php endif; ?>
            </ul>
            <?php echo parsedown($event->description); ?>
            <div class="line line-dashed line-lg pull-in"></div>
            <?php if(!is_null($event->attendees)): ?>
            <?php $__currentLoopData = $event->attendees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a class="thumb-sm avatar" data-rel="tooltip" title="<?php echo e(fullname($user_id)); ?>">
                <img src="<?php echo e(avatar($user_id)); ?>" class="img-rounded shadowed">
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
        <div class="modal-footer">

            <?php if(can('events_update') || $event->user_id == Auth::id() || isAdmin()): ?>
            <?php echo closeModalButton(); ?>

            <a href="<?php echo e(route('calendar.edit', $event->id)); ?>" class="btn <?php echo e(themeButton()); ?> text-white" data-toggle="ajaxModal" data-dismiss="modal"><?php echo e(svg_image('solid/pencil-alt')); ?>
                <?php echo trans('app.'.'make_changes'); ?>
            </a>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('[data-rel="tooltip"]').tooltip();
        });
</script><?php /**PATH C:\xampp2\htdocs\NETIC360APP\Modules\Calendar\Providers/../Resources/views/modal/event.blade.php ENDPATH**/ ?>