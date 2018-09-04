			      	<div class="row">
                  		<div class="col-md-6">
                  			<div class="form-group">
		                		<label for="position_name" class="col-md-5 control-label">Position Name
		                		</label>
			                    <div class="col-md-6">
			                    	<input type="text" name="position_name" value="{{ $edit->position_name }}" class="form-control" id="position_name" placeholder="Position Name" disabled data-toggle="popover" data-trigger="hover" data-content="ini kontennya" title="ini keterangan">
			                    </div>
			                </div>

			                <div class="form-group">
		                		<label for="grade" class="col-md-5 control-label">Grade<span style="color: red;"> *</span></label>
			                    <div class="col-md-6">
			                        <input type="number" name="grade" value="{{ $edit->position_grade }}" class="form-control" id="grade" placeholder="Grade" required>
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="location" class="col-md-5 control-label">Location<span style="color: red;"> *</span></label>
			                    <div class="col-md-6">
			                            <input type="text" name="location" value="{{ $edit->location }}" class="form-control" id="location" placeholder="Location" required>
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="reporting_to" class="col-md-5 control-label">Reporting To<span style="color: red;"> *</span></label>
			                    <div class="col-md-6">
			                            <input type="text" name="reporting_to" value="{{ $edit->ticket_erf_details->reporting_to }}" class="form-control" id="reporting_to" placeholder="Reporting To" required>
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="directorate" class="col-md-5 control-label">Directorate<span style="color: red;"> *</span></label>
			                    <div class="col-md-6">
			                            <input type="text" name="directorate" value="{{ $edit->ticket_erf_details->directorate }}" class="form-control" id="directorate" placeholder="Directorate" required>
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="group" class="col-md-5 control-label">Group<span style="color: red;"> *</span></label>
			                    <div class="col-md-6">
			                		<select class="form-control" name="group" id="group" required>
			                        	@foreach( $group as $group)
			                        		<option value="{{ $group->id }}" 
			                        		{{ $group->id == $edit->ticket_erf_details->group ? "selected=true" : "" }} >
			                        			{{ $group->group_name }}
			                        		</option>
			                        	@endforeach
			                        </select>
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="division" class="col-md-5 control-label">Division<span style="color: red;"> *</span></label>
			                    <div class="col-md-6">
			                		<select class="form-control" name="division" id="division" data-division="{{ $edit->ticket_erf_details->division }}" required></select>
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="department" class="col-md-5 control-label">Department<span style="color: red;"> *</span></label>
			                    <div class="col-md-6">
			                        <select class="form-control" name="department" id="department" data-department="{{ $edit->ticket_erf_details->department }}" required></select>
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="headcount_type" class="col-md-5 control-label">Headcount Type<span style="color: red;"> *</span></label>
			                    <div class="col-md-6">
			                    	<select class="form-control" id="headcount_type" name="headcount_type" required>
		                    			@if ( $edit->ticket_erf_details->headcount_type == 'Budgeted' )
		                    				<option value="{{ $edit->ticket_erf_details->headcount_type }}" selected="selected">{{ $edit->ticket_erf_details->headcount_type }}
		                    				</option>
		                    				<option value="Unbudgeted">Unbudgeted</option>
		                    			@elseif ( $edit->ticket_erf_details->headcount_type == 'Unbudgeted' )
		                    				<option value="Budgeted">Budgeted</option>
		                    				<option value="{{ $edit->ticket_erf_details->headcount_type }}" selected="selected">{{ $edit->ticket_erf_details->headcount_type }}
		                    				</option>
		                    			@else
		                    				<option value="">--- Choose Nature Of Request ---</option>
		                    				<option value="Budgeted">Budgeted</option>
		                    				<option value="Unbudgeted">Unbudgeted</option>
		                    			@endif
	    						    </select>
			                    </div>
			                </div>

			                <div class="form-group">
			                	<div class="col-md-11">
			                		<fieldset class="the-fieldset">
		                            	<legend class="the-legend">
		                            		<label class="control-label">Status Of Employment</label>
		                            	</legend>

		                            	<label for="employee_status" class="col-md-5 control-label">Employee Status</label>
		                            	<div class="col-md-7" style="padding-bottom: 10px;">
					                    	<select class="form-control" id="employee_status" name="employee_status" onchange="contract_form()">
					                    		@if ( $edit->ticket_erf_details->employee_status == 'Permanent' )
						                    		<option value="{{ $edit->ticket_erf_details->employee_status }}" selected="selected">{{ $edit->ticket_erf_details->employee_status }}
					                    			</option>
				                    				<option value="Contract" id="Contract">Contract</option>
											    @elseif ( $edit->ticket_erf_details->employee_status == 'Contract' )
											    	<option value="Permanent">Permanent</option>
				                    				<option value="{{ $edit->ticket_erf_details->employee_status }}" selected="selected">{{ $edit->ticket_erf_details->employee_status }}
				                    				</option>
				                    			@else
				                    				<option value="">--- Choose Employee Status ---</option>
				                    				<option value="Permanent">Permanent</option>
				                    				<option value="Contract" id="Contract">Contract</option>
											    @endif
				        					</select>
					                    </div>

					                    <div id="contract_form">
					                    	<label class="col-md-5 control-label">Contract Period</label>
					                      	<div class="col-md-7" style="padding-bottom: 10px;">
					                          <div class="clearfix row">
					                              	<div class="col-md-6">
					                                 	<input type="text" name="from" id="fromDate" placeholder="From Date..." class="float-left mrg10R form-control" value="{{ $edit->ticket_erf_details->contract_from }}">
					                              	</div>
					                              	<div class="col-md-6">
					                                  	<input type="text" name="to" id="toDate" placeholder="To Date..." class="float-left form-control" value="{{ $edit->ticket_erf_details->contract_to }}">
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
					                        	@if ( $edit->ticket_erf_details->type_hiring == 'IJO' )
						                    		<option value="{{ $edit->ticket_erf_details->type_hiring }}" selected="selected">Internal Job Offering
					                    			</option>
				                    				<option value="EJO">External Job Offering</option>
											    @elseif ( $edit->ticket_erf_details->type_hiring == 'EJO' )
											    	<option value="IJO">Internal Job Offering</option>
				                    				<option value="{{ $edit->ticket_erf_details->type_hiring }}" selected="selected">External Job Offering
				                    				</option>
				                    			@else
				                    				<option value="">--- Choose Source Type Of Hiring ---</option>
				    							    <option value="IJO">Internal Job Offering</option>
				    							    <option value="EJO">External Job Offering</option>
											    @endif
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
					                        	@if ( $edit->ticket_erf_details->advertisement == 'Confidential' )
					                        		<option value="{{ $edit->ticket_erf_details->advertisement }}" selected="selected">Confidential
					                    			</option>
				                    				<option value="Non Confidential">Non Confidential</option>
					                        	@elseif ( $edit->ticket_erf_details->advertisement == 'Non Confidential' )
					                        		<option value="Confidential">Confidential</option>
					                        		<option value="{{ $edit->ticket_erf_details->advertisement }}" selected="selected">Non Confidential
					                    			</option>
					                        	@else
						                    		<option value="">--- Choose Advertisement ---</option>
			        							    <option value="Confidential">Confidential</option>
			        							    <option value="Non Confidential">Non Confidential</option>
											    @endif
					                    		<option value="">--- Choose Advertisement ---</option>
		        							    <option value="Confidential">Confidential</option>
		        							    <option value="Non Confidential">Non Confidential</option>
		        						    </select>
					                    </div>

					                    <label for="bussiness_impact" class="col-md-4 control-label">Bussiness Impact</label>
					                    <div class="col-md-8" style="padding-bottom: 10px;">
					                        <select class="form-control" id="bussiness_impact" name="bussiness_impact">
					                    		@if ( $edit->ticket_erf_details->bussiness_impact == 'Direct To Revenue' )
					                        		<option value="{{ $edit->ticket_erf_details->bussiness_impact }}" selected="selected">Direct To Revenue
					                    			</option>
					                    			<option value="Indirect">Indirect To Revenue</option>
					                        	@elseif ( $edit->ticket_erf_details->bussiness_impact == 'Indirect To Revenue' )
					                        		<option value="Direct To Revenue">Direct To Revenue</option>
					                        		<option value="{{ $edit->ticket_erf_details->bussiness_impact }}" selected="selected">Indirect To Revenue
					                    			</option>
					                        	@else
						                    		<option value="">--- Choose Bussiness Impact ---</option>
												    <option value="Direct To Revenue">Direct To Revenue</option>
												    <option value="Indirect To Revenue">Indirect To Revenue</option>
											    @endif
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
					                    		@if ( $edit->ticket_erf_details->request_background == 'Replacement' )
				                      				<option value="">--- Choose Request Background ---</option>
												    <option value="{{ $edit->ticket_erf_details->request_background }}" selected="selected">{{ $edit->ticket_erf_details->request_background }}
				                    				</option>
				                    				<option value="New Position">New Position</option>
				                      			@elseif ( $edit->ticket_erf_details->request_background == 'New Position' )
				                      				<option value="">--- Choose Request Background ---</option>
												    <option value="Replacement">Replacement</option>
												    <option value="{{ $edit->ticket_erf_details->request_background }}" selected="selected">{{ $edit->ticket_erf_details->request_background }}
				                    				</option>
				                    			@else
					                				<option value="">--- Choose Request Background ---</option>
												    <option value="Replacement">Replacement</option>
		        							    	<option value="Additional">New Position</option>
											    @endif
		        						  	</select>
					                    </div>

					                    <label for="reason" class="col-md-4 control-label">Reason<span style="color: red;"> *</span></label>
					                    <div class="col-md-8" style="padding-bottom: 10px;">
					                        <textarea class="form-control" id="reason" rows="3" name="reason" required>{{ $edit->reason }}</textarea>
					                    </div>
		                        	</fieldset>	
			                	</div>
		                    </div>

                  		</div><!-- tutup batas -->

                  	</div>