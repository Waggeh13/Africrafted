<?php
session_start();
include '../settings/connection.php'; // Include your database connection file

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    // Query to fetch the username associated with the user's ID
    $query = "SELECT username FROM users WHERE id = $userId";
    $result = mysqli_query($con, $query);

    // Check if the query was successful
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $username = $row['username'];
    } else {
        $username = "Unknown"; // Default username if not found
    }
} else {
    // User is not logged in
    $username = "Guest"; // Default username for guests
}
?>

