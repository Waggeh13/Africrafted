<?php
session_start();
include '../settings/connection.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/login.php");
    exit();
}

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the comment ID is set
    if (isset($_POST['comment_id'])) {
        // Sanitize the input
        $comment_id = mysqli_real_escape_string($con, $_POST['comment_id']);
        
        // Get the user ID of the logged-in user
        $user_id = $_SESSION['user_id'];
        
        // Query to delete the comment only if the logged-in user is the owner of the comment
        $delete_query = "DELETE FROM comments WHERE comment_id = $comment_id AND user_id = $user_id";
        
        // Execute the query
        if (mysqli_query($con, $delete_query)) {
            // Comment deleted successfully
            header("Location: ../admin/comment.php");
            exit();
        } else {
            // Error occurred while deleting the comment
            echo "Error: " . mysqli_error($con);
        }
    } else {
        // Comment ID not set in the request
        echo "Comment ID not provided.";
    }
} else {
    // Invalid request method
    echo "Invalid request method.";
}
?>
