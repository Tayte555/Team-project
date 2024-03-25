<?php
session_start();

include("connections.php");
include("functions.php");

$subtotal = 0;

// Check if the product ID is provided in the URL
if(isset($_GET['id'])) {
    $product_id = $_GET['id'];
    // Fetch product details based on the provided ID
    $product = getAllProductDetails($product_id, $connection);
} else {
    // Redirect or handle the case when the product ID is not provided
    // For example, you can redirect the user to another page or show an error message
    header("Location: index.php");
    exit(); // Ensure script execution stops after redirection
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title> Sole Haven | Product</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/7623f015c6.js" crossorigin="anonymous"></script>
    <link rel="icon" href="./images/logowhitefav.png" type="image/x-icon">
</head>

<style>
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}



.main-wrapper {
    max-height: 100%;
    background-color: rgb(240, 240, 230);
    display: flex;
    align-items: center;
    justify-content: center;
}

.container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 8px;
}

.product-div {
    margin: 1rem 0;
    padding: 2rem 0;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    background-color: rgb(240, 250, 240);
    border-radius: 15px;
    column-gap: 10px;
}

.product-div-left {
    padding: 20px;
}

.product-div-right {
    padding: 20px;
}

.img-container img {
    width: 350px;
    margin: 0 auto;
}

.hover-container {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    margin-top: 32px;
}

