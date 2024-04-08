<?php
session_start();
include '../settings/connection.php';

if (isset($_POST['delete'])) {
    $user_id = $_SESSION['user_id'];

    $query = "DELETE FROM users WHERE user_id = $user_id";
    $result = mysqli_query($con, $query);

    if ($result) {
        header("Location: ../login/login.php");
        exit();
    } else {

        echo "Error: Unable to delete account.";
    }
}
?>
