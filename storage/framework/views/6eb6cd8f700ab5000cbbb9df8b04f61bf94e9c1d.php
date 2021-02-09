
<?php $__env->startSection('content'); ?>
<section id="content" class="bg-indigo-100">
    <section class="vbox">
        <header class="px-2 py-2 bg-white border-b border-gray-400 panel-heading">

            <div class="flex justify-between text-gray-500">
                <div>
                    <div class="btn-group">
                        <button class="<?php echo e(themeButton()); ?> dropdown-toggle" data-toggle="dropdown">
                            <?php echo trans('app.'.'filter'); ?> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo e(route('invoices.index', ['filter' => 'paid'])); ?>"><?php echo trans('app.'.'paid'); ?> </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('invoices.index', ['filter' => 'unpaid'])); ?>"><?php echo trans('app.'.'not_paid'); ?> </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('invoices.index', ['filter' => 'partial'])); ?>"><?php echo trans('app.'.'partially_paid'); ?>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('invoices.index', ['filter' => 'archived'])); ?>"><?php echo e(langapp('archived')); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('invoices.index', ['filter' => 'draft'])); ?>"><?php echo trans('app.'.'draft'); ?> </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('invoices.index', ['filter' => 'unsent'])); ?>"><?php echo e(langapp('unsent')); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('invoices.index', ['filter' => 'sent'])); ?>"><?php echo trans('app.'.'sent'); ?> </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('invoices.index', ['filter' => 'viewed'])); ?>"><?php echo e(langapp('viewed')); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('invoices.index', ['filter' => 'overdue'])); ?>"><?php echo trans('app.'.'overdue'); ?> </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('invoices.index', ['filter' => 'recurring'])); ?>"><?php echo trans('app.'.'recurring'); ?> </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('invoices.index', ['filter' => 'cancelled'])); ?>"><?php echo trans('app.'.'cancelled'); ?> </a>
                            </li>

                            <li>
                                <a href="<?php echo e(route('invoices.index')); ?>"><?php echo trans('app.'.'all'); ?></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoices_create')): ?>
                    <a href="<?php echo e(route('invoices.create')); ?>" class="btn <?php echo e(themeButton()); ?>">
                        <?php echo e(svg_image('solid/plus')); ?> <?php echo trans('app.'.'create'); ?>
                    </a>
                    <?php endif; ?>
                    <?php if (\Illuminate\Support\Facades\Blade::check('admin')): ?>
                    <div class="btn-group">
                        <button class="<?php echo e(themeButton()); ?> dropdown-toggle" data-toggle="dropdown" data-toggle="tooltip" title="<?php echo trans('app.'.'export'); ?>"><?php echo e(svg_image('solid/cloud-download-alt')); ?>
                            CSV
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo e(route('invoices.export')); ?>"><?php echo trans('app.'.'invoices'); ?> </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('items.export', ['module' => 'invoices'])); ?>"><?php echo trans('app.'.'items'); ?> </a>
                            </li>

                        </ul>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </header>
        <section class="scrollable wrapper">
            <section class="panel panel-default">

                <form id="frm-invoice" method="POST">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    <input type="hidden" name="module" value="invoices">

                    <div class="table-responsive">
                        <table class="table table-striped" id="invoices-table">
                            <thead>
                                <tr>
                                    <th class="hide display-none"></th>
                                    <th class="no-sort">
                                        <label>
                                            <input name="select_all" value="1" id="select-all" type="checkbox" />
                                            <span class="label-text"></span>
                                        </label>
                                    </th>
                                    <th class=""><?php echo trans('app.'.'invoice'); ?> </th>
                                    <th class=""><?php echo trans('app.'.'client_name'); ?> </th>
                                    <th class=""><?php echo trans('app.'.'status'); ?> </th>
                                    <th class="col-date"><?php echo trans('app.'.'due_date'); ?> </th>
                                    <th class="col-currency"><?php echo trans('app.'.'amount'); ?> </th>
                                    <th class="col-currency"><?php echo trans('app.'.'balance'); ?> </th>
                                </tr>
                            </thead>

                        </table>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoices_send')): ?>
                        <button type="submit" class="btn m-1 <?php echo e(themeButton()); ?>" value="bulk-send">
                            <?php echo e(svg_image('solid/envelope-open')); ?> <?php echo trans('app.'.'send'); ?>
                        </button>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoices_create')): ?>
                        <button type="submit" class="btn m-1 <?php echo e(themeButton()); ?>" value="bulk-merge">
                            <?php echo e(svg_image('regular/object-group')); ?> <?php echo trans('app.'.'merge'); ?>
                        </button>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoices_pay')): ?>
                        <button type="submit" class="btn m-1 <?php echo e(themeButton()); ?>" value="bulk-pay">
                            <?php echo e(svg_image('solid/money-check-alt')); ?> <?php echo trans('app.'.'mark_as_paid'); ?>
                        </button>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoices_update')): ?>
                        <button type="submit" class="btn m-1 <?php echo e(themeButton()); ?>" value="bulk-archive" data-toggle="tooltip" title="<?php echo trans('app.'.'archive'); ?>">
                            <?php echo e(svg_image('solid/archive')); ?>
                        </button>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoices_delete')): ?>
                        <button type="submit" class="btn m-1 <?php echo e(themeButton()); ?>" value="bulk-delete" data-toggle="tooltip" title="<?php echo trans('app.'.'delete'); ?>">
                            <?php echo e(svg_image('solid/trash-alt')); ?>
                        </button>
                        <?php endif; ?>


                    </div>
                </form>
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
    $('#invoices-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: '<?php echo route('invoices.data'); ?>',
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
    { data: 'reference_no', name: 'reference_no' },
    { data: 'client_id', name: 'company.name' },
    { data: 'status', name: 'status' },
    { data: 'due_date', name: 'due_date' },
    { data: 'payable', name: 'payable' },
    { data: 'balance', name: 'balance' }
    ]
    });
    $("#frm-invoice button").click(function(ev){
    ev.preventDefault();
    if($(this).attr("value")=="bulk-delete"){
    var form = $("#frm-invoice").serialize();
    axios.post('<?php echo e(route('invoices.bulk.delete')); ?>', form)
    .then(function (response) {
    toastr.success(response.data.message, '<?php echo trans('app.'.'response_status'); ?>');
    window.location.href = response.data.redirect;
    })
    .catch(function (error) {
        showErrors(error);
    });
    }
    if($(this).attr("value")=="bulk-send"){
        var form = $("#frm-invoice").serialize();
        axios.post('<?php echo e(route('invoices.bulk.send')); ?>', form)
        .then(function (response) {
        toastr.success(response.data.message, '<?php echo trans('app.'.'response_status'); ?>');
        window.location.href = response.data.redirect;
        })
        .catch(function (error) {
            showErrors(error);
        });
    }
    if($(this).attr("value")=="bulk-merge"){
        var form = $("#frm-invoice").serialize();
        axios.post('<?php echo e(route('invoices.bulk.merge')); ?>', form)
        .then(function (response) {
            toastr.success(response.data.message, '<?php echo trans('app.'.'response_status'); ?>');
            window.location.href = response.data.redirect;
        })
        .catch(function (error) {
            showErrors(error);
        });
    }
    if($(this).attr("value")=="bulk-pay"){
    var form = $("#frm-invoice").serialize();
    axios.post('<?php echo e(route('invoices.bulk.pay')); ?>', form)
    .then(function (response) {
    toastr.success(response.data.message, '<?php echo trans('app.'.'response_status'); ?>');
    window.location.href = response.data.redirect;
    })
    .catch(function (error) {
        showErrors(error);
    });
    }

    if($(this).attr("value")=="bulk-archive"){
    var form = $("#frm-invoice").serialize();
    axios.post('<?php echo e(route('archive.process')); ?>', form)
    .then(function (response) {
        toastr.success(response.data.message, '<?php echo trans('app.'.'response_status'); ?>');
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\NETIC360APP\Modules\Invoices\Providers/../Resources/views/index.blade.php ENDPATH**/ ?>