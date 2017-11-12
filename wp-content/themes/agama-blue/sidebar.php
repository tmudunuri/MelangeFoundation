<?php
/**
 * The sidebar containing the main widget area
 * 
 * If no active widgets are in the sidebar, hide it completely.
 *
 * @package Theme-Vision
 * @subpackage Agama Blue
 * @since 1.0.1
 */
if( ! defined( 'ABSPATH' ) ) exit; ?>

	<?php if ( is_active_sidebar( 'sidebar-1' ) && ! is_home() ) : ?>
		<div id="secondary" class="widget-area col-md-3" role="complementary">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div><!-- #secondary -->
	<?php endif; ?>