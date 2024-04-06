<?php
session_start(); // Start the session if not already started
include '../settings/connection.php';

// Check if the user is logged in
if(isset($_SESSION['user_id'])) {
    // Get the user ID from the session
    $user_id = $_SESSION['user_id'];

    // Query to fetch the profile picture path based on the user ID
    $query = "SELECT profile_picture FROM users WHERE user_id = $user_id";

    // Execute the query
    $result = mysqli_query($con, $query);

    // Check if the query was successful and at least one row was returned
    if($result && mysqli_num_rows($result) > 0) {
        // Fetch the profile picture path from the result
        $row = mysqli_fetch_assoc($result);
        $profile_picture = $row['profile_picture'];
        
        // Now $profile_picture contains the path to the user's profile picture
    } else {
        // Handle case where user not found or query failed
        $profile_picture = "C:/xampp/htdocs/Africrafted/uploads/Potato.png"; // Provide a default profile picture path
    }
} else {
    // User is not logged in, provide a default profile picture path
    $profile_picture = "C:/xampp/htdocs/Africrafted/uploads/Potato.png";
}


