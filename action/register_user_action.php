<?php
include '../settings/connection.php';


$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["username"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["confirm-password"])) {

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm-password"];

    $profile_picture = $_FILES["profile-picture"]["name"];
    $target_dir = "/opt/lampp/htdocs/Africrafted/uploads/";
    $target_file = $target_dir . basename($profile_picture); 
    move_uploaded_file($_FILES["profile-picture"]["tmp_name"], $target_file); 
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    if (!empty($email)) {
        
        $checkEmailQuery = "SELECT * FROM users WHERE email = '$email'";
        $emailResult = mysqli_query($con, $checkEmailQuery);
        if (mysqli_num_rows($emailResult) > 0) {
         
            $errors[] = "Email already exists. Please choose a different email.";
        }
    }

    if (empty($errors)) {
        
        $query = "INSERT INTO users (username, email, password, profile_picture) 
                  VALUES ('$username', '$email', '$hashedPassword', '$target_file')";

        if (mysqli_query($con, $query)) {
         
            echo "success";
        } else {
           
            echo "Error: " . $query . "<br>" . mysqli_error($con);
        }
    } else {

        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
?>