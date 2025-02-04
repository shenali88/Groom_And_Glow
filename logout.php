<?php
// Start the session
session_start();

// Check if the logout button is clicked
if (isset($_POST['logout'])) {
    // Unset all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect to the login page or home page
    header("Location: index.php");
    exit();
}
?>