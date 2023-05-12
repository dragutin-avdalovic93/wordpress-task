<?php
/**
 * Plugin Name: QSS Login
 * Description: Plugin for integrating with Q Symfony Skeleton API for login functionality.
 * Version: 1.0
 * Author: Dragutin
 */

// Register custom page template
add_filter( 'theme_page_templates', 'qss_login_add_page_template', 10, 4 );

function qss_login_add_page_template( $page_templates, $theme, $post, $post_type ) {
	$page_templates['qss-login-template.php'] = 'QSS Login Template';

	return $page_templates;
}

// Load custom page template
add_filter( 'template_include', 'qss_login_load_template' );

function qss_login_load_template( $template ) {
	if ( is_page_template( 'qss-login-template.php' ) ) {
		$template = plugin_dir_path( __FILE__ ) . 'templates/qss-login-template.php';
	}

	return $template;
}

// Plugin initialization
function qss_login_init() {
	// Enqueue scripts and styles
	add_action( 'wp_enqueue_scripts', 'qss_login_enqueue_scripts' );
}

// Enqueue login scripts
function qss_login_enqueue_scripts() {
	wp_enqueue_script( 'qss-login-script', plugins_url( 'js/login.js', __FILE__ ), array( 'jquery' ), '1.0', true );
}

// Run the initialization function
qss_login_init();
