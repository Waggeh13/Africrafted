
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../css/home.css">
</head>

<style>
    .top-bar .profile-picture-frame {
        width: 55px; 
        height: 55px; 
        border: 3px solid orange; 
        border-radius: 50%; 
        overflow: hidden; 
        margin-left: 1430px;
        margin-top: -45px;
    
    }
    .profile-picture-frame img {
        width: 100%; 
        height: 100%; 
        object-fit: cover; 
        
    }

    .fas{
        font-size: 28px;
        justify-content: space-between;
        
    }

    .top-bar .icons{
        margin-top: -56px;
        margin-right: 10px;
        margin-left: 1360px;
    }

    .logo{
        margin-top: 8px;
    }

    .post-work{
    width:1000px;
    height: 100px;
    background-color: #EC6519;
    border: 2px #EC6519;
    padding: 20px;
    border-radius: 20px;
    align-content: center;
    margin: 0;
    }

    .text-box{
        width: 200px;
        height:50px;
        background-color: white;
        border: white;
        border-radius: 8px;
        align-content: center;
    }

</style>

<body>
   <div class=top-bar>
        <div class="logo">
            <img src="../image/logo1.png" alt="Logo" class="logo">
        </div>

        <div class="icons">
            <i class="fas fa-bell"></i>
        </div>
        
        <div class="profile-picture-frame">
            <?php
            include '../action/profile_picture_action.php';
            
            echo '<img src="' . $profile_picture . '" alt="Profile Picture">';
            ?>
        </div>
   </div>

   <div class="post-work">
        <div class="text-box">
            <h6 style="text-align: center;">Share your art today</h6>
        </div>
        <button type="submit" class="btn" name="submit" id="btn-submit">Uploud your masterpiece</button>
   </div>
</body>
</html>
