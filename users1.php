<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

// Simulated user database (in practice, use a real database)
$users = [
    ['id' => 1, 'name' => 'Alice', 'email' => 'alice@example.com'],
    ['id' => 2, 'name' => 'Bob', 'email' => 'bob@example.com'],
];

// Handle user addition
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_user'])) {
    $new_user_name = $_POST['user_name'];
    $new_user_email = $_POST['user_email'];
    $new_user_id = count($users) + 1;
    $users[] = ['id' => $new_user_id, 'name' => $new_user_name, 'email' => $new_user_email];
}

// Handle user deletion
if (isset($_GET['delete'])) {
    $user_id_to_delete = intval($_GET['delete']);
    foreach ($users as $key => $user) {
        if ($user['id'] === $user_id_to_delete) {
            unset($users[$key]);
            break;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Management</title>
    <link rel="stylesheet" href="style-admin.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Users Management</h1>
            <nav>
                <ul>
                    <li><a href="admin.php">Dashboard</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </header>
        
        <div class="dashboard">
            <div class="content">
                <h2>Manage Users</h2>

                <!-- User List -->
                <h3>User List</h3>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?php echo $user['id']; ?></td>
                                <td><?php echo htmlspecialchars($user['name']); ?></td>
                                <td><?php echo htmlspecialchars($user['email']); ?></td>
                                <td>
                                    <a href="?delete=<?php echo $user['id']; ?>" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <!-- Add User Form -->
                <h3>Add New User</h3>
                <form method="POST" action="">
                    <label for="user_name">Name:</label>
                    <input type="text" id="user_name" name="user_name" required>
                    <br>
                    <label for="user_email">Email:</label>
                    <input type="email" id="user_email" name="user_email" required>
                    <br>
                    <input type="submit" name="add_user" value="Add User">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
