<?php
session_start();
include '../settings/connection.php';

if(isset($_POST['comment-submit'])){
    // Get the user ID from the session
    $user_id = $_SESSION['user_id'];
    $comment = $_POST['comment'];

    // Fetch the artwork_id from the artworks table
    // Modify the SQL query according to your criteria to fetch the artwork_id
    $artwork_id_query = "SELECT artwork_id FROM artworks"; // Replace ... with your criteria
    $artwork_id_result = $con->query($artwork_id_query);

    if($artwork_id_result && $artwork_id_row = $artwork_id_result->fetch_assoc()) {
        $artwork_id = $artwork_id_row['artwork_id'];

        // Prepare the SQL statement to insert the comment
        $insert_comment_sql = "INSERT INTO comments (user_id, comment, comment_date, artwork_id) VALUES (?, ?, NOW(), ?)";
        $stmt = $con->prepare($insert_comment_sql);

        // Bind parameters
        $stmt->bind_param("isi", $user_id, $comment, $artwork_id);

        // Execute the statement
        if($stmt->execute()){
            // Redirect back to the same page after successful comment submission
            header('Location: ../admin/comment.php');
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error fetching artwork ID";
    }
    exit();
}
?>
