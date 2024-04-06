<?php
session_start();
include '../settings/connection.php';

if (!isset($_SESSION['username'])) {
    header("Location: ../login/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['update'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];

        // Update the profile information in the database
        $query = "UPDATE users SET username='$username', email='$email' WHERE id={$_SESSION['user_id']}";

        if (mysqli_query($con, $query)) {
            // Redirect to the profile page upon successful update
            header("Location: ../admin/profile.php");
            exit(); // Make sure to exit after redirection
        } else {
            // Handle database update error
            echo "Error updating record: " . mysqli_error($con);
        }
    }
    
}
?>
