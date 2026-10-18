<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="id"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="id"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="id"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="id"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'Nala Catering - Solusi Catering & Prasmanan Terbaik')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Nala Catering menyediakan berbagai macam pilihan menu catering lezat, higienis, dan terpercaya untuk pesta, pernikahan, dan acara kantor." />
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets-guest/images/nala-logo.png') }}">

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700,400italic,700italic|Merriweather:300,400italic,300italic,400,700italic' rel='stylesheet' type='text/css'>
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="{{ asset('assets-guest/css/animate.css') }}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{ asset('assets-guest/css/icomoon.css') }}">
    <!-- Simple Line Icons -->
    <link rel="stylesheet" href="{{ asset('assets-guest/css/simple-line-icons.css') }}">
    <!-- Datetimepicker -->
    <link rel="stylesheet" href="{{ asset('assets-guest/css/bootstrap-datetimepicker.min.css') }}">
    <!-- Flexslider -->
    <link rel="stylesheet" href="{{ asset('assets-guest/css/flexslider.css') }}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{ asset('assets-guest/css/bootstrap.css') }}">
    <!-- Theme style  -->
    <link rel="stylesheet" href="{{ asset('assets-guest/css/style.css') }}">

    <style>
        /* Custom tweaks for Nala Catering branding */
        .fh5co-logo a {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-size: 26px !important;
            font-weight: 700;
            color: #fb6e14 !important;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        .fh5co-logo img {
            height: 38px;
            width: auto;
            vertical-align: middle;
        }
        .fh5co-food-pricing {
            color: #fb6e14 !important;
            font-weight: 700;
            font-size: 20px;
        }
        .btn-primary-catering {
            background-color: #fb6e14 !important;
            border-color: #fb6e14 !important;
            color: #fff !important;
            padding: 10px 24px;
            border-radius: 30px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: inline-block;
            transition: 0.3s;
        }
        .btn-primary-catering:hover {
            background-color: #d35206 !important;
            border-color: #d35206 !important;
            color: #fff !important;
            transform: translateY(-2px);
        }
        .badge-cat {
            display: inline-block;
            padding: 4px 10px;
            font-size: 11px;
            text-transform: uppercase;
            font-weight: 700;
            border-radius: 4px;
            background: #fef0e7;
            color: #fb6e14;
            margin-bottom: 6px;
        }
        .menu-filter-btn {
            margin: 4px;
            padding: 8px 18px;
            border-radius: 25px;
            border: 1px solid #e1d8d1;
            background: #fff;
            color: #5e493a;
            font-weight: 600;
            font-size: 13px;
            cursor: pointer;
            transition: all 0.25s;
        }
        .menu-filter-btn:hover, .menu-filter-btn.active {
            background: #fb6e14;
            border-color: #fb6e14;
            color: #fff;
        }

        /* Fix Bootstrap Modal Stacking Context & Backdrop */
        .modal-backdrop {
            z-index: 1040 !important;
        }
        .modal {
            z-index: 1050 !important;
        }
        .modal-dialog {
            z-index: 1060 !important;
            position: relative;
        }
    </style>

    <!-- Modernizr JS -->
    <script src="{{ asset('assets-guest/js/modernizr-2.6.2.min.js') }}"></script>
    <!--[if lt IE 9]>
    <script src="{{ asset('assets-guest/js/respond.min.js') }}"></script>
    <![endif]-->

    @yield('styles')
