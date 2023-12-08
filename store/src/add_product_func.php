<?php
session_start();
include("functions.php");
include("connections.php");



if($_SERVER['REQUEST_METHOD'] == "POST"){
    //htmlspecialchars to stop xss attacks
    $productName = htmlspecialchars($_POST['product']['product_name']);
    $brand = htmlspecialchars($_POST['product']['brand']);
    $price = htmlspecialchars($_POST['product']['price']);
    $releaseDate = htmlspecialchars($_POST['product']['release_date']);
    $stockQuantity = htmlspecialchars($_POST['product']['stock_quantity']);
    $category = htmlspecialchars($_POST['product']['category']);


   if (!empty($productName) || !empty($brand) || !empty($price) || !empty($releaseDate) || !empty($stockQuantity) || !empty($category)){
    $date = new DateTime($releaseDate);
    $releaseDateFormatted = $date->format('Y-m-d');
    echo $releaseDateFormatted;
    insertProduct($connection, $productName, $brand, $price, $releaseDateFormatted, $stockQuantity, $category);
    header('Location: add_product.php');
    exit();
} else {
    $_SESSION['error_message'] = "Please fill all the required fields.";

    // Redirect back to the form
    header('Location: add_product.php');
    exit();
   }
    
    
}

?>