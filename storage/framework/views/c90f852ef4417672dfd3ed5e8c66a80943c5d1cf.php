<?php $__env->startSection('title','Dashboard'); ?>

<?php $__env->startSection('js'); ?>
<script type="text/javascript" src="<?php echo e(asset('assets/widgets/datatable/datatable.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/widgets/datatable/datatable-bootstrap.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/widgets/datatable/datatable-responsive.js')); ?>"></script>
<script type="text/javascript">
    /* Datatables responsive */
    $(function() {
    	// $('#datatable-responsive thead tr').clone(true).appendTo( '#datatable-responsive thead' );
	    // $('#datatable-responsive thead tr:eq(1) th').each( function (i) {
	    //     var title = $(this).text();
	    //     $(this).html( '<input id="filter" type="text" placeholder="Search '+title+'" width="10%" />' );
	 
	    //     $( '#filter', this ).on( 'keyup change', function () {
	    //         if ( table.column(i).search() !== this.value ) {
	    //             table
	    //                 .column(i)
	    //                 .search( this.value )
	    //                 .draw();
	    //         }
	    //     } );
	    // } );

        $('#datatable-responsive').DataTable( {
            "responsive" : true,
        } );

        $('.dataTables_filter input').attr("placeholder", "Search...");

    } );
</script>

<script type="text/javascript">
	
    $(document).ready(function () {
    	/* Modal Rejected */
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

         /* modal freeze */
        $(document).on('click','#btn_freeze', function() {
        	var url = $(this).attr('data-url');
        	console.log(url);
        	$('#form_modal_freeze').attr('action',url);
        });

		/* modal unfreeze */
        $(document).on('click','#btn_unfreeze', function() {
        	var url = $(this).attr('data-url');
        	$('#form_modal_unfreeze').attr('action',url);
        });       

    });   
</script>

<!-- kolom recruiter -->
<script src="<?php echo e(asset('assets/select2/select2.js')); ?>"></script>
<script>
	/* dropdown recruiter */
	$(document).ready(function() {
	    $('.recruiter').select2({
	    	placeholder : 'Select Recruiter',
	    	theme: 'bootstrap',
	    });

	    $('.btn_recruiter').click( function() {
	    	/* Data recruiter di table ticket */
	    	var recruiter = $(this).data('recruiter');

		    $('.recruiter').select2().val(recruiter).trigger('change');

        }); 
	});
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div id="page-title">
	<h2>Dashboard</h2>
