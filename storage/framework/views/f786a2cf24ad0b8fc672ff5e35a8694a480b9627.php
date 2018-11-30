<?php $__env->startSection('title','Hiring Brief'); ?>

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


<script>
/* keterangan label di option */
	$('body').popover({
		placement:'top',
		html : true,
		delay: {show: 50, hide: 400},
		selector: '[data-popover]',
    	trigger: 'click hover',
	    content: function(ele) {
	        console.log(ele,this);
	        return $(this).next("#ket").html();
		}
	});
</script>

<script type="text/javascript">
	/* Modal Rejected */
    $(document).ready(function () {
        $(document).on("click", ".btn_modal_reject", function () {
            var url = $(this).attr('data-url');
            $.ajax({
            	type : "GET",
            	url : url,
            	cache : true,
            	success:function(data){
            		$('#content_reason').html('<p>'+data.reason_reject+'</p>')
            	}
            })
        });
    });
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="panel">
	<div class="panel-body">
		<div class="title-hero">
			<div class="row">
				<div class="col-md-6" style="padding-top: 10px;">
					<h4><strong>NEW REQUEST LIST</strong></h4>	
				</div>

				
			</div>
		</div>
		<div class="example-box-wrapper">
        <!-- Notification Alart -->
        <?php if(session('success')): ?>
        	<div class="alert alert-success" role="alert">
        		<button type="button" class="close" data-dismiss="alert">×</button>
                <strong><?php echo e(session('success')); ?></strong>
            </div>
        <?php endif; ?>
			<table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap dataTable collapsed dtr-inline" cellspacing="0" width="100%">
				<thead>
				<tr>
				    <th class="text-center col-md-1">No.</th>
				    <th class="text-center">Position Name</th>
				    <th class="text-center">Brief Schedule</th>
				    <th class="text-center">Time Schedule</th>
				    <th class="text-center">Place Schedule</th>
				    <th class="text-center">Status</th>
				</tr>
				</thead>

				<tbody>
				<?php $no =1; ?>
				    <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
				    	
				    	<?php if( $data->freeze == 99 ): ?>
				    		<td class="text-center"><?php echo e($no++); ?></td>
				    		<td>
				    			<em><a href="<?php echo e(route('hiring.detail',$data->id)); ?>" style="color: red"><?php echo e($data->position_name); ?></a></em>
				    		</td>
				    		<td class="text-center">-</td>
				    		<td class="text-center">-</td>
				    		<td class="text-center">-</td>
				    		<td class="text-center">
				    			<span class="bs-label label-danger"><strong>freeze</strong></span>
				    		</td>
				    	<?php else: ?>
					    	<!-- cek jika table hiring brief kosong -->
					    	<?php if( empty($data->hiring_briefs->ticket_id) ): ?>
					    		<td valign="top" colspan="7" class="dataTables_empty">No data available in table</td>
						    	<td id="hidden"></td>
						    	<td id="hidden"></td>
						    	<td id="hidden"></td>
						    	<td id="hidden"></td>
						    	<td id="hidden"></td>
						    	<td id="hidden"></td>
					    	<?php else: ?>
							    <tr>
								    <td class="text-center"><?php echo e($no++); ?></td>
								    <td>
								    	<a href="<?php echo e(route('hiring.detail',$data->id)); ?>"><?php echo e($data->position_name); ?></a>
								    </td>
								    <td class="text-center">
									    <?php if( $data->hiring_briefs->date_schedule != Null ): ?>
										    <?php echo e(\Carbon\Carbon::parse($data->hiring_briefs->date_schedule)->format('d/m/Y')); ?>

										<?php else: ?>
											-
									    <?php endif; ?>
								    <td class="text-center">
								    	<?php if( $data->hiring_briefs->time_schedule != Null ): ?>
										    <?php echo e(\Carbon\Carbon::parse($data->hiring_briefs->time_schedule)->format('h:i:s A')); ?>

										<?php else: ?>
											-
									    <?php endif; ?>
								    </td>
								    <td class="text-center">
								    	<?php if( $data->hiring_briefs->place_schedule != Null ): ?>
										    <?php echo e($data->hiring_briefs->place_schedule); ?>

										<?php else: ?>
											-
									    <?php endif; ?>
								    </td>

									<!-- =============================== SLA SYSTEM ==============================
										@author  Denny Aris Setiawan (dennyariss@gmail.com)
									-->
								    <td class="text-center">
									    <?php
									    /* TANGGAL SEKARANG SEBAGAI ACUAN PERHITUNGAN SLA */ 
									    	$now = '2018-10-12';
									    ?>
								    <!-- jika date schedule buat hiring brief belum di set -->
								    <?php if( $data->hiring_briefs->date_schedule == NULL ): ?>
								        <a href="<?php echo e(route('create.brief',$data->id)); ?>" type="button" class="btn btn-primary" title="Create Schedule">
								            <span class="glyph-icon icon-clock-o"> Schedule</span>
								        </a>

								    <!-- logika date yang sudah di schedule -->
									<?php else: ?>
										<!-- Sebelum ke Date Schedule -->
									    <?php if( $now < $data->hiring_briefs->date_schedule ): ?>
									    	<?php
									    		/* perhitungan untuk jarak date schedule dengan tanggal sekarang */
												$date = \Carbon\Carbon::parse($data->hiring_briefs->date_schedule);

												$diff = $date->diffInDays($now);
									    	?>
									    	<!-- schedule udh di set dan menunggu sampai waktu schedule -->
									    	<?php if( $data->hiring_briefs->approval_hiring_by_hrbp == NULL ): ?>
								    			<span class="bs-label label-yellow" id="ket" data-popover="true" data-content="<?php echo e($diff); ?> days more to input the result of brief" title="Information">
											    	<strong>Wait until brief schedule</strong>
											    </span>
											<!-- jika hasil hiring brief sudah di input & menunggu approval HRBP -->
											<?php elseif( $data->hiring_briefs->approval_hiring_by_hrbp == 0 ): ?>
												<span class="bs-label label-yellow" id="ket" data-popover="true" data-content="You have entered the result of the briefing, so please wait for approval from HRBP" title="Information">
													<strong>Waiting Approval From HRBP</strong>
												</span>

											<!-- sudah di approve HRBP -->
											<?php elseif( $data->hiring_briefs->approval_hiring_by_hrbp == 1 ): ?>
												<?php
													/* total menghitung SLA sejak HRBP approve hasil brief dan TIDAK LEWAT DARI SLA */
													$approval = \Carbon\Carbon::parse($data->hiring_briefs->approval_date_hrbp);
													$schedule = \Carbon\Carbon::parse($data->hiring_briefs->date_schedule)->addDays(2);

													$total = $schedule->diffInDays($approval);
												?>
												<!-- SLA HIJAU -->
												<?php if( $approval <= $schedule ): ?>
													<?php if( $total == 2 ): ?>
														<span class="bs-label label-success"><strong>SLA 1 Days</strong></span>
													<?php elseif( $total == 1 ): ?>
														<span class="bs-label label-success"><strong>SLA 2 Days</strong></span>
													<?php elseif( $total == 0 ): ?>
														<span class="bs-label label-success"><strong>SLA 3 Days</strong></span>
													<?php endif; ?>
												<?php endif; ?>
											<!-- sudah di reject HRBP -->
											<?php elseif( $data->hiring_briefs->approval_hiring_by_hrbp == 2 ): ?>
												<a href="#modal_reject" data-url="<?php echo e(route('reject.reason.brief',$data->hiring_briefs->id)); ?>" type="button" class="btn btn-danger btn_modal_reject" data-url="" data-toggle="modal" title="Rejected Reason">Rejected</a>
									    	<?php endif; ?>




										<!-- lewat dari date schedule -->
										<?php elseif( $now >= $data->hiring_briefs->date_schedule ): ?>
											<?php
												/* waktu dari brief schedule di tambah 3 Hari SLA */
												$SLA = \Carbon\Carbon::parse($data->hiring_briefs->date_schedule)->addDays(2);

												$diff = $SLA->diffInDays($now);
											?>
											<!-- proses mau input hasil brief untuk mengetahui SLA -->
											<?php if( $data->hiring_briefs->approval_hiring_by_hrbp == NULL ): ?>
												<!-- jika $now sama dengan tanggal brief -->
												<?php if( $now > $data->hiring_briefs->date_schedule ): ?>
													<!-- JIKA udah hari H -->
													<?php if( $now <= $SLA ): ?>
														<a href="<?php echo e(route('input.brief',$data->id)); ?>" type="button" class="btn btn-success" title="Input Result of Brief">
											    			<span><?php echo e($now == \Carbon\Carbon::parse($SLA)->toDateString() ? 'Final Day' : $diff.' Days Remaining'); ?></span>
											    		</a>
											    	<?php elseif( $now > $SLA ): ?>
											    		<a href="<?php echo e(route('input.brief',$data->id)); ?>" type="button" class="btn btn-danger" title="Input Result of Brief">
											    			<span> + <?php echo e($diff); ?> Days</span>
										    			</a>
													<?php endif; ?>
										    	<?php elseif( $now == $data->hiring_briefs->date_schedule ): ?>
										    		<span>
										    			<a href="<?php echo e(route('input.brief',$data->id)); ?>" type="button" class="btn btn-success" title="Input Result of Brief">
											    			<span><?php echo e($diff); ?> Days Remaining</span>
											    		</a>
										    		</span>
											    <?php endif; ?>
											<!-- sudah input hasil brief dan menunggu apporval HRBP -->
											<?php elseif( $data->hiring_briefs->approval_hiring_by_hrbp == 0 ): ?>
												<span class="bs-label label-yellow" id="ket" data-popover="true" data-content="You have entered the result of the briefing, so please wait for approval from HRBP" title="Information">
													<strong>Waiting Approval From HRBP</strong>
												</span>
											<!-- sudah di approve HRBP -->
											<?php elseif( $data->hiring_briefs->approval_hiring_by_hrbp == 1 ): ?>
												<?php
													/* total menghitung SLA sejak HRBP approve hasil brief dan TIDAK LEWAT DARI SLA */
													$approval = \Carbon\Carbon::parse($data->hiring_briefs->approval_date_hrbp);
													$schedule = \Carbon\Carbon::parse($data->hiring_briefs->date_schedule)->addDays(2);

													$total = $schedule->diffInDays($approval);
												?>
												<!-- SLA HIJAU -->
												<?php if( $approval <= $schedule ): ?>
													<?php if( $total == 2 ): ?>
														<span class="bs-label label-success"><strong>SLA 1 Days</strong></span>
													<?php elseif( $total == 1 ): ?>
														<span class="bs-label label-success"><strong>SLA 2 Days</strong></span>
													<?php elseif( $total == 0 ): ?>
														<span class="bs-label label-success"><strong>SLA 3 Days</strong></span>
													<?php endif; ?>
												<!-- SLA MERAH -->
												<?php elseif( $approval > $schedule ): ?>
													<span class="bs-label label-danger"><strong>SLA + <?php echo e($total); ?></strong></span>
												<?php endif; ?>

											<!-- Di reject oleh HRBP -->
											<?php elseif( $data->hiring_briefs->approval_hiring_by_hrbp == 2 ): ?>
												<a href="#modal_reject" data-url="<?php echo e(route('reject.reason.brief',$data->hiring_briefs->id)); ?>" type="button" class="btn btn-danger btn_modal_reject" data-url="" data-toggle="modal" title="Rejected Reason">Rejected</a>
											<?php endif; ?>
									    <?php endif; ?>
									<?php endif; ?>
									</td>
							    </tr>
						    <?php endif; ?>
						<?php endif; ?>
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

<!-- modal Rejected Reason -->
<div class="modal fade" tabindex="1" id="modal_reject" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Rejected Reason</h4>
            </div>

        	<div class="modal-body" id="content_reason">
            	
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>