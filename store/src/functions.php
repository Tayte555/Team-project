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

function processPurchase($product_id, $quantity, $product_size, $user_id, $connection){
    // Fetch product details including size
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

        // Create order including size
        $sql_create_order = "INSERT INTO user_orders (user_id, product_id, order_date, quantity, total_price, size) 
                            VALUES (?, ?, NOW(), ?, ?, ?)";
        $stmt = $connection->prepare($sql_create_order);
        $stmt->bind_param('iiids', $user_id, $product_id, $quantity, $total_price, $product_size);
        $stmt->execute();
    } else {
        // Product not found
        echo "Product not found!";
    }
}

function getAllProductDetails($product_id, $conn) {
    $sql = "SELECT * FROM products WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product_details = $result->fetch_assoc();
    $stmt->close();
    return $product_details;
}

function getMensProducts($conn) {
    $sql = "SELECT * FROM products WHERE category = 'Mens' AND product_collection NOT IN ('Tops&Sweatshirts', 'tshirts', 'Sweatpants', 'Jackets')";
    $result = $conn->query($sql);
    $mens_products = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $mens_products[] = $row;
        }
    }
    
    return $mens_products;
}

function getWomensProducts($conn) {
    $sql = "SELECT * FROM products WHERE category = 'Womens' AND product_collection NOT IN ('Tops&Sweatshirts', 'tshirts', 'Sweatpants', 'Jackets')";
    $result = $conn->query($sql);
    $mens_products = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $mens_products[] = $row;
        }
    }
    
    return $mens_products;
}

function getApparel($conn) {
    $sql = "SELECT * FROM products WHERE product_collection IN ('Tops&Sweatshirts', 'tshirts', 'Sweatpants', 'Jackets')";
    $result = $conn->query($sql);
    $apparel_products = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $apparel_products[] = $row;
        }
    }
    
    return $apparel_products;
}

function getAccessories($conn) {
    $sql = "SELECT * FROM products WHERE category = 'all'";
    $result = $conn->query($sql);
    $accessory_products = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $accessory_products[] = $row;
        }
    }
    
    return $accessory_products;
}


?>