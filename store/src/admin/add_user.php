<?php
ini_set('display_errors', 1);
session_start();
include "../connections.php";

if (!isset($_SESSION['user_id'])){
    header('Location: ../login.php');
    exit();
}

if ($_SESSION['is_admin'] != 1){
  header('Location: ../login.php');
  exit();
}

$error_message = "";
if (isset($_SESSION['error_message'])) {
    $error_message = $_SESSION['error_message'];

    unset($_SESSION['error_message']);
}

$success_message = "";
if (isset($_SESSION['success_message'])) {
    $success_message = $_SESSION['success_message'];

    unset($_SESSION['success_message']);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['forename'];
    $last_name = $_POST['surname'];
    $password = $_POST['password']; // Hash this password before storing it in the database
    $email = $_POST['email'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Add user to the database
    $query = "insert into users (forename, surname, email, pass, is_admin) values (?, ?, ?, ?, '1')";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "ssss", $first_name, $last_name, $email, $hashedPassword);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        $_SESSION['success_message'] = "User added successfully.";
        header('Location: manage_users.php');
        exit();
    } else {
        $_SESSION['error_message'] = "Error: " . $sql . "<br>" . $connection->error;
        header('Location: add_user.php');
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Add User</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div>
            <label for="first_name">First Name:</label>
            <input type="text" name="user[first_name]" id="first_name" required>
        </div>
        <div>
            <label for="last_name">Last Name:</label>
            <input type="text" name="user[last_name]" id="last_name" required>
        </div>
        <div>
            <label for="username">Username:</label>
            <input type="text" name="user[username]" id="username" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="user[password]" id="password" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="user[email]" id="email" required>
        </div>
        <button type="submit">Add User</button>
    </form>
    <?php if (!empty($error_message)): ?>
        <div class="error-message"><?php echo $error_message; ?></div>
    <?php endif; ?>
    <?php if (!empty($success_message)): ?>
        <div class="success-message"><?php echo $success_message; ?></div>
    <?php endif; ?>
</body>
</html>
