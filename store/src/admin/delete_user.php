<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

if ($_SESSION['is_admin'] != 1) {
    header('Location: ../login.php');
    exit();
}

include '../connections.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM users WHERE user_id = $id";
    $result = mysqli_query($connection, $query);
    if ($result) {
        header('Location: manage_users.php');
        exit();
    } else {
        echo "Error deleting user: " . mysqli_error($connection);
        exit();
    }
} else {
    echo "User ID not provided!";
    exit();
}
?>
