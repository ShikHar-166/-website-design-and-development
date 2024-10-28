// Basic JavaScript to enhance responsiveness and interactivity

window.addEventListener('resize', function() {
    // Perform actions like resizing images or adjusting the layout
});

function toggleNavMenu() {
    // Toggle the navigation menu on smaller screens
    const nav = document.querySelector('nav ul');
    if (nav.style.display === 'flex') {
        nav.style.display = 'none';
    } else {
        nav.style.display = 'flex';
    }
}
