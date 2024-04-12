<?php
session_start();
include '../settings/connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/login.php");
    exit(); 
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $user_id = $_SESSION['user_id'];

    $query = "DELETE FROM users WHERE user_id = $user_id";
    $result = mysqli_query($con, $query);

    if ($result) {
        
        header("Location: ../login/login.php");
        exit(); 
    } else {
        echo "Error: Unable to delete account.";
        exit(); 
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];

    
    $query = "UPDATE users SET username='$username', email='$email' WHERE user_id={$_SESSION['user_id']}";

    if (mysqli_query($con, $query)) {
        
        header("Location: ../admin/profile.php");
        exit();
    } else {
     
        echo "Error updating record: " . mysqli_error($con);
    }
}
?>
