<?php
// Database connection
$servername = "localhost"; // Change if needed
$username = "root"; // Your database username
$password = "shenu"; // Your database password
$database = "groom&glow"; // Your database name

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch confirmed items
$sql = "SELECT supplier_id, item_name, colour, size, quantity, date_requested FROM wanted_items WHERE confirmation = 'Confirmed'";
$result = $conn->query($sql);
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

<!-- Out of Stock Confirmed Items -->
<div class="bg-white shadow-2xl rounded-lg p-6">
    <h2 class="text-4xl font-semibold text-yellow-600 mb-4 text-center">Confirmed Items</h2>
    <div class="flex items-center space-x-4 mb-6">
    <form method="POST" class="flex items-center space-x-4 mb-6">
        <a href="admindashsupplier.php" class="bg-yellow-600 text-white px-6 py-2 rounded-lg hover:bg-yellow-700 transition-all duration-300 ease-in-out">
        Go to Previous Page
    </a>
        <input type="text" id="supplier_id" placeholder="Enter Supplier ID" class="px-4 py-2 w-64 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        <button onclick="searchById()" class="bg-yellow-600 text-white px-6 py-2 rounded-lg hover:bg-yellow-700 transition-all duration-300 ease-in-out">Search by ID</button>
        <button onclick="window.location.reload()" class="bg-yellow-600 text-white px-6 py-2 rounded-lg hover:bg-yellow-700 transition-all duration-300 ease-in-out">View All</button>
    </div>
    <table class="min-w-full table-auto border-collapse border border-gray-300">
        <thead class="bg-gradient-to-r from-yellow-500 via-yellow-600 to-yellow-500 text-white">
            <tr>
                <th class="px-6 py-4 border">Supplier ID</th>
                <th class="px-6 py-4 border">Item Name</th>
                <th class="px-6 py-4 border">Colour</th>
                <th class="px-6 py-4 border">Size</th>
                <th class="px-6 py-4 border">Quantity</th>
                <th class="px-6 py-4 border">Date Requested</th>
            </tr>
        </thead>
        <tbody id="table-body">
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
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6' class='px-6 py-4 border text-center'>No confirmed items found.</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</div>

<script>
    function searchById() {
        let input = document.getElementById("supplier_id").value.trim();
        let rows = document.querySelectorAll("#table-body tr");

        rows.forEach(row => {
            let supplierId = row.cells[0].innerText;
            if (input === "" || supplierId === input) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    }
</script>

</body>
</html>