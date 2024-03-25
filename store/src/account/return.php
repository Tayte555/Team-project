

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Your Wish List</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="./images/logowhitefav.png" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.cdnfonts.com/css/sf-pro-display" rel="stylesheet">

</head>

<style>
  
.image-container {
    white-space: nowrap;
    overflow-x: auto;
    z-index: 1;
}

.image-container img {
    margin-right: 0px;
    margin-left: 0px;
    width: 465px;
    height: 107px;
    display: inline-block;
    z-index: 1;
}

@media (max-width: 600px) {
    .image-container {
        white-space: initial;
        overflow-x: initial;
        z-index: 1;
    }

    .image-container img {
        flex-basis: auto;
        margin-right: 0;
        margin-left: 0;
        z-index: 1;
    }
}


/*--Section for the "best sellers" section--*/
.image-section {
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-start;
    margin-top: 20px;
    margin-left: 17px;
    z-index: 1;
}

.image-section .item-container {
    margin: 5px;
    max-width: calc(20% - 10px);
    height: auto;
    float: left;
    z-index: 1;
}

@media (max-width: 600px) {
    .image-section img {
        flex-basis: calc(50% - 10px);
        width: 100%;
        z-index: 1;
    }
}


/*--text container--*/
.text-container {
    position: relative;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: rgba(255, 255, 255, 0.8);
    /* Semi-transparent white background */
    padding: 5px;
    box-sizing: border-box;
    z-index: 1;
}


.shoe-name {
    font-size: 14px;
    font-weight: bold;
    margin-bottom: 5px;
    z-index: 5;
    z-index: 1;
}

.price {
    font-size: 12px;
    z-index: 1;
}

img:hover {
    z-index: 1;
}

.group:hover .absolute {
    display: block;
    z-index: 1;
}

/* Additional styles for the sub-menus */
.absolute {
    display: none;
    z-index: 1;
}

input[type="search"] {
    width: 100%;
    height: 40px;
    /* Adjust height as needed */
    padding: 0 15px;
    /* Padding inside the search bar */
    font-size: 1rem;
    /* Adjust font-size as needed */
    border: 2px solid transparent;
    /* Hide border by default */
    background-color: transparent;
    /* Make background transparent by default */
    color: white;
    /* Text color white by default */
    border-radius: 20px;
    /* Rounded corners for the search bar */
    transition: all 0.3s ease;
    /* Smooth transition for focus effect */
}

input[type="search"]::placeholder {
    color: rgba(255, 255, 255, 0.6);
    /* Light white placeholder text */
}

input[type="search"]:focus {
    background-color: white;
    /* Background white on focus */
    color: black;
    /* Text color black on focus */
    outline: none;
    /* Remove the default outline */
    border-color: #4A90E2;
    /* Blue border on focus */
}

/* Ensure this is included in your style tag or CSS file */
#cart-sidebar {
    transition: transform 0.3s ease;
}

.cart-item {
    display: flex;
    align-items: center;
}

.cart-item img {
    border-radius: 5px;
}

.cart-item div {
    flex-grow: 1;
}

<style>
  
.image-container {
    white-space: nowrap;
    overflow-x: auto;
    z-index: 1;
}

.image-container img {
    margin-right: 0px;
    margin-left: 0px;
    width: 465px;
    height: 107px;
    display: inline-block;
    z-index: 1;
}

@media (max-width: 600px) {
    .image-container {
        white-space: initial;
        overflow-x: initial;
        z-index: 1;
    }

    .image-container img {
        flex-basis: auto;
        margin-right: 0;
        margin-left: 0;
        z-index: 1;
    }
}


/*--Section for the "best sellers" section--*/
.image-section {
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-start;
    margin-top: 20px;
    margin-left: 17px;
    z-index: 1;
}

.image-section .item-container {
    margin: 5px;
    max-width: calc(20% - 10px);
    height: auto;
    float: left;
    z-index: 1;
}

@media (max-width: 600px) {
    .image-section img {
        flex-basis: calc(50% - 10px);
        width: 100%;
        z-index: 1;
    }
}


/*--text container--*/
.text-container {
    position: relative;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: rgba(255, 255, 255, 0.8);
    /* Semi-transparent white background */
    padding: 5px;
    box-sizing: border-box;
    z-index: 1;
}


