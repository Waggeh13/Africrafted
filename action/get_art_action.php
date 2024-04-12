<?php
include '../settings/connection.php';

echo '<link rel="stylesheet" href="../css/home.css">';

// Query to retrieve the image URL, the name of the user who posted it, and the user ID
$query = "SELECT artworks.image_url, users.username, artworks.artwork_id, artworks.user_id FROM artworks JOIN users ON artworks.user_id = users.user_id";
$stmt = mysqli_prepare($con, $query);

// Execute the statement
mysqli_stmt_execute($stmt);

// Bind the result
mysqli_stmt_bind_result($stmt, $imageUrl, $postedBy, $artworkId, $userId);

// Store all image URLs, usernames, and user IDs in an array
$posts = [];
while (mysqli_stmt_fetch($stmt)) {
    $posts[] = [
        'imageUrl' => $imageUrl,
        'postedBy' => $postedBy,
        'artworkId' => $artworkId,
        'userId' => $userId
    ];
}

// Close the statement
mysqli_stmt_close($stmt);
?>

<?php foreach ($posts as $post) : ?>
    <div class="art-post">
        <div class="art-space">
            <!-- Display the uploaded photo if it exists -->
            <img src="<?php echo $post['imageUrl']; ?>" alt="Uploaded Artwork" style="margin-top: 20px; width: 245px; height: 260px; background-color: rgb(232, 200, 132); margin-right: 5px; margin: 0px auto; border-top-left-radius: 8px; border-top-right-radius: 8px; max-width: 100%; max-height: 100%;">
        </div>
        <!-- Profile information -->
        <div class="profile-info">
            <div class="photo-icon">
                <!-- Display the user's profile picture -->
                <a href="../admin/profile.php?user_id=<?php echo $post['userId']; ?>">
                    <img src="../image/AfricanArt.jpg" alt="Profile Picture">
                </a>
            </div>
            <div class="name">
                <?php echo $post['postedBy']; ?>
            </div>
        </div>
        <!-- Comment and like icons -->
        <div class="icons-post">
            
        <a href="comment.php?artworkId=<?php echo $post['artworkId']; ?>">
            <i class="fas fa-comment"></i>
        </a>

            <i class="fas fa-heart"></i>
        </div>
    </div>
<?php endforeach; ?>