<!DOCTYPE html>
<html lang="en">
<head>
<style>
    /* Loading Spinner */
    .spinner{margin:0;width:70px;height:18px;margin:-35px 0 0 -9px;position:absolute;top:50%;left:50%;text-align:center}.spinner > div{width:18px;height:18px;background-color:#333;border-radius:100%;display:inline-block;-webkit-animation:bouncedelay 1.4s infinite ease-in-out;animation:bouncedelay 1.4s infinite ease-in-out;-webkit-animation-fill-mode:both;animation-fill-mode:both}.spinner .bounce1{-webkit-animation-delay:-.32s;animation-delay:-.32s}.spinner .bounce2{-webkit-animation-delay:-.16s;animation-delay:-.16s}@-webkit-keyframes bouncedelay{0%,80%,100%{-webkit-transform:scale(0.0)}40%{-webkit-transform:scale(1.0)}}@keyframes  bouncedelay{0%,80%,100%{transform:scale(0.0);-webkit-transform:scale(0.0)}40%{transform:scale(1.0);-webkit-transform:scale(1.0)}}
</style>
<meta charset="UTF-8">
<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
<title> Applicant Tracking System (ATS) </title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<!-- Favicons -->

<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo e(asset('assets/images/icons/apple-touch-icon-144-precomposed.png')); ?>">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo e(asset('assets/images/icons/apple-touch-icon-114-precomposed.png')); ?>">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo e(asset('assets/images/icons/apple-touch-icon-72-precomposed.png')); ?>">
<link rel="apple-touch-icon-precomposed" href="<?php echo e(asset('assets/images/icons/apple-touch-icon-57-precomposed.png')); ?>">
<link rel="shortcut icon" href="<?php echo e(asset('assets/images/icons/favicon.png')); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/bootstrap/css/bootstrap.css')); ?>">


<!-- HELPERS -->

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/helpers/animate.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/helpers/backgrounds.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/helpers/boilerplate.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/helpers/border-radius.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/helpers/grid.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/helpers/page-transitions.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/helpers/spacing.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/helpers/typography.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/helpers/utils.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/helpers/colors.css')); ?>">

<!-- ELEMENTS -->

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/elements/badges.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/elements/buttons.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/elements/content-box.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/elements/dashboard-box.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/elements/forms.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/elements/images.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/elements/info-box.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/elements/invoice.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/elements/loading-indicators.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/elements/menus.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/elements/panel-box.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/elements/response-messages.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/elements/responsive-tables.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/elements/ribbon.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/elements/social-box.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/elements/tables.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/elements/tile-box.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/elements/timeline.css')); ?>">



<!-- ICONS -->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/icons/fontawesome/fontawesome.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/icons/linecons/linecons.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/icons/spinnericon/spinnericon.css')); ?>">


<!-- WIDGETS -->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/accordion-ui/accordion.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/calendar/calendar.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/carousel/carousel.css')); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/charts/justgage/justgage.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/charts/morris/morris.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/charts/piegage/piegage.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/charts/xcharts/xcharts.css')); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/chosen/chosen.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/colorpicker/colorpicker.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/datatable/datatable.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/daterangepicker/daterangepicker.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/dialog/dialog.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/dropdown/dropdown.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/dropzone/dropzone.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/file-input/fileinput.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/input-switch/inputswitch.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/input-switch/inputswitch-alt.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/ionrangeslider/ionrangeslider.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/jcrop/jcrop.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/jgrowl-notifications/jgrowl.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/loading-bar/loadingbar.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/maps/vector-maps/vectormaps.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/markdown/markdown.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/modal/modal.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/multi-select/multiselect.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/multi-upload/fileupload.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/nestable/nestable.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/noty-notifications/noty.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/popover/popover.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/pretty-photo/prettyphoto.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/progressbar/progressbar.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/range-slider/rangeslider.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/slidebars/slidebars.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/slider-ui/slider.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/summernote-wysiwyg/summernote-wysiwyg.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/tabs-ui/tabs.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/theme-switcher/themeswitcher.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/timepicker/timepicker.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/tocify/tocify.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/tooltip/tooltip.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/touchspin/touchspin.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/uniform/uniform.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/wizard/wizard.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/xeditable/xeditable.css')); ?>">

<!-- SNIPPETS -->

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/snippets/chat.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/snippets/files-box.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/snippets/login-box.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/snippets/notification-box.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/snippets/progress-box.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/snippets/todo.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/snippets/user-profile.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/snippets/mobile-navigation.css')); ?>">

<!-- APPLICATIONS -->

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/applications/mailbox.css')); ?>">

<!-- Admin theme -->

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/themes/admin/layout.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/themes/admin/color-schemes/default.css')); ?>">

<!-- Components theme -->

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/themes/components/default.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/themes/components/border-radius.css')); ?>">

<!-- Admin responsive -->

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/helpers/responsive-elements.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/helpers/admin-responsive.css')); ?>">

