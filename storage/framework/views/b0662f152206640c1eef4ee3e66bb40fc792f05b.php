<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.edit')); ?> <?php echo e(trans('cruds.permission.title_singular')); ?>

    </div>

    <div class="card-body">
        <form action="<?php echo e(route("admin.mobil.update", [$mobil->id])); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group <?php echo e($errors->has('mobil') ? 'has-error' : ''); ?>">
                        <label for="title">Nama Mobil</label>
                        <input type="text" id="mobil" name="mobil" class="form-control" value="<?php echo e(old('mobil', isset($mobil) ? $mobil->mobil : '')); ?>" required>
                        <?php if($errors->has('mobil')): ?>
                            <em class="invalid-feedback">
                                <?php echo e($errors->first('mobil')); ?>

                            </em>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="form-group <?php echo e($errors->has('nopol') ? 'has-error' : ''); ?>">
                        <label for="title">No.Pol</label>
                        <input type="text" id="nopol" name="nopol" class="form-control" value="<?php echo e(old('nopol', isset($mobil) ? $mobil->nopol : '')); ?>" required>
                        <?php if($errors->has('nopol')): ?>
                            <em class="invalid-feedback">
                                <?php echo e($errors->first('nopol')); ?>

                            </em>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div>
                <input class="btn btn-danger" type="submit" value="<?php echo e(trans('global.save')); ?>">
            </div>
        </form>


    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel-FullCalendar-Recurring-Events\resources\views/admin/mobil/edit.blade.php ENDPATH**/ ?>