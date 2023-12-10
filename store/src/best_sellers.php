<!-- best_sellers.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Sellers</title>
    <style>
        img {
            width: 75px;
            height: 75px;
            object-fit: cover;
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
    echo '<div>';
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