.shoe-name {
    font-size: 14px;
    font-weight: bold;
    margin-bottom: 5px;
    z-index: 5;
    z-index: 1;
}

.price {
    font-size: 12px;
    z-index: 1;
}

img:hover {
    z-index: 1;
}

.group:hover .absolute {
    display: block;
    z-index: 1;
}

/* Additional styles for the sub-menus */
.absolute {
    display: none;
    z-index: 1;
}

input[type="search"] {
    width: 100%;
    height: 40px;
    /* Adjust height as needed */
    padding: 0 15px;
    /* Padding inside the search bar */
    font-size: 1rem;
    /* Adjust font-size as needed */
    border: 2px solid transparent;
    /* Hide border by default */
    background-color: transparent;
    /* Make background transparent by default */
    color: white;
    /* Text color white by default */
    border-radius: 20px;
    /* Rounded corners for the search bar */
    transition: all 0.3s ease;
    /* Smooth transition for focus effect */
}

input[type="search"]::placeholder {
    color: rgba(255, 255, 255, 0.6);
    /* Light white placeholder text */
}

input[type="search"]:focus {
    background-color: white;
    /* Background white on focus */
    color: black;
    /* Text color black on focus */
    outline: none;
    /* Remove the default outline */
    border-color: #4A90E2;
    /* Blue border on focus */
}

/* Ensure this is included in your style tag or CSS file */
#cart-sidebar {
    transition: transform 0.3s ease;
}

.cart-item {
    display: flex;
    align-items: center;
}

.cart-item img {
    border-radius: 5px;
}

.cart-item div {
    flex-grow: 1;
}



</style>


