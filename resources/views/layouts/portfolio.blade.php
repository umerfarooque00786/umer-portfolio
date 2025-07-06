<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Umer Farooque - Full Stack Developer')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon.svg') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.svg') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon.svg') }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <!-- AOS CSS for animations -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Website Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/website/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/website/components.css') }}">
    <link rel="stylesheet" href="{{ asset('css/website/layout/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/website/layout/footer-extended.css') }}">

    @stack('styles')

</head>
<body>
    <!-- Professional Page Loader -->
    <div class="page-loader" id="pageLoader">
        <div class="loader-content">
            <div class="loader-logo">
                <svg viewBox="0 0 100 100">
                    <!-- Code brackets -->
                    <path d="M25 20 L10 35 L10 65 L25 80" stroke="#667eea" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M75 20 L90 35 L90 65 L75 80" stroke="#667eea" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                    <!-- Forward slash -->
                    <path d="M60 20 L40 80" stroke="#764ba2" stroke-width="4" stroke-linecap="round"/>
                </svg>
            </div>
            <div class="loader-text">UMER FAROOQUE</div>
            <div class="loader-subtitle">Full-Stack Web Developer</div>
            <div class="loader-percentage" id="loaderPercentage">0%</div>
            <div class="loader-progress">
                <div class="loader-progress-bar" id="loaderProgressBar"></div>
            </div>
        </div>
    </div>
    @include('partials.header')

    <!-- Main Content -->
    <main style="margin-top: 76px;">
        @yield('content')
    </main>

    @include('partials.footer')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Portfolio Layout JavaScript -->
    <script src="{{ asset('css/website/layout/js/script.js') }}"></script>

        @stack('scripts')
</body>
</html>
