<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Groom & Glow</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex">
  <!-- Main Container -->
  <div class="flex flex-1 w-full">
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

    <!-- Profile Card & Main Content -->
    <div class="flex-1 p-6 flex flex-col">
      <!-- Profile Card -->
      <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col justify-between mb-6">
        
        <div class="flex flex-col items-center text-center">
          <!-- Profile picture with larger rectangular shape -->
          <img src="https://i.pinimg.com/originals/a7/66/92/a766923c29305a16ce461b2ae54f4c68.jpg"
            alt="Profile"
            class="w-48 h-64 mb-4 object-cover rounded-lg">
          <h2 class="text-xl text-yellow-500 font-semibold">Admin</h2>
          <p class="text-yellow-500">admin@123.com</p>
          <p class="text-yellow-500">Mahragama,Colombo</p>
          <div class="flex space-x-4 mt-4">
            <button class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-500">Connect</button>
            <button class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-500">Message</button>
          </div>
        </div>
        <div class="mt-6">
          <h3 class="text-lg font-semibold mb-2 text-yellow-600">Profile Photo</h3>
          <label for="profile-photo" class="border border-yello-600 bg-yellow-600 text-white p-2 rounded cursor-pointer">
            Upload
            <input type="file" id="profile-photo" class="hidden">
          </label>
          <p class="text-sm text-gray-500 mt-1 ">JPG, GIF, or PNG. Max size of 800KB.</p>
        </div>
      </div>

      <!-- Full Page Form Section -->
      <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col justify-between flex-1">
        <h2 class="text-xl font-semibold mb-4 text-yellow-600">General Information</h2>
        <form class="space-y-4">
          <div class="grid md:grid-cols-2 gap-4">
            <div>
              <label for="first_name" class="block text-sm font-medium text-yellow-600">First Name</label>
              <input type="text" id="first_name" name="first_name" value="John" class="input-field">
            </div>
            <div>
              <label for="last_name" class="block text-sm font-medium text-yellow-600">Last Name</label>
              <input type="text" id="last_name" name="last_name" value="Doe" class="input-field">
            </div>
          </div>
          <div class="grid md:grid-cols-2 gap-4">
            <div>
              <label for="date_of_birth" class="block text-sm font-medium text-yellow-600">Date of Birth</label>
              <input type="date" id="date_of_birth" name="date_of_birth" value="1990-01-01" class="input-field">
            </div>
            <div>
              <label for="gender" class="block text-sm font-medium text-yellow-600">Gender</label>
              <select id="gender" name="gender" class="input-field text-yellow-600">
                <option value="" disabled>Gender</option>
                <option value="male" selected>Male</option>
                <option value="female">Female</option>
              </select>
            </div>
          </div>
          <div>
            <label for="email" class="block text-sm font-medium text-yellow-600">Email</label>
            <input type="email" id="email" name="email" value="john.doe@example.com" class="input-field">
          </div>
          <div>
            <label for="phone" class="block text-sm font-medium text-yellow-600">Phone</label>
            <input type="text" id="phone" name="phone" value="0772026191" class="input-field">
          </div>
          <div class="grid md:grid-cols-4 gap-4">
            <div class="col-span-3">
              <label for="address" class="block text-sm font-medium text-yellow-600">Address</label>
              <input type="text" id="address" name="address" value="Maharagama Colombo" class="input-field">
            </div>
            <div>
              <label for="address_number" class="block text-sm font-medium text-yellow-600">Number</label>
              <input type="text" id="address_number" name="address_number" value="456" class="input-field">
            </div>
          </div>
          <div class="grid md:grid-cols-2 gap-4">
            <div>
              <label for="city" class="block text-sm font-medium text-yellow-600">City</label>
              <input type="text" id="city" name="city" value="Maharagama" class="input-field">
            </div>
            <div>
              <label for="zip" class="block text-sm font-medium text-yellow-600">ZIP</label>
              <input type="text" id="zip" name="zip" value="10001" class="input-field">
            </div>
          </div>
          <button type="button" class="bg-yellow-600 text-white rounded px-4 py-2 hover:bg-yellow-600">
            Save All
          </button>
          <button type="button" class="bg-yellow-600 text-white rounded px-4 py-2 hover:bg-yellow-600">
            Delete All
          </button>
        </form>
      </div>
    </div>
  </div>

  <style>
    .input-field {
      border: 1px solid #d1d5db;
      border-radius: 0.375rem;
      padding: 0.5rem;
      width: 100%;
      outline: none;
      transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .input-field:focus {
      border-color: #2563eb;
      box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.3);
    }
  </style>
</body>

</html>
