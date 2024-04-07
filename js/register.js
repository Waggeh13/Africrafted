$(document).ready(function(){
    // Listen for changes on the file input
    $("#profile-picture").change(function() {
        var input = this;
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                // Display the selected image
                $(".image-upload-icon i").removeClass('bx-user-circle').addClass('profile-picture').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    });

    $("#btn-submit").click(function(event){
        event.preventDefault();
        
        const username = $("#username");
        const email = $("#email");
        const password = $("#password");
        const cpassword = $("#confirm-password");
        const image = $("#profile-picture");

        const username_error = $("#username_error");
        const email_error = $("#email_error");
        const password_error = $("#password_error");
        const cpassword_error = $("#cpassword_error");
        const image_error = $("#image_error");

        var email_check = /^[a-zA-Z0-9._%+-]+\@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

        if(username.val() === '' || username.val() == null) {
            username_error.html("Username is required");
        } else {
            username_error.html("");
        }

        if(email.val() === '' || email.val() == null) {
            email_error.html("Email is required");
        } else if (!email.val().match(email_check)) {
            email_error.html("Valid email is required");
        } else {
            email_error.html("");
        }

        if(password.val() === '' || password.val() == null) {
            password_error.html("Password is required");
        } else if (password.val().length <= 5) {
            password_error.html("Password must be more than 6 characters");
        } else if (password.val().length >= 20) {
            password_error.html("Password cannot be more than 20 characters");
        } else {
            password_error.html("");
        }

        if(cpassword.val() === '' || cpassword.val() == null) {
            cpassword_error.html("Confirm Password is required");
        } else if (password.val() !== cpassword.val()) {
            cpassword_error.html("Passwords do not match");
        } else {
            cpassword_error.html("");
        }

        if(image.val() === '' || image.val() == null) {
            image_error.html("Image is required");
        } else {
            image_error.html("");
        }

        // Create FormData object
        var formData = new FormData($("#registerForm")[0]);

        $.ajax({
            type: "POST",
            url: "../action/register_user_action.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response){
                if (response.trim() === "success") {
                    // Redirect to the login page upon successful registration
                    window.location.href = "..login/logn.php";
                } else {
                    // Display error message
                    $(".form-message").html(response).show();
                }
                
            },
            error: function(xhr, status, error){
                // Handle error
                $(".form-message").html("An error occurred: " + error).show();
            }
        });
        
    });
});