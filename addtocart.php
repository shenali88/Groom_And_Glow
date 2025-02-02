<?php
 include 'connection.php';

// Get item details from URL parameter
$item_id = isset($_GET['item_id']) ? (int)$_GET['item_id'] : 0;

$sql = "SELECT * FROM supplied_items WHERE item_id = $item_id";
$result = $conn->query($sql);
$item = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $item["item_name"]; ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

  <!-- Navigation Bar -->
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
    <a href="singin.php" class="text-yellow-600 hover:text-yellow-700 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm0 3c-4.418 0-8 1.79-8 4v1h16v-1c0-2.21-3.582-4-8-4z" />
        </svg>
      
    </a>

    <!-- Shopping Cart Icon -->
    <a href="checkout.php" class="relative">
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
<script>
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

<body class="bg-gray-100">
<div class="container mx-auto px-6 py-12">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Product Image -->
        <div>
            <img src="<?php echo $item["image_url"]; ?>" class="w-full rounded-lg shadow-lg" alt="<?php echo $item["item_name"]; ?>">
        </div>
        
        <!-- Product Details -->
        <div>
            <h1 class="text-2xl font-bold text-gray-900"><?php echo $item["item_name"]; ?></h1>
            <p class="text-gray-600 text-xl mt-2">Rs. <?php echo number_format($item["price"], 2); ?></p>
            
            <div class="mt-4">
                <span class="text-gray-700 font-semibold">Color:</span>
                <span class="text-gray-600"><?php echo $item["color"]; ?></span>
            </div>

            <div class="mt-4">
                <span class="text-gray-700 font-semibold">Sizes:</span>
                <div class="mt-2 flex space-x-2">
                    <?php
                    $sizes = explode(',', $item["sizes"]);
                    foreach ($sizes as $size) {
                        echo '<span class="px-3 py-1 bg-gray-200 text-gray-800 rounded-md">' . trim($size) . '</span>';
                    }
                    ?>
                </div>
            </div>

            <div class="mt-6 p-4 bg-gray-100 rounded-lg">
                <p class="text-green-600 font-semibold">✔️ Delivery within 24 hours</p>
                <p class="text-gray-600">✔️ Low-cost islandwide delivery</p>
                <p class="text-gray-600">✔️ In Stock</p>
            </div>

            <div class="mt-6 flex space-x-4">
                <button class="w-full bg-yellow-500 hover:bg-yellow-600 text-white py-3 rounded-lg font-semibold">
                    Add to Cart
                </button>
                <button class="w-full bg-gray-600 hover:bg-gray-700 text-white py-3 rounded-lg font-semibold">
                    Continue Shopping
                </button>
            </div>

            <button class="w-full mt-3 bg-gray-800 hover:bg-black text-white py-3 rounded-lg font-semibold">
                Check out
            </button>
        </div>
    </div>
</div>


  <script>


    // Cart Count Logic
    let cartCount = 0; // Initialize cart count

    // Add to Cart Button Click Event
    document.getElementById('add-to-cart').addEventListener('click', () => {
      cartCount++; // Increment cart count

      const cartCountElement = document.getElementById('cart-count');
      cartCountElement.textContent = cartCount; // Update cart count display

      // Show the badge if it's hidden
      if (cartCountElement.classList.contains('hidden')) {
        cartCountElement.classList.remove('hidden');
      }
    });
  </script>

</body>
</html>
