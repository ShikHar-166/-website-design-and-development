<?php
// Include the database connection file
include 'db_connect.php';

// Initialize the selected category variable
$selectedCategory = isset($_GET['category']) ? $_GET['category'] : 'all';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Precious Memories - Gallery</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Krysttal Spears', cursive;
            background-color: #dddddd;
            color: #c8a165;
            margin: 0;
            padding: 0;
        }

        /* Navbar Styling */
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

        .logo img {
            height: 100px;
            transition: transform 0.3s ease-in-out;
        }

        .logo img:hover {
            transform: scale(1.1);
        }

        /* Gallery Section Styling */
        .gallery-section {
            padding: 50px 80px;
            text-align: center;
        }

        .gallery-section h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .gallery-section p {
            font-size: 1.2rem;
            margin-bottom: 40px;
            color: #333;
        }

        /* Dropdown styles */
        .category-select {
            margin-bottom: 20px;
            padding: 10px;
            font-size: 1rem;
        }

        /* Gallery Grid */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            padding: 0 20px; /* Avoid edge-to-edge layout */
            margin-top: 20px;
            align-items: start;
        }

        .gallery-grid img {
            width: 100%;
            height: auto;
            object-fit: cover;
            transition: transform 0.3s ease-in-out;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Optional shadow */
        }

        .gallery-grid img:hover {
            transform: scale(1.05);
        }

        footer {
            background-color: #dddddd;
            padding: 10px;
            text-align: center;
            color: #c8a165;
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
            .gallery-section h1 {
                font-size: 2.5rem;
            }

            nav {
                flex-direction: column;
                align-items: center;
            }

            nav ul {
                flex-direction: column;
                width: 100%;
                text-align: center;
            }

            nav ul li {
                margin: 5px 0;
            }
        }

        @media (max-width: 480px) {
            .gallery-section h1 {
                font-size: 2rem;
            }

            nav ul {
                width: 100%;
            }
        }

    </style>
</head>
<body>
    <nav>
        <div class="logo">
            <img src="assets/images/logo.png" alt="Precious Memories">
        </div>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="portfolio.php">Portfolio</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="experience.php">Experience</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>

    <div class="gallery-section">
        <h1>Gallery</h1>
        <p>Welcome to our gallery! Here you can explore a collection of our favorite moments captured through our lens. Each photograph tells a story and reflects the emotions of the occasion. Browse through our portfolio and let us know what you think!</p>

        <!-- Dropdown for Category Selection -->
        <form method="GET" action="">
            <select name="category" class="category-select" onchange="this.form.submit()">
                <option value="all" <?php if ($selectedCategory == 'all') echo 'selected'; ?>>All Categories</option>
                <option value="wedding" <?php if ($selectedCategory == 'wedding') echo 'selected'; ?>>Wedding</option>
                <option value="events" <?php if ($selectedCategory == 'events') echo 'selected'; ?>>Events</option>
                <option value="wild" <?php if ($selectedCategory == 'wild') echo 'selected'; ?>>Wildlife</option>
            </select>
        </form>

        <div class="gallery-grid">
            <?php
                // Create the query based on selected category
                if ($selectedCategory === 'all') {
                    $query = "SELECT image FROM Photos";
                } else {
                    $query = "SELECT image FROM Photos WHERE category = '$selectedCategory'";
                }

                // Execute the query
                $result = $conn->query($query);

                // Check if query execution was successful
                if ($result) {
                    // Loop through and display each image
                    while ($row = $result->fetch_assoc()) {
                        $base64Image = base64_encode($row['image']);
                        $imageSrc = 'data:image/jpeg;base64,' . $base64Image;
                        echo "<img class='scroll-image' src='$imageSrc' alt='Gallery Image'>";
                    }
                } else {
                    echo "Error fetching images: " . $conn->error;
                }

                // Close the database connection
                $conn->close();
            ?>
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

    <!-- JavaScript for Scroll Animation (Optional) -->
    <script src="scrollAnimation.js"></script>
</body>
</html>
