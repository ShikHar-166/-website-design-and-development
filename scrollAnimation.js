// JavaScript code to handle scroll animations for images
document.addEventListener('DOMContentLoaded', function () {
    const imagesToAnimate = document.querySelectorAll('.scroll-image');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('in-view');
                observer.unobserve(entry.target); // Stop observing once animation is triggered
            }
        });
    }, { threshold: 0.2 }); // Trigger animation when 20% of the image is visible

    imagesToAnimate.forEach(image => {
        observer.observe(image);
    });
});
