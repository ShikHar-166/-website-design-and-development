<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Precious Memories - Portfolio</title>
    <style>
        body {
            font-family: 'Krysttal Spears', cursive;
            background-color: #dddddd;
            color: #c8a165;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
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
            flex: 1;
            padding: 50px;
            text-align: center;
        }

        .content h2 {
            font-size: 2.5rem;
            margin-bottom: 40px;
        }

        .client {
            margin-bottom: 40px;
            padding: 20px;
            border: 2px solid #c8a165; /* Subtle border for separation */
            border-radius: 10px;
            overflow: hidden;
            text-align: left;
            color: #c8a165; /* Consistent font color for description */
        }

        .client h3 {
            font-size: 1.8rem;
            color: #c8a165;
        }

        .client p {
            font-size: 1.2rem;
            color: #c8a165; /* Ensures color consistency */
            margin: 10px 0 20px;
        }

        .client img {
            width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 10px;
            margin-top: 10px;
        }

        footer {
            background-color: #dddddd;
            padding: 10px;
            text-align: center;
            color: #c8a165;
            position: relative;
            bottom: 0;
            width: 100%;
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
        <h2>Our Clients</h2>
        <?php
            // Include the database connection
            include 'db_connect.php';

            // Query to fetch data from the 'projects' table
            $query = "SELECT name, description, image FROM projects";
            $result = mysqli_query($conn, $query);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $base64Image = base64_encode($row['image']);
                    $imageSrc = 'data:image/jpeg;base64,' . $base64Image;
                    echo "
                    <div class='client'>
                        <h3>{$row['name']}</h3>
                        <p>{$row['description']}</p>
                        <img src='$imageSrc' alt='{$row['name']}'>
                    </div>";
                }
            } else {
                echo "Error fetching projects: " . mysqli_error($conn);
            }

            mysqli_close($conn);
        ?>
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
