<?php
session_start();
include 'connection.php';

// Fetch data from the table
$sql = "SELECT item_id, item_name, price, color, sizes, image_url FROM supplied_items WHERE supplier_id = 12 AND category = 'Bridledress'";
$result = $conn->query($sql);

// Handle add to cart AJAX request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add_to_cart') {
    $response = ['success' => false, 'message' => ''];

    // Check if user is logged in
    if (!isset($_SESSION['user_id'])) {
        $response['message'] = 'Please login first';
        echo json_encode($response);
        exit;
    }

    try {
        $customer_id = $_SESSION['user_id'];
        $item_id = $_POST['item_id'];
        $quantity = $_POST['quantity'];
        $size = $_POST['size'];

        // Check if the user is a registered customer
        $check_customer = $conn->prepare("SELECT role FROM register WHERE id = ? AND role = 'customer'");
        $check_customer->bind_param("i", $customer_id);
        $check_customer->execute();
        $customer_result = $check_customer->get_result();

        if ($customer_result->num_rows === 0) {
            $response['message'] = 'Only customers can add items to the cart';
            echo json_encode($response);
            exit;
        }

        // Get the original item details
        $stmt = $conn->prepare("SELECT item_name, price FROM supplied_items WHERE item_id = ?");
        $stmt->bind_param("i", $item_id);
        $stmt->execute();
        $item = $stmt->get_result()->fetch_assoc();

        if ($item) {
            // Calculate total amount
            $total_amount = $item['price'] * $quantity;

            // Insert into customer_item table
            $insert_sql = "INSERT INTO customer_item (item_id, customer_id, item_name, quantity, price) 
                           VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($insert_sql);
            $stmt->bind_param("iisid", 
                $item_id, 
                $customer_id, 
                $item['item_name'], 
                $quantity, 
                $item['price']
            );

            if ($stmt->execute()) {
                $response['success'] = true;
                $response['message'] = 'Item added to cart successfully';
            } else {
                $response['message'] = 'Failed to add item to cart';
            }
        } else {
            $response['message'] = 'Item not found';
        }
    } catch (Exception $e) {
        $response['message'] = 'An error occurred';
    }

    echo json_encode($response);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bride Dresses</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:scale-105">
                        <img src="<?php echo htmlspecialchars($row["image_url"]); ?>" 
                             class="w-full h-64 object-cover" 
                             alt="<?php echo htmlspecialchars($row["item_name"]); ?>">
                        <div class="p-4">
                            <h2 class="text-lg font-semibold text-gray-800"><?php echo htmlspecialchars($row["item_name"]); ?></h2>
                            <p class="text-gray-500">Color: <?php echo htmlspecialchars($row["color"]); ?></p>
                            <p class="text-xl font-bold text-gray-900 mt-2">Rs. <?php echo number_format($row["price"], 2); ?></p>
                            
                            <!-- Size Selection -->
                            <div class="mt-4">
                                <label class="block text-sm font-medium text-gray-700">Size:</label>
                                <select class="size-select mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring-yellow-500">
                                    <option value="S">Small</option>
                                    <option value="M">Medium</option>
                                    <option value="L">Large</option>
                                    <option value="XL">Extra Large</option>
                                </select>
                            </div>
                            
                            <!-- Quantity Selection -->
                            <div class="mt-4">
                                <label class="block text-sm font-medium text-gray-700">Quantity:</label>
                                <input type="number" 
                                       class="quantity-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring-yellow-500"
                                       value="1" 
                                       min="1">
                            </div>
                            
                            <!-- Add to Cart Button -->
                            <button onclick="addToCart(this)" 
                                    data-item-id="<?php echo $row['item_id']; ?>"
                                    class="mt-4 w-full bg-yellow-600 text-white py-2 px-4 rounded-md hover:bg-yellow-700 transition">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo '<p class="text-gray-700 text-lg">No items found.</p>';
            }
            ?>
        </div>
    </div>

    <script>
    function addToCart(button) {
        const card = button.closest('.bg-white');
        const itemId = button.getAttribute('data-item-id');
        const quantity = card.querySelector('.quantity-input').value;
        const size = card.querySelector('.size-select').value;

        // Create form data
        const formData = new FormData();
        formData.append('action', 'add_to_cart');
        formData.append('item_id', itemId);
        formData.append('quantity', quantity);
        formData.append('size', size);

        // Send AJAX request
        fetch(window.location.href, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message);
                // Update cart count if you have one
                updateCartCount();
            } else {
                if (data.message === 'Please login first') {
                    window.location.href = 'singin.php';
                } else {
                    alert(data.message);
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
        });
    }

    function updateCartCount() {
        const cartCount = document.getElementById('cart-count');
        if (cartCount) {
            // Remove 'hidden' class to show the count
            cartCount.classList.remove('hidden');
            
            // Get current count and increment
            let currentCount = parseInt(cartCount.textContent) || 0;
            cartCount.textContent = currentCount + 1;
        }
    }
    </script>
</body>
</html>