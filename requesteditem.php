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

$sql = "SELECT * FROM wanted_items WHERE supplier_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
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
    <h2 class="text-4xl font-semibold text-yellow-600 mb-4 text-center">Requested Items</h2>
    <div class="bg-white shadow-2xl rounded-lg p-6">
    
    <form method="post">
        <input type="hidden" name="supplier_id" value="<?php echo $user_id; ?>">
        <button type="submit" name="view_all" class="bg-yellow-600 text-white px-6 py-2 rounded-lg hover:bg-yellow-700 transition-all duration-300 ease-in-out">View All</button>
    </form>
  <br>
    <form method="POST" class="flex items-center space-x-4 mb-6">
        <a href="supdash.php" class="bg-yellow-600 text-white px-6 py-2 rounded-lg hover:bg-yellow-700 transition-all duration-300 ease-in-out">
        Go to Previous Page
    </a>
</form>

<table class="min-w-full table-auto border-collapse border border-gray-300">
    <thead class="bg-gradient-to-r from-yellow-500 via-yellow-600 to-yellow-500 text-white">
        <tr>
            <th class="px-6 py-4 border">Supplier ID</th>
            <th class="px-6 py-4 border">Item Name</th>
            <th class="px-6 py-4 border">Colour</th>
            <th class="px-6 py-4 border">Size</th>
            <th class="px-6 py-4 border">Quantity</th>
            <th class="px-6 py-4 border">Date Requested</th>
            <th class="px-6 py-4 border">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td class='px-6 py-4 border'>" . $row["supplier_id"] . "</td>";
                echo "<td class='px-6 py-4 border'>" . $row["item_name"] . "</td>";
                echo "<td class='px-6 py-4 border'>" . $row["colour"] . "</td>";
                echo "<td class='px-6 py-4 border'>" . $row["size"] . "</td>";
                echo "<td class='px-6 py-4 border'>" . $row["quantity"] . "</td>";
                echo "<td class='px-6 py-4 border'>" . $row["date_requested"] . "</td>";
                echo "<td class='px-6 py-4 border text-center'>
                        <form method='POST' action='update_confirmation.php'>
                            <input type='hidden' name='supplier_id' value='" . $row["supplier_id"] . "'>
                            <select name='confirmation' class='px-2 py-1 border rounded'>
                                <option value='confirmed'>Confirmed</option>
                                <option value='cancelled'>Cancelled</option>
                            </select>
                            <button type='submit' class='ml-2 bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-700 transition-all'>
                                Send
                            </button>
                        </form>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7' class='text-center text-red-500 py-4'>No records found.</td></tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
