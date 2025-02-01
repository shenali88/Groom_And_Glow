<?php
ob_start(); // Start output buffering at the very top

// Include the database connection file
include('connection.php');

// Initialize error messages for each field
$first_name_err = $last_name_err = $email_err = $mobile_number_err = $password_err = $confirm_password_err = $role_err = "";
$first_name = $last_name = $email = $mobile_number = $password = $confirmPassword = $role = "";
$formIsValid = true;

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize form data
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $mobile_number = trim($_POST['mobile_number']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    $role = trim($_POST['role']);

// Validate first name (only letters)
if (empty($first_name)) {
    $first_name_err = "First Name is required.";
    $formIsValid = false;
} elseif (!preg_match("/^[a-zA-Z]+$/", $first_name)) {
    $first_name_err = "First Name should only contain letters.";
    $formIsValid = false;
}

// Validate last name (only letters)
if (empty($last_name)) {
    $last_name_err = "Last Name is required.";
    $formIsValid = false;
} elseif (!preg_match("/^[a-zA-Z]+$/", $last_name)) {
    $last_name_err = "Last Name should only contain letters.";
    $formIsValid = false;
}
    // Validate email
    if (empty($email)) {
        $email_err = "Email Address is required.";
        $formIsValid = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_err = "Invalid email format.";
        $formIsValid = false;
    }

    // Validate mobile number (ensure it's 10 digits)
    if (empty($mobile_number)) {
        $mobile_number_err = "Mobile Number is required.";
        $formIsValid = false;
    } elseif (!preg_match("/^[0-9]{10}$/", $mobile_number)) {
        $mobile_number_err = "Invalid mobile number. Please enter a 10-digit number.";
        $formIsValid = false;
    }

    // Validate passwords
    if (empty($password)) {
        $password_err = "Password is required.";
        $formIsValid = false;
    } elseif ($password !== $confirmPassword) {
        $confirm_password_err = "Passwords do not match.";
        $formIsValid = false;
    }

    // Validate role selection
    if (empty($role)) {
        $role_err = "Role is required.";
        $formIsValid = false;
    }

    // If the form is valid, proceed with insertion
    if ($formIsValid) {
        // Check if the email already exists
        $emailCheckQuery = "SELECT * FROM register WHERE email = ?";
        $stmt = $conn->prepare($emailCheckQuery);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $email_err = "This email address is already registered. Please use a different one.";
            $formIsValid = false;
        } else {
            // Hash the password for secure storage
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            // Use prepared statement to insert data into the 'register' table
            $stmt = $conn->prepare("INSERT INTO register (first_name, last_name, email, mobile_number, password, role) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $first_name, $last_name, $email, $mobile_number, $hashedPassword, $role);

            // Check if the insertion is successful
            if ($stmt->execute()) {
                // Redirect to signin.php after successful registration
                header('Location:singin.php');
                exit();  // Don't forget to call exit after header to stop further code execution
            } else {
                // Database insertion failed
                echo "<script>alert('Error registering user.'); window.location='register.php';</script>";
            }
        }

        // Close the statement and database connection
        $stmt->close();
    }
}

// End output buffering and flush output
ob_end_flush();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wedding Login Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Adding a custom background image */
    body {
      background-image: url('singback.jpg'); /* Replace with your wedding background */
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
    }
  </style>
</head>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wedding Login Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Adding a custom background image */
    body {
      background-image: url('singback.jpg'); /* Replace with your wedding background */
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
    }
  </style>
</head>
<body class="min-h-screen flex flex-col items-center justify-center bg-opacity-80 bg-white">
  <header class="bg-white shadow-md sticky top-0 z-10 w-full">
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


