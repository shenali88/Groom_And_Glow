<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Details</title>
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


<!-- Product Details -->
<div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-8 p-6">
  <!-- Product Image -->
  <div>
    <img id="product-image" src="" alt="Product Image" class="w-full h-auto rounded-lg shadow-md">
  </div>

  <!-- Product Info -->
  <div>
    <h1 id="product-title" class="text-3xl font-bold"></h1>
    <p id="product-price" class="mt-3 text-xl font-semibold text-gray-800"></p>

    <!-- Color -->
    <div class="mt-6">
      <p class="text-sm text-gray-600">Color</p>
      <div id="product-color" class="mt-2 text-gray-800 font-medium"></div>
    </div>

    <!-- Size Selection -->
    <div class="mt-6">
      <p class="text-sm text-gray-600">Sizes</p>
      <div id="product-sizes" class="flex items-center gap-2 mt-2"></div>
    </div>
 <!-- Payment Details Section -->
 <div class="mt-6 bg-gray-100 p-4 rounded-lg shadow">
      <p class="text-sm font-semibold text-gray-800">Delivery within 24 hours</p>
      <p class="text-sm font-semibold text-gray-800">Low-cost islandwide delivery</p>
      <p class="text-sm font-semibold text-gray-800">In Stock</p>

      <!-- Card Offers -->
      <div class="mt-4">
        <p class="text-sm font-semibold text-gray-600">Card Offers</p>
        <div class="mt-2 flex gap-4">
          <div class="flex items-center gap-2 border p-2 rounded-lg">
            <img src="https://th.bing.com/th/id/OIP.5axoxKaPm_TZdSymAzKZygHaDt?w=500&h=250&rs=1&pid=ImgDetMain" alt="Payment Icon" class="w-8 h-8">
            <div>
              <p class="text-xs font-semibold">Installments Rs. 2,290</p>
              <p class="text-xs text-gray-600">Up to 3 months</p>
            </div>
          </div>
          <div class="flex items-center gap-2 border p-2 rounded-lg">
            <img src="https://th.bing.com/th/id/OIP.LdEuOZxKDz1jP9lnTp51WAAAAA?w=474&h=464&rs=1&pid=ImgDetMain" alt="Payment Icon" class="w-8 h-8">
            <div>
              <p class="text-xs font-semibold">Installments Rs. 332</p>
              <p class="text-xs text-gray-600">Up to 24 months</p>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Buttons -->
    <div class="mt-6">
      <!-- Add to Cart Button -->
      <button id="add-to-cart" class="w-full px-4 py-3 bg-yellow-500 text-white font-medium rounded-lg hover:bg-yellow-600 transition">
        Add to Cart
      </button>

      <!-- Continue Shopping Button -->
      <button id="continue-shopping" class="mt-4 w-full px-4 py-3 bg-gray-500 text-white font-medium rounded-lg hover:bg-gray-600 transition" onclick="window.location.href='bridaldress.php'">
  Continue Shopping
</button>
 
   <!-- Continue Shopping Button -->
   <button id="continue-shopping" class="mt-4 w-full px-4 py-3 bg-gray-500 text-white font-medium rounded-lg hover:bg-gray-600 transition" onclick="window.location.href='checkout.php'">
  Check out
</button>

    </div>
  </div>
</div>


  <script>
    // JavaScript to fetch product details from query string
    const urlParams = new URLSearchParams(window.location.search);
    const title = urlParams.get('title');
    const price = urlParams.get('price');
    const color = urlParams.get('color');
    const sizes = urlParams.get('sizes') ? urlParams.get('sizes').split(',') : [];
    const image = urlParams.get('image');

    // Populate product details
    document.getElementById('product-image').src = image;
    document.getElementById('product-title').textContent = title;
    document.getElementById('product-price').textContent = `Rs. ${price}`;
    document.getElementById('product-color').textContent = color;

    // Populate sizes
    const sizesContainer = document.getElementById('product-sizes');
    sizes.forEach(size => {
      const sizeButton = document.createElement('button');
      sizeButton.textContent = size;
      sizeButton.className = 'px-4 py-2 text-sm bg-gray-200 rounded hover:bg-gray-300 focus:ring focus:ring-gray-400';
      sizesContainer.appendChild(sizeButton);
    });

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
