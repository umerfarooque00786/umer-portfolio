@extends('layouts.portfolio')

@section('title', 'Umer Farooque - Full Stack Developer')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4 hero-title">Hi, I'm <span class="text-warning hero-name">Umer Farooque</span></h1>
                <h2 class="h3 mb-4 hero-subtitle">Full Stack Developer</h2>
                <p class="lead mb-4 hero-description">
                    I specialize in Laravel, WordPress, PHP, JavaScript, jQuery, Bootstrap, REST APIs, and GitHub.
                    I create robust web applications and deliver exceptional user experiences.
                </p>
                <div class="d-flex gap-3 hero-buttons">
                    <a href="{{ route('projects') }}" class="btn btn-light btn-lg hero-btn-1">
                        <i class="fas fa-code me-2"></i>View My Work
                    </a>
                    <a href="{{ route('download.cv') }}" class="btn btn-success btn-lg hero-btn-2">
                        <i class="fas fa-download me-2"></i> Download CV
                    </a>
                    <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg hero-btn-3">
                        <i class="fas fa-envelope me-2"></i>Get In Touch
                    </a>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <div class="bg-white rounded-circle d-inline-flex align-items-center justify-content-center floating hero-icon-container" style="width: 300px; height: 300px;">
                    <i class="fas fa-code fa-8x text-primary hero-icon"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Animated background elements -->
    <div class="hero-bg-elements">
        <div class="bg-element bg-element-1"></div>
        <div class="bg-element bg-element-2"></div>
        <div class="bg-element bg-element-3"></div>
    </div>
</section>

<!-- Skills Section -->
<section class="section-padding bg-light" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="display-5 fw-bold section-title" data-aos="fade-up" data-aos-delay="100">My Skills</h2>
                <p class="lead section-subtitle" data-aos="fade-up" data-aos-delay="200">Technologies I work with</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
                <div class="card h-100 text-center border-0 shadow-sm skill-card">
                    <div class="card-body">
                        <i class="fab fa-laravel fa-3x text-danger mb-3"></i>
                        <h5>Laravel</h5>
                        <p>Expert in Laravel framework for building robust web applications</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
                <div class="card h-100 text-center border-0 shadow-sm skill-card">
                    <div class="card-body">
                        <i class="fab fa-wordpress fa-3x text-primary mb-3"></i>
                        <h5>WordPress</h5>
                        <p>Custom WordPress development and theme customization</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="300">
                <div class="card h-100 text-center border-0 shadow-sm skill-card">
                    <div class="card-body">
                        <i class="fab fa-js-square fa-3x text-warning mb-3"></i>
                        <h5>JavaScript</h5>
                        <p>Modern JavaScript, jQuery, and frontend frameworks</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 text-center border-0 shadow-sm">
                    <div class="card-body">
                        <i class="fab fa-php fa-3x text-info mb-3"></i>
                        <h5>PHP</h5>
                        <p>Server-side development with PHP and modern frameworks</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 text-center border-0 shadow-sm">
                    <div class="card-body">
                        <i class="fab fa-bootstrap fa-3x text-purple mb-3"></i>
                        <h5>Bootstrap</h5>
                        <p>Responsive design with Bootstrap and modern CSS</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 text-center border-0 shadow-sm">
                    <div class="card-body">
                        <i class="fab fa-github fa-3x text-dark mb-3"></i>
                        <h5>GitHub</h5>
                        <p>Version control and collaborative development</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Recent Projects Section -->
