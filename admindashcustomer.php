<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Customer Details</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
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
        <a href="#" class="flex items-center py-3 text-gray-300 hover:text-white hover:bg-gray-700 rounded">
          <!-- Forms Icon -->
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
          </svg>
          <span class="ml-4">Forms</span>
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

    

    <!-- Content -->
    <main class="flex-1 p-6 space-y-8">

   
        <!-- Customer Personal Details -->
        <div class="bg-white shadow-2xl rounded-lg p-6">
            <h2 class="text-4xl font-semibold text-yellow-600 mb-4 text-center">Customer Personal Details</h2>
            <div class="flex items-center space-x-4 mb-6">
          <input type="text" placeholder="Enter Customer ID" class="px-4 py-2 w-64 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
          <button class="bg-yellow-600 text-white px-6 py-2 rounded-lg hover:bg-yellow-700 transition-all duration-300 ease-in-out">Search by ID</button>
          <button class="bg-yellow-600 text-white px-6 py-2 rounded-lg hover:bg-yellow-700 transition-all duration-300 ease-in-out">View All</button>
        </div>
            <table class="min-w-full table-auto border-collapse border border-gray-300">
            <thead class="bg-gradient-to-r from-yellow-500 via-yellow-600 to-yellow-500 text-white">
                    <tr>
                        <th class="px-6 py-4 border">Customer ID</th>
                        <th class="px-6 py-4 border">First Name</th>
                        <th class="px-6 py-4 border">Last Name</th>
                        <th class="px-6 py-4 border">Email</th>
                        <th class="px-6 py-4 border">Mobile Number</th>
                        <th class="px-6 py-4 border">Wedding date</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-teal-100">
                        <td class="px-6 py-4 border">C001</td>
                        <td class="px-6 py-4 border">John</td>
                        <td class="px-6 py-4 border">Doe</td>
                        <td class="px-6 py-4 border">john.doe@example.com</td>
                        <td class="px-6 py-4 border">0773456437</td>
                        <td class="px-6 py-4 border">2025-06-15</td>
                    </tr>
                    <tr class="hover:bg-teal-100">
                        <td class="px-6 py-4 border">C002</td>
                        <td class="px-6 py-4 border">Jane</td>
                        <td class="px-6 py-4 border">Smith</td>
                        <td class="px-6 py-4 border">jane.smith@example.com</td>
                        <td class="px-6 py-4 border">0775654356</td>
                        <td class="px-6 py-4 border">2025-07-20</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Customer Item Details -->
        <div class="bg-white shadow-2xl rounded-lg p-6">
            <h2 class="text-4xl font-semibold text-yellow-600 mb-4 text-center">Customer Item Details</h2>
            <div class="flex items-center space-x-4 mb-6">
          <input type="text" placeholder="Enter Customer ID" class="px-4 py-2 w-64 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
          <button class="bg-yellow-600 text-white px-6 py-2 rounded-lg hover:bg-yellow-700 transition-all duration-300 ease-in-out">Search by ID</button>
          <button class="bg-yellow-600 text-white px-6 py-2 rounded-lg hover:bg-yellow-700 transition-all duration-300 ease-in-out">View All</button>
        </div>
            <table class="min-w-full table-auto border-collapse border border-gray-300">
            <thead class="bg-gradient-to-r from-yellow-500 via-yellow-600 to-yellow-500 text-white">
                    <tr>
                        <th class="px-6 py-4 border">Item ID</th>
                        <th class="px-6 py-4 border">Customer ID</th>
                        <th class="px-6 py-4 border">Item Name</th>
                        <th class="px-6 py-4 border">Quantity</th>
                        <th class="px-6 py-4 border">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-teal-100">
                        <td class="px-6 py-4 border">I001</td>
                        <td class="px-6 py-4 border">C001</td>
                        <td class="px-6 py-4 border">Wedding Dress</td>
                        <td class="px-6 py-4 border">1</td>
                        <td class="px-6 py-4 border">$500</td>
                    </tr>
                    <tr class="hover:bg-teal-100">
                        <td class="px-6 py-4 border">I002</td>
                        <td class="px-6 py-4 border">C002</td>
                        <td class="px-6 py-4 border">Bouquet</td>
                        <td class="px-6 py-4 border">2</td>
                        <td class="px-6 py-4 border">$80</td>
                    </tr>
                </tbody>
            </table>
        </div>

<!-- Customer Appointment Details -->
<div class="bg-white shadow-2xl rounded-lg p-6">
    <h2 class="text-4xl font-semibold text-yellow-600 mb-4 text-center">Customer Appointment Details</h2>
    <div class="flex items-center space-x-4 mb-6">
        <input type="text" placeholder="Enter Customer ID" class="px-4 py-2 w-64 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        <button class="bg-yellow-600 text-white px-6 py-2 rounded-lg hover:bg-yellow-700 transition-all duration-300 ease-in-out">Search by ID</button>
        <button class="bg-yellow-600 text-white px-6 py-2 rounded-lg hover:bg-yellow-700 transition-all duration-300 ease-in-out">View All</button>
    </div>
    <table class="min-w-full table-auto border-collapse border border-gray-300">
    <thead class="bg-gradient-to-r from-yellow-500 via-yellow-600 to-yellow-500 text-white">
            <tr>
                <th class="px-6 py-4 border">Appointment ID</th>
                <th class="px-6 py-4 border">Customer ID</th>
                <th class="px-6 py-4 border">Appointment Date</th>
                <th class="px-6 py-4 border">Time</th>
                
            </tr>
        </thead>
        <tbody>
            <tr class="hover:bg-teal-100">
                <td class="px-6 py-4 border">A001</td>
                <td class="px-6 py-4 border">C001</td>
                <td class="px-6 py-4 border">2025-05-15</td>
                <td class="px-6 py-4 border">10:00 AM</td>
            
                    
                </td>
            </tr>
            <tr class="hover:bg-teal-100">
                <td class="px-6 py-4 border">A002</td>
                <td class="px-6 py-4 border">C002</td>
                <td class="px-6 py-4 border">2025-06-05</td>
                <td class="px-6 py-4 border">2:00 PM</td>
             
                    
                </td>
            </tr>
        </tbody>
    </table>
</div>



</body>


</html>
