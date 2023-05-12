<?php
/*
 * Template Name: Custom Movie Template
 * Template Post Type: movie
 */

get_header();
?>

<div class="movie-wrapper">
	<?php while ( have_posts() ) : the_post(); ?>
        <div class="movie-title">
            <h2><?php echo get_post_meta( get_the_ID(), 'movie_title', true ); ?></h2>
        </div>
        <div class="movie-content">
			<?php
			// Get all blocks in the post content
			$blocks = parse_blocks( get_the_content() );

			// Loop through the blocks
			foreach ( $blocks as $block ) {
				// Output the block content
				echo render_block( $block );

				// Check if it's the first block and display the featured image
				if ( $block === reset( $blocks ) && has_post_thumbnail() ) {
					echo '<div class="movie-featured-image">';
					the_post_thumbnail();
					echo '</div>';
				}
			}
			?>
        </div>
	<?php endwhile; ?>
</div>

<?php get_footer(); ?>
