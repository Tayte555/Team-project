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

function insertProduct($connection, $productName, $brand, $price, $releaseDate, $stockQuantity, $category) {
    $stmt = mysqli_prepare($connection, "INSERT INTO products (product_name, brand, price, release_date, stock_quantity, category) VALUES (?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'sssdii', $productName, $brand, $price, $releaseDate, $stockQuantity, $category);
    if(mysqli_stmt_execute($stmt)) {
        echo "Product inserted successfully.";
    } else {
        echo "ERROR: Could not execute query: " . mysqli_error($connection);
    }
    mysqli_stmt_close($stmt);
}
?>