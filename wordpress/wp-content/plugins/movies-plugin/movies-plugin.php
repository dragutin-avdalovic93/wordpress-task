<?php
/*
 * Plugin name: Movies Plugin
 * Description: Plugin for managing movies
 * Version: 1.0
 * Author: Dragutin
 */

//Register a custom post type
function create_movies_post_type() {
	$labels = array(
		'name'               => 'Movies',
		'singular_name'      => 'Movie',
		'menu_name'          => 'Movies',
		'name_admin_bar'     => 'Movie',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New Movie',
		'new_item'           => 'New Movie',
		'edit_item'          => 'Edit Movie',
		'view_item'          => 'View Movie',
		'all_items'          => 'All Movies',
		'search_items'       => 'Search Movies',
		'parent_item_colon'  => 'Parent Movies:',
		'not_found'          => 'No movies found.',
		'not_found_in_trash' => 'No movies found in Trash.'
	);

	$args = array(
		'labels'                => $labels,
		'public'                => true,
		'publicly_queryable'    => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'movies' ),
		'capability_type'       => 'post',
		'has_archive'           => true,
		'hierarchical'          => false,
		'menu_position'         => null,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
		'rest_controller_class' => 'WP_REST_Posts_Controller'
	);

	register_post_type( 'movie', $args );
}

add_action( 'init', 'create_movies_post_type' );

//Add custom meta field for movie title
function add_movie_title_meta_box() {
	add_meta_box(
		'movie_title',
		'Movie Title',
		'movie_title_callback',
		'movie',
		'normal',
		'default'
	);
}

function movie_title_callback( $post ) {
	//Get current value of movie title
	$movie_title = get_post_meta( $post->ID, 'movie_title', true );

	//Display input field with movie title
	echo '<input type="text" id="movie_title" name="movie_title" value="' . esc_attr( $movie_title ) . '" />';
}

function save_movie_title_meta( $post_id ) {
	//Check if movie title is set
	if ( isset( $_POST['movie_title'] ) ) {
		update_post_meta( $post_id, 'movie_title', sanitize_text_field( $_POST['movie_title'] ) );
	}
}

add_action( 'save_post', 'save_movie_title_meta' );

function movies_rest_route() {
	register_rest_route(
		'movies-plugin/v1',
		'movies/(?P<id>\d+)',
		array(
			'methods'  => 'GET',
			'callback' => 'get_movie',
		)
	);
}

function get_movie( $request ) {
	$movie_id = $request->get_param( 'id' );
	$movie    = get_post( $movie_id );

	if ( empty( $movie ) ) {
		return new WP_Error( 'no_movie', 'Invalid movie ID', array( 'status' => 404 ) );
	}

	$movie_title = get_post_meta( $movie_id, 'movie_title', true );

	$response = array(
		'id'          => $movie_id,
		'title'       => $movie->post_title,
		'content'     => $movie->post_content,
		'movie_title' => $movie_title,
	);

	return rest_ensure_response( $response );
}

add_action( 'rest_api_init', 'movies_rest_route' );

/*test the REST API route with
* http://localhost:81/wp-json/movies-plugin/v1/movies/{movie_id}
*replacing {movie_id} with the ID of the movie you want to retrieve.
*/