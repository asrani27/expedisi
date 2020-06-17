<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Transportation HTML-5 Template </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="/logistic/assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="/logistic/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/logistic/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/logistic/assets/css/slicknav.css">
    <link rel="stylesheet" href="/logistic/assets/css/flaticon.css">
    <link rel="stylesheet" href="/logistic/assets/css/animate.min.css">
    <link rel="stylesheet" href="/logistic/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="/logistic/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/logistic/assets/css/themify-icons.css">
    <link rel="stylesheet" href="/logistic/assets/css/slick.css">
    <link rel="stylesheet" href="/logistic/assets/css/nice-select.css">
    <link rel="stylesheet" href="/logistic/assets/css/style.css">
</head>
<body>
<!--? Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="/logistic/assets/img/logo/loder.jpg" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Preloader Start -->
<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header ">

            <div class="header-bottom  header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <a href="/"><img src="/logistic/assets/img/logo/logo.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10">
                            <div class="menu-wrapper  d-flex align-items-center justify-content-end">
                                <!-- Main-menu -->
                                <div class="main-menu d-none d-md-block">
                                    <nav> 
                                        <ul id="navigation">                                                                                          
                                            <li><a href="/adminlogin">Login</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div> 
                        <!-- Mobile Menu -->
                        {{-- <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
<main>
    
    <div class="our-info-area pt-70 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-info mb-30">
                        <div class="info-icon">
                            <span class="fa fa-question-circle"></span>
                        </div>
                        <div class="info-caption">
                            <p>Status Pengiriman</p>
                            @if($data->status = 'Telah Diterima')
                            <span>Success</span>
                            @else
                            <span>On Process</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-info mb-30">
                        <div class="info-icon">
                            <span class="fa fa-user"></span>
                        </div>
                        <div class="info-caption">
                            <p>Data Pengirim</p>
                        <span>Nama : {{$data->nama_pengirim}}<br> Telp :{{$data->telp_pengirim}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-info mb-30">
                        <div class="info-icon">
                            <span class="fa fa-user"></span>
                        </div>
                        <div class="info-caption">
                            <p>Data Penerima</p>
                            <span>Nama :{{$data->nama_penerima}}<br> Telp :{{$data->telp_penerima}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--? our info Start -->
    <div class="our-info-area">
        <div class="container">
            <div class="section-top-border">
                <h3 class="mb-30">History :</h3>
                <div class="progress-table-wrap">
                    <div class="progress-table">
                        <div class="table-head">
                            <div class="serial">#</div>
                            <div class="visit">Tanggal</div>
                            <div class="visit">Asal</div>
                            <div class="visit">Tujuan</div>
                            <div class="visit">Status</div>
                        </div>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($track as $item)
                        <div class="table-row">
                            <div class="serial">{{$no++}}</div>
                            <div class="visit">{{$item->created_at}}</div>
                            <div class="visit">{{$item->asal_kc}}</div>
                            <div class="visit">{{$item->tujuan}}</div>
                            <div class="visit">{{$item->status}}</div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</main>
<!-- Scroll Up -->
<div id="back-top" >
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>

    <!-- JS here -->

    <script src="/logistic/assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="/logistic/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="/logistic/assets/js/popper.min.js"></script>
    <script src="/logistic/assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="/logistic/assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="/logistic/assets/js/owl.carousel.min.js"></script>
    <script src="/logistic/assets/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="/logistic/assets/js/wow.min.js"></script>
    <script src="/logistic/assets/js/animated.headline.js"></script>
    <script src="/logistic/assets/js/jquery.magnific-popup.js"></script>

    <!-- Nice-select, sticky -->
    <script src="/logistic/assets/js/jquery.nice-select.min.js"></script>
    <script src="/logistic/assets/js/jquery.sticky.js"></script>
    
    <!-- contact js -->
    <script src="/logistic/assets/js/contact.js"></script>
    <script src="/logistic/assets/js/jquery.form.js"></script>
    <script src="/logistic/assets/js/jquery.validate.min.js"></script>
    <script src="/logistic/assets/js/mail-script.js"></script>
    <script src="/logistic/assets/js/jquery.ajaxchimp.min.js"></script>
    
    <!-- Jquery Plugins, main Jquery -->	
    <script src="/logistic/assets/js/plugins.js"></script>
    <script src="/logistic/assets/js/main.js"></script>
    
</body>
</html>