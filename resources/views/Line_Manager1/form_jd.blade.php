				<div class="row" style="padding-bottom: 20px;">
	            	<div class="col-md-6">
	            		<div class="form-group">
	                		<label for="supervisor_title" class="col-md-4 control-label">Supervisor Title</label>
		                    <div class="col-md-8">
		                            <input type="text" name="supervisor_title" value="" class="form-control" id="supervisor_title" placeholder="Input Supervisor Title">
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="incumbent" class="col-md-4 control-label">Incumbent Name</label>
		                    <div class="col-md-8">
		                            <input type="text" name="incumbent" value="" class="form-control" id="incumbent" placeholder="Input Incumbent Name">
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="supervisor_name" class="col-md-4 control-label">Supervisor Name</label>
		                    <div class="col-md-8">
		                            <input type="text" name="supervisor_name" value="" class="form-control" id="supervisor_name" placeholder="Input Supervisor Name">
		                    </div>
		                </div>

						<div class="form-group">
		                    <label for="role_purpose" class="col-md-4 control-label">Role Purpose<span style="color: red;"> *</span></label>
		                    <div class="col-md-8">
		                        <textarea class="form-control" rows="5" cols="49" id="role_purpose" name="role_purpose" required></textarea>
		                    </div>
		                </div>
		            </div>

	                <!-- BATAS utk ke kanan -->
	                <div class="col-md-6">
	                	<div class="form-group">
		                    <label for="direct_sub" class="col-md-4 control-label">Direct Sub Ordinate</label>
		                    <div class="col-md-8">
		                        <input type="text" name="direct_sub" value="" class="form-control" id="direct_sub" placeholder="Direct Sub Ordinate">
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="indirect_sub" class="col-md-4 control-label">Indirect Sub Ordinate</label>
		                    <div class="col-md-8">
		                        <input type="text" name="indirect_sub" value="" class="form-control" id="indirect_sub" placeholder="Indirect Sub Ordinate">
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="job_level" class="col-md-4 control-label">Job Level<span style="color: red;"> *</span></label>
		                    <div class="col-md-8">
		                        <select class="form-control" name="job_level" id="job_level" required title="Select Job Title">
		                        @if ( Auth::user()->grade == 7 )
		                        	<option value="" disabled selected>Select Level of Job</option>
		                        	<option value="Fresh Graduate">Fresh Graduate</option>
		                        	<option value="Mid-Senior Staff">Mid-Senior Staff</option>
		                        	<option value="Manager/Specialist">Manager/Specialist</option>
		                        	<option value="Division Head/Expert">Division Head/Expert</option>
		                        @elseif ( Auth::user()->grade == 8 )
		                        	<option value="" disabled selected>Select Level of Job</option>
		                        	<option value="Fresh Graduate">Fresh Graduate</option>
		                        	<option value="Mid-Senior Staff">Mid-Senior Staff</option>
		                        	<option value="Manager/Specialist">Manager/Specialist</option>
		                        	<option value="Division Head/Expert">Division Head/Expert</option>
		                        	<option value="Group Head">Group Head</option>
		                        @endif
		                        </select>
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="min_education" class="col-md-4 control-label">Minimum Education<span style="color: red;"> *</span></label>
		                    <div class="col-md-8">
		                        <select class="form-control" name="min_education" id="min_education" required title="Select Education">
		                        	<option value="" disabled selected>Select Education</option>
		                        	<option value="d3">Diploma's degree graduate</option>
		                        	<option value="s1">Bachelor's degree graduate</option>
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
			                         <textarea class="form-control" id="editor_exp" name="qualification" required>
			                         	<p><strong>Qualification</strong></p>
			                         	<ul>
			                         		<li>Minimum Bachelor Degree in Psychology or Management field</li>
			                         		<li><em><span style="color: red">Minimum 3 years experience on organization analysis in Telecom sector</span></em></li>
			                         		<li><em><span style="color: red">Possess an understanding of general HR, functional organization and business process</span></em></li>
			                         	</ul>
			                         </textarea>
			                    </div>
                    		</div>

                    		<div class="col-md-4">
			                    <div class="col-md-12" style="padding-top: 30px">
			                    	<label><span class="glyph-icon icon-exclamation-circle"></span> Minimum Requirements</label>
			                    	<p>Place minimum qualifications, experience and skill requirements in this section. Anything that discusses the responsibilities of the position should be placed in the <b>Responsibility</b> section.
			                    	<p style="padding-top: 30px"><em><span style="color: red">The red text is just a template, you can delete and change it !</span></em></p>
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
					                         <textarea class="form-control" id="responsibility" name="responsibility" required>
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

	                {{-- <div class="form-group" style="padding-top: 30px">
	                	<div class="col-md-12">
                        	<table class="table table-striped table-bordered responsive" id="table_custom">
	                			<thead>
	                				<tr>
	                					<th class="col-sm-3 text-center">ini diganti kaya minimum</th>
	                					<th class="text-center">Key Activities</th>
	                					<th class="col-sm-1 text-center">Action</th>
	                				</tr>
	                			</thead>
	                			<tbody>
	                				<tr>
                						<td>
                							<textarea class="form-control" rows="2" name="scope_area[]"></textarea>
	                					</td>
	                					<td>
	                						<textarea class="form-control" id="addLine" cols="77" rows="4" name="scope_activities[]"></textarea>
	                					</td>
	                					<td>
	                						<button type="button" id="add_field" class="btn btn-primary">+</button>
	                					</td>
	                				</tr>
	                			</tbody>
	                		</table>
	                	</div>
                    </div> --}}

                    <div class="row">
                    	<div class="col-md-6" style="padding-right:30px">
                    		<div class="form-group" style="padding-bottom: 20px;">
			                    <div class="col-md-12">
			                        <table class="table table-striped table-bordered">
			                            <thead>
			                                <tr>
			                                    {{-- <th class="col-sm-1 text-center">No</th> --}}
			                                    <th class="col-sm-8 text-center">Soft Competencies</th>
			                                    <th class="col-sm-3 text-center">(1-5) <span style="color: red;">*</span></th>
			                                </tr>
			                            </thead>
			                            <tbody>
			                                <tr>
			                                    {{-- <td class="text-center">1</td> --}}
			                                    <td>Learning Agility</td>
			                                    <td><input class="form-control" type="number" name="soft[0]" min="1" max="5" required></td>
			                                </tr>
			                                <tr>
			                                    {{-- <td class="text-center">2</td> --}}
			                                    <td>Making Difference</td>
			                                    <td><input class="form-control" type="number" name="soft[1]" min="1" max="5" required></td>
			                                </tr>
			                                <tr>
			                                    {{-- <td class="text-center">3</td> --}}
			                                    <td>People Management</td>
			                                    <td><input class="form-control" type="number" name="soft[2]" min="1" max="5" required></td>
			                                </tr>
			                                <tr>
			                                    {{-- <td class="text-center">4</td> --}}
			                                    <td>Accelerate Business And Customer</td>
			                                    <td><input class="form-control" type="number" name="soft[3]" min="1" max="5" required></td>
			                                </tr>
			                                <tr>
			                                    {{-- <td class="text-center">5</td> --}}
			                                    <td>Translating Strategy into Action</td>
			                                    <td><input class="form-control" type="number" name="soft[4]" min="1" max="5" required></td>
			                                </tr>
			                                <tr>
			                                    {{-- <td class="text-center">6</td> --}}
			                                    <td>Decisiveness</td>
			                                    <td><input class="form-control" type="number" name="soft[5]" min="1" max="5" required></td>
			                                </tr>
			                                <tr>
			                                    {{-- <td class="text-center">7</td> --}}
			                                    <td>Cultivate  Networks & Partnerships</td>
			                                    <td><input class="form-control" type="number" name="soft[6]" min="1" max="5" required></td>
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
			                                    {{-- <th class="col-sm-1 text-center">No</th> --}}
			                                    <th class="col-sm-8 text-center">Hard Competencies</th>
			                                    <th class="col-sm-3 text-center">(1-5) <span style="color: red;">*</span></th>
			                                    <th class="col-sm-1 text-center">Action</th>
			                                </tr>
			                            </thead>
			                            <tbody id="data_content">
			                                <tr>
			                                    {{-- <td class="text-center">1</td> --}}
			                                    <td><input class="form-control" type="text" name="hard[]" required></td>
			                                    <td><input class="form-control" type="number" name="value[]" min="1" max="5" required></td>
			                                    <td><button type="button" id="add_hard_competencies" class="btn btn-primary">+</button></td>
			                                </tr>
			                            </tbody>
			                        </table>
			                        <span><i style="color: #7C7C7C;">*Proficiency Level: <br>1. Introductory; <br>2. Basic; <br>3. Intermediate; <br>4. Advanced; <br>5. Expert</i></span>
			                    </div>
			                </div>
                    	</div>
                    </div>
	            
	            