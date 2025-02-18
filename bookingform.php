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

$user_id = $_SESSION['user_id']; // Get the logged-in user ID

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customername = $conn->real_escape_string($_POST['customername']);
    $packagename = $conn->real_escape_string($_POST['packagename']);
    $address = $conn->real_escape_string($_POST['address']);
    $email = $conn->real_escape_string($_POST['email']);
    $mobile_number = $conn->real_escape_string($_POST['mobile_number']);

    // Using session user_id as customerid
    $customerid = $user_id; 
    $original_price = 100000; // Original price in LKR
    $discount = 0.1 * $original_price; // 10% discount
    $final_price = $original_price - $discount; // Final price after discount

    // Insert query
    $sql = "INSERT INTO booking (customerid, customername, packagename, address, email, mobile_number) 
            VALUES ('$customerid', '$customername', '$packagename', '$address', '$email', '$mobile_number')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
            alert('Booking successful! You got 10% off. The price is 100000 LKR. Only Your payment is 90000 LKR. You can pay on delivery.');
            window.location.href='index.php';
        </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>

    body {
      background-image: url('https://th.bing.com/th/id/R.70c7a6f6247af6463b706acd50c52499?rik=Et04VC3%2f353ERg&pid=ImgRaw&r=0'); /* Replace with your wedding background */
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
    }
    </style>
</head>
<body class="bg-gray-100 p-6">

    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold text-center mb-6 text-yellow-700">Booking Form</h2>

        <form action="bookingform.php" method="POST">
            <div>
                <label for="customername" class="block text-gray-700 font-medium">Customer Name</label>
                <input type="text" id="customername" name="customername" required class="w-full p-3 border border-gray-300 rounded-lg mt-1">
            </div>

            <div>
                <label for="packagename" class="block text-gray-700 font-medium">Package Name</label>
                <input type="text" id="packagename" name="packagename" required class="w-full p-3 border border-gray-300 rounded-lg mt-1">
            </div>

            <div>
                <label for="address" class="block text-gray-700 font-medium">Address</label>
                <textarea id="address" name="address" required rows="3" class="w-full p-3 border border-gray-300 rounded-lg mt-1"></textarea>
            </div>

            <div>
                <label for="email" class="block text-gray-700 font-medium">Email</label>
                <input type="email" id="email" name="email" required class="w-full p-3 border border-gray-300 rounded-lg mt-1">
            </div>

            <div>
                <label for="mobile_number" class="block text-gray-700 font-medium">Mobile Number</label>
                <input type="text" id="mobile_number" name="mobile_number" required class="w-full p-3 border border-gray-300 rounded-lg mt-1">
            </div>

            <div class="flex justify-center mt-6">
                <button type="submit" class="bg-yellow-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-200">Submit</button>
            </div>
        </form>
    </div>

</body>
</html>
