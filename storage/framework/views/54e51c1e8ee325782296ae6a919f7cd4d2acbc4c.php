<?php $__env->startSection('title','Result Hiring Brief'); ?>

<?php $__env->startSection('js'); ?>
<!-- Ckeditor -->
<script type="text/javascript" src="<?php echo e(asset('assets/widgets/ckeditor/ckeditor.js')); ?>"></script>
<script>
   var config = {
			// Define the toolbar groups as it is a more accessible solution.
			toolbarGroups: [
				{"name":"basicstyles","groups":["basicstyles"]},
				{"name":"paragraph","groups":["list","blocks"]},
				{"name":"styles","groups":["styles"]}
			],
			// Remove the redundant buttons from toolbar groups defined above.
			removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
		},
	config = CKEDITOR.tools.prototypedCopy(config);
  	CKEDITOR.replace('job_function', config);
	CKEDITOR.replace('general_information', config);
	CKEDITOR.replace('characteristics', config);
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<h2>Input Result of Brief</h2>
<br />
<div style="color: tomato;">
	<p></p>
</div>

<div class="row">
    <div class="col-md-12">
	    <div class="panel panel-default">

	        <div class="panel-body">
		        <div class="example-box-wrapper">

		        	<form role="form" action="<?php echo e(route('store.input.brief',$data->hiring_briefs->id)); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
			        <?php echo csrf_field(); ?>
			        <?php echo method_field('PATCH'); ?>

			        	<div class="row" style="padding-top: 40px;">
			        		<div class="col-md-12">
			        			<div class="form-group">
			        				<label class="col-md-2 control-label" style="padding-left: 20px;">Job Function</label>
			        				<div class="col-md-8">
			        					<textarea class="form-control" rows="10" name="job_function" id="job_function"><?php echo e($data->hiring_briefs->job_function); ?></textarea>
			        				</div>
			        			</div>
			        		</div>

			        		<div class="col-md-12">
			        			<div class="form-group">
			        				<label class="col-md-2 control-label" style="padding-left: 20px;">General Information</label>
			        				<div class="col-md-8">
			        					<textarea class="form-control" rows="10" name="general_information" id="general_information"><?php echo e($data->hiring_briefs->general_information); ?></textarea>
			        				</div>
			        			</div>
			        		</div>

			        		<div class="col-md-12">
			        			<div class="form-group">
			        				<label class="col-md-2 control-label" style="padding-left: 20px;">Characteristics</label>
			        				<div class="col-md-8">
			        					<textarea class="form-control" rows="10" name="characteristics" id="characteristics"><?php echo e($data->hiring_briefs->characteristic); ?></textarea>
			        				</div>
			        			</div>
			        		</div>

			        		<div class="col-md-12">
			        			<div class="form-group text-center">
			        				<button type="submit" class="btn btn-primary">Input</button>	
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