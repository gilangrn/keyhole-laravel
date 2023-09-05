<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title> {{ $title }} </title>
    <link rel="icon" type="image/png" sizes="16x16" href="/customer-assets/img/Fevicon.png">
    <link href="/admin-assets/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/admin-assets/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="/admin-assets/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <link href="/admin-assets/css/style.css" rel="stylesheet">

</head>

<body>
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3"
                    stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <div id="main-wrapper">

        <div class="nav-header">
            <div class="brand-logo">
                <a href="/admin/dashboard">
                    <b class="logo-abbr"><img src="/admin-assets/images/logo.png" alt=""> </b>
                    <span class="logo-compact"><img src="/admin-assets/images/logo-compact.png" alt=""></span>
                    <span class="brand-title">
                        <img src="/admin-assets/images/logo-text.png" alt="">
                    </span>
                </a>
            </div>
        </div>
        <div class="header">
            <div class="header-content clearfix">

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i
                                    class="mdi mdi-magnify"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="Search Dashboard"
                            aria-label="Search Dashboard">
                        <div class="drop-down animated flipInX d-md-none">
                            <form action="#">
                                <input type="text" class="form-control" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="/admin-assets/images/user/1.png" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li><a href="page-login.html"><i class="icon-key"></i> <span>Logout</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>
                    <li>
                        <a href="/admin/dashboard" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/order" aria-expanded="false">
                            <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Order</span>
                        </a>
                    </li>
                    <li class="nav-label">Settings</li>
                    <li>
                        <a href="/admin/category" aria-expanded="false">
                            <i class="icon-screen-tablet menu-icon"></i><span class="nav-text">Category</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/product" aria-expanded="false">
                            <i class="icon-screen-tablet menu-icon"></i><span class="nav-text">Product</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/payment" aria-expanded="false">
                            <i class="icon-envelope menu-icon"></i><span class="nav-text">Payment</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/delivery" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Delivery</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/user" aria-expanded="false">
                            <i class="icon-graph menu-icon"></i><span class="nav-text">Users</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        @yield('content')

        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a>
                    2018</p>
            </div>
        </div>
    </div>
    <script src="/admin-assets/plugins/common/common.min.js"></script>
    <script src="/admin-assets/js/custom.min.js"></script>
    <script src="/admin-assets/js/settings.js"></script>
    <script src="/admin-assets/js/gleek.js"></script>
    <script src="/admin-assets/js/styleSwitcher.js"></script>
    <script src="/admin-assets/plugins/chart.js/Chart.bundle.min.js"></script>
    <script src="/admin-assets/plugins/circle-progress/circle-progress.min.js"></script>
    <script src="/admin-assets/plugins/d3v3/index.js"></script>
    <script src="/admin-assets/plugins/topojson/topojson.min.js"></script>
    <script src="/admin-assets/plugins/datamaps/datamaps.world.min.js"></script>
    <script src="/admin-assets/plugins/raphael/raphael.min.js"></script>
    <script src="/admin-assets/plugins/morris/morris.min.js"></script>
    <script src="/admin-assets/plugins/moment/moment.min.js"></script>
    <script src="/admin-assets/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <script src="/admin-assets/plugins/chartist/js/chartist.min.js"></script>
    <script src="/admin-assets/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>
    <script src="/admin-assets/js/dashboard/dashboard-1.js"></script>
</body>

</html>
