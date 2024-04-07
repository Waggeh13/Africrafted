<?php
session_start();
include '../settings/connection.php';

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["username"]) && !empty($_POST["password"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {

        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {

            $_SESSION['user_id'] = $user['user_id']; 
            echo "success";
        } else {
            
            $errors[] = "Incorrect password";
            echo "Incorrect password";
        }
    } else {
        
        $errors[] = "User not found";
        echo "User not found";
    }
} else {
   
    echo "Username and password are required";
}
?>
