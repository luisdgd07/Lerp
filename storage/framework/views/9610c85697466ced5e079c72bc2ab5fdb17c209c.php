
<?php $__env->startSection('content'); ?>
<section id="content" class="bg-indigo-100">
    <section class="vbox">
        <header class="px-2 pb-2 bg-white border-b border-gray-400 panel-heading">
            <div class="flex justify-between text-gray-500">
                <div>
                    <a href="<?php echo e(route('tasks.template')); ?>" data-toggle="ajaxModal" class="<?php echo e(themeButton()); ?>">
                        <?php echo e(svg_image('solid/plus')); ?> <?php echo trans('app.'.'tasks'); ?>
                    </a>

                </div>
                <div>
                    <a href="<?php echo e(route('items.create')); ?>" data-toggle="ajaxModal" class="<?php echo e(themeButton()); ?>">
                        <?php echo e(svg_image('solid/plus')); ?> <?php echo trans('app.'.'items'); ?>
                    </a>
                </div>
            </div>
        </header>
        <section class="scrollable wrapper">

            <div class="tabbable">
                <ul class="nav nav-tabs nav-tabs-highlight">
                    <li class="active"><a href="#itemstab" data-toggle="tab">Product Items</a></li>
                    <li><a href="#taskstab" data-toggle="tab">Task Templates</a></li>

                </ul>
                <div class="tab-content">

                    <div class="tab-pane active" id="itemstab">

                        <section class="panel panel-default">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-item-template">
                                    <thead>
                                        <tr>
                                            <th class="hide"></th>
                                            <th><?php echo trans('app.'.'product'); ?> </th>
                                            <th class="col-currency"><?php echo e(itemUnit()); ?></th>
                                            <th><?php echo trans('app.'.'tax_rate'); ?> </th>
                                            <th><?php echo trans('app.'.'qty'); ?> </th>
                                            <th class="no-sort"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = Modules\Items\Entities\Item::templates()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="display-none"><?php echo e($item->id); ?></td>
                                            <td>
                                                <a class="<?php echo e(themeLinks('font-semibold')); ?>" href="#" data-original-title="<?php echo e($item->description); ?>" data-toggle="tooltip"
                                                    data-placement="right" title="">
                                                    <?php echo e(str_limit($item->name, 50)); ?>

                                                </a>
                                            </td>
                                            <td>
                                                <?php echo e(formatCurrency(get_option('default_currency'), $item->unit_cost)); ?></td>
                                            <td><?php echo e($item->tax_rate); ?>%</td>
                                            <td><?php echo e($item->quantity); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('items.edit', $item->id)); ?>" data-toggle="ajaxModal" class="m-l-xs">
                                                    <?php echo e(svg_image('solid/pencil-alt')); ?>
                                                </a>
                                                <a href="<?php echo e(route('items.delete', $item->id)); ?>" data-toggle="ajaxModal" class="m-l-xs">
                                                    <?php echo e(svg_image('solid/trash-alt')); ?>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </section>
                    </div>
                    <div class="tab-pane" id="taskstab">
                        <section class="panel panel-default">

                            <div class="table-responsive">
                                <table id="table-tasks-template" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th><?php echo trans('app.'.'task_name'); ?></th>
                                            <th><?php echo trans('app.'.'hourly_rate'); ?></th>
                                            <th><?php echo trans('app.'.'visible'); ?></th>
                                            <th><?php echo trans('app.'.'estimated_hours'); ?></th>
                                            <th class="no-sort"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = Modules\Tasks\Entities\Task::templates()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <a class="<?php echo e(themeLinks('font-semibold')); ?>" href="#" data-original-title="<?php echo e($task->description); ?>" data-toggle="tooltip"
                                                    data-placement="right">
                                                    <?php echo e(str_limit($task->name, 50)); ?>

                                                </a>
                                            </td>
                                            <td class=""><?php echo e($task->hourly_rate); ?>/ hr</td>
                                            <td><?php echo e($task->visible === 1 ? langapp('yes') : langapp('no')); ?></td>
                                            <td><strong><?php echo e($task->estimated_hours); ?> <?php echo trans('app.'.'hours'); ?> </strong></td>
                                            <td>
                                                <a href="<?php echo e(route('tasks.editTemplate', $task->id)); ?>" data-toggle="ajaxModal" class="m-l-xs">
                                                    <?php echo e(svg_image('solid/pencil-alt')); ?>
                                                </a>
                                                <a href="<?php echo e(route('tasks.deleteTemplate', $task->id)); ?>" data-toggle="ajaxModal" class="m-l-xs">
                                                    <?php echo e(svg_image('solid/trash-alt')); ?>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>

                        </section>

                    </div>

                </div>
            </div>

        </section>
    </section>
</section>
<a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
</section>

<?php $__env->startPush('pagestyle'); ?>
<?php echo $__env->make('stacks.css.datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('pagescript'); ?>
<?php echo $__env->make('stacks.js.datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
    $(function() {
$('#table-item-template').DataTable({
    processing: true,
    order: [[ 0, "desc" ]],
});
$('#table-tasks-template').DataTable({
    processing: true,
    order: [[ 0, "desc" ]],
});
});
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\NETIC360APP\Modules\Items\Providers/../Resources/views/index.blade.php ENDPATH**/ ?>