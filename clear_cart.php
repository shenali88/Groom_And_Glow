<?php
session_start();
include 'connection.php';

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit;
}

$customer_id = $_SESSION['user_id'];

// Delete all items in the cart for the logged-in user
$sql = "DELETE FROM customer_item WHERE customer_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $customer_id);

if ($stmt->execute()) {
    // Redirect back to the cart page after clearing
    header("Location: addtocart.php");
    exit;
} else {
    echo "Error clearing the cart. Please try again.";
}
?>
