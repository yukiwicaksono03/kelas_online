<!DOCTYPE html>
<html lang="zxx">

<head>

    <!-- Metas -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="keywords" content="Hitung Nikah">
    <meta name="description" content="Hitung Nikah">
    <meta name="author" content="">

    <!-- Title  -->
    <title>Hitung Nikah</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100;200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Plugins -->
    <link rel="stylesheet" href="{!! asset('assets/css/plugins.css') !!}">

    <!-- Core Style Css -->
    <link rel="stylesheet" href="{!! asset('assets/css/style.css') !!}">


    <style type="text/css">
        .icon-badge-group {
 
        }

        .icon-badge-group .icon-badge-container {
            display: inline-block;
            margin-left:15px;
        }

        .icon-badge-group .icon-badge-container:first-child { 
          margin-left:0
        }

        .icon-badge-container {
            margin-top:20px;
            position:relative;
        }

        .icon-badge-icon {
            font-size: 25px;
            position: relative;
        }

        .icon-badge {
            background-color: red;
            font-size: 12px;
            color: white;
            text-align: center;
            width:20px;
            height:20px;
            border-radius: 35%;
            position: absolute; /* changed */
            top: -5px; /* changed */
            left: 18px; /* changed */
        }
    </style>
</head>

<body class="sub-bg">


    <!-- ==================== Start Loading ==================== -->

    <div class="loader-wrap">
        <svg viewBox="0 0 1000 1000" preserveAspectRatio="none">
            <path id="svg" d="M0,1005S175,995,500,995s500,5,500,5V0H0Z"></path>
        </svg>

        <div class="loader-wrap-heading">
            <div class="load-text">
                <span>H</span>
                <span>I</span>
                <span>T</span>
                <span>U</span>
                <span>N</span>
                <span>G</span>
                <span></span>
                <span>N</span>
                <span>I</span>
                <span>K</span>
                <span>A</span>
                <span>H</span>
            </div>
        </div>
    </div>

    <!-- ==================== End Loading ==================== -->


    <div class="cursor"></div>


    <!-- ==================== Start progress-scroll-button ==================== -->

    <div class="progress-wrap cursor-pointer">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

    <!-- ==================== End progress-scroll-button ==================== -->



    <!-- ==================== Start Navbar ==================== -->

    <nav class="navbar navbar-expand-lg static main-bg">
        <div class="container">

            <!-- Logo -->
            <a class="logo icon-img-100" href="#">
                
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"><i class="fas fa-bars"></i></span>
            </button>

            <!-- navbar links -->
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/"><span class="rolling-text">Home</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about"><span class="rolling-text">About</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/kolaborasi"><span class="rolling-text">Kolaborasi</span></a>
                    </li>
                    <li class="nav-item" id="cartmobile">
                        <a class="nav-link" href="/cart">
                            <div class="icon-badge-container">
                            <i class="pe-7s-cart icon-badge-icon"></i>
                            <div class="icon-badge" id="txtcartmobile"></div>
                            </div>
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="/cart"><span class="rolling-text">Keranjang</span></a>
                    </li> -->
                </ul>
            </div>

            <div class="search-form" id="cartweb">

                <div class="search-icon" onclick="location.replace('/cart');">
                    <div class="icon-badge-container">
                        <i class="pe-7s-cart icon-badge-icon"></i>
                        <div class="icon-badge" id="txtcartweb"></div>
                    </div>
                </div>
          <!--           <div class="search-icon" onclick="location.replace('/cart');">
                        <span class="pe-7s-cart open-search"></span>
                        <span class="pe-7s-close close-search"></span>
                    </div> -->
            </div>
        </div>




    </nav>

    <!-- ==================== End Navbar ==================== -->


    @yield("content")


    <!-- ==================== Start Footer ==================== -->

    <footer class="pt-80">
        <div class="container pb-80">
            <div class="row">
                <div class="col-lg-3">
                    <div class="colum md-mb50">
                        <div class="tit mb-20">
                            <h6>Address</h6>
                        </div>
                        <div class="text">
                            <p>Hitung Nikah Office</p>
                            <p>Jl. Kemiri No.20, Selabatu, Kec. Cikole, Kota Sukabumi, Jawa Barat 43114</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="colum md-mb50">
                        <div class="tit mb-20">
                            <h6>Say Hello</h6>
                        </div>
                        <div class="text">
                            <p class="mb-10">
                                <a href="#0">hitungnikah@gmail.com</a>
                            </p>
                            <h5>
                                <a href="#">0812-9992-6060</a>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 md-mb50">
                    <div class="tit mb-20">
                        <h6>Social</h6>
                    </div>
                    <ul class="rest social-text">
                        <!-- <li>
                            <a href="#0">Facebook</a>
                        </li>
                        <li>
                            <a href="#0">Twitter</a>
                        </li>
                        <li>
                            <a href="#0">LinkedIn</a>
                        </li> -->
                        <li>
                            <a href="https://www.instagram.com/hitungnikah">Instagram</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 d-none">
                    <div class="tit mb-20">
                        <h6>Newsletter</h6>
                    </div>
                    <div class="subscribe">
                        <form action="contact.php">
                            <div class="form-group rest">
                                <input type="email" placeholder="Type Your Email">
                                <button type="submit">
                                    <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="sub-footer pt-40 pb-40 bord-thin-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="logo">
                            <a href="#0">
                                
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="copyright d-flex">
                            <div class="ml-auto">
                                <p class="fz-13">© 2024 Hitung Nikah <span class="underline">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- ==================== End Footer ==================== -->





    <!-- jQuery -->
    <script src="{!! asset('assets/js/jquery-3.6.0.min.js') !!}"></script>
    <script src="{!! asset('assets/js/jquery-migrate-3.4.0.min.js') !!}"></script>

    <!-- plugins -->
    <script src="{!! asset('assets/js/plugins.js') !!}"></script>

    <script src="{!! asset('assets/js/ScrollTrigger.min.js') !!}"></script>

    <script src="{!! asset('assets/js/parallax.min.js') !!}"></script>

    <script src="{!! asset('assets/js/hscroll.js') !!}"></script>

    <!-- custom scripts -->
    <script src="{!! asset('assets/js/scripts.js') !!}"></script>


    <script type="text/javascript">
        $(document).ready(function(){
          
            
          
        });
    </script>

    <script type="text/javascript">
        // window.onload = function(){
        $(document).ready(function(){
            
          document.getElementById("cartmobile").style.display = "none";
          document.getElementById("cartweb").style.display = "none";

          $.get("/get_tot_bill", function(data, status){
              // alert("Data: " + data + "\nStatus: " + status);
          
            document.getElementById("txtcartmobile").innerHTML = data;
            document.getElementById("txtcartweb").innerHTML = data;

            if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
              // true for mobile device
              document.getElementById("cartmobile").style.display = '';
              document.getElementById("cartweb").style.display = "none";
            }else{
              // false for not mobile device
              document.getElementById("cartmobile").style.display = "none";
              document.getElementById("cartweb").style.display = '';
            }
          });
        });
        // }
    </script>

</body>

</html>