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

$user_id = $_SESSION['user_id']; // Get logged-in tailor's ID
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to fetch appointments for the logged-in tailor
function getAppointments($conn, $user_id, $date = null) {
    $sql = "SELECT * FROM customer_appointment WHERE tailor_id = ?";
    $params = [$user_id];
    $types = "i";

    if ($date) {
        $sql .= " AND date = ?";
        $params[] = $date;
        $types .= "s";
    }

    $stmt = $conn->prepare($sql);
    $stmt->bind_param($types, ...$params);
    $stmt->execute();
    return $stmt->get_result();
}

// Function to update confirmation status
function updateConfirmation($conn, $appointment_id, $confirmation) {
    $sql = "UPDATE customer_appointment SET confirmation = ? WHERE appointment_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $confirmation, $appointment_id);
    return $stmt->execute();
}

$appointments = [];
$message = '';
$messageClass = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_confirmation'])) {
        $appointment_id = $_POST['appointment_id'];
        $confirmation = $_POST['confirmation'];

        if (updateConfirmation($conn, $appointment_id, $confirmation)) {
            $message = "Confirmation status updated successfully!";
            $messageClass = "bg-green-100 text-green-700";
        } else {
            $message = "Error updating confirmation status!";
            $messageClass = "bg-red-100 text-red-700";
        }
    }
    $result = getAppointments($conn, $user_id, $_POST['search_date'] ?? null);
} else {
    $result = getAppointments($conn, $user_id);
}
?>

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
        <h2 class="text-4xl font-semibold text-yellow-600 mb-4 text-center">Manage Customer Appointments</h2>

        <!-- Search by Date -->
        <form method="POST" class="mb-4 flex items-center space-x-4">
            <input type="date" name="search_date" class="border p-2 rounded" required>
            <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700 transition-all">Search</button>
            <a href="tailordashboard.php" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-600 transition-all">View All</a>
        </form>

        <div class="overflow-x-auto">
            <table class="min-w-full table-auto border-collapse border border-gray-300">
                <thead class="bg-yellow-500 text-white">
                    <tr>
                        <th class="px-6 py-4 border">Appointment ID</th>
                        <th class="px-6 py-4 border">Customer ID</th>
                        <th class="px-6 py-4 border">First Name</th>
                        <th class="px-6 py-4 border">Last Name</th>
                        <th class="px-6 py-4 border">Email</th>
                        <th class="px-6 py-4 border">Date</th>
                        <th class="px-6 py-4 border">Time</th>
                        <th class="px-6 py-4 border">Confirmation</th>
                        <th class="px-6 py-4 border">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result && $result->num_rows > 0): ?>
                        <?php while($row = $result->fetch_assoc()): ?>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 border"><?php echo htmlspecialchars($row['appointment_id'] ?? ''); ?></td>
                                <td class="px-6 py-4 border"><?php echo htmlspecialchars($row['customer_id'] ?? ''); ?></td>
                                <td class="px-6 py-4 border"><?php echo htmlspecialchars($row['first_name'] ?? ''); ?></td>
                                <td class="px-6 py-4 border"><?php echo htmlspecialchars($row['last_name'] ?? ''); ?></td>
                                <td class="px-6 py-4 border"><?php echo htmlspecialchars($row['email'] ?? ''); ?></td>
                                <td class="px-6 py-4 border"><?php echo date('Y-m-d', strtotime($row['date'] ?? '')); ?></td>
                                <td class="px-6 py-4 border"><?php echo date('h:i A', strtotime($row['time'] ?? '')); ?></td>
                                <td class="px-6 py-4 border">
                                    <form method="POST" class="flex items-center space-x-2">
                                        <input type="hidden" name="appointment_id" value="<?php echo $row['appointment_id']; ?>">
                                        <select name="confirmation" class="px-2 py-1 border rounded">
                                            <option value="confirmed" <?php if (($row['confirmation'] ?? '') == 'confirmed') echo 'selected'; ?>>Confirmed</option>
                                            <option value="cancelled" <?php if (($row['confirmation'] ?? '') == 'cancelled') echo 'selected'; ?>>Cancelled</option>
                                        </select>
                                </td>
                                <td class="px-6 py-4 border">
                                        <button type="submit" name="update_confirmation" class="bg-yellow-600 text-white px-4 py-1 rounded hover:bg-yellow-700 transition-all">
                                            Send
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="9" class="text-center py-4">No appointments to display</td>
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

    <?php $conn->close(); ?>
</body>
</html>
