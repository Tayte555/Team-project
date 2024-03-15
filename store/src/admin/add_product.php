<?php 

session_start();
include "../connections.php";

if (!isset($_SESSION['user_id'])){
    header('Location: ../login.php');
    exit();
}

if ($_SESSION['is_admin'] != 1){
  header('Location: ../login.php');
  exit();
}

$error_message = "";
if (isset($_SESSION['error_message'])) {
    $error_message = $_SESSION['error_message'];


    unset($_SESSION['error_message']);
}

$success_message = "";
if (isset($_SESSION['success_message'])) {
    $success_message = $_SESSION['success_message'];

    unset($_SESSION['success_message']);
}

$sql = "SELECT * FROM products";
$result = $connection->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Sole Haven | Account</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.cdnfonts.com/css/sf-pro-display" rel="stylesheet">
                
</head>



<body class="overflow-x-hidden flex flex-col min-h-screen">
    <header class="items-center bg-zinc-950 md:px">
        <div class="flex flex-wrap place-items-center">
      <section class="relative mx-auto">
          <!-- navbar -->
        <nav class="flex justify-between w-screen">
          
            <div class="px-2 flex w-full py-4 items-center">
            
              <a class="" href="../home.php">
              <!-- <img class="h-9" src="logo.png" alt="logo"> -->
              <img class="h-6 
               " src="../images/logowhite.png" alt="logo"/>         
              </a>

            <!-- Nav Links -->
            <ul class="hidden md:flex mx-auto space-x-12 text-l text-white">
              <li><a class="hover:text-gray-300" href="#">New Arrivals</a></li>
              <li><a class="hover:text-gray-300" href="#">Best Sellers</a></li>
              <li><a class="hover:text-gray-300" href="#">Sneakers                
                  <svg aria-hidden="true" class="w-5 inline-block origin-center rotate-90" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-arrow-right">
                    <path d="m9 18 6-6-6-6"/>
                  </svg>               
              </a></li>
              <li><a class="hover:text-gray-300" href="#">Apparel
                <svg aria-hidden="true" class="w-5 inline-block origin-center rotate-90" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-arrow-right">
                  <path d="m9 18 6-6-6-6"/>
                </svg>
              </a></li>
              <li><a class="hover:text-gray-300" href="#">Accessories
                <svg aria-hidden="true" class="w-5 inline-block origin-center rotate-90" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-arrow-right">
                  <path d="m9 18 6-6-6-6"/>
                </svg>
              </a></li>
              <li><a class="hover:text-gray-300 pr-40" href="#">Discover
                <svg aria-hidden="true" class="w-5 inline-block origin-center rotate-90" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-arrow-right">
                  <path d="m9 18 6-6-6-6"/>
                </svg>
              </a></li>
            </ul>
            <!-- Header Icons -->
            <div class="hidden xl:flex items-center -space-x-1 pr-6 text-gray-100">
              <a class="hover:text-gray-300" href="#">
                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-search w-10">
                    <circle cx="11" cy="11" r="8"/>
                    <path d="m21 21-4.35-4.35"/>
                  </svg>
              </a>
              <a class="flex items-center hover:text-gray-300 pr-1" href="../login.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-user w-10 mx-auto"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle>
                </svg>
                
              </a>
              <!-- Cart      -->
              <a class="flex items-center hover:text-gray-300" href="../cart.html">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-cart w-10"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                </svg>
                <!--<span class="flex absolute -mt-5 ml-4">
                    <span class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-pink-400 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-3 w-3 bg-pink-500">
                      </span>
                    </span> -->           
              </a>             
            </div>
          </div>
        </nav>
      </section>
    </div>
    </header>

    <section class="">
    
    <div class="md:grid md:grid-cols-4 ">
      <div class="p-4 px-8 md:border-r md:border-black h-screen">
      <ul>
          <li class="mb-2 py-2">
            <a href="account.php" class="py-2 md:text-base md:text-base lg:text-2xl">
              <span>Admin Dashboard</span>
            </a>
          </li>
          <li class="mb-2 py-2">
            <a href="add_product.php" class="opacity-50 py-2 md:text-base lg:text-2xl">
              <span>Add products</span>
            </a>
          </li>
          <li class="mb-2 py-2">
            <a href="manage_users.php" class="py-2 md:text-base lg:text-2xl">
              <span>Manage users</span>
            </a>
          </li>
          <li class="mb-2 py-2">
            <a href="view_messages.php" class="py-2 md:text-base lg:text-2xl">
              <span>View messages</span>
            </a>
          </li>
          <li class="mb-2 py-2">
            <a href="/account/settings" class="py-2 md:text-base lg:text-2xl">
              <span>Profile settings</span>
            </a>
          </li>
          <li class="mb-2 py-2">
            <a href="../logout.php" class="py-2 md:text-base lg:text-2xl">
              <span>Log out</span>
            </a>
          </li>
          

        </ul>

      </div>
      <div class="p-4 md:col-span-3 md:px-14 md:py-10 lg:p-20 mb-4 md:mb-0" style="max-height: 600px; overflow-y: auto; padding-bottom: 100px;">
        <h1 class="text-xl md:text-2xl lg:text-6xl mb-2 md:mb-4 lg:mb-8 font-bold">View products</h1>
        <div class="md:col-span-3">
          <div class="sm:overflow-hidden" >
          <ul class="divide-y">
        <?php 
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<li class='py-8 relative border-black'>";
                echo "<p><strong>" . htmlspecialchars($row['brand']) . "</strong> " . htmlspecialchars($row['product_name']) . "</p>";
                echo "<p>Price: £" . htmlspecialchars($row['price']) . " | Release Date: " . htmlspecialchars($row['release_date']) . "</p>";
                echo "<p>Stock Quantity: " . htmlspecialchars($row['stock_quantity']) . " | Category: " . htmlspecialchars($row['category']) . "</p>";
                echo "<div class='-ml-2'>";
                echo "<button class='px-2 py-1 underline underline-offset-1'>Edit</button>";
                echo "<a href='delete_product.php?id=" . $row['product_id'] . "' class='px-2 py-1 underline underline-offset-1' onclick='return confirm(\"Are you sure you want to delete this product?\");'>Delete</a>";
                echo "</div></li>";
            }
        } else {
            echo "<li>No products found.</li>";
        }
        ?>
    </ul>

            <script>
    function closeModal() {
        document.getElementById('modal').style.display = 'none';
    }

    function showAddProductModal() {
        document.getElementById('modal').style.display = 'block';
    }
