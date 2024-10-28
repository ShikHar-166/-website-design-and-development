<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Precious Memories - Admin Dashboard</title>
    <style>
        @font-face {
            font-family: 'Krysttal Spears';
            src: url('fonts/KrysttalSpears.ttf') format('truetype');
        }
        body {
            font-family: 'Krysttal Spears', cursive;
            background-color: #dddddd;            color: #c8a165;
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
        .dashboard {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #c8a165;
        }
        .dashboard h3 {
            text-align: center;
        }
        .dashboard a {
            display: block;
            margin: 20px 0;
            text-align: center;
            background-color: #c8a165;
            color: #fff;
            padding: 10px;
            text-decoration: none;
            border-radius: 5px;
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
            <li><a href="admin_login.php">Logout</a></li>
        </ul>
    </nav>

    <div class="dashboard">
        <h3>PRECIOUS MEMORIES</h3>
        <p>WELCOME ADMIN <?php echo htmlspecialchars($_SESSION['admin']); ?></p>
        <a href="edit_contact.php">Edit Contact Messages</a>
        <a href="view_messages.php">View Messages</a>
        <a href="edit_portfolio.php">Edit Portfolio</a>
        <a href="edit_gallery.php">Edit Gallery</a>
    </div>

    <footer>
        <p>&copy; 2024 Precious Memories. All rights reserved.</p>
    </footer>
</body>
</html>
