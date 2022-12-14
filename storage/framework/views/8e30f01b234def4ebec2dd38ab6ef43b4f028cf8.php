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
<div class="card">
    <div class="card-header">
        <?php echo e(trans('cruds.event.title_singular')); ?> <?php echo e(trans('global.list')); ?>

    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Event">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            No
                        </th>
                        <th>
                            Mobil
                        </th>
                        <th>
                            <?php echo e(trans('cruds.event.fields.name')); ?>

                        </th>
                        <th>
                            Tujuan
                        </th>
                        <th>
                            <?php echo e(trans('cruds.event.fields.start_time')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.event.fields.end_time')); ?>

                        </th>
                        <th>
                            Status
                        </th>
                        
                        
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr data-entry-id="<?php echo e($event->id); ?>">
                            <td>

                            </td>
                            <td>
                                <?php echo e($key += 1); ?>

                            </td>
                            
                            <td>
                                <?php echo e($event->mobil ?? ''); ?>

                            </td>
                            <td>
                                <?php echo e($event->name ?? ''); ?>

                            </td>
                            <td>
                                <?php echo e($event->tujuan ?? ''); ?>

                            </td>
                            <td>
                                <?php echo e($event->start_time ?? ''); ?>

                            </td>
                            <td>
                                <?php echo e($event->end_time ?? ''); ?>

                            </td>
                            <td>
                                <?php if($event->status == '0'): ?>
                                    <a href="" class="badge badge-warning">Dipesan</a>
                                <?php elseif($event->status == 'proses'): ?>
                                    <a href="" class="badge badge-danger text-white">Disewa</a>
                                <?php else: ?>
                                    <a href="" class="badge badge-success">Selesai</a>
                                <?php endif; ?>
                            </td>
                            
                            
                            <td>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('event_show')): ?>
                                    <a class="btn btn-xs btn-primary" href="<?php echo e(route('admin.events.show', $event->id)); ?>">
                                        <?php echo e(trans('global.view')); ?>

                                    </a>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('event_edit')): ?>
                                    <a class="btn btn-xs btn-info" href="<?php echo e(route('admin.events.edit', $event->id)); ?>">
                                        <?php echo e(trans('global.edit')); ?>

                                    </a>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('event_delete')): ?>
                                    <form action="<?php echo e(route('admin.events.destroy', $event->id)); ?>"
                                        method="POST"
                                        onsubmit="return confirm('<?php echo e($event->events_count || $event->event ? 'Do you want to delete future recurring events, too?' : trans('global.areYouSure')); ?>');" style="display: inline-block;"
                                    >
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                        <input type="submit" class="btn btn-xs btn-danger" value="<?php echo e(trans('global.delete')); ?>">
                                    </form>
                                <?php endif; ?>

                            </td>

                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>


    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('event_delete')): ?>
  let deleteButtonTrans = '<?php echo e(trans('global.datatables.delete')); ?>'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "<?php echo e(route('admin.events.massDestroy')); ?>",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('<?php echo e(trans('global.datatables.zero_selected')); ?>')

        return
      }

      if (confirm('<?php echo e(trans('global.areYouSure')); ?>')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
<?php endif; ?>

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'asc' ]],
    pageLength: 100,
  });
  $('.datatable-Event:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel-FullCalendar-Recurring-Events\resources\views/admin/events/index.blade.php ENDPATH**/ ?>