

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Groom & Glow</title>
    
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-800 flex flex-col min-h-screen">
    <!-- Navbar -->
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
    <a href="appoinment.php" class="text-yellow-600 hover:text-yellow-600">Appoinment</a>

   <!-- Login and Shopping Cart Icons -->
<div class="flex space-x-6 items-center">
    <!-- Login Icon -->
    <a href="singin.php" class="text-yellow-600 hover:text-yellow-700 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm0 3c-4.418 0-8 1.79-8 4v1h16v-1c0-2.21-3.582-4-8-4z" />
        </svg>
    </a>

   <!-- Shopping Cart Icon with Tooltip -->
<div class="relative group">
    <a href="cart.php" class="relative">
        <!-- Cart Icon -->
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8 text-yellow-600 hover:text-gray-700">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5H2M7 13l-2 8h12l-2-8M7 21a2 2 0 100-4 2 2 0 000 4zm10 0a2 2 0 100-4 2 2 0 000 4z" />
        </svg>
        <!-- Cart Count Badge -->
        <span id="cart-count" class="absolute top-0 right-0 -mt-2 -mr-2 bg-red-500 text-white text-xs font-bold rounded-full px-2 hidden">0</span>
    </a>
    <!-- Tooltip -->
    <span class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden group-hover:block bg-gray-800 text-white text-xs rounded py-1 px-2 whitespace-nowrap">
        Check your cart
    </span>
</div>
        <!-- Cart Count Badge -->
        <span id="cart-count" class="absolute top-0 right-0 -mt-2 -mr-2 bg-red-500 text-white text-xs font-bold rounded-full px-2 hidden">0</span>
    </a>
        <!-- Profile Icon -->
        <div class="relative group">
            <a href="cutomerdash.php" class="text-yellow-600 hover:text-gray-700 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm0 3c-4.418 0-8 1.79-8 4v1h16v-1c0-2.21-3.582-4-8-4z" />
                </svg>
            </a>
            <!-- Tooltip -->
            <span class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden group-hover:block bg-gray-800 text-white text-xs rounded py-1 px-2 whitespace-nowrap">
                Check your profile
            </span>
</div>


        </div>
        <form method="post" action="logout.php">
    <button type="submit" name="logout" class="bg-yellow-600 text-white text-lg font-semibold py-2 px-4 rounded-lg hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-600 transition transform hover:scale-105 active:scale-95">
        Logout
    </button>
