<?php if( ! defined( 'ABSPATH' ) ) exit; ?>

<!-- Small Thumbs -->
<div class="small-thumbs">

		<div class="entry clearfix">
		
			<?php if( get_theme_mod( 'agama_blog_single_post_thumbnail', true ) ): ?>
			<div class="entry-image">
			
				<?php if( get_theme_mod( 'agama_blog_thumbnails_permalink', true ) ): ?>
					<a href="<?php the_permalink(); ?>">
				<?php endif; ?>
				
					<img class="image_fade img-responsive image-grow" src="<?php echo agama_return_image_src('agama-blog-small'); ?>" alt="<?php the_title(); ?>">
				
				<?php if( get_theme_mod( 'agama_blog_thumbnails_permalink', true ) ): ?>
					</a>
				<?php endif; ?>
				
			</div>
			<?php endif; ?>

			<!-- Entry Title -->
			<div class="entry-title">
				<h2><?php the_title(); ?></h2>
			</div><!-- .entry-title end -->
			
			<?php if( get_theme_mod('agama_blog_post_meta', true) ): ?>
			<!-- Entry Meta -->
			<ul class="entry-meta clearfix">
				
				<?php if( get_theme_mod( 'agama_blog_post_author', true ) ): ?>
				<li><a href="<?php the_author_link(); ?>"><i class="fa fa-user"></i> <?php the_author(); ?></a></li>
				<?php endif; ?>
				
				<?php if( get_theme_mod( 'agama_blog_post_date', true ) ): ?>
				<li><i class="fa fa-calendar"></i> <?php the_time('m, Y'); ?></li>
				<?php endif; ?>
				
				<?php if( get_theme_mod( 'agama_blog_post_category', true ) ): ?>
				<li><i class="fa fa-folder-open"></i> <?php echo get_the_category_list(', '); ?></li>
				<?php endif; ?>
				
				<?php if( get_theme_mod( 'agama_blog_post_comments', true ) ): ?>
				<li><a href="<?php the_permalink(); ?>#comments"><i class="fa fa-comments"></i> <?php echo Agama::comments_count(); ?></a></li>
				<?php endif; ?>
				
			</ul><!--.entry-meta-->
			<?php endif; ?>

			<!-- Entry Content -->
			<div class="entry-content notopmargin">

				<?php the_content(); ?>

				<!-- Tag Cloud -->
				<div class="tagcloud clearfix bottommargin">
					<?php the_tags(false, false, false); ?>
				</div>

				<div class="clear"></div>

			</div>
			
			<!-- Content Footer -->
			<footer class="entry-meta">
				
				<?php edit_post_link( __( '<i class="fa fa-edit"></i> Edit', 'agama' ), '<span class="edit-link">', '</span>' ); ?>
				
				<?php Agama::about_author(); ?>
				
			</footer><!-- .entry-meta -->
			
		</div><!--.entry-->
		
</div><!--.small-thumbs-->