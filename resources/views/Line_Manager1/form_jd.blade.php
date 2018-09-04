				<div class="row" style="padding-bottom: 20px;">
	            	<div class="col-md-6">
	            		<div class="form-group">
	                		<label for="supervisor_title" class="col-md-4 control-label">Supervisor Title</label>
		                    <div class="col-md-8">
		                            <input type="text" name="supervisor_title" value="" class="form-control" id="supervisor_title" placeholder="Supervisor Title">
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="incumbent" class="col-md-4 control-label">Incumbent Name</label>
		                    <div class="col-md-8">
		                            <input type="text" name="incumbent" value="" class="form-control" id="incumbent" placeholder="Incumbent Name">
		                    </div>
		                </div>

		                <div class="form-group">
		                    <label for="supervisor_name" class="col-md-4 control-label">Supervisor Name</label>
		                    <div class="col-md-8">
		                            <input type="text" name="supervisor_name" value="" class="form-control" id="supervisor_name" placeholder="Supervisor Name">
		                    </div>
		                </div>

						<div class="form-group">
		                    <label for="role_purpose" class="col-md-4 control-label">Role Purpose</label>
		                    <div class="col-md-8">
		                        <textarea class="form-control" rows="5" cols="49" id="role_purpose" name="role_purpose"></textarea>
		                    </div>
		                </div>
		                
	                	{{-- <div class="form-group">
		                	<div class="col-md-11">
		                		<fieldset class="the-fieldset">
	                            	<legend class="the-legend">
	                            		<label class="control-label">Operating Network</label>
	                            	</legend>

	                            	<label for="within" class="col-md-6">Internal (Within Function)</label>
				                    <div class="col-md-12" style="padding-bottom: 20px;">
				                         <textarea class="form-control" rows="5" cols="49" id="within" name="within"></textarea>
				                    </div>

			                    	<label for="outside" class="col-md-6">Internal (Outside of Function)</label>
				                    <div class="col-md-12" style="padding-bottom: 20px;">
				                         <textarea class="form-control" rows="5" cols="49" id="outside" name="outside"></textarea>
				                    </div>

				                    <label for="external" class="col-md-6">External</label>
				                    <div class="col-md-12" style="padding-bottom: 10px;">
				                         <textarea class="form-control" rows="5" cols="49" id="external" name="external"></textarea>
				                    </div>
				                    
	                        	</fieldset>	
		                	</div>
	                    </div> --}}

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

	            {{-- <div class="row"> --}}
	            	
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
		                				<tr>
	                						<td>
	                							<textarea class="form-control" cols="27" rows="3" name="scope_area[]"></textarea>
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

                        	{{-- </fieldset>	 --}}
	                	</div>
                    </div>

	            {{-- </div> --}}

		                {{-- <div class="form-group">
	                		<div class="col-sm-12">
	                			<table class="table table-striped table-bordered">
		                			<thead>
		                				<tr>
		                					<th class="col-sm-1 text-center">No</th>
		                					<th class="col-sm-9 text-center">Soft Competencies</th>
		                					<th class="col-sm-2 text-center">Required (1-5)<span style="color: red;">*</span></th>
		                				</tr>
		                			</thead>
		                			<tbody>
		                				<tr>
		                					<td class="text-center">1</td>
	                						<td>Learning Agility</td>
	                						<td><input class="form-control" type="number" name="soft[0]" max="5" required></td>
		                				</tr>
		                				<tr>
		                					<td class="text-center">2</td>
	                						<td>Making Difference</td>
		                					<td><input class="form-control" type="number" name="soft[1]" min="1" max="5" required></td>
		                				</tr>
		                				<tr>
		                					<td class="text-center">3</td>
		                					<td>People Management</td>
		                					<td><input class="form-control" type="number" name="soft[2]" min="1" max="5" required></td>
		                				</tr>
		                				<tr>
		                					<td class="text-center">4</td>
		                					<td>Accelerate Business And Customer</td>
		                					<td><input class="form-control" type="number" name="soft[3]" min="1" max="5" required></td>
		                				</tr>
		                				<tr>
		                					<td class="text-center">5</td>
		                					<td>Translating Strategy into Action</td>
		                					<td><input class="form-control" type="number" name="soft[4]" min="1" max="5" required></td>
		                				</tr>
		                				<tr>
		                					<td class="text-center">6</td>
		                					<td>Decisiveness</td>
		                					<td><input class="form-control" type="number" name="soft[5]" min="1" max="5" required></td>
		                				</tr>
		                				<tr>
		                					<td class="text-center">7</td>
		                					<td>Cultivate  Networks & Partnerships</td>
		                					<td><input class="form-control" type="number" name="soft[6]" min="1" max="5" required></td>
		                				</tr>
		                			</tbody>
		                		</table>
		                		<span><i style="color: red;">Proficiency Level: 1. Significant Development Needed; 2. Development Needed; 3. Partially Meet Expectation; 4. Meet Expectation; 5. Exceed Expectation</i></span>
	                		</div>
		                </div>
		                <br><br>

		                <div class="form-group">
	                		<div class="col-sm-12">
	                			<table class="table table-striped table-bordered">
		                			<thead>
		                				<tr>
		                					<th class="col-sm-1 text-center">No</th>
		                					<th class="col-sm-9 text-center">Hard Competencies</th>
		                					<th class="col-sm-2 text-center">Required (1-5)<span style="color: red;">*</span></th>
		                				</tr>
		                			</thead>
		                			<tbody>
		                				<tr>
		                					<td class="text-center">1</td>
	                						<td>Career & Talent Management</td>
	                						<td><input class="form-control" type="number" name="hard[0]" min="1" max="5" required></td>
		                				</tr>
		                				<tr>
		                					<td class="text-center">2</td>
	                						<td>Competency Development & Assessment</td>
		                					<td><input class="form-control" type="number" name="hard[1]" min="1" max="5" required></td>
		                				</tr>
		                				<tr>
		                					<td class="text-center">3</td>
		                					<td>Compensation & Benefit Management</td>
		                					<td><input class="form-control" type="number" name="hard[2]" min="1" max="5" required></td>
		                				</tr>
		                				<tr>
		                					<td class="text-center">4</td>
		                					<td>Organization Design</td>
		                					<td><input class="form-control" type="number" name="hard[3]" min="1" max="5" required></td>
		                				</tr>
		                				<tr>
		                					<td class="text-center">5</td>
		                					<td>Performance Management</td>
		                					<td><input class="form-control" type="number" name="hard[4]" min="1" max="5" required></td>
		                				</tr>
		                				<tr>
		                					<td class="text-center">6</td>
		                					<td>Project Management</td>
		                					<td><input class="form-control" type="number" name="hard[5]" min="1" max="5" required></td>
		                				</tr>
		                				<tr>
		                					<td class="text-center">7</td>
		                					<td>Business Process Design & Improvement</td>
		                					<td><input class="form-control" type="number" name="hard[6]" min="1" max="5" required></td>
		                				</tr>
		                				<tr>
		                					<td class="text-center">8</td>
		                					<td>Telco & Digital Business</td>
		                					<td><input class="form-control" type="number" name="hard[7]" min="1" max="5" required></td>
		                				</tr>
		                			</tbody>
		                		</table>
		                		<span><i style="color: red;">*Proficiency Level: 1. Introductory; 2. Basic; 3. Intermediate; 4. Advanced; 5. Expert</i></span>
	                		</div>
		                </div>
		                <br> --}}
	            
	            
	            