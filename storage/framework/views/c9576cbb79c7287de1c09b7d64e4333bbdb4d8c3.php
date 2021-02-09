

<?php $__env->startSection('content'); ?>

<section id="content" class="bg-indigo-100">
    <section class="hbox stretch">
        <section class="vbox">
            <header class="px-2 pb-2 bg-white border-b border-gray-400 panel-heading">
                <div class="flex justify-between text-gray-500">
                    <div>
                        <div class="btn-group">
                            <button class="btn <?php echo e(themeButton()); ?> dropdown-toggle" data-toggle="dropdown"> <?php echo trans('app.'.'filter'); ?>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <?php $__currentLoopData = Role::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="<?php echo e(route('users.index', ['filter' => $role->name])); ?>">
                                        <?php echo e(ucfirst($role->name)); ?>

                                    </a>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="<?php echo e(route('users.index')); ?>"><?php echo trans('app.'.'all'); ?> </a>
                                </li>

                            </ul>
                        </div>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles_view_all')): ?>
                        <a href="<?php echo e(route('users.roles')); ?>" class="btn <?php echo e(themeButton()); ?>">
                            <?php echo e(svg_image('solid/user-secret')); ?> <?php echo trans('app.'.'roles'); ?>
                        </a>
                        <a href="<?php echo e(route('users.perm')); ?>" class="btn <?php echo e(themeButton()); ?>">
                            <?php echo e(svg_image('solid/shield-alt')); ?> <?php echo trans('app.'.'permissions'); ?>
                        </a>
                        <?php endif; ?>
                    </div>

                    <div>
                        <?php if (\Illuminate\Support\Facades\Blade::check('admin')): ?>
                        <a href="<?php echo e(route('users.export')); ?>" class="btn <?php echo e(themeButton()); ?>">
                            <?php echo e(svg_image('solid/download')); ?> CSV
                        </a>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users_create')): ?>
                        <a href="<?php echo e(route('users.create')); ?>" class="btn <?php echo e(themeButton()); ?>" data-toggle="ajaxModal">
                            <?php echo e(svg_image('solid/plus')); ?> <?php echo trans('app.'.'create'); ?>
                        </a>
                        <?php endif; ?>

                        <?php if(isAdmin() || can('announcements_create')): ?>
                        <a href="<?php echo e(route('announcements.index')); ?>" class="btn <?php echo e(themeButton()); ?>">
                            <?php echo e(svg_image('solid/bullhorn')); ?> <?php echo trans('app.'.'announcements'); ?>
                        </a>
                        <?php endif; ?>

                    </div>
                </div>
            </header>
            <section class="scrollable wrapper">
                <section class="panel panel-default">
                    <form id="frm-user" method="POST">

                        <div class="table-responsive">

                            <table class="table table-striped" id="users-table">
                                <thead>
                                    <tr>
                                        <th class="hide"></th>
                                        <th class="no-sort">
                                            <label>
                                                <input name="select_all" value="1" id="select-all" type="checkbox" />
                                                <span class="label-text"></span>
                                            </label>
                                        </th>
                                        <th class=""><?php echo trans('app.'.'name'); ?> </th>
                                        <th class=""><?php echo trans('app.'.'email'); ?> </th>
                                        <th class=""><?php echo trans('app.'.'job_title'); ?> </th>
                                        <th class=""><?php echo trans('app.'.'mobile'); ?> </th>
                                        <th class=""><?php echo trans('app.'.'last_login'); ?> </th>
                                    </tr>
                                </thead>

                            </table>


                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users_update')): ?>
                            <button type="submit" id="button" class="btn <?php echo e(themeButton()); ?> m-xs" value="bulk-verify">
                                <span data-rel="tooltip" title="Verify user account" data-placement="right"><?php echo e(svg_image('solid/lock-open')); ?> <?php echo trans('app.'.'verify'); ?></span>
                            </button>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users_delete')): ?>
                            <button type="submit" id="button" class="btn <?php echo e(themeButton()); ?> m-xs" value="bulk-delete">
                                <span data-rel="tooltip" title="Are you sure?" data-placement="right"><?php echo e(svg_image('solid/trash-alt')); ?> <?php echo trans('app.'.'delete'); ?></span>
                            </button>
                            <?php endif; ?>



                        </div>




                    </form>





                </section>
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
    var table = $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '<?php echo route('users.data'); ?>',
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
            { data: 'email', name: 'email' },
            { data: 'job_title', name: 'profile.job_title' },
            { data: 'mobile', name: 'profile.mobile' },
            { data: 'login', name: 'profile.city' }
        ]
    });

    $("#frm-user button").click(function(ev){
    ev.preventDefault();
    if($(this).attr("value") == "bulk-delete"){
    var form = $("#frm-user").serialize();
    axios.post('<?php echo e(route('users.bulk.delete')); ?>', form)
        .then(function (response) {
            toastr.warning(response.data.message, '<?php echo trans('app.'.'response_status'); ?> ');
            window.location.href = response.data.redirect;
    })
    .catch(function (error) {
    var errors = error.response.data.errors;
    var errorsHtml= '';
    $.each( errors, function( key, value ) {
        errorsHtml += '<li>' + value[0] + '</li>';
    });
        toastr.error( errorsHtml , '<?php echo trans('app.'.'response_status'); ?> ');
    });
    }

    if($(this).attr("value") == "bulk-verify"){
        var form = $("#frm-user").serialize();
        axios.post('<?php echo e(route('users.bulk.verify')); ?>', form)
            .then(function (response) {
                toastr.success(response.data.message, '<?php echo trans('app.'.'response_status'); ?> ');
                window.location.href = response.data.redirect;
        })
        .catch(function (error) {
        var errors = error.response.data.errors;
        var errorsHtml= '';
        $.each( errors, function( key, value ) {
            errorsHtml += '<li>' + value[0] + '</li>';
        });
            toastr.error( errorsHtml , '<?php echo trans('app.'.'response_status'); ?> ');
        });
    }
    
    });

});
</script>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\NETIC360APP\Modules\Users\Providers/../Resources/views/index.blade.php ENDPATH**/ ?>