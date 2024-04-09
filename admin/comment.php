<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment Section</title>
    <style>
        body{
            background-color: #D6D3B6;
            font-family: 'Poppins', sans-serif;
        }

        .comment-section {
            width: 80%;
            margin: 0 auto;
            padding-top: 20px;
        }

        #comment-form {
            margin-bottom: 20px;
        }

        #comment {
            width: 100%;
            height: 100px;
            resize: vertical; /* Allow vertical resizing of the textarea */
            margin-bottom: 10px;
        }

        #comment-submit {
            display: inline-block; 
            margin-right: 10px;
            padding: 8px 20px;
            background-color: #EC6519; /* Adjusted to match your color scheme */
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #comment-submit:hover {
            background-color: #D35400; 
        }

        #comment-close {
            display: inline-block; 
            padding: 8px 20px;
            background-color: #EC6519; 
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #comment-close:hover {
            background-color: #595959; 
        }

        .comment {
            margin-bottom: 10px;
            padding: 10px;
            background-color: beige;
            border-radius: 8px;
        }

        .comment-content {
            margin-bottom: 5px;
        }

        .reply-button {
            margin-top: 5px;
            background-color: #EC6519;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
        }

        .reply-button:hover {
            background-color: #595959;
        }

    </style>
</head>
<body>
    <div class="comment-section">
        <form id="comment-form" action="../action/add_comment_action.php" method="POST">
            <textarea id="comment" name="comment" placeholder="Write your comment here" required></textarea>
            <button type="submit" id="comment-submit" name="comment-submit">Publish</button>
            <button type="button" id="comment-close" onclick="closeCommentSection()">Close</button>
        </form>
        
        <div id="comments-container">
            <!-- Comments will be dynamically added here -->
            <?php include '../action/get_comments_action.php'; ?>
        </div>
    </div>
    
    <script>
        // Your JavaScript code
        function closeCommentSection() {
            window.location.href = "../admin/home.php";
        }
    </script>
</body>
</html>
