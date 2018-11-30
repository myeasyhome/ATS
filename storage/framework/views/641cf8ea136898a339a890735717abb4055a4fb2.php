<?php $__env->startSection('title','Approval Hiring Brief'); ?>
<?php $__env->startSection('js'); ?>
<script type="text/javascript" src="<?php echo e(asset('assets/widgets/datatable/datatable.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/widgets/datatable/datatable-bootstrap.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/widgets/datatable/datatable-responsive.js')); ?>"></script>
<script>
    /* Datatables responsive */
    $(function() {
        $('#datatable-responsive').DataTable( {
            "responsive": true
        } );
    } );

    $(function() {
        $('.dataTables_filter input').attr("placeholder", "Search...");
    });
</script>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="panel">
	<div class="panel-body">
		<h3 class="title-hero">Approval Hiring Brief</h3>
		<div class="example-box-wrapper">
		<!-- notif -->
        <?php if(session('success')): ?>
        	<div class="alert alert-success" role="alert">
                <strong><?php echo e(session('success')); ?></strong>
            </div>
        <?php elseif(session('error')): ?>
        	<div class="alert alert-danger" role="alert">
                <strong><?php echo e(session('error')); ?></strong>
            </div>
        <?php endif; ?>

        
	        
        

			<table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%">
				<thead>
					<tr>
					    <th>No.</th>
					    <th>Position Name</th>
					    <th>Brief Schedule</th>
					    <th>Option</th>
					</tr>
				</thead>

				<tbody>
				    <?php $no=1; ?>
				    <?php $__empty_1 = true; $__currentLoopData = $hiring; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hiring): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
				    <tr>
					    <td class="text-center"><?php echo e($no++); ?></td>
					    <td><a href="<?php echo e(route('hrbp.detail.result',$hiring->id)); ?>"><?php echo e($hiring->tickets->position_name); ?></a></td>
					    <td><?php echo e(\Carbon\Carbon::parse($hiring->date_schedule)->format('d/m/Y')); ?></td>
					    <td>
					    	
					    </td>
				    </tr>
				    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
				    	<td valign="top" colspan="5" class="dataTables_empty">No data available in table</td>
				    	<td id="hidden"></td>
				    	<td id="hidden"></td>
				    	<td id="hidden"></td>
				    	<td id="hidden"></td>
				    	<td id="hidden"></td>
				    	<td id="hidden"></td>
				    <?php endif; ?>
				</tbody>

			</table>
		</div>
	</div>
</div>

<!-- Modal approval -->
<div class="modal fade" tabindex="1" id="modal_approval" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Approval Status</h4>
            </div>
            <form role="form" method="post" class="form-horizontal" id="form_modal_approved">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>
            	<div class="modal-body">
                	<p class="text-center"><strong>Are you sure to Approve this position ?</strong></p>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	                <button type="submit" class="btn btn-success">Approved</button>
	            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal reject -->
<div class="modal fade" tabindex="1" id="modal_reject" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Approval Status</h4>
            </div>
            <form role="form" method="post" class="form-horizontal" id="form_modal_reject">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>
            	<div class="modal-body">
                	<div class="form-group">
                        <label for="position_name" class="col-sm-2 control-label">Reason</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" cols="51" rows="12" name="reason_for_rejection" required></textarea>
                        </div>
                    </div>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	                <button type="submit" class="btn btn-danger">Reject</button>
	            </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>