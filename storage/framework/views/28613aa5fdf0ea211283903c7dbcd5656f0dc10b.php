<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        Detail Mobil
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            Nama Mobil
                        </th>
                        <td>
                            <?php echo e($mobil->mobil); ?>

                        </td>
                    </tr>
                    <tr>
                        <th>
                            No.Pol.
                        </th>
                        <td>
                            <?php echo e($mobil->nopol); ?>

                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-primary" href="<?php echo e(url()->previous()); ?>">
                <?php echo e(trans('global.back_to_list')); ?>

            </a>
        </div>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
        <div class="tab-content">

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel-FullCalendar-Recurring-Events\resources\views/admin/mobil/show.blade.php ENDPATH**/ ?>