</body>



  <br>
  <br>
  <br>

  <div class="w-full max-w-md bg-white bg-opacity-80 p-8 rounded-lg shadow-lg backdrop-blur-ml">
    <h2 class="text-2xl font-bold text-yellow-600 text-center mb-6">Register</h2>
    <p class="text-sm text-gray-500 text-center mb-8">
      If you don't have a Part Pair account, use this option to create a new account.
    </p>
    
    
    <form action="register.php" method="POST" class="space-y-6">
    <!-- First Name -->
    <div>
        <label for="first_name" class="block text-sm font-medium text-yellow-600">First Name</label>
        <input type="text" id="first_name" name="first_name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="First Name" value="<?php echo $first_name; ?>" required>
        <?php if (!empty($first_name_err)) { echo "<span class='text-red-500 text-sm'>$first_name_err</span>"; } ?>
    </div>

    <!-- Last Name -->
    <div>
        <label for="last_name" class="block text-sm font-medium text-yellow-600">Last Name</label>
        <input type="text" id="last_name" name="last_name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Last Name" value="<?php echo $last_name; ?>" required>
        <?php if (!empty($last_name_err)) { echo "<span class='text-red-500 text-sm'>$last_name_err</span>"; } ?>
    </div>

    <!-- Email Address -->
    <div>
        <label for="email" class="block text-sm font-medium text-yellow-600">Email Address</label>
        <input type="email" id="email" name="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Email Address" value="<?php echo $email; ?>" required>
        <?php if (!empty($email_err)) { echo "<span class='text-red-500 text-sm'>$email_err</span>"; } ?>
    </div>

    <!-- Mobile Number -->
    <div>
        <label for="mobile_number" class="block text-sm font-medium text-yellow-600">Mobile Number</label>
        <input type="tel" id="mobile_number" name="mobile_number" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Mobile Number" value="<?php echo $mobile_number; ?>" required>
        <?php if (!empty($mobile_number_err)) { echo "<span class='text-red-500 text-sm'>$mobile_number_err</span>"; } ?>
    </div>

    <!-- Password -->
    <div>
        <label for="password" class="block text-sm font-medium text-yellow-600">Password</label>
        <input type="password" id="password" name="password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Password" required>
        <?php if (!empty($password_err)) { echo "<span class='text-red-500 text-sm'>$password_err</span>"; } ?>
    </div>

    <!-- Confirm Password -->
    <div>
        <label for="confirm_password" class="block text-sm font-medium text-yellow-600">Confirm Password</label>
        <input type="password" id="confirm_password" name="confirm_password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Confirm Password" required>
        <?php if (!empty($confirm_password_err)) { echo "<span class='text-red-500 text-sm'>$confirm_password_err</span>"; } ?>
    </div>

    <!-- Role Selection -->
    <div>
        <label class="block text-sm font-medium text-yellow-600">Select who you are</label>
        <div class="mt-2 space-y-2">
            <label class="inline-flex items-center">
                <input type="radio" name="role" value="customer" class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500" <?php echo ($role == "customer") ? "checked" : ""; ?> required>
                <span class="ml-2 text-yellow-600">Customer</span>
            </label>
            <label class="inline-flex items-center">
                <input type="radio" name="role" value="supplier" class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500" <?php echo ($role == "supplier") ? "checked" : ""; ?> required>
                <span class="ml-2 text-yellow-600">Supplier</span>
            </label>
            <label class="inline-flex items-center">
                <input type="radio" name="role" value="tailor" class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500" <?php echo ($role == "tailor") ? "checked" : ""; ?> required>
                <span class="ml-2 text-yellow-600">Tailor</span>
            </label>
            <?php if (!empty($role_err)) { echo "<span class='text-red-500 text-sm'>$role_err</span>"; } ?>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="mt-6">
        <button type="submit" class="w-full bg-yellow-600 text-white py-2 px-4 rounded-md shadow focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            Register
        </button>
    </div>
</form>

  </div>
    <!-- Retailer Login -->
    <aside class="mt-8 text-center">
    <h2 class="text-xl font-bold text-white">Are You a Retailer?</h2>
    <p class="text-white mt-2">
      If you are an existing customer looking to login to the Allure Customer Service retail portal, log in here.
    </p>
    <a 
      href="singin.php" 
      class="mt-4 inline-block bg-white border border-gold-600 text-yellow-600 py-2 px-6 rounded-md hover:bg-gold-600 hover:text-black transition">
      Retailer Login →
    </a>
  </aside>
  <footer class="bg-black text-white py-12 w-full">
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
                <button type="submit"
                    class="bg-gold-500 px-6 py-2 rounded-r-lg text-white hover:bg-gold-600">
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
                        <path
                            d="M20 2H4a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM7 6h10v2H7V6zm13 14H4V4h16v16z" />
                    </svg>
                    info@groomandglow.com
                </li>
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        class="inline w-5 h-5 mr-2 text-gold-500" viewBox="0 0 24 24">
                        <path
                            d="M2 6.38v10.17C2 20.74 5.74 23 11.97 23c6.22 0 9.96-2.26 9.96-6.45V6.38C21.93 2.23 18.18 0 11.97 0 5.75 0 2 2.23 2 6.38zm10 12.04c-2.74 0-5.04-.49-5.82-1.24-.53-.5-.69-1.03-.64-1.6.13-.95.94-1.6 2.64-1.72.43.43.93.83 1.52 1.13.56.28 1.2.44 1.87.44s1.31-.16 1.87-.44c.59-.3 1.09-.7 1.52-1.13 1.7.12 2.51.77 2.64 1.72.05.58-.11 1.1-.64 1.6-.78.75-3.08 1.24-5.82 1.24zm4.98-4.6c-.86.52-1.8.85-2.85.95-1.04.11-2.1.05-3.11-.16a9.93 9.93 0 0 1-2.68-1.02c-.79-.43-1.41-.9-1.87-1.39a6.95 6.95 0 0 1-1.26-1.93c-.34-.72-.5-1.48-.5-2.26 0-1.7.66-3.21 1.77-4.26.75-.73 1.68-1.31 2.73-1.7C11.11 4.03 13.6 4 15 4c1.12 0 2.13.17 3.07.5 1.02.37 1.94.91 2.73 1.62.73.65 1.31 1.42 1.71 2.3.38.85.59 1.75.6 2.69-.02.76-.17 1.48-.5 2.13-.4.77-.95 1.42-1.62 1.93-.5.38-1.06.7-1.66.96z" />
                    </svg>
                    +1 (234) 567-890
                </li>
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        class="inline w-5 h-5 mr-2 text-gold-500" viewBox="0 0 24 24">
                        <path
                            d="M3 9.222v11.25c0 .74.603 1.334 1.344 1.334h15.312A1.335 1.335 0 0 0 21 20.472V9.222a.333.333 0 0 0-.322-.322h-5.12a.333.333 0 0 1-.322-.322v-2.53a.333.333 0 0 0-.323-.323H8.808a.333.333 0 0 0-.323.323v2.53a.333.333 0 0 1-.322.322H3.322a.333.333 0 0 0-.322.322zm11.666 4.5h-3.334a1.002 1.002 0 0 0 0 2.004h3.334a1.002 1.002 0 0 0 0-2.004z" />
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