<?php
/*
 * Template Name: QSS Login Template
 * Template Post Type: page
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="container" style="text-align: center; padding: 20px;">
            <h2>Login</h2>
            <form id="login-form" method="post" style="width: 50%; margin: auto;">
                <div class="form-group" style="padding: 10px;">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="form-group" style="padding: 10px;">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="form-group" style="padding: 10px;">
                    <button type="button" id="submitBtn">Login</button>
                </div>
            </form>
        </div>
    </main>
</div>

<?php
get_footer();
?>
