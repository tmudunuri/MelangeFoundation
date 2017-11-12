<?php 

if( ! defined( 'ABSPATH' ) ) exit; 

/**
 * Agama Slider
 *
 * @since 1.2.0
 */
if( ! function_exists( 'agama_slider' ) ) {
	function agama_slider() {
		
		if( get_theme_mod( 'agama_slider_enable', true ) ) {
			
			if( get_theme_mod( 'agama_slider_visibility', 'homepage' ) == 'homepage' && is_home() || 
				get_theme_mod( 'agama_slider_visibility', 'homepage' ) == 'frontpage' && is_front_page() ) {
					
				// Slide Image
				$slide['1']['img']			= esc_url( get_theme_mod( 'agama_slider_image_1', AGAMA_IMG . 'header_img.jpg' ) );
				$slide['2']['img']			= esc_url( get_theme_mod( 'agama_slider_image_2', AGAMA_IMG . 'header_img.jpg' ) );
				$slide['3']['img']			= esc_url( get_theme_mod( 'agama_slider_image_3', AGAMA_IMG . 'header_img.jpg' ) );

				// Slide Title
				$slide['1']['title']		= esc_attr( get_theme_mod( 'agama_slider_title_1', 'Welcome to Agama' ) );
				$slide['2']['title']		= esc_attr( get_theme_mod( 'agama_slider_title_2', 'Welcome to Agama' ) );
				
				// Slide Animation
				$slide['1']['animate'] 		= esc_attr( get_theme_mod( 'agama_slider_title_animation_1', 'bounceInLeft' ) );
				$slide['2']['animate'] 		= esc_attr( get_theme_mod( 'agama_slider_title_animation_2', 'bounceInLeft' ) );
				
				// Slide Title Color
				$slide['1']['title_color']	= esc_attr( get_theme_mod( 'agama_slider_title_color_1', '#fff' ) );
				$slide['2']['title_color']	= esc_attr( get_theme_mod( 'agama_slider_title_color_2', '#fff' ) );
				
				// Button Title
				$button['1']['title'] 		= esc_attr( get_theme_mod( 'agama_slider_button_title_1', 'Learn More' ) );
				$button['2']['title'] 		= esc_attr( get_theme_mod( 'agama_slider_button_title_2', 'Learn More' ) );
				
				// Button Animation
				$button['1']['animate']		= esc_attr( get_theme_mod( 'agama_slider_button_animation_1', 'bounceInRight' ) );
				$button['2']['animate']		= esc_attr( get_theme_mod( 'agama_slider_button_animation_2', 'bounceInRight' ) );
				
				// Button URL
				$button['1']['url'] 		= esc_url( get_theme_mod( 'agama_slider_button_url_1', '#' ) );
				$button['2']['url'] 		= esc_url( get_theme_mod( 'agama_slider_button_url_2', '#' ) );
				
				// Button BG Color
				$button['1']['bg_color'] 	= esc_attr( get_theme_mod( 'agama_slider_button_bg_color_1', '#A2C605' ) );
				$button['2']['bg_color'] 	= esc_attr( get_theme_mod( 'agama_slider_button_bg_color_2', '#A2C605' ) ); ?>
				
				<div id="agama_slider" class="camera_wrap">
				
					<?php if( $slide['1']['img'] ): ?>
					<div data-src="<?php echo $slide['1']['img']; ?>">
						
						<div class="slide-content slide-1">
							<?php if( $slide['1']['title'] ): ?>
								<h2 class="slide-title animated <?php echo $slide['1']['animate']; ?>" style="color:<?php echo $slide['1']['title_color']; ?>;">
									<?php echo $slide['1']['title']; ?>
								</h2>
							<?php endif; ?>
							<?php if( $button['1']['title'] ): ?>
								<a href="<?php echo $button['1']['url']; ?>" class="button button-3d button-rounded button-xlarge animated <?php echo $button['1']['animate']; ?>" style="background-color: <?php echo $button['1']['bg_color']; ?>">
									<?php echo $button['1']['title']; ?>
								</a>
							<?php endif; ?>
						</div>
						
					</div>
					<?php endif; ?>
					
					<?php if( $slide['2']['img'] ): ?>
					<div data-src="<?php echo $slide['2']['img']; ?>">
						
						<div class="slide-content slide-2">
							<?php if( $slide['2']['title'] ): ?>
								<h2 class="slide-title animated <?php echo $slide['2']['animate']; ?>" style="color:<?php echo $slide['2']['title_color']; ?>;">
									<?php echo $slide['2']['title']; ?>
								</h2>
							<?php endif; ?>
							<?php if( $button['2']['title'] ): ?>
								<a href="<?php echo $button['2']['url']; ?>" class="button button-3d button-rounded button-xlarge animated <?php echo $button['2']['animate']; ?>" style="background-color: <?php echo $button['2']['bg_color']; ?>">
									<?php echo $button['2']['title']; ?>
								</a>
							<?php endif; ?>
						</div>
						
					</div>
					<?php endif; ?>
				
				</div>
		
	<?php
			}
		}
	}
}
add_action( 'agama_slider_action', 'agama_slider', 10 ); ?>