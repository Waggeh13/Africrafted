<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
</head>
<body>
    <h1>Confirm Account Deletion</h1>
    <p>Are you sure you want to delete your account?</p>
    <form action="../action/delete_account.php" method="post">
        <button type="submit" name="confirm">Yes, Delete Account</button>
        <a href="../adminlprofile.php">Cancel</a>
    </form>
</body>
</html>
