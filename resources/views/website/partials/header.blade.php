<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <div class="logo-container">
                <div class="logo-icon">
                    <svg viewBox="0 0 100 100" width="40" height="40">
                        <!-- Code brackets -->
                        <path d="M25 20 L10 35 L10 65 L25 80" stroke="#667eea" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M75 20 L90 35 L90 65 L75 80" stroke="#667eea" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                        <!-- Forward slash -->
                        <path d="M60 20 L40 80" stroke="#764ba2" stroke-width="4" stroke-linecap="round"/>
                    </svg>
                </div>
                <div class="logo-text">
                    <div class="logo-name">UMER FAROOQUE</div>
                    <div class="logo-title">Full-Stack Web Developer</div>
                </div>
            </div>
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('projects') ? 'active' : '' }}" href="{{ route('projects') }}">Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-primary ms-2" href="{{ route('download.cv') }}">
                        <i class="fas fa-download me-1"></i>CV
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
