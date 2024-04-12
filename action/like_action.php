<?php
session_start();
include '../settings/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $artworkId = $_POST['artworkId'];

    
    $checkQuery = "SELECT * FROM likes WHERE user_id = $userId AND artwork_id = $artworkId";
    $checkResult = mysqli_query($con, $checkQuery);

    if (mysqli_num_rows($checkResult) == 0) {
       
        $insertQuery = "INSERT INTO likes (user_id, artwork_id) VALUES ($userId, $artworkId)";
        if (mysqli_query($con, $insertQuery)) {
            echo 'success';
        } else {
            echo 'error';
        }
    } else {
        
        $deleteQuery = "DELETE FROM likes WHERE user_id = $userId AND artwork_id = $artworkId";
        if (mysqli_query($con, $deleteQuery)) {
            echo 'unliked';
        } else {
            echo 'error';
        }
    }
} else {
    
    echo 'invalid_request';
}
?>
