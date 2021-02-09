

<?php $__env->startSection('content'); ?>
<section id="content" class="bg-indigo-100">
    <section class="vbox">
        <header class="px-2 pb-2 bg-white border-b border-gray-400 panel-heading">
            <div class="flex justify-between text-gray-500">
                <div>
                    <div class="btn-group">
                        <button class="<?php echo e(themeButton()); ?> dropdown-toggle" data-toggle="dropdown"><?php echo trans('app.'.'filter'); ?> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo e(route('tickets.index', ['filter' => 'mine'])); ?>"><?php echo trans('app.'.'mine'); ?></a></li>
                            <li><a href="<?php echo e(route('tickets.index', ['filter' => 'closed'])); ?>"><?php echo trans('app.'.'closed'); ?></a></li>
                            <li><a href="<?php echo e(route('tickets.index', ['filter' => 'archived'])); ?>"><?php echo trans('app.'.'archived'); ?></a></li>
                            <li><a href="<?php echo e(route('tickets.index')); ?>"><?php echo trans('app.'.'all'); ?></a></li>
                        </ul>
                    </div>
                    <div class="ml-1 btn-group">
                        <button class="<?php echo e(themeButton()); ?> dropdown-toggle" data-toggle="dropdown">
                            <?php echo trans('app.'.'department'); ?> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <?php $__currentLoopData = App\Entities\Department::select('deptid','deptname')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="<?php echo e(route('tickets.index', ['department' => $dept->deptid])); ?>">
                                    <?php echo e(ucfirst($dept->deptname)); ?>

                                </a>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="<?php echo e(route('tickets.index')); ?>"><?php echo trans('app.'.'all'); ?></a></li>
                        </ul>
                    </div>
                </div>
                <div>
                    <a href="<?php echo e(route('tickets.create')); ?>" class="btn <?php echo e(themeButton()); ?>">
                        <?php echo e(svg_image('solid/plus')); ?> <?php echo trans('app.'.'create'); ?>
                    </a>

                    <?php if (\Illuminate\Support\Facades\Blade::check('admin')): ?>
                    <a href="<?php echo e(route('departments.show')); ?>" data-toggle="ajaxModal" class="btn <?php echo e(themeButton()); ?>">
                        <?php echo e(svg_image('solid/layer-group')); ?>
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
    $html = \Livewire\Livewire::mount('ticket.stats-widget')->html();
} elseif ($_instance->childHasBeenRendered('4pA09sR')) {
    $componentId = $_instance->getRenderedChildComponentId('4pA09sR');
    $componentTag = $_instance->getRenderedChildComponentTagName('4pA09sR');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('4pA09sR');
} else {
    $response = \Livewire\Livewire::mount('ticket.stats-widget');
    $html = $response->html();
    $_instance->logRenderedChild('4pA09sR', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                <?php endif; ?>

                <form id="frm-ticket" method="POST">
                    <input type="hidden" name="module" value="tickets">
                    <div class="table-responsive">
                        <table class="table table-striped" id="tickets-table">
                            <thead>
                                <tr>
                                    <th class="hide"></th>
                                    <th class="no-sort">
                                        <label>
                                            <input name="select_all" value="1" id="select-all" type="checkbox" />
                                            <span class="label-text"></span>
                                        </label>
                                    </th>
                                    <th class=""><?php echo trans('app.'.'subject'); ?></th>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tickets_update')): ?>
                                    <th class=""><?php echo trans('app.'.'reporter'); ?></th>
                                    <?php endif; ?>
                                    <th class=""><?php echo trans('app.'.'priority'); ?></th>
                                    <th class="col-date"><?php echo trans('app.'.'date'); ?></th>
                                    <th class=""><?php echo trans('app.'.'department'); ?></th>
                                    <th class=""><?php echo trans('app.'.'status'); ?></th>
                                    <th class=""><?php echo trans('app.'.'due_date'); ?></th>
                                </tr>
                            </thead>
                        </table>
                    </div>

                    <button type="submit" value="bulk-close" class="btn <?php echo e(themeButton()); ?> m-xs">
                        <?php echo e(svg_image('regular/check-circle')); ?> <?php echo trans('app.'.'close'); ?>
                    </button>
                    <button type="submit" value="bulk-open" class="btn <?php echo e(themeButton()); ?> m-xs">
                        <?php echo e(svg_image('solid/exclamation-circle')); ?> <?php echo trans('app.'.'open'); ?>
                    </button>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tickets_update')): ?>
                    <button type="submit" value="bulk-archive" class="btn <?php echo e(themeButton()); ?> m-xs" data-rel="tooltip" title="<?php echo trans('app.'.'archive'); ?>">
                        <?php echo e(svg_image('solid/archive')); ?>
                    </button>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tickets_delete')): ?>
                    <button type="submit" value="bulk-delete" class="btn <?php echo e(themeButton()); ?> m-xs" data-rel="tooltip" title="<?php echo trans('app.'.'delete'); ?>">
                        <?php echo e(svg_image('solid/trash-alt')); ?>
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
    var table = $('#tickets-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: '<?php echo e(route('tickets.data')); ?>',
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            "filter": '<?php echo e($filter); ?>', "department": '<?php echo e($department); ?>'
        }
    },
    order: [[ 0, "desc" ]],
    columns: [
    { data: 'id', name: 'id' },
    { data: 'chk', name: 'chk', orderable: false, searchable: false, sortable: false },
    { data: 'subject', name: 'subject' },
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tickets_update')): ?>
    { data: 'user', name: 'user.name' },
    <?php endif; ?>
    { data: 'priority', name: 'AsPriority.priority' },
    { data: 'created_at', name: 'created_at' },
    { data: 'department', name: 'dept.deptname' },
    { data: 'status', name: 'AsStatus.status' },
    { data: 'due_date', name: 'due_date' }
    ]
    });
    $("#frm-ticket button").click(function(ev){
    ev.preventDefault();
    if($(this).attr("value")=="bulk-delete"){
    var form = $("#frm-ticket").serialize();
    axios.post('<?php echo e(route('tickets.bulk.delete')); ?>', form)
    .then(function (response) {
    toastr.warning(response.data.message, '<?php echo trans('app.'.'response_status'); ?> ');
    window.location.href = response.data.redirect;
    })
    .catch(function (error) {
        showErrors(error);
    });
    }
    if($(this).attr("value")=="bulk-close"){
    var form = $("#frm-ticket").serialize();
    axios.post('<?php echo e(route('tickets.bulk.close')); ?>', form)
    .then(function (response) {
    toastr.success(response.data.message, '<?php echo trans('app.'.'response_status'); ?> ');
    window.location.href = response.data.redirect;
    })
    .catch(function (error) {
        showErrors(error);
    });
    }

    if($(this).attr("value")=="bulk-open"){
        var form = $("#frm-ticket").serialize();
        axios.post('<?php echo e(route('tickets.bulk.open')); ?>', form)
        .then(function (response) {
            toastr.success(response.data.message, '<?php echo trans('app.'.'response_status'); ?> ');
            window.location.href = response.data.redirect;
        })
        .catch(function (error) {
            showErrors(error);
        });
    }

    if($(this).attr("value")=="bulk-archive"){
        var form = $("#frm-ticket").serialize();
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\NETIC360APP\Modules\Tickets\Providers/../Resources/views/index.blade.php ENDPATH**/ ?>