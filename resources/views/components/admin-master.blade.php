<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-default"
      data-assets-path="../../assets/" data-template="vertical-menu-template">


<!-- Mirrored from demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Apr 2022 19:22:41 GMT -->
<head>
    <meta charset="utf-8"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description"
          content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!"/>
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon"
          href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/img/favicon/favicon.ico"/>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('../../assets/vendor/fonts/boxicons.css')}}"/>
    <link rel="stylesheet" href="{{asset('../../assets/vendor/fonts/fontawesome.css')}}"/>
    <link rel="stylesheet" href="{{asset('../../assets/vendor/fonts/flag-icons.css')}}"/>

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('../../assets/vendor/css/rtl/core.css')}}"
          class="template-customizer-core-css"/>
    <link rel="stylesheet" href="{{asset('../../assets/vendor/css/rtl/theme-default.css')}}"
          class="template-customizer-theme-css"/>
    <link rel="stylesheet" href="{{asset('../../assets/css/demo.css')}}"/>

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}"/>
    <link rel="stylesheet" href="{{asset('../../assets/vendor/libs/typeahead-js/typeahead.css')}}"/>
    <link rel="stylesheet" href="{{asset('../../assets/vendor/libs/apex-charts/apex-charts.css')}}"/>
    @yield('style')
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{asset('../../assets/vendor/js/helpers.js')}}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
{{--    <script src="{{asset('../../assets/vendor/js/template-customizer.js')}}"></script>--}}
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('../../assets/js/config.js')}}"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="async" src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', 'GA_MEASUREMENT_ID');
    </script>
    <!-- Custom notification for demo -->
    <!-- beautify ignore:end -->

</head>

<body>
    @include('sweetalert::alert')

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar  ">
        <div class="layout-container">


            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo ">
                    <a href="/home" class="app-brand-link">
                        <span class="app-brand-logo demo">

                            <img src="../../assets/img/illustrations/training-removebg-preview.png" alt="training portal" class="w-50" style="margin-right: 15px;margin-top:20px">
                        </span></a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>
                <div class="menu-inner-shadow"></div>
                <ul class="menu-inner py-1">
                    <!-- Apps & Pages -->
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Manage</span>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-user"></i>
                            <div data-i18n="Manage Department-Chief">Manage Department-Chief</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{route('admins.create')}}" class="menu-link">
                                    <div data-i18n="Create Department-Chief">Create Department-Chief</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('admins.index')}}" class="menu-link">
                                    <div data-i18n="View All Department-Chief">View All Department-Chief</div>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-user"></i>
                            <div data-i18n="Manage Students">Manage Students</div>
                        </a>
                        <ul class="menu-sub">
                            
                            <li class="menu-item">
                                <a href="{{route('users.index')}}" class="menu-link">
                                    <div data-i18n="View All students">View All students</div>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class='menu-icon tf-icons bx bx-check-shield'></i>
                            <div data-i18n="Manage Companies">Manage Companies</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{route('adminCompanies.index')}}" class="menu-link">
                                    <div data-i18n="View All">View All</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('adminCompanies.create')}}" class="menu-link">
                                    <div data-i18n="Create Company">Create Company</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-user"></i>
                            <div data-i18n="Manage Requests">Manage Requests</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{route('show_pendingRequest')}}" class="menu-link">
                                    <div data-i18n="View Pending Requests">View Pending Requests</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('showAccepted')}}" class="menu-link">
                                    <div data-i18n="Show Accepted Requests">Show Accepted Requests</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('showRejected')}}" class="menu-link">
                                    <div data-i18n="Show Rejected Requests">Show Rejected Requests</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-user"></i>
                            <div data-i18n="Manage Supervisor">Manage Supervisors</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{route('Supervisors.create')}}" class="menu-link">
                                    <div data-i18n="Create Supervisor">Create Supervisor</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('Supervisors.index')}}" class="menu-link">
                                    <div data-i18n="View All Supervisors">View All Supervisors</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('assignSupervisorPage')}}" class="menu-link">
                                    <div data-i18n="Assign Supervisor">Assign Supervisor</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-user"></i>
                            <div data-i18n="Manage Opportunities">Manage Opportunities</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{route('create.Opportunity')}}" class="menu-link">
                                    <div data-i18n="Create Opportunity">Create Opportunity</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('show.Opportunities')}}" class="menu-link">
                                    <div data-i18n="View All Opportunities">View All Opportunities</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                </ul>
            </aside>
            <!-- / Menu -->


            <!-- Layout container -->
            <div class="layout-page">


                <!-- Navbar -->


                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">


                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>


                    <div class="navbar-nav-right d-flex align-items-center" style=" justify-content: space-between;" id="navbar-collapse">


                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item navbar-search-wrapper mb-0">
                                <a class="nav-item nav-link search-toggler px-0" href="javascript:void(0);">
                                    <i class="bx bx-search bx-sm"></i>
                                    <span class="d-none d-md-inline-block text-muted">Search (Ctrl+/)</span>
                                </a>
                            </div>
                        </div>
                        <!-- /Search -->
                        <div class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>


                     
                    </div>


                    <!-- Search Small Screens -->
                    <div class="navbar-search-wrapper search-input-wrapper  d-none">
                        <input type="text" class="form-control search-input container-xxl border-0" placeholder="Search..." aria-label="Search...">
                        <i class="bx bx-x bx-sm search-toggler cursor-pointer"></i>
                    </div>


                </nav>


                <!-- / Navbar -->


                <!-- Content wrapper -->
                <div class="content-wrapper2" >

                    <!-- Content -->
                    @yield('content')

                    <!-- / Content -->


              


                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>


        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>


        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>

    </div>
    <!-- / Layout wrapper -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{asset('../../assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('../../assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('../../assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

    <script src="{{asset('../../assets/vendor/libs/hammer/hammer.js')}}"></script>
    <script src="{{asset('../../assets/vendor/libs/i18n/i18n.js')}}"></script>
    <script src="{{asset('../../assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>

    <script src="{{asset('../../assets/vendor/js/menu.js')}}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{asset('../../assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

    <!-- Main JS -->
    <script src="{{asset('../../assets/js/main.js')}}"></script>

    <!-- Page JS -->
    <script src="{{asset('../../assets/js/dashboards-analytics.js')}}"></script>
    @yield('script')
</body>


<!-- Mirrored from demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Apr 2022 19:23:34 GMT -->

</html>