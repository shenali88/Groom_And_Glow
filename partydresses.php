<?php
 include 'connection.php';

// Fetch data from the table
$sql = "SELECT item_id, item_name, price, color, image_url FROM supplied_items WHERE supplier_id = 12";
$result = $conn->query($sql);
?>

$conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Party Dresses</title>
  <script src="https://cdn.tailwindcss.com"></script>
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


</head>
<body class="bg-gray-50 text-gray-800">


<!-- Popular Products Section -->
<div class="px-10 py-6">
    <h2 class="text-center text-3xl font-bold mb-6">Party Dresses</h2>

  <!-- Product List Section -->
  <div id="product-list" class="grid grid-cols-4 gap-6 p-6">
    <!-- Product Card 1 -->
    <div 
      class="card block bg-white shadow-lg rounded-lg overflow-hidden transform transition hover:scale-105 cursor-pointer"
      data-id="1"
      data-title="Short mini Dress"
      data-price="5900"
      data-color="Baby pink"
      data-sizes="UK8,UK10,UK12,UK14,UK16"
      data-image="https://d44ri6pmeripj.cloudfront.net/morilee/wp-content/uploads/2020/04/9551-0062-scaled.jpg">
      <img src="https://d44ri6pmeripj.cloudfront.net/morilee/wp-content/uploads/2020/04/9551-0062-scaled.jpg" 
           alt="Product 1" class="w-full h-64 object-cover">
      <div class="p-4">
        <h3 class="text-lg font-bold text-gray-800">Short mini Dress</h3>
        <p class="text-sm text-gray-500">Baby pink</p>
        <div class="mt-2 text-lg text-gray-800 font-semibold">Rs. 5,900</div>
      </div>
    </div>

    <!-- Repeat Product Card -->
    <!-- Add 7 more cards with similar structure -->

    <!-- Product Card 2 -->
    <div 
      class="card block bg-white shadow-lg rounded-lg overflow-hidden transform transition hover:scale-105 cursor-pointer"
      data-id="1"
      data-title="Short mini dress"
      data-price="5000"
      data-color="Purple"
      data-sizes="UK8,UK10,UK12,UK14,UK16"
      data-image="https://th.bing.com/th/id/OIP.Dpx3yfY9UKPvhU9-CEy6KwHaHa?w=736&h=736&rs=1&pid=ImgDetMain">
      <img src="https://th.bing.com/th/id/OIP.Dpx3yfY9UKPvhU9-CEy6KwHaHa?w=736&h=736&rs=1&pid=ImgDetMain" 
           alt="Product 1" class="w-full h-64 object-cover">
      <div class="p-4">
        <h3 class="text-lg font-bold text-gray-800">Short mini dress</h3>
        <p class="text-sm text-gray-500">Purple</p>
        <div class="mt-2 text-lg text-gray-800 font-semibold">Rs. 5,000</div>
      </div>
    </div>

    <div 
      class="card block bg-white shadow-lg rounded-lg overflow-hidden transform transition hover:scale-105 cursor-pointer"
      data-id="1"
      data-title="long sleeves party dress"
      data-price="7000"
      data-color="Green"
      data-sizes="UK8,UK10,UK12,UK14,UK16"
      data-image="https://th.bing.com/th/id/OIP.46LghC_qse8S3w9etAxUmQHaHa?w=540&h=540&rs=1&pid=ImgDetMain" alt="Product" class="w-full h-64 object-cover">
      <img src="https://th.bing.com/th/id/OIP.46LghC_qse8S3w9etAxUmQHaHa?w=540&h=540&rs=1&pid=ImgDetMain" alt="Product" class="w-full h-64 object-cover" 
           alt="Product 1" class="w-full h-64 object-cover">
      <div class="p-4">
        <h3 class="text-lg font-bold text-gray-800">long sleeves party dress</h3>
        <p class="text-sm text-gray-500">Green</p>
        <div class="mt-2 text-lg text-gray-800 font-semibold">Rs. 7,000</div>
      </div>
    </div>

    <div 
      class="card block bg-white shadow-lg rounded-lg overflow-hidden transform transition hover:scale-105 cursor-pointer"
      data-id="1"
      data-title="Long sleeves party derss with belt"
      data-price="6900"
      data-color=" Blue"
      data-sizes="UK8,UK10,UK12,UK14,UK16"
      data-image="https://www.nairaland.com/attachments/9626337_img20190611wa0006_jpeg842ec8d0dd65514e5d79bad9a2958605">
      <img src="https://www.nairaland.com/attachments/9626337_img20190611wa0006_jpeg842ec8d0dd65514e5d79bad9a2958605" 
           alt="Product 1" class="w-full h-64 object-cover">
      <div class="p-4">
        <h3 class="text-lg font-bold text-gray-800">Long sleeves party derss with belt</h3>
        <p class="text-sm text-gray-500">Blue</p>
        <div class="mt-2 text-lg text-gray-800 font-semibold">Rs. 6,900</div>
      </div>
    </div>

    <div 
      class="card block bg-white shadow-lg rounded-lg overflow-hidden transform transition hover:scale-105 cursor-pointer"
      data-id="1"
      data-title="Short mini dress"
      data-price="5000"
      data-color="Red"
      data-sizes="UK8,UK10,UK12,UK14,UK16"
      data-image="https://th.bing.com/th/id/OIP.WtrHBYDtpuwM7Y4JsFLkHAAAAA?rs=1&pid=ImgDetMain" alt="Product" class="w-full h-64 object-cover">
      <img src="https://th.bing.com/th/id/OIP.WtrHBYDtpuwM7Y4JsFLkHAAAAA?rs=1&pid=ImgDetMain" alt="Product" class="w-full h-64 object-cover" 
           alt="Product 1" class="w-full h-64 object-cover">
      <div class="p-4">
        <h3 class="text-lg font-bold text-gray-800">Short mini dress</h3>
        <p class="text-sm text-gray-500">red</p>
        <div class="mt-2 text-lg text-gray-800 font-semibold">Rs. 5,000</div>
      </div>
    </div>
    <div 
      class="card block bg-white shadow-lg rounded-lg overflow-hidden transform transition hover:scale-105 cursor-pointer"
      data-id="1"
      data-title="Long party dress - Navy Blue"
      data-price="8000"
      data-color="Navy Blue"
      data-sizes="UK8,UK10,UK12,UK14,UK16"
      data-image="https://ae01.alicdn.com/kf/HTB1JqLzIpXXXXboXXXXq6xXFXXXp/Luxury-embroidery-Flower-Organza-Cocktail-Dress-with-Pockets-Tea-length-Distinctive-Prom-Formal-Dress-WDW030.jpg" alt="Product" class="w-full h-64 object-cover" alt="Product" class="w-full h-64 object-cover" alt="Product" class="w-full h-64 object-cover.jpg">
      <img src="https://ae01.alicdn.com/kf/HTB1JqLzIpXXXXboXXXXq6xXFXXXp/Luxury-embroidery-Flower-Organza-Cocktail-Dress-with-Pockets-Tea-length-Distinctive-Prom-Formal-Dress-WDW030.jpg" alt="Product" class="w-full h-64 object-cover" 
           alt="Product 1" class="w-full h-64 object-cover">
      <div class="p-4">
        <h3 class="text-lg font-bold text-gray-800">Long party dress - Navy Blue</h3>
        <p class="text-sm text-gray-500">Navy Blue</p>
        <div class="mt-2 text-lg text-gray-800 font-semibold">Rs. 8,000</div>
      </div>
    </div>
    <div 
      class="card block bg-white shadow-lg rounded-lg overflow-hidden transform transition hover:scale-105 cursor-pointer"
      data-id="1"
      data-title="Short mini dress"
      data-price="5900"
      data-color="White"
      data-sizes="UK8,UK10,UK12,UK14,UK16"
      data-image="https://th.bing.com/th/id/OIP.osZjW1h5n-GUfwQRPbWk-gHaHa?rs=1&pid=ImgDetMain" alt="Product" class="w-full h-64 object-cover">
      <img src="https://th.bing.com/th/id/OIP.osZjW1h5n-GUfwQRPbWk-gHaHa?rs=1&pid=ImgDetMain" alt="Product" class="w-full h-64 object-cover" 
           alt="Product 1" class="w-full h-64 object-cover">
      <div class="p-4">
        <h3 class="text-lg font-bold text-gray-800">Short mini dress</h3>
        <p class="text-sm text-gray-500">White</p>
        <div class="mt-2 text-lg text-gray-800 font-semibold">Rs. 5,900</div>
      </div>
    </div>
    <div 
      class="card block bg-white shadow-lg rounded-lg overflow-hidden transform transition hover:scale-105 cursor-pointer"
      data-id="1"
      data-title="Long party dress"
      data-price="10000"
      data-color="Navy Blue"
      data-sizes="UK8,UK10,UK12,UK14,UK16"
      data-image="https://th.bing.com/th/id/OIP.PQKbzn_Pb4SjmBY2KN42DgHaJ3?rs=1&pid=ImgDetMain" alt="Product" class="w-full h-64 object-cover" alt="Product" class="w-full h-64 object-cover">
      <img src="https://th.bing.com/th/id/OIP.PQKbzn_Pb4SjmBY2KN42DgHaJ3?rs=1&pid=ImgDetMain" alt="Product" class="w-full h-64 object-cover" alt="Product" class="w-full h-64 object-cover" 
           alt="Product 1" class="w-full h-64 object-cover">
      <div class="p-4">
        <h3 class="text-lg font-bold text-gray-800">Long party dress</h3>
        <p class="text-sm text-gray-500">Navy Blue</p>
        <div class="mt-2 text-lg text-gray-800 font-semibold">Rs. 10,000</div>
      </div>
    </div>


  <script>
    // JavaScript to handle product card clicks
    const productCards = document.querySelectorAll('.card');
    productCards.forEach(card => {
      card.addEventListener('click', () => {
        const id = card.getAttribute('data-id');
        const title = card.getAttribute('data-title');
        const price = card.getAttribute('data-price');
        const color = card.getAttribute('data-color');
        const sizes = card.getAttribute('data-sizes');
        const image = card.getAttribute('data-image');
        const url = `addtocart.php?id=${id}&title=${encodeURIComponent(title)}&price=${price}&color=${encodeURIComponent(color)}&sizes=${encodeURIComponent(sizes)}&image=${encodeURIComponent(image)}`;
        window.location.href = url;
      });
    });
  </script>
</body>
</html>
