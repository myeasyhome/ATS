<?php $__env->startSection('title','Create Schedule'); ?>

<?php $__env->startSection('js'); ?>
<!-- Datepicker bootstrap -->
<script src="<?php echo e(asset('assets/widgets/datepicker/datepicker.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js">
</script>
<script>
    $(function() { 
        $('.bootstrap-datepicker').bsdatepicker({
            format: 'dd-mm-yyyy',
            autoClose: true,
        });
    });
</script>

<!-- Timepicker -->
<script src="<?php echo e(asset('assets/widgets/timepicker/timepicker.js')); ?>"></script>
<script type="text/javascript">
    /* Timepicker */
    $(function() {
        $('.timepicker').timepicker();
    });
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<h2>Create Schedule</h2>
<br />
<div style="color: tomato;">
	<p></p>
</div>

<div class="row">
    <div class="col-md-12">
	    <div class="panel panel-default">

	        <div class="panel-body">
		        <div class="example-box-wrapper">
		        	<form role="form" action="<?php echo e(route('schedule.brief',$data->hiring_briefs->id)); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
			        <?php echo csrf_field(); ?>
			        <?php echo method_field('PATCH'); ?>
			        	<div class="row">
			        		<div class="col-md-8">
			        			<div class="form-group">
			        				<label class="col-md-3 control-label">Job Title</label>
			        				<div class="col-md-8">
			        					<input type="text" name="" value="<?php echo e(ucwords($data->position_name)); ?>" class="form-control" disabled="true">
			        				</div>
			        			</div>

			        			<div class="form-group">
			        				<label class="col-md-3 control-label">Department</label>
			        				<div class="col-md-8">
			        					<input type="text" name="" value="<?php echo e($data->ticket_erf_details->departments->department_name); ?>" class="form-control" disabled="true">
			        				</div>
			        			</div>

			        			<div class="form-group">
			        				<label class="col-md-3 control-label">Date</label>
			        				<div class="col-md-3">
		                                <div class="input-prepend input-group">
		                                    <span class="add-on input-group-addon">
		                                        <i class="glyph-icon icon-calendar"></i>
		                                    </span>
		                                    <input type="text" name="date" id="datepicker" class="bootstrap-datepicker form-control" value="" required>
		                                </div>
		                            </div>

		                            <div class="col-md-3">
		                                <div class=" input-group">
		                                	<span class="add-on input-group-addon">
		                                        <i class="glyph-icon icon-clock-o"></i>
		                                    </span>
		                                    <input class="timepicker form-control" type="text" name="time">
		                                </div>
		                            </div>
		                            <div class="col-md-3">
		                                <div class="input-group">
		                                	<span class="add-on input-group-addon">
		                                        <i class="glyph-icon icon-institution"></i>
		                                    </span>
		                                    <input class="form-control" type="text" name="place">
		                                </div>
		                            </div>
			        			</div>

			        			<div class="form-group">
			        				<label class="col-md-3 control-label">Interviewer User</label>
			        				<div class="col-md-8">
			        					<input type="text" name="interview_user" class="form-control">
			        				</div>
			        			</div>

			        			<div class="form-group">
			        				<label class="col-md-3 control-label">Interviewer HRBP</label>
			        				<div class="col-md-8">
			        					<input type="text" name="interview_hrbp" class="form-control">
			        				</div>
			        			</div>
			        		</div>

			        		<div class="col-md-2">
			        			<div class="form-group">
			        				<label class="col-md-3 control-label">Grade</label>
			        				<div class="col-md-4">
			        					<input type="text" value="<?php echo e($data->position_grade); ?>" class="form-control text-center" disabled>
			        				</div>
			        			</div>
			        		</div>
			        	</div>
			        	<br><br>
			        	<div class="row">
			        		

			        		<div class="col-md-12">
			        			<div class="form-group text-center">
			        				<button type="submit" class="btn btn-primary">Create</button>	
			        			</div>
			        		</div>
			        	</div>

		            </form>	
		        </div>
	        </div>

	    </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>