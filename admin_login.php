<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Precious Memories - Admin Login</title>
    <style>
        /* Same styles as the registration page */
        @font-face {
            font-family: 'Krysttal Spears';
            src: url('fonts/KrysttalSpears.ttf') format('truetype');
        }
        body {
            font-family: 'Krysttal Spears', cursive;
            background-color: #fdf6e3;
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

        .form-section {
            max-width: 600px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #c8a165;
        }
        .form-section label, .form-section input {
            display: block;
            width: 100%;
            margin: 10px 0;
        }
        .form-section input {
            padding: 10px;
            border: 1px solid #c8a165;
            border-radius: 5px;
        }
        .form-section input[type="submit"] {
            background-color: #c8a165;
            color: #fff;
            cursor: pointer;
            border: none;
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
        <ul>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="admin_register.php">Admin Register</a></li>
        </ul>
    </nav>

    <div class="form-section">
        <h3>Admin Login</h3>
        <?php
        session_start();

        // Connect to the database
        $conn = new mysqli("localhost", "root", "", "PreciousMemoriesApp");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Prepare and execute the SQL query securely
            $stmt = $conn->prepare("SELECT * FROM AdminUsers WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if (password_verify($password, $row['password'])) {
                    $_SESSION['admin'] = $username;
                    header("Location: admin_dashboard.php");
                    exit;
                } else {
                    echo "<p style='color:red;'>Invalid password!</p>";
                }
            } else {
                echo "<p style='color:red;'>Admin not found!</p>";
            }

            $stmt->close();
        }

        $conn->close();
        ?>
        <form action="admin_login.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Login">
        </form>
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
