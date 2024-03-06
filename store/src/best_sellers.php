<!-- best_sellers.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Sellers</title>
    <style>
        .product img {
            max-width: 100%;
            height: auto;
            
        }
   
    
        .product{
        width: 200px;
        border: none);
        border-radius: 5px;
        padding: 5px;
        margin: 10px;
        background-color: rgb(210,210,210);
        text-align: center;
        display: inline-block;
        }

        .product h2{
            font-size: 18px;
            margin: 5px 0;
        }
        .product p {
            margin: 5px 2;
        }
        .product form{ 
            margin-top: 10px;
        }
        .product input[type="number"] {
            width: 80px;
            text-align: center;
            margin-right: 5px;
            border-width:  medium;
            border-color:  rgb(112,112,112) ;
            border-style: solid;
        }
        .product input[type="submit"]{
            background-color: rgb(112, 112, 112);
            color: rgb(255,255,255);
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            transition: opacity 0.15s;
        }
        .product input[type="submit"]:hover{
            opacity: 0.8;
        }
        .product input[type="submit"]:active {
            opacity: 0.5;
        }
    </style>
</head>
<body>




<?php 
session_start();

include("connections.php");
include("functions.php");

$query = "SELECT * FROM products";
$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class = "product">';
    echo '<img src="' . $row['product_img'] . '" alt="' . $row['product_name'] . '">';
    echo '<h2>' . $row['product_name'] . '</h2>';
    echo '<p>Brand: ' . $row['brand'] . '</p>';
    echo '<p>Price: $' . $row['price'] . '</p>';
    echo '<form action="cart.php" method="post">';
    echo '<input type="hidden" name="product_id" value="' . $row['product_id'] . '">';
    echo '<input type="number" name="quantity" value="1" min="1">';
    echo '<input type="submit" value="Add to Cart">';
    echo '</form>';
    echo '</div>';
}

mysqli_close($connection);
?>