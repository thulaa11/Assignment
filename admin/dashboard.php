<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include '../includes/db_connect.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit;
}

$product_count_query = "SELECT COUNT(*) as total_products FROM products";
$service_count_query = "SELECT COUNT(*) as total_services FROM services";

$product_count_result = $conn->query($product_count_query)->fetch_assoc();
$service_count_result = $conn->query($service_count_query)->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - PetCare</title>
    <link rel="stylesheet" href="../styles/admin_dashboard.css">
</head>
<body>
    <div id="admin" class="nav">
        <h1>Welcome, Admin</h1>
            <nav>
                <ul>
                    <li><a href="manage_products.php">Manage Products</a></li>
                    <li><a href="manage_services.php">Manage Services</a></li>
                    <li><a href="../logout.php">Logout</a></li>
                </ul>
         </nav>
    </div>
    <div id="admin" class="main">
        <div class="stats">
            <div class="stat-card">
                <h2>Total Products</h2>
                <p><?= $product_count_result['total_products'] ?? 0; ?></p>
            </div>
            <div class="stat-card">
                <h2>Total Services</h2>
                <p><?= $service_count_result['total_services'] ?? 0; ?></p>
            </div>
        </div>
    </div>
</body>
</html>
