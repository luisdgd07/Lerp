
<?php $__env->startSection('content'); ?>
<section id="content" class="bg-gray-100">
    <section class="hbox stretch">
        <aside>
            <section class="vbox">
                <header class="px-2 pb-2 bg-white border-b border-gray-400 panel-heading">
                    <div class="flex justify-between text-gray-700">
                        <div class="text-lg font-semibold">
                            <?php echo trans('app.'.'search_results_for_tag',['keyword' => $keyword]); ?>
                        </div>
                    </div>
                </header>

                <section class="p-4 scrollable ie-details">
                    <div class="row m-b">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('menu_projects')): ?>
                        <div class="col-sm-4">
                            <header class="text-gray-700 uppercase panel-heading"><?php echo trans('app.'.'projects'); ?></header>
                            <div class="dd" id="nestable-projects">
                                <ol class="dd-list">
                                    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="dd-item" data-id="project-<?php echo e($project->id); ?>">
                                        <div class="dd-handle"><?php echo e(svg_image('solid/tag', 'text-dracula')); ?> <a href="<?php echo e(route('projects.view', $project->id)); ?>"><?php echo e($project->name); ?></a>
                                        </div>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ol>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('menu_invoices')): ?>
                        <div class="col-sm-4">
                            <header class="text-gray-700 uppercase panel-heading"><?php echo trans('app.'.'invoices'); ?></header>
                            <div class="dd" id="nestable-invoices">
                                <ol class="dd-list">
                                    <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="dd-item" data-id="invoice-<?php echo e($invoice->id); ?>">
                                        <div class="dd-handle"><?php echo e(svg_image('solid/tag', 'text-primary')); ?> <a href="<?php echo e(route('invoices.view', $invoice->id)); ?>"><?php echo e($invoice->name); ?></a>
                                        </div>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ol>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('menu_estimates')): ?>
                        <div class="col-sm-4">
                            <header class="text-gray-700 uppercase panel-heading"><?php echo trans('app.'.'estimates'); ?></header>
                            <div class="dd" id="nestable-estimates">
                                <ol class="dd-list">
                                    <?php $__currentLoopData = $estimates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estimate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="dd-item" data-id="estimate-<?php echo e($estimate->id); ?>">
                                        <div class="dd-handle"><?php echo e(svg_image('solid/tag', 'text-danger')); ?> <a href="<?php echo e(route('estimates.view', $estimate->id)); ?>"><?php echo e($estimate->name); ?></a>
                                        </div>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ol>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="row m-b">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('menu_deals')): ?>
                        <div class="col-sm-4">
                            <header class="text-gray-700 uppercase panel-heading"><?php echo trans('app.'.'deals'); ?></header>
                            <div class="dd" id="nestable-deals">
                                <ol class="dd-list">
                                    <?php $__currentLoopData = $deals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="dd-item" data-id="deal-<?php echo e($deal->id); ?>">
                                        <div class="dd-handle"><?php echo e(svg_image('solid/tag', 'text-dracula')); ?> <a href="<?php echo e(route('deals.view', $deal->id)); ?>"><?php echo e($deal->title); ?></a></div>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ol>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('menu_leads')): ?>
                        <div class="col-sm-4">
                            <header class="text-gray-700 uppercase panel-heading"><?php echo trans('app.'.'leads'); ?></header>
                            <div class="dd" id="nestable-leads">
                                <ol class="dd-list">
                                    <?php $__currentLoopData = $leads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lead): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="dd-item" data-id="invoice-<?php echo e($lead->id); ?>">
                                        <div class="dd-handle"><?php echo e(svg_image('solid/tag', 'text-warning')); ?> <a href="<?php echo e(route('leads.view', $lead->id)); ?>"><?php echo e($lead->name); ?></a></div>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ol>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('menu_expenses')): ?>
                        <div class="col-sm-4">
                            <header class="text-gray-700 uppercase panel-heading"><?php echo trans('app.'.'expenses'); ?></header>
                            <div class="dd" id="nestable-expenses">
                                <ol class="dd-list">
                                    <?php $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="dd-item" data-id="expense-<?php echo e($expense->id); ?>">
                                        <div class="dd-handle"><?php echo e(svg_image('solid/tag', 'text-info')); ?> <a href="<?php echo e(route('expenses.view', $expense->id)); ?>"><?php echo e($expense->name); ?></a></div>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ol>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>


                    <div class="row m-b">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('menu_creditnotes')): ?>
                        <div class="col-sm-4">
                            <header class="text-gray-700 uppercase panel-heading"><?php echo trans('app.'.'credits'); ?></header>
                            <div class="dd" id="nestable-credits">
                                <ol class="dd-list">
                                    <?php $__currentLoopData = $credits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $credit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="dd-item" data-id="credit-<?php echo e($credit->id); ?>">
                                        <div class="dd-handle"><?php echo e(svg_image('solid/tag', 'text-dark')); ?> <a href="<?php echo e(route('creditnotes.view', $credit->id)); ?>"><?php echo e($credit->name); ?></a></div>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ol>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('menu_projects')): ?>
                        <div class="col-sm-4">
                            <header class="text-gray-700 uppercase panel-heading"><?php echo trans('app.'.'milestones'); ?></header>
                            <div class="dd" id="nestable-milestones">
                                <ol class="dd-list">
                                    <?php $__currentLoopData = $milestones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $milestone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="dd-item" data-id="milestone-<?php echo e($milestone->id); ?>">
                                        <div class="dd-handle"><?php echo e(svg_image('solid/tag', 'text-dracula')); ?> <a
                                                href="<?php echo e(route('projects.view', ['project' => $milestone->project_id, 'tab' => 'milestones', 'item' => $milestone->id])); ?>"><?php echo e($milestone->milestone_name); ?></a>
                                        </div>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ol>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('menu_payments')): ?>
                        <div class="col-sm-4">
                            <header class="text-gray-700 uppercase panel-heading"><?php echo trans('app.'.'payments'); ?></header>
                            <div class="dd" id="nestable-payments">
                                <ol class="dd-list">
                                    <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="dd-item" data-id="payment-<?php echo e($payment->id); ?>">
                                        <div class="dd-handle"><?php echo e(svg_image('solid/tag', 'text-success')); ?> <a href="<?php echo e(route('payments.view', $payment->id)); ?>"><?php echo e($payment->code); ?></a>
                                        </div>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ol>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="row m-b">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('menu_clients')): ?>
                        <div class="col-sm-4">
                            <header class="text-gray-700 uppercase panel-heading"><?php echo trans('app.'.'clients'); ?></header>
                            <div class="dd" id="nestable-clients">
                                <ol class="dd-list">
                                    <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="dd-item" data-id="client-<?php echo e($client->id); ?>">
                                        <div class="dd-handle"><?php echo e(svg_image('solid/tag', 'text-primary')); ?> <a href="<?php echo e(route('clients.view', $client->id)); ?>"><?php echo e($client->name); ?></a></div>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ol>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('menu_tickets')): ?>
                        <div class="col-sm-4">
                            <header class="text-gray-700 uppercase panel-heading"><?php echo trans('app.'.'tickets'); ?></header>
                            <div class="dd" id="nestable-tickets">
                                <ol class="dd-list">
                                    <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="dd-item" data-id="ticket-<?php echo e($ticket->id); ?>">
                                        <div class="dd-handle"><?php echo e(svg_image('solid/tag', 'text-dracula')); ?> <a href="<?php echo e(route('tickets.view', $ticket->id)); ?>"><?php echo e($ticket->subject); ?></a>
                                        </div>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ol>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('menu_tasks')): ?>
                        <div class="col-sm-4">
                            <header class="text-gray-700 uppercase panel-heading"><?php echo trans('app.'.'tasks'); ?></header>
                            <div class="dd" id="nestable-tasks">
                                <ol class="dd-list">
                                    <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="dd-item" data-id="task-<?php echo e($task->id); ?>">
                                        <div class="dd-handle"><?php echo e(svg_image('solid/tag', 'text-danger')); ?> <a
                                                href="<?php echo e(route('projects.view', ['project' => $task->project_id, 'tab' => 'tasks', 'item' => $task->id])); ?>"><?php echo e($task->name); ?></a>
                                        </div>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ol>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="row m-b">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('menu_users')): ?>
                        <div class="col-sm-4">
                            <header class="text-gray-700 uppercase panel-heading"><?php echo trans('app.'.'users'); ?></header>
                            <div class="dd" id="nestable-users">
                                <ol class="dd-list">
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="dd-item" data-id="user-<?php echo e($user->id); ?>">
                                        <div class="dd-handle"><?php echo e(svg_image('solid/tag', 'text-primary')); ?> <a href="<?php echo e(route('users.view', $user->id)); ?>"><?php echo e($user->name); ?></a></div>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ol>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('menu_contracts')): ?>
                        <div class="col-sm-4">
                            <header class="text-gray-700 uppercase panel-heading"><?php echo trans('app.'.'contracts'); ?></header>
                            <div class="dd" id="nestable-contracts">
                                <ol class="dd-list">
                                    <?php $__currentLoopData = $contracts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contract): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="dd-item" data-id="contract-<?php echo e($contract->id); ?>">
                                        <div class="dd-handle"><?php echo e(svg_image('solid/tag', 'text-primary')); ?> <a
                                                href="<?php echo e(route('contracts.view', $contract->id)); ?>"><?php echo e($contract->contract_title); ?></a></div>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ol>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>


                    </div>
                </section>
        </aside>

    </section>
    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
</section>
<?php $__env->startPush('pagestyle'); ?>
<link rel="stylesheet" href="<?php echo e(getAsset('plugins/nestable/nestable.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\NETIC360APP\resources\views/searches.blade.php ENDPATH**/ ?>