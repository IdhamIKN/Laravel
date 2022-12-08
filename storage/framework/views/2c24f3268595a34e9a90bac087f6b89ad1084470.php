<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.edit')); ?> <?php echo e(trans('cruds.event.title_singular')); ?>

    </div>

    <div class="card-body">
        <form action="<?php echo e(route("admin.events.update", [$event->id])); ?>"
            method="POST"
            enctype="multipart/form-data"
            <?php if($event->events_count || $event->event): ?> onsubmit="return confirm('Do you want to apply these changes to all future recurring events, too?');" <?php endif; ?>
        >
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group <?php echo e($errors->has('mobil') ? 'has-error' : ''); ?>">
                        <label for="name">Mobil</label>
                        <input type="text" id="mobil" name="mobil" class="form-control" value="<?php echo e(old('mobil', isset($event) ? $event->mobil : '')); ?>" required>
                        <?php if($errors->has('mobil')): ?>
                            <em class="invalid-feedback">
                                <?php echo e($errors->first('mobil')); ?>

                            </em>
                        <?php endif; ?>
                        <p class="helper-block">
                            <?php echo e(trans('cruds.event.fields.name_helper')); ?>

                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group <?php echo e($errors->has('tujuan') ? 'has-error' : ''); ?>">
                        <label for="name">Tujuan</label>
                        <input type="text" id="tujuan" name="tujuan" class="form-control" value="<?php echo e(old('tujuan', isset($event) ? $event->tujuan : '')); ?>" required>
                        <?php if($errors->has('tujuan')): ?>
                            <em class="invalid-feedback">
                                <?php echo e($errors->first('tujuan')); ?>

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
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Status</label>
                        <select name="status" id="status" class="custom-select">
                            <?php if($event->status == '0'): ?>
                                <option selected value="0">Dipesan</option>
                                <option value="proses">Disewa</option>
                                <option value="selesai">Selesai</option>
                            <?php elseif($event->status == 'proses'): ?>
                                <option value="0">Dipesan</option>
                                <option selected value="proses">Disewa</option>
                                <option value="selesai">Selesai</option>
                            <?php else: ?>
                                <option value="0">Dipesan</option>
                                <option value="proses">Disewa</option>
                                <option selected value="selesai">Selesai</option>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <?php if(!$event->event && !$event->events_count): ?>
                    <div class="form-group <?php echo e($errors->has('recurrence') ? 'has-error' : ''); ?>" hidden>
                        <label><?php echo e(trans('cruds.event.fields.recurrence')); ?>*</label>
                        <?php $__currentLoopData = App\Event::RECURRENCE_RADIO; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div>
                                <input id="recurrence_<?php echo e($key); ?>" name="recurrence" type="radio" value="<?php echo e($key); ?>" <?php echo e(old('recurrence', $event->recurrence) === (string)$key ? 'checked' : ''); ?> required>
                                <label for="recurrence_<?php echo e($key); ?>"><?php echo e($label); ?></label>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php if($errors->has('recurrence')): ?>
                            <em class="invalid-feedback">
                                <?php echo e($errors->first('recurrence')); ?>

                            </em>
                        <?php endif; ?>
                    </div>
                <?php else: ?>
                    <input type="hidden" name="recurrence" value="<?php echo e($event->recurrence); ?>">
                <?php endif; ?>
                </div>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="<?php echo e(trans('global.save')); ?>">
            </div>
        </div>




        </form>


    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel-FullCalendar-Recurring-Events\resources\views/admin/events/edit.blade.php ENDPATH**/ ?>