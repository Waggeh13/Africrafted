<?php
session_start();
// Include database connection
include '../settings/connection.php';

// Initialize errors array
$errors = [];

// Check if the form is submitted and all required fields are present and not empty
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["username"]) && !empty($_POST["password"])) {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if the user exists in the database
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        // User found, verify password
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            // Password is correct, start session and return success message
            $_SESSION['username'] = $username;
            echo "success";
        } else {
            // Incorrect password
            $errors[] = "Incorrect password";
            echo "Incorrect password";
        }
    } else {
        // User not found
        $errors[] = "User not found";
        echo "User not found";
    }
} else {
    // Username or password fields are empty
    echo "Username and password are required";
}
?>
