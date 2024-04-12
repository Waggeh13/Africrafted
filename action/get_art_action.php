<?php
include '../settings/connection.php';

echo '<link rel="stylesheet" href="../css/home.css">';


$query = "SELECT artworks.image_url, users.username, artworks.artwork_id, artworks.user_id FROM artworks JOIN users ON artworks.user_id = users.user_id";
$stmt = mysqli_prepare($con, $query);


mysqli_stmt_execute($stmt);

mysqli_stmt_bind_result($stmt, $imageUrl, $postedBy, $artworkId, $userId);


$posts = [];
while (mysqli_stmt_fetch($stmt)) {
    $posts[] = [
        'imageUrl' => $imageUrl,
        'postedBy' => $postedBy,
        'artworkId' => $artworkId,
        'userId' => $userId
    ];
}

mysqli_stmt_close($stmt);
?>

<?php foreach ($posts as $post) : ?>
    <div class="art-post">
        <div class="art-space">
           
            <img src="<?php echo $post['imageUrl']; ?>" alt="Uploaded Artwork" style="margin-top: 20px; width: 245px; height: 260px; background-color: rgb(232, 200, 132); margin-right: 5px; margin: 0px auto; border-top-left-radius: 8px; border-top-right-radius: 8px; max-width: 100%; max-height: 100%;">
        </div>
        
        <div class="profile-info">
            <div class="photo-icon">
                
                <a href="../admin/profile.php?user_id=<?php echo $post['userId']; ?>">
                    <img src="../image/AfricanArt.jpg" alt="Profile Picture">
                </a>
            </div>
            <div class="name">
                <?php echo $post['postedBy']; ?>
            </div>
        </div>
        
        <div class="icons-post">
            
        <a href="comment.php?artworkId=<?php echo $post['artworkId']; ?>">
            <i class="fas fa-comment"></i>
        </a>

        <i class="fas fa-heart like-icon" id="like-icon"></i>
        <span id="like-count">0</span>


        </div>
    </div>
<?php endforeach; ?>

</style>

<script>

const likeIcon = document.getElementById('like-icon');
const likeCount = document.getElementById('like-count');

let count = 0;


likeIcon.addEventListener('click', function() {
    
    likeIcon.classList.toggle('liked');

    
    if (likeIcon.classList.contains('liked')) {
        count++;
    } else {
        count--;
    }


    likeCount.textContent = count;

   
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../action/like_action.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log(xhr.responseText);
        } else {
            console.error('Error:', xhr.statusText);
        }
    };
    const userId = 1; 
    const artworkId = 1; 
    xhr.send('user_id=' + encodeURIComponent(userId) + '&artwork_id=' + encodeURIComponent(artworkId));
});

</script>

<style>

.like-icon.liked {
    color: red; 
    cursor: pointer; 
}

