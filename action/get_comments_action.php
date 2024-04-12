<?php
session_start();
include '../settings/connection.php';

$sql = "SELECT c.*, a.artwork_id FROM comments c JOIN artworks a ON c.artwork_id = a.artwork_id";

$result = $con->query($sql);
$posts = "";

while ($row = $result->fetch_assoc()) {
    $uid = $row['user_id'];
    $user_sql = "SELECT * FROM users WHERE user_id =$uid";
    $user_result = $con->query($user_sql);
    $user_row = $user_result->fetch_assoc();
    $username = $user_row['username'];
   
    $comment_id = $row['comment_id'];
    $comment = $row['comment'];
    $comment_time = $row['comment_date'];
    $artwork_id = $row['artwork_id'];

   
    if ($_SESSION['user_id'] == $uid) {
        
        $posts .= '<div class="comment-container" data-artwork-id="'.$artwork_id.'">'; 

        $posts .= '<div class="comment-box">
                       <div class="comment-avatar">'.$username.'</div>
                       <div class="comment-content">
                           <p class="comment-text">'.$comment.'</p>
                           <span class="comment-time">'.$comment_time.'</span>
                           <form action="../action/delete_comment.php" method="post">
                               <input type="hidden" name="comment_id" value="'.$comment_id.'">
                               <button type="submit" class="delete-comment-btn">Delete</button>
                           </form>
                       </div>
                   </div>';

      
        $posts .= '</div>'; 
    }
}

echo $posts;
?>

<style>
    .comment-container {
        margin-bottom: 20px;
    }

    .comment-box {
        background-color: beige;
        padding: 10px;
        border-radius: 8px;
    }

    .comment-content {
        overflow: hidden;
    }

    .comment-text {
        margin-bottom: 5px;
    }
    
    .delete-comment-btn {
        background-color: #ff0000;
        color: #ffffff;
        border: none;
        padding: 5px 10px;
        border-radius: 4px;
        cursor: pointer;
    }
</style>
