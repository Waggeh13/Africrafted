
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../css/homepage.css">
</head>

<body>
   <div class=top-bar>
        <div class="logo">
            <img src="../image/logo1.png" alt="Logo" class="logo">
        </div>

        <div class="bell-profile">

            <div class="icons">
                <i class="fas fa-comment"></i>
                <i class="fas fa-bell"></i>
            </div>
            
            <div class="profile-picture-frame">
                <a href="../admin/profile.php">
                    <?php
                    include '../action/profile_picture_action.php';
                    echo '<img src="' . $profile_picture . '" alt="Profile Picture">';
                    ?>
                </a>
            </div>

        </div>

    </div>

   <div class="post-work">
        <div class="text-box">
            <h6 class="centered-text">Share your art today</h6>
        </div>
        <button type="submit" class="btn" name="submit" id="btn-submit">Uploud your masterpiece</button>
   </div>

   <div class="follow-popular">
        <span class="popular">Popular</span>
        <span> | </span>
        <span class="follow">Following</span>
   </div>

   <hr  class="line">

   <div class="posted-works">


   </div>


</body>
</html>
