jQuery(document).ready(function ($) {
    // Handle login form submission
    $("#submitBtn").on('click', function (e) {
        e.preventDefault();

        // Get form input values
        var email = $("#email").val();
        var password = $("#password").val();

        // Create a request body
        var requestBody = {
            email: email,
            password: password
        }

        // Send a post request to retrieve the access token
        $.ajax({
            url: 'https://symfony-skeleton.q-tests.com/api/v2/token',
            method: 'POST',
            data: JSON.stringify(requestBody),
            contentType: 'application/json',
            success: function (response) {
                console.log(response);
                // Store the access token using local storage
                localStorage.setItem('access_token', response.token_key);

                // Redirect to dashboard after successful login
                window.location.href = '/';
            },
            error: function (xhr, status, error) {
                // Handle login error
                console.log(error);
                alert('Login failed, try again!');
            }
        });
    });
});
