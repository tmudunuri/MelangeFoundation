<?php
if( ! defined( 'ABSPATH' ) ) exit;

switch( get_theme_mod( 'agama_header_style', 'transparent' ) ):

	case 'transparent':
		get_template_part( 'framework/headers/header-transparent' );
	break;
	
	case 'sticky':
		get_template_part( 'framework/headers/header-sticky' );
	break;
	
	case 'default':
		get_template_part( 'framework/headers/header-default' );
	break;

endswitch;
