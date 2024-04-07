$(document).ready(function(){
    // Handle form submission
    $("#edit-profile-form").submit(function(event){
        event.preventDefault(); // Prevent default form submission

        // Get form data
        var formData = new FormData($(this)[0]);

        // Submit form data asynchronously using AJAX
        $.ajax({
            type: "POST",
            url: "../action/edit_profile_action.php",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response){
                if (response.trim() === "success") {
                    window.location.href = "../admin/profile.php"; 
                } else {
                    alert(response); // Display error message
                }
            },
            error: function(xhr, status, error){
                console.error(xhr.responseText);
                alert("An error occurred. Please try again later.");
            }
        });
    });

    // Handle account deletion confirmation
    $("#confirm-delete-btn").click(function(){
        var confirmDelete = confirm("Are you sure you want to delete your account? This action cannot be undone.");
        if (confirmDelete) {
            // If confirmed, submit the form with the delete action
            $("#edit_profile-form").append('<input type="hidden" name="delete" value="1">');
            $("#edit_profile-form").submit();
        }
    });
});
