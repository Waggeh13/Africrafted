$(document).ready(function(){
    $("form").submit(function(event){
        event.preventDefault();

        var username = $("#username").val();
        var password = $("#password").val();
        var submit = $("#btn-submit").val();

        if(username.trim() === '' || password.trim() === '') {
            $(".form-message").html("Please fill in all fields.").show();
            return; 
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
                    window.location.href = "../admin/home.php"; 
                } else {
                    $(".form-message").html(response).show();
                }
            },
            error: function(xhr, status, error){
                $(".form-message").html( "Incorrect username or password").show();
            }
        });
        
    });
});
