<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit;
}

 include 'db_connect.php';

$sql = "SELECT * FROM inquiries"; // Ensure this matches your actual table name
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Messages - Precious Memories</title>
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
        }, footer {
            background-color: #dddddd;
            padding: 10px;
            text-align: center;
            color: #c8a165;
        }
        .messages-table {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #c8a165;
        }
        .messages-table h2 {
            text-align: center;
        }
        .messages-table table {
            width: 100%;
            border-collapse: collapse;
        }
        .messages-table th, .messages-table td {
            border: 1px solid #c8a165;
            padding: 10px;
            text-align: left;
        }
        .messages-table th {
            background-color: #c8a165;
            color: #fff;
        }
        .action-link {
            color: red;
            text-decoration: none;
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
            <li><a href="admin_dashboard.php">Admin Dashboard</a></li>
            <li><a href="edit_contact.php">Edit Contact</a></li>          
            <li><a href="edit_portfolio.php">Edit Portfolio</a></li> 
            <li><a href="view_messages.php">View Messages</a></li> 
            <li><a href="admin_logout.php">Logout</a></li>

        </ul>
    </nav>

    <div class="messages-table">
        <h2>View Contact Messages</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Action</th>
             
            </tr>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['message']); ?></td>
                    <td>
                        <a class="action-link" href="delete_contact.php?id=<?php echo $row['id']; ?>">Delete</a>
                        <a class="action-link" href="edit_message.php?id=<?php echo $row['id']; ?>">Edit</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No messages found.</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>

    <footer>
        <p>&copy; 2024 Precious Memories. All rights reserved.</p>
    </footer>
</body>
</html>

<?php
$conn->close();
?>
