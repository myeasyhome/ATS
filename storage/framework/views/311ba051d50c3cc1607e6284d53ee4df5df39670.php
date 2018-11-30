<?php $__env->startComponent('mail::message'); ?>

Dear, 

We would like to invite you to attend Interview Session for <strong><?php echo e($interview['position']); ?></strong> , here the candidate : <br>

Candidate Name : <?php echo e($interview['candidate_name']); ?> <br>
Date : <?php echo e($interview['interview_date']); ?> <br>
Time : <?php echo e($interview['time_start']); ?> - <?php echo e($interview['time_end']); ?> <br>
Location : <?php echo e($interview['location']); ?> <br>

<?php $__env->startComponent('mail::button', ['url' => route('downloadCV',$interview['cv_id']) ]); ?>
	Download CV
<?php echo $__env->renderComponent(); ?>

Thank you,<br>

Regards,<br>
<?php echo e($interview['sender']); ?>

<?php echo $__env->renderComponent(); ?>