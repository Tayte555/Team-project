<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

include("../functions.php");
include("../connections.php");

if (empty($_POST)){
    header('Location: add_product.php');
    exit();
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    //htmlspecialchars to stop xss attacks
    $productName = htmlspecialchars($_POST['product']['product_name']);
    $brand = htmlspecialchars($_POST['product']['brand']);
    $price = htmlspecialchars($_POST['product']['price']);
    $releaseDate = htmlspecialchars($_POST['product']['release_date']);
    $stockQuantity = htmlspecialchars($_POST['product']['stock_quantity']);
    $category = htmlspecialchars($_POST['product']['category']);

    if (isset($_FILES["product_image"]) && $_FILES["product_image"]["error"] == 0) {
        $allowed = ["jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png"];
        $filename = $_FILES["product_image"]["name"];
        $filetype = $_FILES["product_image"]["type"];
        $filesize = $_FILES["product_image"]["size"];

        $fileExtension = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($fileExtension, $allowed)){
            $_SESSION['error_message'] = "Invalid image format! Allowed: (jpg,jpeg,png,gif)";
            header('Location: add_product.php');
            exit();
        }

        $maxsize = 5 * 1024 * 1024;
        if ($filesize > $maxsize){
            $_SESSION['error_message'] = "Error: File size is larger than the allowed limit.";
            header('Location: add_product.php');
            exit();
        }

        if (in_array($filetype, $allowed)) {
            $uploadPath = "../images/" . $filename;
            while (file_exists($uploadPath)) {
                $filename = pathinfo($filename, PATHINFO_FILENAME) . "_" . time() . "." . $fileExtension;
                $uploadPath = "../images/" . $filename;
            }
            move_uploaded_file($_FILES["product_image"]["tmp_name"], $uploadPath);
            $_SESSION['success_message'] = "Your file was uploaded successfully.";
            $imagePath = "images/" . $filename;
        } else {
            $_SESSION['error_message'] = "Error: There was a problem uploading your file. Please try again."; 
        }
    } else {
        $_SESSION['error_message'] = "Error: " . $_FILES["product_image"]["error"];
    }


   if (!empty($productName) && !empty($brand) && !empty($price) && !empty($releaseDate) && !empty($stockQuantity) && !empty($category) && !empty($imagePath)){
    $date = new DateTime($releaseDate);
    $releaseDateFormatted = $date->format('Y-m-d');
    insertProduct($connection, $productName, $brand, $price, $releaseDateFormatted, $stockQuantity, $category, $imagePath);
    header('Location: add_product.php');
    exit();
} else {
    $_SESSION['error_message'] = "Please fill all the required fields.";

    header('Location: add_product.php');
    exit();
   }
    
    
}

?>