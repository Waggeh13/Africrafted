$(document).ready(function(){
    // Handle form submission
    $("#edit-profile-form").submit(function(event){
        event.preventDefault(); // Prevent default form submission

        // Get form data
        var formData = new FormData($(this)[0]);

        // Submit form data asynchronously using AJAX
        $.ajax({
            type: "POST",
            url: "../action/edit_profile_actions.php",
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

    // Function to display pop-up confirmation message
    function confirmDelete() {
        // Display confirmation dialog
        var confirmed = confirm("Are you sure you want to delete your account?");
        
        // If user confirms, redirect to delete_profile_action.php
        if (confirmed) {
            window.location.href = "../action/delete_profile_action.php";
        }
    }

    

      
});