@if($projects->count() > 0)
<section class="section-padding projects-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="display-5 fw-bold section-title">Recent Projects</h2>
                <p class="lead section-subtitle">Some of my latest work</p>
            </div>
        </div>
        <div class="row g-4">
            @foreach($projects as $project)
            <div class="col-md-4 project-card-wrapper">
                <div class="card project-card h-100 border-0 shadow-sm">
                    @if($project->images->count() > 0 || $project->image_path)
                        <div class="project-image-container">
                            @if($project->images->count() > 1)
                                <!-- Swiper for multiple images -->
                                <div class="swiper project-swiper project-swiper-home-{{ $loop->index }}">
                                    <div class="swiper-wrapper">
                                        @foreach($project->images as $image)
                                            <div class="swiper-slide">
                                                <img src="{{ asset('storage/' . $image->image_path) }}"
                                                     class="card-img-top" alt="{{ $project->title }}"
                                                     style="height: 200px; object-fit: cover;">
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-pagination"></div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                            @else
                                <!-- Single image -->
                                @php
                                    $imagePath = $project->images->first()?->image_path ?? $project->image_path;
                                @endphp
                                <img src="{{ asset('storage/' . $imagePath) }}"
                                     class="card-img-top" alt="{{ $project->title }}"
                                     style="height: 200px; object-fit: cover;">
                            @endif
                        </div>
                    @else
                        <div class="bg-primary d-flex align-items-center justify-content-center" style="height: 200px;">
                            <i class="fas fa-code fa-3x text-white"></i>
                        </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $project->title }}</h5>
                        <p class="card-text">{{ Str::limit($project->description, 100) }}</p>
                        <p class="text-muted small">
                            <strong>Tech:</strong> {{ $project->tech_stack }}
                        </p>
                    </div>
                    <div class="card-footer bg-transparent">
                        @if($project->github_url)
                            <a href="{{ $project->github_url }}" class="btn btn-outline-primary btn-sm" target="_blank">
                                <i class="fab fa-github"></i> View Code
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-5">
            <a href="{{ route('projects') }}" class="btn btn-primary btn-lg">View All Projects</a>
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="section-padding bg-primary text-white">
    <div class="container text-center">
        <h2 class="display-5 fw-bold mb-4">Ready to Work Together?</h2>
        <p class="lead mb-4">Let's discuss your next project and bring your ideas to life.</p>
        <a href="{{ route('contact') }}" class="btn btn-light btn-lg">Get In Touch</a>
    </div>
</section>
@endsection

