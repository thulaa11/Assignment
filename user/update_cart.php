<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$type = $_GET['type'] ?? null;
$id = $_GET['id'] ?? null;
$action = $_GET['action'] ?? null;

if ($type && $id && $action) {
    foreach ($_SESSION['cart'] as &$item) {
        $itemKey = ($type === 'products') ? 'product_id' : 'service_id';

        if ($item['type'] === $type && $item[$itemKey] == $id) {
            if ($action === 'increase') {
                $item['quantity']++;  // ✅ Increase quantity
            } elseif ($action === 'decrease' && $item['quantity'] > 1) {
                $item['quantity']--;  // ✅ Decrease quantity (but not below 1)
            }
            break;
        }
    }
}

// Redirect back to view_cart.php
header("Location: view_cart.php?message=" . urlencode("Cart updated successfully."));
exit;
?>
