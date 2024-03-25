<?php
session_start();

include("connections.php");
include("functions.php");
// Handle Filters
$filterConditions = [];
$filterValues = [];

$subtotal = 0;

$sortOption = isset($_GET['sort']) ? $_GET['sort'] : 'manual';

if (!empty($_GET['brand'])) {
    foreach ($_GET['brand'] as $brand) {
        $filterConditions[] = "brand = '". mysqli_real_escape_string($connection, $brand) ."'";
    }
}

if (!empty($_GET['colour'])) {
    foreach ($_GET['colour'] as $colour) {
        $filterConditions[] = "colour = '". mysqli_real_escape_string($connection, $colour) ."'";
    }
}

$sqlFilter = '';
if (!empty($filterConditions)) {
    $sqlFilter = " WHERE " . implode(' AND ', $filterConditions);
}

function isSelected($optionValue, $currentValue) {
  return $optionValue == $currentValue ? 'selected' : '';
}
// Function to get the current user's ID
function getCurrentUserID() {
  // Check if the user is logged in and their ID is stored in a session variable
  if (isset($_SESSION['user_id'])) {
      return $_SESSION['user_id'];
  } else {
      // Return a default value or handle the case where the user is not logged in
      return null;
  }
}

// Put product selected into the cart 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id'], $_POST['quantity'], $_POST['product_img'])) {
  $product_id = $_POST['product_id'];
  $quantity = $_POST['quantity'];

  // Check if the product_id is numeric to avoid SQL injection
  if (!is_numeric($product_id)) {
      die('Invalid product_id');
  }

  $query = "SELECT * FROM products WHERE product_id = $product_id";
  $result = mysqli_query($connection, $query);

  if ($result) {
      $product = mysqli_fetch_assoc($result);

      if (!isset($_SESSION['cart'])) {
          $_SESSION['cart'] = [];
      }
      
      $product_id = $_POST['product_id'];
      $product_name = $_POST['product_name'];
      $product_img = $_POST['product_img'];
      $quantity = $_POST['quantity'];
      $size = $_POST['size'];

      $_SESSION['cart'][] = [
          'product_id' => $product_id,
          'product_name' => $product_name,
          'price' => $product['price'],
          'quantity' => $quantity,
          'product_img' => $product_img, // Ensure correct image path here
          'size' => $size,
      ];

      echo 'Product added to cart';
  } else {
      echo 'Error fetching product information';
  }
}

// Handle removal of items from the cart
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'remove_from_cart') {
  if (isset($_POST['remove_index'])) {
      $removeIndex = $_POST['remove_index'];
      array_splice($_SESSION['cart'], $removeIndex, 1);
  }
  // Optionally, add a redirect here to refresh the page or handle as needed
  header("Location: " . htmlspecialchars($_SERVER["PHP_SELF"]));
  exit();
}

