<?php $__env->startSection('title','Looking For Candidates'); ?>

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

        $('.dataTables_filter input').attr("placeholder", "Search...");
    } );
</script>

<script>
	/*modal approve*/
    $(document).on("click",".btn_modal_approve", function () {
        var url = $(this).attr('data-url');
        $('#form_modal_approve').attr('action',url);
    });

    /* modal reject */
    $(document).on("click",".btn_modal_reject", function () {
        var url = $(this).attr('data-url');
        $('#form_modal_reject').attr('action',url);
    });

    /*modal candidate detail*/
    $(document).on("click",".candidate", function () {
    	var url = $(this).attr('data-url');
    	$.ajax({
    		type: 'GET',
    		url : url,
    		cache : true,
    		success:function(data) {
    			$('#name_candidate').val(data.name_candidate);
    			if ( data.education == 'S1' ) {
    				$('#education').val("Bachelor's degree graduate");
    			} else if ( data.education == 'S2' ) {
    				$('#education').val("Master's degree graduate");
    			} else if ( data.education == 'S3' ) {
    				$('#education').val("Doctoral degree graduate");
    			} else if ( data.education == 'D3' ) {
    				$('#education').val("Diploma's degree graduate");
    			}
    			if ( data.gender == 'F' ){
    				$('#gender').val('Female');
    			} else if ( data.gender == 'M' ){
    				$('#gender').val('Male');
    			}
    			$('#birth_place').val(data.place_birth);
    			$('#birth_date').val(data.date_birth);
    			$('#current_position').val(data.current_position);
    			$('#current_company').val(data.current_company);
    			$('#current_industry').val(data.current_industry);
    			$('#work_exp').val(data.work_exp);
    			$('#salary_range').val(data.salary_range);
    			$('#skill').val(data.skill);

    			$('#source').val(data.source);
    			$('#other').hide();
    			if ( data.source == 'Other' ) {
    				$('#other').show();
    				$('#other').val(data.other);
    			} 

    			$('#tags').val(data.tags);
    			var url_cv = "<?php echo e(route('getCV',":id")); ?>";
    			var url_cv = url_cv.replace(':id',data.id); /* replace id via javascript  */

    			$('#download_cv').attr('href',url_cv);
    		}
    	})
    });
</script>

<!-- Jquery Countdown -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<ol class="breadcrumb bc-3" >
    <li>
        <a href="<?php echo e(route('candidate')); ?>">Candidate</a>
    </li>
    <li>
    	<span>Looking For Candidate</span>
    </li>
</ol>

<h2>Looking For 
	<code><?php echo e($candidate->isEmpty() == true ? '' : $candidate[0]->hiring_briefs->tickets->position_name); ?></code> Candidates
</h2>
<br />
<div style="color: tomato;">
	<p></p>