</script>

            <div class="my-4">
              <button onclick="showAddProductModal()" type="submit" @click="address_input.showModal()" class="bg-black flex items-center justify-center border border-transparent py-2 px-4 text-base font-medium text-white hover:opacity-50 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add a new product</button>
              <div id="modal" class="fixed z-10 inset-0 overflow-y-auto" x-show="openNew" x-transition.opacity aria-modal="true" aria-labelledby="modal-headline">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                  <div class="fixed inset-0 bg-gray-500 opacity-75" x-show="openNew" @click="openNew = false"></div>
                  <!-- this element is to trick browser into centering the modal contents. -->
                  <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&ZeroWidthSpace;</span>
                  <div class="inline-block align-bottom bg-white text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-screen-md sm:w-full" role="dialog" aria-modal="true" aria-labelledby="Add a new product">
                    <form method="post" action="add_product_func.php" id="product_form_new" enctype="multipart/form-data" accept-charset="UTF-8">
                      <input type="hidden" name="utf8" value="✓">
                      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="new-address-form">
                          <h3 class="text-xl md:text-4xl font-bold mb-4">Add a new product</h3>

                          <div class="grid grid-cols-6 gap-3">

                          <?php if (!empty($error_message)): ?>
                            <div class="col-span-6">
                              <div class="error-message">
                                  <?php echo $error_message; ?>
                              </div>
                            </div>
                            <?php endif; ?>

                            <!-- Success Message (Full Width) -->
                            <?php if (!empty($success_message)): ?>
                            <div class="col-span-6">
                              <div class="success-message">
                                  <?php echo $success_message; ?>
                              </div>
                            </div>
                            <?php endif; ?>

                            <div class="col-span-6 sm:col-span-3">
                            <label for="product_image" class="block text-sm font-medium text-gray-700">Product Image (jpeg/jpg/png/gif)</label>
                              <input type="file" name="product_image" id="product_image" required class="mt-2 block w-full text-sm text-gray-700" onchange="previewImage();">

                          </div>
                          <div class="col-span-6 sm:col-span-3">
                          <img id="image_preview" src="#" alt="Image preview" style="display: none; max-width: 200px; max-height: 200px;" />
                          </div>
                          

                          <div class="col-span-6">
                            <label for="product_name" class="block text-sm font-medium text-gray-700">Product name</label>
                            <input type="text" name="product[product_name]" value autocapitalize="words" required id="product_name" class="mt-2 focus:ring-indigo-500 p-2 focus:border-indigo-500 p-2 focus:border-indigo-500 block w-full border sm:text-sm border-gray-300 h-[42px]">
                          </div>
                          <div class="col-span-6 ">
                            <label for="brand" class="block text-sm font-medium text-gray-700">Brand</label>
                            <input text="text" name="product[brand]" value id="brand" required autocapitalize="words" class="mt-2 focus:ring-indigo-500 p-2 focus:border-indigo-500 block w-full border sm:text-sm border-gray-300 h-[42px]">
                          </div>
                          
                          <div class="col-span-6 sm:col-span-3">
                            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                            <div class="mt-2 flex border border-gray-300 h-[42px] focus-within:border-indigo-500 focus-within:ring focus-within:ring-indigo-200 focus-within:ring-opacity-50">
                                <span class="inline-flex items-center px-3 text-gray-500 bg-gray-100 border-r border-gray-300 sm:text-sm">£</span>
                                <input oninput="validateDecimal(this)" type="number" name="product[price]" id="price" required min="0" pattern="^\d+(?:\.\d{1,2})?$" step="0.01" autocapitalize="words" class="flex-1 p-2 block w-full focus:outline-none sm:text-sm border-0" placeholder="0.00">
                            </div>
                        </div>

                        <script>
                            function validateDecimal(input) {
                                // Allows only numbers with up to two decimal places
                                const regex = /^\d*\.?\d{0,2}$/;
                                // Check if current value matches the regular expression
                                if (!regex.test(input.value)) {
                                    // If not, remove the last character entered
                                    input.value = input.value.slice(0, -1);
                                }
                            }

                            function previewImage() {
                              var preview = document.getElementById('image_preview');
                              var file    = document.getElementById('product_image').files[0];
                              var reader  = new FileReader();

                            reader.onloadend = function () {
                              preview.src = reader.result;
                              preview.style.display = 'block';
                            }

                            if (file) {
                              reader.readAsDataURL(file);
                            } else {
                              preview.src = "";
                              preview.style.display = 'none';
                            }
                            }
                        </script>


                          <div class="col-span-6 sm:col-span-3">
                            <label for="release_date" class="block text-sm font-medium text-gray-700">Release date</label>
                            <input type="date" name="product[release_date]" id="release_date" required autocapitalize="words" class="mt-2 focus:ring-indigo-500 p-2 focus:border-indigo-500 block w-full border sm:text-sm border-gray-300 h-[42px]">
                          </div>
                          <div class="col-span-6 sm:col-span-3">
                            <label for="zip" class="block text-sm font-medium text-gray-700">Stock quantity</label>
                            <input type="number" min="0" name="product[stock_quantity]" value id="stock_quantity" required autocapitalize="words" class="mt-2 focus:ring-indigo-500 p-2 focus:border-indigo-500 block w-full border sm:text-sm border-gray-300 h-[42px]">
                          </div>
                          <div class="col-span-6 sm:col-span-3">
                            <label for="zip" class="block text-sm font-medium text-gray-700">Category</label>
                            <input type="text" name="product[category]" value id="category" required autocapitalize="words" class="mt-2 focus:ring-indigo-500 p-2 focus:border-indigo-500 block w-full border sm:text-sm border-gray-300 h-[42px]">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="px-4 py-3 flex flex-col md:flex-row-reverse justify-between">
                      <div class="flex flex-col md:flex-row">
                        <button type="submit" class="bg-black flex items-center justify-center border border-transparent py-2 px-4 text-base font-medium text-white hover:opacity-50 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add product</button>
                      </div>
                      <button type="button" onclick="closeModal()" class="text-sm px-4 border border-black uppercase tracking-wide">Cancel</button>
                    </div>
                    </form>

                  </div>

                </div>

              </div>

            </div>
          </div>

        </div>

      

    </div>
  </div>
  </section>

  







  <footer class="bg-zinc-950 px-24 -mt-64">
    
    <div class="flex gap-x-12">
      
      <div class="">
        <div class=" bg-zinc-950 p-5 md:col-span-2 lg:col-auto">
          <h3 class="mb-2 text-base text-white text-sm font-bold pb-5 pt-6 grow">FIND US 🗺️</h3>
        <div class="">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2429.5812611345723!2d-1.8908227230241506!3d52.48671703869282!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4870bc9ae4f2e4b3%3A0x9a670ba18e08a084!2sAston%20University!5e0!3m2!1sen!2suk!4v1701019587175!5m2!1sen!2suk" width="370" height="130" class="rounded-xl" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade""></iframe>     
      </div>
    </div>
    </div>
    

    <div class="bg-zinc-950 p-5 md:col-span-2 lg:col-auto grow">
      <h3 class="mb-2 text-base text-white text-sm font-bold pb-5 pt-6">CUSTOMER SERVICE 🛎️</h3>
      <ul class="text-white space-y-3">
        <li class="mb-1">
          <a href="/privacy-policy" class="hover:opacity-50">Privacy policy</a>
        </li>
        <li class="mb-1">
          <a href="/refund-policy" class="hover:opacity-50">Refund policy</a>
        </li>
        <li class="mb-1">
          <a href="/tos" class="hover:opacity-50">Terms of service</a>
        </li>
        <li class="mb-1 pb-5">
          <a href="/shipping" class="hover:opacity-50">Shipping policy</a>
        </li>
      </ul>
  </div>

  <div class="bg-zinc-950 p-5 md:col-span-2 lg:col-auto grow">
    <h3 class="mb-2 text-base text-white text-sm font-bold pb-5 pt-6">INFORMATION 💼</h3>
    <ul class="text-white space-y-3">
      <li class="mb-1">
        <a href="/privacy-policy" class="hover:opacity-50">About us</a>
      </li>
      <li class="mb-1">
        <a href="/refund-policy" class="hover:opacity-50">Meet the team</a>
      </li>
      <li class="mb-1">
        <a href="../contactus.php" class="hover:opacity-50">Contact us</a>
      </li>
      <li class="mb-1 pb-5">
        <a href="/shipping" class="hover:opacity-50">Careers</a>
      </li>
    </ul>
