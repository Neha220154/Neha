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

// Get user data
$email = $_SESSION['email'];
$query = "SELECT * FROM farmers WHERE email = '$email'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $user_data = $result->fetch_assoc();
} else {
    echo "User not found.";
    exit;
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="style-profile.css">
</head>
<body>
    <div class="container">
        <h1>Edit Profile</h1>
        <form action="update_profile.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $user_data['name']; ?>"><br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $user_data['email']; ?>"><br><br>
            <label for="role">Role:</label>
            <input type="text" id="role" name="role" value="<?php echo $user_data['role']; ?>"><br><br>
            <input type="submit" value="Update Profile">
        </form>
    </div>
</body>
</html>



update_profile.php



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


