<?php

if( ! defined( 'ABSPATH' ) ) exit; 

/**
 * Breadcrumbs
 *
 * @rewritten
 * @since 1.1.6
 */
if( ! function_exists( 'agama_breadcrumbs' ) ) {
	function agama_breadcrumbs() {
		global $post;
			
			$h1 = '';
			$output = '';

			if( is_single() || is_page() ) {
				$h1 	= sprintf( '<h1>%s</h1>', $post->post_title );
				$output = sprintf( '<li class="active">%s</li>', $post->post_title );
			}
			
			if( is_archive() ) {
				if ( is_day() ) :
					$h1 	= sprintf( '<h1>%s</h1> <span>%s</span>', __( 'Daily Archives', 'agama' ), get_the_date() );
					$output	= sprintf( '<li class="active">%s</li>', __( 'Daily Archives', 'agama' ) );
				elseif ( is_month() ) :
					$h1 	= sprintf( '<h1>%s</h1> <span>%s</span>', __( 'Monthly Archives', 'agama' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'agama' ) ) );
					$output	= sprintf( '<li class="active">%s</li>', __( 'Monthly Archives', 'agama' ) );
				elseif ( is_year() ) :
					$h1		= sprintf( '<h1>%s</h1> <span>%s</span>', __( 'Yearly Archives', 'agama' ), get_the_date( _x( 'Y', 'yearly archives date format', 'agama' ) ) );
					$output	= sprintf( '<li class="active">%s</li>', __( 'Yearly Archives', 'agama' ) );
				else :
					$h1		= __( 'Archives', 'agama' );
					$output = sprintf( '<li class="active">%s</li>', __( 'Archives', 'agama' ) );
				endif;
			}
			
			if( is_category() ) {
				$span = '';
				
				if( category_description() ) {
					$cat_desc 	= strip_tags( category_description() );
					$span		= sprintf( '<span>%s</span>', $cat_desc );
				}
				
				$category	= get_the_category();
				$cat_ID		= $category[0]->cat_ID;
				$h1			= sprintf( '<h1>%s</h1>', single_cat_title( '', false ) ) . $span;
				$output		= sprintf( '<li class="active">%s</li>', single_cat_title( '', false ) );
			}
			
			
			if( is_tag() ) {
				$h1		= sprintf( '<h1>%s</h1>', __( 'Tag', 'agama' ) );
				$output	= sprintf( '<li class="active">%s</li>', single_tag_title('', false) );
			}
			
			if( is_404() ) {
				$h1		= sprintf( '<h1>%s</h1> <span>%s</span>', '404', __( 'Page not Found', 'agama' ) );
				$output	= sprintf( '<li class="active">%s</li>', __( 'Page not Found', 'agama' ) );
			}
			
			if( is_search() ) {
				$h1		= sprintf( '<h1>%s</h1>', __( 'Search', 'agama' ) );
				$output = sprintf( '<li class="active">%s</li>', __( 'Search', 'agama' ) );
			}
			
			// WooCommerce
			if( class_exists('Woocommerce') ) {
				
				if( is_shop() ) {
					$h1		= sprintf( '<h1>%s</h1>', __( 'Shop', 'agama' ) );
					$output	= sprintf( '<li class="active">%s</li>', __( 'Shop', 'agama' ) );
				}
				
			}
			
			if( is_home() || is_front_page() ) {
				$h1 	= sprintf( '<h1>%s</h1>', __( 'Homepage', 'agama' ) );
				$output	= '';
			} 
			
			$style = get_theme_mod( 'agama_breadcrumb_style', 'mini' ) == 'mini' ? 'page-title-mini' : ''; ?>
			
			<!-- Breadcrumb -->
			<section id="page-title" <?php if( $style ): ?>class="<?php echo esc_attr( $style ); ?>"<?php endif; ?>>

				<div class="container clearfix">
					<?php echo $h1; ?>
					<ol class="breadcrumb">
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e( 'Home', 'agama' ); ?></a></li>
							<?php echo $output; ?>
					</ol>
				</div>

			</section><!-- / Breadcrumb -->
	<?php
	}
}
add_action( 'agama_breadcrumbs_action', 'agama_breadcrumbs', 10 );