// Handle checkout
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'checkout') {
  if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
      $user_id = getCurrentUserID();
      if ($user_id) {
          foreach ($_SESSION['cart'] as $index => $item) {
              // Validate size data
              $product_size = $item['size'];

              processPurchase($item['product_id'], $item['quantity'], $product_size, $user_id, $connection);
          }
          // Clear the cart after checkout
          unset($_SESSION['cart']);
          echo 'Checkout successful!';
      } else {
          echo '<script>alert("Must be logged in to process purchase...");</script>';
      }
  } else {
      echo 'Your shopping cart is empty.';
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Sole Haven | Online Trainer and Exclusive Sneaker Shop</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="./images/logowhitefav.png" type="image/x-icon">

</head>

<style>
.image-container {
    white-space: nowrap;
    overflow-x: auto;
}

.image-container img {
    margin-right: 0px;
    margin-left: 0px;
    width: 465px;
    height: 107px;
    display: inline-block;
}

@media (max-width: 600px) {
    .image-container {
        white-space: initial;
        overflow-x: initial;
    }

    .image-container img {
        flex-basis: auto;
        margin-right: 0;
        margin-left: 0;
    }
}


/*--Section for the "best sellers" section--*/
.image-section {
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-start;
    margin-top: 20px;
    margin-left: 17px
}

.image-section .item-container {
    margin: 5px;
    max-width: calc(20% - 10px);
    height: auto;
    float: left;
}

@media (max-width: 600px) {
    .image-section img {
        flex-basis: calc(50% - 10px);
        width: 100%;
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
}


.shoe-name {
    font-size: 14px;
    font-weight: bold;
    margin-bottom: 5px;
    z-index: 5;
}

.price {
    font-size: 12px;
}

img:hover {
    transform: scale(1.1);
}

.group:hover .absolute {
    display: block;
}

/* Additional styles for the sub-menus */
.absolute {
    display: none;
}
</style>



<body class="overflow-x-hidden flex flex-col min-h-screen" x-data="{ openFilter : false}">
    <header class="items-center bg-zinc-950 md:px">
        <div class="flex flex-wrap place-items-center">
            <section class="relative mx-auto">
                <!-- navbar -->
                <nav class="flex justify-between w-screen">
                    <div class="px-2 flex w-full py-2 items-center">
                        <a class="" href="index.php">
                            <img class="h-6 mr-60" src="./images/logowhite.png" alt="logo" />
                        </a>

                        <!-- Nav Links -->
                        <ul class="hidden md:flex mx-auto space-x-12 text-l text-white">
                            <li><a class="hover:text-gray-300" href="./newarrivals.php">New Arrivals</a></li>
                            <li><a class="hover:text-gray-300" href="./best_sellers.php">Best Sellers</a></li>

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
                                            href="./sneakers_men.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Men</a>
                                    </li>
                                    <li><a href="./sneakers_women.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Women</a></li>
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
                                <a class="hover:text-gray-300" href="./apparel.php">Apparel
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
                                <a class="hover:text-gray-300" href="./accessories.php">Accessories
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

                            <!-- Discover Hover Menu -->
                            <li class="relative group">
                                <a class="hover:text-gray-300 pr-40" href="discover.php">Discover
                                    <svg aria-hidden="true" class="w-5 inline-block origin-center rotate-90"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="icon icon-arrow-right">
                                        <path d="m9 18 6-6-6-6" />
                                    </svg>
                                </a>
                                <!-- Add sub-menu items for Discover -->
                            </li>
                        </ul>
                        <!-- Header Icons -->
                        <div class="hidden xl:flex items-center -space-x-1 pr-6 text-gray-100">
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


                            <div id="cart-icon" class="cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-cart w-10">
                                    <circle cx="9" cy="21" r="1"></circle>
                                    <circle cx="20" cy="21" r="1"></circle>
                                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                </svg>
                            </div>

                            <!-- Cart Sidebar Container -->
                            <div id="cart-sidebar"
                                class="fixed right-0 top-0 transform translate-x-full h-full bg-white p-5 rounded shadow-lg min-w-[300px] z-50 transition-transform duration-300 flex flex-col text-black">
                                <header class="relative w-full p-2">
                                    <h3 class="text-xl font-medium tracking-wide flex items-center"> Your Cart
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" class="icon icon-cart w-5 ml-2">
                                            <circle cx="9" cy="21" r="1"></circle>
                                            <circle cx="20" cy="21" r="1"></circle>
                                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                            </path>
                                        </svg>
                                    </h3>
                                </header>

                                <div class="mb-4 border-t border-zinc-300 mt-4"></div>


                                <!-- Cart Items -->
                                <div class="flex-grow overflow-y-auto">
                                    <div class="items mb-4">


                                        <?php
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
  foreach ($_SESSION['cart'] as $index => $item) {
      $itemTotal = $item['price'] * $item['quantity'];
      $subtotal += $itemTotal;
        // Echo HTML for each cart item
        echo '<div class="cart-item flex items-center justify-between mb-4">';
        echo '<img src="' . $item['product_img'] . '" alt="' . $item['product_name'] . '" class="w-20 h-20 object-cover mr-4">';
        echo '<div>';
        echo '<h4 class="text-sm font-semibold">' . $item['product_name'] . '</h4>';
        echo '<div class="text-xs">Size: <span class="value">' . $item['size'] . '</span></div>';
        echo '<span class="text-xs">£' . number_format($item['price'], 2) . ' x ' . $item['quantity'] . '</span>';
        echo '</div>';

        // Echo form for the removal button with SVG
        echo '<div class="ml-auto">';
        echo '<form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">';
        echo '<input type="hidden" name="remove_index" value="' . $index . '">';
        echo '<input type="hidden" name="action" value="remove_from_cart">';
        echo '<button type="submit" class="remove-btn" style="background: none; border: none; cursor: pointer; padding: 0;">';

        
        echo '<svg width="28" height="28" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M19 24h-14c-1.104 0-2-.896-2-2v-17h-1v-2h6v-1.5c0-.827.673-1.5 1.5-1.5h5c.825 0 1.5.671 1.5 1.5v1.5h6v2h-1v17c0 1.104-.896 2-2 2zm0-19h-14v16.5c0 .276.224.5.5.5h13c.276 0 .5-.224.5-.5v-16.5zm-9 4c0-.552-.448-1-1-1s-1 .448-1 1v9c0 .552.448 1 1 1s1-.448 1-1v-9zm6 0c0-.552-.448-1-1-1s-1 .448-1 1v9c0 .552.448 1 1 1s1-.448 1-1v-9zm-2-7h-4v1h4v-1z"/></svg>';
        echo '</button>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
        echo '<div class="mb-4 border-t border-zinc-300 mt-4"></div>';
    }

} else {
    echo 'Your cart is empty.';
}
?>
                                    </div>
                                </div>


                                <!-- Cart Total -->
                                <div class="mt-auto">
                                    <div class="border-t pt-4">
                                        <h4 class="text-lg font-medium">Subtotal:
                                            £<?php echo number_format($subtotal, 2); ?></h4>
                                    </div>
                                    <a href="cart.php"
                                        class="block text-center bg-black text-white p-2 rounded mt-3">Checkout</a>
                                </div>
                            </div>

                </nav>
            </section>
        </div>
    </header>

    <section>

    </section>


    <!--This page was created by Mohammed Zeinelabdin-->
    <div class="px-1 py-2 md:py-2 sm:px-2 bg-zinc-950">
        <ul class="text-white">
            <li class="flex items-center mb-1 text-xl font-thin md:mb-1 md:text-2xl lg:text-4xl">
                <a href="./apparel.php"
                    class="text-white hover:text-neutral-500">&nbsp;&nbsp;</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Apparel</a></a>
            </li>
        </ul>
    </div>


    <div style="border-top: 1px solid black;">
        <div class="flex justify-end items-center px-4 md:px-4 border-t border-black">
            <button id="openFilterBtn" type="button" class="flex items-center mr-auto py-3">
                Filter
                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" role="presentation"
                    class="ml-2 w-6 color-black icon icon-filter" fill="none" viewBox="0 11 20 20">
                    <line x1="16.5" y1="17.5" x2="3.5" y2="17.5" stroke="currentColor" stroke-linecap="round"></line>
                    <line x1="16.5" y1="24.5" x2="3.5" y2="24.5" stroke="currentColor" stroke-linecap="round"></line>
                    <circle cx="13" cy="24.5" r="2" fill="white" stroke="currentColor"></circle>
                    <circle cx="7" cy="17.5" r="2" fill="white" stroke="currentColor"></circle>
                </svg>
            </button>
            <select id="sort-by" x-data x-model="sort" @change="sortCollection()"
                class="font-medium text-sm border-none text-right focus:ring-0">
                <option value="manual" selected="selected"> Featured </option>
                <option value="best-selling"> Best selling </option>
                <option value="title-ascending"> Alphabetically, A-Z </option>
                <option value="title-descending"> Alphabetically, Z-A </option>
                <option value="price-ascending"> Price, low to high </option>
                <option value="price-descending"> Price, high to low </option>
                <option value="created-ascending"> Date, old to new </option>
                <option value="created-descending"> Date, new to old </option>
            </select>
        </div>
        <div style="border-top: 1px solid black;"></div>
    </div>

    <div class="image-section">
        <div class="item-container" data-brand="socks" data-size="8" data-price="23" data-color="black">
            <img src="images/apparel_socks/socks_1.png">
            <br>
            <div class="text-container">
                <div class="shoe-name">Nike 6-Pack Everyday Cushioned Training Crew Socks</div>
                <div class="price">from £23</div>
            </div>
        </div>

        <div class="item-container" data-brand="socks" data-size="8" data-price="20" data-color="black">
            <img src="images/apparel_socks/socks_2.png">
            <br>
            <div class="text-container">
                <div class="shoe-name">adidas Originals 6 Pack Trefoil Crew Socks</div>
                <div class="price">from £20</div>
            </div>
        </div>

        <div class="item-container" data-brand="socks" data-size="8" data-price="12" data-color="black">
            <img src="images/apparel_socks/socks_3.png">
            <br>
            <div class="text-container">
                <div class="shoe-name">Under Armour 3 Pack HeatGear Tech Crew Socks</div>
                <div class="price">from £12</div>
            </div>
        </div>

        <div class="item-container" data-brand="socks" data-size="8" data-price="11" data-color="black">
            <img src="images/apparel_socks/socks_4.png">
            <br>
            <div class="text-container">
                <div class="shoe-name">Under Armour 3 Pack HeatGear Tech No Show Socks</div>
                <div class="price">from £11</div>
            </div>
        </div>

        <div class="item-container" data-brand="socks" data-size="8" data-price="11" data-color="black">
            <img src="images/apparel_socks/socks_5.png">
            <br>
            <div class="text-container">
                <div class="shoe-name">MONTIREX 3-Pack Crew Socks</div>
                <div class="price">from £15</div>
            </div>
        </div>


        <div class="item-container" data-brand="socks" data-size="8" data-price="18" data-color="black">
            <img src="images/apparel_socks/socks_6.png">
            <br>
            <div class="text-container">
                <div class="shoe-name">Jordan 3-Pack Everyday Crew Socks</div>
                <div class="price">from £18</div>
            </div>
        </div>


        <div class="item-container" data-brand="socks" data-size="8" data-price="35" data-color="black">
            <img src="images/apparel_socks/socks_7.png">
            <br>
            <div class="text-container">
                <div class="shoe-name">HUGO 6-Pack Ribbed Logo Socks</div>
                <div class="price">from £35</div>
            </div>
        </div>

        <div class="item-container" data-brand="socks" data-size="8" data-price="35" data-color="black">
            <img src="images/apparel_socks/socks_8.png">
            <br>
            <div class="text-container">
                <div class="shoe-name">Lacoste 3-Pack Quarter Socks</div>
                <div class="price">from £35</div>
            </div>
        </div>


        <div class="item-container" data-brand="socks" data-size="8" data-price="12" data-color="black">
            <img src="images/apparel_socks/socks_9.png">
            <br>
            <div class="text-container">
                <div class="shoe-name">Hoodrich 3-Pack Crew Socks</div>
                <div class="price">from £12</div>
            </div>
        </div>


        <div class="item-container" data-brand="socks" data-size="8" data-price="12" data-color="black">
            <img src="images/apparel_socks/socks_10.png">
            <br>
            <div class="text-container">
                <div class="shoe-name">Nike 1-Pack Everyday Plus Cushioned Crew Socks</div>
                <div class="price">from £12</div>
            </div>
        </div>


        <div class="item-container" data-brand="socks" data-size="8" data-price="17" data-color="black">
            <img src="images/apparel_socks/socks_11.png">
            <br>
            <div class="text-container">
                <div class="shoe-name">Nike Everyday Plus Cushioned Crew Socks (3-Pack)</div>
                <div class="price">from £17</div>
            </div>
        </div>

        <div class="item-container" data-brand="socks" data-size="8" data-price="22" data-color="black">
            <img src="images/apparel_socks/socks_12.png">
            <br>
            <div class="text-container">
                <div class="shoe-name">Nike 6-Pack Terry Socks Infant</div>
                <div class="price">from £22</div>
            </div>
        </div>

        <div class="item-container" data-brand="socks" data-size="8" data-price="18" data-color="black">
            <img src="images/apparel_socks/socks_13.png">
            <br>
            <div class="text-container">
                <div class="shoe-name">HUGO 3-Pack Invisible Socks</div>
                <div class="price">from £18</div>
            </div>
        </div>

        <div class="item-container" data-brand="socks" data-size="8" data-price="16" data-color="black">
            <img src="images/apparel_socks/socks_14.png">
            <br>
            <div class="text-container">
                <div class="shoe-name">Jordan 6-Pack Ankle Socks Junior</div>
                <div class="price">from £16</div>
            </div>
        </div>

        <div class="item-container" data-brand="socks" data-size="8" data-price="12" data-color="black">
            <img src="images/apparel_socks/socks_15.png">
            <br>
            <div class="text-container">
                <div class="shoe-name">Nike 1-Pack Everyday Plus Cushioned Crew Socks</div>
                <div class="price">from £12</div>
            </div>
        </div>

        <div class="item-container" data-brand="socks" data-size="8" data-price="17" data-color="black">
            <img src="images/apparel_socks/socks_16.png">
            <br>
            <div class="text-container">
                <div class="shoe-name">Nike Everyday Plus Cushioned Crew Socks (3-Pack)</div>
                <div class="price">from £17</div>
            </div>
        </div>

        <div class="item-container" data-brand="socks" data-size="8" data-price="20" data-color="black">
            <img src="images/apparel_socks/socks_17.png">
            <br>
            <div class="text-container">
                <div class="shoe-name">Jordan 6-Pack Ankle Socks Junior</div>
                <div class="price">from £20</div>
            </div>
        </div>

        <div class="item-container" data-brand="socks" data-size="8" data-price="13" data-color="black">
            <img src="images/apparel_socks/socks_18.png">
            <br>
            <div class="text-container">
                <div class="shoe-name">Nike 2-Pack Crew Court Heritage Socks</div>
                <div class="price">from £13</div>
            </div>
        </div>

        <div class="item-container" data-brand="socks" data-size="8" data-price="13" data-color="black">
            <img src="images/apparel_socks/socks_19.png">
            <br>
            <div class="text-container">
                <div class="shoe-name">Under Armour Low Socks UA Essential Low Cut 3pk</div>
                <div class="price">from £13</div>
            </div>
        </div>

        <div class="item-container" data-brand="socks" data-size="8" data-price="12" data-color="black">
            <img src="images/apparel_socks/socks_20.png">
            <br>
            <div class="text-container">
                <div class="shoe-name">MONTIREX 3 Pack No Show Socks</div>
                <div class="price">from £12</div>
            </div>
        </div>


        <div class="item-container" data-brand="cleaning" data-size="8" data-price="17" data-color="black">
            <img src="images/apparel_shoecare/shoecare_1.png">
            <br>
            <div class="text-container">
                <div class="shoe-name">XL polishing brush - horsehair</div>
                <div class="price">from £17</div>
            </div>
        </div>

        <div class="item-container" data-brand="cleaning" data-size="8" data-price="15.50" data-color="black">
            <img src="images/apparel_shoecare/shoecare_2.png">
            <br>
            <div class="text-container">
                <div class="shoe-name">Leather Cleaner</div>
                <div class="price">from £15.50</div>
            </div>
        </div>

        <div class="item-container" data-brand="cleaning" data-size="8" data-price="15.50" data-color="black">
            <img src="images/apparel_shoecare/shoecare_3.png">
            <br>
            <div class="text-container">
                <div class="shoe-name">Foam Cleaner</div>
                <div class="price">from £15.50</div>
            </div>
        </div>

        <div class="item-container" data-brand="cleaning" data-size="8" data-price="16" data-color="black">
            <img src="images/apparel_shoecare/shoecare_4.png">
            <br>
            <div class="text-container">
                <div class="shoe-name">Vegetable tanned leather cream</div>
                <div class="price">from £16</div>
            </div>
        </div>

        <div class="item-container" data-brand="cleaning" data-size="8" data-price="8.50" data-color="black">
            <img src="images/apparel_shoecare/shoecare_5.png">
            <br>
            <div class="text-container">
                <div class="shoe-name">Saddle Soap</div>
                <div class="price">from £8.50</div>
            </div>
        </div>


        <div class="item-container" data-brand="cleaning" data-size="8" data-price="52" data-color="black">
            <img src="images/apparel_shoecare/shoecare_6.png">
            <br>
            <div class="text-container">
                <div class="shoe-name">Polishing glove</div>
                <div class="price">from £52</div>
            </div>
        </div>


        <div class="item-container" data-brand="kits" data-size="8" data-price="5" data-color="black">
            <img src="images/apparel_shoecare/shoecare_7.png">
            <br>
            <div class="text-container">
                <div class="shoe-name">Colour chart</div>
                <div class="price">from £5</div>
            </div>
        </div>

        <div class="item-container" data-brand="kits" data-size="8" data-price="11.50" data-color="black">
            <img src="images/apparel_shoecare/shoecare_8.png">
            <br>
            <div class="text-container">
                <div class="shoe-name">Applicator and polishing cloths - set of 3</div>
                <div class="price">from £11.50</div>
            </div>
        </div>


        <div class="item-container" data-brand="cleaning" data-size="8" data-price="9.50" data-color="black">
            <img src="images/apparel_shoecare/shoecare_9.png">
            <br>
            <div class="text-container">
                <div class="shoe-name">Premium Shoe Cream - Natural</div>
                <div class="price">from £9.50</div>
            </div>
        </div>

        <div class="item-container" data-brand="kits" data-size="8" data-price="24" data-color="black">
            <img src="images/apparel_shoecare/shoecare_10.png">
            <br>
            <div class="text-container">
                <div class="shoe-name">Trainer Freshener, Cleaner, Trainer Protector & Brush</div>
                <div class="price">from £24</div>
            </div>
        </div>

        <div class="item-container" data-brand="kits" data-size="8" data-price="40" data-color="black">
            <img src="images/apparel_kits/kits_1.png">
            <br>
            <div class="text-container">
                <div class="shoe-name">Shoe Clean and Care Kit - 9 Piece Shoe Care Set</div>
                <div class="price">from £40</div>
            </div>
        </div>

        <div class="item-container" data-brand="kits" data-size="8" data-price="30" data-color="black">
            <img src="images/apparel_kits/kits_2.png">
            <br>
            <div class="text-container">
                <div class="shoe-name">Shoe Polish & Care Kit</div>
                <div class="price">from £30</div>
            </div>
        </div>

        <div class="item-container" data-brand="kits" data-size="8" data-price="15.50" data-color="black">
            <img src="images/apparel_kits/kits_3.png">
            <br>
            <div class="text-container">
                <div class="shoe-name">Jason Markk 4 oz. Essential Kit</div>
                <div class="price">from £15.50</div>
            </div>
        </div>

        <div class="item-container" data-brand="kits" data-size="8" data-price="5.99" data-color="black">
            <img src="images/apparel_kits/kits_4.png">
            <br>
            <div class="text-container">
                <div class="shoe-name">Stormsure Boot & Wader Repair Kit</div>
                <div class="price">from £5.99</div>
            </div>
        </div>

        <div class="item-container" data-brand="kits" data-size="8" data-price="16" data-color="black">
            <img src="images/apparel_kits/kits_5.png">
            <br>
            <div class="text-container">
                <div class="shoe-name">Stormsure Boot & Wader Repair Kit</div>
                <div class="price">from £16</div>
            </div>
        </div>

    </div>


    <div id="app">
        <!-- Filter tab -->
        <!-- Filter modal -->
        <div id="filterModal" class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 hidden">
            <div class="flex justify-center items-center h-full">
                <div class="bg-white p-8 rounded-lg">
                    <h2 class="text-xl font-semibold mb-4">Filter Options</h2>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="brandSelect">Item Type</label>
                        <select id="brandSelect" class="mt-1 p-2 border rounded-md w-full">
                            <option value="">Select Item Type</option>
                            <option value="socks">Socks</option>
                            <option value="cleaning">Cleaning Equipment</option>
                            <option value="kits">Kits</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="sizeSelect">Size</label>
                        <select id="sizeSelect" class="mt-1 p-2 border rounded-md w-full">
                            <option value="">N/A</option>
                            <option value="">N/A</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="priceSelect">Price</label>
                        <select id="priceSelect" class="mt-1 p-2 border rounded-md w-full">
                            <option value="">Select Price Range</option>
                            <option value="0-50">£20></option>
                            <option value="51-100">£20-£55</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="colorSelect">Color</label>
                        <select id="colorSelect" class="mt-1 p-2 border rounded-md w-full">
                            <option value="">N/A</option>
                            <option value="N/A">N/A</option>
                    </div>
                    </select>
                </div>
                <button id="applyFilterBtn" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Apply
                    Filter</button>
                <button id="closeFilterBtn"
                    class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md ml-2 hover:bg-gray-400">Close</button>
            </div>
        </div>
    </div>


    <!-- close button -->
    <button @click="openFilter = !openFilter" class="absolute top-0 left-0 bottom-0 right-0">
        <svg class="w-6 h-6 absolute top-2 right-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </button>
    </header>
    </div>

    <!-- Include Vue.js -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>

    <script>
    new Vue({
        el: '#app',
        data: {
            openFilter: false
        }
    });
    </script>


    </header>

</body>

<!-- footer section -->
<footer class="bg-zinc-950 px-24 mt-auto">

    <div class="flex gap-x-12">

        <div class="">
            <div class=" bg-zinc-950 p-5 md:col-span-2 lg:col-auto">
                <h3 class="mb-2 text-base text-white text-sm font-bold pb-5 pt-6 grow">FIND US 🗺️</h3>
                <div class="">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2429.5812611345723!2d-1.8908227230241506!3d52.48671703869282!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4870bc9ae4f2e4b3%3A0x9a670ba18e08a084!2sAston%20University!5e0!3m2!1sen!2suk!4v1701019587175!5m2!1sen!2suk"
                        width="370" height="130" class="rounded-xl" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade""></iframe>     
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


<!-- JavaScript for filter modal -->
<!-- JavaScript for filter modal -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const filterBtn = document.getElementById("openFilterBtn");
    const filterModal = document.getElementById("filterModal");
    const closeFilterBtn = document.getElementById("closeFilterBtn");

    filterBtn.addEventListener("click", function() {
        filterModal.classList.remove("hidden");
    });

    closeFilterBtn.addEventListener("click", function() {
        filterModal.classList.add("hidden");
    });

    const applyFilterBtn = document.getElementById("applyFilterBtn");

    applyFilterBtn.addEventListener("click", function() {
        applyFilter();
        filterModal.classList.add("hidden");
    });

    closeFilterBtn.addEventListener("click", function() {
        filterModal.classList.add("hidden");
    });

    function applyFilter() {
        const selectedBrand = document.getElementById("brandSelect").value.toLowerCase();
        const selectedSize = document.getElementById("sizeSelect").value.toLowerCase();
        const selectedPriceRange = document.getElementById("priceSelect").value.toLowerCase();
        const selectedColor = document.getElementById("colorSelect").value.toLowerCase();

        const imageSections = document.querySelectorAll('.image-section');

        imageSections.forEach(function(section) {
            const productContainers = section.querySelectorAll('.item-container');

            productContainers.forEach(function(container) {
                const brand = container.getAttribute('data-brand').toLowerCase();
                const size = container.getAttribute('data-size').toLowerCase();
                const price = parseInt(container.getAttribute('data-price'));
                const color = container.getAttribute('data-color').toLowerCase();

                let isVisible = false;

                if ((selectedBrand === '' || brand === selectedBrand) &&
                    (selectedSize === '' || size === selectedSize) &&
                    (selectedColor === '' || color === selectedColor) &&
                    ((selectedPriceRange === "0-50" && price >= 10 && price <= 20) ||
                        (selectedPriceRange === "51-100" && price >= 20 && price <= 55) ||
                        selectedPriceRange === '')) {
                    isVisible = true;
                }

                if (isVisible) {
                    container.style.display = 'block';
                } else {
                    container.style.display = 'none';
                }
            });
        });
    }
});
</script>


