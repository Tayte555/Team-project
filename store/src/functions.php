<?php
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

?>