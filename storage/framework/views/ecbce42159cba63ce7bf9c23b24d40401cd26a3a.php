

<?php $__env->startSection('content'); ?>
<section id="content" class="bg-indigo-100">
    <section class="vbox">
        <header class="px-2 py-2 bg-white border-b border-gray-400 panel-heading">
            <div class="flex justify-between text-gray-500">
                <div>
                    <div class="btn-group">
                        <button class="<?php echo e(themeButton()); ?> dropdown-toggle" data-toggle="dropdown">
                            <?php echo trans('app.'.'filter'); ?>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo e(route('expenses.index', ['filter' => 'billed'])); ?>"><?php echo trans('app.'.'billed'); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('expenses.index', ['filter' => 'billable'])); ?>"><?php echo trans('app.'.'billable'); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('expenses.index', ['filter' => 'recurring'])); ?>"><?php echo trans('app.'.'recurring'); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('expenses.index', ['filter' => 'archived'])); ?>"><?php echo trans('app.'.'archived'); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('expenses.index')); ?>"><?php echo trans('app.'.'all'); ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('expenses_create')): ?>
                    <a class="btn <?php echo e(themeButton()); ?>" data-placement="bottom" data-rel="tooltip" data-toggle="ajaxModal" href="<?php echo e(route('expenses.create')); ?>"
                        title="<?php echo trans('app.'.'create'); ?>">
                        <?php echo e(svg_image('solid/plus')); ?> <?php echo trans('app.'.'create'); ?>
                    </a>
                    <a class="btn <?php echo e(themeButton()); ?>" data-placement="bottom" data-rel="tooltip" data-toggle="ajaxModal" href="<?php echo e(route('expenses.import')); ?>"
                        title="<?php echo trans('app.'.'import'); ?>">
                        <?php echo e(svg_image('solid/cloud-upload-alt')); ?> <?php echo trans('app.'.'import'); ?>
                    </a>
                    <?php endif; ?>
                    <?php if (\Illuminate\Support\Facades\Blade::check('admin')): ?>
                    <a href="<?php echo e(route('expenses.category.show')); ?>" class="btn <?php echo e(themeButton()); ?>" data-toggle="ajaxModal" data-rel="tooltip" title="<?php echo trans('app.'.'category'); ?>"
                        data-placement="bottom">
                        <?php echo e(svg_image('solid/cogs')); ?>
                    </a>
                    <a class="btn <?php echo e(themeButton()); ?>" data-placement="bottom" data-rel="tooltip" href="<?php echo e(route('expenses.export')); ?>" title="<?php echo trans('app.'.'download'); ?>">
                        <?php echo e(svg_image('solid/cloud-download-alt')); ?> CSV
                    </a>
                    <?php endif; ?>
                </div>


            </div>
        </header>

        <section class="scrollable wrapper">
            <section class="panel panel-default">

                <?php if (\Illuminate\Support\Facades\Blade::check('admin')): ?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('expense.stats-widget')->html();
} elseif ($_instance->childHasBeenRendered('nHstyqX')) {
    $componentId = $_instance->getRenderedChildComponentId('nHstyqX');
    $componentTag = $_instance->getRenderedChildComponentTagName('nHstyqX');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('nHstyqX');
} else {
    $response = \Livewire\Livewire::mount('expense.stats-widget');
    $html = $response->html();
    $_instance->logRenderedChild('nHstyqX', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                <?php endif; ?>

                <form id="frm-expense" method="POST">
                    <input type="hidden" name="module" value="expenses">

                    <div class="table-responsive">
                        <table class="table table-striped" id="expenses-table">
                            <thead>
                                <tr>
                                    <th class="hide"></th>
                                    <th class="no-sort">
                                        <label>
                                            <input name="select_all" value="1" id="select-all" type="checkbox" />
                                            <span class="label-text"></span>
                                        </label>
                                    </th>
                                    <th class=""><?php echo trans('app.'.'code'); ?></th>
                                    <th class=""><?php echo trans('app.'.'client'); ?></th>
                                    <th class=""><?php echo trans('app.'.'project'); ?></th>
                                    <th class="col-currency"><?php echo trans('app.'.'amount'); ?></th>
                                    <th class=""><?php echo trans('app.'.'billed'); ?></th>
                                    <th class=""><?php echo trans('app.'.'category'); ?></th>
                                    <th class="col-date"><?php echo trans('app.'.'expense_date'); ?></th>
                                </tr>
                            </thead>
                        </table>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('expenses_update')): ?>
                        <button type="submit" class="btn m-1 <?php echo e(themeButton()); ?>" value="bulk-bill">
                            <span class=""><?php echo e(svg_image('solid/check-circle')); ?> <?php echo trans('app.'.'billed'); ?></span>
                        </button>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('expenses_update')): ?>
                        <button type="submit" class="btn m-1 <?php echo e(themeButton()); ?>" value="bulk-archive" data-rel="tooltip" title="<?php echo trans('app.'.'archive'); ?>">
                            <?php echo e(svg_image('solid/archive')); ?>
                        </button>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('expenses_delete')): ?>
                        <button type="submit" class="btn m-1 <?php echo e(themeButton()); ?>" value="bulk-delete" data-rel="tooltip" title="<?php echo trans('app.'.'delete'); ?>">
                            <?php echo e(svg_image('solid/trash-alt')); ?>
                        </button>
                        <?php endif; ?>
                    </div>
                </form>
            </section>
        </section>
    </section>

    <a class="hide nav-off-screen-block" data-target="#nav" data-toggle="class:nav-off-screen" href="#">
    </a>
