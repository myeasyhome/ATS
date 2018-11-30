<?php $__env->startSection('title','Create Schedule'); ?>

<?php $__env->startSection('js'); ?>
<!-- Datepicker bootstrap -->
<script>
    $(function() { 
        $('.date').datepicker({
            format: 'dd-mm-yyyy',
            autoclose : true,
            todayHighlight : true,
            startDate: new Date()
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

<!-- select 2 -->
<script src="<?php echo e(asset('assets/select2/select2.js')); ?>"></script>
<script>
	$(document).ready( function() {
		$('.int-user').select2({
			placeholder: "Select Interviewer User",
			theme: "bootstrap",
		});

		$('.int-hrbp').select2({
			placeholder: "Select Interviewer HR Business Partner",
			theme: "bootstrap",
		});
	});
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<ol class="breadcrumb">
    <li>
        <a href="<?php echo e(route('hiring_brief')); ?>">Hiring Brief</a>
    </li>
    <li>
    	<span>Create Schedule</span>
    </li>
</ol>

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
			        				<label class="col-md-3 control-label">Job Title </label>
			        				<div class="col-md-8">
			        					<h4 class="control-label pull-left"><em><?php echo e($data->position_name); ?></em></h4>
			        				</div>
			        			</div>

			        			<div class="form-group">
			        				<label class="col-md-3 control-label">Grade </label>
			        				<div class="col-md-2">
			        					<h4 class="control-label pull-left"><em><?php echo e($data->position_grade); ?></em></h4>
			        				</div>
			        			</div>

			        			<div class="form-group">
			        				<label class="col-md-3 control-label">Department </label>
			        				<div class="col-md-8">
			        					<h4 class="control-label pull-left"><em><?php echo e($data->ticket_erf_details->departments->department_name); ?></em></h4>
			        				</div>
			        			</div>

			        			<div class="form-group">
			        				<label class="col-md-3 control-label">Schedule</label>
		                            <div class="col-md-3">
		                            	<div class="input-group date">
			                            	<span class="add-on input-group-addon" id="date">
		                                        <i class="glyph-icon icon-calendar"></i>
		                                    </span>	
										    <input type="text" name="date" id="date" class="form-control" required>
										</div>
		                            </div>

		                            <div class="col-md-3">
		                                <div class="input-group">
		                                	<span class="add-on input-group-addon">
		                                        <i class="glyph-icon icon-clock-o"></i>
		                                    </span>
		                                    <input class="timepicker form-control" type="text" name="time" required>
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
			        				<div class="col-md-6">
			        					<select class="form-control int-user" name="interview_user" required title="Select Interviewer User" style="width: 100%">
			                                <option></option>
			                                <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			                                  <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
			                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			                            </select>
			        				</div>
			        			</div>

			        			<div class="form-group">
			        				<label class="col-md-3 control-label">Interviewer HR Business Partner</label>
			        				<div class="col-md-6">
			        					<select class="form-control int-hrbp" name="interview_hrbp" required title="Select Interviewer HR Business Partner" style="width: 100%">
			                                <option></option>
			                                <?php $__currentLoopData = $HRBP; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $HRBP): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			                                  <option value="<?php echo e($HRBP->id); ?>"><?php echo e($HRBP->name); ?></option>
			                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			                            </select>
			        				</div>
			        			</div>
			        		</div>
			        	</div>
			        	<br>

		        		<div class="col-md-12">
		        			<div class="form-group text-center">
		        				<button type="submit" class="btn btn-info">Create</button>	
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