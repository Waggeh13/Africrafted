<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="../css/profiles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/edit.js"></script>


</head>
    <body>
        <div class=top-bar>

            <div class="logo">
                <img src="../image/logo1.png" alt="Logo" class="logo">
            </div>

            <div class="bell-profile">
                
                <div class="home" id="homeLink">
                    <h6>Home</h6>
                </div>

            </div>

        </div>

        <div class="profile">
            <div class="profile-header">

                <div class="profile-photo">
                    <img src="../image/AfricanArt.jpg" alt="Profile Picture">
                </div>

                <button>Follow</button>

                <h2 class="username">
                    <?php
                        include '../action/get_username.php';
                        echo $username;
                    ?>
                    </h2>

                <div class="profile-info">
                    
                    <div class="counts">
                        <p class="post-count">Posts: <span>0</span></p>
                        <p class="followers-count">Followers: <span>0</span></p>
                        <p class="following-count">Following: <span>0</span></p>
                    </div>
                </div>
            </div>

            <hr  class="line">

            <div class="profile-content">

                <?php include '../action/user_post_action.php'; ?>

            </div>
        </div>
    </body>

    <script>
        document.getElementById("homeLink").addEventListener("click", function() {
    window.location.href = "../admin/home.php";
    });
    </script>

</html>
