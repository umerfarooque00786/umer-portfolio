<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="footer-brand">
                    <div class="footer-logo">
                        <svg viewBox="0 0 100 100" width="50" height="50">
                            <!-- Code brackets -->
                            <path d="M25 20 L10 35 L10 65 L25 80" stroke="#667eea" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M75 20 L90 35 L90 65 L75 80" stroke="#667eea" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                            <!-- Forward slash -->
                            <path d="M60 20 L40 80" stroke="#764ba2" stroke-width="4" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <h5 class="footer-title">Umer Farooque</h5>
                    <p class="footer-subtitle">Full-Stack Web Developer</p>
                    <p class="footer-description">
                        Passionate about creating beautiful, functional, and user-friendly web applications 
                        using modern technologies and best practices.
                    </p>
                </div>
            </div>
            
            <div class="col-lg-2 col-md-6 mb-4">
                <h6 class="footer-heading">Quick Links</h6>
                <ul class="footer-links">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="{{ route('projects') }}">Projects</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <h6 class="footer-heading">Services</h6>
                <ul class="footer-links">
                    <li><a href="#">Web Development</a></li>
                    <li><a href="#">Frontend Development</a></li>
                    <li><a href="#">Backend Development</a></li>
                    <li><a href="#">API Development</a></li>
                </ul>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <h6 class="footer-heading">Connect</h6>
                <div class="social-links">
                    <a href="#" class="social-link" title="LinkedIn">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="#" class="social-link" title="GitHub">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="#" class="social-link" title="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="mailto:umer.farooque@example.com" class="social-link" title="Email">
                        <i class="fas fa-envelope"></i>
                    </a>
                </div>
                <div class="footer-contact">
                    <p><i class="fas fa-envelope me-2"></i>umer.farooque@example.com</p>
                    <p><i class="fas fa-phone me-2"></i>+92 300 1234567</p>
                </div>
            </div>
        </div>
        
        <hr class="footer-divider">
        
        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="footer-copyright">
                    &copy; {{ date('Y') }} Umer Farooque. All rights reserved.
                </p>
            </div>
            <div class="col-md-6 text-md-end">
                <div class="footer-actions">
                    <a href="{{ route('download.cv') }}" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-download me-1"></i>Download CV
                    </a>
                    <a href="{{ route('contact') }}" class="btn btn-primary btn-sm ms-2">
                        <i class="fas fa-envelope me-1"></i>Hire Me
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
