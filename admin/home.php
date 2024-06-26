<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../css/home.css">
</head>

    <body>
        <div class=top-bar>
                <div class="logo">
                    <img src="../image/logo1.png" alt="Logo" class="logo">
                </div>

                <div class="bell-profile">
                    
                    <div class="profile-picture-frame">
                        <a href="../admin/profile.php">
                            <img class="image-upload-icon" src="<?php echo $profile_picture; ?>" alt="Profile Picture">
                        </a>
                    </div>

                </div>

                <div class="logout" id="logoutLink">
                    <h6>Logout<h6>
                </div>

            </div>

        <div class="post-work">
                <div class="text-box">
                    <h6 class="centered-text">Share your art today</h6>
                </div>
                <button type="button" class="btn" onclick="window.location.href = 'upload_art.php';">Upload your masterpiece</button>

        </div>

        <div class="follow-popular">
                <span class="popular">Popular</span>
                <span> | </span>
                <span class="follow">Following</span>
        </div>

        <hr  class="line">

        <div class="home-content">
            
            <?php include '../action/get_art_action.php'; ?>

        </div>

        
    <script>
        document.getElementById("logoutLink").addEventListener("click", function() {
    window.location.href = "../login/login.php";
    });
    </script>

    </body>
</html>
