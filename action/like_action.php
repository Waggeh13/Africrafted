<?php
require_once("../settings/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $user_id = $_POST['user_id'];
    $artwork_id = $_POST['artwork_id'];

    // Insert like data into the database
    $sql = "INSERT INTO likes (user_id, artwork_id) VALUES ('$user_id', '$artwork_id')";

    if ($conn->query($sql) === TRUE) {
        echo "Like action successful";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

?>
