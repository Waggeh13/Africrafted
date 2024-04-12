<?php
session_start();
include '../settings/connection.php';

if(isset($_POST['comment-submit'])){
   
    $user_id = $_SESSION['user_id'];
    $comment = $_POST['comment'];

   
    $artwork_id_query = "SELECT artwork_id FROM artworks"; 
    $artwork_id_result = $con->query($artwork_id_query);

    if($artwork_id_result && $artwork_id_row = $artwork_id_result->fetch_assoc()) {
        $artwork_id = $artwork_id_row['artwork_id'];

       
        $insert_comment_sql = "INSERT INTO comments (user_id, comment, comment_date, artwork_id) VALUES (?, ?, NOW(), ?)";
        $stmt = $con->prepare($insert_comment_sql);

        $stmt->bind_param("isi", $user_id, $comment, $artwork_id);

       
        if($stmt->execute()){
            
            header('Location: ../admin/comment.php');
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }

        $stmt->close();
    } else {
        echo "Error fetching artwork ID";
    }
    exit();
}
?>