<script>
function sortCollection() {
    var sortBy = document.getElementById("sort-by").value;
    if (sortBy === "title-ascending") {
        var container = document.querySelector(".image-section");
        var items = container.querySelectorAll(".item-container");

        // Convert NodeList to Array for easier manipulation
        items = Array.from(items);

        // Sort items alphabetically by shoe name
        items.sort(function(a, b) {
            var nameA = a.querySelector(".shoe-name").textContent.trim().toUpperCase();
            var nameB = b.querySelector(".shoe-name").textContent.trim().toUpperCase();
            if (nameA < nameB) {
                return -1;
            }
            if (nameA > nameB) {
                return 1;
            }
            return 0;
        });

        // Remove existing items from container
        items.forEach(function(item) {
            container.removeChild(item);
        });

        // Append sorted items back to container
        items.forEach(function(item) {
            container.appendChild(item);
        });
    }
}

// Event listener for dropdown change
document.getElementById("sort-by").addEventListener("change", sortCollection);
</script>

<script>
// Function to shuffle array in place
function shuffleArray(array) {
    for (var i = array.length - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        var temp = array[i];
        array[i] = array[j];
        array[j] = temp;
    }
    return array;
}

// Function to sort by shoe name alphabetically, A-Z
function sortByAlphabetAscending() {
    var container = document.querySelector(".image-section");
    var items = container.querySelectorAll(".item-container");
    items = Array.from(items);
    items.sort(function(a, b) {
        var nameA = a.querySelector(".shoe-name").textContent.trim().toUpperCase();
        var nameB = b.querySelector(".shoe-name").textContent.trim().toUpperCase();
        if (nameA < nameB) {
            return -1;
        }
        if (nameA > nameB) {
            return 1;
        }
        return 0;
    });
    items.forEach(function(item) {
        container.appendChild(item);
    });
}

