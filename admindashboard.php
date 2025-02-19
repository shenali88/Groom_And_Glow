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

$user_id = $_SESSION['user_id'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Admin details
$first_name = "shenali";
$last_name = "imalsha";
$email = "shenali@gmail.com"; // Change to your actual admin email
$mobile_number = "0772026191"; // Change to a valid mobile number
$role = "admin";
$plain_password = "shenali@123"; // Change to a strong password

// Hash the password securely
$hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);

// Check if admin already exists
$sql_check = "SELECT id FROM register WHERE email = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("s", $email);
$stmt_check->execute();
$stmt_check->store_result();

if ($stmt_check->num_rows > 0) {
    echo ".";
} else {
    // Insert the admin user
    $sql_insert = "INSERT INTO register (first_name, last_name, email, mobile_number, role, password) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param("ssssss", $first_name, $last_name, $email, $mobile_number, $role, $hashed_password);

    if ($stmt_insert->execute()) {
        echo "Admin user added successfully.";
    } else {
        echo "Error: " . $stmt_insert->error;
    }

    $stmt_insert->close();
}

$stmt_check->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- For the performance chart -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

  <!-- Main Container -->
  <div class="flex min-h-screen">
  <!-- Sidebar -->
  <aside class="w-64 bg-yellow-600 text-gray-100 flex flex-col">
  <div class="px-6 py-4 text-xl font-bold text-white">Admin</div>
  <nav class="flex-1 px-6">
    <ul>
      <li>
        <a href="admindashboard.php" class="flex items-center py-3 text-gray-300 hover:text-white hover:bg-gray-700 rounded">
          <!-- Dashboard Icon -->
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 2.5v6.25h-5V2.5H9.75zM14.25 2.5v9.75H21v-9.75H14.25zM9.75 15v6.25h-5V15H9.75zM14.25 15v6.25H21V15H14.25z" />
          </svg>
          <span class="ml-4">Dashboard</span>
        </a>
      </li>
      <li class="relative">
        <button
          onclick="toggleDropdown('tablesDropdown')"
          class="flex items-center w-full py-3 text-gray-300 hover:text-white hover:bg-gray-700 rounded focus:outline-none">
          <!-- Table Icon -->
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 6h18M3 14h18M3 18h18" />
          </svg>
          <span class="ml-4">Tables</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </button>
        <!-- Dropdown Menu -->
        <ul id="tablesDropdown" class="hidden pl-6 mt-2 space-y-2">
          <li>
            <a href="admindashcustomer.php" class="block py-2 text-gray-300 hover:text-white hover:bg-gray-700 rounded">
              Customer
            </a>
          </li>
          <li>
            <a href="admindashsupplier.php" class="block py-2 text-gray-300 hover:text-white hover:bg-gray-700 rounded">
              Supplier
            </a>
          </li>
          <li>
            <a href="admindashtailor.php" class="block py-2 text-gray-300 hover:text-white hover:bg-gray-700 rounded">
              Tailor
            </a>
          </li>
        </ul>
      </li>
      <li>
        <a href="report.php" class="flex items-center py-3 text-gray-300 hover:text-white hover:bg-gray-700 rounded">
          <!-- Forms Icon -->
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
          </svg>
          <span class="ml-4">Genarate reports</span>
        </a>
      </li>
      <li>
        <a href="adminprofilemanage.php" class="flex items-center py-3 text-gray-300 hover:text-white hover:bg-gray-700 rounded">
          <!-- Profile Icon -->
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 0112 3.3a9 9 0 0112 4.948M5.121 17.804A9 9 0 0112 20.7m7.878-2.896A9 9 0 0112 20.7m0-17.4a3.3 3.3 0 000 6.6m0 0a3.3 3.3 0 003.3-3.3m0 0a3.3 3.3 0 00-3.3-3.3" />
          </svg>
          <span class="ml-4">Profile</span>
        </a>
      </li>
    </ul>
  </nav>
</aside>

<script>
  function toggleDropdown(id) {
    const dropdown = document.getElementById(id);
    if (dropdown.classList.contains('hidden')) {
      dropdown.classList.remove('hidden');
    } else {
      dropdown.classList.add('hidden');
    }
  }
</script>


    <!-- Main Content -->
    <div class="flex-1 p-6 space-y-6">

    
      <!-- Metrics Cards -->
      <section class="grid grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded shadow text-center">
          <h2 class="text-sm font-medium text-yellow-600">Clients</h2>
          <p class="text-3xl font-bold text-red-600">512</p>
        </div>
        <div class="bg-white p-6 rounded shadow text-center">
          <h2 class="text-sm font-medium text-yellow-600">Sales</h2>
          <p class="text-3xl font-bold text-green-600">$7,770</p>
        </div>
        <div class="bg-white p-6 rounded shadow text-center">
          <h2 class="text-sm font-medium text-yellow-600">Performance</h2>
          <p class="text-3xl font-bold text-blue-600">256%</p>
        </div>
        <div class="bg-white p-6 rounded shadow text-center">
          <h2 class="text-sm font-medium text-yellow-600">item quentity</h2>
          <p class="text-3xl font-bold text-purple-600">200</p>
        </div>
      </section>

      <!-- Performance Chart -->
      <section class="bg-white p-6 rounded shadow">
        <h2 class="text-lg font-semibold text-yellow-600 mb-4">Performance</h2>
        <canvas id="performanceChart" class="w-full"></canvas>
      </section>

    </div>
  </div>

  <!-- Chart.js Configuration -->
  <script>
    const ctx = document.getElementById('performanceChart').getContext('2d');
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['01', '02', '03', '04', '05', '06', '07', '08', '09'],
        datasets: [
          {
            label: 'Dataset 1',
            data: [100, 200, 150, 250, 220, 180, 300, 270, 310],
            borderColor: '#EF4444',
            fill: false,
          },
          {
            label: 'Dataset 2',
            data: [90, 180, 130, 240, 210, 170, 290, 260, 300],
            borderColor: '#3B82F6',
            fill: false,
          },
        ],
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            display: false,
          },
        },
      },
    });
  </script>
</body>
</html>
