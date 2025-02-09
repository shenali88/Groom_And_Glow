<?php
session_start(); // Start session to track supplier login
include 'connection.php';

$supplier_id = $_SESSION['supplier_id']; // Get the logged-in supplier's ID

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data only for the logged-in supplier
$data = [];
if (isset($_POST['view_all']) && $supplier_id) {
    $stmt = $conn->prepare("SELECT * FROM wanted_items WHERE supplier_id = ?");
    $stmt->bind_param("i", $supplier_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    $stmt->close();
}

$conn->close();

// Return the fetched data as an array
echo json_encode($data);
?>