<?php

if( ! defined( 'ABSPATH' ) ) exit; 

/**
 * Framework Init
 *
 * @since Agama v1.0.1
 */
get_template_part('framework/classes/core');
get_template_part('framework/classes/agama');
get_template_part('framework/classes/woocommerce');
get_template_part('framework/slider');
get_template_part('framework/breadcrumbs');
get_template_part('framework/frontpage-boxes');
get_template_part('framework/widgets/widgets');
get_template_part('framework/admin/admin-init'); 
