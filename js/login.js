$(document).ready(function(){
    $("form").submit(function(event){
        event.preventDefault();

        var username = $("#username").val();
        var password = $("#password").val();
        var submit = $("#btn-submit").val();

        // Check if username or password is empty
        if(username.trim() === '' || password.trim() === '') {
            $(".form-message").html("Please fill in all fields.").show();
            return; // Exit the function if fields are empty
        }

        $.ajax({
            type: "POST",
            url: "../action/login_user_action.php",
            data: {
                username: username,
                password: password,
                submit: submit
            },
            success: function(response){
                if (response.trim() === "success") {
                    // Redirect to dashboard or homepage upon successful login
                    window.location.href = "../admin/home.php"; // Change the URL as needed
                } else {
                    // Display error message if login is unsuccessful
                    $(".form-message").html(response).show();
                }
            },
            error: function(xhr, status, error){
                // Handle error
                $(".form-message").html( "Incorrect username or password").show();
            }
        });
        
    });
});
