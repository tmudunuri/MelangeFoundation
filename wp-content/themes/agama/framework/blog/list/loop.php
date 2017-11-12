	<?php if( ! defined( 'ABSPATH' ) ) exit; ?>
	
	<?php $search_post_thumbnails = get_theme_mod('agama_search_page_thumbnails', ''); ?>

	<?php if ( has_post_thumbnail() && ! is_search() || is_search() && has_post_thumbnail() && $search_post_thumbnails ) { ?>
	<header class="entry-header">
		<figure class="hover1">
		
			<?php if( get_theme_mod( 'agama_blog_thumbnails_permalink', true ) ): ?>
				<a href="<?php the_permalink(); ?>">
			<?php endif; ?>
			
				<img src="<?php echo agama_return_image_src('agama-blog-large'); ?>" class="img-responsive">
			
			<?php if( get_theme_mod( 'agama_blog_thumbnails_permalink', true ) ): ?>
				</a>
			<?php endif; ?>
			
		</figure>
	</header>
	<?php } ?>

	<div class="article-entry-wrapper">

		<?php if ( is_sticky() && is_home() && ! is_paged() ) { // Sticky post ?>
			<div class="featured-post">
				<?php _e( 'Featured post', 'agama' ); ?>
			</div>
		<?php } ?>
		
		<?php
		/**
		 * agama_blog_post_date_and_format hook
		 *
		 * @hooked agama_render_blog_post_date - 10 (output HML post date & format)
		 */
		if( get_theme_mod('agama_blog_post_meta', true) ):
			do_action( 'agama_blog_post_date_and_format' ); 
		endif;
		?>
		
		<div class="entry-content">
			
			<h1 class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h1>
			
			<?php
			/**
			 * agama_blog_post_meta hook
			 *
			 * @hooked agama_render_blog_post_meta - 10  (output HTML post meta details)
			 */
			if( get_theme_mod('agama_blog_post_meta', true) ):
				echo '<p class="single-line-meta">';
				do_action( 'agama_blog_post_meta' );
				echo '</p>'; 
			endif; ?>
			
			<?php the_excerpt(); ?>
				
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'agama' ), 'after' => '</div>' ) ); ?>
		</div>
		
		<!-- Content Footer -->
		<footer class="entry-meta">
			<?php edit_post_link( __( '<i class="fa fa-edit"></i> Edit', 'agama' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
		
	</div>