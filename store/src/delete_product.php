<?php

session_start();
include 'connections.php';


if($_SERVER['REQUEST_METHOD'] == "GET"){
    if(isset($_GET['id']) && is_numeric($_GET['id'])) {
        $productId = $_GET['id'];

        // SQL to delete the product
        $sql = "DELETE FROM products WHERE product_id = $productId";

        if ($connection->query($sql) === TRUE) {
            // Redirect after deletion
            header('Location: add_product.php'); // Replace with your product list page
            exit();
        } else {
            echo "Error deleting record: " . $connection->error;
        }
    } else {
        echo "Invalid product ID";
    }
    $connection->close();
} else {
    header('Location: add_product.php');
}


?>
