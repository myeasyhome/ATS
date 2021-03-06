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

<script type="text/javascript">	
	$('#wizard').steps({
	    headerTag: "h2",
	    bodyTag: "section",
	    transitionEffect: "slideLeft",
	    enableAllSteps: true,
	    enableFinishButton : false,
		enablePagination: false,
		titleTemplate: "#title#"
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
					    <th class="text-center">Option</th>
					</tr>
				</thead>

				<tbody>
				    <?php $no=1; ?>
				    <?php $__empty_1 = true; $__currentLoopData = $ticket; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
				    <tr>
					    <td class="text-center"><?php echo e($no++); ?></td>
					    <td><a href="<?php echo e(route('dh.detail.ticket',$ticket->id)); ?>"><?php echo e($ticket->position_name); ?></a></td>
					    <td class="text-center"><?php echo e(\Carbon\Carbon::parse($ticket->created_at)->format('d/m/Y')); ?></td>
					    <td class="text-center">
					    	<?php if($ticket->approval_lm2 > 0): ?>
					    		<?php if( $ticket->approval_lm2 == 1 ): ?>
					    			<span class="bs-label label-success"><strong>Approved</strong></span>
					    		<?php elseif( $ticket->approval_lm2 == 2 ): ?>
					    			<span class="bs-label label-danger"><strong>Rejected</strong></span>
					    		<?php endif; ?>
					    	<?php else: ?>
					    		 <a href="#modal_approval" type="button" data-url="<?php echo e(route('approved.ticket',$ticket->id)); ?>" data-toggle="modal" class="btn btn-round btn-success btn_modal_approved" title="Approved">
                                <span class="glyph-icon icon-check"></span>
	                            </a>
	                            &nbsp;
	                            <a href="#modal_reject" type="button" data-url="<?php echo e(route('reject.ticket',$ticket->id)); ?>" data-toggle="modal" class="btn btn-round btn-danger btn_modal_reject" title="Reject">
	                                <span class="glyph-icon icon-remove"></span>
	                            </a>
					    	<?php endif; ?>
					    </td>
				    </tr>
				    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
				    	<td valign="top" colspan="4" class="dataTables_empty">No data available in table</td>
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
                	<button type="submit" class="btn btn-success">Yes, i approve it</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No, cancel</button>
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
                	<button type="submit" class="btn btn-success">Yes, i reject it</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No, cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Detail -->
<div class="modal fade bd-example-modal-lg" tabindex="1" id="modal_detail" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="modal_title">Detail Ticket</h4>
            </div>
            
                <div class="modal-body">
                    <form role="form" action="" method="post" enctype="multipart/form-data" class="form-horizontal">

		        	<div id="wizard">
	                    <h2>Employee Requisition Form</h2>
	                    <section>
	                    	<div class="row">
	                    		<div class="col-md-6">
	                    			<fieldset class="the-fieldset">
		                    			<div class="form-group">
			                    			<label class="col-md-4">Position Name</label>
			                    			<label class="col.6 col-md-1">:</label>
			                    			<label class="col-md-7" id="position_name"></label>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-4">Grade</label>
			                    			<label class="col-md-1">:</label>
			                    			<label class="col-md-7" id="position_grade"></label>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-4">Location</label>
			                    			<label class="col-md-1">:</label>
			                    			<label class="col-md-7" id="location"></label>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-4">Reporting To</label>
			                    			<label class="col-md-1">:</label>
			                    			<label class="col-md-7" id="reporting_to"></label>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-4">Directorate</label>
			                    			<label class="col-md-1">:</label>
			                    			<label class="col-md-7" id="directorate"></label>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-4">Group</label>
			                    			<label class="col-md-1">:</label>
			                    			<label class="col-md-7" id="group"></label>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-4">Division</label>
			                    			<label class="col-md-1">:</label>
			                    			<label class="col-md-7" id="division"></label>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-4">Department</label>
			                    			<label class="col-md-1">:</label>
			                    			<label class="col-md-7" id="department"></label>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-4">Employee Status</label>
			                    			<label class="col-md-1">:</label>
			                    			<label class="col-md-7" id="employee_status"></label>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-4">Contract Periode</label>
			                    			<label class="col-md-1">:</label>
			                    			<label class="col-md-7" id="contract"></label>
		                    			</div>
	                    			</fieldset>
	                    		</div>

	                    		<div class="col-md-6">
	                    			<fieldset class="the-fieldset">
		                    			<div class="form-group">
			                    			<label class="col-md-4">Type Of Hiring</label>
			                    			<label class="col-md-1">:</label>
			                    			<label class="col-md-7" id="type_hiring">
				                    			
			                    			</label>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-4">Advertisement</label>
			                    			<label class="col-md-1">:</label>
			                    			<label class="col-md-7" id="adv"></label>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-4">Bussiness Impact</label>
			                    			<label class="col-md-1">:</label>
			                    			<label class="col-md-7" id="bsn"></label>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-4">Request Background</label>
			                    			<label class="col-md-1">:</label>
			                    			<label class="col-md-7" id="req"></label>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-4">Reason</label>
			                    			<label class="col-md-1">:</label>
			                    			<label class="col-md-7" id="reason"></label>
		                    			</div>
	                    			</fieldset>
	                    		</div>
	                    	</div>
	                    </section>

	                    <h2>Job Description</h2>
	                    <section>

	                    	<div class="row">
	                    		<div class="col-md-6">
	                    			<fieldset class="the-fieldset">
		                    			<div class="form-group">
			                    			<label class="col-md-4">Supervisor Title</label>
			                    			<label class="col.6 col-md-1">:</label>
			                    			<label class="col-md-7" id="spv_title"></label>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-4">Incumbent Name</label>
			                    			<label class="col-md-1">:</label>
			                    			<label class="col-md-7" id="Incumbent"></label>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-4">Supervisor Name</label>
			                    			<label class="col-md-1">:</label>
			                    			<label class="col-md-7" id="spv_name"></label>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-4">Role Purpose</label>
			                    			<label class="col-md-1">:</label>
			                    			<label class="col-md-7" id="role_purpose"></label>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-4">Direct Sub Ordinate</label>
			                    			<label class="col-md-1">:</label>
			                    			<label class="col-md-7" id="direct_sub"></label>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-4">Indirect Sub Ordinate</label>
			                    			<label class="col-md-1">:</label>
			                    			<label class="col-md-7" id="indirect_sub"></label>
		                    			</div>
	                    			</fieldset>
	                    		</div>
	                    	</div>

	                    	<div class="row" style="padding-top: 20px;">
	                    		<div class="form-group">
				                	<div class="col-md-12">

		                            	<table class="table table-striped table-bordered responsive" id="table_custom">
				                			<thead>
				                				<tr>
				                					<th class="col-sm-1 text-center">No.</th>
				                					<th class="col-sm-3 text-center">Area Of Responsibilities</th>
				                					<th class="text-center">Key Activities</th>
				                				</tr>
				                			</thead>
				                			<tbody>
				                				<tr>
				                					<td>
				                						
				                					</td>
				                					<td>
				                						<textarea class="form-control" id="scope_area"></textarea>
				                					</td>
				                					<td>
				                						<textarea class="form-control" id="scope_activities"></textarea>
				                					</td>
				                				</tr>
				                			</tbody>
				                		</table>
			                        	
				                	</div>
			                    </div>
	                    	</div>

	                    </section>
	                </div>

	            	</form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    
                </div>
            
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>