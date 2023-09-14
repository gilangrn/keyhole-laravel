<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{ $title }} </title>
    <link rel="icon" href="/customer-assets/img/Fevicon.png" type="image/png">
    <link rel="stylesheet" href="/customer-assets/vendors/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/customer-assets/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="/customer-assets/vendors/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="/customer-assets/vendors/nice-select/nice-select.css">
    <link rel="stylesheet" href="/customer-assets/vendors/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="/customer-assets/vendors/owl-carousel/owl.carousel.min.css">

    <link rel="stylesheet" href="/customer-assets/css/style.css">
</head>

<body>
    <!--================ Start Header Menu Area =================-->
    <header class="header_area">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <a class="navbar-brand logo_h" href="index.html"><img src="/customer-assets/img/logo.png"
                            alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="/">Home</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('blog') }}">Blog</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('order') }}">Order</a>
                            </li>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                        </ul>

                        <ul class="nav-shop">
                            <li class="nav-item"><button><i class="ti-search"></i></button></li>
                            <li class="nav-item"><a href="{{ route('cart') }}"><i class="ti-shopping-cart"></i></a></li>
                            @if (Auth::check())
                                <li class="nav-item"><a class="button button-header"
                                        href="/logout">Logout</a></li>
                            @else
                                <li class="nav-item"><a class="button button-header"
                                        href="{{ route('login') }}">Login</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--================ End Header Menu Area =================-->

    @yield('content')

    <!--================ Start footer Area  =================-->
    <footer class="footer">
        <div class="footer-area">
            <div class="container">
                <div class="row section_gap">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget tp_widgets">
                            <h4 class="footer_title large_title">Our Mission</h4>
                            <p>
                                So seed seed green that winged cattle in. Gathering thing made fly you're no
                                divided deep moved us lan Gathering thing us land years living.
                            </p>
                            <p>
                                So seed seed green that winged cattle in. Gathering thing made fly you're no divided
                                deep moved
                            </p>
                        </div>
                    </div>
                    <div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6">
                        <div class="single-footer-widget tp_widgets">
                            <h4 class="footer_title">Quick Links</h4>
                            <ul class="list">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Shop</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Product</a></li>
                                <li><a href="#">Brand</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="single-footer-widget instafeed">
                            <h4 class="footer_title">Gallery</h4>
                            <ul class="list instafeed d-flex flex-wrap">
                                <li><img src="/customer-assets/img/gallery/r1.jpg" alt=""></li>
                                <li><img src="/customer-assets/img/gallery/r2.jpg" alt=""></li>
                                <li><img src="/customer-assets/img/gallery/r3.jpg" alt=""></li>
                                <li><img src="/customer-assets/img/gallery/r5.jpg" alt=""></li>
                                <li><img src="/customer-assets/img/gallery/r7.jpg" alt=""></li>
                                <li><img src="/customer-assets/img/gallery/r8.jpg" alt=""></li>
                            </ul>
                        </div>
                    </div>
                    <div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget tp_widgets">
                            <h4 class="footer_title">Contact Us</h4>
                            <div class="ml-40">
                                <p class="sm-head">
                                    <span class="fa fa-location-arrow"></span>
                                    Head Office
                                </p>
                                <p>123, Main Street, Your City</p>

                                <p class="sm-head">
                                    <span class="fa fa-phone"></span>
                                    Phone Number
                                </p>
                                <p>
                                    +123 456 7890 <br>
                                    +123 456 7890
                                </p>

                                <p class="sm-head">
                                    <span class="fa fa-envelope"></span>
                                    Email
                                </p>
                                <p>
                                    free@infoexample.com <br>
                                    www.infoexample.com
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row d-flex">
                    <p class="col-lg-12 footer-text text-center">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>2020 All rights reserved<br>
                        <a href="https://colorlib.com"
                            target="_blank">Colorlib</a><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!--================ End footer Area  =================-->



    <script src="/customer-assets/vendors/jquery/jquery-3.2.1.min.js"></script>
    <script src="/customer-assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="/customer-assets/vendors/skrollr.min.js"></script>
    <script src="/customer-assets/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="/customer-assets/vendors/nice-select/jquery.nice-select.min.js"></script>
    <script src="/customer-assets/vendors/jquery.ajaxchimp.min.js"></script>
    <script src="/customer-assets/vendors/mail-script.js"></script>
    <script src="/customer-assets/js/main.js"></script>
</body>

</html>
