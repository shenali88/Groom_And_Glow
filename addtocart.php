<?php
session_start();
include 'connection.php';

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit;
}

$customer_id = $_SESSION['user_id'];

// Fetch cart items for the logged-in user
$sql = "SELECT ci.item_id, ci.item_name, ci.quantity, ci.price, si.image_url 
        FROM customer_item ci 
        JOIN supplied_items si ON ci.item_id = si.item_id
        WHERE ci.customer_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $customer_id);
$stmt->execute();
$result = $stmt->get_result();

$total_price = 0;

// Handle the update request for quantity change
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['quantity'])) {
    // Get the values from the form
    $item_id = $_POST['item_id'];
    $quantity = $_POST['quantity'];
    $customer_id = $_POST['customer_id']; // Ensure this is passed in the form or set it from the session

    // Validate the quantity (ensure it's a positive integer)
    if (is_numeric($quantity) && $quantity > 0) {
        // Update the quantity in the customer_item table
        $stmt = $conn->prepare("UPDATE customer_item SET quantity = ? WHERE item_id = ? AND customer_id = ?");
        $stmt->bind_param("iii", $quantity, $item_id, $customer_id);

        // Execute the query
        if ($stmt->execute()) {
            echo json_encode(['status' => 'success']);
            exit();
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error updating item quantity.']);
            exit();
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid quantity.']);
        exit();
    }
}

// Handle the remove item request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_item'])) {
    $item_id = $_POST['item_id'];

    // Remove the item from the customer's cart
    $stmt = $conn->prepare("DELETE FROM customer_item WHERE item_id = ? AND customer_id = ?");
    $stmt->bind_param("ii", $item_id, $customer_id);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Item removed successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error removing item from cart.']);
    }
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Add jQuery -->
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">🛒 Your Shopping Cart</h2>

        <?php if ($result->num_rows > 0): ?>
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="border-b bg-gray-200">
                        <th class="text-left p-3">Image</th>
                        <th class="text-left p-3">Item Name</th>
                        <th class="text-left p-3">Quantity</th>
                        <th class="text-left p-3">Price (Rs.)</th>
                        <th class="text-left p-3">Total (Rs.)</th>
                        <th class="text-left p-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): 
                        $item_total = $row['quantity'] * $row['price'];
                        $total_price += $item_total;
                    ?>
                    <tr class="border-b">
                        <td class="p-3">
                            <div class="w-48 h-48">
                                <img src="<?php echo htmlspecialchars($row['image_url']); ?>" 
                                     class="w-full h-full object-cover rounded-xl shadow-md transition-transform transform hover:scale-105" 
                                     alt="Item Image">
                            </div>
                        </td>
                        <td class="p-3"><?php echo htmlspecialchars($row['item_name']); ?></td>
                        <td class="p-3">
                            <form class="update-quantity-form flex items-center" data-item-id="<?php echo $row['item_id']; ?>" data-customer-id="<?php echo $customer_id; ?>" method="POST">
                                <input type="hidden" name="item_id" value="<?php echo $row['item_id']; ?>">
                                <input type="number" name="quantity" value="<?php echo $row['quantity']; ?>" class="w-16 border rounded-lg text-center text-lg" min="1">
                                <button type="submit" class="ml-2 px-3 py-1 bg-blue-500 text-white rounded-lg hover:bg-blue-700 transition">
                                    Update
                                </button>
                            </form>
                        </td>
                        <td class="p-3">Rs. <?php echo number_format($row['price'], 2); ?></td>
                        <td class="p-3 font-bold">Rs. <?php echo number_format($item_total, 2); ?></td>
                        <td class="p-3">
                            <form class="remove-item-form" data-item-id="<?php echo $row['item_id']; ?>" method="POST">
                                <input type="hidden" name="item_id" value="<?php echo $row['item_id']; ?>">
                                <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded-lg hover:bg-red-700 transition">
                                    ❌ Remove
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <!-- Cart Summary -->
            <div class="mt-6 flex justify-between items-center p-4 bg-gray-100 rounded-lg">
                <h3 class="text-xl font-bold">Total: Rs. <?php echo number_format($total_price, 2); ?></h3>
                <a href="checkout.php" class="px-6 py-3 bg-green-500 text-white text-lg font-semibold rounded-lg hover:bg-green-700 transition">
    🛍️ Proceed to Checkout
</a>
            </div>
        </div>

        <!-- Buttons for Continue Shopping & Empty Cart -->
        <div class="mt-6 flex justify-between">
        <a href="index.php" class="px-6 py-3 bg-gray-600 text-white text-lg font-semibold rounded-lg hover:bg-gray-800 transition">
    ⬅️ Continue Shopping
</a>
            <form action="clear_cart.php" method="POST">
                <button type="submit" class="px-6 py-3 bg-red-600 text-white text-lg font-semibold rounded-lg hover:bg-red-800 transition">
                    🗑️ Empty Cart
                </button>
            </form>
        </div>

        <?php else: ?>
        <p class="text-gray-700 text-xl text-center">Your cart is empty. 🛒</p>
        <div class="text-center mt-4">
            <a href="shop.php" class="px-6 py-3 bg-blue-500 text-white text-lg font-semibold rounded-lg hover:bg-blue-700 transition">
                Start Shopping 🛍️
            </a>
        </div>
        <?php endif; ?>
    </div>

    <script>
        // Handle AJAX form submission for quantity update
        $(document).ready(function() {
            $('.update-quantity-form').on('submit', function(e) {
                e.preventDefault();

                var form = $(this);
                var item_id = form.find('input[name="item_id"]').val();
                var quantity = form.find('input[name="quantity"]').val();
                var customer_id = form.data('customer-id');

                if (quantity <= 0) {
                    alert("Please enter a valid quantity.");
                    return;
                }

                $.ajax({
                    url: '',  // Same page will handle the POST request
                    type: 'POST',
                    data: {
                        item_id: item_id,
                        quantity: quantity,
                        customer_id: customer_id
                    },
                    success: function(response) {
                        var res = JSON.parse(response);
                        if(res.status === 'success') {
                            alert("Quantity updated successfully!");
                            location.reload();  // Reload the page to reflect changes
                        } else {
                            alert(res.message || "Error updating quantity.");
                        }
                    },
                    error: function() {
                        alert("Error occurred while updating.");
                    }
                });
            });

            // Handle AJAX form submission for removing item
            $('.remove-item-form').on('submit', function(e) {
                e.preventDefault();

                var form = $(this);
                var item_id = form.find('input[name="item_id"]').val();

                $.ajax({
                    url: '',  // Same page will handle the POST request
                    type: 'POST',
                    data: {
                        remove_item: true,
                        item_id: item_id
                    },
                    success: function(response) {
                        var res = JSON.parse(response);
                        if(res.status === 'success') {
                            alert(res.message);
                            location.reload();  // Reload the page to reflect changes
                        } else {
                            alert(res.message || "Error removing item.");
                        }
                    },
                    error: function() {
                        alert("Error occurred while removing item.");
                    }
                });
            });
        });
    </script>
</body>
</html>
