<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="../css/edit.css">
</head>
<body>
<div class=top-bar>
            <div class="logo">
                <img src="../image/logo1.png" alt="Logo" class="logo">
            </div>

            </div>
    <h2>Edit Profile</h2>
    <form action="edit_profile_action.php" method="post">
        <!-- Your form fields for editing profile information -->
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="profile-picture">Profile Picture:</label>
        <input type="file" id="profile-picture" name="profile-picture">
        <br>
        <button type="submit" name="update">Update Profile</button>
        <button type="submit" name="delete">Delete Account</button>
    </form>
</body>
</html>
