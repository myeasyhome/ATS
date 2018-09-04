		            <div class="row" style="padding-bottom: 20px;">
		            	<div class="col-md-6">
		            		<div class="form-group">
		                		<label for="supervisor_title" class="col-md-4 control-label">Supervisor Title</label>
			                    <div class="col-md-8">
			                            <input type="text" name="supervisor_title" value="{{ $edit->ticket_jd_details->supervisor }}" class="form-control" id="supervisor_title" placeholder="Supervisor Title">
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="incumbent" class="col-md-4 control-label">Incumbent Name</label>
			                    <div class="col-md-8">
			                            <input type="text" name="incumbent" value="{{ $edit->ticket_jd_details->incumbent_name }}" class="form-control" id="incumbent" placeholder="Incumbent Name">
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="supervisor_name" class="col-md-4 control-label">Supervisor Name</label>
			                    <div class="col-md-8">
			                            <input type="text" name="supervisor_name" value="{{ $edit->ticket_jd_details->supervisor_name }}" class="form-control" id="supervisor_name" placeholder="Supervisor Name">
			                    </div>
			                </div>

							<div class="form-group">
			                    <label for="role_purpose" class="col-md-4 control-label">Role Purpose</label>
			                    <div class="col-md-8">
			                        <textarea class="form-control" rows="5" cols="49" id="role_purpose" name="role_purpose">{{ $edit->ticket_jd_details->role_purpose }}</textarea>
			                    </div>
			                </div>

			            </div>

		                <!-- BATAS utk ke kanan -->
		                <div class="col-md-6">
		                	<div class="form-group">
			                    <label for="direct_sub" class="col-md-4 control-label">Direct Sub Ordinate</label>
			                    <div class="col-md-8">
			                        <input type="text" name="direct_sub" value="{{ $edit->ticket_jd_details->direct_sub }}" class="form-control" id="direct_sub" placeholder="Direct Sub Ordinate">
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="indirect_sub" class="col-md-4 control-label">Indirect Sub Ordinate</label>
			                    <div class="col-md-8">
			                        <input type="text" name="indirect_sub" value="{{ $edit->ticket_jd_details->indirect_sub }}" class="form-control" id="indirect_sub" placeholder="Indirect Sub Ordinate">
			                    </div>
			                </div>

		                	{{-- <div class="form-group">
			                	<div class="col-md-12">
			                		<fieldset class="the-fieldset">
		                            	<legend class="the-legend">
		                            		<label class="control-label">Reporting Relationship</label>
		                            	</legend>

		                            	<label for="report" class="col-md-12">Organization Development Analyst Report To</label>
					                    <div class="col-md-10" style="padding-bottom: 10px;">
					                        <input type="text" name="direct" value="" class="form-control" id="report" placeholder="Direct Reports">
					                    </div>

					                    <label for="report2" class="col-md-12">Organization Development Manager</label>
					                    <div class="col-md-10" style="padding-bottom: 10px;">
					                        <input type="text" name="indirect" value="" class="form-control" id="report2" placeholder="Indirect Reports">
					                    </div>

		                        	</fieldset>	
			                	</div>
		                    </div> --}}

		                    {{-- <div class="form-group">
			                	<div class="col-md-12">
			                		<fieldset class="the-fieldset">
		                            	<legend class="the-legend">
		                            		<label class="control-label">Minimum Requirements</label>
		                            	</legend>

		                            	<label for="qualification" class="col-sm-6">Qualification</label>
					                    <div class="col-md-12" style="padding-bottom: 20px;">
					                         <textarea class="form-control" rows="5" cols="49" id="qualification" name="qualification"></textarea>
					                    </div>

				                    	<label for="exp" class="col-md-6">Experience</label>
					                    <div class="col-md-12" style="padding-bottom: 20px;">
					                         <textarea class="form-control" rows="5" cols="49" id="exp" name="experience" ></textarea>
					                    </div>

					                    <label for="skill" class="col-md-6">Skills</label>
					                    <div class="col-md-12" style="padding-bottom: 10px;">
					                         <textarea class="form-control" rows="5" cols="49" id="skill" name="skill"></textarea>
					                    </div>
					                    
		                        	</fieldset>	
			                	</div>
		                    </div> --}}

		                </div>
		                <!-- penutup batas kanan -->
		            </div>
		            	
	            	<div class="form-group">
	                	<div class="col-md-12">
	                		{{-- <fieldset class="the-fieldset">
	                        	<legend class="the-legend">
	                        		<label class="control-label">Scope</label>
	                        	</legend> --}}

	                        	<table class="table table-striped table-bordered responsive" id="table_custom">
		                			<thead>
		                				<tr>
		                					<th class="col-sm-3 text-center">Area Of Responsibilities</th>
		                					<th class="text-center">Key Activities</th>
		                					<th class="col-sm-1 text-center">Action</th>
		                				</tr>
		                			</thead>
		                			<tbody>
	                					@foreach($scope_area as $array => $value)
			                				<tr id="row{{ $array }}" >
		                						<td>
		                							<textarea class="form-control" cols="27" rows="3" name="scope_area[]">
		                								{{ $value }}
		                							</textarea>
			                					</td>
			                					<td>
			                						<textarea class="form-control" id="addLine" cols="77" rows="4" name="scope_activities[]">	{{ $scope_activities[$array] }}
			                						</textarea>
			                					</td>
			                					<td>
			                						<button type="button" id={{ $array }} class="btn btn-danger btn_remove">X</button></td>
			                					</td>		
			                				</tr>
			                			@endforeach
		                			</tbody>
		                		</table>
		                		<div class="col-md-12 pull-right">
			                		<button type="button" id="add_field" class="btn btn-primary">+</button>
			                	</div>
	                    	{{-- </fieldset>	 --}}
	                	</div>
	                </div>
	            
	            


	            