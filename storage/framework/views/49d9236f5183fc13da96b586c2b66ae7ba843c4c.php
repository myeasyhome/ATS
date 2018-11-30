<?php $__env->startSection('title','Approval List'); ?>

<?php $__env->startSection('js'); ?>
<script type="text/javascript" src="<?php echo e(asset('assets/widgets/datatable/datatable.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/widgets/datatable/datatable-bootstrap.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/widgets/datatable/datatable-responsive.js')); ?>"></script>

<script type="text/javascript">
    /* Datatables responsive */
    $(function() {
        $('#datatable-responsive').DataTable( {
            "responsive": true
        } );

        $('.dataTables_filter input').attr("placeholder", "Search...");
    } );
</script>

<script type="text/javascript">
    /* Modal Reject */
    $(document).ready(function () {
        $(document).on("click", ".btn_modal_reject", function () {
            var url = $(this).attr('data-url');
            $('#form_modal_reject').attr('action',url);
        });
    });

    /* Modal Approved */
    $(document).ready(function () {
        $(document).on("click", ".btn_modal_approved", function () {
            var url = $(this).attr('data-url'); 
            $('#form_modal_approved').attr('action',url);
        });
    });
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="panel">
	<div class="panel-body">
		<h3 class="title-hero">Approval List</h3>
		<div class="example-box-wrapper">
			<!-- notif -->
	        <?php if(session('success')): ?>
	        	<div class="alert alert-success" role="alert">
	        		<button type="button" class="close" data-dismiss="alert">×</button>
	                <strong><?php echo e(session('success')); ?></strong>
	            </div>
	        <?php elseif(session('error')): ?>
	        	<div class="alert alert-danger" role="alert">
	        		<button type="button" class="close" data-dismiss="alert">×</button>
	                <strong><?php echo e(session('error')); ?></strong>
	            </div>
	        <?php endif; ?>
			<table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%">
				<thead>
					<tr>
					    <th class="text-center col-md-1">No.</th>
					    <th class="text-center">Position Name</th>
					    <th class="text-center">Created Date</th>
					    <th class="text-center">Created By</th>
					    <th class="text-center">Option</th>
					</tr>
				</thead>

				<tbody>
				    <?php $no=1; ?>
				    <?php $__empty_1 = true; $__currentLoopData = $ticket; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
					    <tr>
						    <td class="text-center"><?php echo e($no++); ?></td>
						    <td><a href="<?php echo e(route('chief.detail.ticket',$ticket->id)); ?>"><?php echo e($ticket->position_name); ?></a></td>
						    <td class="text-center"><?php echo e(\Carbon\Carbon::parse($ticket->created_at)->format('d/m/Y')); ?></td>
						    <td class="text-center"><?php echo e($ticket->user->name); ?></td>
						    <td class="text-center">
						    	<?php if($ticket->approval_chief > 0): ?>
						    		<?php if( $ticket->approval_chief == 1 ): ?>
						    			<span class="bs-label label-success"><strong>Approved</strong></span>
						    		<?php elseif( $ticket->approval_chief == 2 ): ?>
						    			<span class="bs-label label-danger"><strong>Rejected</strong></span>
						    		<?php endif; ?>
						    	<?php else: ?>
						    		<a href="<?php echo e(route('chief.detail.ticket',$ticket->id)); ?>" type="button" class="bs-label label-yellow"><span><strong>need approval</strong></span></a>
						    		 
						    	<?php endif; ?>
						    </td>
					    </tr>
				    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
				    	<td valign="top" colspan="5" class="dataTables_empty">No data available in table</td>
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


<!-- Modal reject -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>