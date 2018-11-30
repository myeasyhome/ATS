<?php $__env->startSection('title','Detail Ticket'); ?>
<?php $__env->startSection('js'); ?>

<script type="text/javascript" src="<?php echo e(asset('assets/widgets/datatable/datatable.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/widgets/datatable/datatable-bootstrap.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/widgets/datatable/datatable-responsive.js')); ?>"></script>
<script type="text/javascript">
    /* Datatables responsive */
    $(document).ready(function() {
        $('#datatable-responsive').DataTable( {
            "responsive": true
        } );

        $('.dataTables_filter input').attr("placeholder", "Search...");
    } );
</script>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<ol class="breadcrumb bc-3" >
    <li>
        <a href="<?php echo e(route('ticket')); ?>">Ticket</a>
    </li>
    <li>
    	<span>Detail Ticket</span>
    </li>
</ol>

<h2 style="font-family: ooredoo">Detail Ticket</h2>
<br>

<div class="row">
    <div class="col-md-12">

	    <ul class="list-group row list-group-icons">
            <li class="col-md-3 active">
                <a href="#detail_ticket" data-toggle="tab" class="list-group-item">
                    <i class="glyph-icon font-red icon-ticket"></i>
                    Detail Information
                </a>
            </li>
            <!-- Jika belum ada proses sampe upload cv, tidak muncul -->
            <?php if(empty($detail->hiring_briefs->CV)): ?>
                
            <?php else: ?>
            	<li class="col-md-3">
	                <a href="#candidate" data-toggle="tab" class="list-group-item">
	                    <i class="glyph-icon font-blue icon-user"></i>
	                    Candidate
	                </a>
	            </li>
            <?php endif; ?>
        </ul>

        <div class="tab-content">
        	<div class="tab-pane pad0A fade active in" id="detail_ticket">
	            <div class="panel panel-default">
		            <div class="panel-body">            
			            <form class="form-horizontal">
			            	<div class="content-box-header content-box-header-alt bg-white">
				                <span class="icon-separator">
				                    <i class="glyph-icon font-blue icon-linecons-doc"></i>
				                </span>
				                <span class="header-wrapper">
				                    <h3 style="font-family: ooredoo">Employee Requisition Form</h3>
				                </span>
				            </div>
				            
				            <!-- ERF-->
	                    	<div class="row" style="padding-left: 10px; padding-top: 20px">
	                    		<div class="col-md-6">
		                    			<div class="form-group">
			                    			<label class="col-md-12" style="margin-bottom: 0px">Position Name</label>
			                    			<p class="col-md-12"><?php echo e($detail->position_name); ?></p>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-12" style="margin-bottom: 0px">Grade</label>
			                    			<p class="col-md-12"><?php echo e($detail->position_grade); ?></p>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-12" style="margin-bottom: 0px">Location</label>
			                    			<p class="col-md-12"><?php echo e($detail->location); ?></p>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-12" style="margin-bottom: 0px">Reporting To</label>
			                    			<p class="col-md-12"><?php echo e($detail->ticket_erf_details->reporting_to); ?></p>
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

	                    	<div class="content-box-header content-box-header-alt bg-white">
				                <span class="icon-separator">
				                    <i class="glyph-icon font-blue icon-linecons-doc"></i>
				                </span>
				                <span class="header-wrapper">
				                    <h3 style="font-family: ooredoo">Job Description</h3>
				                </span>
				            </div>
			                    
	                    	<div class="row" style="padding-left: 10px; padding-top: 20px">
	                    		<div class="col-md-6">
		                    			<div class="form-group">
			                    			<label class="col-md-12" style="margin-bottom: 0px">Supervisor Title</label>
			                    			<p class="col-md-12"><?php echo e($detail->ticket_jd_details->supervisor); ?></p>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-12" style="margin-bottom: 0px">Incumbent Name</label>
			                    			<p class="col-md-12"><?php echo e($detail->ticket_jd_details->incumbent_name == Null ? '-' : $detail->ticket_jd_details->incumbent_name); ?></p>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-12" style="margin-bottom: 0px">Supervisor Name</label>
			                    			<p class="col-md-12"><?php echo e($detail->ticket_jd_details->supervisor_name); ?></p>
		                    			</div>
		                    			<div class="form-group">
			                    			<label class="col-md-12" style="margin-bottom: 0px">Role Purpose</label>
			                    			<p class="col-md-12"><?php echo e($detail->ticket_jd_details->role_purpose); ?></p>
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

	                    	<!-- requirement -->
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

	                    	<!-- table compentencies hard and soft -->
				            <div class="row">
		                    	<div class="col-md-6" style="padding-right:30px">
		                    		<div class="form-group" style="padding-bottom: 20px;">
					                    <div class="col-md-12">
						                    <table class="table table-striped table-bordered">
						                        <thead>
						                            <tr>
						                                <th class="col-sm-1 text-center">No</th>
						                                <th class="col-sm-9 text-center">Soft Competencies</th>
						                                <th class="col-sm-2 text-center">(1-5)</th>
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
						                    <span><i style="color: #7C7C7C;">* Proficiency Level: 
						                    <br>1. Significant Development Needed; 
						                    <br>2. Development Needed; 
						                    <br>3. Partially Meet Expectation; 
						                    <br>4. Meet Expectation;
						                    <br>5. Exceed Expectation</i></span>
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
						                                <th class="col-sm-2 text-center">(1-5)</th>
						                            </tr>
						                        </thead>
						                        <tbody>
						                            <?php $no=1; ?>
						                            <?php $__currentLoopData = $hard; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $array => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						                                <tr>
						                                    <td class="text-center"><?php echo e($no++); ?></td>
						                                    <td>
						                                        <?php echo e(ucwords($value)); ?>

						                                    </td>
						                                    <td class="text-center">
						                                        <?php echo e($hard_value[$array]); ?>

						                                    </td>
						                                </tr>
						                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						                        </tbody>
						                    </table>
						                    <span><i style="color: #7C7C7C;">* Proficiency Level: 
						                    <br>1. Introductory; 
						                    <br>2. Basic; 
						                    <br>3. Intermediate; 
						                    <br>4. Advanced; 
						                    <br>5. Expert</i></span>
						                </div>
						            </div>
		                    	</div>
		                    </div>	

					        <!-- btn back, approve, reject -->
				            <div class="form-group text-center">
				            	<a href="<?php echo e(route('ticket')); ?>" type="button" class="btn btn-round btn-info" title="back">
				            		<span class="glyph-icon icon-arrow-left"></span>
				            	</a>
				            </div>
			            </form>
		            </div>
	            </div>
	        </div>


            <div class="tab-pane pad0A fade" id="candidate">
                <div class="panel panel-default">
		            <div class="panel-body">
		            	<?php if(empty($detail->hiring_briefs->CV)): ?>

		            	<?php else: ?>
		            		<table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap dataTable collapsed dtr-inline" cellspacing="0" width="100%">
								<thead>
									<tr>
									    <th class="text-center">Candidate Name</th>
									    <th class="text-center">Status</th>
									</tr>
								</thead>

								<tbody>
								<?php
									$hiring_id = $detail->hiring_briefs->id;
									$cv = App\Models\CV::where('hiring_brief_id',$hiring_id)->get();
								?>
								<?php $__currentLoopData = $cv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td><?php echo e($cv->name_candidate); ?></td>
										<td class="text-center"></td>
									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tbody>

							</table>
		            	<?php endif; ?>
		            </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>