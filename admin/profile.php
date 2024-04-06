<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="../css/profile.css">
</head>
<body>
    <div class=top-bar>
            <div class="logo">
                <img src="../image/logo1.png" alt="Logo" class="logo">
            </div>

            </div>
    <div class="profile">
        <div class="profile-header">
            <div class="profile-photo">
                <button onclick="window.location.href='../admin/edit_profile.php'" class="edit-button">Edit profile</button>
                <img src="profile.jpg" alt="Profile Picture">
            </div>
            <div class="profile-info">
                <h2 class="username">
                    <?php
                    include '../action/get_username.php';
                     echo $username; 
                     ?>
                </h2>
                <p class="post-count">Posts: <span>0</span></p>
                <p class="followers-count">Followers: <span>1</span></p>
                <p class="following-count">Following: <span>0</span></p>
            </div>
        </div>
        <div class="profile-content">
            <!-- Add user's posts or other content here -->
        </div>
    </div>
</body>
</html>
