<div class="sticky-header clear">
	<div class="sticky-header-inner clear">
		
		<!-- Logo -->
		<div class="pull-left">
			<?php if( get_theme_mod( 'agama_logo', '' ) ): ?>
				<a href="<?php echo esc_url( home_url('/') ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
					<img src="<?php echo esc_url( get_theme_mod( 'agama_logo' ) ); ?>" class="logo">
				</a>
			<?php else: ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url('/') ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<?php endif; ?>
		</div><!-- Logo End -->
		
		<!-- Primary Navigation -->
		<nav role="navigation" class="pull-right">
			<?php echo Agama::menu( 'primary', 'sticky-nav' ); ?>
		</nav><!-- Primary Navigation End -->
		
		<!-- Mobile Navigation Toggle -->
		<a href="#mobile-menu" data-toggle="collapse" class="mobile-menu-toggle collapsed">
			<?php _e( 'Mobile Menu Toggle', 'agama' ); ?>
		</a><!-- Mobile Navigation Toggle End -->
		
	</div>
</div>

<!-- Mobile Navigation -->
<nav class="mobile-menu collapse">
	<?php echo Agama::menu( 'primary', 'menu' ); ?>
</nav><!-- Mobile Navigation End -->