</div>
<div class="panel">
	<div class="panel-body">
		<div class="title-hero">
			<div class="row">
				<div class="col-md-6" style="padding-top: 10px;">
					<h5><strong>NEW REQUEST LIST</strong></h5>	
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
        <?php elseif(session('error')): ?>
        	<div class="alert alert-danger" role="alert">
        		<button type="button" class="close" data-dismiss="alert">×</button>
                <strong><?php echo e(session('error')); ?></strong>
            </div>
        <?php endif; ?>
        
			<table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap dataTable collapsed dtr-inline" cellspacing="0" width="100%">
				<thead>
					<tr>
					    <th class="text-center col-md-2">Position Name</th>
					    <th class="text-center col-md-1">Status</th>
					    <th class="text-center col-md-1">Progress</th>
					    <th class="text-center col-md-1">Directorate</th>
					    <th class="text-center col-md-1">Grade</th>
					    <th class="text-center col-md-1">Created By</th>
					    <th class="text-center col-md-1">Recruiter</th>
					    <th class="text-center col-md-1">SLA</th>
					    
					</tr>
				</thead>

				<tbody>
				<?php $no =1; ?>
			    <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
				    <tr>
				    <?php if( $data->freeze == 99 ): ?>
				    <!-- POSISI DI FREEZE OLEH TA-->
				    	<td><a href="<?php echo e(route('dashboard.detailTicket',$data->id)); ?>"><em style="color: red;"><?php echo e($data->position_name); ?></em></a></td>
				    	<td class="text-center">
				    		
				    		<span class="bs-label btn-border border-red font-red"><strong>freeze</strong></span>
				    	</td>
				    	<td class="text-center">-</td>
				    	<td class="text-center">-</td>
				    	<td class="text-center">-</td>
				    	<td class="text-center">-</td>
				    	<td class="text-center">-</td>
				    	
				    	<td class="text-center">
				    		<!-- KOLOM ACTION -->
				    		<a href="#modal_unfreeze" data-toggle="modal" data-url="<?php echo e(route('unfreeze',$data->id)); ?>" id="btn_unfreeze" type="btn" class="btn btn-round btn-success" title="Unfreeze"><span class="glyph-icon icon-iconic-sun"></span></a>
				    	</td>

				    <?php else: ?>
			    		<td>
			    		<!-- KOLOM NAMA POSISI -->
			    			<a href="<?php echo e(route('dashboard.detailTicket',$data->id)); ?>"><?php echo e($data->position_name); ?></a><br><br>
			    			<!-- btn action -->
			    			<?php if( $data->user->grade == 7 ): ?>
			    				<?php if( $data->approval_hrbp == 1 && $data->approval_GH == 1 && $data->approval_chief == 1 ): ?>
			    					<a href="#" type="btn" class="btn btn-xs btn-round btn-warning" title="Cancel">
			    						<span class="glyph-icon icon-ban"></span>
			    					</a>
					    			<a href="#modal_freeze" id="btn_freeze" data-toggle="modal" type="btn" class="btn btn-xs btn-round btn-danger" title="Freeze" data-url="<?php echo e(route('freeze',$data->id)); ?>">
					    				<span class="glyph-icon icon-iconic-sun-inv"></span>
					    			</a>
			    				<?php endif; ?>
			    			<?php elseif( $data->user->grade == 8 ): ?>
			    				<?php if( $data->approval_hrbp == 1 && $data->approval_chief == 1 && $data->approval_chro == 1 ): ?>
				    				<a href="#" type="btn" class="btn btn-xs btn-round btn-warning" title="Cancel"><span class="glyph-icon icon-ban"></span></a>
					    			<a href="#modal_freeze" id="btn_freeze" data-toggle="modal" type="btn" class="btn btn-xs btn-round btn-danger" title="Freeze" data-url="<?php echo e(route('freeze',$data->id)); ?>"><span class="glyph-icon icon-iconic-sun-inv"></span></a>
				    			<?php endif; ?>
			    			<?php endif; ?>
			    		</td>
			    		<td class="text-center"> 
			    		<!-- KOLOM STATUS -->
			    			<?php if( $data->user->grade == 7 ): ?>
			    			
			    				<?php if( $data->approval_hrbp == 2 || $data->approval_GH == 2 || $data->approval_chief == 2): ?>
				    				<span class="bs-label btn-border border-red font-red"><strong>reject</strong></span>
				    			<?php elseif( $data->approval_hrbp == 0 || $data->approval_GH == 0 || $data->approval_chief == 0 ): ?>
				    				<span class="bs-label btn-border border-yellow font-yellow"><strong>waiting</strong></span>
				    			<?php elseif( $data->approval_hrbp == 1 && $data->approval_GH == 1 && $data->approval_chief == 1 && $data->hiring_briefs->date_schedule == NULL ): ?>
				    				<span class="bs-label btn-border border-green font-green"><strong>open</strong></span>
				    			<?php elseif( $data->approval_hrbp == 1 && $data->approval_GH == 1 && $data->approval_chief == 1 && $data->hiring_briefs->approval_hiring_by_hrbp == 0 ): ?>
				    				<span class="bs-label btn-border border-yellow font-yellow"><strong>waiting</strong></span>
				    			<?php elseif( $data->approval_hrbp == 1 && 
				    					$data->approval_GH == 1 && 
					    				$data->approval_chief == 1 && 
					    				$data->hiring_briefs->approval_hiring_by_hrbp == 1 ): ?>
					    			
				    					<span class="bs-label btn-border border-green font-green"><strong>open</strong></span>
				    				
				    			<?php elseif( $data->approval_hrbp == 1 && 
				    					$data->approval_GH == 1 && 
					    				$data->approval_chief == 1 && 
					    				$data->hiring_briefs->approval_hiring_by_hrbp == 2 ): ?>
					    				<span class="bs-label btn-border border-red font-red"><strong>reject</strong></span>
				    			<?php elseif( $data->approval_hrbp == 1 && $data->approval_GH == 1 && $data->approval_chief == 1 && $data->hiring_briefs->date_schedule == Carbon\Carbon::now()->toDateString() || Carbon\Carbon::now()->toDateString() > $data->hiring_briefs->date_schedule ): ?>
				    				<span class="bs-label btn-border border-green font-green"><strong>open</strong></span>
				    			<?php elseif( $data->approval_hrbp == 1 && $data->approval_GH == 1 && $data->approval_chief == 1 && $data->hiring_briefs->date_schedule != Carbon\Carbon::now()->toDateString() ): ?>
				    				<span class="bs-label btn-border border-yellow font-yellow"><strong>waiting</strong></span>
				    			<?php endif; ?>
			    			<?php elseif( $data->user->grade == 8 ): ?>
			    			
			    				<?php if( $data->approval_hrbp == 2 ): ?>
				    				<span class="bs-label btn-border border-red font-red"><strong>reject</strong></span>
			    				<?php elseif( $data->approval_hrbp == 0 || $data->approval_chief == 0 || $data->approval_chro == 0 ): ?>
				    				<span class="bs-label btn-border border-yellow font-yellow"><strong>waiting</strong></span>
				    			<?php elseif( $data->approval_hrbp == 1 && $data->approval_chief == 1 && $data->approval_chro == 1 ): ?>
				    				<span class="bs-label btn-border border-green font-green"><strong>open</strong></span>
				    			<?php endif; ?>
			    			<?php endif; ?>
			    		</td>
			    		<td class="text-center">
			    		<!-- KOLOM PROGRESS -->
			    			<?php if( $data->user->grade == 7 ): ?>
			    			
				    			<?php if( $data->approval_hrbp == 0 ): ?>
				    				<span class="bs-label label-default">
				    					<strong><em>Approval HRBP</em></strong>
				    				</span>
				    			<?php elseif( $data->approval_hrbp == 2 ): ?>
				    				<span class="bs-label label-default">
				    					<strong><em>Approval HRBP</em></strong>
				    				</span>
				    			<?php elseif( $data->approval_GH == 0 ): ?>
				    				<span class="bs-label label-default">
				    					<strong><em>Approval GH</em></strong>
				    				</span>
				    			<?php elseif( $data->approval_GH == 2 ): ?>
				    				<span class="bs-label label-default">
				    					<strong><em>Approval GH</em></strong>
				    				</span>
				    			<?php elseif( $data->approval_chief == 0 ): ?>
				    				<span class="bs-label label-default">
				    					<strong><em>Approval Chief</em></strong>
				    				</span>
				    			<?php elseif( $data->approval_chief == 2 ): ?>
				    				<span class="bs-label label-default">
				    					<strong><em>Approval Chief</em></strong>
				    				</span>
				    			<?php elseif( $data->approval_hrbp == 1 && 
				    					$data->approval_GH == 1 && 
				    					$data->approval_chief == 1 && 
				    					$data->hiring_briefs->date_schedule == NULL  ): ?>
				    				<a href="<?php echo e(route('create.brief',$data->id)); ?>" type="button" class="bs-label label-info">
				    					<span><strong>Schedule hiring brief</strong></span>
				    				</a>
				    			<?php elseif( $data->approval_hrbp == 1 && 
				    					$data->approval_GH == 1 && 
				    					$data->approval_chief == 1 &&
				    					$data->hiring_briefs->approval_hiring_by_hrbp == 0 ): ?>
				    				<span class="bs-label label-default">
										<strong><em>approval hiring brief</em></strong>
									</span>
								<?php elseif( $data->approval_hrbp == 1 && 
				    					$data->approval_GH == 1 && 
				    					$data->approval_chief == 1 &&
				    					$data->hiring_briefs->approval_hiring_by_hrbp == 1 ): ?>

				    				<!-- cek HRTA udah upload kandidat atau blm -->
				    				<?php if(isset( $data->hiring_briefs->CV->created_at )): ?>
				    					<!-- jika sudah selesai wktu SLA feedback progress langsung ke interview -->
					    				<?php if( $data->hiring_briefs->CV->created_at->addDays(2) == \Carbon\Carbon::now() ): ?>
					    					<a href="#" type="button" class="bs-label label-info">
						    					<span><strong>interview process</strong></span>
						    				</a>
					    				<?php else: ?>
					    				<!-- sourcing candadate -->
						    				<a href="<?php echo e(route('upload',$data->hiring_briefs->id)); ?>" class="btn btn-xs bs-label label-info">
						    					<strong>sourcing candidate</strong>
						                        <span class="bs-badge badge-absolute float-right badge-danger">
				                        	    	<?php
						                        		/* cek kandidat yang belum di feedback */
						                        		$cv = \App\Models\CV::where([
						                        				['hiring_brief_id',$data->hiring_briefs->id],
						                        				['approval_candidate','!=','0']
						                        			])
						                        			->count();
						                        	?>
						                        	<?php if( $cv > 0 ): ?>
						                        		<?php echo e($cv); ?>

						                        	<?php endif; ?>
				                        	    </span>
						    				</a>
					    				<?php endif; ?>
				    				<?php else: ?>
				    					<!-- harus upload kandidat -->
				    					<a href="<?php echo e(route('upload',$data->hiring_briefs->id)); ?>" class="btn btn-xs bs-label label-info">
				    						<strong>sourcing candidate</strong>
				    					</a>
				    				<?php endif; ?>
				    			<?php elseif( $data->approval_hrbp == 1 && 
				    					$data->approval_GH == 1 && 
					    				$data->approval_chief == 1 && 
					    				$data->hiring_briefs->approval_hiring_by_hrbp == 2 ): ?>
					    				
					    				<!-- action ketika approval hiring brief by HRBP reject -->
					    				<a href="#" class="btn btn-xs bs-label label-danger">
					    					<strong>Reason (coding)</strong>
					    				</a>
				    			<?php elseif( $data->approval_hrbp == 1 && 
										$data->approval_GH == 1 && 
										$data->approval_chief == 1 && 
										$data->hiring_briefs->date_schedule == Carbon\Carbon::now()->toDateString() || 
										Carbon\Carbon::now()->toDateString() > $data->hiring_briefs->date_schedule ): ?>
				    				<a href="<?php echo e(route('input.brief',$data->id)); ?>" type="button" class="bs-label label-info">
				    					<span><strong>input hiring brief</strong></span>
				    				</a>
				    			<?php elseif( $data->approval_hrbp == 1 && 
				    					$data->approval_GH == 1 && 
				    					$data->approval_chief == 1 && 
				    					$data->hiring_briefs->date_schedule != Carbon\Carbon::now()->toDateString() ): ?>
									<span class="bs-label label-default">
										<strong><em>brief schedule</em></strong>
									</span>
				    			<?php endif; ?>
			    			<?php elseif( $data->user->grade == 8 ): ?>
			    			
			    				<?php if( $data->approval_hrbp == 0 ): ?>
				    				<span class="bs-label label-default">
				    					<strong><em>Approval HRBP</em></strong>
				    				</span>
				    			<?php elseif( $data->approval_hrbp == 2 ): ?>
				    				<span class="bs-label label-default">
				    					<strong><em>Approval HRBP</em></strong>
				    				</span>
				    			<?php elseif( $data->approval_chief == 0 ): ?>
				    				<span class="bs-label label-default">
				    					<strong><em>Approval CxO</em></strong>
				    				</span>
				    			<?php elseif( $data->approval_chief == 2 ): ?>
				    				<span class="bs-label label-default">
				    					<strong><em>Approval CxO</em></strong>
				    				</span>
				    			<?php elseif( $data->approval_chro == 0 ): ?>
				    				<span class="bs-label label-default">
				    					<strong>A<em>pproval CHRO</em></strong>
				    				</span>
				    			<?php elseif( $data->approval_chro == 2 ): ?>
				    				<span class="bs-label label-default">
				    					<strong>A<em>pproval CHRO</em></strong>
				    				</span>
				    			<?php elseif( $data->approval_hrbp == 1 && $data->approval_chief == 1 && $data->approval_chro == 1 ): ?>
				    				<a href="<?php echo e(route('hiring_brief')); ?>" type="button" class="bs-label label-info"><span><strong>Hiring Brief</strong></span></a>
				    			<?php endif; ?>
			    			<?php endif; ?>
			    		</td>
			    		<td class="text-center"><?php echo e($data->ticket_erf_details->directorates->directorate_name); ?></td>
			    		<td class="text-center">
			    			<!-- KOLOM GRADE -->
			    			<?php echo e($data->position_grade); ?>

			    		</td>
			    		<td class="text-center">
			    			<!-- KOLOM CREATED_BY -->
			    			<?php echo e($data->user->name); ?>

			    		</td>
			    		<td class="text-center">
			    			<!-- KOLOM RECRUITER -->
			    			<?php if( $data->user->grade == 7 ): ?>
			    				
			    				MONA BINILANG
			    			<?php elseif( $data->user->grade == 8 ): ?>
			    				<?php if( $data->approval_hrbp == 1 && $data->approval_chief == 1 && $data->approval_chro == 1 ): ?>
				    				<a href="#modal_recruiter<?php echo e($data->id); ?>" data-toggle="modal" type="button" class="bs-label label-primary btn_recruiter"
				    				data-recruiter="<?php echo e($data->recruiter ==  '' ? 'NULL' : $data->recruiter); ?>">
				    					<span><strong>Select Recruiter</strong></span>
				    				</a>
			    				<?php else: ?>
			    				-
			    				<?php endif; ?>
			    			<?php endif; ?>
			    		</td>
			    		<td class="text-center">
			    			<?php if(isset( $data->hiring_briefs )): ?>
			    				<?php
			    					$buat = $data->hiring_briefs->created_at;
			    					$now = Carbon\Carbon::now();
			    					$total = $now->diffInDays($buat)
			    				?>
			    			    <span class="bs-label label-success"><strong><?php echo e($total); ?> Days</strong></span>
			    			<?php else: ?>
			    				-
			    			<?php endif; ?>
			    		</td>
			    		
				    <?php endif; ?>
					</tr>
			    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
			    	<td valign="top" colspan="9" class="dataTables_empty">No data available in table</td>
			    	<td id="hidden"></td>
			    	<td id="hidden"></td>
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

