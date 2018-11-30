<?php $__env->startComponent('mail::message'); ?>
# New Request
There is a new request for <b><em> TEST</em></b> from Line Manager, please login ! 

<?php $__env->startComponent('mail::button', ['url' => env("APP_URL").'/login']); ?>
	Login
<?php echo $__env->renderComponent(); ?>


<?php echo $__env->renderComponent(); ?>

