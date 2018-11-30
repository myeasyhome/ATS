<?php $__env->startSection('title','Upload CV Candidate'); ?>

<?php $__env->startSection('js'); ?>
<script type="text/javascript" src="<?php echo e(asset('assets/widgets/datatable/datatable.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/widgets/datatable/datatable-bootstrap.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/widgets/datatable/datatable-responsive.js')); ?>"></script>

<script type="text/javascript">
    /* Datatables responsive */
    $(function() {
        $('#datatable-responsive').DataTable( {
            "responsive": true
        } );
    } );

    $(function() {
        $('.dataTables_filter input').attr("placeholder", "Search...");
    });
</script>

<!-- Datepicker bootstrap -->
<script>
    $(function() { 
        $('.date').datepicker({
            format: 'dd-mm-yyyy',
            autoclose : true,
            todayHighlight : true,
        });
    });
</script>

<!-- untuk cek extension file upload -->
<script>
$("#format").hide();
$("#size").hide();
var fileExtensions = [".doc", ".pdf", ".docx"];
function validateExtension(input) {
    if (input.type == "file") {
        var fileName = input.value;
         if (fileName.length > 0) {
            var validExtension = false;
            for (var i = 0; i < fileExtensions.length; i++) {
                var sCurExtension = fileExtensions[i];
                if (fileName.substr(fileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    validExtension = true;
                    $('#cv').removeClass('parsley-error');
                    $("#format").hide();
                    $("#size").hide();
                    break;
                }
            }
             
            if (!validExtension) {
                $('#cv').addClass('parsley-error');
                $("#format").show();
                input.value = "";
                return false;
            } else if ( input.files[0].size > 2480000 ) {
            	$('#cv').addClass('parsley-error');
                $("#size").show();
                input.value = "";
                return false;
            }
        }
    }
    return true;
}
</script>

<script type="text/javascript">
/* change source */
$('#other').hide();
function change_source() {
	if ( $('#source').val() == 'Other' ) {
		$('#other').show();
		$('#other').attr('placeholder', 'Input Other...');
	} else {
		$('#other').hide();
	}
}
</script>

<script>
    /* keterangan popover label di option */
    $('body').popover({
        placement:'left',
        html : true,
        delay: {show: 50, hide: 400},
        selector: '[data-popover]',
        trigger: 'hover',
        content: function(ele) {
            return $(this).next("#opt_CVcandidate").html();
        }
    });
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<ol class="breadcrumb">
    <li>
        <a href="<?php echo e(route('sourcing')); ?>">CV & Sourcing</a>
    </li>
    <li>
    	<span><em>Upload CV Candidate</em></span>
    </li>
</ol>
<?php
	/*ticket id di hiring brief table*/
	$ticket_id = \App\Models\Hiring_brief::findOrFail($id)->ticket_id;
?>
<h2>Upload CV <code><em><?php echo e(\App\Models\Ticket::findOrFail($ticket_id)->position_name); ?></em></code> Candidate</h2>
<br>
<div style="color: tomato;">
	<p></p>
</div>

<div class="row">

	<!-- panel box 1 -->
    <div class="col-md-12">
	    <div class="panel panel-default">

	        <div class="panel-body">
	        <?php if(session('error')): ?>
        		<div class="alert alert-danger" role="alert">
        			<button type="button" class="close" data-dismiss="alert">×</button>
                    <strong><?php echo e(session('error')); ?></strong>
                </div>
            <?php elseif(session('success')): ?>
        		<div class="alert alert-success" role="alert">
        			<button type="button" class="close" data-dismiss="alert">×</button>
                    <strong><?php echo e(session('success')); ?></strong>
                </div>
        	<?php endif; ?>

	        	<form class="form-horizontal" action="<?php echo e(route('doUpload')); ?>" enctype="multipart/form-data" method="POST" data-parsley-validate="">
	        	<?php echo csrf_field(); ?>
	        	<!-- hiring id -->
	        	<input type="hidden" name="hiring_brief_id" value="<?php echo e($id); ?>">

	        		<div class="form-group">
	        			<label class="col-md-3 control-label">Name Candidate</label>
	                    <div class="col-md-6">
	                        <input type="text" class="form-control" id="name_candidate" name="name_candidate" placeholder="Input Name Candidate" title="Input Name Candidate" required>
	                    </div>
	        		</div>
	        		<div class="form-group">
	        			<label class="col-md-3 control-label">Education Background</label>
	                    <div class="col-md-6">
	                        <select class="form-control" name="education" id="education" required title="Select Education">
	                        	<option value="" disabled selected>Select Education</option>
	                        	<option value="D3">Diploma's degree graduate</option>
	                        	<option value="S1">Bachelor's degree graduate</option>
	                        	<option value="S2">Master's degree graduate</option>
	                        	<option value="S3">Doctoral degree graduate</option>
	                        </select>
	                    </div>
	        		</div>
	        		<div class="form-group">
	        			<label class="col-md-3 control-label">Gender</label>
	                    <div class="col-md-2">
	                        <select class="form-control" id="gender" name="gender" required>
	                        	<option value="M">Male</option>
	                        	<option value="F">Female</option>
	                        </select>
	                    </div>
	        		</div>
	        		<div class="row">
	        			<div class="col-md-6">
	        				<div class="form-group">
			        			<label class="col-md-6 control-label">Birth Place</label>
			                    <div class="col-md-5">
			                        <input type="text" class="form-control" id="place" name="place" placeholder="Input Place Birth" title="Input Place Birth" required>
			                    </div>
			        		</div>	
	        			</div>
	        			<div class="col-md-5">
	        				<div class="form-group">
			        			<label class="col-md-3 control-label">Birth Date</label>
			                    <div class="col-md-6">
			                    	<div class="input-group date">
		                            	<span class="add-on input-group-addon" id="birth_date">
	                                        <i class="glyph-icon icon-calendar"></i>
	                                    </span>	
									    <input type="text" class="form-control" id="birth_date" name="birth_date" placeholder="Input Birth Date" title="Input Birth Date" required>
									</div>
			                    </div>
			        		</div>	
	        			</div>
	        		</div>
	        		<div class="form-group">
	        			<label class="col-md-3 control-label">Email</label>
	                    <div class="col-md-6">
	                        <input type="email" class="form-control" id="email" name="email" placeholder="Input Email" title="Input Email" required>
	                    </div>
	        		</div>
	        		<div class="form-group">
	        			<label class="col-md-3 control-label">Current Position</label>
	                    <div class="col-md-6">
	                        <input type="text" class="form-control" id="current_position" name="current_position" placeholder="Input Current Position" title="Input Current Position" required>
	                    </div>
	        		</div>
	        		<div class="form-group">
	        			<label class="col-md-3 control-label">Current Company</label>
	                    <div class="col-md-6">
	                        <input type="text" class="form-control" id="current_company" name="current_company" placeholder="Input Current Company" title="Input Current Company" required>
	                    </div>
	        		</div>
	        		<div class="form-group">
	        			<label class="col-md-3 control-label">Current Industry</label>
	                    <div class="col-md-6">
	                        <input type="text" class="form-control" id="current_industry" name="current_industry" placeholder="Input Current Industry" title="Input Current Industry" required>
	                    </div>
	        		</div>
	        		<div class="row">
	        			<div class="col-md-6">
		        			<div class="form-group">
			        			<label class="col-md-6 control-label">Work Experience</label>
			                    <div class="col-md-3">
			                        <input type="text" class="form-control" id="work_exp" name="work_exp" placeholder="ex: 1.5" title="Input Work Experience" required>
			                    </div>
			                    <label class="control-label">Years</label>
			        		</div>
			        	</div>
			        	<div class="col-md-6">
			        		
			        	</div>
	        		</div>
	        		<div class="form-group">
	        			<label class="col-md-3 control-label">Salary Range</label>
	                    <div class="col-md-4">
	                        <select class="form-control" name="salary_range" id="salary_range" required>
	                        	<option value="" disabled selected>Select Salary Range</option>
	                        	<option value="Fresh Graduate">Fresh Graduate</option>
	                        	<option value="5.000.000 IDR - 10.000.000 IDR">5.000.000 IDR - 10.000.000 IDR</option>
	                        	<option value="10.000.000 IDR - 15.000.000 IDR">10.000.000 IDR - 15.000.000 IDR</option>
	                        	<option value="15.000.000 IDR - 25.000.000 IDR">15.000.000 IDR - 25.000.000 IDR</option>
	                        	<option value="25.000.000 IDR - 30.000.000 IDR">25.000.000 IDR - 30.000.000 IDR</option>
	                        	<option value="30.000.000 IDR - 35.000.000 IDR">30.000.000 IDR - 35.000.000 IDR</option>
	                        	<option value="35.000.000 IDR - 40.000.000 IDR">35.000.000 IDR - 40.000.000 IDR</option>
	                        	<option value="40.000.000 IDR - 50.000.000 IDR">40.000.000 IDR - 50.000.000 IDR</option>
	                        	<option value="> 50.000.000 IDR">> 50.000.000 IDR</option>
	                        </select>
	                    </div>
	        		</div>
	        		<div class="form-group">
	        			<label class="col-md-3 control-label">Consultants Comment</label>
	                    <div class="col-md-6">
	                        <textarea class="form-control" id="skill" rows="6" name="skill" required title="Input Skill"></textarea>
	                    </div>
	        		</div>
	        		<div class="form-group">
	        			<label class="col-md-3 control-label">Tags</label>
	                    <div class="col-md-6">
				            <input type="text" class="form-control" id="tags" data-role="tagsinput" name="tags">
	                    </div>
	        		</div>
	        		<div class="row">
	        			<div class="col-md-6">
	        				<div class="form-group">
			        			<label class="col-md-6 control-label">Source</label>
			                    <div class="col-md-6">
			                        <select class="form-control" name="source" id="source" onchange="change_source()" required>
			                        	<option value="" disabled selected>Select Source</option>
			                        	<option value="linkedIn">linkedIn</option>
			                        	<option value="Job Portal">Job Portal</option>
			                        	<option value="Internal Job Offering">Internal Job Offering</option>
			                        	<option value="Employee Get Employee">Employee Get Employee</option>
			                        	<option value="User Referral">User Referral</option>
			                        	<option value="Career Fair">Career Fair</option>
			                        	<option value="Community Event">Community Event</option>
			                        	<option value="Campus Hiring">Campus Hiring</option>
			                        	<option value="Social Media">Social Media</option>
			                        	<option value="Personal Network">Personal Network</option>
			                        	<option value="Other">Other</option>
			                        </select>
			                    </div>
			        		</div>	
	        			</div>
	        			<div class="col-md-5">
	        				<div class="form-group">
			                    <div class="col-md-7">
			                        <input type="text" class="form-control" name="other" id="other">
			                    </div>
			        		</div>
	        			</div>
	        		</div>
	        		<div class="form-group">
	                    <label class="col-md-3 control-label">CV Candidate <i style="color: #7C7C7C; font-size: 11px"><em> (Max 2MB) </em></i></label>
	                    <div class="col-md-6">
	                        <input type="file" class="form-control" id="cv" name="cv" title="File CV (PDF,DOC). Max Size 2MB" onchange="validateExtension(this)" required>
	                        <!-- error -->
	                       	<ul class="parsley-errors-list" id="format">
		                    	<li class="parsley-required">Document Format Must PDF or Doc !!</li>
		                    </ul>
		                    <ul class="parsley-errors-list" id="size">
		                    	<li class="parsley-required">Max File Size Must 2MB !!</li>
		                    </ul>
	                    </div>
	                </div>
	                <div class="text-center">
	                    <button class="btn btn-info mrg10T" type="submit" id="upload">Upload</button>
	                </div>
	        	</form>
	        </div>

	    </div>
    </div>

    <!-- panel box 2, data akan muncul jika di database ada -->
    <?php if( $candidate->isNotEmpty() ): ?>
    <div class="col-md-12">
	    <div class="panel panel-default">

	        <div class="panel-body">
	        	<h2 class="title-hero">
				    <strong>Candidate Data</strong>
				</h2>
	        	<table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%">
					<thead>
						<tr>
						    <th class="col-md-1">No.</th>
						    <th class="text-center">Candidate Name</th>
						    <th class="text-center col-md-1">Gender</th>
						    <th class="text-center">Place Date of Birth</th>
						    <th class="text-center col-md-2">CV</th>
						    <th class="text-center col-md-1">Option</th>
						</tr>
					</thead>

					<tbody id="data_candidate">
					    <?php $no=1; ?>
					    <?php $__empty_1 = true; $__currentLoopData = $candidate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $candidate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
					    <tr class="data<?php echo e($candidate->id); ?>">
						    <td class="text-center"><?php echo e($no++); ?></td>
						    <td><?php echo e($candidate->name_candidate); ?></td>
						    <td class="text-center"><?php echo e($candidate->gender); ?></td>
						    <td class="text-center"><?php echo e($candidate->place_birth); ?>, <?php echo e(\Carbon\Carbon::parse($candidate->date_birth)->format('d-m-Y')); ?></td>
						    <td class="text-center"><a href="<?php echo e(route('getDocument',$candidate->id)); ?>" target="_blank"><?php echo e($candidate->CV_candidate); ?></a></td>
						    <td class="text-center">
						    	<?php if( $candidate->approval_candidate == 0 ): ?>
							    	<form action="<?php echo e(route('delete.sourcing',$candidate->id)); ?>" method="POST">
							    		<?php echo csrf_field(); ?>
							    		<?php echo method_field('Delete'); ?>
							    		<button class="btn btn-round btn-danger" type="submit">
							    			<span class="glyph-icon icon-trash" title="Delete Candidate"></span>
							    		</button>
							    	</form>
						    	<?php else: ?>
						    		<?php if( $candidate->approval_candidate == 1 ): ?>
						    			<button class="btn btn-sm btn-success" id="opt_CVcandidate" data-popover="true" data-content="<?php echo e($candidate->comment == NULL ? '' : $candidate->comment); ?>" title="Feedback" data-placement="left"><strong>PROCEED</strong></button>
						    		<?php elseif( $candidate->approval_candidate == 2 ): ?>
						    			<button class="btn btn-sm btn-danger" id="opt_CVcandidate" data-popover="true" data-content="<?php echo e($candidate->reason_reject); ?>" title="Drop Reason" data-placement="left"><strong>DROP</strong></button>
						    		<?php endif; ?>
						    	<?php endif; ?>
						    </td>
					    </tr>
					    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
					    	<td valign="top" colspan="6" class="dataTables_empty">No data available in table</td>
					    	<td id="hidden"></td>
					    	<td id="hidden"></td>
					    	<td id="hidden"></td>
					    	<td id="hidden"></td>
					    <?php endif; ?>
					</tbody>
				</table>
	        </div>

	    </div>
    </div>
    <?php endif; ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>