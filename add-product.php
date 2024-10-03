
<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit;
}

// Database connection
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'agrishop';

$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    error_log("Connection failed: " . $conn->connect_error);
    exit("Connection failed.");
}

// Update user data
$name = $_POST['name'];
$email = $_POST['email'];
$role = $_POST['role'];

// Update query
$query = "UPDATE farmers SET name = '$name', email = '$email', role = '$role' WHERE email = '".$_SESSION['email']."'";

if ($conn->query($query) === TRUE) {
    echo "Profile updated successfully!";
    header('Location: profile.php');
} else {
    echo "Error updating profile: " . $conn->error;
}

// Close connection
$conn->close();
?>


