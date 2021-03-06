<?php $__env->startSection('title','Approval Result Of The Brief'); ?>

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
    } );

    $(function() {
        $('.dataTables_filter input').attr("placeholder", "Search...");
    });
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


<!-- ALERT akan muncul jika HRT sudah input hasil briefing, status waiting => 0 -->
<?php $__env->startSection('alert_for_HRBP'); ?>
	
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="panel">
	<div class="panel-body">
		
		<h3 class="title-hero"><strong>approval result of the brief list</strong></h3>
		<div class="example-box-wrapper">

			<table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%">
				<thead>
					<tr>
					    <th>No.</th>
					    <th class="text-center">Position Name</th>
					    <th class="text-center">Input Date Result of Brief</th>
					    <th class="text-center">Status</th>
					</tr>
				</thead>

				<tbody>
				    <?php $no=1; ?>
				    <?php $__empty_1 = true; $__currentLoopData = $hiring; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hiring): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
				    <tr>
					    <td class="text-center"><?php echo e($no++); ?></td>
					    <td><?php echo e($hiring->tickets->position_name); ?></td>
					    <td class="text-center">
					    	<?php echo e($hiring->date_result_hiring == NULL ? '-' : \Carbon\Carbon::parse($hiring->date_result_hiring)->format('d/m/Y')); ?>

					    </td>
					    <td class="text-center">
					    	<?php if( $hiring->approval_hiring_by_hrbp == NULL ): ?>
					    		<span class="bs-label label-warning"><strong>HR Talent Hasn't Input the result of brief yet</strong></span>
					    	<?php else: ?>
					    		<!-- status: 0=>sudah input hasil brief; 1=> di approve HRBP; 2=> di reject HRBP -->
					    		<?php if( $hiring->approval_hiring_by_hrbp == 0 ): ?>
					    			<a class="bs-label label-yellow" type="button" href="<?php echo e(route('hrbp.detail.result',$hiring->id)); ?>">
				                        <span><strong>need approval</strong></span>
				                    </a>
					    		<?php elseif( $hiring->approval_hiring_by_hrbp == 1 ): ?>
					    			<span class="bs-label btn-border border-green font-green"><strong>Approved</strong></span>
					    		<?php elseif( $hiring->approval_hiring_by_hrbp == 2 ): ?>
					    			<span class="bs-label btn-border border-red font-red"><strong>reject</strong></span>
					    		<?php endif; ?>
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
                	<p class="text-center"><strong>Are you sure to Approve The Result of Brief ?</strong></p>
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