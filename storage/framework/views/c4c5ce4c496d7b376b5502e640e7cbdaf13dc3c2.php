<?php $__env->startComponent('mail::message'); ?>
# New Request
There is a new request for <b><em><?php echo e($position); ?></em></b> that has been approved by Line Manager 2 and Hiring Business Partner. Please login and make a schedule ! 

<?php $__env->startComponent('mail::button', ['url' => env("APP_URL").'/login']); ?>
	Login
<?php echo $__env->renderComponent(); ?>


<?php echo $__env->renderComponent(); ?>