<!-- Modal freeze -->
<div class="modal fade" tabindex="1" id="modal_freeze" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Freeze Ticket</h4>
            </div>
            <form role="form" method="post" class="form-horizontal" id="form_modal_freeze" autocomplete="off">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>
            	<div class="modal-body">
                	<div class="form-group">
                        <label for="position_name" class="col-sm-2 control-label">Reason <span style="color: red"> *</span></label>
                        <div class="col-sm-9">
                            <textarea class="form-control" cols="51" rows="12" name="reason_freeze" required></textarea>
                        </div>
                    </div>
	            </div>
	            <div class="modal-footer">
	                <button type="submit" class="btn btn-success">Yes, freeze it</button>
	                <button type="button" class="btn btn-danger" data-dismiss="modal">No, cancel</button>
	            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal unfreeze -->
<div class="modal fade" tabindex="1" id="modal_unfreeze" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Unfreeze Ticket</h4>
            </div>
            <form role="form" method="post" class="form-horizontal" id="form_modal_unfreeze">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>
            	<div class="modal-body">
                    <p class="text-center"><strong>Are you sure want to Unfreeze Ticket ?</strong></p>
	            </div>
	            <div class="modal-footer">
	                <button type="submit" class="btn btn-success">Yes, unfreeze it</button>
	                <button type="button" class="btn btn-danger" data-dismiss="modal">No, cancel</button>
	            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Reecruiter -->
<?php $__currentLoopData = $modal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" tabindex="1" id="modal_recruiter<?php echo e($modal->id); ?>" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Choose Recruiter</h4>
            </div>
            <form action="<?php echo e(route('updateRecruiter',$modal->id)); ?>" role="form" method="post" class="form-horizontal" id="form_modal_recruiter">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>
            	<div class="modal-body" style="padding-left: 20%; padding-right: 20%; ">
            		<div class="form-group">
            			<div class="col-md-12">
            				<select id="recruiter" class="form-control recruiter" multiple="multiple" name="recruiter[]" style="width: 100%" placeholder="Select Recruiter" >
			    				<option value="MONA BINILING">MONA BINILING</option>
			    				<option value="GENNY">GENNY</option>
			    				<option value="DENNY">DENNY</option>
			    			</select>	
            			</div>
            		</div>
	            </div>
	            <div class="modal-footer">
	                <button type="submit" class="btn btn-success">Yes, select it</button>
	                <button type="button" class="btn btn-danger" data-dismiss="modal">No, cancel</button>
	            </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>