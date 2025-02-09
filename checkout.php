<?php
session_start();
include 'connection.php';

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit;
}

$customer_id = $_SESSION['user_id'];
$total_price = 0;

// Fetch cart items for the logged-in user
$sql = "SELECT ci.item_id, ci.item_name, ci.quantity, ci.price, si.image_url 
        FROM customer_item ci 
        JOIN supplied_items si ON ci.item_id = si.item_id
        WHERE ci.customer_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $customer_id);
$stmt->execute();
$result = $stmt->get_result();

$orderPlaced = false; // Flag to check if order was placed
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $payment_method = $_POST['payment_method'];

    // Split full name into first and last name
    $name_parts = explode(" ", $full_name, 2);
    $first_name = $name_parts[0];
    $last_name = isset($name_parts[1]) ? $name_parts[1] : "";

    // Insert data into cus_delivery_info table
    $sql = "INSERT INTO cus_delivery_info (customer_id, first_name, last_name, address, phone_number, email, payment_method) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issssss", $customer_id, $first_name, $last_name, $address, $phone, $email, $payment_method);

    if ($stmt->execute()) {
        echo "<script>
            alert('Thank you for shopping! 🛒');
            window.location.href = 'index.php';
        </script>";
        exit;
    }


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Show popup if the order was placed
        <?php if ($orderPlaced): ?>
            window.onload = function() {
                alert("Thank you for shopping! 🛒");
                document.getElementById("checkout-form").reset(); // Reset the form after submission
            };
        <?php endif; ?>
    </script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">🛍️ Checkout</h2>

        <?php if ($result->num_rows > 0): ?>
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <table class="w-full border-collapse mb-6">
                <thead>
                    <tr class="border-b bg-gray-200">
                        <th class="text-left p-3">Image</th>
                        <th class="text-left p-3">Item Name</th>
                        <th class="text-left p-3">Quantity</th>
                        <th class="text-left p-3">Price (Rs.)</th>
                        <th class="text-left p-3">Total (Rs.)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): 
                        $item_total = $row['quantity'] * $row['price'];
                        $total_price += $item_total;
                    ?>
                    <tr class="border-b">
                        <td class="p-3">
                            <img src="<?php echo htmlspecialchars($row['image_url']); ?>" class="w-16 h-16 object-cover rounded-lg" alt="Item Image">
                        </td>
                        <td class="p-3"><?php echo htmlspecialchars($row['item_name']); ?></td>
                        <td class="p-3"><?php echo $row['quantity']; ?></td>
                        <td class="p-3">Rs. <?php echo number_format($row['price'], 2); ?></td>
                        <td class="p-3 font-bold">Rs. <?php echo number_format($item_total, 2); ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <div class="flex justify-between items-center p-4 bg-gray-100 rounded-lg">
                <h3 class="text-xl font-bold">Order Total: Rs. <?php echo number_format($total_price, 2); ?></h3>
            </div>
        </div>

        <div class="mt-8 bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-2xl font-bold mb-4">Delivery Information</h3>
            <form id="checkout-form" action="" method="POST">
                <div class="mb-4">
                    <label for="full_name" class="block text-gray-700">Full Name</label>
                    <input type="text" id="full_name" name="full_name" required class="w-full border p-3 rounded-lg" placeholder="Enter your full name">
                </div>

                <div class="mb-4">
                    <label for="address" class="block text-gray-700">Delivery Address</label>
                    <textarea id="address" name="address" required class="w-full border p-3 rounded-lg" rows="4" placeholder="Enter your delivery address"></textarea>
                </div>

                <div class="mb-4">
                    <label for="phone" class="block text-gray-700">Phone Number</label>
                    <input type="text" id="phone" name="phone" required class="w-full border p-3 rounded-lg" placeholder="Enter your phone number">
                </div>

                <div class="mb-6">
                    <label for="email" class="block text-gray-700">Email Address</label>
                    <input type="email" id="email" name="email" required class="w-full border p-3 rounded-lg" placeholder="Enter your email address">
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700">Payment Method</label>
                    <div class="flex space-x-4">
                        <div>
                            <input type="radio" id="credit_card" name="payment_method" value="credit_card" checked>
                            <label for="credit_card" class="text-gray-700">Credit Card</label>
                        </div>
                        <div>
                            <input type="radio" id="cash_on_delivery" name="payment_method" value="cash_on_delivery">
                            <label for="cash_on_delivery" class="text-gray-700">Cash on Delivery</label>
                        </div>
                    </div>
                </div>

                <button type="submit" class="px-6 py-3 bg-green-500 text-white text-lg font-semibold rounded-lg hover:bg-green-700 transition">
                    Confirm Order 🛒
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
</body>
</html>
