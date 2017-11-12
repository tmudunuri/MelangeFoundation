<?php
/**
 * Agama Frontpage Boxes Hook
 *
 * @rewritten
 * @since 1.1.6
 */
add_action( 'agama_frontpage_boxes_action', 'agama_frontpage_boxes', 10 );
if( ! function_exists( 'agama_frontpage_boxes' ) ):
	function agama_frontpage_boxes() {
		$visibility = esc_attr( get_theme_mod( 'agama_frontpage_boxes_visibility', 'homepage' ) );
		
		if( $visibility == 'homepage' && is_home() || $visibility == 'frontpage' && is_front_page() || $visibility == 'allpages' ) {
			
			// Boxes enabled ? disabled
			$box_1_enable = get_theme_mod('agama_frontpage_box_1_enable', true);
			$box_2_enable = get_theme_mod('agama_frontpage_box_2_enable', true);
			$box_3_enable = get_theme_mod('agama_frontpage_box_3_enable', true);
			$box_4_enable = get_theme_mod('agama_frontpage_box_4_enable', true);
			
			// If Enabled - Render Boxes
			if( $box_1_enable || $box_2_enable || $box_3_enable || $box_4_enable ):
				
				$count = 0;
				
				if( $box_1_enable ) {
					$count++;
				}
				
				if( $box_2_enable ) {
					$count++;
				}
				
				if( $box_3_enable ) {
					$count++;
				}
				
				if( $box_4_enable ) {
					$count++;
				}
				
				switch( $count ) {
					case '1':
						$bs_class = 'col-md-12';
					break;
					
					case '2':
						$bs_class = 'col-md-6';
					break;
					
					case '3':
						$bs_class = 'col-md-4';
					break;
					
					default: $bs_class = 'col-md-3';
				}
			
				// Boxes title
				$box_1_title = get_theme_mod('agama_frontpage_box_1_title', 'Responsive Layout');
				$box_2_title = get_theme_mod('agama_frontpage_box_2_title', 'Endless Possibilities');
				$box_3_title = get_theme_mod('agama_frontpage_box_3_title', 'Boxed & Wide Layouts');
				$box_4_title = get_theme_mod('agama_frontpage_box_4_title', 'Powerful Performance');
				
				// Boxes FA Icon
				$box_1_icon = get_theme_mod('agama_frontpage_box_1_icon', 'fa-tablet');
				$box_2_icon = get_theme_mod('agama_frontpage_box_2_icon', 'fa-cogs');
				$box_3_icon = get_theme_mod('agama_frontpage_box_3_icon', 'fa-laptop');
				$box_4_icon = get_theme_mod('agama_frontpage_box_4_icon', 'fa-magic');
				
				// Boxes Image (instead of FA icon)
				$box_1_img = get_theme_mod('agama_frontpage_1_img', '');
				$box_2_img = get_theme_mod('agama_frontpage_2_img', '');
				$box_3_img = get_theme_mod('agama_frontpage_3_img', '');
				$box_4_img = get_theme_mod('agama_frontpage_4_img', '');
				
				// Boxes FA Icon / Image URL
				$box_1_icon_url = get_theme_mod('agama_frontpage_box_1_icon_url', '');
				$box_2_icon_url = get_theme_mod('agama_frontpage_box_2_icon_url', '');
				$box_3_icon_url = get_theme_mod('agama_frontpage_box_3_icon_url', '');
				$box_4_icon_url = get_theme_mod('agama_frontpage_box_4_icon_url', '');
				
				// Boxes FA Icon Color
				$box_1_icon_color = get_theme_mod('agama_frontpage_box_1_icon_color', '#A2C605');
				$box_2_icon_color = get_theme_mod('agama_frontpage_box_2_icon_color', '#A2C605');
				$box_3_icon_color = get_theme_mod('agama_frontpage_box_3_icon_color', '#A2C605');
				$box_4_icon_color = get_theme_mod('agama_frontpage_box_4_icon_color', '#A2C605');
				
				// Boxes text
				$box_1_text = get_theme_mod('agama_frontpage_box_1_text', 'Powerful Layout with Responsive functionality that can be adapted to any screen size.');
				$box_2_text = get_theme_mod('agama_frontpage_box_2_text', 'Complete control on each & every element that provides endless customization possibilities.');
				$box_3_text = get_theme_mod('agama_frontpage_box_3_text', 'Stretch your Website to the Full Width or make it boxed to surprise your visitors.');
				$box_4_text = get_theme_mod('agama_frontpage_box_4_text', 'Optimized code that are completely customizable and deliver unmatched fast performance.'); 
				
				// Boxes animated
				$box[1]['animated'] = esc_attr( get_theme_mod( 'agama_frontpage_box_1_animated', true ) );
				$box[2]['animated'] = esc_attr( get_theme_mod( 'agama_frontpage_box_2_animated', true ) );
				$box[3]['animated'] = esc_attr( get_theme_mod( 'agama_frontpage_box_3_animated', true ) );
				$box[4]['animated'] = esc_attr( get_theme_mod( 'agama_frontpage_box_4_animated', true ) );
				
				// Boxes animation
				$box[1]['animation'] = esc_attr( get_theme_mod( 'agama_frontpage_box_1_animation', 'fadeInLeft' ) );
				$box[2]['animation'] = esc_attr( get_theme_mod( 'agama_frontpage_box_2_animation', 'fadeInDown' ) );
				$box[3]['animation'] = esc_attr( get_theme_mod( 'agama_frontpage_box_3_animation', 'fadeInUp' ) );
				$box[4]['animation'] = esc_attr( get_theme_mod( 'agama_frontpage_box_4_animation', 'fadeInRight' ) );
				
				$box[1]['data-animated'] = '';
				if( $box[1]['animated'] && ! is_single() ) {
					$box[1]['data-animated'] = ' data-animonscroll="'. $box[1]['animation'] .'" data-delay="100"';
				} 
				
				$box[2]['data-animated'] = '';
				if( $box[2]['animated'] && ! is_single() ) {
					$box[2]['data-animated'] = ' data-animonscroll="'. $box[2]['animation'] .'" data-delay="200"';
				}
				
				$box[3]['data-animated'] = '';
				if( $box[3]['animated'] && ! is_single() ) {
					$box[3]['data-animated'] = ' data-animonscroll="'. $box[3]['animation'] .'" data-delay="300"';
				}
				
				$box[4]['data-animated'] = '';
				if( $box[4]['animated'] && ! is_single() ) {
					$box[4]['data-animated'] = ' data-animonscroll="'. $box[4]['animation'] .'" data-delay="400"';
				} ?>
				
				<div id="frontpage-boxes" class="clearfix">
					
					<?php if( $box_1_enable ): ?>
					<div class="<?php echo esc_attr( $bs_class ); ?>"<?php echo $box[1]['data-animated']; ?>>
						
						<?php if( $box_1_icon_url ): ?>
						<a href="<?php echo esc_url( $box_1_icon_url ); ?>">
						<?php endif; ?>
						
						<?php if( $box_1_img ): ?>
							<img src="<?php echo esc_url( $box_1_img ); ?>">
						<?php else: ?>
							<i class="fa <?php echo esc_attr( $box_1_icon ); ?>" style="color:<?php echo esc_attr( $box_1_icon_color ); ?>;"></i>
						<?php endif; ?>
						
						<?php if( $box_1_icon_url ): ?>
						</a>
						<?php endif; ?>
						
						<h2><?php echo $box_1_title; ?></h2>
						<p><?php echo $box_1_text; ?></p>
					
					</div>
					<?php endif; ?>
					
					<?php if( $box_2_enable ): ?>
					<div class="<?php echo esc_attr( $bs_class ); ?>"<?php echo $box[2]['data-animated']; ?>>
						
						<?php if( $box_2_icon_url ): ?>
						<a href="<?php echo esc_url( $box_2_icon_url ); ?>">
						<?php endif; ?>
						
						<?php if( $box_2_img ): ?>
							<img src="<?php echo esc_url( $box_2_img ); ?>">
						<?php else: ?>
							<i class="fa <?php echo esc_attr( $box_2_icon ); ?>" style="color:<?php echo esc_attr( $box_2_icon_color ); ?>;"></i>
						<?php endif; ?>
						
						<?php if( $box_2_icon_url ): ?>
						</a>
						<?php endif; ?>
						
						<h2><?php echo $box_2_title; ?></h2>
						<p><?php echo $box_2_text; ?></p>
					
					</div>
					<?php endif; ?>
					
					<?php if( $box_3_enable ): ?>
					<div class="<?php echo esc_attr( $bs_class ); ?>"<?php echo $box[3]['data-animated']; ?>>
						
						<?php if( $box_3_icon_url ): ?>
						<a href="<?php echo esc_url( $box_3_icon_url ); ?>">
						<?php endif; ?>
						
						<?php if( $box_3_img ): ?>
							<img src="<?php echo esc_url( $box_3_img ); ?>">
						<?php else: ?>
							<i class="fa <?php echo esc_attr( $box_3_icon ); ?>" style="color:<?php echo esc_attr( $box_3_icon_color ); ?>;"></i>
						<?php endif; ?>
						
						<?php if( $box_3_icon_url ): ?>
						</a>
						<?php endif; ?>
						
						<h2><?php echo $box_3_title; ?></h2>
						<p><?php echo $box_3_text; ?></p>
					
					</div>
					<?php endif; ?>
					
					<?php if( $box_4_enable ): ?>
					<div class="<?php echo esc_attr( $bs_class ); ?>"<?php echo $box[4]['data-animated']; ?>>
						
						<?php if( $box_4_icon_url ): ?>
						<a href="<?php echo esc_url( $box_4_icon_url ); ?>">
						<?php endif; ?>
						
						<?php if( $box_4_img ): ?>
							<img src="<?php echo esc_url( $box_4_img ); ?>">
						<?php else: ?>
							<i class="fa <?php echo esc_attr( $box_4_icon ); ?>" style="color:<?php echo esc_attr( $box_4_icon_color ); ?>;"></i>
						<?php endif; ?>
						
						<?php if( $box_4_icon_url ): ?>
						</a>
						<?php endif; ?>
						
						<h2><?php echo $box_4_title; ?></h2>
						<p><?php echo $box_4_text; ?></p>
					
					</div>
					<?php endif; ?>
					
				</div>
			
			<?php endif;  }  } endif; ?>