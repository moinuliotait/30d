<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
          content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 4 admin, bootstrap 4, css3 dashboard, bootstrap 4 dashboard, materialpro admin bootstrap 4 dashboard, frontend, responsive bootstrap 4 admin template, materialpro admin lite design, materialpro admin lite dashboard bootstrap 4 dashboard template">
    <meta name="robots" content="noindex,nofollow">
    <title>Ramadan Mubarak</title>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
{{--    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">--}}
<!-- chartist CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/chartist-js/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/chartist-js/dist/chartist-init.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css') }}"
          rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="{{ asset('assets/plugins/c3-master/c3.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/style.min.css') }}" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
</head>

<body>
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar position-fixed w-100" data-navbarbg="skin6">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <div class="navbar-header" data-logobg="skin6">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <a class="navbar-brand ml-4" href="index.html">
                    <!-- Logo icon -->
                    <b class="logo-icon">
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <img src="{{ asset('assets/images/logo-light-icon.png') }}" alt="homepage" class="dark-logo"/>

                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="{{ asset('assets/images/logo-light-text.png') }}" alt="homepage"
                                 class="dark-logo"/>

                        </span>
                </a>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <a class="nav-toggler waves-effect waves-light text-white d-block d-md-none"
                   href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                <ul class="navbar-nav d-lg-none d-md-block ">
                    <li class="nav-item">
                        <a class="nav-toggler nav-link waves-effect waves-light text-white "
                           href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    </li>
                </ul>
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav mr-auto mt-md-0 ">
                    <!-- ============================================================== -->
                    <!-- Search -->
                    <!-- ============================================================== -->

                    {{--                        <li class="nav-item search-box">--}}
                    {{--                            <a class="nav-link text-muted" href="javascript:void(0)"><i class="ti-search"></i></a>--}}
                    {{--                            <form class="app-search" style="display: none;">--}}
                    {{--                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a--}}
                    {{--                                    class="srh-btn"><i class="ti-close"></i></a> </form>--}}
                    {{--                        </li>--}}
                </ul>

                <!-- ============================================================== -->
                <!-- Right side toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav text-right">
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown" id="userName">
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href=""
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                src="{{ asset('assets/images/users/1.jpg') }}" alt="user"
                                class="profile-pic m-r-10">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar position-fixed" data-sidebarbg="skin6">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <!-- User Profile-->
                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                href="index.html" aria-expanded="false"><i
                                class="mdi mr-2 mdi-gauge"></i><span
                                class="hide-menu">Dashboard</span></a></li>
                    <li class="sidebar-item"><a
                            class="sidebar-link waves-effect waves-dark sidebar-link {{ (request()->is('life-style*')) ? 'active':'' }}"
                            href="{{route('life-style')}}" aria-expanded="false">
                            <i class="mdi mr-2 mdi-account-check"></i><span class="hide-menu">Life Style</span></a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                href="table-basic.html" aria-expanded="false"><i
                                class="mdi mr-2 mdi-table"></i><span
                                class="hide-menu">Table</span></a></li>
                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                href="icon-material.html" aria-expanded="false"><i
                                class="mdi mr-2 mdi-emoticon"></i><span class="hide-menu">Icon</span></a></li>
                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                href="map-google.html" aria-expanded="false"><i
                                class="mdi mr-2 mdi-earth"></i><span
                                class="hide-menu">Google Map</span></a></li>
                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                href="pages-blank.html" aria-expanded="false"><i
                                class="mdi mr-2 mdi-book-open-variant"></i><span class="hide-menu">Blank</span></a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                href="pages-error-404.html" aria-expanded="false"><i
                                class="mdi mr-2 mdi-help-circle"></i><span
                                class="hide-menu">Error 404</span></a>
                    </li>
                </ul>

            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
        <div class="sidebar-footer">
            <div class="row">
                <div class="col-4 link-wrap">
                    <!-- item-->
                    <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Settings"><i
                            class="ti-settings"></i></a>
                </div>
                <div class="col-4 link-wrap">
                    <!-- item-->
                    <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i
                            class="mdi mdi-gmail"></i></a>
                </div>
                <div class="col-4 link-wrap">
                    <!-- item-->
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        @method('post')
                        <button class="link" data-toggle="tooltip" title="" data-original-title="Logout" type="submit"
                                id="logOutbutton"><i
                                class="mdi mdi-power"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
    {{--            <div class="page-breadcrumb">--}}
    {{--                <div class="row align-items-center">--}}
    {{--                    <div class="col-md-6 col-8 align-self-center">--}}
    {{--                        <h3 class="page-title mb-0 p-0">Dashboard</h3>--}}
    {{--                        <div class="d-flex align-items-center">--}}
    {{--                            <nav aria-label="breadcrumb">--}}
    {{--                                <ol class="breadcrumb">--}}
    {{--                                    <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
    {{--                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>--}}
    {{--                                </ol>--}}
    {{--                            </nav>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid mt-5">
            <div class="contentContainer">
                @yield('lifeStyle')
            </div>

        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer"> © 2021 Admin by <a href="https://iotait.tech">IOTA IT</a>
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset('assets/plugins/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/app-style-switcher.js') }}"></script>
<!--Wave Effects -->
<script src="{{ asset('assets/js/waves.js') }}"></script>
<!--Menu sidebar -->
<script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<!-- chartist chart -->
<script src="{{ asset('assets/plugins/chartist-js/dist/chartist.min.js') }}"></script>
<script src="{{ asset('assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js') }}"></script>
<!--c3 JavaScript -->
<script src="{{ asset('assets/plugins/d3/d3.min.js') }}"></script>
<script src="{{ asset('assets/plugins/c3-master/c3.min.js') }}"></script>
<!--Custom JavaScript -->
<script src="{{ asset('assets/js/pages/dashboards/dashboard1.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 150,
            dialogsInBody: true,
            callbacks:{
                onInit:function(){
                    $('body > .note-popover').hide();
                }
            },
        });
    });
</script>
@yield('script')
</body>

</html>
