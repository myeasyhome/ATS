			      	<div class="row">
	              		<div class="col-md-6">
	              			<div class="form-group">
		                		<label for="position_name" class="col-md-5 control-label">Position Name<span style="color: red;"> *</span>
		                		</label>
			                    <div class="col-md-6">
			                    	<input type="text" name="position_name" value="{{ $data->position_name }}" class="form-control" id="position_name" title="Position Name" disabled>
			                    </div>
			                </div>

			                <div class="form-group">
		                		<label for="grade" class="col-md-5 control-label">Grade{{-- <span style="color: red;"> *</span> --}}
		                		</label>
			                    <div class="col-md-6">
			                        {{-- <input type="number" name="grade" value="" class="form-control" id="grade" placeholder="Grade" required> --}}
			                        <select class="form-control" name="grade" id="grade" required>
				                        @php $val=8; @endphp
				                        @for ($i = 1; $i <= $val ; $i++)
				                        	<option value="{{ $i }}" {{ $i == $data->position_grade ? "selected=true" : "" }} >{{ $i }}</option>
				                        @endfor
			                        </select>
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="location" class="col-md-5 control-label">Location<span style="color: red;"> *</span></label>
			                    <div class="col-md-6">
			                        <input type="text" name="location" value="{{ $data->location }}" class="form-control" id="location" placeholder="Input Location" required>
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="reporting_to" class="col-md-5 control-label">Reporting To<span style="color: red;"> *</span></label>
			                    <div class="col-md-6">
			                        <input type="text" name="reporting_to" value="{{ $data->ticket_erf_details->reporting_to }}" class="form-control" id="reporting_to" placeholder="Report to name, ex: Jhon Doe" required {{-- title="Reporting To" data-toggle="popover" data-trigger="hover" data-content="ini report ke nama orang" --}}>
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="directorate" class="col-md-5 control-label">Directorate<span style="color: red;"> *</span></label>
			                    <div class="col-md-6">
			                        <select class="form-control select2-directorate" name="directorate" required id="directorate" onchange="change_dir()">
			                       		<option></option>
										@foreach( $directorate as $directorate)
			                        		<option value="{{ $directorate->id }}" {{ $directorate->id == $data->ticket_erf_details->directorate ? "selected=true" : "" }}>{{ $directorate->directorate_name }}</option>
			                        	@endforeach
									</select>
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="group" class="col-md-5 control-label">Group<span style="color: red;"> *</span></label>
			                    <div class="col-md-6">
			                        <select class="form-control select2-group" name="group" required id="group" onchange="change_gr()">
			                        <option></option>
			                        @foreach( $group as $group)
		                        		<option value="{{ $group->id }}" {{ $group->id == $data->ticket_erf_details->group ? "selected=true" : "" }}>{{ $group->group_name }}</option>
		                        	@endforeach
									</select>
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="division" class="col-md-5 control-label">Division<span style="color: red;"> *</span></label>
			                    <div class="col-md-6">
			                        <select class="form-control select2-division" name="division" required id="division" onchange="change_div()">
			                        <option></option>
			                        @foreach( $division as $division)
		                        		<option value="{{ $division->id }}" {{ $division->id == $data->ticket_erf_details->division ? "selected=true" : "" }}>{{ $division->division_name }}</option>
		                        	@endforeach
									</select>
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="department" class="col-md-5 control-label">Department<span style="color: red;"> *</span></label>
			                    <div class="col-md-6">
			                        <select class="form-control select2-department" name="department" required id="department">
			                        <option></option>
			                        @foreach( $department as $department)
		                        		<option value="{{ $department->id }}" {{ $department->id == $data->ticket_erf_details->department ? "selected=true" : "" }}>{{ $department->department_name }}</option>
		                        	@endforeach
									</select>
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="headcount_type" class="col-md-5 control-label">Headcount Type<span style="color: red;"> *</span></label>
			                    <div class="col-md-6">
			                    	<select class="form-control" id="headcount_type" name="headcount_type" required>
		                    			<option value="" disabled selected>Select Headcount Type</option>
	    							    @if ( $data->ticket_erf_details->headcount_type == 'Budgeted' )
		                    				<option value="{{ $data->ticket_erf_details->headcount_type }}" selected="selected">{{ $data->ticket_erf_details->headcount_type }}
		                    				</option>
		                    				<option value="Unbudgeted">Unbudgeted</option>
		                    			@elseif ( $data->ticket_erf_details->headcount_type == 'Unbudgeted' )
		                    				<option value="Budgeted">Budgeted</option>
		                    				<option value="{{ $data->ticket_erf_details->headcount_type }}" selected="selected">{{ $data->ticket_erf_details->headcount_type }}
		                    				</option>
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

		                            	<label for="employee_status" class="col-md-5 control-label">Employee Status<span style="color: red;"> *</span></label>
		                            	<div class="col-md-7" style="padding-bottom: 10px;">
					                    	<select class="form-control" id="employee_status" name="employee_status" onchange="contract_form()" required>
					                    		<option value="" disabled selected>Select Employee Status</option>
					                    		@if ( $data->ticket_erf_details->employee_status == 'Permanent' )
					                    			<option value="Permanent" selected>Permanent</option>
					                    			<option value="Contract" id="Contract">Contract</option>
					                    		@elseif( $data->ticket_erf_details->employee_status == 'Contract' )
					                    			<option value="Permanent">Permanent</option>
					                    			<option value="Contract" selected id="Contract">Contract</option>
					                    		@endif
				        					</select>
					                    </div>

					                    @if ( $data->ticket_erf_details->employee_status == 'Contract' )
					                    <div id="edit_contract_form">
					                    	<label class="col-md-5 control-label">Contract Duration<span style="color: red;"> *</span></label>
					                      	<div class="col-md-7" style="padding-bottom: 10px;">
				                              	<select class="form-control" id="contract_duration" name="contract_duration" required>
				                              		@if( $data->ticket_erf_details->contract_duration == '3 Month' )
				                              			<option value="3 Month" selected>3 Month</option>
					                              		<option value="6 Month">6 Month</option>
					                              		<option value="12 Month">12 Month</option>
					                              		<option value="18 Month">18 Month</option>
					                              		<option value="24 Month">24 Month</option>
				                              		@elseif( $data->ticket_erf_details->contract_duration == '6 Month' )
				                              			<option value="3 Month">3 Month</option>
					                              		<option value="6 Month" selected>6 Month</option>
					                              		<option value="12 Month">12 Month</option>
					                              		<option value="18 Month">18 Month</option>
					                              		<option value="24 Month">24 Month</option>
				                              		@elseif( $data->ticket_erf_details->contract_duration == '12 Month' )
				                              			<option value="3 Month">3 Month</option>
					                              		<option value="6 Month">6 Month</option>
					                              		<option value="12 Month" selected>12 Month</option>
					                              		<option value="18 Month">18 Month</option>
					                              		<option value="24 Month">24 Month</option>
				                              		@elseif( $data->ticket_erf_details->contract_duration == '18 Month' )
				                              			<option value="3 Month">3 Month</option>
					                              		<option value="6 Month">6 Month</option>
					                              		<option value="12 Month">12 Month</option>
					                              		<option value="18 Month" selected>18 Month</option>
					                              		<option value="24 Month">24 Month</option>
				                              		@elseif( $data->ticket_erf_details->contract_duration == '24 Month' )
				                              			<option value="3 Month">3 Month</option>
					                              		<option value="6 Month">6 Month</option>
					                              		<option value="12 Month">12 Month</option>
					                              		<option value="18 Month">18 Month</option>
					                              		<option value="24 Month" selected>24 Month</option>
				                              		@endif
				                              	</select>
					                      	</div>	
					                    </div>
					                    @else
					                    <div id="edit_contract_form">
					                    	<label class="col-md-5 control-label">Contract Duration<span style="color: red;"> *</span></label>
					                      	<div class="col-md-7" style="padding-bottom: 10px;">
				                              	<select class="form-control" id="contract_duration" name="contract_duration" required>
				                              		@if( $data->ticket_erf_details->contract_duration == '3 Month' )
				                              			<option value="3 Month" selected>3 Month</option>
					                              		<option value="6 Month">6 Month</option>
					                              		<option value="12 Month">12 Month</option>
					                              		<option value="18 Month">18 Month</option>
					                              		<option value="24 Month">24 Month</option>
				                              		@elseif( $data->ticket_erf_details->contract_duration == '6 Month' )
				                              			<option value="3 Month">3 Month</option>
					                              		<option value="6 Month" selected>6 Month</option>
					                              		<option value="12 Month">12 Month</option>
					                              		<option value="18 Month">18 Month</option>
					                              		<option value="24 Month">24 Month</option>
				                              		@elseif( $data->ticket_erf_details->contract_duration == '12 Month' )
				                              			<option value="3 Month">3 Month</option>
					                              		<option value="6 Month">6 Month</option>
					                              		<option value="12 Month" selected>12 Month</option>
					                              		<option value="18 Month">18 Month</option>
					                              		<option value="24 Month">24 Month</option>
				                              		@elseif( $data->ticket_erf_details->contract_duration == '18 Month' )
				                              			<option value="3 Month">3 Month</option>
					                              		<option value="6 Month">6 Month</option>
					                              		<option value="12 Month">12 Month</option>
					                              		<option value="18 Month" selected>18 Month</option>
					                              		<option value="24 Month">24 Month</option>
				                              		@elseif( $data->ticket_erf_details->contract_duration == '24 Month' )
				                              			<option value="3 Month">3 Month</option>
					                              		<option value="6 Month">6 Month</option>
					                              		<option value="12 Month">12 Month</option>
					                              		<option value="18 Month">18 Month</option>
					                              		<option value="24 Month" selected>24 Month</option>
				                              		@endif
				                              	</select>
					                      	</div>	
					                    </div>	
					                    @endif
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
					                    	@php
					                    		$type_hiring = json_decode($data->ticket_erf_details->type_hiring)
					                    	@endphp
					                    	@if ( count($type_hiring) > 1 )
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
					                    	@elseif ( $type_hiring[0] == 'IJO' )
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
					                    	@elseif ( $type_hiring[0] == 'EJO' )
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
					                    	@endif
			                              {{--   <div class="checkbox checkbox-success">
			                                    <label>
			                                        <input type="checkbox" id="type_hiring" value="IJO" name="type_hiring[]" class="custom-checkbox">
			                                        Internal Job Offering
			                                    </label>
			                                </div>
			                                <div class="checkbox checkbox-success">
			                                    <label>
			                                        <input type="checkbox" id="type_hiring" value="EJO" name="type_hiring[]" class="custom-checkbox">
			                                        External Job Offering
			                                    </label>
			                                </div> --}}
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

		                            	<label for="Confidentiality" class="col-md-4 control-label">Confidentiality <span style="color: red;">*</span></label>
					                    <div class="col-md-8" style="padding-bottom: 20px;">
					                        <select class="form-control" id="Confidentiality" name="confidentiality" required>
					                    		<option value="" disabled selected>Select Confidentiality</option>
					                    		@if ( $data->ticket_erf_details->confidentiality == 'Confidential' )
					                    			<option value="Confidential" selected>Confidential</option>
		        							    	<option value="Non Confidential">Non Confidential</option>
					                    		@elseif ( $data->ticket_erf_details->confidentiality == 'Non Confidential' )
					                    			<option value="Confidential">Confidential</option>
		        							    	<option value="Non Confidential" selected>Non Confidential</option>
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
					                    		<option value="" disabled selected>Select Request Background</option>
					                    		@if ( $data->ticket_erf_details->request_background == 'Replacement' )
					                    			<option value="Replacement" selected>Replacement</option>
		        							    	<option value="New Position">New Position</option>
					                    		@elseif ( $data->ticket_erf_details->request_background == 'New Position' )
					                    			<option value="Replacement">Replacement</option>
		        							    	<option value="New Position" selected>New Position</option>
					                    		@endif
		        						  	</select>
					                    </div>

					                    <label for="reason" class="col-md-4 control-label">Reason<span style="color: red;"> *</span></label>
					                    <div class="col-md-8" style="padding-bottom: 10px;">
					                        <textarea class="form-control" id="reason" rows="3" name="reason" required>{{ $data->ticket_erf_details->reason }}</textarea>
					                    </div>
		                        	</fieldset>	
			                	</div>
		                    </div>

	              		</div><!-- tutup batas -->

	              	</div>