<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/login.js"></script>
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

        .form-message {
            color: red; 
        }
    </style>

</head>
    <body>
        <div class="login_form">
            <div class="wrapper">
                <form action="login_user_action.php" method="post">
                    <h1>Login</h1>

                    <ul id="form-messages"></ul>

                    <p class="form-message"></p>

                    <div class="input-box">
                        <label for="username"></label>
                        <input type="text" id="username" placeholder="Username">
                        <i class='bx bxs-user'></i>
                    </div>

                    <div class="input-box">
                        <label for="password"></label>
                        <input type="password" id="password" placeholder="Password">
                        <i class='bx bxs-lock-alt'></i>
                    </div>

                    <button type="submit" class="btn" name="submit" id="btn-submit">Login</button>

                    <div class="register-link">
                        <p>Do not have an account?<a href="../login/register.php"> Register</a></p>
                    </div>
                    
                </form>
            </div>
        </div>
    </body>
</html>
