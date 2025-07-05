@extends('website.layout')

@section('title', 'Projects - Umer Farooque')

@section('content')
<!-- Projects Hero Section -->
<section class="projects-hero">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="page-title" data-aos="fade-up">My <span class="text-gradient">Projects</span></h1>
                <p class="lead" data-aos="fade-up" data-aos-delay="100">
                    A showcase of my recent work and personal projects
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Projects Grid -->
<section class="py-5">
    <div class="container">
        <div class="row">
            @forelse($projects as $project)
                <div class="col-lg-6 col-md-6 mb-5" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="project-card-detailed">
                        <!-- Project Images Swiper -->
                        <div class="project-images">
                            @if($project->images && count($project->images) > 0)
                                <div class="swiper project-swiper-{{ $project->id }}">
                                    <div class="swiper-wrapper">
                                        @foreach($project->images as $image)
                                            <div class="swiper-slide">
                                                <img src="{{ asset('storage/' . $image) }}" alt="{{ $project->title }}" class="img-fluid">
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-pagination"></div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                            @elseif($project->image_path)
                                <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }}" class="img-fluid">
                            @else
                                <div class="placeholder-image">
                                    <i class="fas fa-code"></i>
                                </div>
                            @endif
                            
                            <div class="project-overlay">
                                <div class="project-links">
                                    @if($project->github_url)
                                        <a href="{{ $project->github_url }}" target="_blank" class="btn btn-outline-light btn-sm me-2">
                                            <i class="fab fa-github me-1"></i>GitHub
                                        </a>
                                    @endif
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#projectModal{{ $project->id }}">
                                        <i class="fas fa-eye me-1"></i>View Details
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="project-content">
                            <h4 class="project-title">{{ $project->title }}</h4>
                            <p class="project-description">{{ Str::limit($project->description, 150) }}</p>
                            <div class="project-tech">
                                @foreach(explode(',', $project->tech_stack) as $tech)
                                    <span class="tech-badge">{{ trim($tech) }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project Modal -->
                <div class="modal fade" id="projectModal{{ $project->id }}" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ $project->title }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                @if($project->images && count($project->images) > 0)
                                    <div class="swiper modal-swiper-{{ $project->id }} mb-4">
                                        <div class="swiper-wrapper">
                                            @foreach($project->images as $image)
                                                <div class="swiper-slide">
                                                    <img src="{{ asset('storage/' . $image) }}" alt="{{ $project->title }}" class="img-fluid">
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="swiper-pagination"></div>
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                    </div>
                                @elseif($project->image_path)
                                    <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }}" class="img-fluid mb-4">
                                @endif
                                
                                <h6>Description</h6>
                                <p>{{ $project->description }}</p>
                                
                                <h6>Technologies Used</h6>
                                <div class="mb-3">
                                    @foreach(explode(',', $project->tech_stack) as $tech)
                                        <span class="tech-badge">{{ trim($tech) }}</span>
                                    @endforeach
                                </div>
                                
                                @if($project->github_url)
                                    <a href="{{ $project->github_url }}" target="_blank" class="btn btn-primary">
                                        <i class="fab fa-github me-2"></i>View on GitHub
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <div class="empty-state">
                        <i class="fas fa-code fa-3x text-muted mb-3"></i>
                        <h4>No Projects Yet</h4>
                        <p class="text-muted">Projects will be displayed here once they are added.</p>
                    </div>
                </div>
            @endforelse
        </div>
        
        @if($projects->hasPages())
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-center">
                        {{ $projects->links() }}
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h3 data-aos="fade-up">Have a project in mind?</h3>
                <p data-aos="fade-up" data-aos-delay="100">Let's work together to bring your ideas to life.</p>
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg" data-aos="fade-up" data-aos-delay="200">
                    <i class="fas fa-envelope me-2"></i>Get In Touch
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Swiper for each project
    @foreach($projects as $project)
        @if($project->images && count($project->images) > 1)
            new Swiper('.project-swiper-{{ $project->id }}', {
                loop: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
            });
            
            new Swiper('.modal-swiper-{{ $project->id }}', {
                loop: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
        @endif
    @endforeach
});
</script>
@endpush
