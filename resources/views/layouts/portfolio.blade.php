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
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }

        /* Professional Loader Styles */
        .page-loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #0f0f23 0%, #1a1a2e 25%, #16213e 50%, #0f3460 75%, #533483 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            transition: all 0.8s ease;
        }

        .page-loader.fade-out {
            opacity: 0;
            visibility: hidden;
        }

        .loader-content {
            text-align: center;
            color: white;
        }

        .loader-logo {
            width: 80px;
            height: 80px;
            margin: 0 auto 2rem;
            position: relative;
        }

        .loader-logo svg {
            width: 100%;
            height: 100%;
            animation: logoFloat 3s ease-in-out infinite;
        }

        .loader-logo svg path {
            stroke-dasharray: 100;
            stroke-dashoffset: 100;
            animation: drawPath 2s ease-in-out infinite;
        }

        .loader-logo svg path:nth-child(1) {
            animation-delay: 0s;
        }

        .loader-logo svg path:nth-child(2) {
            animation-delay: 0.3s;
        }

        .loader-logo svg path:nth-child(3) {
            animation-delay: 0.6s;
        }

        .loader-text {
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: 3px;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: textGlow 2s ease-in-out infinite alternate;
        }

        .loader-subtitle {
            font-size: 0.9rem;
            color: #b8c5d6;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 1rem;
            opacity: 0.8;
        }

        .loader-percentage {
            font-size: 2rem;
            font-weight: 700;
            color: #667eea;
            margin-bottom: 1.5rem;
            text-shadow: 0 0 20px rgba(102, 126, 234, 0.5);
            animation: percentageGlow 2s ease-in-out infinite alternate;
        }

        .loader-progress {
            width: 200px;
            height: 3px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 2px;
            margin: 0 auto;
            overflow: hidden;
            position: relative;
        }

        .loader-progress-bar {
            height: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 2px;
            width: 0%;
            transition: width 0.3s ease;
            box-shadow: 0 0 10px rgba(102, 126, 234, 0.5);
        }

        @keyframes logoFloat {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-10px) rotate(5deg); }
        }

        @keyframes drawPath {
            0% { stroke-dashoffset: 100; opacity: 0; }
            50% { stroke-dashoffset: 0; opacity: 1; }
            100% { stroke-dashoffset: -100; opacity: 0; }
        }

        @keyframes textGlow {
            0% { text-shadow: 0 0 10px rgba(102, 126, 234, 0.5); }
            100% { text-shadow: 0 0 20px rgba(118, 75, 162, 0.8), 0 0 30px rgba(102, 126, 234, 0.5); }
        }

        @keyframes progressLoad {
            0% { transform: translateX(-100%); }
            50% { transform: translateX(0%); }
            100% { transform: translateX(100%); }
        }

        @keyframes percentageGlow {
            0% {
                color: #667eea;
                text-shadow: 0 0 20px rgba(102, 126, 234, 0.5);
            }
            100% {
                color: #764ba2;
                text-shadow: 0 0 30px rgba(118, 75, 162, 0.8), 0 0 40px rgba(102, 126, 234, 0.5);
            }
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            text-decoration: none !important;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-text {
            display: flex;
            flex-direction: column;
            line-height: 1;
        }

        .logo-name {
            font-size: 1.4rem;
            font-weight: 700;
            color: #2c3e50;
            letter-spacing: 2px;
            margin: 0;
        }

        .logo-title {
            font-size: 0.7rem;
            font-weight: 500;
            color: #7f8c8d;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin: 0;
            margin-top: -2px;
        }

        .navbar.scrolled .logo-name {
            color: #667eea;
        }

        .navbar.scrolled .logo-title {
            color: #8892f0;
        }

        .logo-icon svg {
            transition: all 0.3s ease;
        }

        .navbar-brand:hover .logo-icon svg {
            transform: scale(1.1) rotate(5deg);
        }

        .logo-icon svg path {
            transition: all 0.3s ease;
        }

        .navbar-brand:hover .logo-icon svg path:first-child {
            stroke: #764ba2;
        }

        .navbar-brand:hover .logo-icon svg path:last-child {
            stroke: #667eea;
        }

        .footer-logo-icon svg {
            transition: all 0.3s ease;
        }

        .footer-brand:hover .footer-logo-icon svg {
            transform: scale(1.1) rotate(-5deg);
        }

        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 100px 0;
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="%23ffffff08" points="0,1000 1000,0 1000,1000"/></svg>');
            pointer-events: none;
        }

        .section-padding {
            padding: 80px 0;
        }

        .project-card {
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            border-radius: 20px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            transform-style: preserve-3d;
            perspective: 1000px;
        }

        .project-card:hover {
            box-shadow: 0 25px 50px rgba(0,0,0,0.15);
        }

        .project-card-wrapper {
            perspective: 1000px;
        }

        .projects-section {
            overflow: hidden;
        }

        .projects-section .section-title {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Hero background elements */
        .hero-bg-elements {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }

        .bg-element {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(45deg, rgba(255,255,255,0.1), rgba(255,255,255,0.05));
            backdrop-filter: blur(10px);
        }

        .bg-element-1 {
            width: 200px;
            height: 200px;
            top: 10%;
            right: 10%;
        }

        .bg-element-2 {
            width: 150px;
            height: 150px;
            bottom: 20%;
            left: 15%;
        }

        .bg-element-3 {
            width: 100px;
            height: 100px;
            top: 60%;
            right: 30%;
        }

        /* Skill card hover effects */
        .skill-card {
            transition: all 0.3s ease;
        }

        .skill-card:hover {
            transform: translateY(-5px) rotate(2deg);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        /* Hero animation initial states */
        .hero-title,
        .hero-subtitle,
        .hero-description,
        .hero-buttons,
        .hero-icon-container {
            opacity: 0;
        }

        .hero-title {
            transform: translateY(50px);
        }

        .hero-subtitle,
        .hero-description {
            transform: translateY(30px);
        }

        .hero-buttons {
            transform: translateY(20px);
        }

        .hero-icon-container {
            transform: scale(0) rotate(180deg);
        }

        .hero-name {
            opacity: 0;
            transform: scale(0.8);
        }

        /* Fallback CSS animations if GSAP fails */
        .hero-section.css-fallback .hero-title {
            animation: fadeInUp 1.2s ease-out 0.5s forwards;
        }

        .hero-section.css-fallback .hero-subtitle {
            animation: fadeInUp 0.8s ease-out 1.2s forwards;
        }

        .hero-section.css-fallback .hero-description {
            animation: fadeInUp 0.8s ease-out 1.5s forwards;
        }

        .hero-section.css-fallback .hero-buttons {
            animation: fadeInUp 0.8s ease-out 1.8s forwards;
        }

        .hero-section.css-fallback .hero-icon-container {
            animation: scaleIn 1.5s ease-out 2s forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes scaleIn {
            to {
                opacity: 1;
                transform: scale(1) rotate(0deg);
            }
        }

        /* Enhanced floating animation - disabled initially for GSAP control */
        .floating.gsap-animated {
            animation: none;
        }

        @keyframes floating {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .project-image-container {
            position: relative;
            overflow: hidden;
            border-radius: 15px;
        }

        .project-swiper {
            border-radius: 15px;
        }

        .swiper-pagination-bullet {
            background: #667eea;
            opacity: 0.7;
        }

        .swiper-pagination-bullet-active {
            background: #764ba2;
            opacity: 1;
        }

        .swiper-button-next,
        .swiper-button-prev {
            color: #667eea;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            margin-top: -20px;
        }

        .swiper-button-next:after,
        .swiper-button-prev:after {
            font-size: 16px;
            font-weight: bold;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #5a6fd8 0%, #6a4190 100%);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }

        .section-title {
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        footer {
            background: linear-gradient(135deg, #0a0a1a 0%, #1a1a2e 20%, #16213e 40%, #0f3460 60%, #533483 80%, #764ba2 100%);
            color: white;
            position: relative;
            overflow: hidden;
            border-top: 3px solid transparent;
            background-clip: padding-box;
        }

        footer::before {
            content: '';
            position: absolute;
            top: -3px;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #667eea 0%, #764ba2 50%, #667eea 100%);
            animation: borderGlow 3s ease-in-out infinite;
        }

        footer::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(circle at 20% 80%, rgba(102, 126, 234, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(118, 75, 162, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(102, 126, 234, 0.05) 0%, transparent 50%);
            pointer-events: none;
            animation: footerBgMove 20s ease-in-out infinite;
        }

        @keyframes borderGlow {
            0%, 100% { opacity: 1; transform: scaleX(1); }
            50% { opacity: 0.7; transform: scaleX(1.02); }
        }

        @keyframes footerBgMove {
            0%, 100% { transform: translateX(0) translateY(0); }
            25% { transform: translateX(-10px) translateY(-5px); }
            50% { transform: translateX(10px) translateY(5px); }
            75% { transform: translateX(-5px) translateY(10px); }
        }

        .footer-content {
            position: relative;
            z-index: 2;
            padding: 4rem 0 2rem;
        }

        .footer-main {
            padding-bottom: 3rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 2rem;
        }

        .footer-brand {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 2rem;
            padding: 1.5rem;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .footer-brand:hover {
            background: rgba(255, 255, 255, 0.08);
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.2);
        }

        .footer-logo-icon {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.2) 0%, rgba(118, 75, 162, 0.2) 100%);
            border-radius: 16px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(102, 126, 234, 0.3);
            position: relative;
        }

        .footer-logo-icon::before {
            content: '';
            position: absolute;
            inset: -1px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 16px;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .footer-brand:hover .footer-logo-icon::before {
            opacity: 1;
        }

        .footer-logo-text {
            display: flex;
            flex-direction: column;
            line-height: 1;
        }

        .footer-logo-name {
            font-size: 1.6rem;
            font-weight: 700;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: 2px;
            margin: 0;
        }

        .footer-logo-title {
            font-size: 0.8rem;
            font-weight: 500;
            color: #b8c5d6;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin: 0;
            margin-top: 2px;
        }

        .footer-description {
            color: #b8c5d6;
            line-height: 1.6;
            margin-bottom: 2rem;
        }

        .footer-section {
            padding: 1.5rem;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            height: 100%;
        }

        .footer-section:hover {
            background: rgba(255, 255, 255, 0.06);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        .footer-section h5 {
            color: #ffffff;
            font-weight: 700;
            margin-bottom: 2rem;
            position: relative;
            font-size: 1.2rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .footer-section h5::before {
            content: '';
            width: 4px;
            height: 25px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 2px;
        }

        .footer-section h5::after {
            content: '';
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, rgba(102, 126, 234, 0.5) 0%, transparent 100%);
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 0.8rem;
        }

        .footer-links a {
            color: #b8c5d6;
            text-decoration: none;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
        }

        .footer-links a:hover {
            color: #667eea;
            transform: translateX(5px);
        }

        .footer-links a i {
            margin-right: 0.5rem;
            width: 16px;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: #b8c5d6;
            text-decoration: none;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .social-link:hover {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }

        .footer-bottom {
            padding: 2rem 0;
            text-align: center;
            background: rgba(0, 0, 0, 0.2);
            border-radius: 16px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .footer-bottom p {
            color: #b8c5d6;
            margin: 0;
            font-size: 0.95rem;
        }

        .footer-bottom .row {
            align-items: center;
        }

        .footer-copyright {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .footer-heart {
            color: #e74c3c;
            animation: heartbeat 2s ease-in-out infinite;
        }

        @keyframes heartbeat {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        .footer-skills {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-top: 1rem;
        }

        .footer-skill-tag {
            background: rgba(255, 255, 255, 0.1);
            color: #b8c5d6;
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.85rem;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .footer-skill-tag:hover {
            background: rgba(102, 126, 234, 0.2);
            color: white;
        }

        /* Footer responsive styles */
        @media (max-width: 768px) {
            .footer-brand {
                font-size: 1.5rem;
                text-align: center;
            }

            .footer-description {
                text-align: center;
            }

            .social-links {
                justify-content: center;
            }

            .footer-section h5 {
                text-align: center;
            }

            .footer-section h5::after {
                left: 50%;
                transform: translateX(-50%);
            }

            .footer-links {
                text-align: center;
            }

            .footer-skills {
                justify-content: center;
            }

            .footer-bottom {
                text-align: center;
            }

            .footer-bottom .col-md-6 {
                text-align: center !important;
                margin-bottom: 1rem;
            }
        }

        /* Animation classes */
        .fade-in-up {
            opacity: 0;
            transform: translateY(30px);
        }

        .fade-in-left {
            opacity: 0;
            transform: translateX(-30px);
        }

        .fade-in-right {
            opacity: 0;
            transform: translateX(30px);
        }

        .scale-in {
            opacity: 0;
            transform: scale(0.8);
        }

        /* Floating animation */
        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
    </style>
    
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

    <script>
        // Register GSAP plugins
        gsap.registerPlugin(ScrollTrigger);

        // Page Loader with Percentage
        let loadingProgress = 0;
        const loaderPercentage = document.getElementById('loaderPercentage');
        const loaderProgressBar = document.getElementById('loaderProgressBar');

        // Simulate loading progress
        const loadingInterval = setInterval(function() {
            loadingProgress += Math.random() * 15;
            if (loadingProgress > 100) {
                loadingProgress = 100;
            }

            if (loaderPercentage) {
                loaderPercentage.textContent = Math.floor(loadingProgress) + '%';
            }
            if (loaderProgressBar) {
                loaderProgressBar.style.width = loadingProgress + '%';
            }

            if (loadingProgress >= 100) {
                clearInterval(loadingInterval);
                setTimeout(function() {
                    const loader = document.getElementById('pageLoader');
                    if (loader) {
                        loader.classList.add('fade-out');
                        setTimeout(function() {
                            loader.style.display = 'none';
                            document.body.style.overflow = 'visible';
                        }, 800);
                    }
                }, 500);
            }
        }, 100);

        // Prevent scrolling while loader is active
        document.body.style.overflow = 'hidden';

        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });

        // GSAP Animations
        document.addEventListener('DOMContentLoaded', function() {
            // Hero section animation
            gsap.timeline()
                .from('.hero-section h1', {duration: 1, y: 50, opacity: 0, ease: "power3.out"})
                .from('.hero-section p', {duration: 1, y: 30, opacity: 0, ease: "power3.out"}, "-=0.5")
                .from('.hero-section .btn', {duration: 1, y: 30, opacity: 0, ease: "power3.out"}, "-=0.3");

            // Navbar animation on scroll
            ScrollTrigger.create({
                start: "top -80",
                end: 99999,
                toggleClass: {className: "scrolled", targets: ".navbar"}
            });



            // Section titles animation
            gsap.utils.toArray('.section-title').forEach(title => {
                gsap.from(title, {
                    duration: 1,
                    x: -50,
                    opacity: 0,
                    ease: "power3.out",
                    scrollTrigger: {
                        trigger: title,
                        start: "top 85%",
                        end: "bottom 15%",
                        toggleActions: "play none none reverse"
                    }
                });
            });

            // Parallax effect for hero background
            gsap.to('.hero-section::before', {
                yPercent: -50,
                ease: "none",
                scrollTrigger: {
                    trigger: '.hero-section',
                    start: "top bottom",
                    end: "bottom top",
                    scrub: true
                }
            });

            // Footer animations
            gsap.utils.toArray('.footer-section').forEach((section, index) => {
                gsap.from(section, {
                    scrollTrigger: {
                        trigger: section,
                        start: 'top 90%',
                        end: 'bottom 10%',
                        toggleActions: 'play none none reverse'
                    },
                    y: 50,
                    opacity: 0,
                    duration: 0.8,
                    delay: index * 0.1,
                    ease: 'power2.out'
                });
            });

            // Footer brand animation
            gsap.from('.footer-brand', {
                scrollTrigger: {
                    trigger: '.footer-brand',
                    start: 'top 90%',
                    end: 'bottom 10%',
                    toggleActions: 'play none none reverse'
                },
                scale: 0.8,
                opacity: 0,
                duration: 1,
                ease: 'back.out(1.7)'
            });

            // Logo icon animation
            gsap.from('.footer-logo-icon svg path', {
                scrollTrigger: {
                    trigger: '.footer-brand',
                    start: 'top 90%',
                    end: 'bottom 10%',
                    toggleActions: 'play none none reverse'
                },
                scale: 0,
                opacity: 0,
                rotation: 180,
                duration: 1.2,
                stagger: 0.2,
                ease: 'back.out(1.7)'
            });

            // Navbar logo animation on page load
            gsap.from('.navbar .logo-icon svg path', {
                scale: 0,
                opacity: 0,
                rotation: 180,
                duration: 1.2,
                stagger: 0.2,
                ease: 'back.out(1.7)',
                delay: 0.5
            });

            // Social links stagger animation
            gsap.from('.social-link', {
                scrollTrigger: {
                    trigger: '.social-links',
                    start: 'top 90%',
                    end: 'bottom 10%',
                    toggleActions: 'play none none reverse'
                },
                scale: 0,
                opacity: 0,
                duration: 0.6,
                stagger: 0.1,
                ease: 'back.out(1.7)'
            });

            // Footer skills animation
            gsap.from('.footer-skill-tag', {
                scrollTrigger: {
                    trigger: '.footer-skills',
                    start: 'top 90%',
                    end: 'bottom 10%',
                    toggleActions: 'play none none reverse'
                },
                y: 20,
                opacity: 0,
                duration: 0.5,
                stagger: 0.1,
                ease: 'power2.out'
            });
        });

        // Initialize Swiper for project images
        function initProjectSwiper(container) {
            return new Swiper(container, {
                loop: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: container + ' .swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: container + ' .swiper-button-next',
                    prevEl: container + ' .swiper-button-prev',
                },
                effect: 'fade',
                fadeEffect: {
                    crossFade: true
                },
                speed: 800,
            });
        }

        // Initialize all project swipers
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.project-swiper').forEach((swiper, index) => {
                initProjectSwiper('.project-swiper-' + index);
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
