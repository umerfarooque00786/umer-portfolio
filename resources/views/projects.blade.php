@extends('layouts.portfolio')

@section('title', 'Projects - Umer Farooque')

@section('content')
<!-- Projects Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4 fw-bold mb-4">My Projects</h1>
                <p class="lead">
                    A showcase of my work in web development, from Laravel applications to WordPress sites.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Projects Grid -->
<section class="section-padding">
    <div class="container">
        @if($projects->count() > 0)
            <div class="row g-4">
                @foreach($projects as $project)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="card project-card h-100 border-0 shadow-sm">
                        @if($project->images->count() > 0 || $project->image_path)
                            <div class="project-image-container">
                                @if($project->images->count() > 1)
                                    <!-- Swiper for multiple images -->
                                    <div class="swiper project-swiper project-swiper-{{ $loop->index }}">
                                        <div class="swiper-wrapper">
                                            @foreach($project->images as $image)
                                                <div class="swiper-slide">
                                                    <img src="{{ asset('storage/' . $image->image_path) }}"
                                                         class="card-img-top" alt="{{ $project->title }}"
                                                         style="height: 250px; object-fit: cover;">
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
                                         style="height: 250px; object-fit: cover;">
                                @endif
                            </div>
                        @else
                            <div class="bg-primary d-flex align-items-center justify-content-center" style="height: 250px;">
                                <i class="fas fa-code fa-4x text-white"></i>
                            </div>
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $project->title }}</h5>
                            <p class="card-text flex-grow-1">{{ $project->description }}</p>
                            <div class="mt-auto">
                                <p class="text-muted small mb-3">
                                    <strong>Technologies:</strong> {{ $project->tech_stack }}
                                </p>
                                @if($project->github_url)
                                    <a href="{{ $project->github_url }}" class="btn btn-outline-primary btn-sm" target="_blank">
                                        <i class="fab fa-github"></i> View Code
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="row">
                <div class="col-12 text-center">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body py-5">
                            <i class="fas fa-code fa-4x text-muted mb-4"></i>
                            <h3>No Projects Yet</h3>
                            <p class="text-muted">Projects will be displayed here once they are added through the admin panel.</p>
                            @auth
                                <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Add First Project</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>

<!-- CTA Section -->
<section class="section-padding bg-light">
    <div class="container text-center">
        <h2 class="display-5 fw-bold mb-4">Interested in Working Together?</h2>
        <p class="lead mb-4">I'm always open to discussing new opportunities and exciting projects.</p>
        <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">Let's Talk</a>
    </div>
</section>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize GSAP animations
    gsap.registerPlugin(ScrollTrigger);

    // Page header animation
    gsap.from('.page-header h1', {
        duration: 1,
        y: 50,
        opacity: 0,
        ease: 'power3.out'
    });

    gsap.from('.page-header p', {
        duration: 0.8,
        y: 30,
        opacity: 0,
        delay: 0.3,
        ease: 'power2.out'
    });

    // Project cards stagger animation
    gsap.utils.toArray('.project-card').forEach((card, index) => {
        gsap.from(card, {
            scrollTrigger: {
                trigger: card,
                start: 'top 85%',
                end: 'bottom 15%',
                toggleActions: 'play none none reverse'
            },
            y: 80,
            opacity: 0,
            scale: 0.9,
            rotation: 2,
            duration: 1,
            delay: index * 0.1,
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

    // CTA section animation
    gsap.from('.bg-light h2', {
        scrollTrigger: {
            trigger: '.bg-light',
            start: 'top 80%',
            end: 'bottom 20%',
            toggleActions: 'play none none reverse'
        },
        y: 50,
        opacity: 0,
        duration: 1,
        ease: 'power3.out'
    });

    gsap.from('.bg-light p', {
        scrollTrigger: {
            trigger: '.bg-light',
            start: 'top 80%',
            end: 'bottom 20%',
            toggleActions: 'play none none reverse'
        },
        y: 30,
        opacity: 0,
        duration: 0.8,
        delay: 0.2,
        ease: 'power2.out'
    });

    gsap.from('.bg-light .btn', {
        scrollTrigger: {
            trigger: '.bg-light',
            start: 'top 80%',
            end: 'bottom 20%',
            toggleActions: 'play none none reverse'
        },
        y: 20,
        opacity: 0,
        duration: 0.6,
        delay: 0.4,
        ease: 'power2.out'
    });

    // Initialize all project swipers
    document.querySelectorAll('.project-swiper').forEach((swiperElement, index) => {
        new Swiper(swiperElement, {
            loop: true,
            autoplay: {
                delay: 4000 + (index * 500), // Stagger autoplay
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
            speed: 800,
        });
    });
});
</script>
@endpush
