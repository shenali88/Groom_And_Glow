<?php
session_start();
include 'connection.php';


// Fetch data from the table
$sql = "SELECT si.item_id, si.item_name, si.price, si.color, si.sizes, si.image_url 
        FROM supplied_items si
        JOIN register r ON si.supplier_id = r.id
        WHERE r.role = 'supplier' 
        AND si.category = 'Groom wear'";

$result = $conn->query($sql);

// Handle add to cart AJAX request
// Handle add to cart AJAX request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add_to_cart') {
    $response = ['success' => false, 'message' => ''];

    if (!isset($_SESSION['user_id'])) {
        $response['message'] = 'Please login first';
        $response['redirect'] = 'signin.php'; // Add redirect URL in response
        echo json_encode($response);
        exit;
    }
    try {
        $customer_id = $_SESSION['user_id'];
        $item_id = $_POST['item_id'];
        $quantity = $_POST['quantity'];
        $size = $_POST['size'];

        // Check if the user is a customer
        $check_customer = $conn->prepare("SELECT role FROM register WHERE id = ? AND role = 'customer'");
        $check_customer->bind_param("i", $customer_id);
        $check_customer->execute();
        $customer_result = $check_customer->get_result();

        if ($customer_result->num_rows === 0) {
            $response['message'] = 'Only customers can add items to the cart';
            echo json_encode($response);
            exit;
        }

        // Get item details
        $stmt = $conn->prepare("SELECT item_name, price FROM supplied_items WHERE item_id = ?");
        $stmt->bind_param("i", $item_id);
        $stmt->execute();
        $item = $stmt->get_result()->fetch_assoc();

        if ($item) {
            // Insert into customer_item
            $insert_sql = "INSERT INTO customer_item (item_id, customer_id, item_name, quantity, price, size) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($insert_sql);
            $stmt->bind_param("iisids", 
                $item_id, 
                $customer_id, 
                $item['item_name'], 
                $quantity, 
                $item['price'],
                $size
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
        $response['message'] = 'An error occurred: ' . $e->getMessage();
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
    <title>Groom wear</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<header class="bg-white shadow-md sticky top-0 z-10">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">

        <img src="https://th.bing.com/th/id/OIP.grSv6iUFAGYMb7NrhcWxlQAAAA?rs=1&pid=ImgDetMain" alt="Groom & Glow Logo" class="w-20 h-auto">
        
              <!-- All Categories List -->
            <div class="relative">
                <button id="all-categories-button" class="text-yellow-600 font-medium hover:text-yellow-700 focus:outline-none">
                    All Categories
                </button>
                <div id="all-categories-list" class="hidden absolute bg-white shadow-lg rounded-lg w-64 mt-2 z-10">
                    <ul class="overflow-y-auto max-h-80">
                        <li class="hover:bg-gray-100">
                            <a href="bridaldress.php" class="flex items-center px-4 py-2 text-yellow-600">
                                <img src="https://th.bing.com/th/id/OIP.KsznjmqxeFhGEs2Q_0OUEQHaLH?rs=1&pid=ImgDetMain" alt="Bridal Dress" class="w-8 h-8 rounded-full">
                                <span class="ml-3">Bridal Dress</span>
                            </a>
                        </li>
                        <li class="hover:bg-gray-100">
                            <a href="groomsuit.php" class="flex items-center px-4 py-2 text-yellow-600">
                                <img src="https://i.pinimg.com/originals/58/b5/23/58b523522a48c02d57cb02080ce291dd.jpg" alt="Groom Suit" class="w-8 h-8 rounded-full">
                                <span class="ml-3">Groom Suit</span>
                            </a>
                        </li>
                        <li class="hover:bg-gray-100">
                            <a href="flower bouquet.php" class="flex items-center px-4 py-2 text-yellow-600">
                                <img src="https://cdn1.1800flowers.com/wcsstore/Flowers/images/catalog/103904lx.jpg" alt="Flower Bouquet" class="w-8 h-8 rounded-full">
                                <span class="ml-3">Flower Bouquet</span>
                            </a>
                        </li>
                        <li class="hover:bg-gray-100">
                            <a href="jewalary.php" class="flex items-center px-4 py-2 text-yellow-600">
                                <img src="https://th.bing.com/th/id/R.1baa483a3667923536f639892d64e82d?rik=nPkC8cb%2brELzpg&riu=http%3a%2f%2fs3.weddbook.com%2ft4%2f2%2f0%2f1%2f2011130%2fwedding-jewelry.jpg&ehk=sWU8CijgC04Le1l6YlZzaAU%2fT%2fWb79fmUBQde%2bFC3vo%3d&risl=&pid=ImgRaw&r=0" alt="Jewelry" class="w-8 h-8 rounded-full">
                                <span class="ml-3">Jewelry</span>
                            </a>
                        </li>
                        <li class="hover:bg-gray-100">
                            <a href="partydresses.php" class="flex items-center px-4 py-2 text-yellow-600">
                                <img src="https://i.pinimg.com/736x/a7/f4/cf/a7f4cfe29b9ec69f1c82962d90026441.jpg" alt="Party Dress" class="w-8 h-8 rounded-full">
                                <span class="ml-3">Party Dress</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Logo -->
          
            <h1 class="text-3xl font-bold text-yellow-600">Groom & Glow</h1>
        
      
            <!-- Navigation Links -->
            <ul class="flex space-x-8 text-yellow-600 font-medium">
    <a href="index.php" class="text-yellow-600 hover:text-yellow-600">Home</a>

    <!-- Shop Dropdown -->
    <div class="relative">
        <button id="shop-button" class="text-yellow-600 hover:text-yellow-600 focus:outline-none">
            Shop
        </button>
        <div id="shop-list" class="hidden absolute left-0 mt-2 bg-white shadow-lg rounded-lg w-64 z-10">
            <ul class="overflow-y-auto max-h-80">
                <li class="hover:bg-gray-100">
                    <a href="bridaldress.php" class="flex items-center px-4 py-2 text-yellow-600">
                        <img src="https://th.bing.com/th/id/OIP.KsznjmqxeFhGEs2Q_0OUEQHaLH?rs=1&pid=ImgDetMain" alt="Bridal Dress" class="w-8 h-8 rounded-full">
                        <span class="ml-3">Bridal Dress</span>
                    </a>
                </li>
                <li class="hover:bg-gray-100">
                    <a href="groomsuit.php" class="flex items-center px-4 py-2 text-yellow-600">
                        <img src="https://i.pinimg.com/originals/58/b5/23/58b523522a48c02d57cb02080ce291dd.jpg" alt="Groom Suit" class="w-8 h-8 rounded-full">
                        <span class="ml-3">Groom Suit</span>
                    </a>
                </li>
                <li class="hover:bg-gray-100">
                    <a href="flower bouquet.php" class="flex items-center px-4 py-2 text-yellow-600">
                        <img src="https://cdn1.1800flowers.com/wcsstore/Flowers/images/catalog/103904lx.jpg" alt="Flower Bouquet" class="w-8 h-8 rounded-full">
                        <span class="ml-3">Flower Bouquet</span>
                    </a>
                </li>
                <li class="hover:bg-gray-100">
                    <a href="jewalary.php"  class="flex items-center px-4 py-2 text-yellow-600">
                        <img src="https://th.bing.com/th/id/R.1baa483a3667923536f639892d64e82d?rik=nPkC8cb%2brELzpg&riu=http%3a%2f%2fs3.weddbook.com%2ft4%2f2%2f0%2f1%2f2011130%2fwedding-jewelry.jpg&ehk=sWU8CijgC04Le1l6YlZzaAU%2fT%2fWb79fmUBQde%2bFC3vo%3d&risl=&pid=ImgRaw&r=0" alt="Jewelry" class="w-8 h-8 rounded-full">
                        <span class="ml-3">Jewelry</span>
                    </a>
                </li>
                <li class="hover:bg-gray-100">
                    <a href="partydresses.php" class="flex items-center px-4 py-2 text-yellow-600">
                        <img src="https://i.pinimg.com/736x/a7/f4/cf/a7f4cfe29b9ec69f1c82962d90026441.jpg" alt="Party Dress" class="w-8 h-8 rounded-full">
                        <span class="ml-3">Party Dress</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <a href="package.php" class="text-yellow-600 hover:text-yellow-600">Packages</a>
    <a href="contactus.php" class="text-yellow-600 hover:text-yellow-600">Contact</a>
    <a href="about.php" class="text-yellow-600 hover:text-yellow-600">About Us</a>

    <!-- Login and Shopping Cart Icons -->
    <div class="flex space-x-6 items-center">
            <!-- Login Icon -->
            <a href="login.html" class="text-yellow-600 hover:text-yellow-700 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm0 3c-4.418 0-8 1.79-8 4v1h16v-1c0-2.21-3.582-4-8-4z" />
                </svg>
              
            </a>

            <!-- Shopping Cart Icon -->
            <a href="#cart" class="relative">
        <!-- Cart Icon -->
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8 text-yellow-600 hover:text-gray-700">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5H2M7 13l-2 8h12l-2-8M7 21a2 2 0 100-4 2 2 0 000 4zm10 0a2 2 0 100-4 2 2 0 000 4z" />
        </svg>
        <!-- Cart Count Badge -->
        <span id="cart-count" class="absolute top-0 right-0 -mt-2 -mr-2 bg-red-500 text-white text-xs font-bold rounded-full px-2 hidden">0</span>
      </a>
</ul>

        </div>
        
</header>

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
                            
                            <div class="mt-4">
                                <label class="block text-sm font-medium text-gray-700">Size:</label>
                                <select class="size-select mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring-yellow-500">
                                    <option value="S">Small</option>
                                    <option value="M">Medium</option>
                                    <option value="L">Large</option>
                                    <option value="XL">Extra Large</option>
                                </select>
                            </div>
                            
                            <div class="mt-4">
                                <label class="block text-sm font-medium text-gray-700">Quantity:</label>
                                <input type="number" 
                                       class="quantity-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring-yellow-500"
                                       value="1" 
                                       min="1">
                            </div>
                            
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

    // Check if user is logged in
    const isLoggedIn = <?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>;
    
    if (!isLoggedIn) {
        alert('Please sign in first');
        window.location.href = 'singin.php';
        return;
    }

    const formData = new FormData();
    formData.append('action', 'add_to_cart');
    formData.append('item_id', itemId);
    formData.append('quantity', quantity);
    formData.append('size', size);

    fetch('bridaldress.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        if (data.success) {
            window.location.href = 'addtocart.php';
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred. Please try again.');
    });
}

        // Dropdown toggle functionality
        const shopButton = document.getElementById('shop-button');
        const shopList = document.getElementById('shop-list');

        shopButton.addEventListener('click', () => {
            shopList.classList.toggle('hidden');
            shopList.classList.toggle('block');
        });

        // Optional: Close dropdown when clicking outside
        window.addEventListener('click', (e) => {
            if (!shopButton.contains(e.target) && !shopList.contains(e.target)) {
                shopList.classList.add('hidden');
                shopList.classList.remove('block');
            }
        });

// Dropdown toggle functionality for All Categories
const allCategoriesButton = document.getElementById('all-categories-button');
        const allCategoriesList = document.getElementById('all-categories-list');

        allCategoriesButton.addEventListener('click', (e) => {
            e.stopPropagation(); // Prevent event from propagating to the window listener
            allCategoriesList.classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        window.addEventListener('click', (e) => {
            if (!allCategoriesButton.contains(e.target) && !allCategoriesList.contains(e.target)) {
                allCategoriesList.classList.add('hidden');
            }
        });
    

    </script>
</body>
</html>
