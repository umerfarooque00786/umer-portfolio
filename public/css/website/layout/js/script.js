/* ===================================
   PORTFOLIO LAYOUT JAVASCRIPT
   =================================== */

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
