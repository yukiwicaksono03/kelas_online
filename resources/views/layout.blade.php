<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Gosimply Class</title>
    <meta name="description" content="SkillGro - Online Courses & Education Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{!! asset('assets/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/animate.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/magnific-popup.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/fontawesome-all.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/flaticon-skillgro.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/swiper-bundle.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/default-icons.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/select2.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/odometer.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/aos.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/spacing.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/tg-cursor.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/main.css') !!}">
</head>

<body>

    <!--Preloader-->
    <!-- <div id="preloader">
        <div id="loader" class="loader">
            <div class="loader-container">
                <div class="loader-icon"><img src="{!! asset('assets/img/logo/preloader.png') !!}" alt="Preloader"></div>
            </div>
        </div>
    </div> -->
    <!--Preloader-end -->

    <!-- Scroll-top -->
    <button class="scroll__top scroll-to-target" data-target="html">
        <i class="tg-flaticon-arrowhead-up"></i>
    </button>
    <!-- Scroll-top-end-->

    <!-- header-area -->
    <header>
        <!-- <div class="tg-header__top">
            <div class="container custom-container">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="tg-header__top-info list-wrap">
                            <li><img src="{!! asset('assets/img/icons/map_marker.svg') !!}" alt="Icon"> <span>589 5th Ave, NY 10024, USA</span></li>
                            <li><img src="{!! asset('assets/img/icons/envelope.svg') !!}" alt="Icon"> <a href="mailto:info@skillgrodemo.com">info@skillgrodemo.com</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="tg-header__top-right">
                            <div class="tg-header__phone">
                                <img src="{!! asset('assets/img/icons/phone.svg') !!}" alt="Icon">Call us: <a href="tel:0123456789">+123 599 8989</a>
                            </div>
                            <ul class="tg-header__top-social list-wrap">
                                <li>Follow Us On :</li>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div id="header-fixed-height"></div>
        <div id="sticky-header" class="tg-header__area">
            <div class="container custom-container">
                <div class="row">
                    <div class="col-12">
                        <div class="tgmenu__wrap">
                            <nav class="tgmenu__nav">
                                <div class="logo">
                                    <a href="index.html"><img src="{!! asset('assets/img/logo/logo.svg') !!}" alt="Logo"></a>
                                </div>
                                <div class="tgmenu__navbar-wrap tgmenu__main-menu d-none d-xl-flex">
                                    <ul class="navigation">
                                        <li class=""><a href="/">Home</a>
                                            <!-- <ul class="sub-menu">
                                                <li class="active"><a href="index.html">Home One</a></li>
                                                <li><a href="index-2.html">Home Two</a></li>
                                            </ul> -->
                                        </li>
                                        <li class="navigation"><a href="/courses/0">Courses</a>
                                        </li>
                                        <!-- <li class="navigation"><a href="/courses">Kategori</a>
                                        </li> -->
                                        <!-- <li class="menu-item-has-children"><a href="#">Courses</a>
                                            <ul class="sub-menu">
                                                <li><a href="courses.html">All Courses</a></li>
                                                <li><a href="course-details.html">Course Details</a></li>
                                            </ul>
                                        </li> -->
                                        <!-- <li class="menu-item-has-children"><a href="#">Pages</a>
                                            <ul class="sub-menu">
                                                <li><a href="about-us.html">About Us</a></li>
                                                <li><a href="instructors.html">Our Instructors</a></li>
                                                <li><a href="instructor-details.html">Instructor Details</a></li>
                                                <li><a href="events.html">Our Events</a></li>
                                                <li><a href="events-details.html">Event Details</a></li>
                                                <li><a href="login.html">Student Login</a></li>
                                                <li><a href="registration.html">Student Registration</a></li>
                                                <li><a href="404.html">404 Page</a></li>
                                                <li><a href="contact.html">contact</a></li>
                                            </ul>
                                        </li> -->
                                        <!-- <li class="menu-item-has-children"><a href="#">Shop</a>
                                            <ul class="sub-menu">
                                                <li><a href="shop.html">Shop Page</a></li>
                                                <li><a href="shop-details.html">Shop Details</a></li>
                                            </ul>
                                        </li> -->
                                        <!-- <li class="menu-item-has-children"><a href="#">Blog</a>
                                            <ul class="sub-menu">
                                                <li><a href="blog.html">Blog Grid</a></li>
                                                <li><a href="blog-details.html">Blog Details</a></li>
                                            </ul>
                                        </li> -->
                                    </ul>
                                </div>
                                <div class="tgmenu__action">
                                    <ul class="list-wrap">
                                        <li class="wishlist-icon">
                                            <a href="shop.html" class="cart-count">
                                                <img src="{!! asset('assets/img/icons/heart.svg') !!}" class="injectable" alt="img">
                                                <span class="wishlist-count">0</span>
                                            </a>
                                        </li>
                                        <li class="mini-cart-icon">
                                            <a href="shop.html" class="cart-count">
                                                <img src="{!! asset('assets/img/icons/cart.svg') !!}" class="injectable" alt="img">
                                                <span class="mini-cart-count">0</span>
                                            </a>
                                        </li>
                                        <li class="header-btn login-btn">
                                            <a href="login.html">Log in</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="mobile-nav-toggler"><i class="tg-flaticon-menu-1"></i></div>
                            </nav>
                        </div>
                        <!-- Mobile Menu  -->
                        <div class="tgmobile__menu">
                            <nav class="tgmobile__menu-box">
                                <div class="close-btn"><i class="tg-flaticon-close-1"></i></div>
                                <div class="nav-logo">
                                    <a href="index.html"><img src="{!! asset('assets/img/logo/logo.svg') !!}" alt="Logo"></a>
                                </div>
                                <div class="tgmobile__search">
                                    <form action="#">
                                        <input type="text" placeholder="Search here...">
                                        <button><i class="fas fa-search"></i></button>
                                    </form>
                                </div>
                                <div class="tgmobile__menu-outer">
                                    <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                                </div>
                                <div class="social-links">
                                    <ul class="list-wrap">
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="tgmobile__menu-backdrop"></div>
                        <!-- End Mobile Menu -->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-area-end -->


    @yield("content")
    

    <!-- footer-area -->
    <footer class="footer__area">
        <div class="footer__top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="footer__widget">
                            <div class="logo mb-35">
                                <a href="index.html"><img src="{!! asset('assets/img/logo/logo.svg') !!}" alt="img"></a>
                            </div>
                            <div class="footer__content">
                                <p>when an unknown printer took galley of type and scrambled it to make pspecimen bookt has.</p>
                                <ul class="list-wrap">
                                    <li>Rengganis</li>
                                    <li>094864689</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="footer__widget">
                            <h4 class="footer__widget-title">Useful Links</h4>
                            <div class="footer__link">
                                <ul class="list-wrap">
                                    <li><a href="events-details.html">Our values</a></li>
                                    <li><a href="events-details.html">Our advisory board</a></li>
                                    <li><a href="events-details.html">Our partners</a></li>
                                    <li><a href="events-details.html">Become a partner</a></li>
                                    <li><a href="events-details.html">Work at Future Learn</a></li>
                                    <li><a href="events-details.html">Quizlet Plus</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="footer__widget">
                            <h4 class="footer__widget-title">Our Company</h4>
                            <div class="footer__link">
                                <ul class="list-wrap">
                                    <li><a href="contact.html">Contact Us</a></li>
                                    <li><a href="instructor-details.html">Become Teacher</a></li>
                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="instructor-details.html">Instructor</a></li>
                                    <li><a href="events-details.html">Events</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="footer__widget">
                            <h4 class="footer__widget-title">Get In Touch</h4>
                            <div class="footer__contact-content">
                                <p>when an unknown printer took <br> galley type and scrambled</p>
                                <ul class="list-wrap footer__social">
                                    <li>
                                        <a href="https://www.facebook.com/" target="_blank">
                                            <img src="{!! asset('assets/img/icons/facebook.svg') !!}" alt="img" class="injectable">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.facebook.com/" target="_blank">
                                            <img src="{!! asset('assets/img/icons/twitter.svg') !!}" alt="img" class="injectable">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.facebook.com/" target="_blank">
                                            <img src="{!! asset('assets/img/icons/whatsapp.svg') !!}" alt="img" class="injectable">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.facebook.com/" target="_blank">
                                            <img src="{!! asset('assets/img/icons/instagram.svg') !!}" alt="img" class="injectable">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.facebook.com/" target="_blank">
                                            <img src="{!! asset('assets/img/icons/youtube.svg') !!}" alt="img" class="injectable">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="app-download">
                                <a href="#"><img src="{!! asset('assets/img/others/google-play.svg') !!}" alt="img"></a>
                                <a href="#"><img src="{!! asset('assets/img/others/apple-store.svg') !!}" alt="img"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <div class="copy-right-text">
                            <p>© Gosimply Kids</p>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="footer__bottom-menu">
                            <ul class="list-wrap">
                                <li><a href="contact.html">Term of Use</a></li>
                                <li><a href="contact.html">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer-area-end -->




    <!-- JS here -->
    <script src="{!! asset('assets/js/vendor/jquery-3.6.0.min.js') !!}"></script>
    <script src="{!! asset('assets/js/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('assets/js/imagesloaded.pkgd.min.js') !!}"></script>
    <script src="{!! asset('assets/js/jquery.magnific-popup.min.js') !!}"></script>
    <script src="{!! asset('assets/js/jquery.odometer.min.js') !!}"></script>
    <script src="{!! asset('assets/js/jquery.appear.js') !!}"></script>
    <script src="{!! asset('assets/js/tween-max.min.js') !!}"></script>
    <script src="{!! asset('assets/js/select2.min.js') !!}"></script>
    <script src="{!! asset('assets/js/swiper-bundle.min.js') !!}"></script>
    <script src="{!! asset('assets/js/jquery.marquee.min.js') !!}"></script>
    <script src="{!! asset('assets/js/tg-cursor.min.js') !!}"></script>
    <script src="{!! asset('assets/js/vivus.min.js') !!}"></script>
    <script src="{!! asset('assets/js/ajax-form.js') !!}"></script>
    <script src="{!! asset('assets/js/svg') !!}-inject.min.js') !!}"></script>
    <script src="{!! asset('assets/js/jquery.circleType.js') !!}"></script>
    <script src="{!! asset('assets/js/jquery.lettering.min.js') !!}"></script>
    <script src="{!! asset('assets/js/wow.min.js') !!}"></script>
    <script src="{!! asset('assets/js/aos.js') !!}"></script>
    <script src="{!! asset('assets/js/main.js') !!}"></script>
</body>

</html>