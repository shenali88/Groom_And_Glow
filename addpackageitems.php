<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "shenu";
$dbname = "groom&glow";

if (!isset($_SESSION['user_id'])) {
    die("Access denied. Please log in.");
}

$user_id = $_SESSION['user_id'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $package_name = $_POST['package_name'];
    $item_name = $_POST['item_name'];
    $description = $_POST['description'];
    $image_url = $_POST['image_url'];
    
    // Insert data into the database
    $sql = "INSERT INTO packages (package_name, item_name, description, image_url) 
            VALUES ('$package_name', '$item_name', '$description', '$image_url')";
    
    if ($conn->query($sql) === TRUE) {
        // Redirect to the display page after successful insertion
        header("Location: displaypackage.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Package Item</title>
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
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-2xl">
        <h2 class="text-2xl font-bold text-yellow-600 text-center mb-6">Add a New Package Item</h2>
        
        <form method="POST" action="" class="space-y-4">
            <div>
                <label class="block text-gray-700 font-semibold">Package Name</label>
                <input type="text" name="package_name" required class="w-full mt-1 p-2 border border-gray-300 rounded-md">
            </div>
            
            <div>
                <label class="block text-gray-700 font-semibold">Item Name</label>
                <input type="text" name="item_name" required class="w-full mt-1 p-2 border border-gray-300 rounded-md">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold">Description</label>
                <textarea name="description" required class="w-full mt-1 p-2 border border-gray-300 rounded-md"></textarea>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold">Image URL</label>
                <input type="text" name="image_url" required class="w-full mt-1 p-2 border border-gray-300 rounded-md">
            </div>

            <div class="text-center">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">Add Item</button>
            </div>
        </form>
    </div>

</body>
</html>

<?php $conn->close(); ?>