<?php
session_start(); 
include '../settings/connection.php';

// Check if the user is logged in
if(isset($_SESSION['user_id'])) {
    // Get the user ID from the session
    $user_id = $_SESSION['user_id'];

    $query = "SELECT profile_picture FROM users WHERE user_id = $user_id";

    $result = mysqli_query($con, $query);

    // Check if the query was successful and at least one row was returned
    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $profile_picture = $row['profile_picture'];
        
        // Now $profile_picture contains the path to the user's profile picture
    } else {
        $profile_picture = "C:/xampp/htdocs/Africrafted/uploads/Potato.png"; 
    }
} else {
    $profile_picture = "C:/xampp/htdocs/Africrafted/uploads/Potato.png";
}


