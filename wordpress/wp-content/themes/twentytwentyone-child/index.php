<?php
get_header();
?>

    <main id="primary" class="site-main">
		<?php
		while ( have_posts() ) :
			the_post();
			// Display the post content
			the_content();
		endwhile;
		?>
    </main>

<?php
get_footer();