// Function to sort by shoe price, low to high
function sortByPriceAscending() {
    var container = document.querySelector(".image-section");
    var items = container.querySelectorAll(".item-container");
    items = Array.from(items);
    items.sort(function(a, b) {
        var priceA = parseFloat(a.getAttribute("data-price"));
        var priceB = parseFloat(b.getAttribute("data-price"));
        return priceA - priceB;
    });
    items.forEach(function(item) {
        container.appendChild(item);
    });
}

// Function to sort by shoe price, high to low
function sortByPriceDescending() {
    var container = document.querySelector(".image-section");
    var items = container.querySelectorAll(".item-container");
    items = Array.from(items);
    items.sort(function(a, b) {
        var priceA = parseFloat(a.getAttribute("data-price"));
        var priceB = parseFloat(b.getAttribute("data-price"));
        return priceB - priceA;
    });
    items.forEach(function(item) {
        container.appendChild(item);
    });
}

// Function to sort randomly while keeping consistent order
function sortRandomConsistent() {
    var container = document.querySelector(".image-section");
    var items = container.querySelectorAll(".item-container");
    items = Array.from(items);
    var shuffledItems = shuffleArray(items);
    shuffledItems.forEach(function(item) {
        container.appendChild(item);
    });
}

function sortCollection() {
    var sortBy = document.getElementById("sort-by").value;
    switch (sortBy) {
        case "best-selling":
            // Random order, but consistent
            sortRandomConsistent();
            break;
        case "title-ascending":
            // Alphabetically, A-Z
            sortByAlphabetAscending();
            break;
        case "price-ascending":
            // Price, low to high
            sortByPriceAscending();
            break;
        case "price-descending":
            // Price, high to low
            sortByPriceDescending();
            break;
        case "created-ascending":
            // Random order, but consistent
            sortRandomConsistent();
            break;
        case "created-descending":
            // Random order, but consistent
            sortRandomConsistent();
            break;
        default:
            // Default behavior (Featured), do nothing
            break;
    }
}

