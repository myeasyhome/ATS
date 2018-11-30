<?php $__env->startSection('js'); ?>
<script type="text/javascript">
	$(function () {
		$("#contract_form").hide();
	 	$("#employee_status").change(function() {
			var val = $(this).val();
			if(val != "Contract") {
	        	$("#contract_form").hide();
	    	} else {
		        $("#contract_form").show();
	    	}
	  	});
	});	
	
</script>

<!-- JQuery datepicker -->
<script type="text/javascript" src="<?php echo e(asset('assets/widgets/datepicker-ui/datepicker.js')); ?>"></script>
<script type="text/javascript">
	$(function() {
	    $("#fromDate").datepicker({
	        defaultDate: "+1w",
	        changeMonth: true,
	        numberOfMonths: 3,
	        onClose: function(selectedDate) {
	            $("#toDate").datepicker("option", "minDate", selectedDate);
	        }
	    });
	    $("#toDate").datepicker({
	        defaultDate: "+1w",
	        changeMonth: true,
	        numberOfMonths: 3,
	        onClose: function(selectedDate) {
	            $("#fromDate").datepicker("option", "maxDate", selectedDate);
	        }
	    });
	});
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<ol class="breadcrumb bc-3" >
    <li>
        <a href="<?php echo e(route('ticket')); ?>"><i class="fa-home"></i>Ticket List</a>
    </li>
    <li class="active">
        <a href="<?php echo e(route('create.ticket')); ?>">New Ticket</a>
    </li>
</ol>
	<h2>Create New Ticket</h2>
	<br />
<div style="color: tomato;">
<p></p>
</div>

<div class="row">
    <div class="col-md-12">
	    <div class="panel panel-default">
	        <div class="panel panel-default">
	            <div class="panel-heading">

	            <div class="panel">
		            <div class="panel-body">
		                <h3 class="title-hero">
		                    Basic
		                </h3>
		                <div class="example-box-wrapper">
		                    <ul id="myTab" class="nav clearfix nav-tabs">
		                        <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
		                        <li class=""><a href="#profile" data-toggle="tab">Profile</a></li>
		                        <li class="dropdown">
		                            <a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
		                            <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
		                                <li><a href="#dropdown1" tabindex="-1" data-toggle="tab">Submenu link 1</a></li>
		                                <li class=""><a href="#dropdown2" tabindex="-1" data-toggle="tab">Submenu link 2</a></li>
		                            </ul>
		                        </li>
		                    </ul>
		                    <div id="myTabContent" class="tab-content">
		                        <div class="tab-pane fade active in" id="home">
		                            <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
		                        </div>
		                        <div class="tab-pane fade" id="profile">
		                            <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
		                        </div>
		                        <div class="tab-pane fade" id="dropdown1">
		                            <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
		                        </div>
		                        <div class="tab-pane fade" id="dropdown2">
		                            <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.</p>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>



	            	<!-- table header -->
		            <ul id="myTab" class="nav clearfix nav-tabs">
	                    <li class="active"><a href="#" data-toggle="tab">Form ERF</a></li>
	                    <li class=""><a href="#" data-toggle="tab">Form JD</a></li>
	                    <li class=""><a href="#" data-toggle="tab">Soft Competencies</a></li>
	                    <li class=""><a href="#" data-toggle="tab">Hard Competencies</a></li>
	                </ul>
	            </div>
	        </div>

	        <div class="panel-body">
	        	
	        	<form role="form" action="" method="post" enctype="multipart/form-data" class="form-horizontal form-groups-bordered">
	        	<?php echo csrf_field(); ?>
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
                        <label for="" class="col-sm-3 control-label">Contract Period</label>
                        <div class="col-sm-5">
                            <div class="clearfix row">
                                <div class="col-sm-5">
                                    <input type="text" name="" id="fromDate" placeholder="From date..." class="float-left mrg10R form-control">
                                </div>
                                <div class="col-sm-1 control-label">
									<br>
								</div>
                                <div class="col-sm-5">
                                    <input type="text" name="" id="toDate" placeholder="To date..." class="float-left form-control">
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
	                    <label for="jdfile" class="col-sm-3 control-label">JD File</label>
	                    <div class="col-sm-5">
	                        <input type="file" name="jdfile" class="form-control" id="jdfile" placeholder="JD File">
	                    </div>
	                </div>

	                <div class="form-group">
	                    <div class="col-sm-offset-5 col-sm-5">
	                        <button type="button" class="btn btn-warning">Cancel</button>
	                        <button type="submit" class="btn btn-blue-alt">Save</button>
	                    </div>	
	                </div>
		     
		        </form>

	        </div>
	    </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>