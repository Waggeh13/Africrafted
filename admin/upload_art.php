<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Form</title>
    <link rel="stylesheet" href="../css/upload.css">

</head>
    <body>

    <div class="top-bar">
            <div class="logo">
                <img src="../image/logo1.png" alt="Logo" class="logo">
            </div>
        </div>

    <form action="../action/upload_action.php" method="post" enctype="multipart/form-data" class="upload-form">
        <label for="image">Upload your art:</label>
        <input type="file" id="image" name="image" required>
        <br>
        <label for="description"> Write a brief description:</label>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea>
        <br>
        <button type="submit" name="submit">Upload</button>
        <button type="button" id="btn-cancel" onclick="window.location.href = '../admin/home.php';">Cancel</button>
    </form>

    </body>
</html>