</div>

    

    
    <div class="bg-zinc-950 p-5 md:col-span-2 lg:col-auto grow">
      <h3 class="mb-2 text-base text-white text-sm font-bold pb-5 pt-6">JOIN OUR NEWSLETTER 🤫</h3>
      <div>
        <div>
          <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Enter your email" required="">        </div>
          
          <ul class="flex mt-9">
            <li class="grow">
              <a>
                <svg width="25" height="25" viewBox="0 0 1792 1792" fill="#ffffff">
                  <path d="M1152 896q0-106-75-181t-181-75-181 75-75 181 75 181 181 75 181-75 75-181zm138 0q0 164-115 279t-279 115-279-115-115-279 115-279 279-115 279 115 115 279zm108-410q0 38-27 65t-65 27-65-27-27-65 27-65 65-27 65 27 27 65zM896 266q-7 0-76.5-.5t-105.5 0-96.5 3-103 10T443 297q-50 20-88 58t-58 88q-11 29-18.5 71.5t-10 103-3 96.5 0 105.5.5 76.5-.5 76.5 0 105.5 3 96.5 10 103T297 1349q20 50 58 88t88 58q29 11 71.5 18.5t103 10 96.5 3 105.5 0 76.5-.5 76.5.5 105.5 0 96.5-3 103-10 71.5-18.5q50-20 88-58t58-88q11-29 18.5-71.5t10-103 3-96.5 0-105.5-.5-76.5.5-76.5 0-105.5-3-96.5-10-103T1495 443q-20-50-58-88t-88-58q-29-11-71.5-18.5t-103-10-96.5-3-105.5 0-76.5.5zm768 630q0 229-5 317-10 208-124 322t-322 124q-88 5-317 5t-317-5q-208-10-322-124t-124-322q-5-88-5-317t5-317q10-208 124-322t322-124q88-5 317-5t317 5q208 10 322 124t124 322q5 88 5 317z"/>
                </svg>
              </a>
            </li>

            <li class="grow">
              <a>
                <svg width="25" height="25" viewBox="0 0 1792 1792" fill="#ffffff">
                  <path d="M1684 408q-67 98-162 167 1 14 1 42 0 130-38 259.5T1369.5 1125 1185 1335.5t-258 146-323 54.5q-271 0-496-145 35 4 78 4 225 0 401-138-105-2-188-64.5T285 1033q33 5 61 5 43 0 85-11-112-23-185.5-111.5T172 710v-4q68 38 146 41-66-44-105-115t-39-154q0-88 44-163 121 149 294.5 238.5T884 653q-8-38-8-74 0-134 94.5-228.5T1199 256q140 0 236 102 109-21 205-78-37 115-142 178 93-10 186-50z"/>
                </svg>          
              </a>

            </li>

            <li class="grow">
              <a>
                <svg width="25" height="25" viewBox="0 0 1792 1792" fill="#ffffff">
                  <path d="M1376 128q119 0 203.5 84.5T1664 416v960q0 119-84.5 203.5T1376 1664h-188v-595h199l30-232h-229V689q0-56 23.5-84t91.5-28l122-1V369q-63-9-178-9-136 0-217.5 80T948 666v171H748v232h200v595H416q-119 0-203.5-84.5T128 1376V416q0-119 84.5-203.5T416 128h960z"/>
                </svg>                
              </a>

            </li>

            <li>
              <a>
                <svg width="25" height="25" viewBox="0 0 1792 1792" fill="#ffffff">
                  <path d="m711 1128 484-250-484-253v503zm185-862q168 0 324.5 4.5T1450 280l73 4q1 0 17 1.5t23 3 23.5 4.5 28.5 8 28 13 31 19.5 29 26.5q6 6 15.5 18.5t29 58.5 26.5 101q8 64 12.5 136.5T1792 788v176q1 145-18 290-7 55-25 99.5t-32 61.5l-14 17q-14 15-29 26.5t-31 19-28 12.5-28.5 8-24 4.5-23 3-16.5 1.5q-251 19-627 19-207-2-359.5-6.5T336 1512l-49-4-36-4q-36-5-54.5-10t-51-21-56.5-41q-6-6-15.5-18.5t-29-58.5T18 1254q-8-64-12.5-136.5T0 1004V828q-1-145 18-290 7-55 25-99.5T75 377l14-17q14-15 29-26.5t31-19.5 28-13 28.5-8 23.5-4.5 23-3 17-1.5q251-18 627-18z"/>
                </svg>
              </a>

            </li>

          </ul>
      </div>

    </div>

    </footer>



</body>
</html>