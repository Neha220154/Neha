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

// Fetch user data
$stmt = $conn->prepare("SELECT name, email, password FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($name, $email, $hashedPassword);
$stmt->fetch();
$stmt->close();

// Update profile if form is submitted
$success = '';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newName = $_POST['name'];
    $newEmail = $_POST['email'];
    $newPassword = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Validate password match
    if ($newPassword !== $confirmPassword) {
        $error = "Passwords do not match!";
    } else {
        // Hash new password if changed
        $newHashedPassword = empty($newPassword) ? $hashedPassword : password_hash($newPassword, PASSWORD_DEFAULT);

        // Update user data
        $stmt = $conn->prepare("UPDATE users SET name = ?, email = ?, password = ? WHERE email = ?");
        $stmt->bind_param("ssss", $newName, $newEmail, $newHashedPassword, $email);

        if ($stmt->execute()) {
            $_SESSION['email'] = $newEmail; // Update session email
            $success = "Profile updated successfully!";
        } else {
            $error = "Failed to update profile!";
        }
        $stmt->close();
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="edit-profile.css">
</head>
<body>
    <div class="edit-profile-container">
        <h2>Edit Profile</h2>

        <?php if ($success): ?>
            <p class="success-message"><?= $success; ?></p>
        <?php elseif ($error): ?>
            <p class="error-message"><?= $error; ?></p>
        <?php endif; ?>

        <form action="edit_profile.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?= htmlspecialchars($name); ?>" required><br><br>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?= htmlspecialchars($email); ?>" required><br><br>

            <label for="password">New Password (leave blank if not changing):</label>
            <input type="password" name="password" id="password"><br><br>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" name="confirm_password" id="confirm_password"><br><br>

            <button type="submit">Update Profile</button>
        </form>
    </div>
</body>
</html>
