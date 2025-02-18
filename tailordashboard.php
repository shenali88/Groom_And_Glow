<?php
session_start();

// Database connection class
class Database {
    private $servername = "localhost";
    private $username = "root";
    private $password = "shenu";
    private $dbname = "groom&glow";
    private $conn;

    

    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function closeConnection() {
        $this->conn->close();
    }
}

// Appointments class
class Appointment {
    private $conn;
    private $user_id;

    public function __construct($conn, $user_id) {
        $this->conn = $conn;
        $this->user_id = $user_id;
    }

    public function getAppointments($date = null) {
        $sql = "SELECT * FROM customer_appointment WHERE tailor_id = ?";
        $params = [$this->user_id];
        $types = "i";

        if ($date) {
            $sql .= " AND date = ?";
            $params[] = $date;
            $types .= "s";
        }

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param($types, ...$params);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function updateConfirmation($appointment_id, $confirmation) {
        $sql = "UPDATE customer_appointment SET confirmation = ? WHERE appointment_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si", $confirmation, $appointment_id);
        return $stmt->execute();
    }
}

// Main script
if (!isset($_SESSION['user_id'])) {
    die("Access denied. Please log in.");
}

$user_id = $_SESSION['user_id']; // Get logged-in tailor's ID
$db = new Database();
$conn = $db->getConnection();

$appointmentObj = new Appointment($conn, $user_id);
$appointments = [];
$message = '';
$messageClass = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_confirmation'])) {
        $appointment_id = $_POST['appointment_id'];
        $confirmation = $_POST['confirmation'];

        if ($appointmentObj->updateConfirmation($appointment_id, $confirmation)) {
            $message = "Confirmation status updated successfully!";
            $messageClass = "bg-green-100 text-green-700";
        } else {
            $message = "Error updating confirmation status!";
            $messageClass = "bg-red-100 text-red-700";
        }
    }
    $appointmentsResult = $appointmentObj->getAppointments($_POST['search_date'] ?? null);
} else {
    $appointmentsResult = $appointmentObj->getAppointments();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="flex min-h-screen">
    <div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-yellow-600 text-gray-100 flex flex-col">
        <div class="px-6 py-4 text-xl font-bold text-white">Customer</div>
        <nav class="flex-1 px-6">
            <ul>
                <li>
                    <a href="tailordashboard.php" class="flex items-center py-3 text-gray-300 hover:text-white hover:bg-gray-700 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 2.5v6.25h-5V2.5H9.75zM14.25 2.5v9.75H21v-9.75H14.25zM9.75 15v6.25h-5V15H9.75zM14.25 15v6.25H21V15H14.25z" />
                        </svg>
                        <span class="ml-4">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="customerprofilemanage.php" class="flex items-center py-3 text-gray-300 hover:text-white hover:bg-gray-700 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 0112 3.3a9 9 0 0112 4.948M5.121 17.804A9 9 0 0112 20.7m7.878-2.896A9 9 0 0112 20.7m0-17.4a3.3 3.3 0 000 6.6m0 0a3.3 3.3 0 003.3-3.3m0 0a3.3 3.3 0 00-3.3-3.3" />
                        </svg>
                        <span class="ml-4">Profile</span>
                    </a>
                </li>
            </ul>
            <form method="post" action="logout.php">
                <button type="submit" name="logout" class="bg-yellow-900 text-white text-lg font-semibold py-2 px-4 rounded-lg hover:bg-yellow-800 focus:outline-none focus:ring-2 focus:ring-yellow-600 transition transform hover:scale-105 active:scale-95">
                    Logout
                </button>
        </nav>
    </aside>

<!-- Main Content -->
<main class="flex-1 ml-[50%] p-6">
    <div class="bg-white shadow-2xl rounded-lg p-6 w-full">
        <h2 class="text-4xl font-semibold text-yellow-600 mb-4 text-center">Manage Customer Appointments</h2>

        <!-- Search by Date -->
        <form method="POST" class="mb-4 flex items-center space-x-4">
            <input type="date" name="search_date" class="border p-2 rounded" required>
            <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700 transition-all">Search</button>
            <a href="tailordashboard.php" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-600 transition-all">View All</a>
        </form>

        <div class="overflow-x-auto min-w-[1400px]">
            <table class="w-full table-auto border-collapse border border-gray-300">
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
                    <?php if ($appointmentsResult && $appointmentsResult->num_rows > 0): ?>
                        <?php while($row = $appointmentsResult->fetch_assoc()): ?>
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
</main>

