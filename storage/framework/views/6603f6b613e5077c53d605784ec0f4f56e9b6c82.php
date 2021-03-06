<?php $__env->startSection('title','Detail Ticket'); ?>
<?php $__env->startSection('js'); ?>

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
<ol class="breadcrumb bc-3" >
    <li>
        <a href="<?php echo e(route('dh.approval')); ?>">Approval Ticket</a>
    </li>
    <li class="active">
    	<a>Detail Ticket</a>
    </li>
</ol>

<h2>Detail Ticket</h2>
<br>
<div style="color: tomato;">
<p></p>
</div>

<div class="row">
    <div class="col-md-12">
	    <div class="panel panel-default">

	        <div class="panel-body">
		        <form role="form" action="" method="post" enctype="multipart/form-data" class="form-horizontal" id="form_ticket">
	        		<h2 style="padding-bottom: 30px"><span class="bs-label label-info"><strong>Employee Requisition Form</strong></span></h2>
	                    	<div class="row" style="padding-left: 10px">
	                    		<div class="col-md-6">
	                    			
		                    			<div class="form-group">
			                    			<label class="col-md-12 style="margin-bottom: 0px"">Position Name</label>
			                    			
			                    			<p class="col-md-12"><?php echo e(ucwords($detail->position_name)); ?></p>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-12" style="margin-bottom: 0px">Grade</label>
			                    			
			                    			<p class="col-md-12"><?php echo e($detail->position_grade); ?></p>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-12" style="margin-bottom: 0px">Location</label>
			                    			
			                    			<p class="col-md-12"><?php echo e(ucwords($detail->location)); ?></p>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-12" style="margin-bottom: 0px">Reporting TO</label>
			                    			
			                    			<p class="col-md-12"><?php echo e(ucwords($detail->ticket_erf_details->reporting_to)); ?></p>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-12" style="margin-bottom: 0px">Directorate</label>
			                    			
			                    			<p class="col-md-12"><?php echo e($detail->ticket_erf_details->directorates->directorate_name); ?></p>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-12" style="margin-bottom: 0px">Group</label>
			                    			
			                    			<p class="col-md-12"><?php echo e($detail->ticket_erf_details->groups->group_name); ?></p>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-12" style="margin-bottom: 0px">Division</label>
			                    			
			                    			<p class="col-md-12"><?php echo e($detail->ticket_erf_details->divisions->division_name); ?></p>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-12" style="margin-bottom: 0px">Department</label>
			                    			
			                    			<p class="col-md-12"><?php echo e($detail->ticket_erf_details->departments->department_name); ?></p>
		                    			</div>
	                    			
	                    		</div>

	                    		<div class="col-md-6">
	                    			
		                    			<div class="form-group">
			                    			<label class="col-md-12" style="margin-bottom: 0px">Employee Status</label>
			                    			
			                    			<p class="col-md-12"><?php echo e($detail->ticket_erf_details->employee_status); ?></p>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-12" style="margin-bottom: 0px">Contract Duration</label>
			                    			
			                    			<p class="col-md-12">
			                    				<?php echo e($detail->ticket_erf_details->employee_status == 'Contract' ? $detail->ticket_erf_details->contract_duration : '-'); ?>

			                    			</p>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-12" style="margin-bottom: 0px">Type Of Hiring</label>
			                    			
			                    			<p class="col-md-12">
			                    			<?php
					                    		$type_hiring = json_decode($detail->ticket_erf_details->type_hiring);
					                    	?>
				                    			<?php if(count($type_hiring) > 1): ?>
				                    				Internal Job Offering & External Job Offering
				                    			<?php elseif( $type_hiring[0] == 'IJO' ): ?>
				                    				Internal Job Offering
				                    			<?php elseif( $type_hiring[0] == 'EJO' ): ?>
				                    				External Job Offering
				                    			<?php endif; ?>
			                    			</p>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-12" style="margin-bottom: 0px">Confidentiality</label>
			                    			
			                    			<p class="col-md-12"><?php echo e($detail->ticket_erf_details->confidentiality); ?></p>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-12" style="margin-bottom: 0px">Request Background</label>
			                    			
			                    			<p class="col-md-12"><?php echo e($detail->ticket_erf_details->request_background); ?></p>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-12" style="margin-bottom: 0px">Hiring Justification</label>
			                    			
			                    			<p class="col-md-12"><?php echo e(ucfirst($detail->ticket_erf_details->reason)); ?></p>
		                    			</div>
	                    			
	                    		</div>
	                    	</div>

	                    <h2 style="padding-bottom: 30px; padding-top: 30px"><span class="bs-label label-info"><strong>Job Description</strong></span></h2>
	                    

	                    	<div class="row" style="padding-left: 10px">
	                    		<div class="col-md-6">
	                    			
		                    			<div class="form-group">
			                    			<label class="col-md-12" style="margin-bottom: 0px">Supervisor Title</label>
			                    			
			                    			<p class="col-md-12"><?php echo e(ucwords($detail->ticket_jd_details->supervisor)); ?></p>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-12" style="margin-bottom: 0px">Incumbent Name</label>
			                    			
			                    			<p class="col-md-12"><?php echo e($detail->ticket_jd_details->incumbent_name == Null ? '-' : $detail->ticket_jd_details->incumbent_name); ?></p>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-12" style="margin-bottom: 0px">Supervisor Name</label>
			                    			
			                    			<p class="col-md-12"><?php echo e(ucwords($detail->ticket_jd_details->supervisor_name)); ?></p>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-12" style="margin-bottom: 0px">Role Purpose</label>
			                    			
			                    			<p class="col-md-12"><?php echo e(ucwords($detail->ticket_jd_details->role_purpose)); ?></p>
		                    			</div>
	                    			
	                    		</div>

	                    		<div class="col-md-6">
	                    			
	                    				<div class="form-group">
			                    			<label class="col-md-12" style="margin-bottom: 0px">Direct Sub Ordinate</label>
			                    			
			                    			<p class="col-md-12"><?php echo e($detail->ticket_jd_details->direct_sub == Null ? '-' : $detail->ticket_jd_details->direct_sub); ?></p>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-12" style="margin-bottom: 0px">Indirect Sub Ordinate</label>
			                    			
			                    			<p class="col-md-12"><?php echo e($detail->ticket_jd_details->indirect_sub == Null ? '-' : $detail->ticket_jd_details->indirect_sub); ?></p>
		                    			</div>
		                    			<div class="form-group">
		                    				<label class="col-md-12" style="margin-bottom: 0px">Job Level</label>
			                    			
			                    			<p class="col-md-12"><?php echo e($detail->ticket_jd_details->job_level); ?></p>
		                    			</div>
		                    			<div class="form-group">
		                    				<label class="col-md-12" style="margin-bottom: 0px">Minimal Education</label>
			                    			
			                    			<p class="col-md-12">
			                    				<?php if($detail->ticket_jd_details->min_education=='d3'): ?>
			                    					Diploma's degree graduate
			                    				<?php elseif($detail->ticket_jd_details->min_education=='s1'): ?>
			                    					Bachelor's degree graduate
			                    				<?php endif; ?>
			                    			</p>
		                    			</div>
	                    			
	                    		</div>
	                    	</div>

	                    	<div class="form-group" style="padding-top: 20px;">
	                    		<div class="col-md-8">
	                    			<h4><label class="col-md-8" style="padding-bottom: 10px;">Minimum Requirements</label></h4>
	                    			<div class="col-md-12" style="padding-left: 30px;">
	                    				<?php echo $detail->ticket_jd_details->qualification; ?>	
	                    			</div>
	                    		</div>
	                    	</div>

	                    	<div class="form-group" style="padding-top: 10px;">
	                    		<div class="col-md-8">
	                    			<h4><label class="col-sm-8" style="padding-bottom: 10px;">Responsibility</label></h4>
	                    			<div class="col-md-12" style="padding-left: 30px;">
	                    				<?php echo $detail->ticket_jd_details->responsibility; ?>	
	                    			</div>
	                    		</div>
	                    	</div>

				            <div class="row">
		                    	<div class="col-md-6" style="padding-right:30px">
		                    		<div class="form-group" style="padding-bottom: 20px;">
					                    <div class="col-md-12">
						                    <table class="table table-striped table-bordered">
						                        <thead>
						                            <tr>
						                                <th class="col-sm-1 text-center">No</th>
						                                <th class="col-sm-9 text-center">Soft Competencies</th>
						                                <th class="col-sm-2 text-center">(1-5)<span style="color: red;">*</span></th>
						                            </tr>
						                        </thead>
						                        <tbody>
						                            <tr>
						                                <td class="text-center">1</td>
						                                <td>Learning Agility</td>
						                                <td class="text-center"><?php echo e($soft[0]); ?></td>
						                            </tr>
						                            <tr>
						                                <td class="text-center">2</td>
						                                <td>Making Difference</td>
						                                <td class="text-center"><?php echo e($soft[1]); ?></td>
						                            </tr>
						                            <tr>
						                                <td class="text-center">3</td>
						                                <td>People Management</td>
						                                <td class="text-center"><?php echo e($soft[2]); ?></td>
						                            </tr>
						                            <tr>
						                                <td class="text-center">4</td>
						                                <td>Accelerate Business And Customer</td>
						                                <td class="text-center"><?php echo e($soft[3]); ?></td>
						                            </tr>
						                            <tr>
						                                <td class="text-center">5</td>
						                                <td>Translating Strategy into Action</td>
						                                <td class="text-center"><?php echo e($soft[4]); ?></td>
						                            </tr>
						                            <tr>
						                                <td class="text-center">6</td>
						                                <td>Decisiveness</td>
						                                <td class="text-center"><?php echo e($soft[5]); ?></td>
						                            </tr>
						                            <tr>
						                                <td class="text-center">7</td>
						                                <td>Cultivate  Networks & Partnerships</td>
						                               	<td class="text-center"><?php echo e($soft[6]); ?></td>
						                            </tr>
						                        </tbody>
						                    </table>
						                    <span><i style="color: #7C7C7C;">* Proficiency Level: 1. Significant Development Needed; 2. Development Needed; 3. Partially Meet Expectation; 4. Meet Expectation; 5. Exceed Expectation</i></span>
						                </div>
					                </div>	
		                    	</div>

		                    	<div class="col-md-6">
		                    		<div class="form-group">
						                <div class="col-md-12">
						                    <table class="table table-striped table-bordered" id="table_hard_competencies">
						                        <thead>
						                            <tr>
						                                <th class="col-sm-1 text-center">No</th>
						                                <th class="col-sm-9 text-center">Hard Competencies</th>
						                                <th class="col-sm-2 text-center">(1-5)<span style="color: red;">*</span></th>
						                            </tr>
						                        </thead>
						                        <tbody>
						                            <?php $no=1; ?>
						                            <?php $__currentLoopData = $hard; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $array => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						                                <tr>
						                                    <td class="text-center"><?php echo e($no++); ?></td>
						                                    <td>
						                                        <?php echo e(($value)); ?>

						                                    </td>
						                                    <td class="text-center">
						                                        <?php echo e($hard_value[$array]); ?>

						                                    </td>
						                                </tr>
						                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						                        </tbody>
						                    </table>
						                    <span><i style="color: #7C7C7C;">* Proficiency Level: 1. Introductory; 2. Basic; 3. Intermediate; 4. Advanced; 5. Expert</i></span>
						                </div>
						            </div>
		                    	</div>
		                    </div>	

		        <!-- btn back, approve, reject -->
	            <div class="form-group text-center">
	            	<a href="<?php echo e(route('dh.list')); ?>" type="button" class="btn btn-round btn-info" title="back">
	            		<span class="glyph-icon icon-arrow-left"></span>
	            	</a>
	            	&nbsp;
	            	<?php if( $detail->approval_lm2 == 0 ): ?>
	            	<a href="#modal_approval" type="button" data-url="<?php echo e(route('approved.ticket',$detail->id)); ?>" data-toggle="modal" class="btn btn-round btn-success btn_modal_approved" title="Approved">
                    	<span class="glyph-icon icon-check"></span>
                    </a>
                    &nbsp;
                    <a href="#modal_reject" type="button" data-url="<?php echo e(route('reject.ticket',$detail->id)); ?>" data-toggle="modal" class="btn btn-round btn-danger btn_modal_reject" title="Reject">
	                    <span class="glyph-icon icon-remove"></span>
	                </a>
	                <?php elseif( $detail->approval_lm2 == 1 ): ?>
	                	<span class="bs-label label-success"><strong>This Ticket Has Been Approved</strong></span>
	                <?php elseif( $detail->approval_lm2 == 2 ): ?>
	                	<span class="bs-label label-danger"><strong>This Ticket Has Been Rejected</strong></span>
	                <?php endif; ?>
	            </div>

	            </form>
	        </div>

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>