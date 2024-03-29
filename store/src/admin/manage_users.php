<?php 
session_start();

if (!isset($_SESSION['user_id'])){
  header('Location: ../login.php');
  exit();
}

if ($_SESSION['is_admin'] != 1){
  header('Location: ../login.php');
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sole Haven | Manage Users</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.cdnfonts.com/css/sf-pro-display" rel="stylesheet">
</head>
<body class="overflow-x-hidden flex flex-col min-h-screen bg-gray-100">
    <header class="items-center bg-zinc-950 md:px">
        <div class="flex flex-wrap place-items-center">
            <section class="relative mx-auto">
                <!-- navbar -->
                <nav class="flex justify-between w-screen">
                    <div class="px-2 flex w-full py-4 items-center">
                        <a class="" href="../index.php">
                            <img class="h-6" src="../images/logowhite.png" alt="logo"/>         
                        </a>

                        <!-- Nav Links -->
                        <ul class="hidden md:flex mx-auto space-x-12 text-l text-white">
                        <li><a class="hover:text-gray-300" href="../newarrivals.php">New Arrivals</a></li>
                          <li><a class="hover:text-gray-300" href="../best_sellers.php">Best Sellers</a></li>
                         <li><a class="hover:text-gray-300" href="../sneakers.php">Sneakers                
                                <svg aria-hidden="true" class="w-5 inline-block origin-center rotate-90" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-arrow-right">
                                    <path d="m9 18 6-6-6-6"/>
                                </svg>               
                            </a></li>
                            <li><a class="hover:text-gray-300" href="../apparel.php">Apparel
                                <svg aria-hidden="true" class="w-5 inline-block origin-center rotate-90" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-arrow-right">
                                    <path d="m9 18 6-6-6-6"/>
                                </svg>
                            </a></li>
                            <li><a class="hover:text-gray-300" href="../accessories.php">Accessories
                                <svg aria-hidden="true" class="w-5 inline-block origin-center rotate-90" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-arrow-right">
                                    <path d="m9 18 6-6-6-6"/>
                                </svg>
                            </a></li>
                            <li><a class="hover:text-gray-300 pr-40" href="../discover.php">Discover
                                <svg aria-hidden="true" class="w-5 inline-block origin-center rotate-90" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-arrow-right">
                                    <path d="m9 18 6-6-6-6"/>
                                </svg>
                            </a></li>
                        </ul>
                        <!-- Header Icons -->
                        <div class="hidden xl:flex items-center -space-x-1 pr-6 text-gray-100">
                            <a class="hover:text-gray-300" href="index.php">
                                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-search w-10">
                                    <circle cx="11" cy="11" r="8"/>
                                    <path d="m21 21-4.35-4.35"/>
                                </svg>
                            </a>
                            <a class="flex items-center hover:text-gray-300 pr-1" href="../login.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-user w-10 mx-auto"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </a>
                            <!-- Cart -->
                            <a class="flex items-center hover:text-gray-300" href="cart.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-cart w-10"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </nav>
            </section>
        </div>
    </header>

    <section class="flex-grow">
        <div class="md:grid md:grid-cols-4">
            <div class="p-4 px-8 md:border-r md:border-black h-screen">
                <ul>
                    <li class="mb-2 py-2">
                        <a href="account.php" class="py-2 md:text-base lg:text-2xl">
                            <span>Admin Dashboard</span>
                        </a>
                    </li>
                    <li class="mb-2 py-2">
                        <a href="add_product.php" class=" py-2 md:text-base lg:text-2xl">
                            <span>Add Products</span>
                        </a>
                    </li>
                    <li class="mb-2 py-2">
                        <a href="manage_users.php" class="opacity-50 py-2 md:text-base md:text-base lg:text-2xl">
                            <span>Manage Users</span>
                        </a>
                    </li>
                    <li class="mb-2 py-2">
                        <a href="view_messages.php" class="py-2 md:text-base lg:text-2xl">
                            <span>View Messages</span>
                        </a>
                    </li>
                    <li class="mb-2 py-2">
                        <a href="profile_settings.php" class="py-2 md:text-base lg:text-2xl">
                            <span>Profile Settings</span>
                        </a>
                    </li>
                    <li class="mb-2 py-2">
                        <a href="../logout.php" class="py-2 md:text-base lg:text-2xl">
                            <span>Log out</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="p-4 md:col-span-3 md:px-14 md:py-10 lg:p-20 mb-4 md:mb-0">
                <h1 class="text-xl md:text-2xl lg:text-6xl mb-2 md:mb-4 lg:mb-8 font-bold">Manage Users</h1>
                <p>Below is a list of users.</p>
                <div class="my-4">
  <button onclick="showAddUserModal()" type="button" class="bg-black flex items-center justify-center border border-transparent py-2 px-4 text-base font-medium text-white hover:opacity-50 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add a new user</button>
</div>
<div id="modal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-headline">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <div class="fixed inset-0 bg-gray-500 opacity-75" onclick="closeModal()"></div>
    <div class="inline-block align-bottom bg-white text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-screen-md sm:w-full" role="dialog" aria-modal="true" aria-labelledby="Add a new user">
      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="new-user-form">
          <h3 class="text-xl md:text-4xl font-bold mb-4">Add a new admin user</h3>

          <!-- User Form Fields -->
          <form method="post" action="add_user.php">
            <div class="grid grid-cols-6 gap-3">
              <div class="col-span-6">
                <label for="forename" class="block text-sm font-medium text-gray-700">First Name</label>
                <input type="text" name="forename" id="forename" required class="mt-2 focus:ring-indigo-500 p-2 focus:border-indigo-500 block w-full border sm:text-sm border-gray-300 h-[42px]">
              </div>
              <div class="col-span-6">
                <label for="surname" class="block text-sm font-medium text-gray-700">Last Name</label>
                <input type="text" name="surname" id="surname" required class="mt-2 focus:ring-indigo-500 p-2 focus:border-indigo-500 block w-full border sm:text-sm border-gray-300 h-[42px]">
              </div>
              <div class="col-span-6">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" required class="mt-2 focus:ring-indigo-500 p-2 focus:border-indigo-500 block w-full border sm:text-sm border-gray-300 h-[42px]">
              </div>
              <div class="col-span-6">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" required class="mt-2 focus:ring-indigo-500 p-2 focus:border-indigo-500 block w-full border sm:text-sm border-gray-300 h-[42px]">
              </div>
            </div>
            <div class="px-4 py-3 flex flex-col md:flex-row-reverse justify-between">
              <button type="submit" class="bg-black flex items-center justify-center border border-transparent py-2 px-4 text-base font-medium text-white hover:opacity-50 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add user</button>
              <button type="button" onclick="closeModal()" class="text-sm px-4 border border-black uppercase tracking-wide">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  function closeModal() {
    document.getElementById('modal').classList.add('hidden');
  }

  function showAddUserModal() {
    document.getElementById('modal').classList.remove('hidden');
  }
</script>

                <!-- Users Table -->
                <table class="table w-full">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Forename</th>
                            <th>Surname</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Include your database connection here
                        include '../connections.php';

                        // Fetch users from the database
                        $query = "SELECT * FROM users";
                        $result = mysqli_query($connection, $query);
                        if (!$result) {
                            die("Query failed: " . mysqli_error($connection));
                        }

                        // Check if any users are found
                        if (mysqli_num_rows($result) > 0) {
                            // Display users in a table
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>{$row['user_id']}</td>";
                                echo "<td>{$row['forename']}</td>";
                                echo "<td>{$row['surname']}</td>";
                                echo "<td>{$row['email']}</td>";
                                echo "<td>
    <a href='edit_user.php?id={$row['user_id']}'>Edit</a> |
    <a href='delete_user.php?id={$row['user_id']}' onclick='return confirm(\"Are you sure you want to delete this user?\")'>Delete</a>
    </td>";

                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No users found</td></tr>";
                        }

                        // Free result set
                        mysqli_free_result($result);

                        // Close database connection
                        mysqli_close($connection);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <footer>
        <div class="flex flex-wrap place-items-center">
            <section class="relative mx-auto">
                <!-- footer -->
                <footer class="text-white body-font bg-gray-900">
                    <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
                        <a class="flex title-font font-medium items-center md:justify-start justify-center text-white">
                            <img class="h-6" src="../images/logowhite.png" alt="logo"/> 
                        </a>
                        <p class="text-sm text-white sm:ml-4 sm:pl-4 sm:border-l sm:border-gray-700 sm:py-2 sm:mt-0 mt-4">© 2024 Sole Haven —
                            <a href="https://twitter.com/knyttneve" class="text-gray-500 ml-1" rel="noopener noreferrer" target="_blank">@solehaven</a>
                        </p>
                    </div>
                </footer>
            </section>
        </div>
    </footer>
</body>
</html>
