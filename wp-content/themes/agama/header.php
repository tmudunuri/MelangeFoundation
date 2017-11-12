<?php
/**
 * The Header template
 *
 * @package Theme-Vision
 * @subpackage Agama
 * @since Agama 1.0
 */ 
 ?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	<?php wp_head(); ?>

</head>

<body <?php body_class('stretched'); ?>>

<!-- Main Wrapper Start -->
<div id="main-wrapper">
	
	<!-- Header Start -->
	<header id="masthead" class="site-header clearfix <?php Agama::header_class(); ?>" role="banner">
		
		<?php get_template_part( 'framework/headers' ); // Get headers ?>
		
		<!-- Header Image Start -->
		<?php if ( get_header_image() ) : ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<img src="<?php esc_url( header_image() ); ?>" class="header-image" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
		</a>
		<?php endif; ?><!-- Header Image End -->
		
	</header><!-- Header End -->
	
	<?php
	#############################################################
	# SLIDER ACTION
	#############################################################
	do_action( 'agama_slider_action' );
	#############################################################
	# BREADCRUMB ACTION
	#############################################################
	if( get_theme_mod( 'agama_breadcrumb', true ) ):
		// If breadcrumb is disabled on homepage do not show anything
		if( get_theme_mod( 'agama_breadcrumb_homepage', '' ) && is_home() || 
		    get_theme_mod( 'agama_breadcrumb_homepage', '' ) && is_front_page() ): else:
			
			do_action( 'agama_breadcrumbs_action' );
			
		endif;
	endif; ?>

	<div id="page" class="hfeed site">
		<div id="main" class="wrapper">
			<div class="vision-row clearfix">
				
				<?php 
				#############################################################
				# FRONTPAGE BOXES ACTION
				#############################################################
				do_action( 'agama_frontpage_boxes_action' ); ?>