</form>

        
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




    <!-- Main Content -->
    <main class="flex-grow">
        <!-- Hero Section -->
        <section class="relative">
            <div class="bg-cover bg-center h-[500px]" 
                 style="background-image: url('background.jpg');">
                <div class="bg-black bg-opacity-50 h-full flex items-center justify-center">
                    <div class="text-center text-white">
                        <h2 class="text-5xl font-bold mb-4">Your Perfect Day Begins Here</h2>
                        <p class="text-lg mb-6">
                            Explore our elegant collection of wedding essentials, crafted to make your special day unforgettable.
                        </p>
                        
                    </div>
                </div>
            </div>
        </section>

        
    <!-- Heading -->
    <h2 class="text-4xl font-bold text-yellow-600 mb-6 text-center">Featured Product</h2>

   
        <!-- Product List Section -->
  <div id="product-list" class="grid grid-cols-4 gap-6 p-6">
    <!-- Product Card 1 -->
    <div 
      class="card block bg-white shadow-lg rounded-lg overflow-hidden transform transition hover:scale-105 cursor-pointer"
      data-id="1"
      data-title="Fishtail Wedding Frock"
      data-price="5900"
      data-color="White"
      data-sizes="UK8,UK10,UK12,UK14,UK16"
      data-image="https://th.bing.com/th/id/OIP.VLuKSkj_4lDEJqtTnQP2WgHaJQ?w=768&h=960&rs=1&pid=ImgDetMain">
      <img src="https://th.bing.com/th/id/OIP.VLuKSkj_4lDEJqtTnQP2WgHaJQ?w=768&h=960&rs=1&pid=ImgDetMain" 
           alt="Product 1" class="w-full h-64 object-cover">
      <div class="p-4">
        <h3 class="text-lg font-bold text-gray-800">Fishtail Wedding Frock</h3>
        <p class="text-sm text-gray-500">White</p>
        <div class="mt-2 text-lg text-gray-800 font-semibold">Rs. 15,900</div>
      </div>
    </div>

    <div 
      class="card block bg-white shadow-lg rounded-lg overflow-hidden transform transition hover:scale-105 cursor-pointer"
      data-id="1"
      data-title="Groom Suit"
      data-price="10000"
      data-color="Navy Blue"
      data-sizes="UK8,UK10,UK12,UK14,UK16"
      data-image="groom.jpg">
      <img src="groom.jpg" 
           alt="Product 1" class="w-full h-64 object-cover">
      <div class="p-4">
        <h3 class="text-lg font-bold text-gray-800">Groom Suit</h3>
        <p class="text-sm text-gray-500">Navy Blue</p>
        <div class="mt-2 text-lg text-gray-800 font-semibold">Rs. 10,000</div>
      </div>
    </div>


                    <div 
      class="card block bg-white shadow-lg rounded-lg overflow-hidden transform transition hover:scale-105 cursor-pointer"
      data-id="1"
      data-title="White Flowe Boquuet"
      data-price="5900"
      data-color="White"
      data-sizes="UK8,UK10,UK12,UK14,UK16"
      data-image="flower.jpg">
      <img src="flower.jpg" 
           alt="Product 1" class="w-full h-64 object-cover">
      <div class="p-4">
        <h3 class="text-lg font-bold text-gray-800">White Flowe Boquuet</h3>
        <p class="text-sm text-gray-500">White</p>
        <div class="mt-2 text-lg text-gray-800 font-semibold">Rs. 5,900</div>
      </div>
    </div>


                     <div 
      class="card block bg-white shadow-lg rounded-lg overflow-hidden transform transition hover:scale-105 cursor-pointer"
      data-id="1"
      data-title="Pearl Necklace"
      data-price="3000"
      data-color="white"
      data-sizes="UK8,UK10,UK12,UK14,UK16"
      data-image="jew.jpg">
      <img src="jew.jpg" 
           alt="Product 1" class="w-full h-64 object-cover">
      <div class="p-4">
        <h3 class="text-lg font-bold text-gray-800">Pearl Necklace</h3>
        <p class="text-sm text-gray-500">white</p>
        <div class="mt-2 text-lg text-gray-800 font-semibold">Rs. 3,000</div>
      </div>
    </div>


                     <div 
      class="card block bg-white shadow-lg rounded-lg overflow-hidden transform transition hover:scale-105 cursor-pointer"
      data-id="1"
      data-title="Red Wedding Dress"
      data-price="20000"
      data-color="Red"
      data-sizes="UK8,UK10,UK12,UK14,UK16"
      data-image="https://th.bing.com/th/id/OIP.Utf9KGtVmcgmhZFJr3lDJQAAAA?rs=1&pid=ImgDetMain">
      <img src="https://th.bing.com/th/id/OIP.Utf9KGtVmcgmhZFJr3lDJQAAAA?rs=1&pid=ImgDetMain" 
           alt="Product 1" class="w-full h-64 object-cover">
      <div class="p-4">
        <h3 class="text-lg font-bold text-gray-800">Red Wedding Dress</h3>
        <p class="text-sm text-gray-500">Red</p>
        <div class="mt-2 text-lg text-gray-800 font-semibold">Rs. 20,000</div>
      </div>
    </div>


                     <div 
      class="card block bg-white shadow-lg rounded-lg overflow-hidden transform transition hover:scale-105 cursor-pointer"
      data-id="1"
      data-title="Black Groom Suit"
      data-price="10000"
      data-color="Black"
      data-sizes="UK8,UK10,UK12,UK14,UK16"
      data-image="https://th.bing.com/th/id/R.732480adc6ef51693775a2e3c62f248b?rik=thO0gjAV3TUYjg&riu=http%3a%2f%2fwww.dhresource.com%2falbu_789298256_00-1.0x0%2fnew-arrival-handsome-black-one-button-groom.jpg&ehk=YGGrLIWhoY%2fyZtuiNdihltHfgPuk4cRAow2U9Y8hTLc%3d&risl=&pid=ImgRaw&r=0">
      <img src="https://th.bing.com/th/id/R.732480adc6ef51693775a2e3c62f248b?rik=thO0gjAV3TUYjg&riu=http%3a%2f%2fwww.dhresource.com%2falbu_789298256_00-1.0x0%2fnew-arrival-handsome-black-one-button-groom.jpg&ehk=YGGrLIWhoY%2fyZtuiNdihltHfgPuk4cRAow2U9Y8hTLc%3d&risl=&pid=ImgRaw&r=0" 
           alt="Product 1" class="w-full h-64 object-cover">
      <div class="p-4">
        <h3 class="text-lg font-bold text-gray-800">Black Groom Suit</h3>
        <p class="text-sm text-gray-500">Black</p>
        <div class="mt-2 text-lg text-gray-800 font-semibold">Rs. 10,000</div>
      </div>
    </div>


                     <div 
      class="card block bg-white shadow-lg rounded-lg overflow-hidden transform transition hover:scale-105 cursor-pointer"
      data-id="1"
      data-title="Red Flower Bouquet"
      data-price="5900"
      data-color="Red"
      data-sizes="UK8,UK10,UK12,UK14,UK16"
      data-image="https://th.bing.com/th/id/OIP.gan89YVups2RCQIr96fuRAAAAA?rs=1&pid=ImgDetMain">
      <img src="https://th.bing.com/th/id/OIP.gan89YVups2RCQIr96fuRAAAAA?rs=1&pid=ImgDetMain" 
           alt="Product 1" class="w-full h-64 object-cover">
      <div class="p-4">
        <h3 class="text-lg font-bold text-gray-800">Red Flower Bouquet</h3>
        <p class="text-sm text-gray-500">Red</p>
        <div class="mt-2 text-lg text-gray-800 font-semibold">Rs. 5,900</div>
      </div>
    </div>

                     <div 
      class="card block bg-white shadow-lg rounded-lg overflow-hidden transform transition hover:scale-105 cursor-pointer"
      data-id="1"
      data-title="Pearl Neckles"
      data-price="5000"
      data-color="White"
      data-sizes="UK8,UK10,UK12,UK14,UK16"
      data-image="https://i.pinimg.com/originals/34/1b/d0/341bd01885053ab83f1c6e581c1b4a21.jpg">
      <img src="https://i.pinimg.com/originals/34/1b/d0/341bd01885053ab83f1c6e581c1b4a21.jpg" 
           alt="Product 1" class="w-full h-64 object-cover">
      <div class="p-4">
        <h3 class="text-lg font-bold text-gray-800">Pearl Neckles</h3>
        <p class="text-sm text-gray-500">White</p>
        <div class="mt-2 text-lg text-gray-800 font-semibold">Rs. 5,000</div>
      </div>
    </div>


                      <div 
      class="card block bg-white shadow-lg rounded-lg overflow-hidden transform transition hover:scale-105 cursor-pointer"
      data-id="1"
      data-title="White Long Frock"
      data-price="20000"
      data-color="White"
      data-sizes="UK8,UK10,UK12,UK14,UK16"
      data-image="https://th.bing.com/th/id/OIP.31lQ0e32Lvc1aEbIV8ffGwHaKm?w=500&h=716&rs=1&pid=ImgDetMain">
      <img src="https://th.bing.com/th/id/OIP.31lQ0e32Lvc1aEbIV8ffGwHaKm?w=500&h=716&rs=1&pid=ImgDetMain" 
           alt="Product 1" class="w-full h-64 object-cover">
      <div class="p-4">
        <h3 class="text-lg font-bold text-gray-800">White Long Frock</h3>
        <p class="text-sm text-gray-500">White</p>
        <div class="mt-2 text-lg text-gray-800 font-semibold">Rs. 20,000</div>
      </div>
    </div>

                      <div 
      class="card block bg-white shadow-lg rounded-lg overflow-hidden transform transition hover:scale-105 cursor-pointer"
      data-id="1"
      data-title="Broun Groom Suit"
      data-price="15000"
      data-color="Brown"
      data-sizes="UK8,UK10,UK12,UK14,UK16"
      data-image="https://i.pinimg.com/originals/31/2e/18/312e18900efa6aef28eef72ad4714772.jpg">
      <img src="https://i.pinimg.com/originals/31/2e/18/312e18900efa6aef28eef72ad4714772.jpg" 
           alt="Product 1" class="w-full h-64 object-cover">
      <div class="p-4">
        <h3 class="text-lg font-bold text-gray-800">Broun Groom Suit</h3>
        <p class="text-sm text-gray-500">Brown</p>
        <div class="mt-2 text-lg text-gray-800 font-semibold">Rs. 15,000</div>
      </div>
    </div>

                   <div 
      class="card block bg-white shadow-lg rounded-lg overflow-hidden transform transition hover:scale-105 cursor-pointer"
      data-id="1"
      data-title="White Flower Boquet"
      data-price="3000"
      data-color="White"
      data-sizes="UK8,UK10,UK12,UK14,UK16"
      data-image="https://i.pinimg.com/736x/2c/4f/2b/2c4f2b073c82117641c4660b4934cd4c.jpg">
      <img src="https://i.pinimg.com/736x/2c/4f/2b/2c4f2b073c82117641c4660b4934cd4c.jpg" 
           alt="Product 1" class="w-full h-64 object-cover">
      <div class="p-4">
        <h3 class="text-lg font-bold text-gray-800">White Flower Boquet</h3>
        <p class="text-sm text-gray-500">White</p>
        <div class="mt-2 text-lg text-gray-800 font-semibold">Rs. 3,000</div>
      </div>
    </div>

               <div 
      class="card block bg-white shadow-lg rounded-lg overflow-hidden transform transition hover:scale-105 cursor-pointer"
      data-id="1"
      data-title="Silwer jewelary set"
      data-price="12000"
      data-color="Silver"
      data-sizes="UK8,UK10,UK12,UK14,UK16"
      data-image="https://th.bing.com/th/id/OIP.aM55kNTwTb6qgaYh_EeS8QAAAA?rs=1&pid=ImgDetMain">
      <img src="https://th.bing.com/th/id/OIP.aM55kNTwTb6qgaYh_EeS8QAAAA?rs=1&pid=ImgDetMain" 
           alt="Product 1" class="w-full h-64 object-cover">
      <div class="p-4">
        <h3 class="text-lg font-bold text-gray-800">Silwer jewelary set</h3>
        <p class="text-sm text-gray-500">Silver</p>
        <div class="mt-2 text-lg text-gray-800 font-semibold">Rs. 12,000</div>
      </div>
    </div>
        </section>
    </main>
