<?php
session_start();
include '../settings/connection.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/login.php");
    exit(); // Stop further execution
}

// Deletion functionality
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $user_id = $_SESSION['user_id'];

    $query = "DELETE FROM users WHERE user_id = $user_id";
    $result = mysqli_query($con, $query);

    if ($result) {
        // Redirect to login page after successful deletion
        header("Location: ../login/login.php");
        exit(); // Make sure to exit after successful deletion
    } else {
        echo "Error: Unable to delete account.";
        exit(); // Make sure to exit after failed deletion
    }
}


// Update functionality
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];

    // Update the profile information in the database
    $query = "UPDATE users SET username='$username', email='$email' WHERE user_id={$_SESSION['user_id']}";

    if (mysqli_query($con, $query)) {
        // Redirect to the profile page upon successful update
        header("Location: ../admin/profile.php");
        exit(); // Make sure to exit after redirection
    } else {
        // Handle database update error
        echo "Error updating record: " . mysqli_error($con);
    }
}
?>
