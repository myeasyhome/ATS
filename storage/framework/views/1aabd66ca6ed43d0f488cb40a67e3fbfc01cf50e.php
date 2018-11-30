				
		        
					<div class="form-group">
                		<label for="position_name" class="col-sm-3 control-label">Position Name</label>
	                    <div class="col-sm-5">
	                            <input type="text" name="position_name" value="" class="form-control" id="position_name" placeholder="Position Name">
	                    </div>
	                </div>

	                <div class="form-group">
                		<label for="grade" class="col-sm-3 control-label">Grade</label>
	                    <div class="col-sm-5">
	                            <input type="text" name="grade" value="" class="form-control" id="grade" placeholder="Grade">
	                    </div>
	                </div>

	                <div class="form-group">
	                    <label for="location" class="col-sm-3 control-label">Location</label>
	                    <div class="col-sm-5">
	                            <input type="text" name="location" value="" class="form-control" id="location" placeholder="Location">
	                    </div>
	                </div>

	                <div class="form-group">
	                    <label for="direct" class="col-sm-3 control-label">Direct Reporting</label>
	                    <div class="col-sm-5">
	                            <input type="text" name="direct" value="" class="form-control" id="direct" placeholder="Direct Reporting">
	                    </div>
	                </div>

	                <div class="form-group">
	                    <label for="department" class="col-sm-3 control-label">Department</label>
	                    <div class="col-sm-5">
	                            <input type="text" name="department" value="" class="form-control" id="department" placeholder="Department">
	                    </div>
	                </div>

	                <div class="form-group">
	                    <label for="directorate" class="col-sm-3 control-label">Directorate</label>
	                    <div class="col-sm-5">
	                            <input type="text" name="directorate" value="" class="form-control" id="directorate" placeholder="Directorate">
	                    </div>
	                </div>

	                <div class="form-group">
	                    <label for="qty" class="col-sm-3 control-label">Quantity</label>
	                    <div class="col-sm-5">
	                            <input type="number" name="qty" value="" class="form-control" id="qty" placeholder="Quantity">
	                    </div>
	                </div>

	                <div class="form-group">
	                    <label for="nature_request" class="col-sm-3 control-label">Nature Of Request</label>
	                    <div class="col-sm-5">
	                    	<select class="form-control" id="nature_request">
	                    		<option value="">--- Choose Nature Of Request ---</option>
							    <option value="Budgeted">Budgeted</option>
							    <option value="Budgeted">Unbudgeted</option>
						    </select>
	                    </div>
	                </div>
	                
	                <div class="form-group">
	                	<div class="row">
	                		<div class="col-md-8 pull-right">
		                		<label for="employee_status"><u>Status Of Employment</u></label>
		                	</div>
	                	</div>

                		<label for="employee_status" class="col-sm-3 control-label">Employee Status</label>
	                    <div class="col-sm-5">
	                    	<select class="form-control" id="employee_status" name="employee_status">
	                    		<option value="">--- Choose Employee Status ---</option>
							    <option value="Permanent" id="Permanent">Permanent</option>
							    <option value="Contract" id="Contract">Contract</option>
						    </select>
	                    </div>
	                </div>

	                <div class="form-group" id="contract_form">
                        <label class="col-sm-3 control-label">Contract Period</label>
                        <div class="col-sm-5">
                            <div class="clearfix row">
                                <div class="col-sm-5">
                                    <input type="text" name="from" id="fromDate" placeholder="From date..." class="float-left mrg10R form-control">
                                </div>
                                <div class="col-sm-1 control-label">
									<br>
								</div>
                                <div class="col-sm-5">
                                    <input type="text" name="to" id="toDate" placeholder="To date..." class="float-left form-control">
                                </div>
                            </div>
                        </div>
                    </div>

	                <div class="form-group">
	                	<div class="row">
	                		<div class="col-md-8 pull-right">
		                		<label for="sources"><u>Sources</u></label>
		                	</div>
	                	</div>

                		<label for="sources" class="col-sm-3 control-label">Source Of Candidate</label>
	                    <div class="col-sm-5">
	                        <select class="form-control" id="sources">
	                    		<option value="">--- Choose Source Of Candidate ---</option>
							    <option value="Internal">Internal</option>
							    <option value="External">External</option>
						    </select>
	                    </div>
	                </div>

	                <div class="form-group">
	                	<div class="row">
	                		<div class="col-md-8 pull-right">
		                		<label for="special_treatment"><u>Nature Of Hiring</u></label>
		                	</div>
	                	</div>
                	
                		<label for="special_treatment" class="col-sm-3 control-label">Special Treatment</label>
	                    <div class="col-sm-5">
	                        <select class="form-control" id="special_treatment" name="special_treatment">
	                    		<option value="">--- Choose Special Treatment ---</option>
							    <option value="With">With Advertisement</option>
							    <option value="Without">Without Advertisement</option>
						    </select>
	                    </div>
	                </div>

	                <div class="form-group">
                		<label for="bussiness_impact" class="col-sm-3 control-label">Bussiness Impact</label>
	                    <div class="col-sm-5">
	                        <select class="form-control" id="bussiness_impact" name="bussiness_impact">
	                    		<option value="">--- Choose Bussiness Impact ---</option>
							    <option value="Direct">Direct To Revenue</option>
							    <option value="Indirect">Indirect To Revenue</option>
						    </select>
	                    </div>
	                </div>

	                <div class="form-group">
	                	<div class="row">
	                		<div class="col-md-8 pull-right">
		                		<label for="request_background"><u>Reason For Hiring</u></label>
		                	</div>
	                	</div>
	                	
                		<label for="request_background" class="col-sm-3 control-label">Request Background</label>
	                    <div class="col-sm-5">
	                            <input type="text" name="request_background" value="" class="form-control" id="request_background" placeholder="Request Background">
	                    </div>
	                </div>

	                <div class="form-group">
                		<label for="remarks" class="col-sm-3 control-label">Remarks</label>
	                    <div class="col-sm-5">
	                        <textarea class="form-control" id="remarks" rows="3" name="remarks"></textarea>
	                    </div>
	                </div>
	                <div class="form-group">
	                    <div class="col-sm-offset-5 col-sm-5">
	                        <button type="submit" class="btn btn-blue-alt">Save</button>
	                    </div>	
	                </div>
	            </form>