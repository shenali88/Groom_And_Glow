<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    die("Access denied. Please log in.");
}

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

$sql = "SELECT * FROM packages WHERE $where_clause ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Groom & Glow Packages</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .package-card {
            transition: all 0.3s ease;
        }
        .package-card:hover {
            transform: translateY(-5px);
        }
        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-purple-100 via-pink-100 to-rose-100 min-h-screen p-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="glass-effect rounded-xl p-6 mb-8 shadow-lg">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <div>
                    <h1 class="text-3xl font-bold text-purple-800">
                        <i class="fas fa-spa mr-2"></i>Groom & Glow Packages
                    </h1>
                    <p class="text-gray-600 mt-2">Discover our exclusive beauty and wellness packages</p>
                </div>
                <a href="add_package.php" class="bg-gradient-to-r from-purple-600 to-pink-600 text-white px-6 py-3 rounded-lg hover:from-purple-700 hover:to-pink-700 transition duration-300 shadow-md">
                    <i class="fas fa-plus mr-2"></i>Add New Package
                </a>
            </div>

            <!-- Search and Filter Section -->
            <div class="mt-6">
                <form action="" method="GET" class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1">
                        <div class="relative">
                            <input type="text" name="search" placeholder="Search packages..." 
                                   value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>"
                                   class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition duration-300">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                    </div>
                    <div class="md:w-64">
                        <select name="package_filter" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition duration-300">
                            <option value="">All Packages</option>
                            <?php while($package = $package_names_result->fetch_assoc()): ?>
                                <option value="<?php echo htmlspecialchars($package['package_name']); ?>"
                                        <?php echo (isset($_GET['package_filter']) && $_GET['package_filter'] == $package['package_name']) ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($package['package_name']); ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <button type="submit" class="bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700 transition duration-300 shadow-md">
                        <i class="fas fa-filter mr-2"></i>Apply Filters
                    </button>
                </form>
            </div>
        </div>

        <!-- Packages Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            if ($result->num_rows > 0) {
                $delay = 0;
                while($row = $result->fetch_assoc()):
                    $delay += 0.1;
            ?>
                <div class="package-card fade-in glass-effect rounded-xl overflow-hidden shadow-lg" style="animation-delay: <?php echo $delay; ?>s">
                    <div class="relative">
                        <img src="<?php echo htmlspecialchars($row['image_url']); ?>" 
                             alt="<?php echo htmlspecialchars($row['item_name']); ?>"
                             class="w-full h-56 object-cover">
                        <div class="absolute top-0 right-0 bg-purple-600 text-white px-3 py-1 m-2 rounded-full text-sm">
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
                            <span class="text-purple-600">
                                <i class="far fa-calendar-alt mr-1"></i>
                                <?php echo date('F j, Y', strtotime($row['created_at'])); ?>
                            </span>
                            <button class="bg-purple-100 text-purple-600 px-4 py-2 rounded-lg hover:bg-purple-200 transition duration-300">
                                <i class="fas fa-info-circle mr-1"></i>View Details
                            </button>
                        </div>
                    </div>
                </div>
            <?php 
                endwhile;
            } else {
            ?>
                <div class="col-span-full text-center py-16">
                    <div class="glass-effect rounded-xl p-8 max-w-md mx-auto">
                        <i class="fas fa-box-open text-5xl text-gray-400 mb-4"></i>
                        <h3 class="text-xl font-semibold text-gray-700 mb-2">No Packages Found</h3>
                        <p class="text-gray-500">Try adjusting your search or filter criteria, or add a new package to get started.</p>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
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