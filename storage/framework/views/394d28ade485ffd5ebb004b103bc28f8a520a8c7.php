<!DOCTYPE html> 
<html lang="en">
<head>

    <style>
        /* Loading Spinner */
        .spinner{margin:0;width:70px;height:18px;margin:-35px 0 0 -9px;position:absolute;top:50%;left:50%;text-align:center}.spinner > div{width:18px;height:18px;background-color:#333;border-radius:100%;display:inline-block;-webkit-animation:bouncedelay 1.4s infinite ease-in-out;animation:bouncedelay 1.4s infinite ease-in-out;-webkit-animation-fill-mode:both;animation-fill-mode:both}.spinner .bounce1{-webkit-animation-delay:-.32s;animation-delay:-.32s}.spinner .bounce2{-webkit-animation-delay:-.16s;animation-delay:-.16s}@-webkit-keyframes bouncedelay{0%,80%,100%{-webkit-transform:scale(0.0)}40%{-webkit-transform:scale(1.0)}}@keyframes  bouncedelay{0%,80%,100%{transform:scale(0.0);-webkit-transform:scale(0.0)}40%{transform:scale(1.0);-webkit-transform:scale(1.0)}}
    
        @font-face {
            font-family: 'ooredoo'; /*a name to be used later*/
            src: url('<?php echo e(asset('assets/fonts/Ooredoo-Heavy2.otf')); ?>');
        }
      
    </style>


<meta charset="UTF-8">
<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
<title> TRACKER </title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<!-- Favicons -->

<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo e(asset('assets/images/icons/apple-touch-icon-144-precomposed.png')); ?>">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo e(asset('assets/images/icons/apple-touch-icon-114-precomposed.png')); ?>">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo e(asset('assets/images/icons/apple-touch-icon-72-precomposed.png')); ?>">
<link rel="apple-touch-icon-precomposed" href="<?php echo e(asset('assets/images/icons/apple-touch-icon-57-precomposed.png')); ?>">
<link rel="shortcut icon" href="<?php echo e(asset('assets/images/icons/favicon.png')); ?>">

<!-- Bootstrap -->
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
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/datepicker/datepicker.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/widgets/datepicker-ui/datepicker.css')); ?>">
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
<script type="text/javascript" src="<?php echo e(asset('assets/js-init/chartjs/dist/Chart.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/js-init/chartjs/samples/utils.js')); ?>"></script>

<script type="text/javascript">
    $(window).load(function(){
        setTimeout(function() {
            $('#loading').fadeOut( 400, "linear" );
        }, 300);
    });
</script>

</head>


<body class="fixed-header fixed-sidebar" >
    <div id="sb-site">
    <div class="sb-slidebar bg-black sb-left sb-style-overlay">
    <div class="scrollable-content scrollable-slim-sidebar">
        
    </div>
</div>

<div class="sb-slidebar bg-black sb-right sb-style-overlay">
<div class="scrollable-content scrollable-slim-sidebar">
<div class="pad15A">








</div>
</div>
</div>

<!-- loading -->
<div id="loading">
    <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>

<div id="page-wrapper">
    <div id="page-header" class="bg-gradient-5">
        <div id="mobile-navigation">
            <button id="nav-toggle" class="collapsed" data-toggle="collapse" data-target="#page-sidebar"><span></span></button>
            <a href="index.html" class="logo-content-small" title="MonarchUI"></a>
        </div>
        <div id="header-logo" class="logo-bg" style="padding-top: 30px; font-family: ooredoo; background: #002a80;">
            <a href="#"  title="ATS" style="color: #ffffff;font-family: 'ooredoo';">
    <!-- <img src="<?php //echo base_url("assets/images/logoneo.png");?>" style="width: 100%; height: 78px;" />-->
                <span style="color: red;">A</span>pplicant <span style="color: red;">T</span>racking <span style="color: red;">S</span>ystem
            </a>
            <a href="#" class="logo-content-small" title="MonarchUI">
                NEO <i>ADMIN</i>
                <span>The perfect solution for user interfaces</span>
            </a>
            <a id="close-sidebar" href="#" title="Close sidebar">
                <i class="glyph-icon icon-angle-left"></i>
            </a>
        </div>

     <!-- Header left -->       
    <div id="header-nav-left">
        <div class="user-account-btn dropdown">
            <a href="#" title="My Account" class="user-profile clearfix" data-toggle="dropdown">
                <img width="28" src="<?php echo e(asset('assets/image-resources/gravatar.jpg')); ?>" alt="Profile image">
                <span><?php echo e(Auth::user()->nama); ?></span>
                <i class="glyph-icon icon-angle-down"></i>
            </a>
            <div class="dropdown-menu float-left">
                <div class="box-sm">
                    <div class="login-box clearfix">
                        <div class="user-img">
                            <a href="#" title="" class="change-img">Change photo</a>
                            <img src="<?php echo e(asset('assets/image-resources/gravatar.jpg')); ?>" alt="">
                        </div>
                        <div class="user-info">
                            <span style="color:#000000;">
                                <?php echo e(Auth::user()->nama); ?>

                                <i><?php echo e(Auth::user()->roles->nama_role); ?></i>
                            </span>
                            <a href="#" title="Edit profile">Edit profile</a>
                            <a href="#" title="View notifications">View notifications</a>
                        </div>
                    </div>
                    
                    <div class="pad5A button-pane button-pane-alt text-center">
                        <a href="<?php echo e(route('logout')); ?>" class="btn display-block font-normal btn-danger">
                            <i class="glyph-icon icon-power-off"></i>
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- #header-nav-left -->

    <div id="header-nav-right"> 
    </div><!-- #header-nav-right -->

    </div>

    <!-- Sidebar -->
    <div id="page-sidebar" class="bg-gradient-8 font-inverse">
        <div class="scroll-sidebar">
            <ul id="sidebar-menu">
            <!-- Line Manager 1 -->
            <?php if( Auth::user()->role_id == 1 ): ?>
                <li class="header"><span>Process</span></li>

                <li>
                    <a href="<?php echo e(route('ticket')); ?>" title="You Ticket List">
                        <i class="glyph-icon icon-linecons-doc"></i>
                        <span>Ticket</span>
                    </a>
                </li>
                <li class="divider"></li>
                
                <li>
                    <a href="<?php echo e(route('create.ticket')); ?>" title="Create New Ticket">
                        <i class="glyph-icon icon-plus"></i>
                        <span>Create Ticket</span>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="" title="Create New Ticket">
                        <i class="glyph-icon icon-coffee"></i>
                        <span>Interview Schedule</span>
                    </a>
                </li>
                <li class="divider"></li>
            <?php endif; ?>

            <?php if( Auth::user()->role_id == 4 ): ?>
                <li class="header"><span>Overview</span></li>
                <li>
                    <a href="" title="Admin Dashboard">
                        <i class="glyph-icon icon-linecons-tv"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="" title="Applicant">
                        <i class="glyph-icon icon-linecons-tv"></i>
                        <span>Applicant</span>
                    </a>
                </li>

                <li class="header"><span>Process</span></li>

                <li class="divider"></li>
                <li class="no-menu">
                    <a href="" title="Frontend template">
                        <i class="glyph-icon icon-adjust"></i>
                        <span>Hiring Brief</span>
                    </a>
                </li>
                <li class="divider"></li>
                <li class="no-menu">
                    <a href="" title="Frontend template">
                        <i class="glyph-icon icon-leaf"></i>
                        <span>CV & Sourcing</span>
                    </a>
                </li>
                <li class="divider"></li>
                <li class="no-menu">
                    <a href="" title="Frontend template">
                        <i class="glyph-icon icon-slideshare"></i>
                        <span>Interview Process</span>
                    </a>
                </li>
                <li class="divider"></li>
                <li class="no-menu">
                    <a href="" title="Frontend template">
                        <i class="glyph-icon icon-tags"></i>
                        <span>Final Process</span>
                    </a>
                </li>

                <li class="header"><span>Configure</span></li>
                <li>
                    <a href="" title="Admin Dashboard">
                        <i class="glyph-icon icon-gears"></i>
                        <span>SLA Setting</span>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="" title="Admin Dashboard">
                        <i class="glyph-icon icon-gears"></i>
                        <span>User Management</span>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="" title="Admin Dashboard">
                        <i class="glyph-icon icon-gears"></i>
                        <span>References</span>
                    </a>
                </li>
                <li class="divider"></li>
            <?php endif; ?>

            <!-- HR Bussiness Partner -->
            <?php if( Auth::user()->role_id ==3 ): ?>
                <li class="header"><span>Process</span></li>
                
                <li>
                    <a href="<?php echo e(route('ticket.approval')); ?>" title="Ticket Approval">
                        <i class="glyph-icon icon-key"></i>
                        <span>Approval Ticket</span>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="" title="Ticket Approval">
                        <i class="glyph-icon icon-key"></i>
                        <span>Approval List</span>
                    </a>
                </li>
                <li class="divider"></li>
            <?php endif; ?>

            </ul>
        <!-- #sidebar-menu -->    
        </div>
    </div>

    <!-- Body Content -->
    <div id="page-content-wrapper">
        <div id="page-content">
            <div class="container">
                <div id="page-title" style="font-family: 'ooredoo';">
                    <div id="theme-options" class="admin-options">

                    </div>
                </div>
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>

</div>


<script type="text/javascript" src="<?php echo e(asset('assets/bootstrap/js/bootstrap.js')); ?>"></script>

<!-- Bootstrap Dropdown -->
<!-- <script type="text/javascript" src="widgets/dropdown/dropdown.js"></script> -->

<!-- Bootstrap Tooltip -->
<!-- <script type="text/javascript" src="widgets/tooltip/tooltip.js"></script> -->

<!-- Bootstrap Popover -->
<!-- <script type="text/javascript" src="widgets/popover/popover.js"></script> -->

<!-- Bootstrap Progress Bar -->
<script type="text/javascript" src="<?php echo e(asset('assets/widgets/progressbar/progressbar.js')); ?>"></script>

<!-- Bootstrap Buttons -->

<!-- <script type="text/javascript" src="widgets/button/button.js"></script> -->

<!-- Bootstrap Collapse -->

<!-- <script type="text/javascript" src="widgets/collapse/collapse.js"></script> -->

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

<?php echo $__env->yieldContent('js'); ?>
<?php echo $__env->yieldSection(); ?>

</div>
</body>
</html>