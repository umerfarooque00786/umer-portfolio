@extends('website.layout')

@section('title', 'Home - Umer Farooque')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-6">
                <div class="hero-content" data-aos="fade-up">
                    <h1 class="hero-title">Hi, I'm <span class="text-gradient">Umer Farooque</span></h1>
                    <h2 class="hero-subtitle">Full-Stack Web Developer</h2>
                    <p class="hero-description">
                        I create beautiful, responsive, and user-friendly web applications using modern technologies. 
                        Passionate about clean code and innovative solutions.
                    </p>
                    <div class="hero-buttons">
                        <a href="{{ route('projects') }}" class="btn btn-primary me-3">
                            <i class="fas fa-briefcase me-2"></i>View My Work
                        </a>
                        <a href="{{ route('contact') }}" class="btn btn-outline-light">
                            <i class="fas fa-envelope me-2"></i>Get In Touch
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero-image" data-aos="fade-left" data-aos-delay="200">
                    <div class="floating-card">
                        <div class="code-snippet">
                            <div class="code-header">
                                <span class="dot red"></span>
                                <span class="dot yellow"></span>
                                <span class="dot green"></span>
                            </div>
                            <div class="code-body">
                                <div class="code-line">
                                    <span class="keyword">const</span> 
                                    <span class="variable">developer</span> = {
                                </div>
                                <div class="code-line indent">
                                    <span class="property">name</span>: 
                                    <span class="string">'Umer Farooque'</span>,
                                </div>
                                <div class="code-line indent">
                                    <span class="property">skills</span>: [
                                    <span class="string">'Laravel'</span>, 
                                    <span class="string">'React'</span>],
                                </div>
                                <div class="code-line indent">
                                    <span class="property">passion</span>: 
                                    <span class="string">'Creating Amazing Apps'</span>
                                </div>
                                <div class="code-line">}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Projects Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title" data-aos="fade-up">Featured Projects</h2>
                <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                    Some of my recent work that I'm proud of
                </p>
            </div>
        </div>
        <div class="row">
            @forelse($projects as $project)
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="project-card">
                        <div class="project-image">
                            @if($project->image_path)
                                <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }}">
                            @else
                                <div class="placeholder-image">
                                    <i class="fas fa-code"></i>
                                </div>
                            @endif
                            <div class="project-overlay">
                                <a href="{{ route('projects') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-eye me-1"></i>View Details
                                </a>
                            </div>
                        </div>
                        <div class="project-content">
                            <h5 class="project-title">{{ $project->title }}</h5>
                            <p class="project-description">{{ Str::limit($project->description, 100) }}</p>
                            <div class="project-tech">
                                @foreach(explode(',', $project->tech_stack) as $tech)
                                    <span class="tech-badge">{{ trim($tech) }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">No projects available at the moment.</p>
                </div>
            @endforelse
        </div>
        @if($projects->count() > 0)
            <div class="row">
                <div class="col-12 text-center mt-4">
                    <a href="{{ route('projects') }}" class="btn btn-primary">
                        <i class="fas fa-arrow-right me-2"></i>View All Projects
                    </a>
                </div>
            </div>
        @endif
    </div>
</section>

<!-- Skills Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title" data-aos="fade-up">Technical Skills</h2>
                <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                    Technologies I work with
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="skill-card">
                    <div class="skill-icon">
                        <i class="fab fa-laravel"></i>
                    </div>
                    <h5>Laravel</h5>
                    <p>Backend Development</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="skill-card">
                    <div class="skill-icon">
                        <i class="fab fa-react"></i>
                    </div>
                    <h5>React</h5>
                    <p>Frontend Development</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="skill-card">
                    <div class="skill-icon">
                        <i class="fas fa-database"></i>
                    </div>
                    <h5>MySQL</h5>
                    <p>Database Management</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                <div class="skill-card">
                    <div class="skill-icon">
                        <i class="fab fa-js-square"></i>
                    </div>
                    <h5>JavaScript</h5>
                    <p>Interactive Features</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
