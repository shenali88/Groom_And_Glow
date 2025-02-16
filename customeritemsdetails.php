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

// Function to fetch all items
function getAllItems($conn) {
    $sql = "SELECT * FROM customer_item";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->get_result();
}

// Function to fetch items by customer ID
function getItemsByCustomerId($conn, $customer_id) {
    $sql = "SELECT * FROM customer_item WHERE customer_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $customer_id);
    $stmt->execute();
    return $stmt->get_result();
}

// Initialize variables
$items = [];
$customer_id = '';
$message = '';

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['view_all'])) {
        $result = getAllItems($conn);
    } elseif (isset($_POST['search_customer']) && !empty($_POST['customer_id'])) {
        $customer_id = $_POST['customer_id'];
        $result = getItemsByCustomerId($conn, $customer_id);
    } elseif (isset($_POST['clear'])) {
        $result = null;
        $customer_id = '';
    }
} else {
    $result = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Item Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="bg-white shadow-2xl rounded-lg p-6">
        <h2 class="text-4xl font-semibold text-yellow-600 mb-4 text-center">Customer Item Details</h2>
        
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
                        <th class="px-6 py-4 border">Item ID</th>
                        <th class="px-6 py-4 border">Customer ID</th>
                        <th class="px-6 py-4 border">Item Name</th>
                        <th class="px-6 py-4 border">Quantity</th>
                        <th class="px-6 py-4 border">Size</th>
                        <th class="px-6 py-4 border">Price</th>
                        <th class="px-6 py-4 border">Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if ($result && $result->num_rows > 0):
                        while($row = $result->fetch_assoc()):
                    ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 border"><?php echo htmlspecialchars($row['item_id']); ?></td>
                            <td class="px-6 py-4 border"><?php echo htmlspecialchars($row['customer_id']); ?></td>
                            <td class="px-6 py-4 border"><?php echo htmlspecialchars($row['item_name']); ?></td>
                            <td class="px-6 py-4 border"><?php echo htmlspecialchars($row['quantity']); ?></td>
                            <td class="px-6 py-4 border"><?php echo htmlspecialchars($row['size']); ?></td>
                            <td class="px-6 py-4 border">$<?php echo number_format($row['price'], 2); ?></td>
                            <td class="px-6 py-4 border">$<?php echo number_format($row['total_price'], 2); ?></td>
                        </tr>
                    <?php 
                        endwhile;
                    else:
                    ?>
                        <tr>
                            <td colspan="7" class="text-center py-4">No items to display</td>
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