<!-- JS Core -->

<script type="text/javascript" src="<?php echo e(asset('assets/js-core/jquery-core.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/js-core/jquery-ui-core.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/js-core/jquery-ui-widget.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/js-core/jquery-ui-mouse.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/js-core/jquery-ui-position.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/js-core/modernizr.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/js-core/jquery-cookie.js')); ?>"></script>

<script type="text/javascript">
    $(window).load(function(){
        setTimeout(function() {
            $('#loading').fadeOut( 400, "linear" );
        }, 300);
    });
</script>

</head>

<body>
<div id="loading">
    <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>

<style type="text/css">

    html,body {
        height: 100%;
        background: #fff;
        overflow: hidden;
    }

</style>


<script type="text/javascript" src="<?php echo e(asset('assets/widgets/wow/wow.js')); ?>"></script>
<script type="text/javascript">
    /* WOW animations */

    wow = new WOW({
        animateClass: 'animated',
        offset: 100
    });
    wow.init();
</script>


<img src="<?php echo e(asset('assets/image-resources/blurred-bg/blurred-bg-3.jpg')); ?>" class="login-img wow fadeIn" alt="">

<div class="center-vertical">
    <div class="center-content row">
        <div class="col-md-3 center-margin">

            <form method="post" action="<?php echo e(route('login')); ?>" enctype="multipart/form-data" >
            <?php echo csrf_field(); ?>
                <div class="content-box wow bounceInDown modal-content">
                    <h3 class="content-box-header content-box-header-alt bg-default">
                        <span class="icon-separator">
                            <i class="glyph-icon icon-cog"></i>
                        </span>
                        <span class="header-wrapper">
                            Applicant Tracking System
                            <small>Login to your account.</small>
                        </span>
                        <span class="header-buttons">
<!--                            <a href="#" class="btn btn-sm btn-primary" title="">Sign Up</a>-->
                        </span>
                    </h3>
                    <div class="content-box-wrapper">
                    <?php if(session('error')): ?>
                        <div class="alert alert-danger" role="alert">
                            <span><?php echo e(session('error')); ?></span>
                        </div>
                    <?php endif; ?>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" name="nik" class="form-control" id="exampleInputEmail1" placeholder="NIK" required>
                                <span class="input-group-addon bg-blue">
                                    <i class="glyph-icon icon-user"></i>
                                </span>
                            </div>
                            <?php if($errors->has('nik')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red;"><?php echo e($errors->first('nik')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                                <span class="input-group-addon bg-blue">
                                    <i class="glyph-icon icon-unlock-alt"></i>
                                </span>
                            </div>
                            <?php if($errors->has('password')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red;"><?php echo e($errors->first('password')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                        
                        <button class="btn btn-success btn-block">Sign In</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>


<!-- WIDGETS -->
<script type="text/javascript" src="<?php echo e(asset('assets/bootstrap/js/bootstrap.js')); ?>"></script>
<!-- Bootstrap Progress Bar -->
<script type="text/javascript" src="<?php echo e(asset('assets/widgets/progressbar/progressbar.js')); ?>"></script>

<!-- Superclick -->

<script type="text/javascript" src="<?php echo e(asset('assets/widgets/superclick/superclick.js')); ?>"></script>

<!-- Input switch alternate -->

<script type="text/javascript" src="<?php echo e(asset('assets/widgets/input-switch/inputswitch-alt.js')); ?>"></script>

<!-- Slim scroll -->

<script type="text/javascript" src="<?php echo e(asset('assets/widgets/slimscroll/slimscroll.js')); ?>"></script>

<!-- Slidebars -->

<script type="text/javascript" src="<?php echo e(asset('assets/widgets/slidebars/slidebars.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/widgets/slidebars/slidebars-demo.js')); ?>"></script>

<!-- PieGage -->

<script type="text/javascript" src="<?php echo e(asset('assets/widgets/charts/piegage/piegage.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/widgets/charts/piegage/piegage-demo.js')); ?>"></script>

<!-- Screenfull -->

<script type="text/javascript" src="<?php echo e(asset('assets/widgets/screenfull/screenfull.js')); ?>"></script>

<!-- Content box -->

<script type="text/javascript" src="<?php echo e(asset('assets/widgets/content-box/contentbox.js')); ?>"></script>

<!-- Overlay -->

<script type="text/javascript" src="<?php echo e(asset('assets/widgets/overlay/overlay.js')); ?>"></script>

<!-- Widgets init for demo -->

<script type="text/javascript" src="<?php echo e(asset('assets/js-init/widgets-init.js')); ?>"></script>

<!-- Theme layout -->

<script type="text/javascript" src="<?php echo e(asset('assets/themes/admin/layout.js')); ?>"></script>

<!-- Theme switcher -->

<script type="text/javascript" src="<?php echo e(asset('assets/widgets/theme-switcher/themeswitcher.js')); ?>"></script>
</body>
</html>