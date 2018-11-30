<?php $__env->startSection('title','CV & Sourcing'); ?>

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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-12">
	    <div class="panel panel-default">

	        <div class="panel-body">
	        <!-- title -->
	        <div class="title-hero">
				<div class="row">
					<div class="col-md-6" style="padding-top: 10px;">
						<h4><strong>CV & Sourcing</strong></h4>	
					</div>
				</div>
			</div>

	        	<table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%">
					<thead>
						<tr>
						    <th class="col-md-1">No.</th>
						    <th class="text-center">Position Name</th>
						    <th class="text-center col-md-2">Upload CV</th>
						    <th class="text-center">Status</th>
						</tr>
					</thead>

					<tbody>
					    <?php 
						    $no=1;
					    ?>
					    <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
					    <tr>
						    <td class="text-center"><?php echo e($no++); ?></td>
						    <td><?php echo e($data->tickets->position_name); ?></td>
						    <td class="text-center">
						    	<?php
						    		/* Kandidate yg di pilih LM1 sudah 3 */
						    		$candidate_approve = $candidate->where('hiring_brief_id',$data->id);
						    	?>
						    	<?php if( $candidate_approve->where('approval_candidate','1')->count() == 3 ): ?>
						    		<a href="#" type="button" class="btn btn-round btn-info" title="" disabled>
								    	<i class="glyph-icon icon-upload"></i>
								    </a>
						    	<?php else: ?>
						    		<a href="<?php echo e(route('upload',$data->id)); ?>" type="button" class="btn btn-round btn-info" title="Upload">
								    	<i class="glyph-icon icon-upload"></i>
								    </a>
						    	<?php endif; ?>
						    </td>
						    <td class="text-center col-md-4">
						    	<!-- jika CV belum ada yg di upload -->
						    	<?php if( $data->CV == Null ): ?>
						    		<span class="bs-label label-yellow"><strong>There are no candidate</strong></span>
						    	<?php else: ?>
						    		<!-- total candidate yg sudah di upload berdasarkan posisinya -->
							    	<?php if( $data->CV->hiring_brief_id == $data->id  ): ?>
							    		<?php if( $candidate_approve->where('approval_candidate','1')->count() == 3 ): ?>
							    			<!-- jika HRTA next process, cari tgl dan bandingkan utk hitung SLA -->
							    			<?php if( $candidate->where('date_nextProcess_hrta','!=',Null)->count() > 0 ): ?>
							    				<?php
							    					$tglNextProcess = $data->CV->where('hiring_brief_id',$data->id)->first();

							    					/* created_at dijadikan SLA 5 hari */
							    					$tglBuat = $data->CV->created_at;
							    					$SLA = \Carbon\Carbon::parse($tglBuat)->addDays(4);

							    					/* PERHITUNGAN SLA SYSTEM */
							    					$a = \Carbon\Carbon::parse($tglNextProcess->date_nextProcess_hrta)->toDateString();
							    					$diff = $SLA->diffInDays($a);

							    					/*total kandidat approve,reject*/
							    					$total = $candidate->where('hiring_brief_id',$data->id);
							    				?>
							    				<!-- belum di next process oleh HRTA -->
							    				<?php if( $tglNextProcess->date_nextProcess_hrta == Null ): ?>
							    					<form action="<?php echo e(route('nextProcess.sourcing',$data->CV->id)); ?>" method="POST">
											    		<?php echo csrf_field(); ?>
											    		<?php echo method_field('PATCH'); ?>
											    		<a href="<?php echo e(route('showCandidate',$data->id)); ?>" type="button" class="btn btn-info">
											    		<?php echo e($total->where('approval_candidate',1)->count()); ?> Approved, 
											    		<?php echo e($total->where('approval_candidate',2)->count()); ?> Rejected, 
											    		<?php echo e($total->where('approval_candidate',0)->count()); ?> No Action
											    		</a>
											    		<br>
											    		<button class="btn btn-success" type="submit">
											    			<strong>Finish</strong>
											    		</button>
											    	</form>
											    <?php elseif( $SLA < $tglNextProcess->date_nextProcess_hrta ): ?>
											    	<!-- di loop karna hasil dari diff = 0,1,2,3 dst. Jika 0 itu 1 hari, Ini lewat dari waktu SLA-->
											    	<?php for($i = $diff; $i <=$diff; $i++): ?>
							    						<span class="bs-label label-danger"><strong>SLA + <?php echo e($i+1); ?> Days</strong></span>
							    					<?php endfor; ?>
							    				<?php else: ?>
							    					<!-- tidak lewat waktu SLA -->
							    					<?php if( $diff == 4 ): ?>
							    						<span class="bs-label label-success"><strong>SLA 1 Days</strong></span>
							    					<?php elseif( $diff == 3 ): ?>
							    						<span class="bs-label label-success"><strong>SLA 2 Days</strong></span>
							    					<?php elseif( $diff == 2 ): ?>
							    						<span class="bs-label label-success"><strong>SLA 3 Days</strong></span>
							    					<?php elseif( $diff == 1 ): ?>
							    						<span class="bs-label label-success"><strong>SLA 4 Days</strong></span>
							    					<?php elseif( $diff == 0 ): ?>
							    						<span class="bs-label label-success"><strong>SLA 5 Days</strong></span>
							    					<?php endif; ?>
							    				<?php endif; ?>
							    			<?php else: ?>
							    				<form action="<?php echo e(route('nextProcess.sourcing',$data->CV->id)); ?>" method="POST">
										    		<?php echo csrf_field(); ?>
										    		<?php echo method_field('PATCH'); ?>
										    		<button class="btn btn-success" type="submit">
										    			<strong>Finish</strong>
										    		</button>
										    	</form>
							    			<?php endif; ?>
							    		<?php else: ?>
							    			<span class="bs-label label-success">
								    			<strong>Uploaded <?php echo e($data->CV->where('hiring_brief_id',$data->id)->count()); ?> Candidate</strong>
								    		</span>
							    		<?php endif; ?>
							    	<?php else: ?>
							    		<span class="bs-label label-yellow"><strong>There are no candidate</strong></span>
							    	<?php endif; ?>
						    	<?php endif; ?>
						    </td>
					    </tr>
					    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
					    	
					    <?php endif; ?>
					</tbody>
				</table>
	        </div>

	    </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>