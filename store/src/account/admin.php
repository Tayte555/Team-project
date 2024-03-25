<?php 
session_start();
include("../connections.php");
include("../functions.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    header {
        z-index: 20;
        position: relative;
    }


    .content {
        transition: padding-left 0.5s ease;
    }


    #sidebar {
        z-index: 10;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.5);
    }
    </style>
</head>

<body class="bg-gray-100">

    <!-- Main container -->
    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <div id="sidebar"
            class="bg-blue-700 text-white w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full transition duration-200 ease-in-out">
            <nav>
                <a href="#"
                    class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-800 hover:text-white">Dashboard</a>
                <a href="./account.php"
                    class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-800 hover:text-white">Logout</a>
                <!-- More nav items -->
            </nav>
        </div>

        <!-- Content area, added 'content' class for transition -->
        <div class="flex-1 flex flex-col overflow-hidden content">

            <!-- Header -->
            <header class="flex justify-between items-center p-6 bg-white border-b border-gray-200">
                <!-- Menu Button -->
                <button id="menuBtn" class="text-gray-500 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
                <div>
                    <h1 class="text-2xl text-gray-800 font-semibold">SoleHaven Admin Dashboard</h1>
                </div>
                <div class="flex items-center">
                    <span class="text-gray-600 mr-4">Administrator</span>
                    <img class="h-10 w-10 rounded-full" src="https://i.pravatar.cc/300" alt="Admin profile">
                </div>
            </header>

            <!-- Tab Content Area -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200 p-10">
                <div class="flex space-x-4 mb-8">
                    <div class="flex-1 bg-white p-6 rounded-lg shadow-lg text-center cursor-pointer tab-button"
                        data-tab="orders">
                        <div class="text-green-500 text-2xl mb-2">•</div>
                        <h2 class="text-gray-700 text-lg mb-1">Orders</h2>

                    </div>
                    <div class="flex-1 bg-white p-6 rounded-lg shadow-lg text-center cursor-pointer tab-button"
                        data-tab="inventory">
                        <div class="text-red-500 text-2xl mb-2">•</div>
                        <h2 class="text-gray-700 text-lg mb-1">Inventory</h2>

                    </div>
                    <div class="flex-1 bg-white p-6 rounded-lg shadow-lg text-center cursor-pointer tab-button"
                        data-tab="shipped">
                        <div class="text-blue-500 text-2xl mb-2">•</div>
                        <h2 class="text-gray-700 text-lg mb-1">Shipped</h2>

                    </div>
                    <div class="flex-1 bg-white p-6 rounded-lg shadow-lg text-center cursor-pointer tab-button"
                        data-tab="pending">
                        <div class="text-yellow-500 text-2xl mb-2">•</div>
                        <h2 class="text-gray-700 text-lg mb-1">Pending</h2>

                    </div>
                    <div class="flex-1 bg-white p-6 rounded-lg shadow-lg text-center cursor-pointer tab-button"
                        data-tab="users">
                        <div class="text-purple-500 text-2xl mb-2">•</div>
                        <h2 class="text-gray-700 text-lg mb-1">Users</h2>

                    </div>
                    <div class="flex-1 bg-white p-6 rounded-lg shadow-lg text-center cursor-pointer tab-button"
                        data-tab="add-product">
                        <div class="text-yellow-500 text-2xl mb-2">+</div>
                        <h2 class="text-gray-700 text-lg mb-1">Add Product</h2>

                    </div>
                </div>

                <!-- Tab contents -->
                <div class="inventory-section mt-8">
                    <button id="showInventoryBtn"
                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none">
                        Show Inventory
                    </button>
                    <div id="inventoryTable" class="hidden mt-4">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Colour</th>
                                    <th>Brand</th>
                                    <th>Collection</th>
                                    <th>Price</th>
                                    <th>Release Date</th>
                                    <th>Stock Quantity</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
            $sql = "SELECT product_id, product_name, colour, brand, product_collection, price, release_date, stock_quantity, category, product_desc FROM products";
            $result = mysqli_query($connection, $sql);

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['product_id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['product_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['colour']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['brand']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['product_collection']) . "</td>";
                    echo "<td>$" . htmlspecialchars($row['price']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['release_date']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['stock_quantity']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['category']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['product_desc']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='10'>No products found</td></tr>";
            }
            ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="user-section mt-8">
                    <button id="showUsersBtn"
                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none">
                        Show Users
                    </button>
                    <div id="usersTable" class="hidden mt-4">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>Forename</th>
                                    <th>Surname</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Is Admin</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                $sql = "SELECT user_id, forename, surname, email, pass, is_admin FROM users";
                $result = mysqli_query($connection, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['user_id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['forename']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['surname']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                        echo "<td>••••••••</td>"; // For security, don't display actual passwords
                        echo "<td>" . ($row['is_admin'] ? 'Yes' : 'No') . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No users found</td></tr>";
                }
                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Tab contents -->
                <div id="orders" class="tab-content">
                    <!-- Dynamic content for Orders -->
                    <?php
        // PHP code to fetch orders from database and display them
        ?>
                </div>
                <div id="inventory" class="tab-content hidden">
                    <!-- Dynamic content for Shipped -->
                </div>
                <div id="shipped" class="tab-content hidden">
                    <!-- Dynamic content for Shipped -->
                </div>
                <div id="pending" class="tab-content hidden">
                    <!-- Dynamic content for Pending -->
                </div>
                <div id="users" class="tab-content hidden">
                    <!-- Dynamic content for Shipped -->
                </div>
                <div id="add-product" class="tab-content hidden">
                    <!-- Form for adding a new product -->
                </div>
            </main>
        </div>
    </div>







    <script>
    $(document).ready(function() {
        $('#showInventoryBtn').click(function() {
            // Toggle the visibility of the inventory table
            $('#inventoryTable').toggleClass('hidden');
        });
    });

    $(document).ready(function() {
        $('#showUsersBtn').click(function() {
            $('#usersTable').toggleClass('hidden');
        });
        // Keep the existing showInventoryBtn click function here as well
    });
    </script>

</body>

</html>