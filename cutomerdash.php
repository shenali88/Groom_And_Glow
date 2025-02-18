<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "shenu";
$dbname = "groom&glow";

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    die("Access denied. Please log in.");
}

$customer_id = $_SESSION['user_id']; // Get the logged-in customer ID

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch confirmed appointments for the logged-in customer
$sql = "SELECT appointment_id, customer_id, first_name, last_name, email, date, time, confirmation 
        FROM customer_appointment 
        WHERE customer_id = ? AND confirmation = 'confirmed'";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $customer_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-yellow-600 text-gray-100 flex flex-col">
        <div class="px-6 py-4 text-xl font-bold text-white">Customer</div>
        <nav class="flex-1 px-6">
            <ul>
                <li>
                    <a href="customerdash.php" class="flex items-center py-3 text-gray-300 hover:text-white hover:bg-gray-700 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 2.5v6.25h-5V2.5H9.75zM14.25 2.5v9.75H21v-9.75H14.25zM9.75 15v6.25h-5V15H9.75zM14.25 15v6.25H21V15H14.25z" />
                        </svg>
                        <span class="ml-4">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="customerprofilemanage.php" class="flex items-center py-3 text-gray-300 hover:text-white hover:bg-gray-700 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 0112 3.3a9 9 0 0112 4.948M5.121 17.804A9 9 0 0112 20.7m7.878-2.896A9 9 0 0112 20.7m0-17.4a3.3 3.3 0 000 6.6m0 0a3.3 3.3 0 003.3-3.3m0 0a3.3 3.3 0 00-3.3-3.3" />
                        </svg>
                        <span class="ml-4">Profile</span>
                    </a>
                </li>
            </ul>
            <form method="post" action="logout.php">
                <button type="submit" name="logout" class="bg-yellow-900 text-white text-lg font-semibold py-2 px-4 rounded-lg hover:bg-yellow-800 focus:outline-none focus:ring-2 focus:ring-yellow-600 transition transform hover:scale-105 active:scale-95">
                    Logout
                </button>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 space-y-6">
        <!-- Confirmed Appointments -->
        <div class="bg-white shadow-2xl rounded-lg p-6">
            <h2 class="text-4xl font-semibold text-yellow-600 mb-4 text-center">Confirmed Appointments</h2>
            <table class="min-w-full table-auto border-collapse border border-gray-300">
                <thead class="bg-gradient-to-r from-yellow-500 via-yellow-600 to-yellow-500 text-white">
                    <tr>
                        <th class="px-6 py-4 border">Appointment ID</th>
                        <th class="px-6 py-4 border">Customer ID</th>
                        <th class="px-6 py-4 border">First Name</th>
                        <th class="px-6 py-4 border">Last Name</th>
                        <th class="px-6 py-4 border">Email</th>
                        <th class="px-6 py-4 border">Date</th>
                        <th class="px-6 py-4 border">Time</th>
                        <th class="px-6 py-4 border">Confirmation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td class='px-6 py-4 border text-center'>" . $row['appointment_id'] . "</td>";
                            echo "<td class='px-6 py-4 border text-center'>" . $row['customer_id'] . "</td>";
                            echo "<td class='px-6 py-4 border text-center'>" . $row['first_name'] . "</td>";
                            echo "<td class='px-6 py-4 border text-center'>" . $row['last_name'] . "</td>";
                            echo "<td class='px-6 py-4 border text-center'>" . $row['email'] . "</td>";
                            echo "<td class='px-6 py-4 border text-center'>" . $row['date'] . "</td>";
                            echo "<td class='px-6 py-4 border text-center'>" . $row['time'] . "</td>";
                            echo "<td class='px-6 py-4 border text-center text-green-600 font-semibold'>" . ucfirst($row['confirmation']) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8' class='px-6 py-4 border text-center text-gray-500'>No confirmed appointments</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
            
            <!-- Go Back Button moved inside the table container with less margin -->
            <div class="flex justify-center mt-4">
                <a href="index.php" class="bg-yellow-600 text-white text-lg font-semibold py-3 px-8 rounded-lg hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 transition transform hover:scale-105 active:scale-95 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                    </svg>
                    Go Back to Home
                </a>
            </div>
        </div>
    </main>
</div>

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
</body>
</html>

<?php
// Close connection
$conn->close();
?>