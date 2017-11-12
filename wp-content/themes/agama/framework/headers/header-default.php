	
	<?php if( get_theme_mod( 'agama_top_navigation', true ) ): ?>
	<!-- Top Navigation Wrapper -->
	<div class="top-nav-wrapper">
		<div class="top-nav-sub-wrapper">
			
			<!-- Top Navigation -->
			<nav id="top-navigation" class="top-navigation pull-left" role="navigation">
				<?php echo Agama::menu( 'top', 'top-nav-menu' ); ?>
			</nav><!-- Top Navigation End -->
			
			
			<?php if( get_theme_mod( 'agama_top_nav_social', true ) ): ?>
			<!-- Top Social Icons -->
			<div id="top-social" class="pull-right">
				<?php Agama::sociali( false, 'animated' ); ?>
			</div><!-- Top Social Icons End -->
			<?php endif; ?>
		
		</div>
	</div><!-- Top Navigation Wrapper End -->
	<?php endif; ?>

	<!-- Logo -->
	<hgroup>
		
		<?php if( get_theme_mod( 'agama_logo' ) ): ?>
		<a href="<?php echo esc_url( home_url('/') ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
			<img src="<?php echo esc_url( get_theme_mod( 'agama_logo', '' ) ); ?>" class="logo">
		</a>
		<?php else: ?>
		<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		<?php endif; ?>
		
		<!-- Mobile Navigation Toggle -->
		<a href="#mobile-menu" data-toggle="collapse" class="mobile-menu-toggle collapsed">
			<?php _e( 'Mobile Menu Toggle', 'agama' ); ?>
		</a><!-- Mobile Navigation Toggle End -->
		
	</hgroup><!-- Logo End -->
	
	<!-- Primary Navigation -->
	<nav id="site-navigation" class="main-navigation" role="navigation">
		<?php echo Agama::menu( 'primary', 'nav-menu' ); ?>
	</nav><!-- Primary Navigation End -->
	
	<!-- Mobile Navigation -->
	<nav class="mobile-menu collapse">
		<?php echo Agama::menu( 'primary', 'menu' ); ?>
	</nav><!-- Mobile Navigation End -->
