<?php
session_start();
include '../settings/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $artworkId = $_POST['artworkId'];

    // Check if the user has already liked the artwork
    $checkQuery = "SELECT * FROM likes WHERE user_id = $userId AND artwork_id = $artworkId";
    $checkResult = mysqli_query($con, $checkQuery);

    if (mysqli_num_rows($checkResult) == 0) {
        // Insert like record into the existing likes table
        $insertQuery = "INSERT INTO likes (user_id, artwork_id) VALUES ($userId, $artworkId)";
        if (mysqli_query($con, $insertQuery)) {
            echo 'success';
        } else {
            echo 'error';
        }
    } else {
        // User has already liked the artwork
        echo 'already_liked';
    }
} else {
    // User is not logged in or invalid request method
    echo 'invalid_request';
}
?>
