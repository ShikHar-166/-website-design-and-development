<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Precious Memories - Experience & Skills</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujzLg2qRI+YrM6e3WufXkYd/PhZu6pjWJRVr4pB7+6cYZW9R1wUlUweY+I2z5j3vFVsEx5RW0Ug==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Global styling */
        @font-face {
            font-family: 'Krysttal Spears';
            src: url('fonts/KrysttalSpears.ttf') format('truetype');
        }

        body {
            margin: 0;
            font-family: 'Krysttal Spears', cursive;
            background-color: #dddddd;
            color: #c8a165;
        }

        nav {
            background-color: #dddddd;
            padding: 1rem;
            text-align: center;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: flex-end;
        }

        nav ul li {
            margin: 0 20px;
        }

        nav ul li a {
            color: #c8a165;
            text-decoration: none;
            font-size: 1.1rem;
        }

        nav ul li a:hover {
            color: #ffb74d;
        }

        .main-content {
            display: flex;
            padding: 50px 80px;
        }

        .experience-section {
            width: 75%;
        }

        .experience-section h2 {
            font-size: 1.8rem;
            margin-top: 0;
        }

        .experience-item {
            margin-bottom: 40px;
        }

        .experience-image {
            width: 100%;
            height: auto;
            margin-top: 10px;
            border: 2px solid #c8a165;
            border-radius: 10px;
        }

        .testimonial-section {
            width: 25%;
            background-color: #dddddd;
            padding: 20px;
            border-radius: 10px;
            margin-left: 20px;
        }

        .testimonial-section h2 {
            text-align: center;
            color: #c8a165;
            margin-bottom: 20px;
        }

        .testimonial {
            display: flex;
            align-items: center;
            font-style: italic;
            margin: 15px 0;
        }

        .testimonial img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
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

        /* Media Queries for Responsiveness */
        @media screen and (max-width: 768px) {
            .main-content {
                flex-direction: column;
                padding: 20px;
            }

            .experience-section, .testimonial-section {
                width: 100%;
                margin: 0;
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

    <div class="main-content">
        <div class="experience-section">
            <h2>Experience in Wedding Photography</h2>
            <p>An expert in capturing beautiful, candid moments at wedding ceremonies, I focus on the subtle details and genuine emotions that make each celebration unique. With an eye for spontaneous, heartfelt interactions, I strive to create timeless images that reflect the joy and intimacy of the day.</p>
            <img src="assets/images/wedding_experience.jpg" alt="Wedding Photography" class="experience-image">

            <h2>Event Photography Mastery</h2>
            <p>Skilled in covering large events, I consistently deliver high-quality shots that capture the essence of the occasion, even in challenging lighting conditions. With a keen eye for detail and adaptability, I work to ensure that each image reflects the atmosphere and scale of the event, from intimate moments to wide-angle crowd shots.</p>
            <img src="assets/images/event_experience.jpg" alt="Event Photography" class="experience-image">

            <h2>Proficient in Sports Photography</h2>
            <p>With extensive experience in fast-action sports photography, I specialize in capturing the dynamic movements and intense energy that define each moment on the field, court, or track. My work focuses on freezing split-second motions, from the adrenaline of a mid-air leap to the precision of a winning shot, all while preserving the vibrant atmosphere of the event. Through careful attention to timing, composition, and lighting, I create images that not only showcase athletic skill but also convey the excitement and emotion of the sport itself.






</p>
            <img src="assets/images/sports_experience.jpg" alt="Sports Photography" class="experience-image">
        </div>

        <div class="testimonial-section">
            <h2>Client Testimonials</h2>
            <div class="testimonial">
                <img src="assets/images/client1.jpg" alt="Client 1">
                <p>"The team at Precious Memories made our wedding unforgettable with their beautiful photos!" - Sarah & John</p>
            </div>
            <div class="testimonial">
                <img src="assets/images/client1.jpg" alt="Client 2">
                <p>"Professional, creative, and truly talented photographers. Highly recommended!" - Digital Trends Magazine</p>
            </div>
            <div class="testimonial">
                <img src="assets/images/client1.jpg" alt="Client 3">
                <p>"Their attention to detail and ability to capture emotions is just remarkable!" - Emily R.</p>
            </div>
        </div>
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
