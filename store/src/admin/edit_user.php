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
    $query = "SELECT * FROM users WHERE user_id = $id";
    $result = mysqli_query($connection, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    } else {
        echo "User not found!";
        exit();
    }
} else {
    echo "User ID not provided!";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process form data here
    $forename = $_POST['forename'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];

    $query = "UPDATE users SET forename = '$forename', surname = '$surname', email = '$email' WHERE user_id = $id";
    $result = mysqli_query($connection, $query);
    if ($result) {
        header('Location: manage_users.php');
        exit();
    } else {
        echo "Error updating user: " . mysqli_error($connection);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>
    <form method="POST">
        <label for="forename">Forename:</label>
        <input type="text" id="forename" name="forename" value="<?php echo $user['forename']; ?>"><br><br>
        <label for="surname">Surname:</label>
        <input type="text" id="surname" name="surname" value="<?php echo $user['surname']; ?>"><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>"><br><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
