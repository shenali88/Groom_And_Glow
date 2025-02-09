<?php
include 'connection.php';

// Check if form data is received
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $supplier_id = intval($_POST['supplier_id']);
    $item_name = $conn->real_escape_string($_POST['item_name']);
    $colour = $conn->real_escape_string($_POST['color']); 
    $sizes = isset($_POST['size']) ? implode(", ", $_POST['size']) : ''; 
    $quantity = intval($_POST['quantity']);
    $date_requested = $_POST['date_requested']; // Capture the date input

    // Insert data into wanted_items table
    $sql = "INSERT INTO wanted_items (supplier_id, item_name, colour, size, quantity, date_requested) 
            VALUES ('$supplier_id', '$item_name', '$colour', '$sizes', '$quantity', '$date_requested')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data inserted successfully!'); window.location.href='admindashsupplier.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
