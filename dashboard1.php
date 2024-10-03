<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.html"); // Redirect to login if not logged in
    exit;
}

// Database connection
$host = 'localhost'; // Change if your database is on a different server
$db = 'agrishop';
$user = 'root'; // Your database username
$pass = ''; // Your database password

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user details
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
    <title>User Dashboard - Agrishop</title>
    <link rel="stylesheet" href="styles-dashboard.css"> <!-- Optional CSS -->
</head>
<body>
    <div class="dashboard-container">
        <h1>Welcome to Your Dashboard, <?php echo htmlspecialchars($name); ?>!</h1>
        <p>Your role: <?php echo htmlspecialchars($role); ?></p>
        
        <h2>Your Information</h2>
        <ul>
            <li><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></li>
            <li><strong>Name:</strong> <?php echo htmlspecialchars($name); ?></li>
            <li><strong>Role:</strong> <?php echo htmlspecialchars($role); ?></li>
        </ul>

        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
