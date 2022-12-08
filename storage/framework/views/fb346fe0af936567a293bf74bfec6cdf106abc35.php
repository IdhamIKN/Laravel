<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <?php echo e(trans('global.show')); ?> <?php echo e(trans('cruds.event.title')); ?>

        </div>

        <div class="card-body">
            <div class="mb-2">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.event.fields.id')); ?>

                            </th>
                            <td>
                                <?php echo e($event->id); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                Mobil
                            </th>
                            <td>
                                <?php echo e($event->mobil); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.event.fields.name')); ?>

                            </th>
                            <td>
                                <?php echo e($event->name); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                Tujuan
                            </th>
                            <td>
                                <?php echo e($event->tujuan); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.event.fields.start_time')); ?>

                            </th>
                            <td>
                                <?php echo e($event->start_time); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('cruds.event.fields.end_time')); ?>

                            </th>
                            <td>
                                <?php echo e($event->end_time); ?>

                            </td>
                        </tr>
                        <tr>

                            <th>Status</th>
                            <td>
                                <?php if($event->status == '0'): ?>
                                    <a href="" class="badge badge-danger">Boking</a>
                                <?php elseif($event->status == 'proses'): ?>
                                    <a href="" class="badge badge-warning text-white">Disewa</a>
                                <?php else: ?>
                                    <a href="" class="badge badge-success">Selesai</a>
                                <?php endif; ?>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel-FullCalendar-Recurring-Events\resources\views/admin/events/show.blade.php ENDPATH**/ ?>