// Event listener for dropdown change
document.getElementById("sort-by").addEventListener("change", sortCollection);
</script>

<script>
function sortCollection() {
    var sortBy = document.getElementById("sort-by").value;
    if (sortBy === "title-descending") {
        var container = document.querySelector(".image-section");
        var items = container.querySelectorAll(".item-container");

        // Convert NodeList to Array for easier manipulation
        items = Array.from(items);

        // Sort items alphabetically by shoe name in descending order
        items.sort(function(a, b) {
            var nameA = a.querySelector(".shoe-name").textContent.trim().toUpperCase();
            var nameB = b.querySelector(".shoe-name").textContent.trim().toUpperCase();
            if (nameA > nameB) {
                return -1;
            }
            if (nameA < nameB) {
                return 1;
            }
            return 0;
        });

        // Remove existing items from container
        items.forEach(function(item) {
            container.removeChild(item);
        });

        // Append sorted items back to container
        items.forEach(function(item) {
            container.appendChild(item);
        });
    }
}

// Event listener for dropdown change
document.getElementById("sort-by").addEventListener("change", sortCollection);
</script>


<script>
function sortCollection() {
    var sortBy = document.getElementById("sort-by").value;
    if (sortBy === "price-ascending") {
        var container = document.querySelector(".image-section");
        var items = container.querySelectorAll(".item-container");

        // Convert NodeList to Array for easier manipulation
        items = Array.from(items);

        // Sort items by price in ascending order
        items.sort(function(a, b) {
            var priceA = parseInt(a.getAttribute("data-price"));
            var priceB = parseInt(b.getAttribute("data-price"));
            return priceA - priceB;
        });

        // Remove existing items from container
        items.forEach(function(item) {
            container.removeChild(item);
        });

        // Append sorted items back to container
        items.forEach(function(item) {
            container.appendChild(item);
        });
    }
}

