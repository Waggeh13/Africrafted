<?php
include '../settings/connection.php';
include '../action/get_username.php';

echo '<link rel="stylesheet" href="../css/home.css">';

// Fetch all uploaded image URLs from the database
$query = "SELECT image_url FROM artworks WHERE user_id = ?";
$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "i", $_SESSION['user_id']);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Store all image URLs in an array
$imageUrls = [];
while ($row = mysqli_fetch_assoc($result)) {
    $imageUrls[] = $row['image_url'];
}
mysqli_stmt_close($stmt);
?>


<?php foreach ($imageUrls as $imageUrl) : ?>
    <div class="art-post">
        <div class="art-space">
            <!-- Display the uploaded photo if it exists -->
            <img src="<?php echo $imageUrl; ?>" alt="Uploaded Artwork" style="margin-top: 20px; width: 245px; height: 260px; background-color: rgb(232, 200, 132); margin-right: 5px; margin: 0px auto; border-top-left-radius: 8px; border-top-right-radius: 8px; max-width: 100%; max-height: 100%;">
        </div>
        <!-- Profile information -->
        <div class="profile-info">
            <div class="photo-icon">
                <!-- Display the user's profile picture -->
                <img src="../image/AfricanArt.jpg" alt="Profile Picture">
            </div>
            <div class="name">
                <?php echo $username; ?>
            </div>
        </div>
        <!-- Comment and like icons -->
        <div class="icons-post">
            <i class="fas fa-comment"></i>
            <i class="fas fa-heart"></i>
        </div>
        <!-- Comment section -->
        <div class="comment-section">
            <!-- Add comment form or display comments here -->
        </div>
    </div>
<?php endforeach; ?>
