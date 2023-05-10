<?php
/**
 * Plugin Name: QSS Login
 * Description: Plugin for integrating with Q Symfony Skeleton API for login functionality.
 * Version: 1.0
 * Author: Dragutin
 */

// Register custom page template
add_filter('theme_page_templates', 'qss_login_add_page_template');

function qss_login_add_page_template($templates) {
	$templates['qss-login-template.php'] = 'QSS Login Template';
	return $templates;
}

// Plugin initialization
function qss_login_init() {
	// Enqueue scripts and styles
	add_action('wp_enqueue_scripts', 'qss_login_enqueue_scripts');
}

// Enqueue login scripts
function qss_login_enqueue_scripts() {
	wp_enqueue_script('qss-login-script', plugins_url('js/login.js', __FILE__), array('jquery'), '1.0', true);
}

// Run the initialization function
qss_login_init();
