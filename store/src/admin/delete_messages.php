<?php

session_start();
include '../connections.php';


if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $msgId = $_GET['id'];

    $sql = "DELETE FROM contactform WHERE id = $msgId";

    if ($connection->query($sql) === TRUE) {
        header('Location: view_messages.php');
        exit();
    } else {
        echo "Error deleting record: " . $connection->error;
    }
} else {
    echo "Invalid product ID";
    header('Location: view_messages.php'); 
    exit();
}
$connection->close();


?>
