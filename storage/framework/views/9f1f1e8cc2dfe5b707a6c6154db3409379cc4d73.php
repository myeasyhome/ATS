<?php $__env->startSection('title','List Candidate'); ?>

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
<script src="<?php echo e(asset('assets/widgets/datepicker/bootstrap-datepicker.js')); ?>"></script>">
</script>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<ol class="breadcrumb">
    <li>
        <a href="<?php echo e(route('sourcing')); ?>">CV & Sourcing</a>
    </li>
    <li>
    	<span>List Candidate</span>
    </li>
</ol>

<h2>List 
	<code><?php echo e($candidate->isEmpty() == true ? '' : $candidate[0]->hiring_briefs->tickets->position_name); ?></code> Candidates
</h2>
<br>
<div style="color: tomato;">
	<p></p>
</div>

<div class="row">

    <div class="col-md-12">
	    <div class="panel panel-default">

	        <div class="panel-body">
	        	<table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%">
					<thead>
						<tr>
						    <th class="col-md-1">No.</th>
						    <th class="text-center">Candidate Name</th>
						    <th class="text-center col-md-1">Gender</th>
						    <th class="text-center">Place Date of Birth</th>
						    <th class="text-center col-md-3">CV</th>
						    <th class="text-center col-md-2">status</th>
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
						    	<?php if($candidate->approval_candidate == 1): ?>
						    		<span class="bs-label label-success"><strong>Approved</strong></span>
						    	<?php elseif($candidate->approval_candidate == 2): ?>
						    		<label class="bs-label label-danger" id="ket" data-popover="true" title="Information" data-content="<?php echo e($candidate->reason_reject); ?>"><strong>Rejected</strong></label>
						    	<?php else: ?>
						    		<span class="bs-label label-info"><strong>No Action</strong></span>
						    	<?php endif; ?>
						    </td>
					    </tr>
					    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
					    	<td valign="top" colspan="4" class="dataTables_empty">No data available in table</td>
					    	<td id="hidden"></td>
					    	<td id="hidden"></td>
					    	<td id="hidden"></td>
					    <?php endif; ?>
					</tbody>
				</table>
	        </div>

	    </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>