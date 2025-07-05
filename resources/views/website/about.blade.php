@extends('website.layout')

@section('title', 'About - Umer Farooque')

@section('content')
<!-- About Hero Section -->
<section class="about-hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-content" data-aos="fade-up">
                    <h1 class="page-title">About <span class="text-gradient">Me</span></h1>
                    <p class="lead">
                        I'm a passionate full-stack web developer with expertise in modern web technologies. 
                        I love creating digital experiences that are both beautiful and functional.
                    </p>
                    <p>
                        With a strong foundation in both frontend and backend development, I specialize in 
                        building scalable web applications using Laravel, React, and modern JavaScript frameworks.
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-image" data-aos="fade-left" data-aos-delay="200">
                    <div class="profile-card">
                        <div class="profile-image">
                            <img src="{{ asset('images/profile.jpg') }}" alt="Umer Farooque" class="img-fluid">
                        </div>
                        <div class="profile-info">
                            <h4>Umer Farooque</h4>
                            <p>Full-Stack Developer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Experience Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title" data-aos="fade-up">Experience & Education</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="timeline" data-aos="fade-up">
                    <h4 class="timeline-title">Experience</h4>
                    <div class="timeline-item">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h5>Full-Stack Developer</h5>
                            <span class="timeline-date">2022 - Present</span>
                            <p>Developing web applications using Laravel, React, and modern technologies.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h5>Frontend Developer</h5>
                            <span class="timeline-date">2021 - 2022</span>
                            <p>Created responsive and interactive user interfaces using React and JavaScript.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="timeline" data-aos="fade-up" data-aos-delay="200">
                    <h4 class="timeline-title">Education</h4>
                    <div class="timeline-item">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h5>Computer Science</h5>
                            <span class="timeline-date">2018 - 2022</span>
                            <p>Bachelor's degree in Computer Science with focus on web development.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h5>Web Development Bootcamp</h5>
                            <span class="timeline-date">2020</span>
                            <p>Intensive training in modern web development technologies and frameworks.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title" data-aos="fade-up">Technical Skills</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="skills-category" data-aos="fade-up">
                    <h4>Frontend</h4>
                    <div class="skill-item">
                        <span>React</span>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 90%"></div>
                        </div>
                    </div>
                    <div class="skill-item">
                        <span>JavaScript</span>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 85%"></div>
                        </div>
                    </div>
                    <div class="skill-item">
                        <span>HTML/CSS</span>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 95%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="skills-category" data-aos="fade-up" data-aos-delay="200">
                    <h4>Backend</h4>
                    <div class="skill-item">
                        <span>Laravel</span>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 88%"></div>
                        </div>
                    </div>
                    <div class="skill-item">
                        <span>PHP</span>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 85%"></div>
                        </div>
                    </div>
                    <div class="skill-item">
                        <span>MySQL</span>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 80%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Download CV Section -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h3 data-aos="fade-up">Interested in working together?</h3>
                <p data-aos="fade-up" data-aos-delay="100">Download my CV to learn more about my experience and skills.</p>
                <a href="{{ route('download.cv') }}" class="btn btn-light btn-lg" data-aos="fade-up" data-aos-delay="200">
                    <i class="fas fa-download me-2"></i>Download CV
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