<body class="overflow-x-hidden">

    <!-- navbar -->
    <header class="items-center bg-zinc-950 md:px">
        <div class="flex flex-wrap place-items-center">
            <section class="relative mx-auto">
                <!-- navbar -->
                <nav class="flex justify-between w-screen">

                    <div class="px-2 flex w-full py-2 items-center">

                        <a class="" href="index.php">
                            <!-- <img class="h-9" src="logo.png" alt="logo"> -->
                            <img class="h-6 mr-60
               " src="./images/logowhite.png" alt="logo" />
                        </a>

                        <!-- Nav Links -->
                        <ul class="hidden md:flex mx-auto space-x-12 text-l text-white">
                            <li><a class="hover:text-gray-300" href="newarrivals.php">New Arrivals</a></li>
                            <li><a class="hover:text-gray-300" href="best_sellers.php">Best Sellers</a></li>
                            <!-- Sneakers Hover Menu -->
                            <li class="relative group">
                                <a class="hover:text-gray-300" href="./sneakers.php">Sneakers
                                    <svg aria-hidden="true" class="w-5 inline-block origin-center rotate-90"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="icon icon-arrow-right">
                                        <path d="m9 18 6-6-6-6" />
                                    </svg>
                                </a>
                                <ul class="absolute hidden space-y-2 bg-white text-black py-2 rounded-md">
                                    <li><a
                                            href="./sneakers_men.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Men</a>
                                    </li>
                                    <li><a href="./sneakers_women.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Women</a></li>
                                    <li><a
                                            href="./sneakers_clearance.html">&nbsp;&nbsp;&nbsp;Clearance&nbsp;&nbsp;&nbsp;</a>
                                    </li>
                                    <li><a
                                            href="./sneakers_kids.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kids</a>
                                    </li>
                                </ul>
                            </li>

                            <!-- Apparel Hover Menu -->
                            <li class="relative group">
                                <a class="hover:text-gray-300" href="./apparel.html">Apparel
                                    <svg aria-hidden="true" class="w-5 inline-block origin-center rotate-90"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="icon icon-arrow-right">
                                        <path d="m9 18 6-6-6-6" />
                                    </svg>
                                </a>
                                <ul class="absolute hidden space-y-2 bg-white text-black py-2 rounded-md">
                                    <li><a
                                            href="./apparel_socks.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Socks&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                                    </li>
                                    <li><a href="./apparel_shoecare.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Shoe Care</a>
                                    </li>
                                    <li><a
                                            href="./apparel_kits.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kits</a>
                                    </li>
                                </ul>
                            </li>

                            <!-- Accessories Hover Menu -->
                            <li class="relative group">
                                <a class="hover:text-gray-300" href="./accessories.html">Accessories
                                    <svg aria-hidden="true" class="w-5 inline-block origin-center rotate-90"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="icon icon-arrow-right">
                                        <path d="m9 18 6-6-6-6" />
                                    </svg>
                                </a>
                                <ul class="absolute hidden space-y-2 bg-white text-black py-2 rounded-md">
                                    <li><a
                                            href="./accessories_shoelaces.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Shoelaces&nbsp;&nbsp;&nbsp;</a>
                                    </li>
                                    <li><a href="./accessories_shoeinserts.html">&nbsp;&nbsp;&nbsp;Shoe
                                            Inserts&nbsp;&nbsp;&nbsp;</a></li>
                                    <li><a href="./accessories_shoebags.html">&nbsp;&nbsp;&nbsp;&nbsp;Shoe
                                            Bags&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                                    <li><a
                                            href="./accessories_soles.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Soles&nbsp;&nbsp;&nbsp;</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="hover:text-gray-300 pr-40" href="#">Discover
                                    <svg aria-hidden="true" class="w-5 inline-block origin-center rotate-90"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="icon icon-arrow-right">
                                        <path d="m9 18 6-6-6-6" />
                                    </svg>
                                </a></li>
                        </ul>
                        <!-- Header Icons -->
                        <div class="hidden xl:flex items-center -space-x-1 pr-6 text-gray-100">

                            <!-- search icon -->
                            <form action="search.php" method="GET" class="flex items-center">
                                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="icon icon-search w-6 h-6">
                                    <circle cx="11" cy="11" r="8" />
                                    <path d="m21 21-4.35-4.35" />
                                </svg>
                                <div class="flex-grow">
                                    <input type="search" name="search" placeholder="Search items..."
                                        class="w-full h-10 px-4 bg-transparent text-white placeholder-gray-300 rounded transition-all duration-300 focus:border-blue-300 focus:bg-white focus:text-black" />
                                </div>
                            </form>
                            <!-- profile -->
                            <a class="flex items-center hover:text-gray-300 pr-1" href="login.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-user w-10 mx-auto">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>

                            </a>
                            <!-- Cart 
              <a class="flex items-center hover:text-gray-300" href="cart.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-cart w-10"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                </svg>
                <span class="flex absolute -mt-5 ml-4">
                    <span class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-pink-400 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-3 w-3 bg-pink-500">
                      </span>
                    </span> -->
                            <div id="cart-icon" class="cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-cart w-10">
                                    <circle cx="9" cy="21" r="1"></circle>
                                    <circle cx="20" cy="21" r="1"></circle>
                                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                </svg>
                            </div>

                            <!-- Sidebar Container -->
                            <div id="cart-sidebar"
                                class="fixed right-0 top-0 transform translate-x-full h-full bg-white p-5 rounded shadow-lg min-w-[300px] z-50 transition-transform duration-300 flex flex-col text-black">
                                <!-- Sidebar Header -->
                                <h3 class="text-lg font-semibold mb-3">Your Cart</h3>

                                <!-- Cart Items -->
                                <div class="cart-item mb-4">
                                    <img src="images\blackcatsneaker 1.png" alt="Shoe 1"
                                        class="w-20 h-20 object-cover mr-4">
                                    <div>
                                        <h4 class="text-sm font-semibold">Sneaker Model 1</h4>
                                        <p class="text-xs">Price: $100.00</p>
                                        <p class="text-xs">Quantity: 1</p>
                                    </div>
                                </div>
                                <div class="cart-item mb-4">
                                    <img src="images\blackcatsneaker 1.png" alt="Shoe 2"
                                        class="w-20 h-20 object-cover mr-4">
                                    <div>
                                        <h4 class="text-sm font-semibold">Sneaker Model 2</h4>
                                        <p class="text-xs">Price: $150.00</p>
                                        <p class="text-xs">Quantity: 1</p>
                                    </div>
                                </div>

                                <!-- Cart Total -->
                                <div class="mt-auto pt-4 border-t">
                                    <h4 class="text-lg font-semibold">Total: $250.00</h4>
                                </div>

                                <!-- Checkout Button -->
                                <a href="cart.php"
                                    class="block text-center bg-blue-500 text-white p-2 rounded mt-3">Checkout</a>
                            </div>
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
                <span>Order History</span>
              </a>
            </li>
            <li class="mb-2 py-2">
              <a href="addresses.php" class="opacity-50 py-2 md:text-base lg:text-2xl">
                <span>View addresses</span>
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
        <section class="flex justify-end items-center flex-grow">
        <div class="w-full max-w-2xl mr-4 p-10 bg-white rounded-lg shadow-xl mx-auto">
            <h2 class="text-2xl font-semibold mb-4">Returns</h2>
            <div class="mb-4">
                <!-- Product card -->
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <img src=" " alt="Product Image" class="w-32 h-32 object-cover rounded" />
                        <button class="absolute top-0 right-0 mt-2 mr-2 text-gray-600 hover:text-gray-900">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium">Air Jordan 4 Retro 'Black Cat' 2020</h3>
                        <p class="text-sm text-gray-600">UK 7.5</p>
                        <p class="text-lg text-gray-900">£1,499.99</p>
                    </div>
                </div>
                <!-- End Product card -->

                <!-- Reason for return -->
                <div class="mt-4">
                    <label for="return-reason" class="block text-sm font-medium text-gray-700 mb-1">Reason for return</label>
                    <textarea id="return-reason" rows="4" class="form-textarea mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" placeholder="Enter reason for return"></textarea>
                </div>
                <!-- End Reason for return -->

                <!-- Return button -->
                <div class="mt-6">
                    <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Return
                    </button>
                </div>
                <!-- End Return button -->
            </div>
        </div>
    </section>

  
    </section>
    <!-- footer section -->
    <footer class="bg-zinc-950 px-24 mt-auto">

        <div class="flex gap-x-12">

            <div class="">
                <div class=" bg-zinc-950 p-5 md:col-span-2 lg:col-auto">
                    <h3 class="mb-2 text-base text-white text-sm font-bold pb-5 pt-6 grow">FIND US 🗺️</h3>
                    <div class="">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2429.5812611345723!2d-1.8908227230241506!3d52.48671703869282!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4870bc9ae4f2e4b3%3A0x9a670ba18e08a084!2sAston%20University!5e0!3m2!1sen!2suk!4v1701019587175!5m2!1sen!2suk"
                            width="370" height="130" class="rounded-xl" style="border:0;" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade""></iframe>     
        </div>
      </div>
      </div>
      
  
      <div class=" bg-zinc-950 p-5 md:col-span-2 lg:col-auto grow">
                            <h3 class="mb-2 text-base text-white text-sm font-bold pb-5 pt-6">CUSTOMER SERVICE 🛎️</h3>
                            <ul class="text-white space-y-3">
                                <li class="mb-1">
                                    <a href="privacy.html" class="hover:opacity-50">Privacy policy</a>
                                </li>
                                <li class="mb-1">
                                    <a href="refundpolicy.html" class="hover:opacity-50">Refund policy</a>
                                </li>
                                <li class="mb-1">
                                    <a href="terms_of_use.html" class="hover:opacity-50">Terms of service</a>
                                </li>
                                <li class="mb-1 pb-5">
                                    <a href="shipping_response.html" class="hover:opacity-50">Shipping policy</a>
                                </li>
                            </ul>
                    </div>

                    <div class="bg-zinc-950 p-5 md:col-span-2 lg:col-auto grow">
                        <h3 class="mb-2 text-base text-white text-sm font-bold pb-5 pt-6">INFORMATION 💼</h3>
                        <ul class="text-white space-y-3">
                            <li class="mb-1">
                                <a href="aboutus.html" class="hover:opacity-50">About us</a>
                            </li>
                            <li class="mb-1">
                                <a href="FAQ.html" class="hover:opacity-50">FAQ</a>
                            </li>
                            <li class="mb-1">
                                <a href="contactus.php" class="hover:opacity-50">Contact us</a>
                            </li>
                            <li class="mb-1 pb-5">
                                <a href="shipping_response.html" class="hover:opacity-50">Careers</a>
                            </li>
                        </ul>
                    </div>




                    <div class="bg-zinc-950 p-5 md:col-span-2 lg:col-auto grow">
                        <h3 class="mb-2 text-base text-white text-sm font-bold pb-5 pt-6">JOIN OUR NEWSLETTER 🤫</h3>
                        <div>
                            <div>
                                <input type="email" name="email" id="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                    placeholder="Enter your email" required="">
                            </div>

                            <ul class="flex mt-9">
                                <li class="grow">
                                    <a>
                                        <svg width="25" height="25" viewBox="0 0 1792 1792" fill="#ffffff">
                                            <path
                                                d="M1152 896q0-106-75-181t-181-75-181 75-75 181 75 181 181 75 181-75 75-181zm138 0q0 164-115 279t-279 115-279-115-115-279 115-279 279-115 279 115 115 279zm108-410q0 38-27 65t-65 27-65-27-27-65 27-65 65-27 65 27 27 65zM896 266q-7 0-76.5-.5t-105.5 0-96.5 3-103 10T443 297q-50 20-88 58t-58 88q-11 29-18.5 71.5t-10 103-3 96.5 0 105.5.5 76.5-.5 76.5 0 105.5 3 96.5 10 103T297 1349q20 50 58 88t88 58q29 11 71.5 18.5t103 10 96.5 3 105.5 0 76.5-.5 76.5.5 105.5 0 96.5-3 103-10 71.5-18.5q50-20 88-58t58-88q11-29 18.5-71.5t10-103 3-96.5 0-105.5-.5-76.5.5-76.5 0-105.5-3-96.5-10-103T1495 443q-20-50-58-88t-88-58q-29-11-71.5-18.5t-103-10-96.5-3-105.5 0-76.5.5zm768 630q0 229-5 317-10 208-124 322t-322 124q-88 5-317 5t-317-5q-208-10-322-124t-124-322q-5-88-5-317t5-317q10-208 124-322t322-124q88-5 317-5t317 5q208 10 322 124t124 322q5 88 5 317z" />
                                        </svg>
                                    </a>
                                </li>

                                <li class="grow">
                                    <a>
                                        <svg width="25" height="25" viewBox="0 0 1792 1792" fill="#ffffff">
                                            <path
                                                d="M1684 408q-67 98-162 167 1 14 1 42 0 130-38 259.5T1369.5 1125 1185 1335.5t-258 146-323 54.5q-271 0-496-145 35 4 78 4 225 0 401-138-105-2-188-64.5T285 1033q33 5 61 5 43 0 85-11-112-23-185.5-111.5T172 710v-4q68 38 146 41-66-44-105-115t-39-154q0-88 44-163 121 149 294.5 238.5T884 653q-8-38-8-74 0-134 94.5-228.5T1199 256q140 0 236 102 109-21 205-78-37 115-142 178 93-10 186-50z" />
                                        </svg>
                                    </a>

                                </li>

                                <li class="grow">
                                    <a>
                                        <svg width="25" height="25" viewBox="0 0 1792 1792" fill="#ffffff">
                                            <path
                                                d="M1376 128q119 0 203.5 84.5T1664 416v960q0 119-84.5 203.5T1376 1664h-188v-595h199l30-232h-229V689q0-56 23.5-84t91.5-28l122-1V369q-63-9-178-9-136 0-217.5 80T948 666v171H748v232h200v595H416q-119 0-203.5-84.5T128 1376V416q0-119 84.5-203.5T416 128h960z" />
                                        </svg>
                                    </a>

                                </li>

                                <li>
                                    <a>
                                        <svg width="25" height="25" viewBox="0 0 1792 1792" fill="#ffffff">
                                            <path
                                                d="m711 1128 484-250-484-253v503zm185-862q168 0 324.5 4.5T1450 280l73 4q1 0 17 1.5t23 3 23.5 4.5 28.5 8 28 13 31 19.5 29 26.5q6 6 15.5 18.5t29 58.5 26.5 101q8 64 12.5 136.5T1792 788v176q1 145-18 290-7 55-25 99.5t-32 61.5l-14 17q-14 15-29 26.5t-31 19-28 12.5-28.5 8-24 4.5-23 3-16.5 1.5q-251 19-627 19-207-2-359.5-6.5T336 1512l-49-4-36-4q-36-5-54.5-10t-51-21-56.5-41q-6-6-15.5-18.5t-29-58.5T18 1254q-8-64-12.5-136.5T0 1004V828q-1-145 18-290 7-55 25-99.5T75 377l14-17q14-15 29-26.5t31-19.5 28-13 28.5-8 23.5-4.5 23-3 17-1.5q251-18 627-18z" />
                                        </svg>
                                    </a>

                                </li>

                            </ul>
                        </div>

                    </div>

    </footer>


</body>

</html>