<?php

session_start();
include 'connections.php';


if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $productId = $_GET['id'];

    $sql = "DELETE FROM products WHERE product_id = $productId";

    if ($connection->query($sql) === TRUE) {
        header('Location: add_product.php');
        exit();
    } else {
        echo "Error deleting record: " . $connection->error;
    }
} else {
    echo "Invalid product ID";
    header('Location: add_product.php'); 
    exit();
}
$connection->close();


?>
