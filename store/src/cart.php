<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        #cart-container {
            display: flex;
            max-width: 1200px;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #product-details {
            flex: 1;
            padding: 20px;
        }

        #product-image {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            border-left: 2px solid #000;
        }

        #product-image img {
            width: 100%;
            max-width: 200px;
            border: 2px solid #000;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        #total-amount {
            font-size: 18px;
            color: #333;
            margin-top: 10px;
        }

        #contact-info,
        #shipping-details,
        #payment-details {
            margin-bottom: 20px;
        }

        #pay-now-button {
            background-color: #000;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        #payment-options {
            display: flex;
            flex-direction: column;
        }

        .payment-option {
            margin-bottom: 10px;
        }
    </style>
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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id'], $_POST['quantity'])) {
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

        $_SESSION['cart'][] = [
            'product_id' => $product_id,
            'product_name' => $product['product_name'],
            'price' => $product['price'],
            'quantity' => $quantity
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
        echo removeFromCart($removeIndex);
    }
}

// Handle checkout
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'checkout') {
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        $user_id = getCurrentUserID();
        if ($user_id) {
            foreach ($_SESSION['cart'] as $item) {
                processPurchase($item['product_id'], $item['quantity'], $user_id, $connection);
            }
            // Clear the cart after checkout
            unset($_SESSION['cart']);
            echo 'Checkout successful!';
        } else {
            echo 'User not logged in.';
        }
    } else {
        echo 'Your shopping cart is empty.';
    }
}

mysqli_close($connection);
?>

<div id="cart-container">
    <div id="product-details">
        <button><a href="home.php">Back</a></button>
        <h2>Contact Information</h2>
        <!-- Space for contact info form -->

        <h2>Shipping Details</h2>
        <!-- Space for shipping info form -->

        <h2>Payment Details</h2>
        <!-- Space for payment info form -->

        <div id="payment-options">
            <div class="payment-option">
                <input type="radio" name="payment-method" id="card-payment"> Credit/Debit Card
                <div id="card-details" style="display: none;">
                    <!-- Placeholder for card details input -->
                    Card Number: <input type="text" placeholder="1234 5678 9012 3456"><br>
                    Expiry Date: <input type="text" placeholder="MM/YYYY"><br>
                    CVV: <input type="text" placeholder="123"><br>
                </div>
            </div>

            <div class="payment-option">
                <input type="radio" name="payment-method" id="paypal-payment"> PayPal
                <div id="paypal-details" style="display: none;">
                    <!-- Placeholder for PayPal login button -->
                    <button onclick="paypalLogin()">Log in with PayPal</button>
                </div>
            </div>
        </div>

        <button id="checkout-button" onclick="checkout()">Pay Now</button>
    </div>

    <div id="product-image">
        <div id="total-amount">
            

            <?php
            // Display the contents of the shopping cart
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            echo '<h2>Shopping Cart</h2>';
            echo '<table border="1">';
            echo '<tr><th>Product Name</th><th>Price</th><th>Quantity</th></tr>';
            
            $totalAmount = 0;

            foreach ($_SESSION['cart'] as $key => $item) {
                echo '<tr>';
                echo '<td>' . $item['product_name'] . '</td>';
                echo '<td>$' . $item['price'] . '</td>';
                echo '<td>' . $item['quantity'] . '</td>';
                echo '<td>';


                echo '<form id="remove-from-cart-form" method="post" action="' . htmlspecialchars($_SERVER['PHP_SELF']) . '">';
                echo '<input type="hidden" name="action" value="remove_from_cart">';
                echo '<input type="hidden" name="remove_index" value="' . $key . '">';
                echo '<input type="submit" value="Remove from Cart">';
                echo '</form>';
                echo '<form id="checkout-form" method="post" action="' . htmlspecialchars($_SERVER['PHP_SELF']) . '">';
                echo '<input type="hidden" name="action" value="checkout">';
                echo '<input type="submit" value="Checkout">';
                echo '</form>';

                echo '</td>';
                echo '</tr>';
            
                $totalAmount += ($item['price'] * $item['quantity']);
            }
            

            echo '</table>';
            } else {
                echo 'Your shopping cart is empty.';
                $totalAmount = 0;
            }

            echo '<br>';
            echo 'Total Amount: £' . number_format($totalAmount, 2);
            ?>
        </div>
    </div>
</div>

<script>
    // JavaScript functions for illustration purposes
    function checkout() {
        // Add actual payment processing logic here
        document.getElementById("checkout-form").submit();
        alert("Payment processed successfully!");
    }

    // Show/hide card details based on radio button selection
    document.getElementById('card-payment').addEventListener('change', function() {
        document.getElementById('card-details').style.display = this.checked ? 'block' : 'none';
    });

    // Show/hide PayPal details based on radio button selection
    document.getElementById('paypal-payment').addEventListener('change', function() {
        document.getElementById('paypal-details').style.display = this.checked ? 'block' : 'none';
    });

    function paypalLogin() {
        // Add actual PayPal login logic here
        alert("Redirecting to PayPal login...");
    }
</script>

</body>
</html>