// Event listener for dropdown change
document.getElementById("sort-by").addEventListener("change", sortCollection);



function sortCollection() {
    var sortBy = document.getElementById("sort-by").value;
    if (sortBy === "price-descending") {
        var container = document.querySelector(".image-section");
        var items = container.querySelectorAll(".item-container");

        // Convert NodeList to Array for easier manipulation
        items = Array.from(items);

        // Sort items by price in descending order
        items.sort(function(a, b) {
            var priceA = parseInt(a.getAttribute("data-price"));
            var priceB = parseInt(b.getAttribute("data-price"));
            return priceB - priceA;
        });

        // Remove existing items from container
        items.forEach(function(item) {
            container.removeChild(item);
        });

        // Append sorted items back to container
        items.forEach(function(item) {
            container.appendChild(item);
        });
    }
}

// Event listener for dropdown change
document.getElementById("sort-by").addEventListener("change", sortCollection);


// Function to handle sorting
function sortCollection() {
    var sortBy = document.getElementById("sort-by").value;

    // Check if the selected option is "Featured"
    if (sortBy === "manual") {
        // Reload the page to revert to original order
        location.reload();
    } else {
        // Otherwise, handle other sorting options
        // Add sorting logic for other options here
    }
}

// Event listener for dropdown change
document.getElementById("sort-by").addEventListener("change", sortCollection);


document.getElementById('cart-icon').addEventListener('click', function() {
    var sidebar = document.getElementById('cart-sidebar');
    if (sidebar.classList.contains('translate-x-full')) {
        sidebar.classList.remove('translate-x-full');
        sidebar.classList.add('translate-x-0');
    } else {
        sidebar.classList.remove('translate-x-0');
        sidebar.classList.add('translate-x-full');
    }
});

// Close the sidebar when clicking outside of it
document.addEventListener('click', function(event) {
    var sidebar = document.getElementById('cart-sidebar');
    var clickInsideCartIcon = document.getElementById('cart-icon').contains(event.target);
    var clickInsideSidebar = sidebar.contains(event.target);

    if (!clickInsideCartIcon && !clickInsideSidebar && !sidebar.classList.contains('translate-x-full')) {
        sidebar.classList.remove('translate-x-0');
        sidebar.classList.add('translate-x-full');
    }
});
</script>






</body>

</html>