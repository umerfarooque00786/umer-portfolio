<!-- Professional Footer -->
<footer>
    <div class="container footer-content">
        <div class="footer-main">
            <div class="row g-4">
                <!-- Brand & Description -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="footer-brand">
                        <div class="footer-logo-icon">
                            <svg viewBox="0 0 100 100" width="50" height="50">
                                <!-- Code brackets -->
                                <path d="M25 20 L10 35 L10 65 L25 80" stroke="#667eea" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M75 20 L90 35 L90 65 L75 80" stroke="#667eea" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                                <!-- Forward slash -->
                                <path d="M60 20 L40 80" stroke="#764ba2" stroke-width="4" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <div class="footer-logo-text">
                            <div class="footer-logo-name">UMER FAROOQUE</div>
                            <div class="footer-logo-title">Full-Stack Web Developer</div>
                        </div>
                    </div>
                    <p class="footer-description">
                        Passionate Full Stack Developer crafting exceptional digital experiences with modern technologies. 
                        Specializing in Laravel, WordPress, and JavaScript ecosystems.
                    </p>
                    <div class="social-links">
                        <a href="https://github.com/umerfarooque" class="social-link" target="_blank" title="GitHub">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="https://linkedin.com/in/umerfarooque" class="social-link" target="_blank" title="LinkedIn">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="mailto:umer@example.com" class="social-link" title="Email">
                            <i class="fas fa-envelope"></i>
                        </a>
                        <a href="https://twitter.com/umerfarooque" class="social-link" target="_blank" title="Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="footer-section">
                        <h5><i class="fas fa-link"></i> Navigation</h5>
                        <ul class="footer-links">
                            <li><a href="{{ route('home') }}"><i class="fas fa-home"></i>Home</a></li>
                            <li><a href="{{ route('about') }}"><i class="fas fa-user"></i>About</a></li>
                            <li><a href="{{ route('projects') }}"><i class="fas fa-code"></i>Projects</a></li>
                            <li><a href="{{ route('contact') }}"><i class="fas fa-envelope"></i>Contact</a></li>
                            <li><a href="{{ route('download.cv') }}"><i class="fas fa-download"></i>Download CV</a></li>
                        </ul>
                    </div>
                </div>
                
                <!-- Services -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="footer-section">
                        <h5><i class="fas fa-cogs"></i> Services</h5>
                        <ul class="footer-links">
                            <li><a href="#"><i class="fas fa-laptop-code"></i>Web Development</a></li>
                            <li><a href="#"><i class="fab fa-laravel"></i>Laravel Applications</a></li>
                            <li><a href="#"><i class="fab fa-wordpress"></i>WordPress Development</a></li>
                            <li><a href="#"><i class="fas fa-mobile-alt"></i>Responsive Design</a></li>
                            <li><a href="#"><i class="fas fa-database"></i>Database Design</a></li>
                        </ul>
                    </div>
                </div>
                
                <!-- Technologies -->
                <div class="col-lg-2 col-md-6 mb-4">
                    <div class="footer-section">
                        <h5><i class="fas fa-code"></i> Technologies</h5>
                        <div class="footer-skills">
                            <span class="footer-skill-tag">Laravel</span>
                            <span class="footer-skill-tag">PHP</span>
                            <span class="footer-skill-tag">JavaScript</span>
                            <span class="footer-skill-tag">jQuery</span>
                            <span class="footer-skill-tag">Bootstrap</span>
                            <span class="footer-skill-tag">MySQL</span>
                            <span class="footer-skill-tag">WordPress</span>
                            <span class="footer-skill-tag">REST API</span>
                            <span class="footer-skill-tag">Git</span>
                            <span class="footer-skill-tag">GSAP</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-copyright">
                        <span>&copy; {{ date('Y') }} Umer Farooque.</span>
                        <span>All rights reserved.</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</footer>
