<?php
session_start();
include "../connections.php"; // Adjust the path to your database connection file

// Redirect non-admins
if (!isset($_SESSION['user_id']) || $_SESSION['is_admin'] != 1) {
    header('Location: ../login.php');
    exit();
}

// Function to fetch all users
function fetchUsers($connection) {
    $sql = "SELECT user_id, forename, surname, email FROM users";
    return $connection->query($sql);
}

// Handle Add User Request
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_user'])) {
    $forename = $_POST['forename'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT); // Always hash passwords
    
    $insertSql = "INSERT INTO users (forename, surname, email, pass) VALUES (?, ?, ?, ?)";
    $stmt = $connection->prepare($insertSql);
    $stmt->bind_param("ssss", $forename, $surname, $email, $pass);
    $stmt->execute();
    $stmt->close();
    
    header("Location: manage_users.php"); // Redirect to avoid resubmission
    exit();
}

// Handle Delete User Request
if (isset($_GET['delete'])) {
    $userId = $_GET['delete'];
    $deleteSql = "DELETE FROM users WHERE user_id = ?";
    $stmt = $connection->prepare($deleteSql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->close();
    
    header("Location: manage_users.php"); // Redirect to avoid resubmission
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Users</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../styles.css"> <!-- Update your stylesheet path -->
</head>
<body class="bg-gray-100">

<!-- Header, Navbar, and Sidebar code should be inserted here -->

<main class="p-4">
    <h1 class="text-xl font-semibold">Manage Users</h1>
    
    <!-- Add User Form -->
    <form method="POST" action="" class="mb-4">
        <input name="forename" type="text" required placeholder="Forename" class="input input-bordered w-full max-w-xs">
        <input name="surname" type="text" required placeholder="Surname" class="input input-bordered w-full max-w-xs">
        <input name="email" type="email" required placeholder="Email" class="input input-bordered w-full max-w-xs">
        <input name="pass" type="password" required placeholder="Password" class="input input-bordered w-full max-w-xs">
        <button type="submit" name="add_user" class="btn">Add User</button>
    </form>

    <!-- Users Table -->
    <table class="table w-full">
        <thead>
            <tr>
                <th>ID</th>
                <th>Forename</th>
                <th>Surname</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $users = fetchUsers($connection);
            while ($row = $users->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['user_id']); ?></td>
                    <td><?php echo htmlspecialchars($row['forename']); ?></td>
                    <td><?php echo htmlspecialchars($row['surname']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td>
                        <a href="?delete=<?php echo $row['user_id']; ?>" onclick="return confirm('Are you sure?');" class="btn btn-error">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</main>

<!-- Footer -->
<footer class="bg-zinc-950 text-white mt-8 p-4 text-center">
    <div class="container mx-auto">
        <p>© 2024 Sole Haven — admin@solehaven.com</p>
    </div>
</footer>

</body>
</html>

