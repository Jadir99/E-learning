<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="apple-touch-icon" sizes="180x180" href="../../../assets/img/favicons/apple-touch-icon.png">

    {{-- <link rel="shortcut icon" type="image/x-icon" href="../../../assets/img/favicons/favicon.ico"> --}}
    <link rel="manifest" href="../../../assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="../../../assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="../../../assets/js/config.js"></script>
    <script src="../../../vendors/simplebar/simplebar.min.js"></script>

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link href="../../../vendors/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="../../../vendors/glightbox/glightbox.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link href="../../../vendors/simplebar/simplebar.min.css" rel="stylesheet">
    <link href="../../../assets/css/theme-rtl.min.css" rel="stylesheet" id="style-rtl">
    <link href="../../../assets/css/theme.min.css" rel="stylesheet" id="style-default">
    <link href="../../../assets/css/user-rtl.min.css" rel="stylesheet" id="user-style-rtl">
    <link href="../../../assets/css/user.min.css" rel="stylesheet" id="user-style-default">
    <script>
      var isRTL = JSON.parse(localStorage.getItem('isRTL'));
      if (isRTL) {
        var linkDefault = document.getElementById('style-default');
        var userLinkDefault = document.getElementById('user-style-default');
        linkDefault.setAttribute('disabled', true);
        userLinkDefault.setAttribute('disabled', true);
        document.querySelector('html').setAttribute('dir', 'rtl');
      } else {
        var linkRTL = document.getElementById('style-rtl');
        var userLinkRTL = document.getElementById('user-style-rtl');
        linkRTL.setAttribute('disabled', true);
        userLinkRTL.setAttribute('disabled', true);
      }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- // l'integration
     --}}
    {{-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> --}}

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>@yield('title')</title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    
    <link rel="icon" sizes="16x16" type="image/x-icon" href="\images\logo_yaneCode.png">
</head>
<body class="bg-white">
    <main class="main " id="top">
        <nav class="navbar navbar-standard navbar-expand-lg fixed-top navbar-dark bg-primary opacity-75" data-navbar-darken-on-scroll="data-navbar-darken-on-scroll">
            <div class="container"><a class="navbar-brand" href="/"><img class="me-2" src="\images\yanecode_white.png" alt="" width="58" /><span class="text-white " style="font-family:Verdana,sans-serif">E-Learning</span></a><button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarStandard" aria-controls="navbarStandard" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
              <div class="collapse navbar-collapse scrollbar" id="navbarStandard">
                <ul class="navbar-nav ms-auto">
                  <li class="nav-item d-flex align-items-center me-2">
                    <div class="nav-link theme-switch-toggle fa-icon-wait p-0"><input class="form-check-input ms-0 theme-switch-toggle-input" id="themeControlToggle" type="checkbox" data-theme-control="theme" value="dark"><label class="mb-0 theme-switch-toggle-label theme-switch-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to light theme"><span class="fas fa-sun"></span></label><label class="mb-0 py-2 theme-switch-toggle-light d-lg-none" for="themeControlToggle"><span>Switch to light theme</span></label><label class="mb-0 theme-switch-toggle-label theme-switch-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to dark theme"><span class="fas fa-moon"></span></label><label class="mb-0 py-2 theme-switch-toggle-dark d-lg-none" for="themeControlToggle"><span>Switch to dark theme</span></label></div>
                  </li>
    
                    @if (Route::has('login'))
        
                    @auth
        
                        <li class="nav-item ">
                            <a class="nav-link " id="navbar" href="{{ route('register') }}" aria-haspopup="true" aria-expanded="false">Register</a>
                        </li>
        
                        <li class="nav-item ">
                            <a class="nav-link " id="navbar" href="{{ route('courses.index') }}" aria-haspopup="true" aria-expanded="false">Courses</a>
                        </li>
                        
        
                    @else
                        <li class="nav-item ">
                        <a class="nav-link " id="navbar" href="{{ route('login') }}" aria-haspopup="true" aria-expanded="false">Log in</a>
                        </li>
                    @if (Route::has('register'))
                        <li class="nav-item ">
                        <a class="nav-link " id="navbar" href="{{ route('register') }}" aria-haspopup="true" aria-expanded="false">Register</a>
                        </li>
                    @endif
                            
                    @endauth
                            
                    @endif
                </ul>
              </div>
            </div>
        </nav>

     

            
                @yield('content')
            
        
    </main>
    
</body>
</html>
