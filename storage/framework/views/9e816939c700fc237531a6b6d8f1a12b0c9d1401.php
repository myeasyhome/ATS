			      	<div class="row">
	              		<div class="col-md-6">
	              			<div class="form-group">
		                		<label for="position_name" class="col-md-5 control-label">Position Name<span style="color: red;"> *</span>
		                		</label>
			                    <div class="col-md-6">
			                    	<input type="text" name="position_name" value="<?php echo e($data->position_name); ?>" class="form-control" id="position_name" title="Position Name" disabled>
			                    </div>
			                </div>

			                <div class="form-group">
		                		<label for="grade" class="col-md-5 control-label">Grade<span style="color: red;"> *</span>
		                		</label>
			                    <div class="col-md-6">
			                        <select class="form-control" name="grade" id="grade" required>
				                        <?php if( Auth::user()->grade == 7 ): ?>
			                            	<?php $val=7; ?>
				                                <?php for($i = 3; $i <= $val ; $i++): ?>
				                                	<option value="<?php echo e($i); ?>" <?php echo e($i == $data->position_grade ? "selected=true" : ""); ?> ><?php echo e($i); ?></option>
				                                <?php endfor; ?>
			                            <?php elseif( Auth::user()->grade == 8 ): ?>
			                            	<?php $val=8; ?>
				                                <?php for($i = 3; $i <= $val ; $i++): ?>
				                                	<option value="<?php echo e($i); ?>" <?php echo e($i == $data->position_grade ? "selected=true" : ""); ?> ><?php echo e($i); ?></option>
				                                <?php endfor; ?>
			                            <?php elseif( Auth::user()->grade == 9 ): ?>
			                            	<?php $val=9; ?>
				                                <?php for($i = 3; $i <= $val ; $i++): ?>
				                                	<option value="<?php echo e($i); ?>" <?php echo e($i == $data->position_grade ? "selected=true" : ""); ?> ><?php echo e($i); ?></option>
				                                <?php endfor; ?>
			                            <?php endif; ?>
			                        </select>
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="location" class="col-md-5 control-label">Location<span style="color: red;"> *</span></label>
			                    <div class="col-md-6">
			                        <input type="text" name="location" value="<?php echo e($data->location); ?>" class="form-control" id="location" placeholder="Input Location" required>
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="reporting_to" class="col-md-5 control-label">Reporting To<span style="color: red;"> *</span></label>
			                    <div class="col-md-6">
			                        <input type="text" name="reporting_to" value="<?php echo e($data->ticket_erf_details->reporting_to); ?>" class="form-control" id="reporting_to" placeholder="Report to name, ex: Jhon Doe" required >
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="directorate" class="col-md-5 control-label">Directorate<span style="color: red;"> *</span></label>
			                    <div class="col-md-6">
			                        <select class="form-control select2-directorate" name="directorate" required id="directorate" onchange="change_dir()">
			                       		<option></option>
										<?php $__currentLoopData = $directorate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $directorate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			                        		<option value="<?php echo e($directorate->id); ?>" <?php echo e($directorate->id == $data->ticket_erf_details->directorate ? "selected=true" : ""); ?>><?php echo e($directorate->directorate_name); ?></option>
			                        	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="group" class="col-md-5 control-label">Group<span style="color: red;"> *</span></label>
			                    <div class="col-md-6">
			                        <select class="form-control select2-group" name="group" required id="group" onchange="change_gr()">
			                        <option></option>
			                        <?php $__currentLoopData = $group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                        		<option value="<?php echo e($group->id); ?>" <?php echo e($group->id == $data->ticket_erf_details->group ? "selected=true" : ""); ?>><?php echo e($group->group_name); ?></option>
		                        	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="division" class="col-md-5 control-label">Division<span style="color: red;"> *</span></label>
			                    <div class="col-md-6">
			                        <select class="form-control select2-division" name="division" required id="division" onchange="change_div()">
			                        <option></option>
			                        <?php $__currentLoopData = $division; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $division): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                        		<option value="<?php echo e($division->id); ?>" <?php echo e($division->id == $data->ticket_erf_details->division ? "selected=true" : ""); ?>><?php echo e($division->division_name); ?></option>
		                        	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="department" class="col-md-5 control-label">Department<span style="color: red;"> *</span></label>
			                    <div class="col-md-6">
			                        <select class="form-control select2-department" name="department" required id="department">
			                        <option></option>
			                        <?php $__currentLoopData = $department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                        		<option value="<?php echo e($department->id); ?>" <?php echo e($department->id == $data->ticket_erf_details->department ? "selected=true" : ""); ?>><?php echo e($department->department_name); ?></option>
		                        	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="headcount_type" class="col-md-5 control-label">Headcount Type<span style="color: red;"> *</span></label>
			                    <div class="col-md-6">
			                    	<select class="form-control" id="headcount_type" name="headcount_type" required>
		                    			<option value="" disabled selected>Select Headcount Type</option>
	    							    <?php if( $data->ticket_erf_details->headcount_type == 'Budgeted' ): ?>
		                    				<option value="<?php echo e($data->ticket_erf_details->headcount_type); ?>" selected="selected"><?php echo e($data->ticket_erf_details->headcount_type); ?>

		                    				</option>
		                    				<option value="Unbudgeted">Unbudgeted</option>
		                    			<?php elseif( $data->ticket_erf_details->headcount_type == 'Unbudgeted' ): ?>
		                    				<option value="Budgeted">Budgeted</option>
		                    				<option value="<?php echo e($data->ticket_erf_details->headcount_type); ?>" selected="selected"><?php echo e($data->ticket_erf_details->headcount_type); ?>

		                    				</option>
		                    			<?php endif; ?>
	    						    </select>
			                    </div>
			                </div>

			                <div class="form-group">
			                	<div class="col-md-11">
			                		<fieldset class="the-fieldset">
		                            	<legend class="the-legend">
		                            		<label class="control-label">Status Of Employment</label>
		                            	</legend>

		                            	<label for="employee_status" class="col-md-5 control-label">Employee Status<span style="color: red;"> *</span></label>
		                            	<div class="col-md-7" style="padding-bottom: 10px;">
					                    	<select class="form-control" id="employee_status" name="employee_status" onchange="contract_form()" required>
					                    		<option value="" disabled selected>Select Employee Status</option>
					                    		<?php if( $data->ticket_erf_details->employee_status == 'Permanent' ): ?>
					                    			<option value="Permanent" selected>Permanent</option>
					                    			<option value="Contract" id="Contract">Contract</option>
					                    		<?php elseif( $data->ticket_erf_details->employee_status == 'Contract' ): ?>
					                    			<option value="Permanent">Permanent</option>
					                    			<option value="Contract" selected id="Contract">Contract</option>
					                    		<?php endif; ?>
				        					</select>
					                    </div>

					                    <?php if( $data->ticket_erf_details->employee_status == 'Contract' ): ?>
					                    <div id="edit_contract_form">
					                    	<label class="col-md-5 control-label">Contract Duration<span style="color: red;"> *</span></label>
					                      	<div class="col-md-7" style="padding-bottom: 10px;">
				                              	<select class="form-control" id="contract_duration" name="contract_duration" required>
				                              		<?php if( $data->ticket_erf_details->contract_duration == '6 Month' ): ?>
					                              		<option value="6 Month" selected>6 Month</option>
					                              		<option value="12 Month">12 Month</option>
					                              		<option value="24 Month">24 Month</option>
				                              		<?php elseif( $data->ticket_erf_details->contract_duration == '12 Month' ): ?>
					                              		<option value="6 Month">6 Month</option>
					                              		<option value="12 Month" selected>12 Month</option>
					                              		<option value="24 Month">24 Month</option>
				                              		<?php elseif( $data->ticket_erf_details->contract_duration == '24 Month' ): ?>
					                              		<option value="6 Month">6 Month</option>
					                              		<option value="12 Month">12 Month</option>
					                              		<option value="24 Month" selected>24 Month</option>
				                              		<?php endif; ?>
				                              	</select>
					                      	</div>	
					                    </div>
					                    <?php else: ?>
					                    <div id="edit_contract_form">
					                    	<label class="col-md-5 control-label">Contract Duration<span style="color: red;"> *</span></label>
					                      	<div class="col-md-7" style="padding-bottom: 10px;">
				                              	<select class="form-control" id="contract_duration" name="contract_duration" required>
				                              		<?php if( $data->ticket_erf_details->contract_duration == '6 Month' ): ?>
					                              		<option value="6 Month" selected>6 Month</option>
					                              		<option value="12 Month">12 Month</option>
					                              		<option value="24 Month">24 Month</option>
				                              		<?php elseif( $data->ticket_erf_details->contract_duration == '12 Month' ): ?>
					                              		<option value="6 Month">6 Month</option>
					                              		<option value="12 Month" selected>12 Month</option>
					                              		<option value="24 Month">24 Month</option>
				                              		<?php elseif( $data->ticket_erf_details->contract_duration == '24 Month' ): ?>
					                              		<option value="6 Month">6 Month</option>
					                              		<option value="12 Month">12 Month</option>
					                              		<option value="24 Month" selected>24 Month</option>
				                              		<?php endif; ?>
				                              	</select>
					                      	</div>	
					                    </div>	
					                    <?php endif; ?>
		                        	</fieldset>	
			                	</div>
		                    </div>

	              		</div>

	              		<!-- BATAS -->
	              		<div class="col-md-6">
			                

		                    <div class="form-group">
			                	<div class="col-md-12">
			                		<fieldset class="the-fieldset">
		                            	<legend class="the-legend">
		                            		<label class="control-label">Sources</label>
		                            	</legend>

		                            	<label for="type_hiring" class="col-md-4 control-label">
		                            		Type Of Hiring<span style="color: red;"> *</span>
		                            	</label>
					                    <div class="col-md-6">
					                    	<?php
					                    		$type_hiring = json_decode($data->ticket_erf_details->type_hiring)
					                    	?>
					                    	<?php if( count($type_hiring) > 1 ): ?>
						                    	<div class="checkbox checkbox-success">
				                                    <label>
				                                        <input type="checkbox" id="type_hiring" value="IJO" name="type_hiring[]" class="custom-checkbox" checked>
				                                        Internal Job Offering
				                                    </label>
				                                </div>
				                                <div class="checkbox checkbox-success">
				                                    <label>
				                                        <input type="checkbox" id="type_hiring" value="EJO" name="type_hiring[]" class="custom-checkbox" checked>
				                                        External Job Offering
				                                    </label>
				                                </div>
					                    	<?php elseif( $type_hiring[0] == 'IJO' ): ?>
					                    		<div class="checkbox checkbox-success">
				                                    <label>
				                                        <input type="checkbox" id="type_hiring" value="IJO" name="type_hiring[]" class="custom-checkbox" checked>
				                                        Internal Job Offering
				                                    </label>
				                                </div>
				                                <div class="checkbox checkbox-success">
				                                    <label>
				                                        <input type="checkbox" id="type_hiring" value="EJO" name="type_hiring[]" class="custom-checkbox">
				                                        External Job Offering
				                                    </label>
				                                </div>
					                    	<?php elseif( $type_hiring[0] == 'EJO' ): ?>
					                    		<div class="checkbox checkbox-success">
				                                    <label>
				                                        <input type="checkbox" id="type_hiring" value="IJO" name="type_hiring[]" class="custom-checkbox">
				                                        Internal Job Offering
				                                    </label>
				                                </div>
				                                <div class="checkbox checkbox-success">
				                                    <label>
				                                        <input type="checkbox" id="type_hiring" value="EJO" name="type_hiring[]" class="custom-checkbox" checked>
				                                        External Job Offering
				                                    </label>
				                                </div>
					                    	<?php endif; ?>
			                            </div>
		                        	</fieldset>	
			                	</div>
		                    </div>

		                    <div class="form-group">
			                	<div class="col-md-12">
			                		<fieldset class="the-fieldset">
		                            	<legend class="the-legend">
		                            		<label class="control-label">Nature Of Hiring</label>
		                            	</legend>

		                            	<label for="Confidentiality" class="col-md-4 control-label">Advertisement <span style="color: red;">*</span></label>
					                    <div class="col-md-8" style="padding-bottom: 20px;">
					                        <select class="form-control" id="Confidentiality" name="confidentiality" required>
					                    		<option value="" disabled selected>Select Advertisement</option>
					                    		<?php if( $data->ticket_erf_details->confidentiality == 'Publish' ): ?>
					                    			<option value="Publish" selected>Publish</option>
		        							    	<option value="Non Publish">Non Publish</option>
					                    		<?php elseif( $data->ticket_erf_details->confidentiality == 'Non Publish' ): ?>
					                    			<option value="Publish">Publish</option>
		        							    	<option value="Non Publish" selected>Non Publish</option>
					                    		<?php endif; ?>
		        						    </select>
					                    </div>
		                        	</fieldset>	
			                	</div>
		                    </div>

		                    <div class="form-group">
			                	<div class="col-md-12">
			                		<fieldset class="the-fieldset">
		                            	<legend class="the-legend">
		                            		<label for="request_background" class="control-label">Reason For Hiring</label>
		                            	</legend>

		                            	<label for="request_background" class="col-md-4 control-label">Request Background<span style="color: red;"> *</span></label>
					                    <div class="col-md-8" style="padding-bottom: 20px;">
					                    	<select class="form-control" id="request_background" name="request_background" onchange="request_form()" required>
					                    		<option value="" disabled selected>Select Request Background</option>
					                    		<?php if( $data->ticket_erf_details->request_background == 'Replacement' ): ?>
					                    			<option value="Replacement" selected>Replacement</option>
		        							    	<option value="New Position">New Position</option>
					                    		<?php elseif( $data->ticket_erf_details->request_background == 'New Position' ): ?>
					                    			<option value="Replacement">Replacement</option>
		        							    	<option value="New Position" selected>New Position</option>
					                    		<?php endif; ?>
		        						  	</select>
					                    </div>

					                    <label for="reason" class="col-md-4 control-label">Hiring Justification<span style="color: red;"> *</span></label>
					                    <div class="col-md-8" style="padding-bottom: 10px;">
					                        <textarea class="form-control" id="reason" rows="3" name="reason" required><?php echo e($data->ticket_erf_details->reason); ?></textarea>
					                    </div>
		                        	</fieldset>	
			                	</div>
		                    </div>

	              		</div><!-- tutup batas -->

	              	</div>