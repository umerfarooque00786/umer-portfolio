@extends('layouts.portfolio')

@section('title', 'About Me - Umer Farooque')

@section('content')
<!-- About Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">About Me</h1>
                <p class="lead">
                    I'm a passionate full-stack developer with expertise in modern web technologies. 
                    I love creating efficient, scalable solutions that make a difference.
                </p>
            </div>
            <div class="col-lg-6 text-center">
                <div class="bg-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 250px; height: 250px;">
                    <i class="fas fa-user fa-6x text-primary"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Content -->
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5">
                        <h2 class="h3 mb-4">My Journey</h2>
                        <p class="mb-4">
                            As a full-stack developer, I specialize in creating robust web applications using modern technologies. 
                            My expertise spans across backend development with Laravel and PHP, frontend development with JavaScript 
                            and jQuery, and creating responsive designs with Bootstrap.
                        </p>
                        
                        <h3 class="h4 mb-3">What I Do</h3>
                        <ul class="list-unstyled mb-4">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Full-stack web application development</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Laravel framework development</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i> WordPress custom development</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i> REST API development and integration</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Responsive web design</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Database design and optimization</li>
                        </ul>

                        <h3 class="h4 mb-3">My Approach</h3>
                        <p class="mb-4">
                            I believe in writing clean, maintainable code and following best practices. I'm passionate about 
                            staying up-to-date with the latest technologies and continuously improving my skills. Every project 
                            is an opportunity to learn something new and deliver exceptional results.
                        </p>

                        <div class="text-center">
                            <a href="{{ route('download.cv') }}" class="btn btn-primary me-3">
                                <i class="fas fa-download"></i> Download CV
                            </a>
                            <a href="{{ route('contact') }}" class="btn btn-outline-primary">
                                <i class="fas fa-envelope"></i> Get In Touch
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Skills & Experience -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="display-5 fw-bold">Skills & Experience</h2>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-server text-primary me-2"></i>
                            Backend Development
                        </h5>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <span>Laravel</span>
                                <span>90%</span>
                            </div>
                            <div class="progress mb-2">
                                <div class="progress-bar" style="width: 90%"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <span>PHP</span>
                                <span>85%</span>
                            </div>
                            <div class="progress mb-2">
                                <div class="progress-bar" style="width: 85%"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <span>MySQL</span>
                                <span>80%</span>
                            </div>
                            <div class="progress mb-2">
                                <div class="progress-bar" style="width: 80%"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <span>REST APIs</span>
                                <span>85%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" style="width: 85%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-laptop-code text-primary me-2"></i>
                            Frontend Development
                        </h5>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <span>JavaScript</span>
                                <span>80%</span>
                            </div>
                            <div class="progress mb-2">
                                <div class="progress-bar" style="width: 80%"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <span>jQuery</span>
                                <span>85%</span>
                            </div>
                            <div class="progress mb-2">
                                <div class="progress-bar" style="width: 85%"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <span>Bootstrap</span>
                                <span>90%</span>
                            </div>
                            <div class="progress mb-2">
                                <div class="progress-bar" style="width: 90%"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <span>WordPress</span>
                                <span>85%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" style="width: 85%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
