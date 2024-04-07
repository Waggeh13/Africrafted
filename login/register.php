<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/register.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <!-- Add jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/registers.js"></script>
    
    <style>
        #form-messages{
            background-color: rgb(255, 232, 232);
            border: 1px solid red;
            color: red;
            display: none;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 10px;
            padding: 10px 25px;
            max-width: 250;
        }

        .error-message {
            color: red; 
            font-size: 12px; 
            font-weight: bold; 
        }
    </style>
        
</head>
<body>
    <div class="register_form">
        <div class="wrapper">
            <form id="registerForm" action="../action/register_user_action.php" method="post">
                <h1>Register</h1>
                <ul id="form-messages"></ul>

                <!-- Username field -->
                <div class="input-box">
                    <label for="username"></label>
                    <input type="text" id="username" name="username" placeholder="Username" required>
                    <i class='bx bxs-user'></i>
                    <p id="username_error" class="error-message"></p>
                </div>

                <!-- Email field -->
                <div class="input-box">
                    <label for="email"></label>
                    <input type="email" id="email" name="email" placeholder="Email" required>
                    <i class='bx bx-mail-send'></i>
                    <p id="email_error" class="error-message"></p>
                </div>

                <!-- Password field -->
                <div class="input-box">
                    <label for="password"></label>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <i class='bx bxs-lock-alt'></i>
                    <p id="password_error" class="error-message"></p>
                </div>

                <!-- Confirm Password field -->
                <div class="input-box">
                    <label for="confirm-password"></label>
                    <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" required>
                    <i class='bx bxs-lock-alt'></i>
                    <p id="cpassword_error" class="error-message"></p>
                </div>

                <!-- Image upload section -->
                <div id="image-preview" class="image-upload-section">
                    <label for="profile-picture" class="upload-label">Upload Image</label>
                    <img id="preview-image" src="#" alt="Image Preview" style="display: none;">
                    <input type="file" id="profile-picture" name="profile-picture">
                    <p id="image_error" class="error-message"></p>
                </div>


                <!-- Submit button -->
                <button type="submit" class="btn" name="submit" id="btn-submit">Register</button>

                <!-- Login link -->
                <div class="register-link">
                    <p>Already have an account?<a href="../login/login.php"> Login</a></p>
                </div>
                
                <!-- Form message -->
                <p class="form-message"></p>
            </form>
        </div>
    </div>
</body>
</html>
