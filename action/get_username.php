<?php

include '../settings/connection.php'; 

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $query = "SELECT username FROM users WHERE user_id = '$user_id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $username = $row['username'];
        } else {
            $username = "Unknown"; 
        }
    } else {
        
        $username = "Error"; 
        
        echo "MySQL Error: " . mysqli_error($con) . "<br>";
    }
} else {
    $username = "Guest"; 
}

