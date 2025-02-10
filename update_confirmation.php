<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "shenu";
$dbname = "groom&glow";

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    die("Access denied. Please log in.");
}

$user_id = $_SESSION['user_id'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//  requested itme confirmation send button function code
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $supplier_id = $_POST["supplier_id"];
    $confirmation = $_POST["confirmation"];

    // Update the confirmation status in the database
    $sql = "UPDATE wanted_items SET confirmation = ? WHERE supplier_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $confirmation, $supplier_id);

    if ($stmt->execute()) {
        echo "<script>alert('Confirmation updated successfully!'); window.location.href='requesteditem.php';</script>";
    } else {
        echo "<script>alert('Error updating confirmation.'); window.location.href='your_table_page.php';</script>";
    }

    $stmt->close();
}

$conn->close();
?>
