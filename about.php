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

  <!-- Hero Section -->
  <section class="relative bg-cover bg-center" style="background-image: url('https://www.sassandgrace.co.uk/wp-content/uploads/2022/02/Sass__Grace_Wedding_Dress_Bridal_Boutique_Mirror_Bride_24-hero.jpg'); height: 50vh;">
    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
          </div>
  </section>

  <!-- About Us Content -->
  <section class="py-16 px-6 md:px-12 lg:px-24">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
      <!-- Left Content -->
      <div class="space-y-6">
        <h3 class="text-3xl font-bold text-yellow-600">Who We Are</h3>
        <p class="text-gray-600 leading-relaxed">
        Welcome to Groom & Glow, your ultimate destination for all things wedding and celebration. We specialize in offering a curated selection of wedding and party attire, exquisite flower bouquets, and stunning jewelry to make your special moments unforgettable. Whether you're planning the perfect wedding or attending a glamorous event, Groom & Glow is here to ensure you shine at every step.

At Groom & Glow, we believe that every love story is unique, and so should be the journey to celebrate it. That’s why we provide a seamless shopping experience, allowing you to explore our wide range of elegant products for both brides and grooms. Our customizable wedding packages are designed to suit your preferences and budget, helping you bring your dream wedding to life effortlessly.

With a commitment to quality and customer satisfaction, we aim to make your shopping journey as memorable as the events you’re preparing for. From timeless designs to modern trends, our collection is curated to reflect your style and elevate your wedding experience.

Let Groom & Glow be your trusted partner in creating magical moments. Together, we’ll make your special day as radiant and unforgettable as your love story.
        </p>
        <p class="text-gray-600 leading-relaxed">
          Our experts are passionate about creating personalized experiences, whether it's a grand celebration or an intimate gathering. With years of experience and a deep understanding of wedding trends, we turn your dreams into reality.
        </p>
        
      </div>
      
      <div class="relative w-full overflow-hidden">
  <button class="absolute left-0 top-1/2 transform -translate-y-1/2 text-white bg-black bg-opacity-50 p-3 rounded-full" onclick="moveCarousel(-1)">
    &#10094;
  </button>
  <div class="carousel flex transition-transform duration-500 ease-in-out">
    <img src="https://media.istockphoto.com/id/1424745819/photo/close-up-hands-of-woman-seamstress-tailor-dressmaker-designer-wedding-dress-sews-beads-to.jpg?s=612x612&w=0&k=20&c=P5nmL25n-aPCy8PdRihDLMjs2heMrGqWydGOvY-mOog="  alt="Image 1" class="w-full flex-shrink-0" />
    <img src="https://www.nuptials.ph/wp-content/uploads/2023/12/wedding-boquet-of-bride-min.jpg" alt="Image 3" class="w-full flex-shrink-0" />
    <img src="https://www.vanswedenjewelers.com/cdn/shop/articles/best_men_s_wedding_bands.jpg?v=1679933932" alt="Image 3" class="w-full flex-shrink-0" />
    <img src="https://cdn.shopify.com/s/files/1/0023/1512/4788/files/jewellery_box_480x480.png?v=1689652861" alt="Image 3" class="w-full flex-shrink-0" />
    <img src="https://image.made-in-china.com/2f0j00mclbiCHaZYry/Sexy-Sequin-Party-Clothes-Fashionable-Style-and-Temperament-for-Spring-and-Summer-It-Features-a-Backless-Design-and-a-Figure-Hugging-Short-Dress.jpg" alt="Image 3" class="w-full flex-shrink-0" />
    <!-- Add more images here -->
  </div>
  <button class="absolute right-0 top-1/2 transform -translate-y-1/2 text-white bg-black bg-opacity-50 p-3 rounded-full" onclick="moveCarousel(1)">
    &#10095;
  </button>
</div>


    </div>
  </section>

  <!-- Values Section -->
  <section class="bg-gray-100 py-16 px-6 md:px-12 lg:px-24">
    <div class="container mx-auto">
      <h3 class="text-center text-3xl font-bold text-yellow-600 mb-8">Our Core Values</h3>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Value 1 -->
        <div class="text-center">
          <div class="text-5xl text-yellow-600 mb-4">🎨</div>
          <h4 class="text-xl font-semibold text-gray-800">Creativity</h4>
          <p class="text-gray-600 mt-2">
            We design unique weddings tailored to your style and personality.
          </p>
        </div>
        <!-- Value 2 -->
        <div class="text-center">
          <div class="text-5xl text-yellow-600 mb-4">🌟</div>
          <h4 class="text-xl font-semibold text-gray-800">Excellence</h4>
          <p class="text-gray-600 mt-2">
            Attention to detail and flawless execution define our approach.
          </p>
        </div>
        <!-- Value 3 -->
        <div class="text-center">
          <div class="text-5xl text-yellow-600 mb-4">❤️</div>
          <h4 class="text-xl font-semibold text-gray-800">Passion</h4>
          <p class="text-gray-600 mt-2">
            We’re passionate about making your wedding unforgettable.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
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
<script>
let index = 0;

function moveCarousel(direction) {
  const carousel = document.querySelector('.carousel');
  const totalImages = document.querySelectorAll('.carousel img').length;
  index = (index + direction + totalImages) % totalImages;
  carousel.style.transform = `translateX(-${index * 100}%)`;
}
setInterval(() => {
  moveCarousel(1);
}, 3000); 

    </script>
</html>
