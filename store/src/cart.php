<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Shopping Cart</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="shopping-cart.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="icon" href="./images/logowhitefav.png" type="image/x-icon">
</head>
<body>


<?php
session_start();

include("connections.php");
include("functions.php");

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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
    if ($_POST['action'] == 'remove_from_cart') {
        $removeIndex = $_POST['remove_index'];
        removeFromCart($removeIndex);
        header("Location: cart.php");
        exit();
    }
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

mysqli_close($connection);
?>

    <!-- navbar -->
		<header class="items-center bg-zinc-950 md:px">
			<div class="flex flex-wrap place-items-center">
		  <section class="relative mx-auto">
			  <!-- navbar -->
			<nav class="flex justify-between w-screen">
			  
				<div class="px-2 flex w-full py-4 items-center">
				
				  <a class="" href="index.php">
				  <!-- <img class="h-9" src="logo.png" alt="logo"> -->
				  <img class="h-6 
				   " src="./images/logowhite.png" alt="logo"/>         
				  </a>
	
				<!-- Nav Links -->
				<ul class="hidden md:flex mx-auto space-x-12 text-l text-white">
				  <li><a class="hover:text-gray-300" href="#">New Arrivals</a></li>
				  <li><a class="hover:text-gray-300" href="best_sellers.html">Best Sellers</a></li>
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
				  <!-- search icon -->
				  <form action="search.php" method="GET" class="flex items-center">
                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-search w-6 h-6">
                    <circle cx="11" cy="11" r="8"/>
                    <path d="m21 21-4.35-4.35"/>
                </svg>
                <div class="flex-grow">
                    <input type="search" name="search" placeholder="Search items..." class="w-full h-10 px-4 bg-transparent text-white placeholder-gray-300 rounded transition-all duration-300 focus:border-blue-300 focus:bg-white focus:text-black" />
                </div>
            </form>
				  <!-- profile -->
				  <a class="flex items-center hover:text-gray-300 pr-1" href="login.php">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-user w-10 mx-auto"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle>
					</svg>
					
				  </a>
				  <!-- Cart      -->
				  <a class="flex items-center hover:text-gray-300" href="cart.php">
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
        
        <style>
            .product {
                border-bottom: 1px solid black;
                padding-bottom: 20px;
                margin-bottom: 20px; 
                padding-left: 30px;
                padding-right: 30px;
            }
        </style>

<main class="page">
    <section class="shopping-cart dark">
        <div class="container">
            <div class="block-heading">
                <h2>Shopping Cart</h2>
                <p></p>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div class="items">
                            <?php
                                // Display the contents of the shopping cart
                                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                                    foreach ($_SESSION['cart'] as $index => $item) {
                            ?>
                            <div class="product">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img class="img-fluid mx-auto d-block image" src="<?php echo $item['product_img']; ?>">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="info">
                                            <div class="row">
                                                <div class="col-md-5 product-name">
                                                    <div class="product-name">
                                                        <p><?php echo $item['product_name']; ?></p>
                                                        <div class="product-info">
                                                            <div>Size: <span class="value"><?php echo $item['size']; ?></span></div>
                                                            <input type="hidden" name="size_<?php echo $index; ?>" value="<?php echo $item['size']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 quantity">
                                                    <label for="quantity_<?php echo $index; ?>">Quantity:</label>
                                                    <input id="quantity_<?php echo $index; ?>" type="number" value="<?php echo $item['quantity']; ?>" class="form-control quantity-input" onchange="updatePrice(<?php echo $index; ?>)">
                                                </div>
                                                <div class="col-md-3 price">
                                                    <span id="price_<?php echo $index; ?>">£<?php echo number_format($item['price'] * $item['quantity'], 2); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                            <input type="hidden" name="remove_index" value="<?php echo $index; ?>">
                                            <input type="hidden" name="action" value="remove_from_cart">
                                            <button type="submit" class="btn btn-link btn-sm" style="color: gray; font-size: 30px;">&times;</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php
                                    }
                                } else {
                                    echo 'Your shopping cart is empty.';
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="summary">
                            <h3>Summary</h3>
                            <div class="summary-item"><span class="text">Subtotal</span><span class="text">   </span><span id="subtotal">£0.00</span></div>
                            <div class="summary-item"><span class="text">Discount</span><span class="price">£0.00</span></div>
                            <div class="summary-item"><span class="text">Shipping</span><span class="price">£4.99</span></div>
                            
                            <form id="checkout-form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"> 
                                <input type ="hidden" name ="action" value="checkout">
                                <button type="submit" class="btn btn-primary btn-lg btn-block pay-button" id="payButton">Pay</button>
                            </form>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </section>
</main>

<script>
        // Calculate initial subtotal when page loads
        window.addEventListener('load', function() {
        calculateSubtotal();
    });

    // Function to update price and subtotal
    function updatePrice(index) {
        var quantityInput = document.getElementById('quantity_' + index);
        var quantity = parseInt(quantityInput.value);
        var pricePerItem = parseFloat(<?php echo $item['price']; ?>);
        var newPrice = quantity * pricePerItem;
        document.getElementById('price_' + index).innerText = '£' + newPrice.toFixed(2);
        calculateSubtotal();
    }

    // Function to calculate subtotal
    function calculateSubtotal() {
        var subtotal = 0;
        <?php
            // Loop through cart items to calculate subtotal
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $index => $item) {
        ?>
        var price_<?php echo $index; ?> = parseFloat(<?php echo $item['price']; ?>);
        var quantity_<?php echo $index; ?> = parseInt(document.getElementById('quantity_<?php echo $index; ?>').value);
        subtotal += price_<?php echo $index; ?> * quantity_<?php echo $index; ?>;
        <?php
                }
            }
        ?>
        subtotal += 4.99;
        document.getElementById('subtotal').innerText = '£' + subtotal.toFixed(2);
    }

    function checkout() {
            document.getElementById("checkout-form").submit();
            alert("Payment processed successfully!");
        }
</script>
</body>
</html>