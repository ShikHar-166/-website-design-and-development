<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit;
}
// Include database connection
include 'db_connect.php';

$uploadSuccessMessage = ""; // Variable for upload success message
$deleteSuccessMessage = ""; // Variable for delete success message

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['upload'])) {
        // Handle file upload
        $category = $conn->real_escape_string($_POST['category']);
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

        // Insert data into Photos table
        $sql = "INSERT INTO Photos (image, category) VALUES ('$image', '$category')";

        if ($conn->query($sql) === TRUE) {
            $uploadSuccessMessage = "Image uploaded successfully!";
        } else {
            $uploadSuccessMessage = "Error: " . $conn->error;
        }
    } elseif (isset($_POST['delete'])) {
        // Handle photo deletion
        $photoId = $conn->real_escape_string($_POST['photo_id']);
        $sql = "DELETE FROM Photos WHERE id='$photoId'";

        if ($conn->query($sql) === TRUE) {
            $deleteSuccessMessage = "Image deleted successfully!";
        } else {
            $deleteSuccessMessage = "Error: " . $conn->error;
        }
    }
}

// Fetch existing photos
$query = "SELECT id, image, category FROM Photos";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Gallery</title>
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
        .form-section input, .form-section select {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #c8a165;
            border-radius: 5px;
            background-color: #fff;
            color: #333;
            font-family: 'Krysttal Spears', cursive;
        }
        .form-section input[type="file"] {
            padding: 5px;
        }
        .form-section input[type="submit"], .form-section button {
            background-color: #c8a165;
            color: #fff;
            cursor: pointer;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
        }
        .form-section input[type="submit"]:hover, .form-section button:hover {
            background-color: #ffb74d;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #c8a165;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #c8a165;
            color: white;
        }
        footer {
            background-color: #dddddd;
            padding: 10px;
            text-align: center;
            color: #c8a165;
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
    <script>
        // Function to show upload alert
        function showUploadAlert(message) {
            alert(message);
        }

        // Function to show delete alert
        function showDeleteAlert(message) {
            alert(message);
        }
    </script>
</head>
<body>
    <nav>
        <div class="logo">
            <img src="assets/images/logo.png" alt="Precious Memories" style="height: 40px;">
        </div>
        <ul>
            <li><a href="admin_dashboard.php">Admin Dashboard</a></li>
            <li><a href="edit_contact.php">Edit Contact</a></li>          
            <li><a href="edit_portfolio.php">Edit Portfolio</a></li> 
            <li><a href="view_messages.php">View Messages</a></li> 
            <li><a href="admin_logout.php">Logout</a></li>
        </ul>
    </nav>

    <div class="content">
        <h2>Upload Image to Gallery</h2>
        <div class="form-section">
            <form action="edit_gallery.php" method="POST" enctype="multipart/form-data">
                <label for="category">Category:</label>
                <input type="text" id="category" name="category" required>

                <label for="image">Image:</label>
                <input type="file" id="image" name="image" accept="image/*" required>

                <input type="submit" name="upload" value="Upload Image" onclick="showUploadAlert('<?= $uploadSuccessMessage ?>');">
            </form>
        </div>

        <h2>Existing Gallery Images</h2>
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($result) && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $base64Image = base64_encode($row['image']);
                        $imageSrc = 'data:image/jpeg;base64,' . $base64Image;

                        echo "<tr>
                            <td><img src='$imageSrc' alt='Gallery Image' style='width: 100px; height: 100px;'></td>
                            <td>{$row['category']}</td>
                            <td>
                                <form action='edit_gallery.php' method='POST' style='display:inline;' onsubmit=\"showDeleteAlert('Image deleted successfully!');\">
                                    <input type='hidden' name='photo_id' value='{$row['id']}'>
                                    <button type='submit' name='delete' onclick='return confirm(\"Are you sure you want to delete this image?\");'>Delete</button>
                                </form>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No images found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <footer>
        <p>&copy; 2024 Precious Memories. All rights reserved.</p>
    </footer>

    <script>
        // Display the upload success message if it exists
        <?php if ($uploadSuccessMessage): ?>
            showUploadAlert("<?= $uploadSuccessMessage ?>");
        <?php endif; ?>

        // Display the delete success message if it exists
        <?php if ($deleteSuccessMessage): ?>
            showDeleteAlert("<?= $deleteSuccessMessage ?>");
        <?php endif; ?>
    </script>
</body>
</html>
