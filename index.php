<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js"></script>
    <title>Precious Memories - Home</title>
    <style>
        @font-face {
            font-family: 'Krysttal Spears';
            src: url('fonts/KrysttalSpears.ttf') format('truetype');
        }

        body {
            font-family: 'Krysttal Spears', cursive;
            background-color: #dddddd;
            color: #c8a165;
            margin: 0;
            padding: 0;
        }

        /* Nav bar styling */
        nav {
            background-color: #dddddd;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            text-decoration: none;
            color: #c8a165;
            font-size: 1.1rem;
        }

        nav ul li a:hover {
            color: #ffb74d;
        }

        .admin-button {
            background-color: #c8a165; /* Button color */
            color: #ffffff; /* Text color */
            border: none;
            border-radius: 5px; /* Rounded corners */
            padding: 10px 15px; /* Spacing */
            font-size: 1.1rem; /* Font size */
            cursor: pointer; /* Pointer cursor on hover */
            transition: background-color 0.3s ease; /* Smooth transition */
            margin-left: 15px; /* Space between items */
        }

        .admin-button:hover {
            background-color: #ffb74d; /* Color change on hover */
        }

        .hero {
            padding: 20px 0;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .hero h1 {
            font-size: 4rem;
            margin-bottom: 10px;
        }

        .content {
            text-align: center;
            padding: 40px;
        }

        .gallery {
            display: block; 
        }

        .gallery img {
            width: 100%; 
            height: auto; 
            object-fit: cover; /
            margin: 0; 
            border-radius: 0; 
        }

        footer {
            background-color: #dddddd;
            padding: 10px;
            text-align: center;
            color: #c8a165;
        }

        .social-icons a {
            margin: 0 20px;
            color: #c8a165;
            text-decoration: none;
        }

        .social-icons img {
            height: 40px;
            width: 40px;
            transition: transform 0.3s;
        }

        .social-icons img:hover {
            transform: scale(1.1);
        }

      
@media (max-width: 768px) {
    .hero h1 {
        font-size: 3rem; /* Adjust heading size */
    }

    .content h2 {
        font-size: 2rem; /* Adjust heading size */
    }

    nav {
        flex-direction: column; /* Stack navigation items */
        align-items: center; /* Center align items */
    }

    nav ul {
        flex-direction: column; /* Stack nav items */
        width: 100%; /* Full width for nav items */
        text-align: center; /* Center align text */
    }

    nav ul li {
        margin: 5px 0; /* Adjust spacing between items */
    }

    .admin-button {
        width: 100%; /* Make button full width */
        margin-top: 10px; /* Add spacing */
    }

    .gallery {
        flex-direction: column; /* Keep images in a column */
    }
}

@media (max-width: 480px) {
    .hero h1 {
        font-size: 2.5rem; /* Further reduce font size */
    }

    .content h2 {
        font-size: 1.5rem; /* Adjust heading size */
    }

    nav ul {
        width: 100%; /* Ensure nav items take full width */
    }

    .admin-button {
        width: 100%; /* Make button full width */
        margin-top: 10px; /* Add spacing */
    }
}

    </style>
</head>

<body>
    <nav>
        <div class="logo">
            <img src="assets/images/logo.png" alt="Precious Memories" style="height: 40px;">
        </div>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="portfolio.php">Portfolio</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="experience.php">Experience</a></li>
            <li><a href="contact.php">Contact</a></li>
           
        </ul>
    </nav>

    <div class="hero">
        <h1>Welcome to Precious Memories</h1>
    </div>

    <div class="content">
        <h2>Creating Memories That Last Forever</h2>
        <p>At Precious Memories, we specialize in capturing the beauty of life's most cherished moments. From weddings
            to family portraits, our team of professional photographers has a passion for making every shot unique and
            special. Whether you're looking for high-quality photos for a special occasion or simply want to capture a
            moment in time, we are here to create beautiful and timeless images.</p>
    </div>

    <div class="gallery">
        <img src="assets/images/sample1.jpg" alt="Sample Image 1">
        <img src="assets/images/sample2.jpg" alt="Sample Image 2">
        <img src="assets/images/sample3.jpg" alt="Sample Image 3">
    </div>

    <footer>
        <p>&copy; 2024 Precious Memories. All rights reserved.</p>
        <div class="social-icons">
            <a href="https://facebook.com" target="_blank"><img src="assets/images/facebook.png" alt="Facebook"></a>
            <a href="https://instagram.com" target="_blank"><img src="assets/images/instagram.png" alt="Instagram"></a>
            <a href="mailto:info@preciousmemories.com"><img src="assets/images/email.png" alt="Email"></a>
        </div>
    </footer>
</body>

</html>
