<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>customerdash</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<!-- Main Container -->
<div class="flex min-h-screen">
  <!-- Sidebar -->
<aside class="w-64 bg-yellow-600 text-gray-100 flex flex-col">
  <div class="px-6 py-4 text-xl font-bold text-white">Customer</div>
  <nav class="flex-1 px-6">
    <ul>
      <li>
        <a href="cutomerdash.php" class="flex items-center py-3 text-gray-300 hover:text-white hover:bg-gray-700 rounded">
          <!-- Dashboard Icon -->
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 2.5v6.25h-5V2.5H9.75zM14.25 2.5v9.75H21v-9.75H14.25zM9.75 15v6.25h-5V15H9.75zM14.25 15v6.25H21V15H14.25z" />
          </svg>
          <span class="ml-4">Dashboard</span>
        </a>
      </li>
      
      
        <a href="customerprofilemanage.php" class="flex items-center py-3 text-gray-300 hover:text-white hover:bg-gray-700 rounded">
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



    

    <!-- Content -->
    <main class="flex-1 p-6 space-y-8">

   <!-- Confirmed Appointments -->
   <div class="bg-white shadow-2xl rounded-lg p-6">
            <h2 class="text-4xl font-semibold text-yellow-600 mb-4 text-center">Confirmed Appointments</h2>
            <table class="min-w-full table-auto border-collapse border border-gray-300">
            <thead class="bg-gradient-to-r from-yellow-500 via-yellow-600 to-yellow-500 text-white">
                <tr>
                <th class="px-6 py-4 border">Appointment ID</th>
                <th class="px-6 py-4 border">Customer ID</th>
                <th class="px-6 py-4 border">Appointment Date</th>
                <th class="px-6 py-4 border">Time</th>
                <th class="px-6 py-4 border">Tailor ID</th>
                <th class="px-6 py-4 border">massage</th>
            </tr>
        </thead>
        <tbody>
            <tr class="hover:bg-teal-100">
                <td class="px-6 py-4 border">AP001</td>
                <td class="px-6 py-4 border">C001</td>
                <td class="px-6 py-4 border">2025-01-20</td>
                <td class="px-6 py-4 border">09:30 AM</td>
                <td class="px-6 py-4 border">TL001</td>
                <td class="px-6 py-4 border"> your appoinment id Confirmed </td>
                    
               
            </tr>
           
          
    </main>
</div>

</body>

</html>