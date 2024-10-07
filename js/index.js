document.addEventListener('DOMContentLoaded', () => {
    const navSlide = () => {
        const hamburger = document.querySelector('.hamburger');
        const nav = document.querySelector('.nav-links');
        const navLinks = document.querySelectorAll('.nav-links li');

        hamburger.addEventListener('click', () => {
            // Toggle Nav
            navLinks.classList.toggle('show');
            hamburger.classList.toggle('active');

            // Animate Links
            navLinks.forEach((link, index) => {
                if (link.style.animation) {
                    link.style.animation = '';
                } else {
                    link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.3}s`;
                }
            });

            // hamburger Animation
            hamhamburger.classList.toggle('toggle');
        });
    }

    navSlide();

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    // Testimonial slider
    const testimonials = document.querySelector('.testimonial-slider');
    let isDown = false;
    let startX;
    let scrollLeft;

    testimonials.addEventListener('mousedown', (e) => {
        isDown = true;
        startX = e.pageX - testimonials.offsetLeft;
        scrollLeft = testimonials.scrollLeft;
    });

    testimonials.addEventListener('mouseleave', () => {
        isDown = false;
    });

    testimonials.addEventListener('mouseup', () => {
        isDown = false;
    });

    testimonials.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - testimonials.offsetLeft;
        const walk = (x - startX) * 3;
        testimonials.scrollLeft = scrollLeft - walk;
    });

    // Intersection Observer for animations
    const faders = document.querySelectorAll('.fade-in');
    const sliders = document.querySelectorAll('.slide-in');

    const appearOptions = {
        threshold: 0,
        rootMargin: "0px 0px -100px 0px"
    };

    const appearOnScroll = new IntersectionObserver(function(
        entries,
        appearOnScroll
    ) {
        entries.forEach(entry => {
            if (!entry.isIntersecting) {
                return;
            } else {
                entry.target.classList.add('appear');
                appearOnScroll.unobserve(entry.target);
            }
        });
    }, appearOptions);

    faders.forEach(fader => {
        appearOnScroll.observe(fader);
    });

    sliders.forEach(slider => {
        appearOnScroll.observe(slider);
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const dropbtn = document.querySelector('.dropbtn');
    const dropdownContent = document.querySelector('.dropdown-content');

    dropbtn.addEventListener('click', function(e) {
        e.preventDefault();
        dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
    });

    // Close the dropdown when clicking outside of it
    window.addEventListener('click', function(e) {
        if (!e.target.matches('.dropbtn')) {
            dropdownContent.style.display = 'none';
        }
    });
});
