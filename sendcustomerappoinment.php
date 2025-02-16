<?php
session_start();

// Database connection
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

// Function to fetch all appointments
function getAllAppointments($conn) {
    $sql = "SELECT * FROM customer_appointment";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->get_result();
}

// Function to fetch appointments by customer ID
function getAppointmentsByCustomerId($conn, $customer_id) {
    $sql = "SELECT * FROM customer_appointment WHERE customer_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $customer_id);
    $stmt->execute();
    return $stmt->get_result();
}

// Function to update tailor ID
function updateTailorId($conn, $appointment_id, $tailor_id) {
    $sql = "UPDATE customer_appointment SET tailor_id = ? WHERE appointment_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $tailor_id, $appointment_id);
    return $stmt->execute();
}

// Initialize variables
$appointments = [];
$customer_id = '';
$message = '';
$messageClass = '';

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['view_all'])) {
        $result = getAllAppointments($conn);
    } elseif (isset($_POST['search_customer']) && !empty($_POST['customer_id'])) {
        $customer_id = $_POST['customer_id'];
        $result = getAppointmentsByCustomerId($conn, $customer_id);
    } elseif (isset($_POST['clear'])) {
        $result = null;
        $customer_id = '';
    } elseif (isset($_POST['update_tailor'])) {
        $appointment_id = $_POST['appointment_id'];
        $tailor_id = $_POST['tailor_id'];
        
        if (updateTailorId($conn, $appointment_id, $tailor_id)) {
            $message = "Tailor ID updated successfully!";
            $messageClass = "bg-green-100 text-green-700";
            // Refresh the current view
            if (!empty($customer_id)) {
                $result = getAppointmentsByCustomerId($conn, $customer_id);
            } else {
                $result = getAllAppointments($conn);
            }
        } else {
            $message = "Error updating Tailor ID!";
            $messageClass = "bg-red-100 text-red-700";
        }
    }
} else {
    $result = null;
}
?>

<!-- Customer Appointment Details -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Appointments</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="bg-white shadow-2xl rounded-lg p-6">
        <h2 class="text-4xl font-semibold text-yellow-600 mb-4 text-center"> Send The Customer Appointment Details </h2>
        
        <form method="POST" class="flex items-center space-x-4 mb-6">
            <input 
                type="number" 
                name="customer_id" 
                value="<?php echo htmlspecialchars($customer_id); ?>"
                placeholder="Enter Customer ID"
                class="px-4 py-2 w-64 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
            <button 
                type="submit" 
                name="search_customer" 
                class="bg-yellow-600 text-white px-6 py-2 rounded-lg hover:bg-yellow-700 transition-all duration-300 ease-in-out"
            >
                Search by Customer ID
            </button>
            <button 
                type="submit" 
                name="view_all" 
                class="bg-yellow-600 text-white px-6 py-2 rounded-lg hover:bg-yellow-700 transition-all duration-300 ease-in-out"
            >
                View All
            </button>
            <button 
                type="submit" 
                name="clear" 
                class="bg-yellow-600 text-white px-6 py-2 rounded-lg hover:bg-yellow-700 transition-all duration-300 ease-in-out"
            >
                Clear
            </button>
        </form>

        <form method="POST" class="flex items-center space-x-4 mb-6">
            <a href="admindashcustomer.php" class="bg-yellow-600 text-white px-6 py-2 rounded-lg hover:bg-yellow-700 transition-all duration-300 ease-in-out">
                Go to Previous Page
            </a>
        </form>

        <div class="overflow-x-auto">
            <table class="min-w-full table-auto border-collapse border border-gray-300">
                <thead class="bg-gradient-to-r from-yellow-500 via-yellow-600 to-yellow-500 text-white">
                    <tr>
                        <th class="px-6 py-4 border">Appointment ID</th>
                        <th class="px-6 py-4 border">Customer ID</th>
                        <th class="px-6 py-4 border">First Name</th>
                        <th class="px-6 py-4 border">Last Name</th>
                        <th class="px-6 py-4 border">Email</th>
                        <th class="px-6 py-4 border">Mobile Number</th>
                        <th class="px-6 py-4 border">Date</th>
                        <th class="px-6 py-4 border">Time</th>
                        <th class="px-6 py-4 border">Tailor ID</th>
                        <th class="px-6 py-4 border">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if ($result && $result->num_rows > 0):
                        while($row = $result->fetch_assoc()):
                            // Format date and time
                            $formatted_date = date('Y-m-d', strtotime($row['date']));
                            $formatted_time = date('h:i A', strtotime($row['time']));
                    ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 border"><?php echo htmlspecialchars($row['appointment_id']); ?></td>
                            <td class="px-6 py-4 border"><?php echo htmlspecialchars($row['customer_id']); ?></td>
                            <td class="px-6 py-4 border"><?php echo htmlspecialchars($row['first_name']); ?></td>
                            <td class="px-6 py-4 border"><?php echo htmlspecialchars($row['last_name']); ?></td>
                            <td class="px-6 py-4 border"><?php echo htmlspecialchars($row['email']); ?></td>
                            <td class="px-6 py-4 border"><?php echo htmlspecialchars($row['mobile_number']); ?></td>
                            <td class="px-6 py-4 border"><?php echo $formatted_date; ?></td>
                            <td class="px-6 py-4 border"><?php echo $formatted_time; ?></td>
                            <td class="px-6 py-4 border">
                                <form method="POST" class="flex items-center space-x-2">
                                    <input type="hidden" name="appointment_id" value="<?php echo $row['appointment_id']; ?>">
                                    <input 
                                        type="number" 
                                        name="tailor_id" 
                                        value="<?php echo htmlspecialchars($row['tailor_id'] ?? ''); ?>"
                                        placeholder="Enter Tailor ID"
                                        class="px-2 py-1 w-24 border border-gray-300 rounded"
                                    >
                            </td>
                            <td class="px-6 py-4 border">
                                    <button 
                                        type="submit" 
                                        name="update_tailor" 
                                        class="bg-yellow-600 text-white px-4 py-1 rounded hover:bg-yellow-700 transition-all duration-300 ease-in-out"
                                    >
                                        Send
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php 
                        endwhile;
                    else:
                    ?>
                        <tr>
                            <td colspan="10" class="text-center py-4">No appointments to display</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php if (!empty($message)): ?>
    <div class="mt-4 p-4 rounded-lg <?php echo $messageClass; ?>">
        <?php echo htmlspecialchars($message); ?>
    </div>
    <?php endif; ?>

    <?php
    // Close the database connection
    if (isset($stmt)) {
        $stmt->close();
    }
    $conn->close();
    ?>
</body>
</html>