<!-- Packages Section -->
<section id="packages" class="text-yellow-600 py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-yellow-600 text-center mb-8">Wedding Packages</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white shadow-md rounded p-6">
                    <h3 class="text-2xl font-bold mb-4">Bride Package</h3>
                    <ul class="text-yellow-600 mb-4">
                        <li>- Wedding dress</li>
                        <li>- Jewelry set</li>
                        <li>- Accessories</li>
                    </ul>
                    <p class="text-yellow-600 font-bold">10% Off</p>
                </div>
                <div class="bg-white shadow-md rounded p-6">
                    <h3 class="text-2xl font-bold mb-4">Groom Package</h3>
                    <ul class="text-yellow-600 mb-4">
                        <li>- Tailored suit</li>
                        <li>- Shoes</li>
                        <li>- Accessories</li>
                    </ul>
                    <p class="text-yellow-600 font-bold">10% Off</p>
                </div>
                <div class="bg-white shadow-md rounded p-6">
                    <h3 class="text-2xl font-bold mb-4">Bride & Groom Combo</h3>
                    <ul class="text-yellow-600 mb-4">
                        <li>- Complete bride & groom packages</li>
                        <li>- Personalized fitting sessions</li>
                    </ul>
                    <p class="text-yellow-600 font-bold">25% Off</p>
                </div>
            </div>
        </div>
    </section>

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

    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- About Us -->
            <div>
                <h4 class="text-xl font-bold text-gold-500 mb-4">About Groom & Glow</h4>
                <p class="text-gray-300">
                    Groom & Glow brings elegance and simplicity to your wedding planning. Shop premium wedding attire, jewelry, and bouquets, all designed to make your day unforgettable.
                </p>
            </div>
    
            <!-- Quick Links -->
            <div>
                <h4 class="text-xl font-bold text-gold-500 mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-300 hover:text-gold-500">Home</a></li>
                    <li><a href="#products" class="text-gray-300 hover:text-gold-500">Shop</a></li>
                    <li><a href="#packages" class="text-gray-300 hover:text-gold-500">Packages</a></li>
                    <li><a href="#contact" class="text-gray-300 hover:text-gold-500">Contact</a></li>
                    <li><a href="#faq" class="text-gray-300 hover:text-gold-500">FAQ</a></li>
                </ul>
            </div>
    
            <!-- Newsletter -->
            <div>
                <h4 class="text-xl font-bold text-gold-500 mb-4">Stay Updated</h4>
                <p class="text-gray-300 mb-4">
                    Subscribe to our newsletter for the latest updates, special offers, and wedding tips.
                </p>
                <form class="flex">
                    <input type="email" placeholder="Enter your email" 
                           class="w-full px-4 py-2 rounded-l-lg text-gray-800 focus:outline-none">
                    <button type="submit" class="bg-gold-500 px-6 py-2 rounded-r-lg text-white hover:bg-gold-600">
                        Subscribe
                    </button>
                </form>
            </div>
    
            <!-- Contact Us -->
            <div>
                <h4 class="text-xl font-bold text-gold-500 mb-4">Contact Us</h4>
                <ul class="space-y-2 text-gray-300">
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" 
                             class="inline w-5 h-5 mr-2 text-gold-500" viewBox="0 0 24 24">
                            <path d="M20 2H4a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM7 6h10v2H7V6zm13 14H4V4h16v16z"/>
                        </svg>
                        info@groomandglow.com
                    </li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" 
                             class="inline w-5 h-5 mr-2 text-gold-500" viewBox="0 0 24 24">
                            <path d="M2 6.38v10.17C2 20.74 5.74 23 11.97 23c6.22 0 9.96-2.26 9.96-6.45V6.38C21.93 2.23 18.18 0 11.97 0 5.75 0 2 2.23 2 6.38zm10 12.04c-2.74 0-5.04-.49-5.82-1.24-.53-.5-.69-1.03-.64-1.6.13-.95.94-1.6 2.64-1.72.43.43.93.83 1.52 1.13.56.28 1.2.44 1.87.44s1.31-.16 1.87-.44c.59-.3 1.09-.7 1.52-1.13 1.7.12 2.51.77 2.64 1.72.05.58-.11 1.1-.64 1.6-.78.75-3.08 1.24-5.82 1.24zm4.98-4.6c-.86.52-1.8.85-2.85.95-1.04.11-2.1.05-3.11-.16a9.93 9.93 0 0 1-2.68-1.02c-.79-.43-1.41-.9-1.87-1.39a6.95 6.95 0 0 1-1.26-1.93c-.34-.72-.5-1.48-.5-2.26 0-1.7.66-3.21 1.77-4.26.75-.73 1.68-1.31 2.73-1.7C11.11 4.03 13.6 4 15 4c1.12 0 2.13.17 3.07.5 1.02.37 1.94.91 2.73 1.62.73.65 1.31 1.42 1.71 2.3.38.85.59 1.75.6 2.69-.02.76-.17 1.48-.5 2.13-.4.77-.95 1.42-1.62 1.93-.5.38-1.06.7-1.66.96z"/>
                        </svg>
                        +1 (234) 567-890
                    </li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" 
                             class="inline w-5 h-5 mr-2 text-gold-500" viewBox="0 0 24 24">
                            <path d="M3 9.222v11.25c0 .74.603 1.334 1.344 1.334h15.312A1.335 1.335 0 0 0 21 20.472V9.222a.333.333 0 0 0-.322-.322h-5.12a.333.333 0 0 1-.322-.322v-2.53a.333.333 0 0 0-.323-.323H8.808a.333.333 0 0 0-.323.323v2.53a.333.333 0 0 1-.322.322H3.322a.333.333 0 0 0-.322.322zm11.666 4.5h-3.334a1.002 1.002 0 0 0 0 2.004h3.334a1.002 1.002 0 0 0 0-2.004z"/>
                        </svg>
                        123 Bridal Lane, Wedding City, WC 45678
                    </li>
                </ul>
            </div>
        </div>
    
        <div class="border-t mt-8 pt-4 text-center">
            <p class="text-sm text-gray-400">© 2024 Groom & Glow. All Rights Reserved. | Designed with❤️</p>
        </div>
    </footer>
    
    
    </body>
    </html>
    