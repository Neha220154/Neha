<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

// Database connection
$host = 'localhost';
$db = 'agrishop';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_SESSION['email'];
$stmt = $conn->prepare("SELECT name, role FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($name, $role);
$stmt->fetch();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="user-dashboard.css">
    <title>User Dashboard</title>
</head>
<body>
    <div class="dashboard-container">
        <header>
            <h1>Welcome to Your Dashboard</h1>
        </header>
        <section class="user-info">
            <h2>your Information</h2>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
            <p><strong>Name:</strong> <?php echo htmlspecialchars($name); ?></p>
            <p><strong>Role:</strong> <?php echo htmlspecialchars($role); ?></p>
        </section>
        <section class="action">
            <h2>Quick actions</h2>
            <div class="action-items">
                <h3>Manage profile</h3>
                <p>edit your personal information.</p>
                <a href="edit_profile.php">Edit profile</a>
</div>
<div class="action-item">
    <h3>view orders</h3>
    <p>check your past orders.</p>
    <a href="view_orders.php">View orders</a>
</div>

<div>
    <div class="action-item">
        <h3>Settings</h3>
        <p>Update your account settings.</p>
        <a href="account_settings.php">Account Setting</a>
</div>
</div>
</section>
</div>
</body>
</html>








