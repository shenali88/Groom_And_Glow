<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "shenu";
$database = "groom&glow";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize query
$sql = "SELECT * FROM supplied_items"; 
$params = [];
$types = "";
$clear = false;

// Check if a search by date is performed
if (isset($_POST['search']) && !empty($_POST['search_date'])) {
    $sql .= " WHERE date = ?";
    $params[] = $_POST['search_date'];
    $types .= "s";
}

// Check if the clear button was clicked
if (isset($_POST['clear'])) {
    $clear = true;
}

// Prepare and execute the query if clear button is not pressed
if (!$clear) {
    $stmt = $conn->prepare($sql);
    if (!empty($params)) {
        $stmt->bind_param($types, ...$params);
    }
    $stmt->execute();
    $result = $stmt->get_result();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requested Items</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<div class="bg-white shadow-2xl rounded-lg p-6">
    <h2 class="text-4xl font-semibold text-yellow-600 mb-4 text-center">Supplied Items Details</h2>
    
    <form method="POST">
        <div class="flex items-center space-x-4 mb-6">
            <a href="admindashsupplier.php" class="bg-yellow-600 text-white px-6 py-2 rounded-lg hover:bg-yellow-700 transition-all duration-300 ease-in-out">
            Go to Previous Page
            </a>
            <input type="date" name="search_date" value="<?php echo isset($_POST['search_date']) ? $_POST['search_date'] : ''; ?>" class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="submit" name="search" class="bg-yellow-600 text-white px-6 py-2 rounded-lg hover:bg-yellow-700 transition-all duration-300 ease-in-out">Search by Date</button>
            <button type="submit" name="view_all" class="bg-yellow-600 text-white px-6 py-2 rounded-lg hover:bg-yellow-700 transition-all duration-300 ease-in-out">View All</button>
            <button type="submit" name="clear" class="bg-yellow-600 text-white px-6 py-2 rounded-lg hover:bg-yellow-700 transition-all duration-300 ease-in-out">Clear</button>
        </div>
    </form>
    
    <table class="min-w-full table-auto border-collapse border border-gray-300">
        <thead class="bg-gradient-to-r from-yellow-500 via-yellow-600 to-yellow-500 text-white">
            <tr>
                <th class="px-6 py-4 border">Item ID</th>
                <th class="px-6 py-4 border">Supplier ID</th>
                <th class="px-6 py-4 border">Item Name</th>
                <th class="px-6 py-4 border">Date</th>
                <th class="px-6 py-4 border">Quantity</th>
                <th class="px-6 py-4 border">Price</th>
                <th class="px-6 py-4 border">Colour</th>
                <th class="px-6 py-4 border">Sizes</th>
                <th class="px-6 py-4 border">Image</th>
                <th class="px-6 py-4 border">Total Amount</th>
                <th class="px-6 py-4 border">Category</th>
                <th class="px-6 py-4 border">Payment Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!$clear && isset($result) && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td class='px-6 py-4 border'>" . htmlspecialchars($row["item_id"]) . "</td>
                            <td class='px-6 py-4 border'>" . htmlspecialchars($row["supplier_id"]) . "</td>
                            <td class='px-6 py-4 border'>" . htmlspecialchars($row["item_name"]) . "</td>
                            <td class='px-6 py-4 border'>" . htmlspecialchars($row["date"]) . "</td>
                            <td class='px-6 py-4 border'>" . htmlspecialchars($row["quantity"]) . "</td>
                            <td class='px-6 py-4 border'>" . htmlspecialchars($row["price"]) . "</td>
                            <td class='px-6 py-4 border'>" . htmlspecialchars($row["color"]) . "</td>
                            <td class='px-6 py-4 border'>" . htmlspecialchars($row["sizes"]) . "</td>
                            <td class='border px-6 py-4'><img src='" . $row["image_url"] . "' alt='Item Image' class='h-16 w-16'></td>
                            <td class='px-6 py-4 border'>" . htmlspecialchars($row["total_amount"]) . "</td>
                            <td class='px-6 py-4 border'>" . htmlspecialchars($row["category"]) . "</td>
                            <td class='px-6 py-4 border'>" . htmlspecialchars($row["payment_status"]) . "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='12' class='px-6 py-4 border text-center'>No records found</td></tr>";
            }
            if (isset($stmt)) {
                $stmt->close();
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