</section>

<?php $__env->startPush('pagestyle'); ?>
<?php echo $__env->make('stacks.css.datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('pagescript'); ?>
<?php echo $__env->make('stacks.js.datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>
    $(function() {
    $('#expenses-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '<?php echo e(route('expenses.data')); ?>',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                "filter": '<?php echo e($filter); ?>',
            }
        },
        order: [[ 0, "desc" ]],
        columns: [
            { data: 'id', name: 'id' },
            { data: 'chk', name: 'chk', orderable: false, searchable: false, sortable: false },
            { data: 'code', name: 'code' },
            { data: 'client_id', name: 'company.name' },
            { data: 'project_id', name: 'AsProject.name' },
            { data: 'cost', name: 'amount', orderable: false },
            { data: 'invoiced', name: 'invoiced' },
            { data: 'category', name: 'AsCategory.name' },
            { data: 'expense_date', name: 'expense_date' }
        ]
    });

    $("#frm-expense button").click(function(ev){
        ev.preventDefault();
    if($(this).attr("value")=="bulk-delete"){
            var form = $("#frm-expense").serialize();
            axios.post('<?php echo e(route('expenses.bulk.delete')); ?>', form)
                .then(function (response) {
                    toastr.warning(response.data.message, '<?php echo trans('app.'.'response_status'); ?> ');
                    window.location.href = response.data.redirect;
            })
            .catch(function (error) {
                showErrors(error);
            });
    }

    if($(this).attr("value")=="bulk-bill"){
        var form = $("#frm-expense").serialize();
        axios.post('<?php echo e(route('expenses.bulk.bill')); ?>', form)
        .then(function (response) {
        toastr.success(response.data.message, '<?php echo trans('app.'.'response_status'); ?> ');
            window.location.href = response.data.redirect;
        })
        .catch(function (error) {
            showErrors(error);
        });
    }

    if($(this).attr("value")=="bulk-archive"){
        var form = $("#frm-expense").serialize();
        axios.post('<?php echo e(route('archive.process')); ?>', form)
        .then(function (response) {
            toastr.warning(response.data.message, '<?php echo trans('app.'.'response_status'); ?> ');
            window.location.href = response.data.redirect;
        })
        .catch(function (error) {
            showErrors(error);
        });
    }
    
    });
    
    function showErrors(error){
        var errors = error.response.data.errors;
        var errorsHtml= '';
        $.each( errors, function( key, value ) {
        errorsHtml += '<li>' + value[0] + '</li>';
        });
        toastr.error( errorsHtml , '<?php echo trans('app.'.'response_status'); ?> ');
    }

});
</script>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\NETIC360APP\Modules\Expenses\Providers/../Resources/views/index.blade.php ENDPATH**/ ?>