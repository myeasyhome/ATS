
<!DOCTYPE html> 
<html lang="en">
<head>

    <style>
        /* Loading Spinner */
        .spinner{margin:0;width:70px;height:18px;margin:-35px 0 0 -9px;position:absolute;top:50%;left:50%;text-align:center}.spinner > div{width:18px;height:18px;background-color:#333;border-radius:100%;display:inline-block;-webkit-animation:bouncedelay 1.4s infinite ease-in-out;animation:bouncedelay 1.4s infinite ease-in-out;-webkit-animation-fill-mode:both;animation-fill-mode:both}.spinner .bounce1{-webkit-animation-delay:-.32s;animation-delay:-.32s}.spinner .bounce2{-webkit-animation-delay:-.16s;animation-delay:-.16s}@-webkit-keyframes bouncedelay{0%,80%,100%{-webkit-transform:scale(0.0)}40%{-webkit-transform:scale(1.0)}}@keyframes  bouncedelay{0%,80%,100%{transform:scale(0.0);-webkit-transform:scale(0.0)}40%{transform:scale(1.0);-webkit-transform:scale(1.0)}}
    </style>


    <meta charset="UTF-8">
<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
<title> Monarch UI - Bootstrap Frontend &amp; Admin Template </title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<!-- Favicons -->

<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../../assets/images/icons/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../../assets/images/icons/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../../assets/images/icons/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="../../assets/images/icons/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="../../assets/images/icons/favicon.png">



    <link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.css">


<!-- HELPERS -->

<link rel="stylesheet" type="text/css" href="../../assets/helpers/animate.css">
<link rel="stylesheet" type="text/css" href="../../assets/helpers/backgrounds.css">
<link rel="stylesheet" type="text/css" href="../../assets/helpers/boilerplate.css">
<link rel="stylesheet" type="text/css" href="../../assets/helpers/border-radius.css">
<link rel="stylesheet" type="text/css" href="../../assets/helpers/grid.css">
<link rel="stylesheet" type="text/css" href="../../assets/helpers/page-transitions.css">
<link rel="stylesheet" type="text/css" href="../../assets/helpers/spacing.css">
<link rel="stylesheet" type="text/css" href="../../assets/helpers/typography.css">
<link rel="stylesheet" type="text/css" href="../../assets/helpers/utils.css">
<link rel="stylesheet" type="text/css" href="../../assets/helpers/colors.css">

<!-- ELEMENTS -->

<link rel="stylesheet" type="text/css" href="../../assets/elements/badges.css">
<link rel="stylesheet" type="text/css" href="../../assets/elements/buttons.css">
<link rel="stylesheet" type="text/css" href="../../assets/elements/content-box.css">
<link rel="stylesheet" type="text/css" href="../../assets/elements/dashboard-box.css">
<link rel="stylesheet" type="text/css" href="../../assets/elements/forms.css">
<link rel="stylesheet" type="text/css" href="../../assets/elements/images.css">
<link rel="stylesheet" type="text/css" href="../../assets/elements/info-box.css">
<link rel="stylesheet" type="text/css" href="../../assets/elements/invoice.css">
<link rel="stylesheet" type="text/css" href="../../assets/elements/loading-indicators.css">
<link rel="stylesheet" type="text/css" href="../../assets/elements/menus.css">
<link rel="stylesheet" type="text/css" href="../../assets/elements/panel-box.css">
<link rel="stylesheet" type="text/css" href="../../assets/elements/response-messages.css">
<link rel="stylesheet" type="text/css" href="../../assets/elements/responsive-tables.css">
<link rel="stylesheet" type="text/css" href="../../assets/elements/ribbon.css">
<link rel="stylesheet" type="text/css" href="../../assets/elements/social-box.css">
<link rel="stylesheet" type="text/css" href="../../assets/elements/tables.css">
<link rel="stylesheet" type="text/css" href="../../assets/elements/tile-box.css">
<link rel="stylesheet" type="text/css" href="../../assets/elements/timeline.css">



<!-- ICONS -->

<link rel="stylesheet" type="text/css" href="../../assets/icons/fontawesome/fontawesome.css">
<link rel="stylesheet" type="text/css" href="../../assets/icons/linecons/linecons.css">
<link rel="stylesheet" type="text/css" href="../../assets/icons/spinnericon/spinnericon.css">


<!-- WIDGETS -->

<link rel="stylesheet" type="text/css" href="../../assets/widgets/accordion-ui/accordion.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/calendar/calendar.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/carousel/carousel.css">

<link rel="stylesheet" type="text/css" href="../../assets/widgets/charts/justgage/justgage.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/charts/morris/morris.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/charts/piegage/piegage.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/charts/xcharts/xcharts.css">

<link rel="stylesheet" type="text/css" href="../../assets/widgets/chosen/chosen.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/colorpicker/colorpicker.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/datatable/datatable.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/datepicker/datepicker.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/datepicker-ui/datepicker.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/daterangepicker/daterangepicker.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/dialog/dialog.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/dropdown/dropdown.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/dropzone/dropzone.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/file-input/fileinput.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/input-switch/inputswitch.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/input-switch/inputswitch-alt.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/ionrangeslider/ionrangeslider.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/jcrop/jcrop.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/jgrowl-notifications/jgrowl.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/loading-bar/loadingbar.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/maps/vector-maps/vectormaps.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/markdown/markdown.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/modal/modal.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/multi-select/multiselect.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/multi-upload/fileupload.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/nestable/nestable.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/noty-notifications/noty.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/popover/popover.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/pretty-photo/prettyphoto.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/progressbar/progressbar.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/range-slider/rangeslider.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/slidebars/slidebars.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/slider-ui/slider.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/summernote-wysiwyg/summernote-wysiwyg.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/tabs-ui/tabs.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/theme-switcher/themeswitcher.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/timepicker/timepicker.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/tocify/tocify.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/tooltip/tooltip.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/touchspin/touchspin.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/uniform/uniform.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/wizard/wizard.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/xeditable/xeditable.css">

<!-- SNIPPETS -->

<link rel="stylesheet" type="text/css" href="../../assets/snippets/chat.css">
<link rel="stylesheet" type="text/css" href="../../assets/snippets/files-box.css">
<link rel="stylesheet" type="text/css" href="../../assets/snippets/login-box.css">
<link rel="stylesheet" type="text/css" href="../../assets/snippets/notification-box.css">
<link rel="stylesheet" type="text/css" href="../../assets/snippets/progress-box.css">
<link rel="stylesheet" type="text/css" href="../../assets/snippets/todo.css">
<link rel="stylesheet" type="text/css" href="../../assets/snippets/user-profile.css">
<link rel="stylesheet" type="text/css" href="../../assets/snippets/mobile-navigation.css">

<!-- APPLICATIONS -->

<link rel="stylesheet" type="text/css" href="../../assets/applications/mailbox.css">

<!-- Admin theme -->

<link rel="stylesheet" type="text/css" href="../../assets/themes/admin/layout.css">
<link rel="stylesheet" type="text/css" href="../../assets/themes/admin/color-schemes/default.css">

<!-- Components theme -->

<link rel="stylesheet" type="text/css" href="../../assets/themes/components/default.css">
<link rel="stylesheet" type="text/css" href="../../assets/themes/components/border-radius.css">

<!-- Admin responsive -->

<link rel="stylesheet" type="text/css" href="../../assets/helpers/responsive-elements.css">
<link rel="stylesheet" type="text/css" href="../../assets/helpers/admin-responsive.css">

    <!-- JS Core -->

    <script type="text/javascript" src="../../assets/js-core/jquery-core.js"></script>
    <script type="text/javascript" src="../../assets/js-core/jquery-ui-core.js"></script>
    <script type="text/javascript" src="../../assets/js-core/jquery-ui-widget.js"></script>
    <script type="text/javascript" src="../../assets/js-core/jquery-ui-mouse.js"></script>
    <script type="text/javascript" src="../../assets/js-core/jquery-ui-position.js"></script>
    <!--<script type="text/javascript" src="../../assets/js-core/transition.js"></script>-->
    <script type="text/javascript" src="../../assets/js-core/modernizr.js"></script>
    <script type="text/javascript" src="../../assets/js-core/jquery-cookie.js"></script>





    <script type="text/javascript">
        $(window).load(function(){
            setTimeout(function() {
                $('#loading').fadeOut( 400, "linear" );
            }, 300);
        });
    </script>



</head>


    <body>
    <div id="sb-site">
    <div class="sb-slidebar bg-black sb-left sb-style-overlay">
    <div class="scrollable-content scrollable-slim-sidebar">
        <div class="pad10A">
            <div class="divider-header">Online</div>
            <ul class="chat-box">
                <li>
                    <div class="status-badge">
                        <img class="img-circle" width="40" src="../../assets/image-resources/people/testimonial1.jpg" alt="">
                        <div class="small-badge bg-green"></div>
                    </div>
                    <b>
                        Grace Padilla
                    </b>
                    <p>On the other hand, we denounce...</p>
                    <a href="#" class="btn btn-md no-border radius-all-100 btn-black"><i class="glyph-icon icon-comments-o"></i></a>
                </li>
                <li>
                    <div class="status-badge">
                        <img class="img-circle" width="40" src="../../assets/image-resources/people/testimonial2.jpg" alt="">
                        <div class="small-badge bg-green"></div>
                    </div>
                    <b>
                        Carl Gamble
                    </b>
                    <p>Dislike men who are so beguiled...</p>
                    <a href="#" class="btn btn-md no-border radius-all-100 btn-black"><i class="glyph-icon icon-comments-o"></i></a>
                </li>
                <li>
                    <div class="status-badge">
                        <img class="img-circle" width="40" src="../../assets/image-resources/people/testimonial3.jpg" alt="">
                        <div class="small-badge bg-green"></div>
                    </div>
                    <b>
                        Michael Poole
                    </b>
                    <p>Of pleasure of the moment, so...</p>
                    <a href="#" class="btn btn-md no-border radius-all-100 btn-black"><i class="glyph-icon icon-comments-o"></i></a>
                </li>
                <li>
                    <div class="status-badge">
                        <img class="img-circle" width="40" src="../../assets/image-resources/people/testimonial4.jpg" alt="">
                        <div class="small-badge bg-green"></div>
                    </div>
                    <b>
                        Bill Green
                    </b>
                    <p>That they cannot foresee the...</p>
                    <a href="#" class="btn btn-md no-border radius-all-100 btn-black"><i class="glyph-icon icon-comments-o"></i></a>
                </li>
                <li>
                    <div class="status-badge">
                        <img class="img-circle" width="40" src="../../assets/image-resources/people/testimonial5.jpg" alt="">
                        <div class="small-badge bg-green"></div>
                    </div>
                    <b>
                        Cheryl Soucy
                    </b>
                    <p>Pain and trouble that are bound...</p>
                    <a href="#" class="btn btn-md no-border radius-all-100 btn-black"><i class="glyph-icon icon-comments-o"></i></a>
                </li>
            </ul>
            <div class="divider-header">Idle</div>
            <ul class="chat-box">
                <li>
                    <div class="status-badge">
                        <img class="img-circle" width="40" src="../../assets/image-resources/people/testimonial6.jpg" alt="">
                        <div class="small-badge bg-orange"></div>
                    </div>
                    <b>
                        Jose Kramer
                    </b>
                    <p>Equal blame belongs to those...</p>
                    <a href="#" class="btn btn-md no-border radius-all-100 btn-black"><i class="glyph-icon icon-comments-o"></i></a>
                </li>
                <li>
                    <div class="status-badge">
                        <img class="img-circle" width="40" src="../../assets/image-resources/people/testimonial7.jpg" alt="">
                        <div class="small-badge bg-orange"></div>
                    </div>
                    <b>
                        Dan Garcia
                    </b>
                    <p>Weakness of will, which is same...</p>
                    <a href="#" class="btn btn-md no-border radius-all-100 btn-black"><i class="glyph-icon icon-comments-o"></i></a>
                </li>
                <li>
                    <div class="status-badge">
                        <img class="img-circle" width="40" src="../../assets/image-resources/people/testimonial8.jpg" alt="">
                        <div class="small-badge bg-orange"></div>
                    </div>
                    <b>
                        Edward Bridges
                    </b>
                    <p>These cases are perfectly simple...</p>
                    <a href="#" class="btn btn-md no-border radius-all-100 btn-black"><i class="glyph-icon icon-comments-o"></i></a>
                </li>
            </ul>
            <div class="divider-header">Offline</div>
            <ul class="chat-box">
                <li>
                    <div class="status-badge">
                        <img class="img-circle" width="40" src="../../assets/image-resources/people/testimonial1.jpg" alt="">
                        <div class="small-badge bg-red"></div>
                    </div>
                    <b>
                        Randy Herod
                    </b>
                    <p>In a free hour, when our power...</p>
                    <a href="#" class="btn btn-md no-border radius-all-100 btn-black"><i class="glyph-icon icon-comments-o"></i></a>
                </li>
                <li>
                    <div class="status-badge">
                        <img class="img-circle" width="40" src="../../assets/image-resources/people/testimonial2.jpg" alt="">
                        <div class="small-badge bg-red"></div>
                    </div>
                    <b>
                        Patricia Bagley
                    </b>
                    <p>when nothing prevents our being...</p>
                    <a href="#" class="btn btn-md no-border radius-all-100 btn-black"><i class="glyph-icon icon-comments-o"></i></a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="sb-slidebar bg-black sb-right sb-style-overlay">
<div class="scrollable-content scrollable-slim-sidebar">
<div class="pad15A">
<a href="#" title="" data-toggle="collapse" data-target="#sidebar-toggle-1" class="popover-title">
    Cloud status
    <span class="caret"></span>
</a>
<div id="sidebar-toggle-1" class="collapse in">
    <div class="pad15A container">
        <div class="row">
            <div class="col-md-4">
                <div class="text-center font-gray pad5B text-transform-upr font-size-12">New visits</div>
                <div class="chart-alt-3 font-gray-dark" data-percent="55"><span>55</span>%</div>
            </div>
            <div class="col-md-4">
                <div class="text-center font-gray pad5B text-transform-upr font-size-12">Bounce rate</div>
                <div class="chart-alt-3 font-gray-dark" data-percent="46"><span>46</span>%</div>
            </div>
            <div class="col-md-4">
                <div class="text-center font-gray pad5B text-transform-upr font-size-12">Server load</div>
                <div class="chart-alt-3 font-gray-dark" data-percent="92"><span>92</span>%</div>
            </div>
        </div>
        <div class="divider mrg15T mrg15B"></div>
        <div class="text-center">
            <a href="#" class="btn center-div btn-info mrg5T btn-sm text-transform-upr updateEasyPieChart">
                <i class="glyph-icon icon-refresh"></i>
                Update charts
            </a>
        </div>
    </div>
</div>

<div class="clear"></div>

<a href="#" title="" data-toggle="collapse" data-target="#sidebar-toggle-6" class="popover-title">
    Latest transfers
    <span class="caret"></span>
</a>
<div id="sidebar-toggle-6" class="collapse in">

    <ul class="files-box">
        <li>
            <i class="files-icon glyph-icon font-red icon-file-archive-o"></i>
            <div class="files-content">
                <b>blog_export.zip</b>
                <div class="files-date">
                    <i class="glyph-icon icon-clock-o"></i>
                    added on <b>22.10.2014</b>
                </div>
            </div>
            <div class="files-buttons">
                <a href="#" class="btn btn-xs hover-info tooltip-button" data-placement="left" title="Download">
                    <i class="glyph-icon icon-cloud-download"></i>
                </a>
                <a href="#" class="btn btn-xs hover-danger tooltip-button" data-placement="left" title="Delete">
                    <i class="glyph-icon icon-times"></i>
                </a>
            </div>
        </li>
        <li class="divider"></li>
        <li>
            <i class="files-icon glyph-icon icon-file-code-o"></i>
            <div class="files-content">
                <b>homepage-test.html</b>
                <div class="files-date">
                    <i class="glyph-icon icon-clock-o"></i>
                    added  <b>19.10.2014</b>
                </div>
            </div>
            <div class="files-buttons">
                <a href="#" class="btn btn-xs hover-info tooltip-button" data-placement="left" title="Download">
                    <i class="glyph-icon icon-cloud-download"></i>
                </a>
                <a href="#" class="btn btn-xs hover-danger tooltip-button" data-placement="left" title="Delete">
                    <i class="glyph-icon icon-times"></i>
                </a>
            </div>
        </li>
        <li class="divider"></li>
        <li>
            <i class="files-icon glyph-icon font-yellow icon-file-image-o"></i>
            <div class="files-content">
                <b>monthlyReport.jpg</b>
                <div class="files-date">
                    <i class="glyph-icon icon-clock-o"></i>
                    added on <b>10.9.2014</b>
                </div>
            </div>
            <div class="files-buttons">
                <a href="#" class="btn btn-xs hover-info tooltip-button" data-placement="left" title="Download">
                    <i class="glyph-icon icon-cloud-download"></i>
                </a>
                <a href="#" class="btn btn-xs hover-danger tooltip-button" data-placement="left" title="Delete">
                    <i class="glyph-icon icon-times"></i>
                </a>
            </div>
        </li>
        <li class="divider"></li>
        <li>
            <i class="files-icon glyph-icon font-green icon-file-word-o"></i>
            <div class="files-content">
                <b>new_presentation.doc</b>
                <div class="files-date">
                    <i class="glyph-icon icon-clock-o"></i>
                    added on <b>5.9.2014</b>
                </div>
            </div>
            <div class="files-buttons">
                <a href="#" class="btn btn-xs hover-info tooltip-button" data-placement="left" title="Download">
                    <i class="glyph-icon icon-cloud-download"></i>
                </a>
                <a href="#" class="btn btn-xs hover-danger tooltip-button" data-placement="left" title="Delete">
                    <i class="glyph-icon icon-times"></i>
                </a>
            </div>
        </li>
    </ul>

</div>

<div class="clear"></div>

<a href="#" title="" data-toggle="collapse" data-target="#sidebar-toggle-3" class="popover-title">
    Tasks for today
    <span class="caret"></span>
</a>
<div id="sidebar-toggle-3" class="collapse in">

    <ul class="progress-box">
        <li>
            <div class="progress-title">
                New features development
                <b>87%</b>
            </div>
            <div class="progressbar-smaller progressbar" data-value="87">
                <div class="progressbar-value bg-azure">
                    <div class="progressbar-overlay"></div>
                </div>
            </div>
        </li>
        <li>
            <b class="pull-right">66%</b>
            <div class="progress-title">
                Finishing uploading files
                
            </div>
            <div class="progressbar-smaller progressbar" data-value="66">
                <div class="progressbar-value bg-red">
                    <div class="progressbar-overlay"></div>
                </div>
            </div>
        </li>
        <li>
            <div class="progress-title">
                Creating tutorials
                <b>58%</b>
            </div>
            <div class="progressbar-smaller progressbar" data-value="58">
                <div class="progressbar-value bg-blue-alt"></div>
            </div>
        </li>
        <li>
            <div class="progress-title">
                Frontend bonus theme
                <b>74%</b>
            </div>
            <div class="progressbar-smaller progressbar" data-value="74">
                <div class="progressbar-value bg-purple"></div>
            </div>
        </li>
    </ul>

</div>

<div class="clear"></div>

<a href="#" title="" data-toggle="collapse" data-target="#sidebar-toggle-4" class="popover-title">
    Pending notifications
    <span class="bs-label bg-orange tooltip-button" title="Label example">New</span>
    <span class="caret"></span>
</a>
<div id="sidebar-toggle-4" class="collapse in">
    <ul class="notifications-box notifications-box-alt">
        <li>
            <span class="bg-purple icon-notification glyph-icon icon-users"></span>
            <span class="notification-text">This is an error notification</span>
            <div class="notification-time">
                a few seconds ago
                <span class="glyph-icon icon-clock-o"></span>
            </div>
            <a href="#" class="notification-btn btn btn-xs btn-black tooltip-button" data-placement="left" title="View details">
                <i class="glyph-icon icon-arrow-right"></i>
            </a>
        </li>
        <li>
            <span class="bg-warning icon-notification glyph-icon icon-ticket"></span>
            <span class="notification-text">This is a warning notification</span>
            <div class="notification-time">
                <b>15</b> minutes ago
                <span class="glyph-icon icon-clock-o"></span>
            </div>
            <a href="#" class="notification-btn btn btn-xs btn-black tooltip-button" data-placement="left" title="View details">
                <i class="glyph-icon icon-arrow-right"></i>
            </a>
        </li>
        <li>
            <span class="bg-green icon-notification glyph-icon icon-random"></span>
            <span class="notification-text font-green">A success message example.</span>
            <div class="notification-time">
                <b>2 hours</b> ago
                <span class="glyph-icon icon-clock-o"></span>
            </div>
            <a href="#" class="notification-btn btn btn-xs btn-black tooltip-button" data-placement="left" title="View details">
                <i class="glyph-icon icon-arrow-right"></i>
            </a>
        </li>
    </ul>
</div>
</div>
</div>
</div>
    <div id="loading">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>

    <div id="page-wrapper">
        <div id="page-header" class="bg-gradient-9">
    <div id="mobile-navigation">
        <button id="nav-toggle" class="collapsed" data-toggle="collapse" data-target="#page-sidebar"><span></span></button>
        <a href="index.html" class="logo-content-small" title="MonarchUI"></a>
    </div>
    <div id="header-logo" class="logo-bg">
        <a href="index.html" class="logo-content-big" title="MonarchUI">
            Monarch <i>UI</i>
            <span>The perfect solution for user interfaces</span>
        </a>
        <a href="index.html" class="logo-content-small" title="MonarchUI">
            Monarch <i>UI</i>
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
                <img width="28" src="../../assets/image-resources/gravatar.jpg" alt="Profile image">
                <span>Thomas Barnes</span>
                <i class="glyph-icon icon-angle-down"></i>
            </a>
            <div class="dropdown-menu float-left">
                <div class="box-sm">
                    <div class="login-box clearfix">
                        <div class="user-img">
                            <a href="#" title="" class="change-img">Change photo</a>
                            <img src="../../assets/image-resources/gravatar.jpg" alt="">
                        </div>
                        <div class="user-info">
                            <span>
                                Thomas Barnes
                                <i>UX/UI developer</i>
                            </span>
                            <a href="#" title="Edit profile">Edit profile</a>
                            <a href="#" title="View notifications">View notifications</a>
                        </div>
                    </div>
                    <div class="pad5A button-pane button-pane-alt text-center">
                        <a href="#" class="btn display-block font-normal btn-danger">
                            <i class="glyph-icon icon-power-off"></i>
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #header-nav-left -->

</div>
        <div id="page-sidebar">
    <div class="scroll-sidebar">
        

    <ul id="sidebar-menu">
    <li class="header"><span>Overview</span></li>
    <li>
        <a href="index.html" title="Admin Dashboard">
            <i class="glyph-icon icon-linecons-tv"></i>
            <span>Admin dashboard</span>
        </a>
    </li>
    <li class="divider"></li>
    <li class="no-menu">
        <a href="../frontend-template/index.html" title="Frontend template">
            <i class="glyph-icon icon-linecons-beaker"></i>
            <span>Frontend template</span>
            <span class="bs-label label-danger">
                NEW
            </span>
        </a>
    </li>
    <li class="header"><span>Components</span></li>
    <li>
        <a href="#" title="Elements">
            <i class="glyph-icon icon-linecons-diamond"></i>
            <span>Elements</span>
        </a>
        <div class="sidebar-submenu">

            <ul>
                <li><a href="buttons.html" title="Buttons"><span>Buttons</span></a></li>
                <li><a href="labels-badges.html" title="Labels &amp; Badges"><span>Labels &amp; Badges</span></a></li>
                <li><a href="content-boxes.html" title="Content boxes"><span>Content boxes</span></a></li>
                <li><a href="icons.html" title="Icons"><span>Icons</span></a></li>
                <li><a href="nav-menus.html" title="Navigation menus"><span>Navigation menus</span></a></li>
                <li><a href="response-messages.html" title="Response messages"><span>Response messages</span></a></li>
                <li><a href="images.html" title="Images"><span>Images</span></a></li>
            </ul>

        </div><!-- .sidebar-submenu -->
    </li>
    <li>
        <a href="#" title="Dashboard boxes">
            <i class="glyph-icon icon-linecons-lightbulb"></i>
            <span>Dashboard boxes</span>
            <span class="bs-label label-primary">Hot</span>
        </a>
        <div class="sidebar-submenu">

            <ul>
                <li><a href="chart-boxes.html" title="Chart boxes"><span>Chart boxes</span></a></li>
                <li><a href="tile-boxes.html" title="Tile boxes"><span>Tile boxes</span></a></li>
                <li><a href="social-boxes.html" title="Social boxes"><span>Social boxes</span></a></li>
                <li><a href="panel-boxes.html" title="Panel boxes"><span>Panel boxes</span></a></li>
            </ul>

        </div><!-- .sidebar-submenu -->
    </li>
    <li>
        <a href="#" title="Widgets">
            <i class="glyph-icon icon-linecons-wallet"></i>
            <span>Widgets</span>
        </a>
        <div class="sidebar-submenu">

            <ul>
                <li><a href="tabs.html" title="Responsive tabs"><span>Responsive tabs</span></a></li>
                <li><a href="collapsable.html" title="Collapsables"><span>Collapsable accordions</span></a></li>
                <li><a href="bs-carousel.html" title="Bootstrap Carousel"><span>Bootstrap carousel</span></a></li>
                <li><a href="calendar.html" title="Calendar"><span>Calendar</span></a></li>
                <li><a href="scrollbars.html" title="Custom scrollbars"><span>Custom scrollbars</span></a></li>
                <li><a href="modals.html" title="Modals"><span>Modals</span></a></li>
                <li><a href="notifications.html" title="Notifications"><span>Notifications</span></a></li>
                <li><a href="lazyload.html" title="Lazyload"><span>Lazyload</span></a></li>
                <li><a href="loading-feedback.html" title="Loading feedback"><span>Loading feedback</span></a></li>
                <li><a href="popovers-tooltips.html" title="Popovers &amp; Tooltips"><span>Popovers & Tooltips</span></a></li>
                <li><a href="progress-bars.html" title="Progress bars"><span>Progress bars</span></a></li>
                <li><a href="sortable-elements.html" title="Sortable elements"><span>Sortable elements</span></a></li>
            </ul>

        </div><!-- .sidebar-submenu -->
    </li>
    <li>
        <a href="#" title="Forms UI">
            <i class="glyph-icon icon-linecons-eye"></i>
            <span>Forms UI</span>
        </a>
        <div class="sidebar-submenu">

            <ul>
                <li><a href="forms-elements.html" title="Form elements"><span>Form elements</span></a></li>
                <li><a href="forms-validation.html" title="Form validation"><span>Form validation</span></a></li>
                <li><a href="pickers.html" title="Pickers"><span>Pickers</span></a></li>
                <li><a href="sliders.html" title="Sliders"><span>Sliders</span></a></li>
                <li><a href="forms-wizard.html" title="Form wizards"><span>Form wizards</span></a></li>
                <li><a href="forms-masks.html" title="Form input masks"><span>Form input masks</span></a></li>
                <li><a href="image-crop.html" title="Image crop"><span>Image crop</span></a></li>
                <li><a href="dropzone-uploader.html" title="Dropzone uploader"><span>Dropzone uploader</span></a></li>
                <li><a href="multi-uploader.html" title="Multi uploader"><span>Multi uploader</span></a></li>
                <li><a href="input-knobs.html" title="Input knobs"><span>Input knobs</span></a></li>
                <li><a href="ckeditor.html" title="Ckeditor"><span>Ckeditor</span></a></li>
                <li><a href="summernote.html" title="Summernote"><span>Summernote</span></a></li>
                <li><a href="markdown.html" title="Markdown editor"><span>Markdown editor</span></a></li>
                <li><a href="inline-editor.html" title="Inline editor"><span>Inline editor</span></a></li>
            </ul>

        </div><!-- .sidebar-submenu -->
    </li>
    <li>
        <a href="#" title="Advanced tables">
            <i class="glyph-icon icon-linecons-megaphone"></i>
            <span>Advanced tables</span>
        </a>
        <div class="sidebar-submenu">

            <ul>
                <li><a href="tables.html" title="Basic tables"><span>Basic tables</span></a></li>
                <li><a href="responsive-tables.html" title="Responsive tables"><span>Responsive tables</span></a></li>
                <li><a href="data-tables.html" title="Data tables"><span>Data tables</span></a></li>
                <li><a href="advanced-datatables.html" title="Advanced data tables"><span>Advanced data tables</span></a></li>
                <li><a href="fixed-datatables.html" title="Fixed data tables"><span>Fixed data tables</span></a></li>
                <li><a href="responsive-datatables.html" title="Responsive data tables"><span>Responsive data tables</span></a></li>
            </ul>

        </div><!-- .sidebar-submenu -->
    </li>
    <li>
        <a href="#" title="Charts">
            <i class="glyph-icon icon-linecons-paper-plane"></i>
            <span>Charts</span>
        </a>
        <div class="sidebar-submenu">

            <ul>
                <li><a href="flot-charts.html" title="Flot charts"><span>Flot charts</span></a></li>
                <li><a href="sparklines.html" title="Sparklines"><span>Sparklines</span></a></li>
                <li><a href="pie-gages.html" title="PieGages"><span>PieGages</span></a></li>
                <li><a href="just-gage.html" title="justGage"><span>justGage</span></a></li>
                <li><a href="morris-charts.html" title="Morris charts"><span>Morris charts</span></a></li>
                <li><a href="xcharts.html" title="xCharts"><span>xCharts</span></a></li>
                <li><a href="chart-js.html" title="Chart.js"><span>Chart.js</span></a></li>
            </ul>

        </div><!-- .sidebar-submenu -->
    </li>
    <li>
        <a href="#" title="Maps">
            <i class="glyph-icon icon-linecons-sound"></i>
            <span>Maps</span>
        </a>
        <div class="sidebar-submenu">

            <ul>
                <li><a href="gmaps.html" title="gMaps"><span>gMaps</span></a></li>
                <li><a href="vector-maps.html" title="Vector maps"><span>Vector maps</span></a></li>
                <li><a href="mapael.html" title="Mapael"><span>Mapael</span></a></li>
            </ul>

        </div><!-- .sidebar-submenu -->
    </li>
    <li class="header"><span>Extra</span></li>
    <li>
        <a href="#" title="Pages">
            <i class="glyph-icon icon-linecons-fire"></i>
            <span>Pages</span>
            <span class="bs-label badge-yellow">NEW</span>
        </a>
        <div class="sidebar-submenu">

            <ul>
                <li><a href="index-alt.html" title="Alternate dashboard"><span>Alternate dashboard</span></a></li>
                <li><a href="view-profile.html" title="View profile"><span>View profile</span></a></li>
                <li><a href="faq-section.html" title="FAQ section"><span>FAQ section</span></a></li>
                <li><a href="auto-menu.html" title="Auto menu"><span>Auto menu</span></a></li>
                <li><a href="invoice.html" title="Invoice"><span>Invoice</span></a></li>
                <li><a href="admin-blog.html" title="Blog posts list"><span>Blog posts list</span></a></li>
                <li><a href="admin-pricing.html" title="Pricing tables"><span>Pricing tables</span></a></li>
                <li><a href="portfolio-gallery.html" title="Portfolio gallery"><span>Portfolio gallery</span></a></li>
                <li><a href="portfolio-masonry.html" title="Portfolio masonry"><span>Portfolio masonry</span></a></li>
                <li><a href="slidebars.html" title="Slidebars"><span>Slidebars</span></a></li>
            </ul>

        </div><!-- .sidebar-submenu -->
    </li>
    <li>
        <a href="#" title="Other Pages">
            <i class="glyph-icon icon-linecons-cup"></i>
            <span>Other Pages</span>
        </a>
        <div class="sidebar-submenu">

            <ul>
                <li><a href="login-1.html" target="_blank" title="Login page 1"><span>Login page 1</span></a></li>
                <li><a href="login-2.html" target="_blank" title="Login page 2"><span>Login page 2</span></a></li>
                <li><a href="login-3.html" target="_blank" title="Login page 3"><span>Login page 3</span></a></li>
                <li><a href="login-4.html" target="_blank" title="Login page 4"><span>Login page 4</span></a></li>
                <li><a href="login-5.html" target="_blank" title="Login page 5"><span>Login page 5</span></a></li>
                <li><a href="lockscreen-1.html" target="_blank" title="Lockscreen page 1"><span>Lockscreen page 1</span></a></li>
                <li><a href="lockscreen-2.html" target="_blank" title="Lockscreen page 2"><span>Lockscreen page 2</span></a></li>
                <li><a href="lockscreen-3.html" target="_blank" title="Lockscreen page 3"><span>Lockscreen page 3</span></a></li>
                <li><a href="server-1.html" target="_blank" title="Server page 1"><span>Error 404 page</span></a></li>
                <li><a href="server-2.html" target="_blank" title="Server page 2"><span>Error 404 alternate</span></a></li>
                <li><a href="server-3.html" target="_blank" title="Server page 3"><span>Server 500 error</span></a></li>
            </ul>

        </div><!-- .sidebar-submenu -->
    </li>
    <li>
        <a href="#" title="Mailbox">
            <i class="glyph-icon icon-linecons-mail"></i>
            <span>Mailbox</span>
            <span class="bs-badge badge-danger">3</span>
        </a>
        <div class="sidebar-submenu">

            <ul>
                <li><a href="mailbox-inbox.html" title="Inbox"><span>Inbox</span></a></li>
                <li><a href="mailbox-compose.html" title="Compose message"><span>Compose message</span></a></li>
                <li><a href="mailbox-single.html" title="Single message"><span>Single message</span></a></li>
            </ul>

        </div><!-- .sidebar-submenu -->
    </li>
    <li>
        <a href="#" title="Snippets">
            <i class="glyph-icon icon-linecons-cd"></i>
            <span>Snippets</span>
        </a>
        <div class="sidebar-submenu">

            <ul>
                <li><a href="timeline.html" title="Timeline"><span>Timeline</span></a></li>
                <li><a href="chat.html" title="Chat"><span>Chat</span></a></li>
                <li><a href="checklist.html" title="Checklist"><span>Checklist</span></a></li>
            </ul>

        </div><!-- .sidebar-submenu -->
    </li>
    <li>
        <a href="#" title="Helpers">
            <i class="glyph-icon icon-linecons-doc"></i>
            <span>Helpers</span>
        </a>
        <div class="sidebar-submenu">

            <ul>
                <li><a href="helper-classes.html" title="Helper classes"><span>Helper classes</span></a></li>
                <li><a href="page-transitions.html" title="Page transitions"><span>Page transitions</span></a></li>
                <li><a href="animations.html" title="Animations"><span>Animations</span></a></li>
            </ul>

        </div><!-- .sidebar-submenu -->
    </li>
    </ul><!-- #sidebar-menu -->


    </div>
</div>
        <div id="page-content-wrapper">
            <div id="page-content">
                
                    <div class="container">
                    

<!-- xCharts -->

<script type="text/javascript" src="../../assets/js-core/d3.js"></script>
<script type="text/javascript" src="../../assets/widgets/charts/xcharts/xcharts.js"></script>
<script type="text/javascript" src="../../assets/widgets/charts/xcharts/xcharts-demo-1.js"></script>

<!-- Sparklines charts -->

<script type="text/javascript" src="../../assets/widgets/charts/sparklines/sparklines.js"></script>
<script type="text/javascript" src="../../assets/widgets/charts/sparklines/sparklines-demo.js"></script>

<!-- Skycons -->

<script type="text/javascript" src="../../assets/widgets/skycons/skycons.js"></script>

<!-- Calendar -->

<script type="text/javascript" src="../../assets/widgets/daterangepicker/moment.js"></script>
<script type="text/javascript" src="../../assets/widgets/calendar/calendar.js"></script>
<script type="text/javascript" src="../../assets/widgets/calendar/calendar-demo.js"></script>


<div class="row">
    <div class="col-md-6">
        <div class="content-box">
            <h3 class="content-box-header content-box-header-alt bg-white">
                <span class="icon-separator">
                    <i class="glyph-icon icon-linecons-megaphone"></i>
                </span>
                <span class="header-wrapper">
                    Recent transactions volume
                    <small>Example header title description</small>
                </span>
                <span class="header-buttons">
                    <a href="#" class="btn btn-sm btn-primary" title="">Export data</a>
                </span>
            </h3>
            <div class="content-box-wrapper">
                <div id="example4" style="width: 100%; height: 300px;"></div>
            </div>
        </div>

        <div class="content-box">
            <h3 class="content-box-header bg-blue text-left">
                <i class="glyph-icon icon-comments"></i>
                Scrollable chat box
            </h3>
            <div class="content-box-wrapper">
                <div class="scrollable-content scrollable-slim scrollable-medium">

                    <ul class="chat-box">
                        <li>
                            <div class="chat-author">
                                <img width="36" src="../../assets/image-resources/gravatar.jpg" alt="">
                            </div>
                            <div class="popover left no-shadow">
                                <div class="arrow"></div>
                                <div class="popover-content">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.
                                    <div class="chat-time">
                                        <i class="glyph-icon icon-clock-o"></i>
                                        a few seconds ago
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="float-left">
                            <div class="chat-author">
                                <img width="36" src="../../assets/image-resources/gravatar.jpg" alt="">
                            </div>
                            <div class="popover right no-shadow">
                                <div class="arrow"></div>
                                <div class="popover-content">
                                    <h3>
                                        <a href="#" title="Agile UI">Agile UI</a>
                                        <div class="float-right">
                                            <a href="#" class="btn glyph-icon icon-inbox font-gray tooltip-button" data-placement="bottom" title="This chat line was received in the mail."></a>
                                        </div>
                                    </h3>
                                    This comment line has a title (author name) and a right button panel.
                                    <div class="chat-time">
                                        <i class="glyph-icon icon-clock-o"></i>
                                        a few seconds ago
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="chat-author">
                                <img width="36" src="../../assets/image-resources/gravatar.jpg" alt="">
                            </div>
                            <div class="popover left no-shadow">
                                <div class="arrow"></div>
                                <div class="popover-content">
                                    This comment line has a bottom button panel, box shadow and title.
                                    <div class="chat-time">
                                        <i class="glyph-icon icon-clock-o"></i>
                                        a few seconds ago
                                    </div>
                                    <div class="divider"></div>
                                    <a href="#" class="btn btn-sm btn-default font-bold text-transform-upr" title=""><span class="button-content">Reply</span></a>
                                    <a href="#" class="btn btn-sm btn-danger float-right tooltip-button" data-placement="left" title="Remove comment"><i class="glyph-icon icon-remove"></i></a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="chat-author">
                                <img width="36" src="../../assets/image-resources/gravatar.jpg" alt="">
                            </div>
                            <div class="popover left no-shadow">
                                <div class="arrow"></div>
                                <div class="popover-content">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.
                                    <div class="chat-time">
                                        <i class="glyph-icon icon-clock-o"></i>
                                        a few seconds ago
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="float-left">
                            <div class="chat-author">
                                <img width="36" src="../../assets/image-resources/gravatar.jpg" alt="">
                            </div>
                            <div class="popover right no-shadow">
                                <div class="arrow"></div>
                                <div class="popover-content">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.
                                    <div class="chat-time">
                                        <i class="glyph-icon icon-clock-o"></i>
                                        a few seconds ago
                                    </div>
                                </div>
                            </div>
                        </li>

                    </ul>

                </div>
            </div>
            <div class="button-pane pad10A">
                <div class="input-group">
                    <input type="text" placeholder="Say something here..." class="form-control">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-default" tabindex="-1"><i class="glyph-icon icon-mail-reply"></i></button>
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" tabindex="-1" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-layout row">
            <div class="panel-box col-xs-4 bg-green">
                <div class="panel-content">
                    <h4>Overview</h4>
                    <p class="opacity-60">Example panel box</p>
                </div>
            </div>
            <div class="panel-box col-xs-8">

                <div class="panel-content  bg-black">
                    <div class="sparkline-big">183,579,180,311,240,180,311,450,302,370,210,610</div>
                </div>
                <div class="panel-content bg-white">
                    <div class="center-vertical">

                        <ul class="center-content nav nav-justified">
                            <li>
                                <h4 class="font-green">+$39,45</h4>
                                <p class="font-gray">Overdue orders</p>
                            </li>
                            <li>
                                <h4>
                                    <i class="glyph-icon opacity-60 icon-caret-up"></i>
                                    217
                                </h4>
                                <p class="font-gray">Pending orders</p>
                            </li>
                        </ul>

                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-6">

                <div class="panel-layout">
                    <div class="panel-box">

                        <div class="panel-content bg-facebook">

                            <i class="glyph-icon font-size-35 icon-facebook"></i>

                        </div>
                        <div class="panel-content pad15A bg-white">
                            <div class="center-vertical">

                                <ul class="center-content list-group list-group-separator row mrg0A">
                                    <li class="col-md-6">
                                        <b>1,456</b>
                                        <p class="font-gray">Friends</p>
                                    </li>
                                    <li class="col-md-6">
                                        <b>593</b>
                                        <p class="font-gray">Likes</p>
                                    </li>
                                </ul>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-md-6">

                <div class="panel-layout">
                    <div class="panel-box">

                        <div class="panel-content bg-twitter">

                            <i class="glyph-icon font-size-35 icon-twitter"></i>

                        </div>
                        <div class="panel-content pad15A bg-white">
                            <div class="center-vertical">

                                <ul class="center-content list-group list-group-separator row mrg0A">
                                    <li class="col-md-6">
                                        <b>356</b>
                                        <p class="font-gray">Followers</p>
                                    </li>
                                    <li class="col-md-6">
                                        <b>981</b>
                                        <p class="font-gray">Tweets</p>
                                    </li>
                                </ul>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                <div class="tile-box tile-box-alt mrg20B bg-green">
                    <div class="tile-header">
                        New Visitors
                    </div>
                    <div class="tile-content-wrapper">
                        <i class="glyph-icon icon-dashboard"></i>
                        <div class="tile-content">
                            <span>$</span>
                            378
                        </div>
                        <small>
                            <i class="glyph-icon icon-caret-up"></i>
                            +7,6% new users in the first quarter
                        </small>
                    </div>
                    <a href="#" class="tile-footer tooltip-button" data-placement="bottom" title="This is a link example!">
                        view details
                        <i class="glyph-icon icon-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="tile-box tile-box-alt mrg20B bg-red">
                    <div class="tile-header">
                        Revenue
                    </div>
                    <div class="tile-content-wrapper">
                        <i class="glyph-icon icon-camera"></i>
                        <div class="tile-content">
                            <span>$</span>
                            5,937
                        </div>
                        <small>
                            <i class="glyph-icon icon-caret-up"></i>
                            +7,6% new users in the first quarter
                        </small>
                    </div>
                    <a href="#" class="tile-footer tooltip-button" data-placement="bottom" title="This is a link example!">
                        view details
                        <i class="glyph-icon icon-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="tile-box tile-box-alt mrg20B bg-orange">
                    <div class="tile-header">
                        Subscriptions
                    </div>
                    <div class="tile-content-wrapper">
                        <i class="glyph-icon icon-tag"></i>
                        <div class="tile-content">
                            <span>$</span>
                            126,34
                        </div>
                        <small>
                            <i class="glyph-icon icon-caret-up"></i>
                            +7,6% new users in the first quarter
                        </small>
                    </div>
                    <a href="#" class="tile-footer tooltip-button" data-placement="bottom" title="This is a link example!">
                        view details
                        <i class="glyph-icon icon-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="tile-box tile-box-alt mrg20B bg-blue-alt">
                    <div class="tile-header">
                        Monthly earnings
                    </div>
                    <div class="tile-content-wrapper">
                        <i class="glyph-icon icon-camera"></i>
                        <div class="tile-content">
                            <span>$</span>
                            1,212
                        </div>
                        <small>
                            <i class="glyph-icon icon-caret-up"></i>
                            +2,6% new users in the first quarter
                        </small>
                    </div>
                    <a href="#" class="tile-footer tooltip-button" data-placement="bottom" title="This is a link example!">
                        view details
                        <i class="glyph-icon icon-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="panel-body">
                <div id="calendar-example-1"></div>
            </div>
        </div>

        <div class="panel-layout row">
            <div class="panel-box col-xs-6">

                <div class="panel-content bg-white">
                    <canvas id="icon-cloud" width="80" height="80"></canvas>
                </div>
                <div class="panel-content bg-black">
                    <div class="center-vertical">

                        <ul class="center-content nav nav-justified">
                            <li>
                                <h4>
                                    <i class="glyph-icon font-green opacity-80 icon-chevron-down"></i>
                                    7 &ordm;
                                </h4>
                                <p class="opacity-80 text-transform-upr font-size-11 mrg5T">Low</p>
                            </li>
                            <li>
                                <h4>
                                    <i class="glyph-icon font-red opacity-80 icon-chevron-up"></i>
                                    21 &ordm;
                                </h4>
                                <p class="opacity-80 text-transform-upr font-size-11 mrg5T">High</p>
                            </li>
                        </ul>

                    </div>
                </div>

            </div>
            <div class="panel-box col-xs-6 bg-blue-alt">
                <div class="panel-content">
                    <h3>Bucharest</h3>
                    <h4 class="opacity-60">Romania</h4>
                </div>
            </div>
        </div>



    </div>
</div>

                    </div>

                

            </div>
        </div>
    </div>


    <!-- WIDGETS -->

<script type="text/javascript" src="../../assets/bootstrap/js/bootstrap.js"></script>

<!-- Bootstrap Dropdown -->

<!-- <script type="text/javascript" src="../../assets/widgets/dropdown/dropdown.js"></script> -->

<!-- Bootstrap Tooltip -->

<!-- <script type="text/javascript" src="../../assets/widgets/tooltip/tooltip.js"></script> -->

<!-- Bootstrap Popover -->

<!-- <script type="text/javascript" src="../../assets/widgets/popover/popover.js"></script> -->

<!-- Bootstrap Progress Bar -->

<script type="text/javascript" src="../../assets/widgets/progressbar/progressbar.js"></script>

<!-- Bootstrap Buttons -->

<!-- <script type="text/javascript" src="../../assets/widgets/button/button.js"></script> -->

<!-- Bootstrap Collapse -->

<!-- <script type="text/javascript" src="../../assets/widgets/collapse/collapse.js"></script> -->

<!-- Superclick -->

<script type="text/javascript" src="../../assets/widgets/superclick/superclick.js"></script>

<!-- Input switch alternate -->

<script type="text/javascript" src="../../assets/widgets/input-switch/inputswitch-alt.js"></script>

<!-- Slim scroll -->

<script type="text/javascript" src="../../assets/widgets/slimscroll/slimscroll.js"></script>

<!-- Slidebars -->

<script type="text/javascript" src="../../assets/widgets/slidebars/slidebars.js"></script>
<script type="text/javascript" src="../../assets/widgets/slidebars/slidebars-demo.js"></script>

<!-- PieGage -->

<script type="text/javascript" src="../../assets/widgets/charts/piegage/piegage.js"></script>
<script type="text/javascript" src="../../assets/widgets/charts/piegage/piegage-demo.js"></script>

<!-- Screenfull -->

<script type="text/javascript" src="../../assets/widgets/screenfull/screenfull.js"></script>

<!-- Content box -->

<script type="text/javascript" src="../../assets/widgets/content-box/contentbox.js"></script>

<!-- Overlay -->

<script type="text/javascript" src="../../assets/widgets/overlay/overlay.js"></script>

<!-- Widgets init for demo -->

<script type="text/javascript" src="../../assets/js-init/widgets-init.js"></script>

<!-- Theme layout -->

<script type="text/javascript" src="../../assets/themes/admin/layout.js"></script>

<!-- Theme switcher -->

<script type="text/javascript" src="../../assets/widgets/theme-switcher/themeswitcher.js"></script>

</div>
</body>
</html>