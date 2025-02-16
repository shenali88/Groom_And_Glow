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

$successMessage = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $date = $_POST['date'] ?? '';
    $time = $_POST['time'] ?? '';
    
    // Split full name into first and last name
    $nameParts = explode(" ", $name, 2);
    $first_name = $nameParts[0] ?? "";
    $last_name = $nameParts[1] ?? "";

    // Validate inputs
    if (empty($first_name)) {
        $errors[] = "First name is required";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required";
    }
    if (empty($phone)) {
        $errors[] = "Phone number is required";
    }
    if (empty($date)) {
        $errors[] = "Date is required";
    }
    if (empty($time)) {
        $errors[] = "Time is required";
    }

    // Retrieve customer_id from register table (assuming email is unique)
    $customer_id = null;
    $query = "SELECT id FROM register WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($customer_id);
    $stmt->fetch();
    $stmt->close();

    if (!$customer_id) {
        $errors[] = "Customer not found. Please register first.";
    }

    // If no errors, insert data into the database
    if (empty($errors)) {
        $sql = "INSERT INTO customer_appointment (customer_id, first_name, last_name, email, mobile_number, date, time) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("issssss", $customer_id, $first_name, $last_name, $email, $phone, $date, $time);

        if ($stmt->execute()) {
            $successMessage = "Appointment booked successfully!";
            echo "<script>
                alert('$successMessage');
                window.location.href = 'index.php';
            </script>";
            exit(); // Prevent further execution
        } else {
            $errors[] = "Error booking appointment: " . $stmt->error;
        }
        $stmt->close();
    }
}
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wedding Attire Appointment</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function showSuccessPopup(message) {
            alert(message);
        }
        </script>
<style>

    body {
      background-image: url('https://th.bing.com/th/id/R.70c7a6f6247af6463b706acd50c52499?rik=Et04VC3%2f353ERg&pid=ImgRaw&r=0'); /* Replace with your wedding background */
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
    }
    </style>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white rounded-lg shadow-md p-8 max-w-md w-full">
        <h2 class="text-2xl font-bold text-center mb-2 text-yellow-600">Book Your Appointment</h2>
        <p class="text-gray-600 text-center mb-6">Schedule a fitting for your perfect wedding attire</p>

        <?php if (!empty($errors)): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if (!empty($successMessage)): ?>
            <script>
                showSuccessPopup("<?php echo $successMessage; ?>");
            </script>
        <?php endif; ?>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                <input type="text" id="name" name="name" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md"
                    value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>"
                    placeholder="Enter your full name">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                <input type="email" id="email" name="email" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md"
                    value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"
                    placeholder="your@email.com">
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                <input type="tel" id="phone" name="phone" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md"
                    value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>"
                    placeholder="Enter your phone number">
            </div>

            <div>
                <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Preferred Date</label>
                <input type="date" id="date" name="date" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md"
                    value="<?php echo isset($_POST['date']) ? htmlspecialchars($_POST['date']) : ''; ?>">
            </div>

            <div>
                <label for="time" class="block text-sm font-medium text-gray-700 mb-1">Preferred Time</label>
                <input type="time" id="time" name="time" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md"
                    value="<?php echo isset($_POST['time']) ? htmlspecialchars($_POST['time']) : ''; ?>">
            </div>

            <button type="submit"
                class="w-full bg-yellow-600 text-white py-2 px-4 rounded-md hover:bg-yellow-700 transition duration-200">
                Book Appointment
            </button>
            
           <div class="mt-6 p-4 bg-gray-100 rounded-lg text-center">
            <p class="text-gray-700">You can make an appointment from Monday to Saturday, between 10 AM and 5 PM.</p>
            <p class="text-gray-700">If your appointment is confirmed, we will send you a confirmation message.</p>
            <p class="text-gray-700">If not, we will notify you and offer a suitable date and time if you wish.</p>
        </div>
        </form>
    </div>
</body>
</html>
