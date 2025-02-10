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

// Query to fetch data
$sql = "SELECT item_id, customer_id, item_name, quantity, size, price, total_price FROM customer_item";
$result = $conn->query($sql);

$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Send JSON response
header('Content-Type: application/json');
echo json_encode($data);

$conn->close();
?>

<!-- Customer Item Details -->
<div class="bg-white shadow-2xl rounded-lg p-6">
    <h2 class="text-4xl font-semibold text-yellow-600 mb-4 text-center">Customer Item Details</h2>
    <div class="flex items-center space-x-4 mb-6">
        <input type="text" id="searchDate" placeholder="Enter Date" class="px-4 py-2 w-64 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        <button class="bg-yellow-600 text-white px-6 py-2 rounded-lg hover:bg-yellow-700 transition-all duration-300 ease-in-out">Search by Date</button>
        <button id="viewAllBtn" class="bg-yellow-600 text-white px-6 py-2 rounded-lg hover:bg-yellow-700 transition-all duration-300 ease-in-out">View All</button>
        <button id="clearTable" class="bg-yellow-600 text-white px-6 py-2 rounded-lg hover:bg-yellow-700 transition-all duration-300 ease-in-out">Clear</button>
    </div>

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
        <tbody id="customerTableBody">
            <!-- Data will be inserted here -->
        </tbody>
    </table>
</div>

<script>
document.getElementById("viewAllBtn").addEventListener("click", function() {
    fetch("test.php")
    .then(response => response.json())
    .then(data => {
        let tableBody = document.getElementById("customerTableBody");
        tableBody.innerHTML = ""; // Clear previous data
        data.forEach(item => {
            let row = `<tr>
                <td class="px-6 py-4 border">${item.item_id}</td>
                <td class="px-6 py-4 border">${item.customer_id}</td>
                <td class="px-6 py-4 border">${item.item_name}</td>
                <td class="px-6 py-4 border">${item.quantity}</td>
                <td class="px-6 py-4 border">${item.size}</td>
                <td class="px-6 py-4 border">${item.price}</td>
                <td class="px-6 py-4 border">${item.total_price}</td>
            </tr>`;
            tableBody.innerHTML += row;
        });
    })
    .catch(error => console.error("Error fetching data:", error));
});

// Clear table when clicking "Clear"
document.getElementById("clearTable").addEventListener("click", function() {
    document.getElementById("customerTableBody").innerHTML = "";
});
</script>