</head>
<body>

    <div id="fh5co-container">
        <!-- HERO / HEADER SLIDER -->
        @section('hero')
        <div id="fh5co-home" class="js-fullheight" data-section="home">
            <div class="flexslider">
                <div class="fh5co-overlay"></div>
                <div class="fh5co-text">
                    <div class="container">
                        <div class="row">
                            <h1 class="to-animate">Nala Catering</h1>
                            <h2 class="to-animate">Citarasa Istimewa Untuk Setiap <span>Momen Bahagia</span> Anda</h2>
                            <p class="to-animate mt-3">
                                <a href="{{ route('guest.menu') }}" class="btn-primary-catering" style="margin-top: 15px;">Lihat Menu Catering</a>
                            </p>
                        </div>
                    </div>
                </div>
                <ul class="slides">
                    <li style="background-image: url('{{ asset('assets-guest/images/slide_1.jpg') }}');" data-stellar-background-ratio="0.5"></li>
                    <li style="background-image: url('{{ asset('assets-guest/images/slide_2.jpg') }}');" data-stellar-background-ratio="0.5"></li>
                    <li style="background-image: url('{{ asset('assets-guest/images/slide_3.jpg') }}');" data-stellar-background-ratio="0.5"></li>
                </ul>
            </div>
        </div>
        @show

        <!-- STICKY NAVBAR -->
        <div class="js-sticky">
            <div class="fh5co-main-nav">
                <div class="container-fluid">
                    <div class="fh5co-menu-1">
                        <a href="{{ route('guest.home') }}">Home</a>
                        <a href="{{ route('guest.home') }}#fh5co-about">Tentang Kami</a>
                        <a href="{{ route('guest.home') }}#fh5co-features">Keunggulan</a>
                    </div>
                    <div class="fh5co-logo">
                        <a href="{{ route('guest.home') }}">
                            <img src="{{ asset('assets-guest/images/nala-logo.png') }}" alt="Nala Logo">
                            <span>Nala</span>
                        </a>
                    </div>
                    <div class="fh5co-menu-2">
                        <a href="{{ route('guest.menu') }}" class="{{ request()->routeIs('guest.menu') ? 'active' : '' }}">Menu Catering</a>
                        <a href="{{ route('guest.home') }}#fh5co-contact">Kontak</a>
                        <a href="{{ route('admin.menu.index') }}" style="color: #fb6e14; font-weight: 700;">Admin Area</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- MAIN DYNAMIC CONTENT -->
        @yield('content')

        <!-- FOOTER -->
        <div id="fh5co-footer">
            <div class="container">
                <div class="row row-padded">
                    <div class="col-md-12 text-center">
                        <p class="to-animate">&copy; {{ date('Y') }} <strong>Nala Catering</strong>. Hak Cipta Dilindungi Undang-Undang. <br>
                        Dibuat untuk Tugas UAS Pemrograman Framework Web dengan Template Foodee & InApp Admin.
                        </p>
                        <p class="text-center to-animate">
                            <a href="#" class="js-gotop">Kembali Ke Atas <i class="icon-arrow-up"></i></a>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <ul class="fh5co-social">
                            <li class="to-animate-2"><a href="#"><i class="icon-facebook"></i></a></li>
                            <li class="to-animate-2"><a href="#"><i class="icon-twitter"></i></a></li>
                            <li class="to-animate-2"><a href="#"><i class="icon-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODALS CONTAINER (Outside #fh5co-container to avoid stacking context issues) -->
    @yield('modals')

    <!-- SCRIPTS -->
    <!-- jQuery -->
    <script src="{{ asset('assets-guest/js/jquery.min.js') }}"></script>
    <!-- jQuery Easing -->
    <script src="{{ asset('assets-guest/js/jquery.easing.1.3.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('assets-guest/js/bootstrap.min.js') }}"></script>
    <!-- Moment.js -->
    <script src="{{ asset('assets-guest/js/moment.js') }}"></script>
    <!-- Bootstrap Datetimepicker -->
    <script src="{{ asset('assets-guest/js/bootstrap-datetimepicker.min.js') }}"></script>
    <!-- Waypoints -->
    <script src="{{ asset('assets-guest/js/jquery.waypoints.min.js') }}"></script>
    <!-- Stellar Parallax -->
    <script src="{{ asset('assets-guest/js/jquery.stellar.min.js') }}"></script>
    <!-- Flexslider -->
    <script src="{{ asset('assets-guest/js/jquery.flexslider-min.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('assets-guest/js/main.js') }}"></script>

    @yield('scripts')
</body>
</html>
