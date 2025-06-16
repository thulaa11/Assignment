<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include '../includes/db_connect.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
    header("Location: ../login.php");
    exit;
}

$userId = $_SESSION['user_id'];
$message = "";

// Fetch user details
$stmt = $conn->prepare("SELECT username, email, created_at FROM users WHERE id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$userData = $stmt->get_result()->fetch_assoc();

// Handle profile update form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($email)) {
        $message = "Username and email are required.";
    } else {
        if (!empty($password)) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE users SET username = ?, email = ?, password = ? WHERE id = ?");
            $stmt->bind_param("sssi", $username, $email, $hashed_password, $userId);
        } else {
            $stmt = $conn->prepare("UPDATE users SET username = ?, email = ? WHERE id = ?");
            $stmt->bind_param("ssi", $username, $email, $userId);
        }

        if ($stmt->execute()) {
            $_SESSION['username'] = $username;
            $message = "Profile updated successfully.";
        } else {
            $message = "Error updating profile.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - PetCare</title>
    <link rel="stylesheet" href="../styles/user_dashboard.css">
</head>
<body>
    <div class="dashboard-container">
        <header class="dashboard-header">
            <h1>Welcome, <?= htmlspecialchars($userData['username']) ?>!</h1>
            <nav>
                <ul>
                    <li><a href="../products/foods.php">View Foods</a></li>
                    <li><a href="../products/tools.php">View Tools</a></li>
                    <li><a href="view_cart.php">My Cart</a></li>
                    <li><a href="../logout.php">Logout</a></li>
                </ul>
            </nav>
        </header>

        <main>
            <!-- User Info Section -->
            <section class="user-info">
                <h2>Your Details</h2>
                <p><strong>Username:</strong> <?= htmlspecialchars($userData['username']) ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($userData['email']) ?></p>
                <p><strong>Member Since:</strong> <?= date("F j, Y", strtotime($userData['created_at'])) ?></p>
            </section>

            <!-- Profile Update Form -->
            <section class="profile-form">
                <h2>Update Profile</h2>

                <?php if (!empty($message)): ?>
                    <div class="message"><?= htmlspecialchars($message) ?></div>
                <?php endif; ?>

                <form action="" method="POST">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" value="<?= htmlspecialchars($userData['username']) ?>" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?= htmlspecialchars($userData['email']) ?>" required>

                    <label for="password">Password (leave blank to keep unchanged):</label>
                    <input type="password" id="password" name="password">

                    <button type="submit">Update Profile</button>
                </form>
            </section>
        </main>
    </div>
</body>
</html>
