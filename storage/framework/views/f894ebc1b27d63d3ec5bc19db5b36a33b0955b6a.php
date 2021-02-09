
<?php $__env->startSection('content'); ?>
<section id="content">
    <section class="vbox">
        <header class="px-2 pb-2 bg-white border-b border-gray-400 panel-heading">
            <div class="flex justify-between text-gray-500">
                <div>
                    <div class="btn-group">
                        <button class="<?php echo e(themeButton()); ?> dropdown-toggle" data-toggle="dropdown">
                            <?php echo trans('app.'.'filter'); ?>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo e(route('projects.index', ['filter' => 'active'])); ?>"><?php echo trans('app.'.'active'); ?> </a></li>
                            <li><a href="<?php echo e(route('projects.index', ['filter' => 'on_hold'])); ?>"><?php echo trans('app.'.'on_hold'); ?> </a></li>
                            <li><a href="<?php echo e(route('projects.index', ['filter' => 'done'])); ?>"><?php echo trans('app.'.'done'); ?></a></li>
                            <li><a href="<?php echo e(route('projects.index', ['filter' => 'archived'])); ?>"><?php echo trans('app.'.'archived'); ?></a></li>
                            <li><a href="<?php echo e(route('projects.index')); ?>"><?php echo trans('app.'.'all'); ?></a></li>
                        </ul>
                    </div>
                    <?php if (\Illuminate\Support\Facades\Blade::check('admin')): ?>
                    <a href="<?php echo e(route('projects.index', ['filter' => 'templates'])); ?>" class="btn <?php echo e(themeButton()); ?> ml-1">
                        <?php echo e(svg_image('solid/recycle')); ?> <?php echo trans('app.'.'templates'); ?></a>
                    <?php endif; ?>
                </div>
                <div>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('projects_create')): ?>
                    <a href="<?php echo e(route('projects.create')); ?>" class="btn <?php echo e(themeButton()); ?>">
                        <?php echo e(svg_image('solid/plus')); ?> <?php echo trans('app.'.'create'); ?> </a>
                    <?php endif; ?>
                </div>
            </div>
        </header>

        <section class="bg-indigo-100 scrollable wrapper">
            <section class="panel panel-default">


                <form id="frm-project" method="POST">
                    <input type="hidden" name="module" value="projects">
                    <div class="table-responsive">
                        <table class="table table-striped m-b-none" id="projects-table">
                            <thead>
                                <tr>
                                    <th class="hide"></th>
                                    <th class="no-sort">
                                        <label>
                                            <input name="select_all" value="1" id="select-all" type="checkbox" />
                                            <span class="label-text"></span>
                                        </label>
                                    </th>
                                    <th class=""><?php echo trans('app.'.'name'); ?></th>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('projects_view_clients')): ?>
                                    <th class="no-sort"><?php echo trans('app.'.'client'); ?></th>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('projects_view_team')): ?>
                                    <th class="no-sort"><?php echo trans('app.'.'team_members'); ?></th>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('projects_view_used_budget')): ?>
                                    <th class="col-currency"><?php echo trans('app.'.'budget'); ?></th>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('projects_view_hours')): ?>
                                    <th class=""><?php echo trans('app.'.'total_time'); ?> </th>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('projects_view_cost')): ?>
                                    <th class="col-currency"><?php echo trans('app.'.'amount'); ?></th>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('projects_view_expenses')): ?>
                                    <th class="col-currency"><?php echo trans('app.'.'expenses'); ?> </th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoices_create')): ?>
                    <button type="submit" class="btn m-1 <?php echo e(themeButton()); ?>" value="bulk-invoice">
                        <span class=""><?php echo e(svg_image('solid/file-invoice-dollar')); ?> <?php echo trans('app.'.'invoice'); ?></span>
                    </button>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('projects_delete')): ?>
                    <button type="submit" class="btn m-1 <?php echo e(themeButton()); ?>" value="bulk-archive">
                        <span class=""><?php echo e(svg_image('solid/archive')); ?> <?php echo trans('app.'.'archive'); ?></span>
                    </button>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('projects_delete')): ?>
                    <button type="submit" class="btn m-1 <?php echo e(themeButton()); ?>" value="bulk-delete">
                        <span class=""><?php echo e(svg_image('solid/trash-alt')); ?> <?php echo trans('app.'.'delete'); ?></span>
                    </button>
                    <?php endif; ?>

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
var table = $('#projects-table').DataTable({
processing: true,
serverSide: true,
ajax: {
    url: '<?php echo route('projects.data'); ?>',
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
{ data: 'name', name: 'name' },
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('projects_view_clients')): ?>
{ data: 'client_id', name: 'company.name' },
<?php endif; ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('projects_view_team')): ?>
{ data: 'team', name: 'assignees.user.name' },
<?php endif; ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('projects_view_used_budget')): ?>
{ data: 'used_budget', name: 'used_budget' },
<?php endif; ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('projects_view_hours')): ?>
{ data: 'billable_time', name: 'billable_time' },
<?php endif; ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('projects_view_cost')): ?>
{ data: 'sub_total', name: 'sub_total' },
<?php endif; ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('projects_view_expenses')): ?>
{ data: 'total_expenses', name: 'total_expenses' },
<?php endif; ?>
]
});
$("#frm-project button").click(function(ev){
ev.preventDefault();
if($(this).attr("value") == "bulk-delete"){
var form = $("#frm-project").serialize();
axios.post('<?php echo e(route('projects.bulk.delete')); ?>', form)
.then(function (response) {
    toastr.warning(response.data.message, '<?php echo trans('app.'.'response_status'); ?> ');
    window.location.href = response.data.redirect;
})
.catch(function (error) {
    showErrors(error);
});
}
if($(this).attr("value") == "bulk-archive"){
var form = $("#frm-project").serialize();
axios.post('<?php echo e(route('archive.process')); ?>', form)
.then(function (response) {
    toastr.warning(response.data.message, '<?php echo trans('app.'.'response_status'); ?> ');
    window.location.href = response.data.redirect;
})
.catch(function (error) {
    showErrors(error);
});
}
if($(this).attr("value") == "bulk-invoice"){
    var form = $("#frm-project").serialize();
    axios.post('<?php echo e(route('projects.bulk.invoice')); ?>', form)
    .then(function (response) {
        toastr.success(response.data.message, '<?php echo trans('app.'.'response_status'); ?> ');
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\NETIC360APP\Modules\Projects\Providers/../Resources/views/index.blade.php ENDPATH**/ ?>