<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include '../includes/db_connect.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit;
}

$error = $success = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $category = trim($_POST['category']);
    $image_url = trim($_POST['image_url']);

    if (empty($name) || empty($description) || empty($category) || empty($image_url)) {
        $error = "All fields are required.";
    } else {
        $stmt = $conn->prepare("INSERT INTO services (name, description, category, image_url) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $description, $category, $image_url);

        if ($stmt->execute()) {
            $success = "Service added successfully!";
        } else {
            $error = "Failed to add service.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Service</title>
    <link rel="stylesheet" href="../styles/admin_manage_services.css">
</head>
<body>
    <div class="container">
        <h1>Add New Service</h1>

        <?php if ($error): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php elseif ($success): ?>
            <div class="success"><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>

        <form action="add_services.php" method="POST">
            <label for="name">Service Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>

            <label for="category">Category:</label>
            <input type="text" id="category" name="category" required>

            <label for="image_url">Image URL:</label>
            <input type="text" id="image_url" name="image_url" required>

            <button type="submit">Add Service</button>
        </form>

        <p><a href="manage_services.php">&larr; Back to Manage Services</a></p>
    </div>
</body>
</html>
