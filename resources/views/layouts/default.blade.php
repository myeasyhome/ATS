<!DOCTYPE html> 
<html lang="en">
<head>

    <style>
        /* Loading Spinner */
        .spinner{margin:0;width:70px;height:18px;margin:-35px 0 0 -9px;position:absolute;top:50%;left:50%;text-align:center;}.spinner > div{width:18px;height:18px;background-color:#333;border-radius:100%;display:inline-block;-webkit-animation:bouncedelay 1.4s infinite ease-in-out;animation:bouncedelay 1.4s infinite ease-in-out;-webkit-animation-fill-mode:both;animation-fill-mode:both}.spinner .bounce1{-webkit-animation-delay:-.32s;animation-delay:-.32s}.spinner .bounce2{-webkit-animation-delay:-.16s;animation-delay:-.16s}@-webkit-keyframes bouncedelay{0%,80%,100%{-webkit-transform:scale(0.0)}40%{-webkit-transform:scale(1.0)}}@keyframes bouncedelay{0%,80%,100%{transform:scale(0.0);-webkit-transform:scale(0.0)}40%{transform:scale(1.0);-webkit-transform:scale(1.0)}}
    
        @font-face {
            font-family: 'ooredoo'; /*a name to be used later*/
            src: url('{{  asset('assets/fonts/Ooredoo-Heavy2.otf') }}');
        }

        .the-legend {
            border-style: none;
            border-width: 0;
            font-size: 14px;
            line-height: 20px;
            margin-bottom: 0;
            width: auto;
            padding: 0 10px;
            border: 1px solid #e0e0e0;
        }
        .the-fieldset {
            border: 1px solid #e0e0e0;
            padding: 10px;
        }


        /* jquery validate error */
        label.error, select.error {
            color: red;
            border-color: red;
        }
    </style>


<meta charset="UTF-8">
<title> @yield('title','Applicant Tracking System') </title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Favicons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('assets/images/icons/apple-touch-icon-144-precomposed.png') }}">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('assets/images/icons/apple-touch-icon-114-precomposed.png') }}">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('assets/images/icons/apple-touch-icon-72-precomposed.png') }}">
<link rel="apple-touch-icon-precomposed" href="{{ asset('assets/images/icons/apple-touch-icon-57-precomposed.png') }}">
<link rel="shortcut icon" href="{{ asset('assets/images/icons/favicon.png') }}">

<!-- Bootstrap -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/bootstrap/css/bootstrap.css') }}">

<!-- HELPERS -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/helpers/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/helpers/backgrounds.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/helpers/boilerplate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/helpers/border-radius.css') }}">
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/helpers/grid.css') }}"> --}}
<link rel="stylesheet" type="text/css" href="{{ asset('assets/helpers/page-transitions.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/helpers/spacing.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/helpers/typography.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/helpers/utils.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/helpers/colors.css') }}">

<!-- ELEMENTS -->

<link rel="stylesheet" type="text/css" href="{{ asset('assets/elements/badges.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/elements/buttons.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/elements/content-box.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/elements/dashboard-box.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/elements/forms.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/elements/images.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/elements/info-box.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/elements/invoice.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/elements/loading-indicators.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/elements/menus.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/elements/panel-box.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/elements/response-messages.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/elements/responsive-tables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/elements/ribbon.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/elements/social-box.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/elements/tables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/elements/tile-box.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/elements/timeline.css') }}">


<!-- ICONS -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/icons/iconic/iconic.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/icons/fontawesome/fontawesome.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/icons/linecons/linecons.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/icons/spinnericon/spinnericon.css') }}">


<!-- WIDGETS -->
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/widgets/accordion-ui/accordion.css') }}"> --}}
<link rel="stylesheet" type="text/css" href="{{ asset('assets/widgets/carousel/carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/widgets/charts/morris/morris.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/widgets/charts/piegage/piegage.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/widgets/charts/xcharts/xcharts.css') }}">

