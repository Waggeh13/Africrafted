<?php
session_start();
include '../settings/connection.php';

if (isset($_POST['confirm'])) {
    // Perform the deletion operation
    $query = "DELETE FROM users WHERE id={$_SESSION['user_id']}";
    if (mysqli_query($con, $query)) {
        // Redirect to the login page or another appropriate page after deletion
        header("Location: ../login/login.php");
        exit(); // Make sure to exit after redirection
    } else {
        // Handle database error
        echo "Error deleting record: " . mysqli_error($con);
    }
} else {
    // If the user hasn't confirmed, redirect them back to the confirmation page
    header("Location: ../admin/confirm_delete.php");
    exit(); // Make sure to exit after redirection
}
?>
