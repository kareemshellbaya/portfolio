<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Personal Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ $globalSetting->favicon }}" rel="icon">
    <link href="{{ asset('front_assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('front_assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front_assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('front_assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front_assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front_assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('front_assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('front_assets/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Personal
  * Template URL: https://bootstrapmade.com/personal-free-resume-bootstrap-template/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header">
        <div class="container">

            <h1><a href="{{ route('/') }}">{{ $globalSetting->user->name }}</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->
            <h2>I'm a passionate <span> &nbsp; Backend Web Developer &nbsp;</span> From Egypt</h2>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link active" href="#header">Home</a></li>
                    <li><a class="nav-link" href="#about">About</a></li>
                    <li><a class="nav-link" href="#resume">Resume</a></li>
                    <li><a class="nav-link" href="#services">Skills</a></li>
                    <li><a class="nav-link" href="#portfolio">Portfolio</a></li>
                    <li><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <div class="social-links">
                <a href="{{ $globalSetting->twitter }}" target="_blank" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="{{ $profile_settings->github }}" target="_blank" class="github"><i class="bi bi-github"></i></a>
                <a href="{{ $globalSetting->facebook }}" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="{{ $globalSetting->instagram }}" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="{{ $globalSetting->linkedin }}" target="_blank" class="linkedin"><i class="bi bi-linkedin"></i></a>
                <a href="{{ 'mailto:' . $globalSetting->email }}" target="_blank" class="google"><i class="bi bi-google"></i></a>
                <a href="{{ 'https://t.me/' . $profile_settings->telegram }}" target="_blank" class="telegram"><i class="bi bi-telegram"></i></a>
                <a href="{{ 'tel:' . $globalSetting->phone }}" target="_blank" class="telephone"><i class="bi bi-telephone"></i></a>
                <a href="{{ 'https://wa.me/+2' . $profile_settings->whatsapp }}" target="_blank" class="whatsapp"><i class="bi bi-whatsapp"></i></a>
                <a href="{{ route('payment') }}" target="_blank" class="paypal"><i class="bi bi-paypal"></i></a>

            </div>

        </div>
    </header><!-- End Header -->