{{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/widgets/chosen/chosen.css') }}"> --}}
<link rel="stylesheet" type="text/css" href="{{ asset('assets/widgets/datatable/datatable.css') }}">

<!-- bootstrap datepicker -->
<link href="{{ asset('assets/widgets/datepicker/bootstrap-datepicker.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/widgets/daterangepicker/daterangepicker.css') }}">
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/widgets/dialog/dialog.css') }}"> --}}
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/widgets/dropdown/dropdown.css') }}"> --}}
<link rel="stylesheet" type="text/css" href="{{ asset('assets/widgets/dropzone/dropzone.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/widgets/file-input/fileinput.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/widgets/input-switch/inputswitch.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/widgets/input-switch/inputswitch-alt.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/widgets/ionrangeslider/ionrangeslider.css') }}">
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/widgets/jcrop/jcrop.css') }}"> --}}
<link rel="stylesheet" type="text/css" href="{{ asset('assets/widgets/jgrowl-notifications/jgrowl.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/widgets/loading-bar/loadingbar.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/widgets/maps/vector-maps/vectormaps.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/widgets/markdown/markdown.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/widgets/modal/modal.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/widgets/multi-select/multiselect.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/widgets/multi-upload/fileupload.css') }}">
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/widgets/nestable/nestable.css') }}"> --}}
<link rel="stylesheet" type="text/css" href="{{ asset('assets/widgets/noty-notifications/noty.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/widgets/popover/popover.css') }}">
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/widgets/pretty-photo/prettyphoto.css') }}"> --}}
<link rel="stylesheet" type="text/css" href="{{ asset('assets/widgets/progressbar/progressbar.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/widgets/range-slider/rangeslider.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/widgets/slidebars/slidebars.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/widgets/slider-ui/slider.css') }}">
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/widgets/summernote-wysiwyg/summernote-wysiwyg.css') }}"> --}}
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/widgets/tabs-ui/tabs.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/widgets/theme-switcher/themeswitcher.css') }}"> --}}
<link rel="stylesheet" type="text/css" href="{{ asset('assets/widgets/timepicker/timepicker.css') }}">
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/widgets/tocify/tocify.css') }}"> --}}
<link rel="stylesheet" type="text/css" href="{{ asset('assets/widgets/tooltip/tooltip.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/widgets/touchspin/touchspin.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/widgets/uniform/uniform.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/widgets/wizard/wizard.css') }}">
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/widgets/xeditable/xeditable.css') }}"> --}}

<!-- SNIPPETS -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/snippets/chat.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/snippets/files-box.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/snippets/login-box.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/snippets/notification-box.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/snippets/progress-box.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/snippets/todo.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/snippets/user-profile.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/snippets/mobile-navigation.css') }}">

<!-- APPLICATIONS -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/applications/mailbox.css') }}">

<!-- Admin theme -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/themes/admin/layout.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/themes/admin/color-schemes/default.css') }}">

<!-- Components theme -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/themes/components/default.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/themes/components/border-radius.css') }}">

<!-- Admin responsive -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/helpers/responsive-elements.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/helpers/admin-responsive.css') }}">

<!-- jquery STEP -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/steps/jquery.steps.css') }}">

<!-- Select 2 -->
<link rel="stylesheet" href="{{ asset('assets/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/select2/select2-bootstrap.css') }}">

<!-- bootstrap tags -->
<link rel="stylesheet" href="{{ asset('assets/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">

<!-- JS Core -->
<script type="text/javascript" src="{{ asset('assets/js-core/jquery-core.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js-core/jquery-ui-core.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js-core/jquery-ui-widget.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js-core/jquery-ui-mouse.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js-core/jquery-ui-position.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js-core/modernizr.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js-core/jquery-cookie.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js-init/chartjs/dist/Chart.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js-init/chartjs/samples/utils.js') }}"></script>

<!-- bootstrap tags JS -->
<script type="text/javascript" src="{{ asset('assets/bootstrap-tagsinput/dist/bootstrap-tagsinput.js') }}"></script>

@yield('css')

<script type="text/javascript">
    $(window).load(function(){
        setTimeout(function() {
            $('#loading').fadeOut( 300, "linear" );
        }, 200);
    });

    /* set timout close alert */
    // $(document).ready(function() {
    //     setTimeout(function() {
    //         $(".alert").fadeOut('close');
    //     }, 5000);
    // });
</script>

<style type="text/css">
    /* custom */
    textarea {
       resize:none;
    }
    #hidden {
        display: none;
    }
</style>

</head>

<body class="fixed fixed-sidebar fixed-header">

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
            {{-- <a href="" class="logo-content-small" title="MonarchUI"></a> --}}
        </div>

        <div id="header-logo" class="logo-bg" style="padding-top: 30px; font-family: ooredoo; background: #002a80;">
            {{-- <a href="#"  title="ATS" style="color: #ffffff;font-family: 'ooredoo';"> --}}
    <!-- <img src="<?php //echo base_url("assets/images/logoneo.png");?>" style="width: 100%; height: 78px;" />-->
        <span style="color: red;">A</span>pplicant <span style="color: red;">T</span>racking <span style="color: red;">S</span>ystem
            {{-- </a> --}}
            {{-- <a href="#" class="logo-content-small" title="MonarchUI">
                NEO <i>ADMIN</i>
                <span>The perfect solution for user interfaces</span>
            </a> --}}
            {{-- <a id="close-sidebar" href="#" title="Close sidebar">
                <i class="glyph-icon icon-angle-left"></i>
            </a> --}}
        </div>

     <!-- Header left -->       
    <div id="header-nav-left">
        <div class="user-account-btn dropdown">
            <a href="#" title="My Account" class="user-profile clearfix" data-toggle="dropdown">
                <img width="28" src="{{ asset('assets/image-resources/gravatar.jpg') }}" alt="Profile image">
                <span>{{ Auth::user()->name }}</span>
                <i class="glyph-icon icon-angle-down"></i>
            </a>
            <div class="dropdown-menu float-left">
                <div class="box-sm">
                    <div class="login-box clearfix">
                        <div class="user-img">
                            <a href="#" title="" class="change-img">Change photo</a>
                            <img src="{{ asset('assets/image-resources/gravatar.jpg') }}" alt="">
                        </div>
                        <div class="user-info">
                            <span style="color:#000000;">
                                {{ Auth::user()->name }}
                                <i>{{ Auth::user()->position_name }}</i>
                                <i>Grade {{ Auth::user()->grade }}</i>
                                <i>{{ Auth::user()->job_title }}</i>
                            </span>
                            <a href="#" title="Edit profile">Edit profile</a>
                        </div>
                    </div>
                    
                    <div class="pad5A button-pane button-pane-alt text-center">
                        <a href="{{ route('logout') }}" class="btn display-block font-normal btn-danger">
                            <i class="glyph-icon icon-power-off"></i>
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- #header-nav-left -->

    <div id="header-nav-right">
        <!--alert untuk pemberitauan apporval hiring brief di HRBP -->
        @if(Request::segment(2) == 'hrbp')
            @yield('alert_for_HRBP')
        @endif
    </div><!-- #header-nav-right -->

    </div>

    <!-- Sidebar -->
    <div id="page-sidebar" class="bg-gradient-8 font-inverse">
        <div class="scroll-sidebar">
            <ul id="sidebar-menu" class="sf-js-enabled sf-arrows">
                @include('layouts.sidebar')
            </ul>
        <!-- #sidebar-menu -->    
        </div>
    </div>

    <!-- Body Content -->
    <div id="page-content-wrapper">
        <div id="page-content">
            <div class="container">
                {{-- <div id="page-title" style="font-family: 'ooredoo';">
                    <div id="theme-options" class="admin-options">
                    </div>
                </div> --}}
                @yield('content')
            </div>
        </div>
    </div>

</div>


<script type="text/javascript" src="{{ asset('assets/bootstrap/js/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/steps/jquery.validate.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/steps/jquery.steps.js') }}"></script>

<!-- bootstrap datepicker -->
<script src="{{ asset('assets/widgets/datepicker/bootstrap-datepicker.js') }}"></script>

<!-- Bootstrap Popover -->
<script type="text/javascript" src="{{ asset('assets/widgets/popover/popover.js') }}"></script>

<!-- Bootstrap Progress Bar -->
<script type="text/javascript" src="{{ asset('assets/widgets/progressbar/progressbar.js') }}"></script>

<!-- Superclick -->

<script type="text/javascript" src="{{ asset('assets/widgets/superclick/superclick.js') }}"></script>

<!-- Input switch alternate -->

<script type="text/javascript" src="{{ asset('assets/widgets/input-switch/inputswitch-alt.js') }}"></script>

<!-- Slim scroll -->

<script type="text/javascript" src="{{ asset('assets/widgets/slimscroll/slimscroll.js') }}"></script>

<!-- Slidebars -->

<script type="text/javascript" src="{{ asset('assets/widgets/slidebars/slidebars.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/widgets/slidebars/slidebars-demo.js') }}"></script>

<!-- PieGage -->

<script type="text/javascript" src="{{ asset('assets/widgets/charts/piegage/piegage.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/widgets/charts/piegage/piegage-demo.js') }}"></script>

<!-- Screenfull -->

<script type="text/javascript" src="{{ asset('assets/widgets/screenfull/screenfull.js') }}"></script>

<!-- Content box -->

<script type="text/javascript" src="{{ asset('assets/widgets/content-box/contentbox.js') }}"></script>

<!-- Overlay -->

<script type="text/javascript" src="{{ asset('assets/widgets/overlay/overlay.js') }}"></script>

<!-- Widgets init for demo -->

<script type="text/javascript" src="{{ asset('assets/js-init/widgets-init.js') }}"></script>

<!-- Theme layout -->

<script type="text/javascript" src="{{ asset('assets/themes/admin/layout.js') }}"></script>

<!-- Theme switcher -->

<script type="text/javascript" src="{{ asset('assets/widgets/theme-switcher/themeswitcher.js') }}"></script>

@yield('js')
@show

<script>
    /* keterangan popover label di option */
    $('body').popover({
        placement:'top',
        html : true,
        delay: {show: 50, hide: 400},
        selector: '[data-popover]',
        trigger: 'hover',
        content: function(ele) {
            return $(this).next("#ket").html();
        }
    });
</script>

</body>
</html>