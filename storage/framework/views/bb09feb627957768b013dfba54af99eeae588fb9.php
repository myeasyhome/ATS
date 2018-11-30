<?php $__env->startSection('title','Permission Denied'); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('assets/widgets/wow/wow.js')); ?>"></script>
    <script type="text/javascript">
        /* WOW animations */

        wow = new WOW({
            animateClass: 'animated',
            offset: 100
        });
        wow.init();
    </script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <img src="<?php echo e(asset('assets/image-resources/blurred-bg/blurred-bg-7.jpg')); ?>" class="login-img wow fadeIn">

    <div class="center-vertical">
        <div class="center-content row">

            <div class="col-md-6 center-margin">
                <div class="server-message wow bounceInDown inverse">
                    <h1>Error !!</h1>
                    <h2>Permission Denied</h2>
                    <p>The page you are looking for is not accessible because you have no right to access this page.</p>
    
                    <div class="mrg25B mrg10T">
                        <a href="<?php echo e(url()->previous()); ?>" class="btn btn-lg btn-success">Return to previous page</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>