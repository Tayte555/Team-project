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

<div id="cart-container">
    <div id="product-details">
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

        <button id="pay-now-button" onclick="processPayment()">Pay Now</button>
    </div>

    <div id="product-image">
        <img src="path/to/your/product-image.jpg" alt="Product Image Placeholder">
        <div id="total-amount">
            Total Amount: £1,499.99
        </div>
    </div>
</div>
<script>
    // JavaScript functions for illustration purposes
    function processPayment() {
        // Add actual payment processing logic here
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