@push('scripts')
<script>
// Wait for both DOM and window load to ensure all resources are ready
window.addEventListener('load', function() {
    // Small delay to ensure everything is rendered
    setTimeout(function() {
        // Check if GSAP is loaded
        if (typeof gsap === 'undefined') {
            console.warn('GSAP is not loaded, falling back to CSS animations');
            const heroSection = document.querySelector('.hero-section');
            if (heroSection) {
                heroSection.classList.add('css-fallback');
            }
            return;
        }

    // Initialize GSAP animations
    try {
        gsap.registerPlugin(ScrollTrigger);
        console.log('GSAP and ScrollTrigger loaded successfully');

        // Check if hero elements exist
        const heroElements = {
            title: document.querySelector('.hero-title'),
            name: document.querySelector('.hero-name'),
            subtitle: document.querySelector('.hero-subtitle'),
            description: document.querySelector('.hero-description'),
            buttons: document.querySelector('.hero-buttons'),
            icon: document.querySelector('.hero-icon-container')
        };

        console.log('Hero elements found:', heroElements);

        // Set initial states for hero elements
        if (heroElements.title) {
            gsap.set(['.hero-title', '.hero-subtitle', '.hero-description', '.hero-buttons'], {
                opacity: 0,
                y: 50
            });
        }

        if (heroElements.name) {
            gsap.set('.hero-name', {
                opacity: 0,
                scale: 0.8
            });
        }

        if (heroElements.icon) {
            gsap.set('.hero-icon-container', {
                opacity: 0,
                scale: 0,
                rotation: 180
            });
        }

        console.log('Initial GSAP states set');
    } catch (error) {
        console.error('Error initializing GSAP:', error);
        document.querySelector('.hero-section').classList.add('css-fallback');
        return;
    }

    // Hero section animations timeline
    const heroTl = gsap.timeline({
        delay: 0.3,
        onComplete: () => console.log('Hero animation completed')
    });

    heroTl.to('.hero-title', {
        duration: 1,
        y: 0,
        opacity: 1,
        ease: 'power3.out'
    })
    .to('.hero-name', {
        duration: 0.6,
        scale: 1,
        opacity: 1,
        ease: 'back.out(1.7)'
    }, '-=0.4')
    .to('.hero-subtitle', {
        duration: 0.6,
        y: 0,
        opacity: 1,
        ease: 'power2.out'
    }, '-=0.2')
    .to('.hero-description', {
        duration: 0.6,
        y: 0,
        opacity: 1,
        ease: 'power2.out'
    }, '-=0.1')
    .to('.hero-buttons', {
        duration: 0.6,
        y: 0,
        opacity: 1,
        ease: 'power2.out'
    }, '-=0.1')
    .to('.hero-icon-container', {
        duration: 1.2,
        scale: 1,
        rotation: 0,
        opacity: 1,
        ease: 'elastic.out(1, 0.5)'
    }, '-=0.8');

    // Add floating class after animation completes and start floating animation
    heroTl.call(() => {
        const iconContainer = document.querySelector('.hero-icon-container');
        if (iconContainer) {
            iconContainer.classList.add('gsap-animated');
            gsap.to(iconContainer, {
                y: -15,
                duration: 2.5,
                ease: 'power1.inOut',
                yoyo: true,
                repeat: -1
            });
        }
    });

    // Background elements animation
    gsap.set('.bg-element', {
        opacity: 0,
        scale: 0
    });

    // Animate background elements after hero animation starts
    gsap.to('.bg-element-1', {
        opacity: 0.1,
        scale: 1,
        duration: 2,
        delay: 1,
        ease: 'power2.out'
    });

    gsap.to('.bg-element-2', {
        opacity: 0.1,
        scale: 1,
        duration: 2,
        delay: 1.5,
        ease: 'power2.out'
    });

    gsap.to('.bg-element-3', {
        opacity: 0.1,
        scale: 1,
        duration: 2,
        delay: 2,
        ease: 'power2.out'
    });

    // Continuous rotation animations
    gsap.to('.bg-element-1', {
        rotation: 360,
        duration: 20,
        ease: 'none',
        repeat: -1,
        delay: 3
    });

    gsap.to('.bg-element-2', {
        rotation: -360,
        duration: 25,
        ease: 'none',
        repeat: -1,
        delay: 3.5
    });

    gsap.to('.bg-element-3', {
        rotation: 360,
        duration: 30,
        ease: 'none',
        repeat: -1,
        delay: 4
    });

    // Section titles animation
    gsap.utils.toArray('.section-title').forEach(title => {
        gsap.from(title, {
            scrollTrigger: {
                trigger: title,
                start: 'top 80%',
                end: 'bottom 20%',
                toggleActions: 'play none none reverse'
            },
            y: 50,
            opacity: 0,
            duration: 1,
            ease: 'power3.out'
        });
    });

    // Skill cards animation
    gsap.utils.toArray('.skill-card').forEach((card, index) => {
        gsap.from(card, {
            scrollTrigger: {
                trigger: card,
                start: 'top 85%',
                end: 'bottom 15%',
                toggleActions: 'play none none reverse'
            },
            y: 60,
            opacity: 0,
            rotation: 5,
            duration: 0.8,
            delay: index * 0.1,
            ease: 'back.out(1.7)'
        });
    });

    // Projects section title animation
    gsap.from('.projects-section .section-title', {
        scrollTrigger: {
            trigger: '.projects-section',
            start: 'top 80%',
            end: 'bottom 20%',
            toggleActions: 'play none none reverse'
        },
        y: 50,
        opacity: 0,
        duration: 1,
        ease: 'power3.out'
    });

    // Projects section subtitle animation
    gsap.from('.projects-section .section-subtitle', {
        scrollTrigger: {
            trigger: '.projects-section',
            start: 'top 80%',
            end: 'bottom 20%',
            toggleActions: 'play none none reverse'
        },
        y: 30,
        opacity: 0,
        duration: 1,
        delay: 0.2,
        ease: 'power3.out'
    });

    // Project cards animation with improved stagger
    gsap.utils.toArray('.project-card-wrapper').forEach((wrapper, index) => {
        const card = wrapper.querySelector('.project-card');

        // Set initial state
        gsap.set(card, {
            y: 100,
            opacity: 0,
            scale: 0.8,
            rotationY: 15
        });

        // Animate in
        gsap.to(card, {
            scrollTrigger: {
                trigger: wrapper,
                start: 'top 85%',
                end: 'bottom 15%',
                toggleActions: 'play none none reverse'
            },
            y: 0,
            opacity: 1,
            scale: 1,
            rotationY: 0,
            duration: 1.2,
            delay: index * 0.2,
            ease: 'power3.out'
        });

        // Hover animation
        card.addEventListener('mouseenter', () => {
            gsap.to(card, {
                y: -10,
                scale: 1.02,
                duration: 0.3,
                ease: 'power2.out'
            });
        });

        card.addEventListener('mouseleave', () => {
            gsap.to(card, {
                y: 0,
                scale: 1,
                duration: 0.3,
                ease: 'power2.out'
            });
        });
    });

    // Initialize all project swipers on home page
    document.querySelectorAll('.project-swiper').forEach((swiperElement, index) => {
        new Swiper(swiperElement, {
            loop: true,
            autoplay: {
                delay: 5000 + (index * 700), // Stagger autoplay
                disableOnInteraction: false,
            },
            pagination: {
                el: swiperElement.querySelector('.swiper-pagination'),
                clickable: true,
            },
            navigation: {
                nextEl: swiperElement.querySelector('.swiper-button-next'),
                prevEl: swiperElement.querySelector('.swiper-button-prev'),
            },
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
            speed: 1000,
        });
    });
    }, 100); // End setTimeout
}); // End window.addEventListener
</script>
@endpush
