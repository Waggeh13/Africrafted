<?php
session_start();
include '../settings/connection.php';

if(isset($_POST['submit'])) {
    $fileName = $_FILES['image']['name'];
    $fileTmpName = $_FILES['image']['tmp_name'];
    $fileSize = $_FILES['image']['size'];
    $fileError = $_FILES['image']['error'];
    $fileType = $_FILES['image']['type'];

    if ($fileError === 0) {
        
        $fileUniqueName = uniqid('', true) . '_' . $fileName;
        
        $fileDestination = '../uploads/' . $fileUniqueName;

        
        if (move_uploaded_file($fileTmpName, $fileDestination)) {
            
            $query = "INSERT INTO artworks (user_id, image_url) VALUES (?, ?)";
            $stmt = mysqli_prepare($con, $query);
            
            
            mysqli_stmt_bind_param($stmt, "is", $_SESSION['user_id'], $fileDestination);
            
            
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
