<?php
include '../settings/connection.php';

echo '<link rel="stylesheet" href="../css/home.css">';

// Query to retrieve the image URL and the name of the user who posted it
$query = "SELECT artworks.image_url, users.username, artworks.artwork_id FROM artworks JOIN users ON artworks.user_id = users.user_id WHERE artworks.user_id = ?";
$stmt = mysqli_prepare($con, $query);

// Bind parameters
mysqli_stmt_bind_param($stmt, "i", $_SESSION['user_id']);

// Execute the statement
mysqli_stmt_execute($stmt);

// Bind the result
mysqli_stmt_bind_result($stmt, $imageUrl, $postedBy, $artworkId);

// Store all image URLs and the corresponding usernames in an array
$posts = [];
while (mysqli_stmt_fetch($stmt)) {
    $posts[] = [
        'imageUrl' => $imageUrl,
        'postedBy' => $postedBy,
        'artworkId' => $artworkId
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
                <img src="../image/AfricanArt.jpg" alt="Profile Picture">
            </div>
            <div class="name">
                <?php echo $post['postedBy']; ?>
            </div>
        </div>
        <!-- Comment and like icons -->
        <div class="icons-post">
            <i class="fas fa-comment" onclick="showCommentSection(event, <?php echo $post['artworkId']; ?>)"></i>
            <i class="fas fa-heart"></i>
        </div>
        
    </div>
<?php endforeach; ?>
