function showUserDetails(userId) {
    // Send AJAX request to fetch user details
    $.ajax({
        url: 'fetch_user_details.php',
        type: 'GET',
        data: { user_id: userId },
        dataType: 'json',
        success: function(response) {
            // Display SweetAlert 2 modal with user details and input fields
            Swal.fire({
                title: 'Account',
                html: `<div id="userDetails">
                            <img src="user_images/${response.image}" id="profile_image" style="max-width: 100px; border-radius: 50%; margin-bottom: 20px;"><br>
                            <input type="file" id="image_upload" accept="image/*" style="margin-bottom: 10px; width:80%; margin-left:10%;">
                            <input type="text" id="fullname" class="swal2-input" value="${response.fullname}" placeholder="Full Name">
                            <input type="email" id="email" class="swal2-input" value="${response.email}" placeholder="Email">
                            <input type="text" id="phone_number" class="swal2-input" value="${response.number}" placeholder="Phone Number">
                        </div>
                        <div id="changePasswordForm" style="display:none;">
                        <!-- Input fields for passwords with eye icons -->
                            <input type="password" id="current_password" class="swal2-input password-input" placeholder="Current Password">
                            <input type="password" id="new_password" class="swal2-input password-input" placeholder="New Password">
                            <input type="password" id="confirm_password" class="swal2-input password-input" placeholder="Confirm Password">
                            <br><br>
                            <button id="showPasswordBtn" class="btn btn-secondary" style="background:#6AF65E; color:black;">Show Password</button><br><br>
                            <button id="savePasswordBtn" class="btn btn-primary" style="background:#dfa974;">Save</button>
                            <button id="cancelPasswordBtn" class="btn btn-secondary" style="background:#F77F4F;">Back</button><br>
                        </div>`,
                showCloseButton: true,
                allowOutsideClick: false,
                showLoaderOnConfirm: true,
                onOpen: function() {
                    $('.swal2-container').slideDown();
                },
                preConfirm: () => {
                    return new Promise((resolve) => {
                        // Retrieve updated values from input fields
                        var fullname = $('#fullname').val();
                        var email = $('#email').val();
                        var phoneNumber = $('#phone_number').val();
                        var imageData = $('#image_upload')[0].files[0]; // Get the selected image file
    
                        if (!fullname || !email || !phoneNumber) {
                            Swal.showValidationMessage('Please fill out all fields');
                            resolve(false);
                            return;
                        }
                        // Prepare form data for AJAX request
                        var formData = new FormData();
                        formData.append('user_id', userId);
                        formData.append('fullname', fullname);
                        formData.append('email', email);
                        formData.append('phone_number', phoneNumber);
                        formData.append('image', imageData);
    
                        // Send AJAX request to update user details
                        $.ajax({
                            url: 'update_user_details.php',
                            type: 'POST',
                            data: formData,
                            contentType: false,
                            processData: false,
                            dataType: 'json',
                            success: function(response) {
                                if (response && response.success) {
                                    // Update the profile image if update was successful
                                    $('#profile_image').attr('src', 'user_images/' + response.image);
                                    // Resolve the promise to close the modal
                                    resolve();
                                } else {
                                    Swal.showValidationMessage('Failed to update profile');
                                }
                            },
                            error: function(xhr, status, error) {
                                Swal.showValidationMessage('Failed to update profile');
                            }
                        });
                    });
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    });
                    Toast.fire({
                        icon: "success",
                        title: "Updated Successfully"
                    });
                }
            });
    
            // Function to display the uploaded image in real-time
            $('#image_upload').change(function() {
                var reader = new FileReader();
                reader.onload = function(event) {
                    $('#profile_image').attr('src', event.target.result);
                };
                reader.readAsDataURL(this.files[0]);
            });
    
            $('.swal2-confirm').show();
            $('.swal2-cancel').show();
            $('.swal2-confirm').text('Save');
            $('.swal2-confirm').css('background-color', '#dfa974');
            $('.swal2-cancel').css('background-color', '#F77F4F');
    
            // Show change password form when button is clicked
            $('.swal2-close').after(`<button id="changePasswordBtn" class="swal2-confirm btn btn-secondary" style="background:#dfa974;">Change Password</button>`);
            $('#changePasswordBtn').click(function() {
                $('#userDetails').slideUp();
                $('#changePasswordForm').slideDown();
                $(this).hide();
    
                // Hide the default confirm and cancel buttons
                $('.swal2-confirm').hide();
                $('.swal2-cancel').hide();
            });
    
            // Save password
            $('#savePasswordBtn').click(function() {
                var currentPassword = $('#current_password').val();
                var newPassword = $('#new_password').val();
                var confirmPassword = $('#confirm_password').val();
    
                if (newPassword !== confirmPassword) {
                    Swal.fire('Password Error', 'New password and confirm password do not match', 'error');
                    return;
                }
    
                // Send AJAX request to update password
                $.ajax({
                    url: 'update_password.php',
                    type: 'POST',
                    data: {
                        user_id: userId,
                        current_password: currentPassword,
                        new_password: newPassword
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response && response.success) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: "top-end",
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.onmouseenter = Swal.stopTimer;
                                    toast.onmouseleave = Swal.resumeTimer;
                                }
                            });
                            Toast.fire({
                                icon: "success",
                                title: "Password Updated!"
                            });
                        } else {
                            Swal.fire('Password Error', 'Failed to update password. Please check your current password', 'error');
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire('Password Error', 'Failed to update password. Please check your current password', 'error');
                    }
                });
            });
    
            // Show/hide password on button click
            $('#showPasswordBtn').click(function() {
                var passwordInputs = $('.password-input');
                var type = passwordInputs.attr('type');
                if (type === 'password') {
                    passwordInputs.attr('type', 'text');
                } else {
                    passwordInputs.attr('type', 'password');
                }
            });
    
            // Cancel changing password
            $('#cancelPasswordBtn').click(function() {
                $('#changePasswordForm').slideUp();
                $('#userDetails').slideDown();
                $('#changePasswordBtn').show();
    
                $('.swal2-confirm').show();
                $('.swal2-cancel').show();
            });
        },
        error: function(xhr, status, error) {
            // Handle error
    
            console.error('Error fetching user details: ' + error);
            // Display error message in modal
            Swal.fire({
                title: 'Error',
                text: 'Failed to fetch user details',
                icon: 'error',
                confirmButtonText: 'Close'
            });
        }
    });
    }
    
    
    
    
    // Function to fetch user details and update HTML
    // Function to fetch user details and update HTML
    function updateUserDetails() {
    $.ajax({
        url: 'live_user_details.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            // Update user image and full name
            $('#user_image_pc').attr('src', 'user_images/' + response.image);
            $('#user_fullname_pc').text(response.fullname);
    
            $('#user_image_mobile').attr('src', 'user_images/' + response.image);
            $('#user_fullname_mobile').text(response.fullname);
        },
        error: function(xhr, status, error) {
            console.error('Error fetching user details: ' + error);
        }
    });
    }
    
    // Call the function initially
    updateUserDetails();
    
    // Update user details every 3 seconds
    setInterval(updateUserDetails, 3000);
    