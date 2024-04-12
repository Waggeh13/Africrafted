<?php
session_start();
include '../settings/connection.php';


if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/login.php");
    exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    if (isset($_POST['comment_id'])) {
      
        $comment_id = mysqli_real_escape_string($con, $_POST['comment_id']);
        
       
        $user_id = $_SESSION['user_id'];
        
        
        $delete_query = "DELETE FROM comments WHERE comment_id = $comment_id AND user_id = $user_id";
     
        if (mysqli_query($con, $delete_query)) {
            
            header("Location: ../admin/comment.php");
            exit();
        } else {
            
            echo "Error: " . mysqli_error($con);
        }
    } else {
        
        echo "Comment ID not provided.";
    }
} else {

    echo "Invalid request method.";
}
?>
