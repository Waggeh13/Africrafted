<?php
session_start();
include '../settings/connection.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/login.php");
    exit(); // Stop further execution
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the update button is clicked
    if (isset($_POST['update'])) {
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

}

