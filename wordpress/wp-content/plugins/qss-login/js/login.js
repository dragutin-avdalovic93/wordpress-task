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
                // Store the access token as an object with expiration time
                var tokenData = {
                    token: response.token_key,
                    expiresAt: new Date().getTime() + (24 * 60 * 60 * 1000) // Set expiration time to 24 hours from now
                };

                // Store the token data and expiration timestamp in local storage
                localStorage.setItem('access_token', tokenData.token);
                localStorage.setItem('access_token_expiration', tokenData.expiresAt.toString());

                // Redirect to dashboard after successful login
                window.location.href = '/movies';


                // Set the expiration time for the cookie (e.g., 1 day from now)
                //var expirationTime = new Date();
                //expirationTime.setDate(expirationTime.getDate() + 1);
                // Set the token in a cookie
                //document.cookie = "access_token=" + token + "; expires=" + expirationTime.toUTCString() + "; path=/;";
                // Redirect to dashboard after successful login
                window.location.replace("/sample-page");
            },
            error: function (xhr, status, error) {
                // Handle login error
                console.log(error);
                alert('Login failed, try again!');
            }
        });
    });
});