.hover-container div {
    border: 2px solid rgb(180, 180, 180);
    padding: 1rem;
    border-radius: 3px;
    margin: 0 4px 8px 4px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.active {
    border-color: rgb(180, 180, 180) !important;
}

.hover-container div:hover {
    border-color: rgb(180, 180, 180) !important;
}

.hover-container div img {
    width: 50px;
    cursor: pointer;
}

.product-div-right span {
    display: block;
}

.product-name {
    font-size: 26px;
    margin-bottom: 22px;
    font-weight: 700;
    letter-spacing: 1px;
    opacity: 0.9;
}

.product-price {
    font-weight: 700;
    font-size: 24px;
    opacity: 0.9;
    font-weight: 500;
}

.product-rating {
    display: flex;
    align-items: center;
    margin-top: 12px;
}

.product-rating:hover {
    box-shadow: 5px, 5px, 5px, 0.15;
}

.product-rating span {
    margin-right: 6px;
}

.product-description {
    font-weight: 18px;
    line-height: 1.6;
    font-weight: 300;
    opacity: 0.9;
    margin-top: 22px;
}

.btn-groups {
    margin-top: 22px;
    margin-bottom: 22px;
    align-items: center;
    display: flex;
    justify-content: center;
}

.btn-groups button {
    display: inline-block;
    font-size: 16px;
    font-family: inherit;
    text-transform: uppercase;
    padding: 15px 16px;
    color: rgb(0, 0, 0);
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-groups button .fas {
    margin-right: 8px;
}

.add-cart-btn {
    background-color: rgb(180, 180, 180);
    border: 2px solid rgb(0, 0, 0);
    margin-right: 8px;
    transition: background-color 0.15s, color 0.15s, opacity 0.15s;
}

.add-cart-btn:hover {
    background-color: rgb(170, 170, 170);
    color: rgb(240, 240, 240);
}

.add-cart-btn:active {
    opacity: 0.3;
}

.buy-now-btn {
    background-color: rgb(0, 0, 0);
    border: 2px solid rgb(0, 0, 0);
    transition: background-color 0.15s, color 0.15s, opacity 0.15s;
}

.buy-now-btn:hover {
    background-color: rgb(20, 180, 0);
    color: rgb(240, 240, 240);
    opacity: 0.7;
}

.buy-now-btn:active {
    opacity: 0.2;
}

.select-size {
    font-size: 20px;
    margin-top: 15px;

}

.size-group {
    border-color: red;
    border: 2px solid rgb(0, 0, 0);
    display: flex;
    align-items: center;
    justify-content: center;
    color: rgb(0, 0, 0);
    margin-top: 10px;

    padding: 6px 6px 6px 6px;
    position: relative;
}

.size-btn {
    padding-left: 11px;
    border-color: rgb(189, 179, 179);
    display: flex;
    align-items: center;
    justify-content: center;
    padding-right: 11px;
    padding-top: 10px;
    padding-bottom: 10px;
    width: 40px;
    margin-right: 7px;
    margin-right: 3px;
    height: 45px;
    font-size: 20px;
    font-weight: bold;
    transition: opacity 0.15s, border 0.20s, padding 0.2s;
}

.size-btn:hover {

    color: rgb(0, 0, 0);
    border: 2px solid rgba(0, 0, 0, 0.4);
    padding-left: 9px;
    padding-right: 9px;
    padding-top: 8px;
    padding-bottom: 8px;

}

.size-btn:active {
    opacity: 0.3;
    color: red;
    border: 2px solid rgba(0, 0, 0, 0.4);
}

.size-btn:focus {
    background: rgb(230, 230, 230);
    color: black;
    border: 2px solid rgba(0, 0, 0, 0.4);
}


@media screen and (max-width: 992px) {
    .product-div {
        grid-template-columns: 100%;
    }

    .product-div-right {
        text-align: center;
    }

    .product-rating {
        justify-content: center;
    }

    .product-description {
        max-width: 400;
        margin-right: auto;
        margin-left: auto;
    }
}

@media screen and (max-width: 400px) {
    .btn-groups button {
        width: 100%;
        margin-bottom: 10px;
    }
}
</style>

<script>
const allHoverImages = document.querySelectorAll('.hover-container div img')
const imgContainer = document.querySelector('.img-container');

window.addEventListener('DOMContentLoaded', () => {
    allHoverImages[0].parentElement.classList.add('active');
});

allHoverImages.forEach((image) => {
    image.addEventListener('mouseover', () => {
        imgContainer.querySelector('img').src = image.src;
        resetActiveImg();
        image.parentElement.classList.add('active');
    });
})

function resetActiveImg() {
    allHoverImages.forEach((img) => {
        img.parentElement.classList.remove('active');
    });
}
</script>


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

                            <!-- Discover Hover Menu -->
                            <li class="relative group">
                                <a class="hover:text-gray-300 pr-40" href="./discover.html">Discover
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
                                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                    </path>
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
        <div class="main-wrapper">
            <div class="container">
                <div class="product-div">
                    <div class="product-div-left">
                        <div class="img-container">
                            <!-- Display the product image from the fetched product details -->
                            <img src="<?php echo $product['product_img']; ?>"
                                alt="<?php echo $product['product_name']; ?>">
                        </div>
                        <!-- Hover container content remains unchanged -->
                    </div>
                    <div class="product-div-right">
                        <span class="product-name"><?php echo $product['product_name']; ?></span>
                        <span class="product-price">£ <?php echo $product['price']; ?></span>
                        <div class="product-rating">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star-half-alt"></i></span>
                            <span><i class="far fa-star"></i></span>
                            <span>(1942 Ratings)</span>
                        </div>
                        <!--Shoe Size -->
                        <script>
                        function selectSize(size) {
                            document.getElementById('selected_size').value = size;
                        }

                        function addToCart() {
                            var selectedSize = document.getElementById('selected_size').value;
                            if (selectedSize === '') {
                                alert('Please select a size before adding to cart.');
                                return false;
                            }
                            return true;
                        }
                        </script>

                        <div class="Shoe-size">
                            <div class="Shoe-size">
                                <p class="select-size">Select Size:</p>
                                <div class="size-group">
                                    <?php
                if ($product['product_collection'] == 'Tops&Sweatshirts' || $product['product_collection'] == 'Tshirts' || $product['product_collection'] == 'Sweatpants' || $product['product_collection'] == 'Jackets') {
                  // Display size options for clothing
                  $sizes = array('XS', 'S', 'M', 'L', 'XL');
                } else {
                  // Display shoe sizes
                  $sizes = range(3, 13);
                }

                foreach ($sizes as $size) {
                  echo '<button type="button" class="size-btn" onclick="selectSize(\'' . $size . '\')">' . $size . '</button>';
                }
              ?>
                                </div>
                            </div>



                            <div class="btn-groups">
                                <form action="sneakers.php" method="post" onsubmit="return addToCart();">
                                    <!-- Hidden input fields for product details -->
                                    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                                    <input type="hidden" name="product_name"
                                        value="<?php echo $product['product_name']; ?>">
                                    <input type="hidden" name="product_img"
                                        value="<?php echo htmlspecialchars($product['product_img']); ?>">
                                    <!-- Assuming you want to add just one quantity for now -->
                                    <input type="hidden" name="quantity" value="1">
                                    <!-- Include a hidden input field for the selected size -->
                                    <input type="hidden" id="selected_size" name="size" value="">
                                    <button type="submit" class="add-cart-btn">
                                        <i class="fas fa-shopping-cart"></i> Add To Cart
                                    </button>
                                </form>

                            </div>
                            <br>
                            <!-- Product description and release date -->
                            <div class="product-info">
                                <p><?php echo $product['product_desc']; ?></p>
                                <br>
                                <p>Release Date: <?php echo $product['release_date']; ?></p>
                            </div>
                            <!-- Button groups and buttons content remains unchanged -->
                        </div>
                    </div>
                </div>
            </div>
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

    <script>
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