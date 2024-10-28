<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Precious Memories - Contact</title>
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
        .content {
            padding: 50px;
        }
        .form-section h3 {
            font-size: 2rem;
            margin-bottom: 20px;
        }
        .form-section form {
            max-width: 600px;
            margin: 0 auto;
        }
        .form-section label {
            display: block;
            margin: 10px 0 5px;
        }
        .form-section input, .form-section textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #c8a165;
            border-radius: 5px;
            background-color: #fff;
            color: #333;
            font-family: 'Krysttal Spears', cursive;
        }
        .form-section textarea {
            resize: vertical;
            height: 100px;
        }
        .form-section input[type="submit"] {
            background-color: #c8a165;
            color: #fff;
            cursor: pointer;
            border: none;
        }
        .form-section input[type="submit"]:hover {
            background-color: #ffb74d;
        }
        footer {
            background-color: #dddddd;
            padding: 10px;
            text-align: center;
            color: #c8a165;
        }
        .social-icons {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .social-icons a {
            margin: 0 20px;
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

    <div class="content">
        <h2>Contact Us</h2>
        <p>We would love to hear from you! Whether you’re interested in scheduling a photoshoot or simply want more information about our services, feel free to get in touch.</p>

        <div class="form-section">
            <h3>Contact Form</h3>
            <?php
            // Include database connection
            include 'db_connect.php';

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = $conn->real_escape_string($_POST['name']);
                $email = $conn->real_escape_string($_POST['email']);
                $message = $conn->real_escape_string($_POST['details']);

                // Insert data into Inquiries table
                $sql = "INSERT INTO Inquiries (name, email, message) VALUES ('$name', '$email', '$message')";

                if ($conn->query($sql) === TRUE) {
                    echo "<p style='color:green;'>Message sent successfully!</p>";
                } else {
                    echo "Error: " . $conn->error;
                }
            }

            $conn->close();
            ?>
            <form action="contact.php" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="details">How can we help you?</label>
                <textarea id="details" name="details" placeholder="Please let us know your requirements or questions"></textarea>

                <input type="submit" value="Submit">
            </form>
            <div class="social-icons">
                <a href="https://facebook.com" target="_blank"><img src="assets/images/facebook.png" alt="Facebook"></a>
                <a href="https://instagram.com" target="_blank"><img src="assets/images/instagram.png" alt="Instagram"></a>
                <a href="mailto:info@preciousmemories.com"><img src="assets/images/email.png" alt="Email"></a>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Precious Memories. All rights reserved.</p>
    </footer>
</body>
</html>
