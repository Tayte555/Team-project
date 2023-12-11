<?php
session_start();


include("functions.php");
include("connections.php");

if (empty($_POST)){
    header('Location: contactus.php');
    exit();
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    //htmlspecialchars to prevent xss attacks
    $firstName = htmlspecialchars($_POST['contactus']['first_name']);
    $lastName = htmlspecialchars($_POST['contactus']['last_name']);
    $email = htmlspecialchars($_POST['contactus']['email']);
    $msg = htmlspecialchars($_POST['contactus']['message']);

    if (!empty($firstName) && !empty($lastName) && !empty($email) && !empty($msg)){
        sendContactUsMsg($connection,$firstName, $lastName, $email, $msg);
        $_SESSION['success_message'] = "Message sent successfully. You should hear back from us soon!";
        header('Location: contactus.php');
        exit();
    } else {
        $_SESSION['error_message'] = "Please fill all the required fields.";
        header('Location: contactus.php');
        exit();
    }

}

?>