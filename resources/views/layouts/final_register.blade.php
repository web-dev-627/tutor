<!DOCTYPE html>
<html>

<head>
    <title>Tutor Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/design.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fileinput.min.css') }}">

    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/register.css" rel="stylesheet">

    <!-- responsive tag -->
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/fav.png">
    <!-- Bootstrap v4.4.1 css -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <!-- animate css -->
    <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
    <!-- owl.carousel css -->
    <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.css">
    <!-- off canvas css -->
    <link rel="stylesheet" type="text/css" href="assets/css/off-canvas.css">
    <!-- flaticon css  -->
    <link rel="stylesheet" type="text/css" href="assets/fonts/flaticon.css">
    <!-- Main Menu css -->
    <link rel="stylesheet" href="assets/css/scmenu-main.css">
    <!-- spacing css -->
    <link rel="stylesheet" type="text/css" href="assets/css/sc-spacing.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="/style1.css">
    <!-- This stylesheet dynamically changed from style.less -->
    <!-- responsive css -->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="assets/css/toastr.min.css">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"> --}}
    <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
   <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->



</head>

<body>

    <!-- nav bar-->
    <div class="full-width-header   header-style1 home1-modifiy">
        <!--Header Start-->
        <header id="sc-header" class="sc-header">
            <!-- Topbar Area Start -->
            <section class="loader_first">
                <div class="circular-spinner"></div>
            </section>
            <div class="topbar-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-11">
                            <ul class="topbar-contact">
                                <li>
                                    <i class="flaticon flaticon-call"></i>
                                    <a href="tel:+(111)256352">Call: +(111)256 352</a>
                                </li>
                                <li>
                                    <i class="flaticon flaticon-mail"></i>
                                    <a href="mailto:support@rstheme.com">support@softcoders.net</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-md-1 text-end">
                            @if (Auth::guest())
                                <ul class="topbar-right">
                                    <li class="login-register">
                                        <i class="fa fa-sign-in"></i>
                                        <a href="/login">Login</a> / <a href="/register">Register</a>
                                    </li>
                                </ul>
                            @else
                            <div class="dropdown">
                                <a class="dropdown-toggle" type="button" id="userdropdown" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="userdropdown-menu dropdown-menu dashboard_dropdown" aria-labelledby="userdropdown">
                                    <li class="dropdown-item">
                                        <i class="fa fa-dashboard"></i>
                                        <a href="/dashboard">Dashboard</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <i class="fa fa-sign-out"></i>
                                        <a href="{{ url('/logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                            style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- Topbar Area End -->

            <!-- Menu Start -->
            <div class="menu-area menu-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="logo-cat-wrap">
                                <div class="logo-part">
                                    <a href="/home">
                                        <img src="assets/images/logo.png" alt="Logo">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 align-items-center d-flex text-end justify-content-end">
                            <div class="sc-menu-area">
                                <div class="main-menu">
                                    <div class="mobile-menu">
                                        <a class="sc-menu-toggle">
                                            <i class="fa fa-bars"></i>
                                        </a>
                                    </div>
                                    <nav class="sc-menu">
                                        <ul class="nav-menu">
                                            <li class="menu-item-has-children current-menu-item"> <a href="/home">Find
                                                    Tutors</a>
                                            </li>
                                            <li><a href="/about">Enterprise</a> </li>


                                            <li class="menu-item-has-children">
                                                <a href="/register_tutor">Become a tutor</a>
                                            </li>
                                        </ul> <!-- //.nav-menu -->
                                    </nav>
                                </div> <!-- //.main-menu -->
                            </div>
                            <div class="expand-btn-inner text-end">
                                <span>
                                    <a id="nav-expander" class="nav-expander">
                                        <span class="dot1"></span>
                                        <span class="dot2"></span>
                                        <span class="dot3"></span>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Menu End -->

            <!-- Canvas Menu start -->
            <nav class="right_menu_togle hidden-md">
                <div class="close-btn">
                    <div id="nav-close">
                        <div class="line">
                            <span class="line1"></span><span class="line2"></span>
                        </div>
                    </div>
                </div>
                <div class="canvas-logo">
                    <a href="/home"><img src="assets/images/logo.png" alt="logo"></a>
                </div>
                <div class="offcanvas-text">
                    <p>“Fabulous service, wonderful customer service. Tutors are absolutely excellent, We would
                        recommend them to anyone.”

                </div>
                <ul class="address-widget">
                    <li>
                        <i class="flaticon flaticon-call"></i>
                        <a href="tel:+(111)256352">Call: +(111)256 352</a>
                    </li>
                    <li>
                        <i class="flaticon flaticon-mail"></i>
                        <a href="mailto:infosimple@gmail.com">infosimple@gmail.com</a>
                    </li>
                    <li>

                        <div class="desc">
                            <i class="flaticon flaticon-maps-and-flags"></i>
                            777 French
                        </div>
                    </li>
                </ul>
                <div class="canvas-contact">
                    <ul class="social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </nav>
            <!-- Canvas Menu end -->
        </header>
        <!--Header End-->
    </div>
    <!--Full width header End-->



    <div class="whole-container">
        <div class="container">

            @yield('content')

        </div>
    </div>
    <!-- Footer Secton Start -->
    <footer id="sc-footer" class="sc-footer footer-bg-image arrow-animation-1">
        <div class="container">
            <div class="footer-newsletter">
                <div class="row align-items-center">
                    <div class="col-md-6 sm-mb-26">
                        <h3 class="title white-color mb-0">Subscribe Our Newsletter</h3>
                        <div class="des">Excepteur sint occaecat cupidatat non proident, sunt in </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <form class="newsletter-form">
                            <input type="email" name="email" placeholder="Your email address" required="">
                            <button type="submit">Subscribe <i class="flaticon flaticon-right-arrow"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="footer-content pt-62 pb-70 md-pb-5">
                <div class="row">
                    <div class="col-lg-4 footer-widget">
                        <div class="about-widget pr-15">
                            <div class="logo-part mb-30">
                                <a href="index.html"><img src="assets/images/white-logo.png" alt="Footer Logo"></a>
                            </div>
                            <p class="desc">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                deserunt mollit anim id est laborum."</p>
                            <h4 class="social-title white-color">Follow Us</h4>
                            <ul class="footer-social">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 md-mb-32 footer-widget md-mt-45">
                        <h4 class="widget-title">Company</h4>
                        <ul class="widget-menu">
                            <li><a href="#">Features</a></li>
                            <li><a href="#">Course</a></li>
                            <li><a href="#">Learning</a></li>
                            <li><a href="#">Testiminial</a></li>
                            <li><a href="#">News</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 md-mb-32 footer-widget">
                        <h4 class="widget-title">Learn Course</h4>
                        <ul class="widget-menu">
                            <li><a href="#">General Education</a></li>
                            <li><a href="#">Computer Science</a></li>
                            <li><a href="#">Civil Engineering</a></li>
                            <li><a href="#">Artificial Intelligence</a></li>
                            <li><a href="#">Business Studies</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 md-mb-32 footer-widget">
                        <h4 class="widget-title">Contact Info</h4>
                        <ul class="address-widget pr-40">
                            <li>
                                <i class="flaticon flaticon-call"></i>
                                <a href="tel:+(111)256352">Call: +(111)256 352</a>
                            </li>
                            <li>
                                <i class="flaticon flaticon-mail"></i>
                                <a href="mailto:infosimple@gmail.com">infosimple@gmail.com</a>
                            </li>
                            <li>
                                <i class="flaticon flaticon-maps-and-flags"></i>
                                <div class="desc">
                                    777 From French
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 sm-mb-10 text-md-start">
                        <div class="copyright">
                            <p>© Copyright 2021 TOWARDS. All Rights Reserved.</p>
                        </div>
                    </div>
                    <div class="col-md-6 text-end">
                        <ul class="copyright-menu">
                            <li><a href="./assets/pdf/Toward-Terms-of-Service.pdf">Terms of Service</a></li>
                            <li><a href="./assets/pdf/Privacy_Policy.pdf">Privacy Policy</a></li>
                            <li><a href="./assets/pdf/cookie_Policy.pdf">Cookie Policy</a></li>
                            <li><a href="./assets/pdf/Payment_Policy.pdf">Refund Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="animated-arrow-1 animated-arrow left-right-new">
            <img src="assets/images/arrow-8.png" alt="">
        </div>
        <div class="animated-arrow-2 animated-arrow up-down-new">
            <img src="assets/images/arrow-9.png" alt="">
        </div>

        <div class="animated-arrow-3 animated-arrow up-down-new">
            <img src="assets/images/arrow-3.png" alt="">
        </div>
        <div class="animated-arrow-4 animated-arrow left-right-new">
            <img src="assets/images/arrow-7.png" alt="">
        </div>
    </footer>
    <!-- Footer Secton End -->

    <!-- start scrollUp  -->
    <div id="scrollUp">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- End scrollUp  -->

    <!-- Search Modal Start -->
    <div aria-hidden="true" id="search-modal" class="modal fade search-modal" role="dialog" tabindex="-1">

        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <i class="flaticon-close"></i>
        </button>


        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="search-block clearfix">
                    <form>
                        <div class="form-group">
                            <input class="form-control" placeholder="Search Here..." type="text">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Modal End -->


    <script src="assets/js/modernizr-2.8.3.min.js"></script>
    <!-- jquery latest version -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Bootstrap v4.4.1 js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Menu js -->
    <script src="assets/js/scmenu-main.js"></script>
    <!-- owl.carousel js -->
    <script src="assets/js/owl.carousel.min.js"></script>
    <!-- isotope.pkgd.min js -->
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <!-- imagesloaded.pkgd.min js -->
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <!-- wow js -->
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <!-- counter top js -->
    <script src="assets/js/waypoints.min.js"></script>
    <!-- plugins js -->
    <script src="assets/js/plugins.js"></script>
    <!-- contact form js -->
    <script src="assets/js/c"></script>
    <!-- main js -->
    <script src="assets/js/main1.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/fileinput.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>
        $(document).ready(function() {
            //hide loading animation
            $('.overlay').hide();
            $('.sk-folding-cube').hide();
            $('.select2').select2({
                closeOnSelect: true
            });
        });
        // when called, will show loading animation
        function showLoad($msg) {
            if ($msg != null)
                return confirm($msg);
            $('.overlay').show();
            $('.sk-folding-cube').show();
        }
        $(document).ready(function() {});
    </script>

    @stack('scripts')

</body>
