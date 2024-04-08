<?php
session_start();
include '../settings/connection.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect the user to the login page if they are not logged in
    header("Location: ../login/login.php");
    exit; // Stop further execution
}

// Retrieve the user's information from the database
$user_id = $_SESSION['user_id'];
$query = "SELECT username, email FROM users WHERE user_id = $user_id";
$result = mysqli_query($con, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    $username = $user['username'];
    $email = $user['email'];
} else {
    $username = "";
    $email = "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="../css/edit.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
<div class="top-bar">
    <div class="logo">
        <img src="../image/logo1.png" alt="Logo" class="logo">
    </div>
</div>
<h2>Edit Profile</h2>
<form action="../action/update_profile_actions.php" method="post" enctype="multipart/form-data">
    <!-- Your form fields for editing profile information -->
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" value="<?php echo $username; ?>" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
    <br>
    <label for="profile-picture">Profile Picture:</label>
    <input type="file" id="profile-picture" name="profile-picture">
    <br>
    <button type="submit" name="update" id="update-profile-btn">Update Profile</button>
    <button type="submit" name="delete" id="confirm-delete-btn">Delete Account</button>
</form>
<script src="../js/edits.js"></script>
</body>
</html>
