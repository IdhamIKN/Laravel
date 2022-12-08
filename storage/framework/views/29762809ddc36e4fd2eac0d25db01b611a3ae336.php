<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.create')); ?> <?php echo e(trans('cruds.event.title_singular')); ?>

    </div>

    <div class="card-body">
        <form action="<?php echo e(route("admin.events.store")); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-md-6">
                    
                    <div class="form-group <?php echo e($errors->has('mobil') ? 'has-error' : ''); ?>">
                        <label for="name">Mobil</label>
                        <select name="mobil" id="mobil" class="form-control"  required>
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
                <div class="col-md-6">
                    <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                        <label for="name">Tujuan</label>
                        <input type="text" id="tujuan" name="tujuan" class="form-control" value="<?php echo e(old('name', isset($event) ? $event->name : '')); ?>" required>
                        <?php if($errors->has('name')): ?>
                            <em class="invalid-feedback">
                                <?php echo e($errors->first('name')); ?>

                            </em>
                        <?php endif; ?>
                        <p class="helper-block">
                            <?php echo e(trans('cruds.event.fields.name_helper')); ?>

                        </p>
                    </div>
                </div>
            </div>

            <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                <label for="name"><?php echo e(trans('cruds.event.fields.name')); ?>*</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo e(old('name', isset($event) ? $event->name : '')); ?>" required>
                <?php if($errors->has('name')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('name')); ?>

                    </em>
                <?php endif; ?>
                <p class="helper-block">
                    <?php echo e(trans('cruds.event.fields.name_helper')); ?>

                </p>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group <?php echo e($errors->has('start_time') ? 'has-error' : ''); ?>">
                        <label for="start_time"><?php echo e(trans('cruds.event.fields.start_time')); ?>*</label>
                        <input type="text" id="start_time" name="start_time" class="form-control datetime" value="<?php echo e(old('start_time', isset($event) ? $event->start_time : '')); ?>" required>
                        <?php if($errors->has('start_time')): ?>
                            <em class="invalid-feedback">
                                <?php echo e($errors->first('start_time')); ?>

                            </em>
                        <?php endif; ?>
                        <p class="helper-block">
                            <?php echo e(trans('cruds.event.fields.start_time_helper')); ?>

                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group <?php echo e($errors->has('end_time') ? 'has-error' : ''); ?>">
                        <label for="end_time"><?php echo e(trans('cruds.event.fields.end_time')); ?>*</label>
                        <input type="text" id="end_time" name="end_time" class="form-control datetime" value="<?php echo e(old('end_time', isset($event) ? $event->end_time : '')); ?>" required>
                        <?php if($errors->has('end_time')): ?>
                            <em class="invalid-feedback">
                                <?php echo e($errors->first('end_time')); ?>

                            </em>
                        <?php endif; ?>
                        <p class="helper-block">
                            <?php echo e(trans('cruds.event.fields.end_time_helper')); ?>

                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6" hidden>
                <div class="form-group">
                    <label for="name">Status</label>
                    <input type="text" id="status" name="status" class="form-control" value="0" required>
                </div>
            </div>



            <div class="form-group <?php echo e($errors->has('recurrence') ? 'has-error' : ''); ?>" hidden>
                <label><?php echo e(trans('cruds.event.fields.recurrence')); ?>*</label>
                <?php $__currentLoopData = App\Event::RECURRENCE_RADIO; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div>
                        <input id="recurrence_<?php echo e($key); ?>" name="recurrence" type="radio" value="none" <?php echo e(old('recurrence', 'none') === (string)$key ? 'checked' : ''); ?> required>
                        <label for="recurrence_<?php echo e($key); ?>"><?php echo e($label); ?></label>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if($errors->has('recurrence')): ?>
                    <em class="invalid-feedback">
                        <?php echo e($errors->first('recurrence')); ?>

                    </em>
                <?php endif; ?>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="<?php echo e(trans('global.save')); ?>">
            </div>
        </form>


    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel-FullCalendar-Recurring-Events\resources\views/admin/events/create.blade.php ENDPATH**/ ?>