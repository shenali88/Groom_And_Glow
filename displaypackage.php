<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "shenu";
$dbname = "groom&glow";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get unique package names for filter
$package_names_query = "SELECT DISTINCT package_name FROM packages";
$package_names_result = $conn->query($package_names_query);

// Handle search and filter
$where_clause = "1=1";
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $conn->real_escape_string($_GET['search']);
    $where_clause .= " AND (package_name LIKE '%$search%' OR item_name LIKE '%$search%' OR description LIKE '%$search%')";
}

if (isset($_GET['package_filter']) && !empty($_GET['package_filter'])) {
    $filter = $conn->real_escape_string($_GET['package_filter']);
    $where_clause .= " AND package_name = '$filter'";
}

// Modified query to group by package_name
$sql = "SELECT * FROM packages WHERE $where_clause ORDER BY package_name, created_at DESC";
$result = $conn->query($sql);

// Group packages by package_name
$grouped_packages = [];
while($row = $result->fetch_assoc()) {
    $package_name = $row['package_name'];
    if(!isset($grouped_packages[$package_name])) {
        $grouped_packages[$package_name] = [];
    }
    $grouped_packages[$package_name][] = $row;
}
?>

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
    <a href="displaypackage.php" class="text-yellow-600 hover:text-yellow-600">Packages</a>
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

   

        <!-- Packages Sections -->
        <?php if (!empty($grouped_packages)): ?>
            <?php foreach ($grouped_packages as $package_name => $items): ?>
                <div class="mb-10 bg-white/90 backdrop-blur-md rounded-xl p-6 shadow-md">
                    <div class="flex items-center mb-6">
                        <h2 class="text-2xl font-bold text-yellow-600"><?php echo htmlspecialchars($package_name); ?></h2>
                        <div class="ml-4 h-px bg-gradient-to-r from-yellow-300 to-transparent flex-grow"></div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <?php 
                        $delay = 0;
                        foreach ($items as $row):
                            $delay += 0.1;
                        ?>
                            <div class="animate-fade-in bg-white/90 backdrop-blur-md rounded-xl overflow-hidden shadow-lg transform transition duration-300 hover:-translate-y-1 hover:shadow-xl" style="animation-delay: <?php echo $delay; ?>s">
                                <div class="relative">
                                    <img src="<?php echo htmlspecialchars($row['image_url']); ?>" 
                                         alt="<?php echo htmlspecialchars($row['item_name']); ?>"
                                         class="w-full h-56 object-cover">
                                    <div class="absolute top-0 right-0 bg-yellow-600 text-white px-3 py-1 m-2 rounded-full text-sm">
                                        <?php echo htmlspecialchars($row['package_name']); ?>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-xl font-bold text-gray-800 mb-2">
                                        <?php echo htmlspecialchars($row['item_name']); ?>
                                    </h3>
                                    <p class="text-gray-600 mb-4">
                                        <?php echo htmlspecialchars($row['description']); ?>
                                    </p>
                                    <div class="flex items-center justify-between text-sm">
                                        <span class="text-yellow-600">
                                            <i class="far fa-calendar-alt mr-1"></i>
                                            <?php echo date('F j, Y', strtotime($row['created_at'])); ?>
                                        </span>
                                        
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                 
                    <div class="mt-8 text-center">
    <a href="javascript:void(0);" 
       class="inline-block bg-yellow-600 text-white px-8 py-3 rounded-full hover:bg-yellow-700 transition-all hover:scale-110 shadow-lg animate-pulse-slow hover:animate-none" 
       onclick="handleBooking(123)">
        <i class="fas fa-calendar-check mr-2"></i>Book This Package
    </a>
</div>

<script>
    function handleBooking(packageId) {
        <?php if (isset($_SESSION['user_id'])): ?>
            // If logged in, proceed to the booking form
            window.location.href = "bookingform.php?package_id=" + packageId;
        <?php else: ?>
            // If not logged in, show a popup message and redirect to index.php
            alert("You need to log in to book a package.");
            window.location.href = "singin.php";
        <?php endif; ?>
    }
</script>          
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="text-center py-16">
                <div class="bg-white/90 backdrop-blur-md rounded-xl p-8 max-w-md mx-auto shadow-md">
                    <i class="fas fa-box-open text-5xl text-gray-400 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">No Packages Found</h3>
                    <p class="text-gray-500">Try adjusting your search or filter criteria, or add a new package to get started.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>

    

    <!-- Floating Action Button for Mobile -->
    <div class="fixed bottom-6 right-6 md:hidden">
        <a href="add_package.php" class="bg-gradient-to-r from-purple-600 to-pink-600 text-white w-14 h-14 rounded-full flex items-center justify-center shadow-lg hover:from-purple-700 hover:to-pink-700 transition duration-300">
            <i class="fas fa-plus text-xl"></i>
        </a>
    </div>
</body>
</html>

<?php $conn->close(); ?>