                  	<div class="row">
                  		<div class="col-md-6">
                  			<div class="form-group">
		                		<label for="position_name" class="col-md-5 control-label">Position Name<span style="color: red;"> *</span>
		                		</label>
			                    <div class="col-md-6">
			                    	<input type="text" name="position_name" value="" class="form-control" id="position_name" placeholder="Position Name" required {{-- data-toggle="popover" data-trigger="hover" data-content="ini kontennya" title="ini keterangan" --}}>
			                    </div>
			                </div>

			                <div class="form-group">
		                		<label for="grade" class="col-md-5 control-label">Grade<span style="color: red;"> *</span></label>
			                    <div class="col-md-6">
			                        <input type="number" name="grade" value="" class="form-control" id="grade" placeholder="Grade" required>
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="location" class="col-md-5 control-label">Location<span style="color: red;"> *</span></label>
			                    <div class="col-md-6">
			                            <input type="text" name="location" value="" class="form-control" id="location" placeholder="Location" required>
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="reporting_to" class="col-md-5 control-label">Reporting To<span style="color: red;"> *</span></label>
			                    <div class="col-md-6">
			                            <input type="text" name="reporting_to" class="form-control" id="reporting_to" placeholder="Reporting To" required>
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="directorate" class="col-md-5 control-label">Directorate<span style="color: red;"> *</span></label>
			                    <div class="col-md-6">
			                            <input type="text" name="directorate" value="" class="form-control" id="directorate" placeholder="Directorate" required>
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="group" class="col-md-5 control-label">Group<span style="color: red;"> *</span></label>
			                    <div class="col-md-6">
			                        <select class="form-control" name="group" id="group" required>
			                        	<option value="">--- Choose Group ---</option>
			                        	@foreach( $group as $group)
			                        		<option value="{{ $group->id }}">{{ $group->group_name }}</option>
			                        	@endforeach
			                        </select>
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="division" class="col-md-5 control-label">Division<span style="color: red;"> *</span></label>
			                    <div class="col-md-6">
			                        <select class="form-control" name="division" id="division" required></select>
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="department" class="col-md-5 control-label">Department<span style="color: red;"> *</span></label>
			                    <div class="col-md-6">
			                        <select class="form-control" name="department" id="department" required></select>
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="headcount_type" class="col-md-5 control-label">Headcount Type<span style="color: red;"> *</span></label>
			                    <div class="col-md-6">
			                    	<select class="form-control" id="headcount_type" name="headcount_type" required>
		                    			<option value="">--- Choose Headcount Type ---</option>
	    							    <option value="Budgeted">Budgeted</option>
	    							    <option value="Budgeted">Unbudgeted</option>
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
					                    		<option value="">--- Choose Employee Status ---</option>
		        							    <option value="Permanent" id="Permanent">Permanent</option>
		        							    <option value="Contract" id="Contract">Contract</option>
				        					</select>
					                    </div>

					                    <div id="contract_form">
					                    	<label class="col-md-5 control-label">Contract Period<span style="color: red;"> *</span></label>
					                      	<div class="col-md-7" style="padding-bottom: 10px;">
					                          <div class="clearfix row">
					                              	<div class="col-md-6">
					                                 	<input type="text" name="from" id="fromDate" placeholder="From Date..." class="float-left mrg10R form-control" required>
					                              	</div>
					                              	<div class="col-md-6">
					                                  	<input type="text" name="to" id="toDate" placeholder="To Date..." class="float-left form-control" required>
					                              	</div>
					                          	</div>
					                      	</div>	
					                    </div>
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

		                            	<label for="type_hiring" class="col-md-4 control-label">Type Of Hiring<span style="color: red;"> *</span></label>
					                    <div class="col-md-8" style="padding-bottom: 10px;">
					                        <select class="form-control" id="type_hiring" name="type_hiring" required>
					                    		<option value="">--- Choose Source Type Of Hiring ---</option>
			    							    <option value="IJO">Internal Job Offering</option>
			    							    <option value="EJO">External Job Offering</option>
			    						    </select>
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

		                            	<label for="advertisement" class="col-md-4 control-label">Advertisement<span style="color: red;">*</span></label>
					                    <div class="col-md-8" style="padding-bottom: 20px;">
					                        <select class="form-control" id="advertisement" name="advertisement" required>
					                    		<option value="">--- Choose Advertisement ---</option>
		        							    <option value="Confidential">Confidential</option>
		        							    <option value="Non Confidential">Non Confidential</option>
		        						    </select>
					                    </div>

					                    <label for="bussiness_impact" class="col-md-4 control-label">Bussiness Impact</label>
					                    <div class="col-md-8" style="padding-bottom: 10px;">
					                        <select class="form-control" id="bussiness_impact" name="bussiness_impact">
					                    		<option value="">--- Choose Bussiness Impact ---</option>
		        							    <option value="Direct To Revenue">Direct To Revenue</option>
		        							    <option value="Indirect To Revenue">Indirect To Revenue</option>
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
					                    	<select class="form-control" id="request_background" name="request_background" required>
					                    		<option value="">--- Choose Request Background ---</option>
		        							    <option value="Replacement">Replacement</option>
		        							    <option value="New Position">New Position</option>
		        						  	</select>
					                    </div>

					                    <label for="reason" class="col-md-4 control-label">Reason<span style="color: red;"> *</span></label>
					                    <div class="col-md-8" style="padding-bottom: 10px;">
					                        <textarea class="form-control" id="reason" rows="3" name="reason" required></textarea>
					                    </div>
		                        	</fieldset>	
			                	</div>
		                    </div>

                  		</div><!-- tutup batas -->

                  	</div>