</div>
<div class="row">
    <div class="col-md-12">
	    <div class="panel panel-default">

	        <div class="panel-body">
	        <!-- table CV , waktu untuk SLA CV Feedback LM1 -->
	        <?php
	        	$waktuSLA = $candidate->firstWhere('created_at','!=',NULL);
	        ?>
	        <input type="hidden" id="waktuSLA" waktuSLA="<?php echo e(\Carbon\Carbon::parse($waktuSLA->created_at)->addDays(2)); ?>"> <!-- 2018-11-02 12:49:55 -->

	    	<?php if( $candidate->isNotEmpty() == true && $candidate->where('approval_candidate',1)->count() != 3 ): ?>
				<div class="alert alert-danger" >
				    <div class="bg-red alert-icon">
				        <i class="glyph-icon icon-warning"></i>
				    </div>
				    <div class="alert-content">
				        <h4 class="alert-title">Notice message</h4>
				        <p>Please choose candidates that fit for this position as soon as possible. <em><strong>If you pass the remaining SLA time, this ticket will be automatically FREEZE. </strong></em> Your remaining SLA time <code style="font-size: 20px"><span id="clock"></span></code></p>
				    </div>
				</div>
			<?php endif; ?>

			<!-- notif -->
	        <?php if(session('success')): ?>
	        	<div class="alert alert-success" role="alert">
	        		<button type="button" class="close" data-dismiss="alert">×</button>
	                <strong><?php echo e(session('success')); ?></strong>
	            </div>
	        <?php elseif(session('error')): ?>
	        	<div class="alert alert-danger" role="alert">
	        		<button type="button" class="close" data-dismiss="alert">×</button>
	                <strong><?php echo e(session('error')); ?></strong>
	            </div>
	        <?php endif; ?>

	        	<table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%">
					<thead>
						<tr>
						    <th class="col-md-1">No.</th>
						    <th class="text-center">Candidate Name</th>
						    <th class="text-center col-md-1">Work Experience</th>
						    <th class="text-center">Current Role</th>
						    <th class="text-center">Current Company</th>
						    <th class="text-center col-md-2">CV</th>
						    <th class="text-center">Status</th>
						</tr>
					</thead>

					<tbody>
					    <?php 
						    $no=1;
					    ?>
					    
						    <?php $__empty_1 = true; $__currentLoopData = $candidate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $candidate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
						    <!-- buat countdown di javascript -->
						    <?php
						    	/* ambil tiket ID */
						    	$ticket_id = $candidate->hiring_briefs->ticket_id;
						    	$ticket = App\Models\Ticket::findOrFail($ticket_id);
						    ?>
						    <input type="hidden" id="data-candidate" data-id="<?php echo e($ticket->id); ?>">
						    <tr>
							    <td class="text-center"><?php echo e($no++); ?></td>
							    <td>
								    <a href="#candidate_detail" data-toggle="modal" class="candidate" data-url="<?php echo e(route('candidate_detail',$candidate->id)); ?>">
								    	<?php echo e($candidate->name_candidate); ?>

								    </a>
							    </td>
							    <td class="text-center"><?php echo e($candidate->work_exp); ?> <?php echo e($candidate->work_exp == '1' ? 'year' : 'years'); ?></td>
							    <td class="text-center"><?php echo e($candidate->current_position); ?></td>
							    <td class="text-center"><?php echo e($candidate->current_company); ?></td>

							    <!-- BTN DOWNLOAD CV -->
							    <td class="text-center col-md-2">
							    	<a href="<?php echo e(route('getCV',$candidate->id)); ?>" target="_blank" type="button" class="btn btn-round btn-info btn_download_cv"><span class="glyph-icon icon-download"></span>
							    	</a>
							    </td>

							    <td class="text-center col-md-2">
							    	<?php if($candidate->approval_candidate == 1): ?>
							    		<span class="bs-label label-success"><strong>proceed</strong></span>
							    	<?php elseif($candidate->approval_candidate == 2): ?>
							    		<span class="bs-label label-danger"><strong>drop</strong></span>
							    	<?php else: ?>
							    		<a href="#modal_approve" data-url="<?php echo e(route('candidate.approve',$candidate->id)); ?>" type="button" data-toggle="modal" class="btn btn-round btn-success btn_modal_approve" title="Choose Candidate">
								            <span class="glyph-icon icon-hand-o-right"></span>
								        </a>
								        &nbsp;
								        <a href="#modal_reject" data-url="<?php echo e(route('candidate.reject',$candidate->id)); ?>" type="button" data-toggle="modal" class="btn btn-round btn-danger btn_modal_reject" title="Reject">
								        	<span class="glyph-icon icon-close"></span>
								        </a>
							    	<?php endif; ?>
							    </td>
						    </tr>
						    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
						    	<td valign="top" colspan="7" class="dataTables_empty">No data available in table</td>
						    	<td id="hidden"></td>
						    	<td id="hidden"></td>
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
</div>

<!-- Modal Select Candidate -->
<div class="modal fade" tabindex="1" id="modal_approve" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Proceed Candidate</h4>
            </div>
            <form role="form" method="post" class="form-horizontal" id="form_modal_approve">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>
            	<div class="modal-body">
                	<div class="form-group">
                        <label class="col-sm-2 control-label">Comment</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" cols="51" rows="12" name="comment"></textarea>
                        </div>
                    </div>
	            </div>
	            <div class="modal-footer">
	                <button type="submit" class="btn btn-success">Yes, i choose it</button>
	                <button type="button" class="btn btn-danger" data-dismiss="modal">No, cancel</button>
	            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Reject Candidate -->
<div class="modal fade" tabindex="1" id="modal_reject" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Drop Candidate</h4>
            </div>
            <form role="form" method="post" class="form-horizontal" id="form_modal_reject">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>
            	<div class="modal-body">
                	<div class="form-group">
                        <label class="col-sm-2 control-label">Reason<span style="color: red;"> *</span></label>
                        <div class="col-sm-9">
                            <textarea class="form-control" cols="51" rows="12" name="reason" required></textarea>
                        </div>
                    </div>
	            </div>
	            <div class="modal-footer">
	                <button type="submit" class="btn btn-success">Yes, i reject it</button>
	                <button type="button" class="btn btn-danger" data-dismiss="modal">No, cancel</button>
	            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Candidate Detail -->
<?php $__env->startComponent('Component.candidate_detail'); ?>
<?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>