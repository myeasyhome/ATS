					<div class="row" style="padding-bottom: 20px;">
		            	<div class="col-md-6">
		            		<div class="form-group">
		                		<label for="supervisor_title" class="col-md-4 control-label">Supervisor Title</label>
			                    <div class="col-md-8">
			                            <input type="text" name="supervisor_title" value="{{ $data->ticket_jd_details->supervisor }}" class="form-control" id="supervisor_title" placeholder="Input Supervisor Title">
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="incumbent" class="col-md-4 control-label">Incumbent Name</label>
			                    <div class="col-md-8">
			                            <input type="text" name="incumbent" value="{{ $data->ticket_jd_details->incumbent_name }}" class="form-control" id="incumbent" placeholder="Input Incumbent Name">
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="supervisor_name" class="col-md-4 control-label">Supervisor Name</label>
			                    <div class="col-md-8">
			                            <input type="text" name="supervisor_name" value="{{ $data->ticket_jd_details->supervisor_name }}" class="form-control" id="supervisor_name" placeholder="Input Supervisor Name">
			                    </div>
			                </div>

							<div class="form-group">
			                    <label for="role_purpose" class="col-md-4 control-label">Role Purpose</label>
			                    <div class="col-md-8">
			                        <textarea class="form-control" rows="5" cols="49" id="role_purpose" name="role_purpose">{{ $data->ticket_jd_details->role_purpose }}</textarea>
			                    </div>
			                </div>
			            </div>

		                <!-- BATAS utk ke kanan -->
		                <div class="col-md-6">
		                	<div class="form-group">
			                    <label for="direct_sub" class="col-md-4 control-label">Direct Sub Ordinate</label>
			                    <div class="col-md-8">
			                        <input type="text" name="direct_sub" value="{{ $data->ticket_jd_details->direct_sub }}" class="form-control" id="direct_sub" placeholder="Input Direct Sub Ordinate">
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="indirect_sub" class="col-md-4 control-label">Indirect Sub Ordinate</label>
			                    <div class="col-md-8">
			                        <input type="text" name="indirect_sub" value="{{ $data->ticket_jd_details->indirect_sub }}" class="form-control" id="indirect_sub" placeholder="Input Indirect Sub Ordinate">
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="job_level" class="col-md-4 control-label">Job Level<span style="color: red;"> *</span></label>
			                    <div class="col-md-8">
			                        <select class="form-control" name="job_level" id="job_level" required>
			                        @if ( Auth::user()->grade == 7 )
			                        	<option value="" disabled selected>Select Level of Job</option>
			                        	@if ( $data->ticket_jd_details->job_level == 'Fresh Graduate' )
			                        		<option value="Fresh Graduate" selected>Fresh Graduate</option>
				                        	<option value="Mid-Senior Staff">Mid-Senior Staff</option>
				                        	<option value="Manager/Specialist">Manager/Specialist</option>
				                        	<option value="Division Head/Expert">Division Head/Expert</option>
			                        	@elseif ( $data->ticket_jd_details->job_level == 'Mid-Senior Staff' )
			                        		<option value="Fresh Graduate">Fresh Graduate</option>
				                        	<option value="Mid-Senior Staff" selected>Mid-Senior Staff</option>
				                        	<option value="Manager/Specialist">Manager/Specialist</option>
				                        	<option value="Division Head/Expert">Division Head/Expert</option>
			                        	@elseif ( $data->ticket_jd_details->job_level == 'Manager/Specialist' )
			                        		<option value="Fresh Graduate">Fresh Graduate</option>
				                        	<option value="Mid-Senior Staff">Mid-Senior Staff</option>
				                        	<option value="Manager/Specialist" selected>Manager/Specialist</option>
				                        	<option value="Division Head/Expert">Division Head/Expert</option>
			                        	@elseif ( $data->ticket_jd_details->job_level == 'Division Head/Expert' )
			                        		<option value="Fresh Graduate">Fresh Graduate</option>
				                        	<option value="Mid-Senior Staff">Mid-Senior Staff</option>
				                        	<option value="Manager/Specialist">Manager/Specialist</option>
				                        	<option value="Division Head/Expert" selected>Division Head/Expert</option>
			                        	@endif
			                        @elseif ( Auth::user()->grade == 8 )
			                        	@if ( $data->ticket_jd_details->job_level == 'Fresh Graduate' )
			                        		<option value="Fresh Graduate" selected>Fresh Graduate</option>
				                        	<option value="Mid-Senior Staff">Mid-Senior Staff</option>
				                        	<option value="Manager/Specialist">Manager/Specialist</option>
				                        	<option value="Division Head/Expert">Division Head/Expert</option>
				                        	<option value="Group Head">Group Head</option>
			                        	@elseif ( $data->ticket_jd_details->job_level == 'Mid-Senior Staff' )
			                        		<option value="Fresh Graduate">Fresh Graduate</option>
				                        	<option value="Mid-Senior Staff" selected>Mid-Senior Staff</option>
				                        	<option value="Manager/Specialist">Manager/Specialist</option>
				                        	<option value="Division Head/Expert">Division Head/Expert</option>
				                        	<option value="Group Head">Group Head</option>
			                        	@elseif ( $data->ticket_jd_details->job_level == 'Manager/Specialist' )
			                        		<option value="Fresh Graduate">Fresh Graduate</option>
				                        	<option value="Mid-Senior Staff">Mid-Senior Staff</option>
				                        	<option value="Manager/Specialist" selected>Manager/Specialist</option>
				                        	<option value="Division Head/Expert">Division Head/Expert</option>
				                        	<option value="Group Head">Group Head</option>
			                        	@elseif ( $data->ticket_jd_details->job_level == 'Division Head/Expert' )
			                        		<option value="Fresh Graduate">Fresh Graduate</option>
				                        	<option value="Mid-Senior Staff">Mid-Senior Staff</option>
				                        	<option value="Manager/Specialist">Manager/Specialist</option>
				                        	<option value="Division Head/Expert" selected>Division Head/Expert</option>
				                        	<option value="Group Head">Group Head</option>
				                        @elseif ( $data->ticket_jd_details->job_level == 'Group Head' )
			                        		<option value="Fresh Graduate">Fresh Graduate</option>
				                        	<option value="Mid-Senior Staff">Mid-Senior Staff</option>
				                        	<option value="Manager/Specialist">Manager/Specialist</option>
				                        	<option value="Division Head/Expert">Division Head/Expert</option>
				                        	<option value="Group Head" selected>Group Head</option>
			                        	@endif
			                        @endif
			                        </select>
			                    </div>
			                </div>

			                <div class="form-group">
			                    <label for="min_education" class="col-md-4 control-label">Minimum Education<span style="color: red;"> *</span></label>
			                    <div class="col-md-8">
			                        <select class="form-control" name="min_education" id="min_education" required>
			                        	<option value="" disabled selected>Select Education</option>
			                        	@if ( $data->ticket_jd_details->min_education == 'd3' )
			                        		<option value="d3" selected>Diploma's degree graduate</option>
			                        		<option value="s1">Bachelor's degree graduate</option>
			                        	@elseif ( $data->ticket_jd_details->min_education == 's1' )
			                        		<option value="d3">Diploma's degree graduate</option>
			                        		<option value="s1" selected>Bachelor's degree graduate</option>
			                        	@endif
			                        </select>
			                    </div>
			                </div>
		                </div>
		                <!-- penutup batas kanan -->
		            </div>


	                    <div class="form-group">
		                	<div class="col-md-12">

	                        	<div class="row" style="padding-bottom: 10px;">
	                        		<div class="col-md-8">
	                        			<label class="col-sm-6">Minimum Requirements<span style="color: red;"> *</span></label>
					                    <div class="col-md-12" >
					                         <textarea class="form-control" id="editor_exp" name="qualification">
					                         	{{ $data->ticket_jd_details->qualification }}
					                         </textarea>
					                    </div>
	                        		</div>

	                        		<div class="col-md-4">
					                    <div class="col-md-12" style="padding-top: 30px">
					                    	<label><span class="glyph-icon icon-exclamation-circle"></span> Minimum Requirements</label>
					                    	<p>Place minimum qualifications, experience and skill requirements in this section. Anything that discusses the responsibilities of the position should be placed in the <b>Responsibility</b> section.
					                    </div>
	                        		</div>
	                        	</div> 

		                	</div>
		                </div>

		                <div class="form-group">
		                	<div class="col-md-12">

		                        	<div class="row" style="padding-bottom: 10px;">
		                        		<div class="col-md-8">
		                        			<label class="col-sm-6">Responsibility<span style="color: red;"> *</span></label>
						                    <div class="col-md-12" >
						                        <textarea class="form-control" id="responsibility" name="responsibility">
						                        	{{ $data->ticket_jd_details->responsibility }}
						                        </textarea>
						                    </div>
		                        		</div>

		                        		<div class="col-md-4">
						                    <div class="col-md-12" style="padding-top: 30px">
						                    	<label><span class="glyph-icon icon-exclamation-circle"></span> Responsibility</label>
						                    	<p>The most important section of the job post. Writing a concise description will tell a candidate what to expect on a daily basis. Start each bullet point with an word action, and write the sentences in present tense.</p>

												<p style="padding-top: 20px">Don't put required or minimum qualifications here.</p>
												<p style="padding-top: 15px">Don't put company details here.</p>
						                    </div>
		                        		</div>
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
				                                    <th class="col-sm-8 text-center">Soft Competencies</th>
				                                    <th class="col-sm-3 text-center">(1-5) <span style="color: red;">*</span></th>
				                                </tr>
				                            </thead>
				                            <tbody>
				                                <tr>
				                                    <td>Learning Agility</td>
				                                    <td><input class="form-control" type="number" name="soft[0]" min="1" max="5" required value="{{ $soft[0] }}"></td>
				                                </tr>
				                                <tr>
				                                    <td>Making Difference</td>
				                                    <td><input class="form-control" type="number" name="soft[1]" min="1" max="5" required value="{{ $soft[1] }}"></td>
				                                </tr>
				                                <tr>
				                                    <td>People Management</td>
				                                    <td><input class="form-control" type="number" name="soft[2]" min="1" max="5" required value="{{ $soft[2] }}"></td>
				                                </tr>
				                                <tr>
				                                    <td>Accelerate Business And Customer</td>
				                                    <td><input class="form-control" type="number" name="soft[3]" min="1" max="5" required value="{{ $soft[3] }}"></td>
				                                </tr>
				                                <tr>
				                                    <td>Translating Strategy into Action</td>
				                                    <td><input class="form-control" type="number" name="soft[4]" min="1" max="5" required value="{{ $soft[4] }}"></td>
				                                </tr>
				                                <tr>
				                                    <td>Decisiveness</td>
				                                    <td><input class="form-control" type="number" name="soft[5]" min="1" max="5" required value="{{ $soft[5] }}"></td>
				                                </tr>
				                                <tr>
				                                    <td>Cultivate  Networks & Partnerships</td>
				                                    <td><input class="form-control" type="number" name="soft[6]" min="1" max="5" required value="{{ $soft[6] }}"></td>
				                                </tr>
				                            </tbody>
				                        </table>
				                        <span><i style="color: #7C7C7C;">*Proficiency Level: <br>1. Significant Development Needed; <br>2. Development Needed; <br>3. Partially Meet Expectation; <br>4. Meet Expectation; <br>5. Exceed Expectation</i></span>
				                    </div>
				                </div>	
	                    	</div>

	                    	<div class="col-md-6">
	                    		<div class="form-group">
				                    <div class="col-md-12">
				                        <table class="table table-striped table-bordered" id="table_hard_competencies">
				                            <thead>
				                                <tr>
				                                    <th class="col-sm-8 text-center">Hard Competencies</th>
				                                    <th class="col-sm-3 text-center">(1-5) <span style="color: red;">*</span></th>
				                                    <th class="col-sm-1 text-center">Action</th>
				                                </tr>
				                            </thead>
				                            <tbody>
				                            	@foreach($hard as $array => $value)
					                				<tr class="row{{ $array }}" id="{{ $array }}">
				                						<td>
				                							<input class="form-control" type="text" name="hard[]" required value="{{ ucwords($value) }}">
					                					</td>
					                					<td>
					                						<input class="form-control" type="number" name="value[]" min="1" max="5" required value="{{ $hard_value[$array] }}">
					                					</td>
					                					<td>
					                						
					                						@if ($loop->first)
					                							<button type="button" id="edit_hard_competencies" class="btn btn-primary">+</button>
					                						@else
					                							<button type="button" id={{ $array }} class="btn btn-danger edit_remove">X</button>
					                						@endif
					                					</td>		
					                				</tr>
					                			@endforeach
				                            </tbody>
				                        </table>
				                        <span><i style="color: #7C7C7C;">*Proficiency Level: <br>1. Introductory; <br>2. Basic; <br>3. Intermediate; <br>4. Advanced; <br>5. Expert</i></span>
				                    </div>
				                </div>
	                    	</div>
	                    </div>