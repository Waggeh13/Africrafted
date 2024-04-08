<?php
session_start();
include '../settings/connection.php';

if(isset($_POST['submit'])) {
    $fileName = $_FILES['image']['name'];
    $fileTmpName = $_FILES['image']['tmp_name'];
    $fileSize = $_FILES['image']['size'];
    $fileError = $_FILES['image']['error'];
    $fileType = $_FILES['image']['type'];

    // Check if the file has been uploaded successfully
    if ($fileError === 0) {
        // Generate a unique name for the file to prevent overwriting
        $fileUniqueName = uniqid('', true) . '_' . $fileName;
        // Define the directory where the file will be stored
        $fileDestination = '../uploads/' . $fileUniqueName;

        // Move the file to the specified directory
        if (move_uploaded_file($fileTmpName, $fileDestination)) {
            // File uploaded successfully, now insert its path into the database
            $query = "INSERT INTO artworks (user_id, image_url) VALUES (?, ?)";
            $stmt = mysqli_prepare($con, $query);
            
            // Bind parameters
            mysqli_stmt_bind_param($stmt, "is", $_SESSION['user_id'], $fileDestination);
            
            // Execute the statement
            mysqli_stmt_execute($stmt);

            if (mysqli_stmt_affected_rows($stmt) > 0) {
    
                header("Location: ../admin/home.php");
                exit(); 
            } else {
                echo "Error: Failed to upload image.";
            }
        } else {
            echo "Error: There was a problem uploading your file.";
        }
    } else {
        echo "Error: " . $fileError;
    }
}
?>
