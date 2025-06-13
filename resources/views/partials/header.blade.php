<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - Xpedisi Fajar Bone</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  {{-- <link href="{{ asset('assets/img/favicon.png') }}" rel="icon"> --}}
  <link href="{{ asset('assets/img/shipping-fast.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css')}}" rel="stylesheet">

</head>

<body class="index-page" style="overflow-x: hidden;">

  <header id="header" class="header sticky-top">

    <div class="topbar bg-danger d-flex align-items-center">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contact@example.com</a></i>
          <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
          <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>
    </div><!-- End Top Bar -->

    <div class="branding d-flex align-items-cente">

      <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <!-- <img src="assets/img/logo.png" alt=""> -->
          {{-- <h1 class="sitename">BizLand</h1> --}}
          <img src="{{ asset('images/logo.png') }}" alt="">
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="/#hero" class="{{ ($title == 'home')? "active" : "" }}">Home</a></li>
            <li><a href="/pengiriman" class="{{ ($title == 'pengiriman')? "active" : "" }}">Pengiriman</a></li>
            <li><a href="/notifikasi" class="{{ ($title == 'notifikasi')? "active" : "" }}">Notifikasi</a></li>
            <li><a href="/#about">About</a></li>
            <li><a href="/#contact">Contact</a></li>
            <li><a href="/#faq">FAQ</a></li>
            <li class="dropdown"><a href="#"><img width="25px"
              src="{{ Auth::user()->foto ? asset('storage/foto/' . Auth::user()->foto) : Avatar::create(Auth::user()->name)->toBase64() }}"
              alt="User Avatar"
              class="rounded-full"> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              <ul>
                <li>
                  <a href="/profile/{{ Auth()->user()->id }}" class="{{ ($title == "profile")? "text-danger" : "" }} d-inline-block w-100 p-1 fs-6">
                    <i class="bi bi-person fs-6 my-profile"></i> My Profile
                  </a>
                </li>
                <li>
                  <form action="/logout" method="POST" class="p-1">
                    @csrf
                    <button class="logout" type="submit"><i class="bi bi-box-arrow-right"></i> Logout</button>
                  </form>
                </li>
              </ul>
            </li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

      </div>

    </div>

  </header>