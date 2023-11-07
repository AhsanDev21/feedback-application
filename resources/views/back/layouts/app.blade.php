<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Feedback Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- App favicon -->
    <link rel="shortcut icon" href="/back/assets/images/favicon-32x32.png">

    <!-- Bootstrap Css -->
    <link href="/back/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="/back/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="/back/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <!-- Custom Css-->
    <link href="/back/assets/css/custom.css" id="app-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/back/assets/toastr/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <script src="/back/assets/libs/jquery/jquery.min.js"></script>

</head>


<body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">


        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="{{ route('back.dashboard') }}" class="logo logo-dark">
                            <span class="logo-sm">
                            </span>
                            <span class="logo-lg">
                            </span>
                        </a>


                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                </div>

                <div class="d-flex">

                    <div class="dropdown d-inline-block d-lg-none ms-2">
                        <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-magnify"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">

                            <form class="p-3">
                                <div class="form-group m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{Auth::user()->name}}</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('back.logoutPost') }}">
                                @csrf
                                <button class="dropdown-item text-danger" type="submit"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> Logout</button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title" key="t-menu">Menu</li>

                        <li>
                            <a href="{{ route('back.dashboard') }}" class="waves-effect">
                                <i class="bx bx-home-circle"></i>
                                <span key="t-calendar">Dashboard</span>
                            </a>
                        </li>

                        <li class="menu-title" key="t-apps">Modules</li>
                        <li>
                            <a href="{{ route('back.user_list') }}" >
                                <i class="bx bx-bitcoin"></i>
                                <span key="t-crypto">User List</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('back.feedback_list') }}" >
                                <i class="bx bx-bitcoin"></i>
                                <span key="t-crypto">Feedback List</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('back.comment_list') }}" >
                                <i class="bx bx-bitcoin"></i>
                                <span key="t-crypto">Comment List</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            @yield('content')
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Feedback Online.
                        </div>

                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->

    <script src="/back/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/back/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="/back/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="/back/assets/libs/node-waves/waves.min.js"></script>

    <script src="/back/assets/toastr/toastr.min.js"></script><!-- TOASTR -->


    <!-- dashboard init -->
    <script src="/back/assets/js/pages/dashboard.init.js"></script>

    <!-- App js -->
    <script src="/back/assets/js/app.js"></script>

    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
</body>

</html>
