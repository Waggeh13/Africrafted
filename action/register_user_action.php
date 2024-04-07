<?php
// Include database connection
include '../settings/connection.php';

// Initialize errors array
$errors = [];

// Check if the form is submitted and all required fields are present and not empty
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["username"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["confirm-password"])) {
    // Retrieve form data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm-password"];

    // Process uploaded profile picture
    $profile_picture = $_FILES["profile-picture"]["name"]; // Get the name of the uploaded file
    $target_dir = "C:/xampp/htdocs/Africrafted/uploads/"; // Correct directory where the file will be stored
    $target_file = $target_dir . basename($profile_picture); // Path of the file on the server
    move_uploaded_file($_FILES["profile-picture"]["tmp_name"], $target_file); // Move the uploaded file to the target directory

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if email already exists only if email field is not empty
    if (!empty($email)) {
        // Check if email already exists
        $checkEmailQuery = "SELECT * FROM users WHERE email = '$email'";
        $emailResult = mysqli_query($con, $checkEmailQuery);
        if (mysqli_num_rows($emailResult) > 0) {
            // Add error message to errors array
            $errors[] = "Email already exists. Please choose a different email.";
        }
    }

    // Insert user data into the database if there are no errors
    if (empty($errors)) {
        // INSERT query
        $query = "INSERT INTO users (username, email, password, profile_picture) 
                  VALUES ('$username', '$email', '$hashedPassword', '$target_file')";

        if (mysqli_query($con, $query)) {
            // Success message
            echo "success";
        } else {
            // Handle database insertion error
            echo "Error: " . $query . "<br>" . mysqli_error($con);
        }
    } else {
        // Output errors if any
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
?>