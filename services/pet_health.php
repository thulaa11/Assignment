<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Services</title>
    <link rel="stylesheet" href="../styles/services.css">
</head>
<body>
    <?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    include '../includes/header.php';
    include '../includes/db_connect.php';

    $query = "SELECT * FROM services WHERE category = 'Health'";
    $result = $conn->query($query);
    ?>

    <h2>Pet Health Services</h2>
    <div class="service-grid">
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($service = $result->fetch_assoc()): ?>
                <div class="service-item">
                    <img src="../assets/images/<?= htmlspecialchars($service['image_url']) ?>" 
                         alt="<?= htmlspecialchars($service['name']) ?>" width="275" height="250">
                    <h3><?= htmlspecialchars($service['name']) ?></h3>
                    <p><?= htmlspecialchars($service['description']) ?></p>
                    <a href="../user/add_to_cart.php?service_id=<?= urlencode($service['id']) ?>" class="book-now">Book Now</a>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No health services available at the moment.</p>
        <?php endif; ?>
    </div>

    <?php include '../includes/footer.php'; ?>
</body>
</html>