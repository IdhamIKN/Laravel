<?php $__env->startSection('content'); ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('event_create')): ?>
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="<?php echo e(route("admin.events.create")); ?>">
                <?php echo e(trans('global.add')); ?> <?php echo e(trans('cruds.event.title_singular')); ?>

            </a>
        </div>
    </div>
<?php endif; ?>
<h3>Kalender Rental</h3>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <form action="<?php echo e(route('admin.events.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group <?php echo e($errors->has('mobil') ? 'has-error' : ''); ?>">
                                <select name="mobil" id="mobil" class="form-control" required>
                                    <option value="" readonly>Pilih Mobil</option>
                                    <?php $__currentLoopData = $mobil; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($v->mobil); ?>"><?php echo e($v->mobil); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('mobil')): ?>
                                    <em class="invalid-feedback">
                                        <?php echo e($errors->first('mobil')); ?>

                                    </em>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div>
                            <input class="btn btn-danger" type="submit" value="Tampilkan">
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
    <div class="card-body">


        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

        <div id='calendar'></div>
    </div>

    <div class="card-body">



    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script>
    $(document).ready(function () {
            // page is now ready, initialize the calendar...
            events=<?php echo json_encode($events); ?>;
            $('#calendar').fullCalendar({
                // put your options and callbacks here
                events: events,


            })
        });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel-FullCalendar-Recurring-Events\resources\views/admin/calendar/calendar.blade.php ENDPATH**/ ?>