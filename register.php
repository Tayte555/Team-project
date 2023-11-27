<?php
include("db.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $fullName = $_POST["full_name"];


    $hashedPassword = md5($password)
}
