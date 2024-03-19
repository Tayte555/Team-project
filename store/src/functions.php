<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function login($connection){
    if(isset($_SESSION['user_id'])){
        $id = $_SESSION['user_id'];
        $query = "select * from users where user_id = '$id' limit 1";

        $result = mysqli_query($connection,$query);
        if($result && mysqli_num_rows($result) > 0){
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    header("Location: login.php");
    die;
}

function insertProduct($connection, $productName, $brand, $price, $releaseDate, $stockQuantity, $category, $imagePath) {
    $stmt = mysqli_prepare($connection, "INSERT INTO products (product_name, brand, price, release_date, stock_quantity, category, product_img) VALUES (?, ?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'ssssiss', $productName, $brand, $price, $releaseDate, $stockQuantity, $category, $imagePath);
    if(mysqli_stmt_execute($stmt)) {
        $_SESSION['success_message'] = "Product added successfully.";
    } else {
        echo "ERROR: Could not execute query: " . mysqli_error($connection);
    }
    mysqli_stmt_close($stmt);
}

function getProducts($connection, $productIds) {
    $productIdsString = implode(',', $productIds);

    $query = "select * from products where product_id IN ($productIdsString)";
    $result = mysqli_query($connection, $query);

    if($result) {
        $products = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row;
        }
        return $products;
    } else {
        return [];
    }
}

function removeFromCart($removeIndex) {

    if (isset($_SESSION['cart'][$removeIndex])) {
        unset($_SESSION['cart'][$removeIndex]);
        $_SESSION['cart'] = array_values($_SESSION['cart']);
        return 'Product removed from cart';
    } else {
        return 'Invalid item index';
    }
}

function sendContactUsMsg($connection, $firstName, $lastName, $email, $msg){
    $stmt = mysqli_prepare($connection, "INSERT INTO contactform (first_name, last_name, email, message) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'ssss', $firstName, $lastName, $email, $msg);
    if(mysqli_stmt_execute($stmt)) {
        $_SESSION['success_message'] = "Message sent successfully. You should hear back from us soon!";
    } else {
        echo "ERROR: Could not execute query: " . mysqli_error($connection);
    }
    mysqli_stmt_close($stmt);

}

function processPurchase($product_id, $quantity, $user_id, $connection){
    // Fetch product details
    $sql_fetch_product = "SELECT price, stock_quantity FROM products WHERE product_id = ?";
    $stmt = $connection->prepare($sql_fetch_product);
    $stmt->bind_param('i', $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    if ($product) {
        // Calculate total price
        $total_price = $product['price'] * $quantity;

        // Decrease stock
        $sql_update_stock = "UPDATE products SET stock_quantity = stock_quantity - ? WHERE product_id = ?";
        $stmt = $connection->prepare($sql_update_stock);
        $stmt->bind_param('ii', $quantity, $product_id);
        $stmt->execute();

        // Create order
        $sql_create_order = "INSERT INTO user_orders (user_id, product_id, order_date, quantity, total_price) 
                            VALUES (?, ?, NOW(), ?, ?)";
        $stmt = $connection->prepare($sql_create_order);
        $stmt->bind_param('iiid', $user_id, $product_id, $quantity, $total_price);
        $stmt->execute();
    } else {
        // Product not found
        echo "Product not found!";
    }
}

function getAllProductDetails($product_id, $conn) {
    // Prepare SQL statement to fetch product details
    $sql = "SELECT * FROM products WHERE product_id = ?";
    
    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);
    
    // Bind parameters and execute the statement
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    
    // Get the result
    $result = $stmt->get_result();
    
    // Fetch product details as an associative array
    $product_details = $result->fetch_assoc();
    
    // Close the statement
    $stmt->close();
    
    return $product_details;
}

?>