<?php
/**
 * The Template for displaying all single posts
 *
 * @package Theme-Vision
 * @subpackage Agama
 * @since Agama 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content <?php echo Agama::bs_class(); ?>">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>
				
				<?php Agama::post_prev_next_links(); ?>

				<?php comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>

		</div>
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>