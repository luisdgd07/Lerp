<div class="px-3 py-1 border-b">

    <div class="mt-1 grid grid-cols-1 bg-white overflow-hidden md:grid-cols-3">
        <div>
            <div class="px-4 py-3 sm:p-3">
                <dl>
                    <dt class="text-sm font-normal text-gray-600 uppercase" data-toggle="tooltip"
                        title="<?php echo e(dateFormatted(now()->startOfWeek())); ?> - <?php echo e(dateFormatted(now()->endOfWeek())); ?>">
                        <?php echo trans('app.'.'billable'); ?> <?php echo trans('app.'.'this_week'); ?>
                    </dt>
                    <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
                        <div class="flex items-baseline text-2xl leading-8 font-semibold text-indigo-500">
                            <?php echo metrics('expenses_this_week'); ?>
                            <span class="ml-2 text-sm leading-5 font-medium text-gray-500">
                                <?php echo e(get_option('default_currency')); ?>

                            </span>
                        </div>
                    </dd>
                </dl>
            </div>
        </div>
        <div class="">
            <div class="px-4 py-3 sm:p-3">
                <dl>
                    <dt class="text-sm font-normal text-gray-600 uppercase" data-toggle="tooltip"
                        title="<?php echo trans('app.'.'billed'); ?>">
                        <?php echo trans('app.'.'billed'); ?> <?php echo trans('app.'.'expenses'); ?>
                    </dt>
                    <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
                        <div class="flex items-baseline text-2xl leading-8 font-semibold text-green-500">
                            <?php echo metrics('expenses_billed'); ?>
                            <span class="ml-2 text-sm leading-5 font-medium text-gray-500">
                                <?php echo e(get_option('default_currency')); ?>

                            </span>
                        </div>

                    </dd>
                </dl>
            </div>
        </div>
        <div class="">
            <div class="px-4 py-3 sm:p-3">
                <dl>
                    <dt class="text-sm font-normal text-gray-600 uppercase" data-toggle="tooltip"
                        title="<?php echo trans('app.'.'unbillable'); ?>">
                        <?php echo trans('app.'.'unbillable'); ?>
                    </dt>
                    <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
                        <div class="flex items-baseline text-2xl leading-8 font-semibold text-red-500">
                            <?php echo metrics('expenses_unbillable'); ?>
                            <span class="ml-2 text-sm leading-5 font-medium text-gray-500">
                                <?php echo e(get_option('default_currency')); ?>

                            </span>
                        </div>



                    </dd>
                </dl>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp2\htdocs\NETIC360APP\resources\views/livewire/expense/stats-widget.blade.php ENDPATH**/ ?>