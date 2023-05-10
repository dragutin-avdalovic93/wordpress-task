<?php
/*
 * Template Name: QSS Login Template
 * Template Post Type: page
 */

get_header();
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="container">
            <h2>Login</h2>
            <form id="login-form" method="post">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="form-group">
                    <button type="submit">Login</button>
                </div>
            </form>
        </div>
    </main>
</div>

<?php
get_footer();
?>
