<?php
include '../settings/connection.php';

// Check if the user ID is provided in the URL
if(isset($_GET['user_id'])) {
    // Get the user ID from the URL
    $user_id = $_GET['user_id'];

    $query = "SELECT profile_picture FROM users WHERE user_id = $user_id";

    $result = mysqli_query($con, $query);

    // Check if the query was successful and at least one row was returned
    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $profile_picture = $row['profile_picture'];
        
        // Now $profile_picture contains the path to the user's profile picture
    } else {
        $profile_picture = "../uploads/Potato.png"; // Use relative or absolute URL
    }
} else {
    $profile_picture = "../uploads/Potato.png"; // Use relative or absolute URL
}
?>
