<?php
include 'connection.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'supplier') {
    die("Access denied. Only registered suppliers can add items.");
}

$supplier_id = $_SESSION['user_id']; // Use the logged-in supplier's ID 


// Check if form is submitted for adding new item
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['item_name'])) {
    // Get form values
    $item_name = $_POST['item_name'];
    $date = $_POST['date'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $color = $_POST['color'];
    $sizes = $_POST['sizes'];
    $image_url = $_POST['image_url'];
    $total_amount = $_POST['total_amount'];
    $category = $_POST['category'];

    // Get the supplier_id from the register table where role is 'supplier'
    $supplier_id_query = "SELECT id FROM register WHERE role = 'supplier' LIMIT 1";
    $result = $conn->query($supplier_id_query);

    if ($result->num_rows > 0) {
        $supplier_id = $result->fetch_assoc()['id'];
    } else {
        die("No supplier found in the register table.");
    }

    // Insert into supplied_items table
    $insert_query = "INSERT INTO supplied_items (supplier_id, item_name, date, quantity, price, color, sizes, image_url, total_amount, category) 
                     VALUES ('$supplier_id', '$item_name', '$date', '$quantity', '$price', '$color', '$sizes', '$image_url', '$total_amount', '$category')";

    if ($conn->query($insert_query) === TRUE) {
        echo "<script>alert('New record created successfully');</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}

// Initialize variables
$result = null;
$display_table = false;

// Handle search and view all functionality
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['view_all'])) {
        $query = "SELECT * FROM supplied_items WHERE payment_status = 'Paid'";
        $result = $conn->query($query);
        $display_table = true;
    } elseif (isset($_POST['search_id']) && !empty($_POST['search_id'])) {
        $search_id = $conn->real_escape_string($_POST['search_id']);
        $query = "SELECT * FROM supplied_items WHERE payment_status = 'Paid' AND item_id = '$search_id'";
        $result = $conn->query($query);
        $display_table = true;
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suptables</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<!-- Main Container -->
<div class="flex min-h-screen">
<!-- Sidebar -->
<aside class="w-64 bg-yellow-600 text-gray-100 flex flex-col">
  <div class="px-6 py-4 text-xl font-bold text-white">Supplier</div>
  <nav class="flex-1 px-6">
    <ul>
      <li>
        <a href="suptables.php" class="flex items-center py-3 text-gray-300 hover:text-white hover:bg-gray-700 rounded">
          <!-- Dashboard Icon -->
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 2.5v6.25h-5V2.5H9.75zM14.25 2.5v9.75H21v-9.75H14.25zM9.75 15v6.25h-5V15H9.75zM14.25 15v6.25H21V15H14.25z" />
          </svg>
          <span class="ml-4">Dashboard</span>
        </a>
      </li>
      
      
        <a href="supplierprofilemanage.php" class="flex items-center py-3 text-gray-300 hover:text-white hover:bg-gray-700 rounded">
          <!-- Profile Icon -->
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 0112 3.3a9 9 0 0112 4.948M5.121 17.804A9 9 0 0112 20.7m7.878-2.896A9 9 0 0112 20.7m0-17.4a3.3 3.3 0 000 6.6m0 0a3.3 3.3 0 003.3-3.3m0 0a3.3 3.3 0 00-3.3-3.3" />
          </svg>
          <span class="ml-4">Profile</span>
        </a>
      </li>
    </ul>
  </nav>
</aside>

    

    <!-- Content -->
    <main class="flex-1 p-6 space-y-8">
<!-- Supplied Items Details -->
<div class="bg-white shadow-2xl rounded-lg p-6">
    <h2 class="text-4xl font-semibold text-yellow-600 mb-4 text-center">Supplied Items Details</h2>
    
    <div class="flex items-center space-x-4 mb-6">
        <input type="text" placeholder="Enter Item ID" class="px-4 py-2 w-64 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        <button class="bg-yellow-600 text-white px-6 py-2 rounded-lg hover:bg-yellow-700 transition-all duration-300 ease-in-out">Search by ID</button>
        <button class="bg-yellow-600 text-white px-6 py-2 rounded-lg hover:bg-yellow-700 transition-all duration-300 ease-in-out">View All</button>
        <button class="bg-yellow-600 text-white px-6 py-2 rounded-lg hover:bg-yellow-700 transition-all duration-300 ease-in-out">Add Row</button>
        <button class="bg-yellow-600 text-white px-6 py-2 rounded-lg hover:bg-yellow-700 transition-all duration-300 ease-in-out">Clear</button>
    </div>

    <form method="POST">
        <table class="min-w-full table-auto border-collapse border border-gray-300">
            <thead class="bg-gradient-to-r from-yellow-500 via-yellow-600 to-yellow-500 text-white">
                <tr>
                    <th class="px-6 py-4 border">Item Name</th>   
                    <th class="px-6 py-4 border">Date</th>
                    <th class="px-6 py-4 border">Quantity</th>
                    <th class="px-6 py-4 border">Price</th>
                    <th class="px-6 py-4 border">Color</th>
                    <th class="px-6 py-4 border">Sizes</th>
                    <th class="px-6 py-4 border">Image URL</th>             
                    <th class="px-6 py-4 border">Total Amount</th>
                    <th class="px-6 py-4 border">Category</th>
                    <th class="px-6 py-4 border">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border">
                    <td class="border px-6 py-4"><input type="text" name="item_name" required class="w-full"></td>
                    <td class="border px-6 py-4"><input type="date" name="date" required class="w-full"></td>
                    <td class="border px-6 py-4"><input type="number" name="quantity" required class="w-full"></td>
                    <td class="border px-6 py-4"><input type="text" name="price" required class="w-full"></td>
                    <td class="border px-6 py-4"><input type="text" name="color" class="w-full"></td>
                    <td class="border px-6 py-4"><input type="text" name="sizes" class="w-full"></td>
                    <td class="border px-6 py-4"><input type="text" name="image_url" class="w-full"></td>
                    <td class="border px-6 py-4"><input type="number" name="total_amount" required class="w-full"></td>
                    <td class="border px-6 py-4">
                        <select name="category" required class="w-full border border-gray-300 rounded-lg px-2 py-1">
                            <option value="">Select Category</option>
                            <option value="Bridledress">Bridledres</option>
                            <option value="Groom wear">Groom wear</option>
                            <option value="Party dress">Party dress</option>
                            <option value="Flower bouquets">Flower bouquets</option>
                            <option value="Jewelry">Jewelry</option>
                        </select>
                    </td>
                    <td class="px-6 py-4 border text-center">
                        <button type="submit" class="send-btn bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-all duration-300 ease-in-out">
                            Send
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>

<!-- Payment Successful Stocks -->
<div class="bg-white shadow-2xl rounded-lg p-6">
    <h2 class="text-4xl font-semibold text-yellow-600 mb-4 text-center">Payment Successful Stocks</h2>
    <form method="POST" class="flex items-center space-x-4 mb-6">
        <input type="text" name="search_id" placeholder="Enter Item ID" class="px-4 py-2 w-64 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        <button type="submit" name="search" class="bg-yellow-600 text-white px-6 py-2 rounded-lg hover:bg-yellow-700 transition-all duration-300 ease-in-out">Search by ID</button>
        <button type="submit" name="view_all" class="bg-yellow-600 text-white px-6 py-2 rounded-lg hover:bg-yellow-700 transition-all duration-300 ease-in-out">View All</button>
    </form>
    
    <?php if ($display_table): ?>
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
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td class='border px-6 py-4'>" . $row["item_id"] . "</td>";
                    echo "<td class='border px-6 py-4'>" . $row["supplier_id"] . "</td>";
                    echo "<td class='border px-6 py-4'>" . $row["item_name"] . "</td>";
                    echo "<td class='border px-6 py-4'>" . $row["date"] . "</td>";
                    echo "<td class='border px-6 py-4'>" . $row["quantity"] . "</td>";
                    echo "<td class='border px-6 py-4'>" . $row["price"] . "</td>";
                    echo "<td class='border px-6 py-4'>" . $row["color"] . "</td>";
                    echo "<td class='border px-6 py-4'>" . $row["sizes"] . "</td>";
                    echo "<td class='border px-6 py-4'><img src='" . $row["image_url"] . "' alt='Item Image' class='h-16 w-16'></td>";
                    echo "<td class='border px-6 py-4'>" . $row["total_amount"] . "</td>";
                    echo "<td class='border px-6 py-4'>" . $row["category"] . "</td>";
                    echo "<td class='border px-6 py-4'>" . $row["payment_status"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='12' class='text-center text-red-500 py-4'>No records found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <?php endif; ?>
</div>


 
<div class="bg-white shadow-2xl rounded-lg p-6">
    <h2 class="text-4xl font-semibold text-yellow-600 mb-4 text-center">Requested Items</h2>
    <form method="POST" class="flex items-center space-x-4 mb-6">
        <a href="requesteditem.php" class="bg-yellow-600 text-white px-6 py-2 rounded-lg hover:bg-yellow-700 transition-all duration-300 ease-in-out">
            Go to Requested Items
        </a>
    </form>
</div>






<script>
document.addEventListener("DOMContentLoaded", function () {
    const clearBtn = document.querySelector("button:nth-of-type(4)"); // Select the "Clear" button
    const addRowBtn = document.querySelector("button:nth-of-type(3)"); // Select the "Add Row" button
    const table = document.querySelector("table");
    const headerRow = table.querySelector("thead tr");
    const tbody = table.querySelector("tbody");

    addRowBtn.addEventListener("click", function () {
        const newRow = document.createElement("tr");
        newRow.className = "border";
        
        for (let i = 0; i < headerRow.children.length - 1; i++) {
            const newCell = document.createElement("td");
            newCell.className = "border px-6 py-4";
            
            if (i === 3) { // Date column
                const dateInput = document.createElement("input");
                dateInput.type = "date";
                dateInput.className = "px-2 py-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500";
                newCell.appendChild(dateInput);
            } else {
                newCell.contentEditable = "true";
            }
            
            newRow.appendChild(newCell);
        }
        
        const actionCell = document.createElement("td");
        actionCell.className = "px-6 py-4 border text-center";
        const sendButton = document.createElement("button");
        sendButton.className = "bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-all duration-300 ease-in-out";
        sendButton.textContent = "Send";
        actionCell.appendChild(sendButton);
        newRow.appendChild(actionCell);
        
        tbody.appendChild(newRow);
    });

    clearBtn.addEventListener("click", function () {
        tbody.innerHTML = ""; // Clears all rows from tbody
    });
});



    </script>
</body>

</html>
<?php
$conn->close();
?>