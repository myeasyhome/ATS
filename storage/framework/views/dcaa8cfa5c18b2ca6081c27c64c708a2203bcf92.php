<?php $__env->startSection('title','Candidate'); ?>

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

<!-- Tampilan di kolom SLA -->


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<h2>Candidate</h2>
<br />
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
						    <th class="text-center">Position Name</th>
						    
						    <th class="text-center col-md-2">Sourcing Candidate</th>
						    <th class="text-center col-md-3">Status</th>
						</tr>
					</thead>

					<tbody id="data_candidate">
					    <?php $no=1; ?>
					    <?php $__empty_1 = true; $__currentLoopData = $candidate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $candidate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
					    <tr>
						    <td class="text-center"><?php echo e($no++); ?></td>
						    <td><?php echo e($candidate->tickets->position_name); ?> 
						    	<?php
				                    /* ada kandidat yg belum di proses */
				                    $new = App\Models\CV::where('hiring_brief_id',$candidate->id)->whereIn('approval_candidate',['0'])->count();
				                    $ambil_tgl = App\Models\CV::where('hiring_brief_id',$candidate->id)->whereIn('approval_candidate',['0'])->pluck('created_at')->first();
                    				$SLA_CVFeedback = \Carbon\Carbon::parse($ambil_tgl)->addDays(2);
				                ?>
				                <!-- jika udah lewat waktu sla feedback, badge 'new' hilang -->
    				            <?php if( \Carbon\Carbon::now() > $SLA_CVFeedback ): ?>

				                <?php elseif( $new > 0 ): ?>
				                    <span class="bs-label label-success" id="ket" data-popover="true" data-content="There are new candidates who need your feedback." title="Information">new</span>
				                <?php endif; ?>
						    </td>
						    <!-- SLA CV Feedback -->
						    
						    <td class="text-center">
						    <!-- jika CV belum ada yg di upload -->
						    	<?php if( $candidate->CV == Null ): ?>
						    		<span class="bs-label label-yellow" id="ket" data-popover="true" data-content="HR Talent Acquistion hasn't uploaded the candidate" title="Information"><strong>There are no candidate</strong></span>
						    	<?php else: ?>
						    		<!-- total candidate yg sudah di upload berdasarkan posisinya -->
							    	<?php if( $candidate->CV->hiring_brief_id == $candidate->id  ): ?>
							    		<!-- kondisi sudah di pilih 3 kandidat dan berdasarkan hiring_brief_id -->
							    		<?php if( $candidate->CV->where([['approval_candidate','1'],['hiring_brief_id',$candidate->id]])->count()==3 ): ?>
							    			<?php
							    				/* ambil field tgl yg ada di antara row ( ini tgl ketika LM1 udah milih 3 kandidat ) */
							    				$tglApprove = $candidate->CV->where([
							    						['hiring_brief_id',$candidate->id],
							    						['approval_date_candidate','!=',Null]
							    					])->first();

							    				/* ini tgl awal HRTA upload kandidat */
							    				$tglBuat = \Carbon\Carbon::parse($candidate->CV->created_at)->addDays(1);
							    			?>
							    			<?php if( $tglApprove->approval_date_candidate > $tglBuat ): ?>
							    				<span class="bs-label label-danger"><strong>You exceed the SLA schedule</strong></span>
							    			<?php else: ?>
							    				<span class="bs-label label-success"><strong>You have chosen according to the SLA schedule</strong></span>
							    			<?php endif; ?>
							    		<?php else: ?>
							    			<!-- jika sudah freeze == 99 /SLA selesai -->
							    			<?php if( $candidate->tickets->freeze == 99 ): ?>
							    				-
							    			<?php else: ?>
								    			<a href="<?php echo e(route('lm1.sourcing',$candidate->id)); ?>" type="button" class="bs-label label-info">
								    				<span class="glyph-icon icon-linecons-search"><strong> sourcing</strong></span>
								    			</a>	
							    			<?php endif; ?>
							    		<?php endif; ?>
							    	<?php else: ?>
							    		<span class="bs-label label-yellow"><strong>There are no candidate</strong></span>
							    	<?php endif; ?>
						    	<?php endif; ?>
						    </td>
						    <td class="text-center">
						    	<!-- KOLOM STATUS -->
						    	<?php
						    		$proceed = App\Models\CV::where([
						    					['approval_candidate','1'],
						    					['hiring_brief_id',$candidate->id]
						    				])->count();
						    		$drop = App\Models\CV::where([
						    					['approval_candidate','2'],
						    					['hiring_brief_id',$candidate->id]
						    				])->count();
						    		$needFeedback = App\Models\CV::where([
						    					['approval_candidate','0'],
						    					['hiring_brief_id',$candidate->id]
						    				])->count();
						    	?>
						    	<label><em><strong>
						    		<?php echo e($proceed); ?> Proceed, 
						    		<?php echo e($drop); ?> Drop,
						    		<?php echo e($needFeedback); ?> Need Feedback
						    	</strong></em></label>
						    </td>
					    </tr>
					    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
					    	<td valign="top" colspan="5" class="dataTables_empty">No data available in table</td>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>