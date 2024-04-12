<?php
include '../settings/connection.php';


if(isset($_GET['user_id'])) {
    
    $user_id = $_GET['user_id'];

    $query = "SELECT profile_picture FROM users WHERE user_id = ?";

    $stmt = mysqli_prepare($con, $query);
    
   
    mysqli_stmt_bind_param($stmt, "i", $user_id);

    
    mysqli_stmt_execute($stmt);

    mysqli_stmt_bind_result($stmt, $profile_picture);

    mysqli_stmt_fetch($stmt);

 
    mysqli_stmt_close($stmt);

    
    if($profile_picture) {
        $profile_picture_path = $profile_picture;
    } else {
        $profile_picture_path = "../uploads/Potato.png"; 
    }
} else {
    $profile_picture_path = "../uploads/Potato.png"; 
}
?>
