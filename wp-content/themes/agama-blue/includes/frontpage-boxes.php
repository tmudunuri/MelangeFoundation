<?php
if( ! defined( 'ABSPATH' ) ) exit;
 
// Boxes enabled ? disabled
$box[1]['enable'] = esc_attr( get_theme_mod( 'agama_frontpage_box_1_enable', true ) );
$box[2]['enable'] = esc_attr( get_theme_mod( 'agama_frontpage_box_2_enable', true ) );
$box[3]['enable'] = esc_attr( get_theme_mod( 'agama_frontpage_box_3_enable', true ) );
$box[4]['enable'] = esc_attr( get_theme_mod( 'agama_frontpage_box_4_enable', true ) );

// If Enabled - Render Boxes
if( $box[1]['enable'] || $box[2]['enable'] || $box[3]['enable'] || $box[4]['enable'] ):
	
	$box['count'] = 0;
	
	if( $box[1]['enable'] ) {
		$box['count']++;
	}
	
	if( $box[2]['enable'] ) {
		$box['count']++;
	}
	
	if( $box[3]['enable'] ) {
		$box['count']++;
	}
	
	if( $box[4]['enable'] ) {
		$box['count']++;
	}
	
	switch( $box['count'] ) {
		case '1':
			$box['class'] = esc_attr( 'col-md-12' );
		break;
		
		case '2':
			$box['class'] = esc_attr( 'col-md-6' );
		break;
		
		case '3':
			$box['class'] = esc_attr( 'col-md-4' );
		break;
		
		default: $box['class'] = esc_attr( 'col-md-3' );
	}
	
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
	}

	// Boxes title
	$box[1]['title'] = esc_html( get_theme_mod( 'agama_frontpage_box_1_title', __( 'Responsive Layout', 'agama-blue' ) ) );
	$box[2]['title'] = esc_html( get_theme_mod( 'agama_frontpage_box_2_title', __( 'Endless Possibilities', 'agama-blue' ) ) );
	$box[3]['title'] = esc_html( get_theme_mod( 'agama_frontpage_box_3_title', __( 'Boxed & Wide Layouts', 'agama-blue' ) ) );
	$box[4]['title'] = esc_html( get_theme_mod( 'agama_frontpage_box_4_title', __( 'Powerful Performance', 'agama-blue' ) ) );
	
	// Boxes FA Icon
	$box[1]['icon'] = esc_attr( get_theme_mod( 'agama_frontpage_box_1_icon', 'fa-tablet' ) );
	$box[2]['icon'] = esc_attr( get_theme_mod( 'agama_frontpage_box_2_icon', 'fa-cogs' ) );
	$box[3]['icon'] = esc_attr( get_theme_mod( 'agama_frontpage_box_3_icon', 'fa-laptop' ) );
	$box[4]['icon'] = esc_attr( get_theme_mod( 'agama_frontpage_box_4_icon', 'fa-magic' ) );
	
	// Boxes Image (instead of FA icon)
	$box[1]['img'] = esc_url( get_theme_mod( 'agama_frontpage_1_img', '' ) );
	$box[2]['img'] = esc_url( get_theme_mod( 'agama_frontpage_2_img', '' ) );
	$box[3]['img'] = esc_url( get_theme_mod( 'agama_frontpage_3_img', '' ) );
	$box[4]['img'] = esc_url( get_theme_mod( 'agama_frontpage_4_img', '' ) );
	
	// Boxes Image / Icons URL
	$box[1]['url'] = esc_url( get_theme_mod( 'agama_frontpage_box_1_icon_url', '' ) );
	$box[2]['url'] = esc_url( get_theme_mod( 'agama_frontpage_box_2_icon_url', '' ) );
	$box[3]['url'] = esc_url( get_theme_mod( 'agama_frontpage_box_3_icon_url', '' ) );
	$box[4]['url'] = esc_url( get_theme_mod( 'agama_frontpage_box_4_icon_url', '' ) );
	
	// Boxes text
	$box[1]['description'] = esc_html( get_theme_mod( 'agama_frontpage_box_1_text', __( 'Powerful Layout with Responsive functionality that can be adapted to any screen size.', 'agama-blue' ) ) );
	$box[2]['description'] = esc_html( get_theme_mod( 'agama_frontpage_box_2_text', __( 'Complete control on each & every element that provides endless customization possibilities.', 'agama-blue' ) ) );
	$box[3]['description'] = esc_html( get_theme_mod( 'agama_frontpage_box_3_text', __( 'Stretch your Website to the Full Width or make it boxed to surprise your visitors.', 'agama-blue' ) ) );
	$box[4]['description'] = esc_html( get_theme_mod( 'agama_frontpage_box_4_text', __( 'Optimized code that are completely customizable and deliver unmatched fast performance.', 'agama-blue' ) ) ); ?>

	<div id="frontpage-boxes" class="clearfix">
		
		<?php if( $box[1]['enable'] ): ?>
		<div class="<?php echo $box['class']; ?> fbox-1"<?php echo $box[1]['data-animated']; ?>>
			
			<?php if( $box[1]['url'] ): ?>
			<a href="<?php echo $box[1]['url']; ?>">
			<?php endif; ?>
				
				<?php if( $box[1]['img'] ): ?>
					<img src="<?php echo $box[1]['img']; ?>" alt="<?php echo $box[1]['title']; ?>">
				<?php else: ?>
					<i class="fa <?php echo $box[1]['icon']; ?>"></i>
				<?php endif; ?>
				
			<?php if( $box[1]['url'] ): ?>
			</a>
			<?php endif; ?>
			
			<?php if( $box[1]['title'] ): ?>
				<h2><?php echo $box[1]['title']; ?></h2>
			<?php endif; ?>
			
			<?php if( $box[1]['description'] ): ?>
				<p><?php echo $box[1]['description']; ?></p>
			<?php endif; ?>
		
		</div>
		<?php endif; ?>
		
		<?php if( $box[2]['enable'] ): ?>
		<div class="<?php echo $box['class']; ?> fbox-2"<?php echo $box[2]['data-animated']; ?>>
			
			<?php if( $box[2]['url'] ): ?>
			<a href="<?php echo $box[2]['url']; ?>">
			<?php endif; ?>
			
				<?php if( $box[2]['img'] ): ?>
					<img src="<?php echo $box[2]['img']; ?>" alt="<?php echo $box[2]['title']; ?>">
				<?php else: ?>
					<i class="fa <?php echo $box[2]['icon']; ?>"></i>
				<?php endif; ?>
			
			<?php if( $box[2]['url'] ): ?>
			</a>
			<?php endif; ?>
			
			<?php if( $box[2]['title'] ): ?>
				<h2><?php echo $box[2]['title']; ?></h2>
			<?php endif; ?>
			
			<?php if( $box[2]['description'] ): ?>
				<p><?php echo $box[2]['description']; ?></p>
			<?php endif; ?>
		
		</div>
		<?php endif; ?>
		
		<?php if( $box[3]['enable'] ): ?>
		<div class="<?php echo $box['class']; ?> fbox-3"<?php echo $box[3]['data-animated']; ?>>
			
			<?php if( $box[3]['url'] ): ?>
			<a href="<?php echo $box[3]['url']; ?>">
			<?php endif; ?>
			
				<?php if( $box[3]['img'] ): ?>
					<img src="<?php echo $box[3]['img']; ?>" alt="<?php echo $box[3]['title']; ?>">
				<?php else: ?>
					<i class="fa <?php echo $box[3]['icon']; ?>"></i>
				<?php endif; ?>
				
			<?php if( $box[3]['url'] ): ?>
			</a>
			<?php endif; ?>
			
			<?php if( $box[3]['title'] ): ?>
				<h2><?php echo $box[3]['title']; ?></h2>
			<?php endif; ?>
			
			<?php if( $box[3]['description'] ): ?>
				<p><?php echo $box[3]['description']; ?></p>
			<?php endif; ?>
		
		</div>
		<?php endif; ?>
		
		<?php if( $box[4]['enable'] ): ?>
		<div class="<?php echo $box['class']; ?> fbox-4"<?php echo $box[4]['data-animated']; ?>>
			
			<?php if( $box[4]['url'] ): ?>
			<a href="<?php echo $box[4]['url']; ?>">
			<?php endif; ?>
			
				<?php if( $box[4]['img'] ): ?>
					<img src="<?php echo $box[4]['img']; ?>" alt="<?php echo $box[4]['title']; ?>">
				<?php else: ?>
					<i class="fa <?php echo $box[4]['icon']; ?>"></i>
				<?php endif; ?>
				
			<?php if( $box[4]['url'] ): ?>
			</a>
			<?php endif; ?>
			
			<?php if( $box[4]['title'] ): ?>
				<h2><?php echo $box[4]['title']; ?></h2>
			<?php endif; ?>
			
			<?php if( $box[4]['description'] ): ?>
				<p><?php echo $box[4]['description']; ?></p>
			<?php endif; ?>
		
		</div>
		<?php endif; ?>
		
	</div>

<?php endif; ?>