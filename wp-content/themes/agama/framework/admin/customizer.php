<?php
/**
 * Customizer Options
 *
 * @package Theme-Vision
 * @subpackage Agama
 * @since Agama 1.0
 */
if( ! defined( 'ABSPATH' ) ) exit; 

/**
 * Update Kirki Path's
 *
 * @since 1.2.0
 */
if ( ! function_exists( 'agama_theme_kirki_update_url' ) ) {
    function agama_theme_kirki_update_url( $config ) {
        $config['url_path'] = AGAMA_URI . 'framework/admin/kirki/';
        return $config;
    }
}
add_filter( 'kirki/config', 'agama_theme_kirki_update_url' );

###################################################################################
# GENERAL
###################################################################################
	Kirki::add_section( 'agama_general_section', array(
		'title'			=> __( 'General', 'agama' ),
		'description'	=> __( 'General settings section.', 'agama' ),
		'capability'	=> 'edit_theme_options',
		'priority'		=> 10
	) );
	Kirki::add_config( 'agama_search_page_thumbnails', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_search_page_thumbnails', array(
		'label'			=> __( 'Search Page Post Thumbnails', 'agama' ),
		'description'	=> __( 'Enable posts thumbnails on search page ?', 'agama' ),
		'section'		=> 'agama_general_section',
		'settings'		=> 'agama_search_page_thumbnails',
		'type'			=> 'switch',
		'default'		=> false
	) );
	Kirki::add_config( 'agama_nicescroll', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_nicescroll', array(
		'label'			=> __( 'Nicescroll', 'agama' ),
		'description'	=> __( 'Enable browser nicescroll ?', 'agama' ),
		'section'		=> 'agama_general_section',
		'settings'		=> 'agama_nicescroll',
		'type'			=> 'switch',
		'default'		=> false
	) );
	Kirki::add_config( 'agama_to_top', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_to_top', array(
		'label'			=> __( 'Back to Top', 'agama' ),
		'description'	=> __( 'Enable back to top button ?', 'agama' ),
		'section'		=> 'agama_general_section',
		'settings'		=> 'agama_to_top',
		'type'			=> 'switch',
		'default'		=> true
	) );
###################################################################################
# LAYOUT
###################################################################################
	Kirki::add_section( 'agama_layout_section', array(
		'title'			=> __( 'Layout', 'agama' ),
		'description'	=> __( 'Layout settings section.', 'agama' ),
		'capability'	=> 'edit_theme_options',
		'priority'		=> 20,
	) );
	Kirki::add_config( 'agama_layout_style', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_layout_style', array(
		'label'			=> __( 'Layout Style', 'agama' ),
		'description'	=> __( 'Select layout style.', 'agama' ),
		'section'		=> 'agama_layout_section',
		'settings'		=> 'agama_layout_style',
		'type'			=> 'select',
		'choices'		=> array(
			'fullwidth'	=> __( 'Full-Width', 'agama' ),
			'boxed'		=> __( 'Boxed', 'agama' )
		),
		'default'		=> 'fullwidth'
	) );
	Kirki::add_config( 'agama_sidebar_position', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_sidebar_position', array(
		'label'			=> __( 'Sidebar Position', 'agama' ),
		'description'	=> __( 'Select sidebar position.', 'agama' ),
		'section'		=> 'agama_layout_section',
		'settings'		=> 'agama_sidebar_position',
		'type'			=> 'select',
		'choices'		=> array(
			'left'		=> __( 'Left', 'agama' ),
			'right'		=> __( 'Right', 'agama' )
		),
		'default'		=> 'right'
	) );
###################################################################################
# HEADER
###################################################################################
	Kirki::add_panel( 'agama_header_panel', array(
		'title'			=> __( 'Header', 'agama' ),
		'description'	=> __( 'Header section.', 'agama' ),
		'priority'		=> 30
	) );
	##################################################
	# HEADER GENERAL SECTION
	##################################################
	Kirki::add_section( 'agama_header_section', array(
		'title'			=> __( 'General', 'agama' ),
		'description'	=> __( 'Header general section.', 'agama' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_header_panel'
	) );
	Kirki::add_config( 'agama_header_style', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_header_style', array(
		'label'			=> __( 'Header Style', 'agama' ),
		'description'	=> __( 'Select header style.', 'agama' ),
		'section'		=> 'agama_header_section',
		'settings'		=> 'agama_header_style',
		'type'			=> 'radio-buttonset',
		'choices'		=> array(
			'transparent'	=> __( 'Header V1', 'agama' ),
			'default'		=> __( 'Header V2', 'agama' ),
			'sticky'		=> __( 'Header V3', 'agama' )
		),
		'default'		=> 'transparent'
	) );
	Kirki::add_config( 'agama_top_navigation', array(
		'capability'		=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_top_navigation', array(
		'label'				=> __( 'Top Navigation', 'agama' ),
		'description'		=> __( 'Enable top navigation ?', 'agama' ),
		'help'				=> __( 'This feature works only with header V2 & V3.', 'agama' ),
		'section'			=> 'agama_header_section',
		'settings'			=> 'agama_top_navigation',
		'type'				=> 'switch',
		'default'			=> true
	) );
	Kirki::add_config( 'agama_header_top_margin', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_header_top_margin', array(
		'label'			=> __( 'Top Margin', 'agama' ),
		'description'	=> __( 'Set header top margin in PX.', 'agama' ),
		'help'			=> __( 'This feature works only with header V2.', 'agama' ),
		'section'		=> 'agama_header_section',
		'settings'		=> 'agama_header_top_margin',
		'type'			=> 'slider',
		'choices'		=> array(
			'step'		=> '1',
			'min'		=> '0',
			'max'		=> '100'
		),
		'default'		=> '0'
	) );
	Kirki::add_config( 'agama_header_top_border_size', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_header_top_border_size', array(
		'label'			=> __( 'Top Border', 'agama' ),
		'description'	=> __( 'Select header top border height in PX.', 'agama' ),
		'help'			=> __( 'This feature works with header V2 & V3.', 'agama' ),
		'section'		=> 'agama_header_section',
		'settings'		=> 'agama_header_top_border_size',
		'type'			=> 'number',
		'default'		=> '3'
	) );
	#######################################################
	# HEADER LOGO SECTION
	#######################################################
	Kirki::add_section( 'agama_header_logo_section', array(
		'title'			=> __( 'Logo', 'agama' ),
		'description'	=> __( 'Header logo section.', 'agama' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_header_panel'
	) );
	Kirki::add_config( 'agama_logo', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_logo', array(
		'label'			=> __( 'Logo', 'agama' ),
		'description'	=> __( 'Upload custom logo.', 'agama' ),
		'section'		=> 'agama_header_logo_section',
		'settings'		=> 'agama_logo',
		'type'			=> 'image'
	) );
	Kirki::add_config( 'agama_logo_max_height', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_logo_max_height', array(
		'label'			=> __( 'Logo Max-Height', 'agama' ),
		'description'	=> __( 'Set logo max-height in PX.', 'agama' ),
		'section'		=> 'agama_header_logo_section',
		'settings'		=> 'agama_logo_max_height',
		'type'			=> 'slider',
		'choices'		=> array(
			'step'		=> '1',
			'min'		=> '0',
			'max'		=> '250'
		),
		'default'		=> '90'
	) );
	##########################################
	# HEADER IMAGE SECTION
	##########################################
	Kirki::add_section( 'header_image', array(
		'title'			=> __( 'Header Image', 'agama' ),
		'description'	=> __( 'Header image section.', 'agama' ),
		'panel'			=> 'agama_header_panel'
	) );
###################################################################################
# SLIDER
###################################################################################
	Kirki::add_panel( 'agama_slider_panel', array(
		'title'			=> __( 'Slider', 'agama' ),
		'description'	=> __( 'Slider settings.', 'agama' ),
		'priority'		=> 40,
	) );
	##########################################################
	# SLIDER GENERAL SECTION
	##########################################################
	Kirki::add_section( 'agama_slider_general_section', array(
		'title'			=> __( 'General', 'agama' ),
		'description'	=> __( 'Slider general section.', 'agama' ),
		'panel'			=> 'agama_slider_panel',
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_config( 'agama_slider_enable', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_slider_enable', array(
		'label'			=> __( 'Enable', 'agama' ),
		'description'	=> __( 'Enable slider ?', 'agama' ),
		'section'		=> 'agama_slider_general_section',
		'settings'		=> 'agama_slider_enable',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_config( 'agama_slider_height', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_slider_height', array(
		'label'			=> __( 'Height', 'agama' ),
		'description'	=> __( 'Set slider height in pixels (px).', 'agama' ),
		'help'			=> __( 'Set 0 for full-screen slider.', 'agama' ),
		'section'		=> 'agama_slider_general_section',
		'settings'		=> 'agama_slider_height',
		'type'			=> 'number',
		'choices'		=> array(
			'min'		=> '0',
			'max'		=> '1000',
			'step'		=> '1'
		),
		'default'		=> '0'
	) );
	Kirki::add_config( 'agama_slider_time', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_slider_time', array(
		'label'			=> __( 'Time', 'agama' ),
		'description'	=> __( 'Milliseconds between the end of the sliding effect and the start of the nex one.', 'agama' ),
		'help'			=> __( '1000ms = 1sec.', 'agama' ),
		'section'		=> 'agama_slider_general_section',
		'settings'		=> 'agama_slider_time',
		'type'			=> 'number',
		'choices'		=> array(
			'min'		=> '1000',
			'max'		=> '28000',
			'step'		=> '1'
		),
		'default'		=> '7000'
	) );
	Kirki::add_config( 'agama_slider_visibility', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_slider_visibility', array(
		'label'			=> __( 'Visibility', 'agama' ),
		'description'	=> __( 'Select where the slider should be visible.', 'agama' ),
		'section'		=> 'agama_slider_general_section',
		'settings'		=> 'agama_slider_visibility',
		'type'			=> 'select',
		'choices'		=> array(
			'homepage'	=> __( 'Homepage', 'agama' ),
			'frontpage'	=> __( 'Front Page', 'agama' )
		),
		'default'		=> 'homepage'
	) );
	###################################################
	# SLIDE 1 SECTION
	###################################################
	Kirki::add_section( 'agama_slide_1_section', array(
		'title'			=> __( 'Slide #1', 'agama' ),
		'description'	=> __( 'Upload slider image.', 'agama' ),
		'panel'			=> 'agama_slider_panel',
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_config( 'agama_slider_image_1', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_slider_image_1', array(
		'label'			=> __( 'Image', 'agama' ),
		'settings'		=> 'agama_slider_image_1',
		'section'		=> 'agama_slide_1_section',
		'type'			=> 'image',
		'default'		=> AGAMA_IMG . 'header_img.jpg'
	) );
	Kirki::add_config( 'agama_slider_title_1', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_slider_title_1', array(
		'label'			=> __( 'Title', 'agama' ),
		'description'	=> __( 'Add custom slide title.', 'agama' ),
		'help'			=> __( 'If empty the title will be hidden.', 'agama' ),
		'section'		=> 'agama_slide_1_section',
		'settings'		=> 'agama_slider_title_1',
		'type'			=> 'text',
		'default'		=> __( 'Welcome to Agama', 'agama' )
	) );
	Kirki::add_config( 'agama_slider_title_animation_1', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_slider_title_animation_1', array(
		'label'			=> __( 'Title Animation', 'agama' ),
		'description'	=> __( 'Select title slide animation.', 'agama' ),
		'section'		=> 'agama_slide_1_section',
		'settings'		=> 'agama_slider_title_animation_1',
		'type'			=> 'select',
		'choices'		=> AgamaAnimate::choices(),
		'default'		=> 'bounceInLeft'
	) );
	Kirki::add_config( 'agama_slider_title_color_1', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_slider_title_color_1', array(
		'label'			=> __( 'Title Color', 'agama' ),
		'description'	=> __( 'Select slide title color.', 'agama' ),
		'section'		=> 'agama_slide_1_section',
		'settings'		=> 'agama_slider_title_color_1',
		'type'			=> 'color',
		'default'		=> '#fff'
	) );
	Kirki::add_config( 'agama_slider_content_top_1', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_slider_content_top_1', array(
		'label'			=> __( 'Slider Content Top Distance', 'agama' ),
		'description'	=> __( 'Set slider content top distance in %.', 'agama' ),
		'section'		=> 'agama_slide_1_section',
		'settings'		=> 'agama_slider_content_top_1',
		'type'			=> 'slider',
		'choices'		=> array(
			'step'		=> '1',
			'min'		=> '0',
			'max'		=> '100'
		),
		'default'		=> '40'
	) );
	Kirki::add_config( 'agama_slider_button_title_1', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_slider_button_title_1', array(
		'label'			=> __( 'Button Title', 'agama' ),
		'description'	=> __( 'Set custom button title.', 'agama' ),
		'help'			=> __( 'If field empty the button will be hidden.', 'agama' ),
		'section'		=> 'agama_slide_1_section',
		'settings'		=> 'agama_slider_button_title_1',
		'type'			=> 'text',
		'default'		=> __( 'Learn More', 'agama' )
	) );
	Kirki::add_config( 'agama_slider_button_animation_1', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_slider_button_animation_1', array(
		'label'			=> __( 'Button Animation', 'agama' ),
		'description'	=> __( 'Select button slide animation.', 'agama' ),
		'section'		=> 'agama_slide_1_section',
		'settings'		=> 'agama_slider_button_animation_1',
		'type'			=> 'select',
		'choices'		=> AgamaAnimate::choices(),
		'default'		=> 'bounceInRight'
	) );
	Kirki::add_config( 'agama_slider_button_url_1', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_slider_button_url_1', array(
		'label'			=> __( 'Button URL', 'agama' ),
		'description'	=> __( 'Set button url.', 'agama' ),
		'section'		=> 'agama_slide_1_section',
		'settings'		=> 'agama_slider_button_url_1',
		'type'			=> 'text',
		'default'		=> '#'
	) );
	Kirki::add_config( 'agama_slider_button_bg_color_1', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_slider_button_bg_color_1', array(
		'label'			=> __( 'Button BG Color', 'agama' ),
		'description'	=> __( 'Select button background color.', 'agama' ),
		'section'		=> 'agama_slide_1_section',
		'settings'		=> 'agama_slider_button_bg_color_1',
		'type'			=> 'color',
		'default'		=> '#A2C605'
	) );
	###################################################
	# SLIDE 2 SECTION
	###################################################
	Kirki::add_section( 'agama_slide_2_section', array(
		'title'			=> __( 'Slide #2', 'agama' ),
		'description'	=> __( 'Upload slider image.', 'agama' ),
		'panel'			=> 'agama_slider_panel',
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_config( 'agama_slider_image_2', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_slider_image_2', array(
		'label'			=> __( 'Image', 'agama' ),
		'settings'		=> 'agama_slider_image_2',
		'section'		=> 'agama_slide_2_section',
		'type'			=> 'image',
		'default'		=> AGAMA_IMG . 'header_img.jpg'
	) );
	Kirki::add_config( 'agama_slider_title_2', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_slider_title_2', array(
		'label'			=> __( 'Title', 'agama' ),
		'description'	=> __( 'Add custom slide title.', 'agama' ),
		'help'			=> __( 'If empty the title will be hidden.', 'agama' ),
		'section'		=> 'agama_slide_2_section',
		'settings'		=> 'agama_slider_title_2',
		'type'			=> 'text',
		'default'		=> __( 'Welcome to Agama', 'agama' )
	) );
	Kirki::add_config( 'agama_slider_title_animation_2', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_slider_title_animation_2', array(
		'label'			=> __( 'Title Animation', 'agama' ),
		'description'	=> __( 'Select title slide animation.', 'agama' ),
		'section'		=> 'agama_slide_2_section',
		'settings'		=> 'agama_slider_title_animation_2',
		'type'			=> 'select',
		'choices'		=> AgamaAnimate::choices(),
		'default'		=> 'bounceInLeft'
	) );
	Kirki::add_config( 'agama_slider_title_color_2', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_slider_title_color_2', array(
		'label'			=> __( 'Title Color', 'agama' ),
		'description'	=> __( 'Select slide title color.', 'agama' ),
		'section'		=> 'agama_slide_2_section',
		'settings'		=> 'agama_slider_title_color_2',
		'type'			=> 'color',
		'default'		=> '#fff'
	) );
	Kirki::add_config( 'agama_slider_content_top_2', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_slider_content_top_2', array(
		'label'			=> __( 'Slider Content Top Distance', 'agama' ),
		'description'	=> __( 'Set slider content top distance in %.', 'agama' ),
		'section'		=> 'agama_slide_2_section',
		'settings'		=> 'agama_slider_content_top_2',
		'type'			=> 'slider',
		'choices'		=> array(
			'step'		=> '1',
			'min'		=> '0',
			'max'		=> '100'
		),
		'default'		=> '40'
	) );
	Kirki::add_config( 'agama_slider_button_title_2', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_slider_button_title_2', array(
		'label'			=> __( 'Button Title', 'agama' ),
		'description'	=> __( 'Set custom button title.', 'agama' ),
		'help'			=> __( 'If field empty the button will be hidden.', 'agama' ),
		'section'		=> 'agama_slide_2_section',
		'settings'		=> 'agama_slider_button_title_2',
		'type'			=> 'text',
		'default'		=> __( 'Learn More', 'agama' )
	) );
	Kirki::add_config( 'agama_slider_button_animation_2', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_slider_button_animation_2', array(
		'label'			=> __( 'Button Animation', 'agama' ),
		'description'	=> __( 'Select button slide animation.', 'agama' ),
		'section'		=> 'agama_slide_2_section',
		'settings'		=> 'agama_slider_button_animation_2',
		'type'			=> 'select',
		'choices'		=> AgamaAnimate::choices(),
		'default'		=> 'bounceInRight'
	) );
	Kirki::add_config( 'agama_slider_button_url_2', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_slider_button_url_2', array(
		'label'			=> __( 'Button URL', 'agama' ),
		'description'	=> __( 'Set button url.', 'agama' ),
		'section'		=> 'agama_slide_2_section',
		'settings'		=> 'agama_slider_button_url_2',
		'type'			=> 'text',
		'default'		=> '#'
	) );
	Kirki::add_config( 'agama_slider_button_bg_color_2', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_slider_button_bg_color_2', array(
		'label'			=> __( 'Button BG Color', 'agama' ),
		'description'	=> __( 'Select button background color.', 'agama' ),
		'section'		=> 'agama_slide_2_section',
		'settings'		=> 'agama_slider_button_bg_color_2',
		'type'			=> 'color',
		'default'		=> '#A2C605'
	) );
	###################################################
	# SLIDE 3 SECTION
	###################################################
	Kirki::add_section( 'agama_slide_3_section', array(
		'title'			=> __( 'Slide #3', 'agama' ),
		'description'	=> __( 'Slide #3 section.', 'agama' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_slider_panel'
	) );
	###################################################
	# SLIDE 4 SECTION
	###################################################
	Kirki::add_section( 'agama_slide_4_section', array(
		'title'			=> __( 'Slide #4', 'agama' ),
		'description'	=> __( 'Slide #4 section.', 'agama' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_slider_panel'
	) );
	###################################################
	# SLIDE 5 SECTION
	###################################################
	Kirki::add_section( 'agama_slide_5_section', array(
		'title'			=> __( 'Slide #5', 'agama' ),
		'description'	=> __( 'Slide #5 section.', 'agama' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_slider_panel'
	) );
	###################################################
	# SLIDE 6 SECTION
	###################################################
	Kirki::add_section( 'agama_slide_6_section', array(
		'title'			=> __( 'Slide #6', 'agama' ),
		'description'	=> __( 'Slide #6 section.', 'agama' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_slider_panel'
	) );
	###################################################
	# SLIDE 7 SECTION
	###################################################
	Kirki::add_section( 'agama_slide_7_section', array(
		'title'			=> __( 'Slide #7', 'agama' ),
		'description'	=> __( 'Slide #7 section.', 'agama' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_slider_panel'
	) );
	###################################################
	# SLIDE 8 SECTION
	###################################################
	Kirki::add_section( 'agama_slide_8_section', array(
		'title'			=> __( 'Slide #8', 'agama' ),
		'description'	=> __( 'Slide #8 section.', 'agama' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_slider_panel'
	) );
	###################################################
	# SLIDE 9 SECTION
	###################################################
	Kirki::add_section( 'agama_slide_9_section', array(
		'title'			=> __( 'Slide #9', 'agama' ),
		'description'	=> __( 'Slide #9 section.', 'agama' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_slider_panel'
	) );
	###################################################
	# SLIDE 10 SECTION
	###################################################
	Kirki::add_section( 'agama_slide_10_section', array(
		'title'			=> __( 'Slide #10', 'agama' ),
		'description'	=> __( 'Slide #10 section.', 'agama' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_slider_panel'
	) );
###################################################################################
# BREADCRUMB
###################################################################################
	Kirki::add_section( 'agama_breadcrumb_section', array(
		'title'			=> __( 'Breadcrumb', 'agama' ),
		'description'	=> __( 'Breadcrumb settings section.', 'agama' ),
		'capability'	=> 'edit_theme_options',
		'priority'		=> 50,
	) );
	Kirki::add_config( 'agama_breadcrumb', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_breadcrumb', array(
		'label'			=> __( 'Breadcrumb', 'agama' ),
		'description'	=> __( 'Enable breadcrumb ?', 'agama' ),
		'section'		=> 'agama_breadcrumb_section',
		'settings'		=> 'agama_breadcrumb',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_config( 'agama_breadcrumb_homepage', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_breadcrumb_homepage', array(
		'label'			=> __( 'Breadcrumb on Homepage', 'agama' ),
		'description'	=> __( 'Disable breadcrumb on homepage ?', 'agama' ),
		'section'		=> 'agama_breadcrumb_section',
		'settings'		=> 'agama_breadcrumb_homepage',
		'type'			=> 'switch',
		'default'		=> false
	) );
	Kirki::add_config( 'agama_breadcrumb_style', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_breadcrumb_style', array(
		'label'			=> __( 'Breadcrumb Style', 'agama' ),
		'description'	=> __( 'Select breadcrumb style.', 'agama' ),
		'section'		=> 'agama_breadcrumb_section',
		'settings'		=> 'agama_breadcrumb_style',
		'type'			=> 'select',
		'choices'		=> array(
			'mini'		=> __( 'Mini', 'agama' ),
			'normal'	=> __( 'Normal', 'agama' )
		),
		'default'		=> 'mini'
	) );
	Kirki::add_config( 'agama_breadcrumb_bg_color', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_breadcrumb_bg_color', array(
		'label'			=> __( 'Background Color', 'agama' ),
		'description'	=> __( 'Select breadcrumb background color.', 'agama' ),
		'section'		=> 'agama_breadcrumb_section',
		'settings'		=> 'agama_breadcrumb_bg_color',
		'type'			=> 'color',
		'default'		=> '#F5F5F5'
	) );
	Kirki::add_config( 'agama_breadcrumb_text_color', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_breadcrumb_text_color', array(
		'label'			=> __( 'Font Color', 'agama' ),
		'description'	=> __( 'Select breadcrumb font color.', 'agama' ),
		'section'		=> 'agama_breadcrumb_section',
		'settings'		=> 'agama_breadcrumb_text_color',
		'type'			=> 'color',
		'default'		=> '#444'
	) );
	Kirki::add_config( 'agama_breadcrumb_links_color', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_breadcrumb_links_color', array(
		'label'			=> __( 'Links Color', 'agama' ),
		'description'	=> __( 'Select breadcrumb links color.', 'agama' ),
		'section'		=> 'agama_breadcrumb_section',
		'settings'		=> 'agama_breadcrumb_links_color',
		'type'			=> 'color',
		'default'		=> '#444'
	) );
###################################################################################
# FRONTPAGE BOXES
###################################################################################
	Kirki::add_panel( 'agama_frontpage_boxes_panel', array(
		'title'			=> __( 'Frontpage Boxes', 'agama' ),
		'description'	=> __( 'Frontpage boxes section.', 'agama' ),
		'priority'		=> 60
	) );
	#############################################################
	# FRONTPAGE BOXES GENERAL SECTION
	#############################################################
	Kirki::add_section( 'agama_frontpage_general_section', array(
		'title'			=> __( 'General', 'agama' ),
		'description'	=> __( 'Frontpage boxes general section.', 'agama' ),
		'capability'	=> 'edit_theme_options',
		'priority'		=> 60,
		'panel'			=> 'agama_frontpage_boxes_panel'
	) );
	Kirki::add_config( 'agama_frontpage_boxes_visibility', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_frontpage_boxes_visibility', array(
		'label'			=> __( 'Visibility', 'agama' ),
		'description'	=> __( 'Select where you want frontpage boxes to be visible.', 'agama' ),
		'section'		=> 'agama_frontpage_general_section',
		'settings'		=> 'agama_frontpage_boxes_visibility',
		'type'			=> 'select',
		'choices'		=> array(
			'homepage'	=> __( 'Homepage', 'agama' ),
			'frontpage'	=> __( 'Front Page', 'agama' ),
			'allpages'	=> __( 'All Pages', 'agama' )
		),
		'default'		=> 'homepage'
	) );
	#############################################################
	# FRONTPAGE BOXES SECTION 1
	#############################################################
	Kirki::add_section( 'agama_frontpage_boxes_section_1', array(
		'title'			=> __( 'Frontpage Box #1', 'agama' ),
		'description'	=> __( 'Frontpage boxes settings section.', 'agama' ),
		'capability'	=> 'edit_theme_options',
		'priority'		=> 60,
		'panel'			=> 'agama_frontpage_boxes_panel'
	) );
	Kirki::add_config( 'agama_frontpage_box_1_enable', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_frontpage_box_1_enable', array(
		'label'			=> __( 'Box 1', 'agama' ),
		'description'	=> __( 'Enable box 1.', 'agama' ),
		'section'		=> 'agama_frontpage_boxes_section_1',
		'settings'		=> 'agama_frontpage_box_1_enable',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_config( 'agama_frontpage_box_1_title', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_frontpage_box_1_title', array(
		'label'			=> __( 'Title', 'agama' ),
		'description'	=> __( 'Set box title.', 'agama' ),
		'section'		=> 'agama_frontpage_boxes_section_1',
		'settings'		=> 'agama_frontpage_box_1_title',
		'type'			=> 'text',
		'default'		=> 'Responsive Layout'
	) );
	Kirki::add_config( 'agama_frontpage_box_1_icon', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_frontpage_box_1_icon', array(
		'label'			=> __( 'FontAwesome Icon', 'agama' ),
		'description'	=> sprintf('%s <a href="https://fortawesome.github.io/Font-Awesome/icons/" target="_blank">here</a> %s', __('Accepted inputs is "fa-*" ex: fa-tablet, check', 'agama'), __('for all FontAwesome icon classes.', 'agama')),
		'section'		=> 'agama_frontpage_boxes_section_1',
		'settings'		=> 'agama_frontpage_box_1_icon',
		'type'			=> 'text',
		'default'		=> 'fa-tablet'
	) );
	Kirki::add_config( 'agama_frontpage_box_1_icon_color', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_frontpage_box_1_icon_color', array(
		'label'			=> __( 'Icon Color', 'agama' ),
		'description'	=> __( 'Set icon color.', 'agama' ),
		'section'		=> 'agama_frontpage_boxes_section_1',
		'settings'		=> 'agama_frontpage_box_1_icon_color',
		'type'			=> 'color',
		'default'		=> '#A2C605'
	) );
	Kirki::add_config( 'agama_frontpage_1_img', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_frontpage_1_img', array(
		'label'			=> __( 'Image', 'agama' ),
		'description'	=> __('You can use image instead of FontAwesome icon, just upload it here.', 'agama'),
		'section'		=> 'agama_frontpage_boxes_section_1',
		'settings'		=> 'agama_frontpage_1_img',
		'type'			=> 'image'
	) );
	Kirki::add_config( 'agama_frontpage_box_1_icon_url', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_frontpage_box_1_icon_url', array(
		'label'			=> __( 'Box Icon / Image URL', 'agama' ),
		'description'	=> __( 'Starting with: http://', 'agama' ),
		'section'		=> 'agama_frontpage_boxes_section_1',
		'settings'		=> 'agama_frontpage_box_1_icon_url',
		'type'			=> 'text'
	) );
	Kirki::add_config( 'agama_frontpage_box_1_text', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_frontpage_box_1_text', array(
		'label'			=> __( 'Box Text', 'agama' ),
		'description'	=> __( 'Add custom text.', 'agama' ),
		'section'		=> 'agama_frontpage_boxes_section_1',
		'settings'		=> 'agama_frontpage_box_1_text',
		'type'			=> 'textarea',
		'default'		=> 'Powerful Layout with Responsive functionality that can be adapted to any screen size.'
	) );
	Kirki::add_config( 'agama_frontpage_box_1_animated', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_frontpage_box_1_animated', array(
		'label'			=> __( 'Box Animated', 'agama' ),
		'description'	=> __( 'Enable box loading animation ?', 'agama' ),
		'section'		=> 'agama_frontpage_boxes_section_1',
		'settings'		=> 'agama_frontpage_box_1_animated',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_config( 'agama_frontpage_box_1_animation', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_frontpage_box_1_animation', array(
		'label'				=> __( 'Box Animation', 'agama' ),
		'description'		=> __( 'Select box loading animation.', 'agama' ),
		'section'			=> 'agama_frontpage_boxes_section_1',
		'settings'			=> 'agama_frontpage_box_1_animation',
		'type'				=> 'select',
		'choices'			=> AgamaAnimate::choices(),
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_frontpage_box_1_animated',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'			=> 'fadeInLeft'
	) );
	#############################################################
	# FRONTPAGE BOXES SECTION 2
	#############################################################
	Kirki::add_section( 'agama_frontpage_boxes_section_2', array(
		'title'			=> __( 'Frontpage Box #2', 'agama' ),
		'description'	=> __( 'Frontpage boxes settings section.', 'agama' ),
		'capability'	=> 'edit_theme_options',
		'priority'		=> 60,
		'panel'			=> 'agama_frontpage_boxes_panel'
	) );
	Kirki::add_config( 'agama_frontpage_box_2_enable', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_frontpage_box_2_enable', array(
		'label'			=> __( 'Box 2', 'agama' ),
		'description'	=> __( 'Enable box 2.', 'agama' ),
		'section'		=> 'agama_frontpage_boxes_section_2',
		'settings'		=> 'agama_frontpage_box_2_enable',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_config( 'agama_frontpage_box_2_title', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_frontpage_box_2_title', array(
		'label'			=> __( 'Title', 'agama' ),
		'description'	=> __( 'Set box title.', 'agama' ),
		'section'		=> 'agama_frontpage_boxes_section_2',
		'settings'		=> 'agama_frontpage_box_2_title',
		'type'			=> 'text',
		'default'		=> 'Endless Possibilities'
	) );
	Kirki::add_config( 'agama_frontpage_box_2_icon', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_frontpage_box_2_icon', array(
		'label'			=> __( 'FontAwesome Icon', 'agama' ),
		'description'	=> sprintf('%s <a href="https://fortawesome.github.io/Font-Awesome/icons/" target="_blank">here</a> %s', __('Accepted inputs is "fa-*" ex: fa-tablet, check', 'agama'), __('for all FontAwesome icon classes.', 'agama')),
		'section'		=> 'agama_frontpage_boxes_section_2',
		'settings'		=> 'agama_frontpage_box_2_icon',
		'type'			=> 'text',
		'default'		=> 'fa-cogs'
	) );
	Kirki::add_config( 'agama_frontpage_box_2_icon_color', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_frontpage_box_2_icon_color', array(
		'label'			=> __( 'Icon Color', 'agama' ),
		'description'	=> __( 'Set icon color.', 'agama' ),
		'section'		=> 'agama_frontpage_boxes_section_2',
		'settings'		=> 'agama_frontpage_box_2_icon_color',
		'type'			=> 'color',
		'default'		=> '#A2C605'
	) );
	Kirki::add_config( 'agama_frontpage_2_img', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_frontpage_2_img', array(
		'label'			=> __( 'Image', 'agama' ),
		'description'	=> __('You can use image instead of FontAwesome icon, just upload it here.', 'agama'),
		'section'		=> 'agama_frontpage_boxes_section_2',
		'settings'		=> 'agama_frontpage_2_img',
		'type'			=> 'image'
	) );
	Kirki::add_config( 'agama_frontpage_box_2_icon_url', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_frontpage_box_2_icon_url', array(
		'label'			=> __( 'Box Icon / Image URL', 'agama' ),
		'description'	=> __( 'Starting with: http://', 'agama' ),
		'section'		=> 'agama_frontpage_boxes_section_2',
		'settings'		=> 'agama_frontpage_box_2_icon_url',
		'type'			=> 'text'
	) );
	Kirki::add_config( 'agama_frontpage_box_2_text', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_frontpage_box_2_text', array(
		'label'			=> __( 'Box Text', 'agama' ),
		'description'	=> __( 'Add custom text.', 'agama' ),
		'section'		=> 'agama_frontpage_boxes_section_2',
		'settings'		=> 'agama_frontpage_box_2_text',
		'type'			=> 'textarea',
		'default'		=> 'Complete control on each & every element that provides endless customization possibilities.'
	) );
	Kirki::add_config( 'agama_frontpage_box_2_animated', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_frontpage_box_2_animated', array(
		'label'			=> __( 'Box Animated', 'agama' ),
		'description'	=> __( 'Enable box loading animation ?', 'agama' ),
		'section'		=> 'agama_frontpage_boxes_section_2',
		'settings'		=> 'agama_frontpage_box_2_animated',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_config( 'agama_frontpage_box_2_animation', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_frontpage_box_2_animation', array(
		'label'				=> __( 'Box Animation', 'agama' ),
		'description'		=> __( 'Select box loading animation.', 'agama' ),
		'section'			=> 'agama_frontpage_boxes_section_2',
		'settings'			=> 'agama_frontpage_box_2_animation',
		'type'				=> 'select',
		'choices'			=> AgamaAnimate::choices(),
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_frontpage_box_2_animated',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'			=> 'fadeInDown'
	) );
	#############################################################
	# FRONTPAGE BOXES SECTION 3
	#############################################################
	Kirki::add_section( 'agama_frontpage_boxes_section_3', array(
		'title'			=> __( 'Frontpage Box #3', 'agama' ),
		'description'	=> __( 'Frontpage boxes settings section.', 'agama' ),
		'capability'	=> 'edit_theme_options',
		'priority'		=> 60,
		'panel'			=> 'agama_frontpage_boxes_panel'
	) );
	Kirki::add_config( 'agama_frontpage_box_3_enable', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_frontpage_box_3_enable', array(
		'label'			=> __( 'Box 3', 'agama' ),
		'description'	=> __( 'Enable box 3.', 'agama' ),
		'section'		=> 'agama_frontpage_boxes_section_3',
		'settings'		=> 'agama_frontpage_box_3_enable',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_config( 'agama_frontpage_box_3_title', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_frontpage_box_3_title', array(
		'label'			=> __( 'Title', 'agama' ),
		'description'	=> __( 'Set box title.', 'agama' ),
		'section'		=> 'agama_frontpage_boxes_section_3',
		'settings'		=> 'agama_frontpage_box_3_title',
		'type'			=> 'text',
		'default'		=> 'Boxed & Wide Layouts'
	) );
	Kirki::add_config( 'agama_frontpage_box_3_icon', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_frontpage_box_3_icon', array(
		'label'			=> __( 'FontAwesome Icon', 'agama' ),
		'description'	=> sprintf('%s <a href="https://fortawesome.github.io/Font-Awesome/icons/" target="_blank">here</a> %s', __('Accepted inputs is "fa-*" ex: fa-tablet, check', 'agama'), __('for all FontAwesome icon classes.', 'agama')),
		'section'		=> 'agama_frontpage_boxes_section_3',
		'settings'		=> 'agama_frontpage_box_3_icon',
		'type'			=> 'text',
		'default'		=> 'fa-laptop'
	) );
	Kirki::add_config( 'agama_frontpage_box_3_icon_color', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_frontpage_box_3_icon_color', array(
		'label'			=> __( 'Icon Color', 'agama' ),
		'description'	=> __( 'Set icon color.', 'agama' ),
		'section'		=> 'agama_frontpage_boxes_section_3',
		'settings'		=> 'agama_frontpage_box_3_icon_color',
		'type'			=> 'color',
		'default'		=> '#A2C605'
	) );
	Kirki::add_config( 'agama_frontpage_3_img', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_frontpage_3_img', array(
		'label'			=> __( 'Image', 'agama' ),
		'description'	=> __('You can use image instead of FontAwesome icon, just upload it here.', 'agama'),
		'section'		=> 'agama_frontpage_boxes_section_3',
		'settings'		=> 'agama_frontpage_3_img',
		'type'			=> 'image'
	) );
	Kirki::add_config( 'agama_frontpage_box_3_icon_url', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_frontpage_box_3_icon_url', array(
		'label'			=> __( 'Box Icon / Image URL', 'agama' ),
		'description'	=> __( 'Starting with: http://', 'agama' ),
		'section'		=> 'agama_frontpage_boxes_section_3',
		'settings'		=> 'agama_frontpage_box_3_icon_url',
		'type'			=> 'text'
	) );
	Kirki::add_config( 'agama_frontpage_box_3_text', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_frontpage_box_3_text', array(
		'label'			=> __( 'Box Text', 'agama' ),
		'description'	=> __( 'Add custom text.', 'agama' ),
		'section'		=> 'agama_frontpage_boxes_section_3',
		'settings'		=> 'agama_frontpage_box_3_text',
		'type'			=> 'textarea',
		'default'		=> 'Stretch your Website to the Full Width or make it boxed to surprise your visitors.'
	) );
	Kirki::add_config( 'agama_frontpage_box_3_animated', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_frontpage_box_3_animated', array(
		'label'			=> __( 'Box Animated', 'agama' ),
		'description'	=> __( 'Enable box loading animation ?', 'agama' ),
		'section'		=> 'agama_frontpage_boxes_section_3',
		'settings'		=> 'agama_frontpage_box_3_animated',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_config( 'agama_frontpage_box_3_animation', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_frontpage_box_3_animation', array(
		'label'				=> __( 'Box Animation', 'agama' ),
		'description'		=> __( 'Select box loading animation.', 'agama' ),
		'section'			=> 'agama_frontpage_boxes_section_3',
		'settings'			=> 'agama_frontpage_box_3_animation',
		'type'				=> 'select',
		'choices'			=> AgamaAnimate::choices(),
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_frontpage_box_3_animated',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'			=> 'fadeInUp'
	) );
	#############################################################
	# FRONTPAGE BOXES SECTION 4
	#############################################################
	Kirki::add_section( 'agama_frontpage_boxes_section_4', array(
		'title'			=> __( 'Frontpage Box #4', 'agama' ),
		'description'	=> __( 'Frontpage boxes settings section.', 'agama' ),
		'capability'	=> 'edit_theme_options',
		'priority'		=> 60,
		'panel'			=> 'agama_frontpage_boxes_panel'
	) );
	Kirki::add_config( 'agama_frontpage_box_4_enable', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_frontpage_box_4_enable', array(
		'label'			=> __( 'Box 4', 'agama' ),
		'description'	=> __( 'Enable box 4.', 'agama' ),
		'section'		=> 'agama_frontpage_boxes_section_4',
		'settings'		=> 'agama_frontpage_box_4_enable',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_config( 'agama_frontpage_box_4_title', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_frontpage_box_4_title', array(
		'label'			=> __( 'Title', 'agama' ),
		'description'	=> __( 'Set box title.', 'agama' ),
		'section'		=> 'agama_frontpage_boxes_section_4',
		'settings'		=> 'agama_frontpage_box_4_title',
		'type'			=> 'text',
		'default'		=> 'Powerful Performance'
	) );
	Kirki::add_config( 'agama_frontpage_box_4_icon', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_frontpage_box_4_icon', array(
		'label'			=> __( 'FontAwesome Icon', 'agama' ),
		'description'	=> sprintf('%s <a href="https://fortawesome.github.io/Font-Awesome/icons/" target="_blank">here</a> %s', __('Accepted inputs is "fa-*" ex: fa-tablet, check', 'agama'), __('for all FontAwesome icon classes.', 'agama')),
		'section'		=> 'agama_frontpage_boxes_section_4',
		'settings'		=> 'agama_frontpage_box_4_icon',
		'type'			=> 'text',
		'default'		=> 'fa-magic'
	) );
	Kirki::add_config( 'agama_frontpage_box_4_icon_color', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_frontpage_box_4_icon_color', array(
		'label'			=> __( 'Icon Color', 'agama' ),
		'description'	=> __( 'Set icon color.', 'agama' ),
		'section'		=> 'agama_frontpage_boxes_section_4',
		'settings'		=> 'agama_frontpage_box_4_icon_color',
		'type'			=> 'color',
		'default'		=> '#A2C605'
	) );
	Kirki::add_config( 'agama_frontpage_4_img', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_frontpage_4_img', array(
		'label'			=> __( 'Image', 'agama' ),
		'description'	=> __('You can use image instead of FontAwesome icon, just upload it here.', 'agama'),
		'section'		=> 'agama_frontpage_boxes_section_4',
		'settings'		=> 'agama_frontpage_4_img',
		'type'			=> 'image'
	) );
	Kirki::add_config( 'agama_frontpage_box_4_icon_url', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_frontpage_box_4_icon_url', array(
		'label'			=> __( 'Box Icon / Image URL', 'agama' ),
		'description'	=> __( 'Starting with: http://', 'agama' ),
		'section'		=> 'agama_frontpage_boxes_section_4',
		'settings'		=> 'agama_frontpage_box_4_icon_url',
		'type'			=> 'text'
	) );
	Kirki::add_config( 'agama_frontpage_box_4_text', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_frontpage_box_4_text', array(
		'label'			=> __( 'Box Text', 'agama' ),
		'description'	=> __( 'Add custom text.', 'agama' ),
		'section'		=> 'agama_frontpage_boxes_section_4',
		'settings'		=> 'agama_frontpage_box_4_text',
		'type'			=> 'textarea',
		'default'		=> 'Optimized code that are completely customizable and deliver unmatched fast performance.'
	) );
	Kirki::add_config( 'agama_frontpage_box_4_animated', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_frontpage_box_4_animated', array(
		'label'			=> __( 'Box Animated', 'agama' ),
		'description'	=> __( 'Enable box loading animation ?', 'agama' ),
		'section'		=> 'agama_frontpage_boxes_section_4',
		'settings'		=> 'agama_frontpage_box_4_animated',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_config( 'agama_frontpage_box_4_animation', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_frontpage_box_4_animation', array(
		'label'				=> __( 'Box Animation', 'agama' ),
		'description'		=> __( 'Select box loading animation.', 'agama' ),
		'section'			=> 'agama_frontpage_boxes_section_4',
		'settings'			=> 'agama_frontpage_box_4_animation',
		'type'				=> 'select',
		'choices'			=> AgamaAnimate::choices(),
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_frontpage_box_4_animated',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'			=> 'fadeInRight'
	) );
	#############################################################
	# FRONTPAGE BOXES SECTION 5
	#############################################################
	Kirki::add_section( 'agama_frontpage_boxes_section_5', array(
		'title'			=> __( 'Frontpage Box #5', 'agama' ),
		'description'	=> __( 'Frontpage boxes settings section.', 'agama' ),
		'capability'	=> 'edit_theme_options',
		'priority'		=> 60,
		'panel'			=> 'agama_frontpage_boxes_panel'
	) );
	#############################################################
	# FRONTPAGE BOXES SECTION 6
	#############################################################
	Kirki::add_section( 'agama_frontpage_boxes_section_6', array(
		'title'			=> __( 'Frontpage Box #6', 'agama' ),
		'description'	=> __( 'Frontpage boxes settings section.', 'agama' ),
		'capability'	=> 'edit_theme_options',
		'priority'		=> 60,
		'panel'			=> 'agama_frontpage_boxes_panel'
	) );
	#############################################################
	# FRONTPAGE BOXES SECTION 7
	#############################################################
	Kirki::add_section( 'agama_frontpage_boxes_section_7', array(
		'title'			=> __( 'Frontpage Box #7', 'agama' ),
		'description'	=> __( 'Frontpage boxes settings section.', 'agama' ),
		'capability'	=> 'edit_theme_options',
		'priority'		=> 60,
		'panel'			=> 'agama_frontpage_boxes_panel'
	) );
	#############################################################
	# FRONTPAGE BOXES SECTION 8
	#############################################################
	Kirki::add_section( 'agama_frontpage_boxes_section_8', array(
		'title'			=> __( 'Frontpage Box #8', 'agama' ),
		'description'	=> __( 'Frontpage boxes settings section.', 'agama' ),
		'capability'	=> 'edit_theme_options',
		'priority'		=> 60,
		'panel'			=> 'agama_frontpage_boxes_panel'
	) );
###################################################################################
# BLOG
###################################################################################
	Kirki::add_panel( 'agama_blog_panel', array(
		'title'			=> __( 'Blog', 'agama' ),
		'description'	=> __( 'Blog panel.', 'agama' ),
		'priority'		=> 70
	) );
	########################################################
	# BLOG GENERAL SECTION
	########################################################
	Kirki::add_section( 'agama_blog_general_section', array(
		'title'			=> __( 'Blog General', 'agama' ),
		'description'	=> __( 'Blog general section.', 'agama' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_blog_panel'
	) );
	Kirki::add_config( 'agama_blog_layout', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_blog_layout', array(
		'label'			=> __( 'Layout', 'agama' ),
		'description'	=> __( 'Select blog layout.', 'agama' ),
		'section'		=> 'agama_blog_general_section',
		'settings'		=> 'agama_blog_layout',
		'type'			=> 'select',
		'choices'		=> array(
			'list'			=> __( 'List Layout', 'agama' ),
			'grid'			=> __( 'Grid Layout', 'agama' ),
			'small_thumbs'	=> __( 'Small Thumbs Layout', 'agama' )
		),
		'default'		=> 'list'
	) );
	Kirki::add_config( 'agama_blog_posts_load_animated', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_blog_posts_load_animated', array(
		'label'			=> __( 'Posts Animated', 'agama' ),
		'description'	=> __( 'Enable posts loading animation ?', 'agama' ),
		'section'		=> 'agama_blog_general_section',
		'settings'		=> 'agama_blog_posts_load_animated',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_config( 'agama_blog_posts_load_animation', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_blog_posts_load_animation', array(
		'label'			=> __( 'Posts Animation', 'agama' ),
		'description'	=> __( 'Select posts loading animation.', 'agama' ),
		'section'		=> 'agama_blog_general_section',
		'settings'		=> 'agama_blog_posts_load_animation',
		'type'			=> 'select',
		'choices'		=> AgamaAnimate::choices(),
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_blog_posts_load_animated',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		=> 'bounceInUp'
	) );
	Kirki::add_config( 'agama_blog_thumbnails_permalink', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_blog_thumbnails_permalink', array(
		'label'				=> __( 'Featured Image Permalink', 'agama' ),
		'description'		=> __( 'Enable post featured image permalink ?', 'agama' ),
		'help'				=> __( 'If enabled the post featured images will become clickable links.', 'agama' ),
		'section'			=> 'agama_blog_general_section',
		'settings'			=> 'agama_blog_thumbnails_permalink',
		'type'				=> 'switch',
		'default'			=> true
	) );
	Kirki::add_config( 'agama_blog_excerpt', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_blog_excerpt', array(
		'label'			=> __( 'Excerpt', 'agama' ),
		'description'	=> __( 'Set posts lenght on blog loop page.', 'agama' ),
		'section'		=> 'agama_blog_general_section',
		'settings'		=> 'agama_blog_excerpt',
		'type'			=> 'slider',
		'choices'		=> array(
			'step'		=> '1',
			'min'		=> '0',
			'max'		=> '500'
		),
		'default'		=> '70'
	) );
	Kirki::add_config( 'agama_blog_readmore_url', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_blog_readmore_url', array(
		'label'			=> __( 'Read More', 'agama' ),
		'description'	=> __( 'Enable read more url on blog excerpt ?', 'agama' ),
		'section'		=> 'agama_blog_general_section',
		'settings'		=> 'agama_blog_readmore_url',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_config( 'agama_blog_about_author', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_blog_about_author', array(
		'label'			=> __( 'About Author', 'agama' ),
		'description'	=> __( 'Enable about author section below single post content ?', 'agama' ),
		'section'		=> 'agama_blog_general_section',
		'settings'		=> 'agama_blog_about_author',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_config( 'agama_blog_infinite_scroll', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_blog_infinite_scroll', array(
		'label'			=> __( 'Infinite Scroll', 'agama' ),
		'description'	=> __( 'Enable infinite scroll ?', 'agama' ),
		'section'		=> 'agama_blog_general_section',
		'settings'		=> 'agama_blog_infinite_scroll',
		'type'			=> 'switch',
		'default'		=> false
	) );
	Kirki::add_config( 'agama_blog_infinite_trigger', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_blog_infinite_trigger', array(
		'label'			=> __( 'Infinite Trigger', 'agama' ),
		'description'	=> __( 'Select infinite scroll trigger.', 'agama' ),
		'help'			=> __( 'Select how blog posts will be loading. Automaticaly or on Button click. NOTICE: Infinite scroll must be enabled first.', 'agama' ),
		'section'		=> 'agama_blog_general_section',
		'settings'		=> 'agama_blog_infinite_trigger',
		'type'			=> 'select',
		'choices'		=> array(
			'auto'		=> __( 'Automatic', 'agama' ),
			'button'	=> __( 'Button', 'agama' )
		),
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_blog_infinite_scroll',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		=> 'button'
	) );
	############################################################
	# BLOG SINGLE POST SECTION
	############################################################
	Kirki::add_section( 'agama_blog_single_post_section', array(
		'title'			=> __( 'Blog Single Post', 'agama' ),
		'description'	=> __( 'Blog single post section.', 'agama' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_blog_panel'
	) );
	Kirki::add_config( 'agama_blog_single_post_thumbnail', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_blog_single_post_thumbnail', array(
		'label'			=> __( 'Featured Image on Single Post', 'agama' ),
		'description'	=> __( 'Turn on to display featured images on single blog posts.', 'agama' ),
		'section'		=> 'agama_blog_single_post_section',
		'settings'		=> 'agama_blog_single_post_thumbnail',
		'type'			=> 'switch',
		'default'		=> true
	) );
	##########################################################
	# BLOG POST META SECTION
	##########################################################
	Kirki::add_section( 'agama_blog_post_meta_section', array(
		'title'			=> __( 'Blog Post Meta', 'agama' ),
		'description'	=> __( 'Blog post meta section.', 'agama' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_blog_panel'
	) );
	Kirki::add_config( 'agama_blog_post_meta', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_blog_post_meta', array(
		'label'			=> __( 'Post Meta', 'agama' ),
		'description'	=> __( 'Enable blog post meta ?', 'agama' ),
		'help'			=> __('Turn on to display post meta on blog posts. If set to "On", you can also control individual meta items below. If set to "Off" all meta items will be disabled.', 'agama'),
		'section'		=> 'agama_blog_post_meta_section',
		'settings'		=> 'agama_blog_post_meta',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_config( 'agama_blog_post_author', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_blog_post_author', array(
		'label'			=> __( 'Post Meta Author', 'agama' ),
		'description'	=> __( 'Enable post author ?', 'agama' ),
		'help'			=> __( 'If enabled the post author will be displayed in post meta.', 'agama' ),
		'section'		=> 'agama_blog_post_meta_section',
		'settings'		=> 'agama_blog_post_author',
		'type'			=> 'switch',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_blog_post_meta',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		=> true
	) );
	Kirki::add_config( 'agama_blog_post_date', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_blog_post_date', array(
		'label'			=> __( 'Post Meta Date', 'agama' ),
		'description'	=> __( 'Enable post publish date ?', 'agama' ),
		'help'			=> __( 'If enabled the post publish date will be displayed in post meta.', 'agama' ),
		'section'		=> 'agama_blog_post_meta_section',
		'settings'		=> 'agama_blog_post_date',
		'type'			=> 'switch',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_blog_post_meta',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		=> true
	) );
	Kirki::add_config( 'agama_blog_post_category', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_blog_post_category', array(
		'label'			=> __( 'Post Meta Category', 'agama' ),
		'description'	=> __( 'Enable post category ?', 'agama' ),
		'help'			=> __( 'If enabled the post category will be displayed in post meta.', 'agama' ),
		'section'		=> 'agama_blog_post_meta_section',
		'settings'		=> 'agama_blog_post_category',
		'type'			=> 'switch',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_blog_post_meta',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		=> true
	) );
	Kirki::add_config( 'agama_blog_post_comments', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_blog_post_comments', array(
		'label'			=> __( 'Post Meta Comments', 'agama' ),
		'description'	=> __( 'Enable post meta comments counter ?', 'agama' ),
		'help'			=> __( 'If enabled the post comments count will be displayed in post meta.', 'agama' ),
		'section'		=> 'agama_blog_post_meta_section',
		'settings'		=> 'agama_blog_post_comments',
		'type'			=> 'switch',
		'active_callback'	=> array(
			array(
				'setting'	=> 'agama_blog_post_meta',
				'operator'	=> '==',
				'value'		=> true
			)
		),
		'default'		=> true
	) );
###################################################################################
# STYLING
###################################################################################
	Kirki::add_panel( 'agama_styling_panel', array(
		'title'			=> __( 'Styling', 'agama' ),
		'description'	=> __( 'Styling section.', 'agama' ),
		'priority'		=> 80
	) );
	##############################################
	# STYLING BACKGROUND IMAGE SECTION
	##############################################
	Kirki::add_section( 'background_image', array(
		'title'			=> __( 'Background Image', 'agama' ),
		'description'	=> __( 'Body background image.', 'agama' ),
		'panel'			=> 'agama_styling_panel'
	) );
	###########################################################
	# STYLING GENERAL SECTION
	###########################################################
	Kirki::add_section( 'agama_styling_general_section', array(
		'title'			=> __( 'General', 'agama' ),
		'description'	=> __( 'General styling section.', 'agama' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_styling_panel'
	) );
	Kirki::add_config( 'agama_skin', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_skin', array(
		'label'			=> __( 'Skin', 'agama' ),
		'description'	=> __( 'Select theme skin.', 'agama' ),
		'section'		=> 'agama_styling_general_section',
		'settings'		=> 'agama_skin',
		'type'			=> 'select',
		'choices'		=> array(
			'light'		=> __( 'Light', 'agama' ),
			'dark'		=> __( 'Dark', 'agama' )
		),
		'default'		=> 'light'
	) );
	Kirki::add_config( 'agama_primary_color', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_primary_color', array(
		'label'			=> __( 'Primary Color', 'agama' ),
		'description'	=> __( 'Set theme primary color.', 'agama' ),
		'section'		=> 'agama_styling_general_section',
		'settings'		=> 'agama_primary_color',
		'type'			=> 'color',
		'output'		=> array(
			array(
				'element'	=> 'a:hover, .entry-title a:hover, .entry-meta a:hover, .entry-content a:hover, .comment-content a:hover, .single-line-meta a:hover, a.comment-reply-link:hover, a.comment-edit-link:hover, article header a:hover, .comments-title span, .comment-reply-title span, .widget a:hover, .comments-link a:hover, .entry-meta a:hover, .entry-header header a:hover, footer[role="contentinfo"] a:hover',
				'property'	=> 'color'
			),
			array(
				'element'	=> '.top-links > ul > li.current-menu-item, #top-navigation > ul > li.current-menu-item, #top-navigation > ul > li.current_page_item, header#masthead nav > ul > li.current-menu-item, header#masthead nav > ul > li.current_page_item, header#masthead nav ul li ul.sub-menu',
				'property'	=> 'border-color'
			),
			array(
				'element'	=> '#top-bar, .top-bar-out .sticky-header',
				'property'	=> 'border-top-color'
			),
			array(
				'element'	=> 'header#masthead nav ul li ul.sub-menu li:hover',
				'property'	=> 'border-left-color'
			),
			array(
				'element'	=> 'header#masthead nav ul li ul.sub-menu li ul.sub-menu li:hover',
				'property'	=> 'border-right-color'
			)
		),
		'transport'		=> 'postMessage',
		'js_vars'		=> array(
			array(
				'element'	=> 'a:hover, .entry-title a:hover, .entry-meta a:hover, .entry-content a:hover, .comment-content a:hover, .single-line-meta a:hover, a.comment-reply-link:hover, a.comment-edit-link:hover, article header a:hover, .comments-title span, .comment-reply-title span, .widget a:hover, .comments-link a:hover, .entry-meta a:hover, .entry-header header a:hover, footer[role="contentinfo"] a:hover',
				'function'	=> 'css',
				'property'	=> 'color'
			),
			array(
				'element'	=> '.top-nav-wrapper, .top-links > ul > li.current-menu-item, #top-navigation > ul > li.current-menu-item, #top-navigation > ul > li.current_page_item, header#masthead nav > ul > li.current-menu-item, header#masthead nav > ul > li.current_page_item, header#masthead nav ul li ul.sub-menu',
				'function'	=> 'css',
				'property'	=> 'border-color'
			),
			array(
				'element'	=> '#top-bar, .top-bar-out .sticky-header',
				'function'	=> 'css',
				'property'	=> 'border-top-color'
			),
			array(
				'element'	=> 'header#masthead nav ul li ul.sub-menu li:hover',
				'function'	=> 'css',
				'property'	=> 'border-left-color'
			),
			array(
				'element'	=> 'header#masthead nav ul li ul.sub-menu li ul.sub-menu li:hover',
				'function'	=> 'css',
				'property'	=> 'border-right-color'
			),
			array(
				'element'	=> '.footer-widgets .widget-title:after',
				'function'	=> 'css',
				'property'	=> 'background'
			),
			array(
				'element'	=> '#toTop:hover',
				'function'	=> 'css',
				'property'	=> 'background-color'
			)
		),
		'default'		=> '#A2C605'
	) );
	###################################################################
	# STYLING HEADER GENERAL SECTION
	###################################################################
	Kirki::add_section( 'agama_styling_headers_general_section', array( 
		'title'			=> __( 'Header', 'agama' ),
		'description'	=> __( 'Header general section.', 'agama' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_styling_panel'
	) );
	Kirki::add_config( 'agama_header_bg_color', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_header_bg_color', array(
		'label'			=> __( 'Header Background Color', 'agama' ),
		'description'	=> __( 'Select header background color.', 'agama' ),
		'tooltip'		=> __( 'Doesn\'t work with header V1 style.', 'agama' ),
		'section'		=> 'agama_styling_headers_general_section',
		'settings'		=> 'agama_header_bg_color',
		'alpha'			=> true,
		'type'			=> 'color',
		'output'		=> array(
			array(
				'element'	=> 'header#masthead',
				'property'	=> 'background-color'
			),
			array(
				'element'	=> 'header#masthead nav ul li ul',
				'property'	=> 'background-color'
			)
		),
		'transport'		=> 'postMessage',
		'js_vars'		=> array(
			array(
				'element'	=> 'header#masthead, header#masthead nav ul li ul',
				'function'	=> 'css',
				'property'	=> 'background-color'
			)
		),
		'default'		=> 'rgba( 255, 255, 255, 1 )'
	) );
	Kirki::add_config( 'agama_header_shrink_bg_color', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_header_shrink_bg_color', array(
		'label'			=> __( 'Header Shrinked BG Color', 'agama' ),
		'description'	=> __( 'Select header shrinked background color.', 'agama' ),
		'tooltip'		=> __( 'Work\'s only with header V1 & V3.', 'agama' ),
		'section'		=> 'agama_styling_headers_general_section',
		'settings'		=> 'agama_header_shrink_bg_color',
		'alpha'			=> true,
		'type'			=> 'color',
		'output'		=> array(
			array(
				'element'	=> 'header.shrinked .sticky-header',
				'property'	=> 'background-color'
			),
			array(
				'element'	=> 'header.shrinked nav ul li ul',
				'property'	=> 'background-color',
				'suffix'	=> '!important'
			)
		),
		'transport'		=> 'postMessage',
		'js_vars'		=> array(
			array(
				'element'	=> 'header.shrinked .sticky-header, header.shrinked nav ul li ul',
				'function'	=> 'css',
				'property'	=> 'background-color'
			)
		),
		'default'		=> 'rgba(255, 255, 255, .9)'
	) );
	Kirki::add_config( 'agama_header_border_color', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_header_border_color', array(
		'label'			=> __( 'Header Borders Color', 'agama' ),
		'description'	=> __( 'Select header borders color.', 'agama' ),
		'section'		=> 'agama_styling_headers_general_section',
		'settings'		=> 'agama_header_border_color',
		'alpha'			=> true,
		'type'			=> 'color',
		'output'		=> array(
			array(
				'element'	=> '#top-bar',
				'property'	=> 'border-color'
			),
			array(
				'element'	=> '.main-navigation',
				'property'	=> 'border-color'
			),
			array(
				'element'	=> '.sticky-nav ul li ul li, .sticky-nav li ul li',
				'property'	=> 'border-color'
			),
			array(
				'element'	=> '.sticky-nav ul li ul li:last-child, .sticky-nav li ul li:last-child',
				'property'	=> 'border-color'
			)
		),
		'transport'		=> 'postMessage',
		'js_vars'		=> array(
			array(
				'element'	=> '.main-navigation, .sticky-nav ul li ul li, .sticky-nav li ul li, .sticky-nav ul li ul li:last-child, .sticky-nav li ul li:last-child',
				'function'	=> 'css',
				'property'	=> 'border-color'
			),
			array(
				'element'	=> '#top-bar',
				'function'	=> 'css',
				'property'	=> 'border-bottom-color'
			)
		),
		'default'		=> 'rgba(238, 238, 238, 1)'
	) );
	########################################################
	# STYLING HEADER LOGO SECTION
	########################################################
	Kirki::add_section( 'agama_styling_logo_section', array(
		'title'			=> __( 'Logo', 'agama' ),
		'description'	=> __( 'Header logo section.', 'agama' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_styling_panel'
	) );
	Kirki::add_config( 'agama_header_logo_color', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_header_logo_color', array( 
		'label'			=> __( 'Logo Color', 'agama' ),
		'description'	=> __( 'Select logo color.', 'agama' ),
		'tooltip'		=> __( 'Work\'s only with textual logo.', 'agama' ),
		'section'		=> 'agama_styling_logo_section',
		'settings'		=> 'agama_header_logo_color',
		'type'			=> 'color',
		'output'		=> array(
			array(
				'element'	=> 'header.site-header h1 a, header.site-header .sticky-header h1 a',
				'property'	=> 'color'
			)
		),
		'transport'		=> 'postMessage',
		'js_vars'		=> array(
			array(
				'element'	=> 'header.site-header h1 a, header.site-header .sticky-header h1 a',
				'function'	=> 'css',
				'property'	=> 'color'
			)
		),
		'default'		=> '#A2C605'
	) );
	Kirki::add_config( 'agama_header_logo_hover_color', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_header_logo_hover_color', array( 
		'label'			=> __( 'Logo Hover Color', 'agama' ),
		'description'	=> __( 'Select logo hover color.', 'agama' ),
		'tooltip'		=> __( 'Work\'s only with textual logo.', 'agama' ),
		'section'		=> 'agama_styling_logo_section',
		'settings'		=> 'agama_header_logo_hover_color',
		'type'			=> 'color',
		'output'		=> array(
			array(
				'element'	=> 'header.site-header h1 a:hover, header.site-header .sticky-header h1 a:hover',
				'property'	=> 'color'
			),
		),
		'transport'		=> 'postMessage',
		'js_vars'		=> array(
			array(
				'element'	=> 'header.site-header h1 a:hover, header.site-header .sticky-header h1 a:hover',
				'function'	=> 'css',
				'property'	=> 'color'
			)
		),
		'default'		=> '#000'
	) );
	##############################################################
	# STYLING NAVIGATION SECTION
	##############################################################
	Kirki::add_section( 'agama_styling_navigation_section', array(
		'title'			=> __( 'Navigation', 'agama' ),
		'description'	=> __( 'Navigation styling section.', 'agama' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_styling_panel'
	) );
	Kirki::add_config( 'agama_header_nav_color', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_header_nav_color', array(
		'label'			=> __( 'Navigation Color', 'agama' ),
		'description'	=> __( 'Set headers navigation color.', 'agama' ),
		'section'		=> 'agama_styling_navigation_section',
		'settings'		=> 'agama_header_nav_color',
		'type'			=> 'color',
		'output'		=> array(
			array(
				'element'	=> '#masthead li a',
				'property'	=> 'color'
			)
		),
		'transport'		=> 'postMessage',
		'js_vars'		=> array(
			array(
				'element'	=> '#masthead li a',
				'function'	=> 'css',
				'property'	=> 'color'
			)
		),
		'default'		=> '#444'
	) );
	Kirki::add_config( 'agama_header_nav_hover_color', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_header_nav_hover_color', array(
		'label'			=> __( 'Navigation Hover Color', 'agama' ),
		'description'	=> __( 'Set headers navigation hover color.', 'agama' ),
		'section'		=> 'agama_styling_navigation_section',
		'settings'		=> 'agama_header_nav_hover_color',
		'type'			=> 'color',
		'output'		=> array(
			array(
				'element'	=> '#masthead li a:hover',
				'property'	=> 'color'
			)
		),
		'transport'		=> 'postMessage',
		'js_vars'		=> array(
			array(
				'element'	=> '#masthead li a:hover',
				'function'	=> 'css',
				'property'	=> 'color'
			)
		),
		'default'		=> '#000'
	) );
	##########################################################
	# STYLING FOOTER SECTION
	##########################################################
	Kirki::add_section( 'agama_styling_footer_section', array(
		'title'			=> __( 'Footer', 'agama' ),
		'description'	=> __( 'Footer styling section.', 'agama' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_styling_panel'
	) );
	Kirki::add_config( 'agama_footer_widget_bg_color', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_footer_widget_bg_color', array(
		'label'			=> __( 'Widget Area BG Color', 'agama' ),
		'description'	=> __( 'Set footer widget area background color.', 'agama' ),
		'help'			=> __( 'Widget area is area above footer.', 'agama' ),
		'section'		=> 'agama_styling_footer_section',
		'settings'		=> 'agama_footer_widget_bg_color',
		'type'			=> 'color',
		'output'		=> array(
			array(
				'element'	=> '.footer-widgets',
				'property'	=> 'background-color'
			)
		),
		'transport'		=> 'postMessage',
		'js_vars'		=> array(
			array(
				'element'	=> '.footer-widgets',
				'function'	=> 'css',
				'property'	=> 'background-color'
			)
		),
		'default'		=> '#314150'
	) );
	Kirki::add_config( 'agama_footer_bottom_bg_color', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_footer_bottom_bg_color', array(
		'label'			=> __( 'Footer Area BG Color', 'agama' ),
		'description'	=> __( 'Set footer area background color.', 'agama' ),
		'section'		=> 'agama_styling_footer_section',
		'settings'		=> 'agama_footer_bottom_bg_color',
		'type'			=> 'color',
		'output'		=> array(
			array(
				'element'	=> 'footer[role="contentinfo"]',
				'property'	=> 'background-color'
			)
		),
		'transport'		=> 'postMessage',
		'js_vars'		=> array(
			array(
				'element'	=> 'footer[role="contentinfo"]',
				'function'	=> 'css',
				'property'	=> 'background-color'
			)
		),
		'default'		=> '#293744'
	) );
	######################################################
	# STYLING CUSTOM CSS SECTION
	######################################################
	Kirki::add_section( 'agama_custom_css_section', array(
		'title'			=> __( 'Custom CSS', 'agama' ),
		'description'	=> __( 'Custom css settings section.', 'agama' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_styling_panel'
	) );
	Kirki::add_config( 'agama_custom_css', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_custom_css', array(
		'label'			=> __( 'Custom CSS', 'agama' ),
		'description'	=> __( 'Add own custom css.', 'agama' ),
		'section'		=> 'agama_custom_css_section',
		'settings'		=> 'agama_custom_css',
		'type'			=> 'code',
		'choices'		=> array(
			'language'	=> 'css',
			'theme'		=> 'monokai',
			'height'	=> '300'
		),
		'default'		=> ''
	) );
###################################################################################
# SOCIAL ICONS
###################################################################################
	Kirki::add_section( 'agama_social_icons_section', array(
		'title'			=> __( 'Social Icons', 'agama' ),
		'description'	=> __( 'Social icons settings section.', 'agama' ),
		'capability'	=> 'edit_theme_options',
		'priority'		=> 90,
	) );
	Kirki::add_config( 'agama_top_nav_social', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_top_nav_social', array(
		'label'			=> __( 'Top Navigation', 'agama' ),
		'description'	=> __( 'Enable social icons on top navigation ?', 'agama' ),
		'help'			=> __( 'Works with header V2 & V3.', 'agama' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'agama_top_nav_social',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_config( 'agama_footer_social', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_footer_social', array(
		'label'			=> __( 'Footer', 'agama' ),
		'description'	=> __( 'Enable social icons on footer ?', 'agama' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'agama_footer_social',
		'type'			=> 'switch',
		'default'		=> true
	) );
	Kirki::add_config( 'agama_social_url_target', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_social_url_target', array(
		'label'			=> __( 'URL Target', 'agama' ),
		'description'	=> __( 'Set social icons url target.', 'agama' ),
		'help'			=> __( 'If "blank" selected all urls will be open in new tab.', 'agama' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'agama_social_url_target',
		'type'			=> 'select',
		'choices'		=> array(
			'_self'		=> '_self',
			'_blank'	=> '_blank'
		),
		'default'		=> '_self'
	) );
	Kirki::add_config( 'social_facebook', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'social_facebook', array(
		'label'			=> __( 'Facebook URL', 'agama' ),
		'description'	=> __( 'Set your facebook page url.', 'agama' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_facebook',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_config( 'social_twitter', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'social_twitter', array(
		'label'			=> __( 'Twitter URL', 'agama' ),
		'description'	=> __( 'Set your twitter page url.', 'agama' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_twitter',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_config( 'social_flickr', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'social_flickr', array(
		'label'			=> __( 'Flickr URL', 'agama' ),
		'description'	=> __( 'Set your flickr page url.', 'agama' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_flickr',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_config( 'social_rss', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'social_rss', array(
		'label'			=> __( 'RSS URL', 'agama' ),
		'description'	=> __( 'Set your rss page url.', 'agama' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_rss',
		'type'			=> 'text',
		'default'		=> esc_url_raw( get_bloginfo('rss2_url') )
	) );
	Kirki::add_config( 'social_vimeo', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'social_vimeo', array(
		'label'			=> __( 'Vimeo URL', 'agama' ),
		'description'	=> __( 'Set your vimeo page url.', 'agama' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_vimeo',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_config( 'social_youtube', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'social_youtube', array(
		'label'			=> __( 'Youtube URL', 'agama' ),
		'description'	=> __( 'Set your youtube page url.', 'agama' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_youtube',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_config( 'social_instagram', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'social_instagram', array(
		'label'			=> __( 'Instagram URL', 'agama' ),
		'description'	=> __( 'Set your instagram page url.', 'agama' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_instagram',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_config( 'social_pinterest', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'social_pinterest', array(
		'label'			=> __( 'Pinterest URL', 'agama' ),
		'description'	=> __( 'Set your pinterest page url.', 'agama' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_pinterest',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_config( 'social_tumblr', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'social_tumblr', array(
		'label'			=> __( 'Tumblr URL', 'agama' ),
		'description'	=> __( 'Set your tumblr page url.', 'agama' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_tumblr',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_config( 'social_google', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'social_google', array(
		'label'			=> __( 'Google+ URL', 'agama' ),
		'description'	=> __( 'Set your google+ page url.', 'agama' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_google',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_config( 'social_dribbble', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'social_dribbble', array(
		'label'			=> __( 'Dribbble URL', 'agama' ),
		'description'	=> __( 'Set your dribbble page url.', 'agama' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_dribbble',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_config( 'social_digg', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'social_digg', array(
		'label'			=> __( 'Digg URL', 'agama' ),
		'description'	=> __( 'Set your digg page url.', 'agama' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_digg',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_config( 'social_linkedin', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'social_linkedin', array(
		'label'			=> __( 'LinkedIn URL', 'agama' ),
		'description'	=> __( 'Set your linkedin page url.', 'agama' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_linkedin',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_config( 'social_blogger', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'social_blogger', array(
		'label'			=> __( 'Blogger URL', 'agama' ),
		'description'	=> __( 'Set your blogger page url.', 'agama' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_blogger',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_config( 'social_skype', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'social_skype', array(
		'label'			=> __( 'Skype URL', 'agama' ),
		'description'	=> __( 'Set your skype page url.', 'agama' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_skype',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_config( 'social_forrst', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'social_forrst', array(
		'label'			=> __( 'Forrst URL', 'agama' ),
		'description'	=> __( 'Set your forrst page url.', 'agama' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_forrst',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_config( 'social_myspace', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'social_myspace', array(
		'label'			=> __( 'MySpace URL', 'agama' ),
		'description'	=> __( 'Set your myspace page url.', 'agama' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_myspace',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_config( 'social_deviantart', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'social_deviantart', array(
		'label'			=> __( 'Deviantart URL', 'agama' ),
		'description'	=> __( 'Set your deviantart page url.', 'agama' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_deviantart',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_config( 'social_yahoo', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'social_yahoo', array(
		'label'			=> __( 'Yahoo URL', 'agama' ),
		'description'	=> __( 'Set your yahoo page url.', 'agama' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_yahoo',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_config( 'social_reddit', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'social_reddit', array(
		'label'			=> __( 'Reddit URL', 'agama' ),
		'description'	=> __( 'Set your reddit page url.', 'agama' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_reddit',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_config( 'social_paypal', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'social_paypal', array(
		'label'			=> __( 'PayPal URL', 'agama' ),
		'description'	=> __( 'Set your paypal page url.', 'agama' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_paypal',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_config( 'social_dropbox', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'social_dropbox', array(
		'label'			=> __( 'Dropbox URL', 'agama' ),
		'description'	=> __( 'Set your dropbox page url.', 'agama' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_dropbox',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_config( 'social_soundcloud', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'social_soundcloud', array(
		'label'			=> __( 'SoundCloud URL', 'agama' ),
		'description'	=> __( 'Set your soundcloud page url.', 'agama' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_soundcloud',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_config( 'social_vk', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'social_vk', array(
		'label'			=> __( 'VK URL', 'agama' ),
		'description'	=> __( 'Set your vk page url.', 'agama' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_vk',
		'type'			=> 'text',
		'default'		=> ''
	) );
	Kirki::add_config( 'social_email', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'social_email', array(
		'label'			=> __( 'E-mail URL', 'agama' ),
		'description'	=> __( 'Set your e-mail contact url.', 'agama' ),
		'section'		=> 'agama_social_icons_section',
		'settings'		=> 'social_email',
		'type'			=> 'text',
		'default'		=> ''
	) );
###################################################################################
# FOOTER
###################################################################################
	Kirki::add_section( 'agama_footer_section', array(
		'title'			=> __( 'Footer', 'agama' ),
		'description'	=> __( 'Footer settings section.', 'agama' ),
		'capability'	=> 'edit_theme_options',
		'priority'		=> 110,
	) );
	Kirki::add_config( 'agama_footer_copyright', array(
		'capability'	=> 'edit_theme_options'
	) );
	Kirki::add_field( 'agama_footer_copyright', array(
		'label'			=> __( 'Copyright', 'agama' ),
		'description'	=> __( 'Add custom footer copyright.', 'agama' ),
		'section'		=> 'agama_footer_section',
		'settings'		=> 'agama_footer_copyright',
		'type'			=> 'code',
		'choices'		=> array(
			'language'	=> 'html',
			'theme'		=> 'monokai',
			'height'	=> '250'
		),
		'default'		=> ''
	) );
###################################################################################
# AGAMA SUPPORT
###################################################################################
	Kirki::add_section( 'agama_support_section', array(
		'title'			=> __( 'Agama Support', 'agama' ),
		'description'	=> __( 'Hey! Buy us a cofee and we shall come with new features and updates.', 'agama' ),
		'capability'	=> 'edit_theme_options',
		'priority'		=> 130
	) );
###################################################################################
# PRO FEATURES
###################################################################################
	Kirki::add_panel( 'agama_pro_panel', array(
		'title'			=> __( 'Agama PRO Features', 'agama' ),
		'description'	=> __( 'Agama PRO features.', 'agama' ),
		'priority'		=> 140
	) );
	Kirki::add_section( 'agama_share_icons_section', array(
		'title'			=> __( 'Share Box', 'agama' ),
		'description'	=> __( 'Share box settings section.', 'agama' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_pro_panel'
	) );
	Kirki::add_section( 'agama_typography_section', array(
		'title'			=> __( 'Typography', 'agama' ),
		'description'	=> __( 'Typography settings section.', 'agama' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_pro_panel'
	) );
	Kirki::add_section( 'agama_lightbox_section', array(
		'title'			=> __( 'Lightbox', 'agama' ),
		'description'	=> __( 'Lightbox settings section.', 'agama' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_pro_panel'
	) );
	Kirki::add_section( 'agama_woocommerce_section', array(
		'title'			=> __( 'WooCommerce', 'agama' ),
		'description'	=> __( 'WooCommerce settings section.', 'agama' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_pro_panel'
	) );
	Kirki::add_section( 'agama_contact_section', array(
		'title'			=> __( 'Contact', 'agama' ),
		'description'	=> __( 'Contact settings section.', 'agama' ),
		'capability'	=> 'edit_theme_options',
		'panel'			=> 'agama_pro_panel'
	) );
###################################################################################
# WordPress Options
###################################################################################
	Kirki::add_section( 'title_tagline', array(
		'title'			=> __( 'Site Identity', 'agama' ),
		'capability'	=> 'edit_theme_options',
		'priority'		=> 1
	) );
	Kirki::add_section( 'custom_css', array(
		'title'			=> __( 'Additional CSS', 'agama' ),
		'capability'	=> 'edit_theme_options',
		'priority'		=> 109
	) );
	Kirki::add_panel( 'nav_menus', array(
		'title'			=> __( 'Menus', 'agama' ),
		'priority'		=> 210
	) );
	Kirki::add_section( 'static_front_page', array(
		'title'			=> __( 'Static Front Page', 'agama' ),
		'capability'	=> 'edit_theme_options',
		'priority'		=> 230
	) );
	Kirki::add_panel( 'widgets', array(
		'title'			=> __( 'Widgets', 'agama' ),
		'priority'		=> 240
	) );
	
	
	
/**
 * Implement Theme Customizer additions and adjustments.
 *
 * @since Agama v1.0.7
 *
 */
function agama_customize_support_register($wp_customize){
	class Agama_Customize_Agama_Support extends WP_Customize_Control {
		public function render_content() { ?>
		<div class="theme-info"> 
			<a title="<?php esc_attr_e( 'Donate', 'agama' ); ?>" href="<?php echo esc_url( 'https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=BR55TPNQEK28L' ); ?>" target="_blank">
			<?php _e( 'Donate', 'agama' ); ?>
			</a>
			<a title="<?php esc_attr_e( 'Review Agama', 'agama' ); ?>" href="<?php echo esc_url( 'http://wordpress.org/support/view/theme-reviews/agama' ); ?>" target="_blank">
			<?php _e( 'Rate Agama', 'agama' ); ?>
			</a>
			<a href="<?php echo esc_url( 'https://wordpress.org/support/theme/agama' ); ?>" title="<?php esc_attr_e( 'Support Forum', 'agama' ); ?>" target="_blank">
			<?php _e( 'Support Forum', 'agama' ); ?>
			</a>
			<a href="<?php echo esc_url( 'http://demo.theme-vision.com' ); ?>" title="<?php esc_attr_e( 'Agama PRO Demo', 'agama' ); ?>" target="_blank">
			<?php _e( 'Agama PRO Demo', 'agama' ); ?>
			</a>
			<a href="<?php echo esc_url( 'http://theme-vision.com/agama-pro/' ); ?>" title="<?php esc_attr_e( 'Agama PRO Buy', 'agama' ); ?>" target="_blank">
			<?php _e( 'Agama PRO Buy', 'agama' ); ?>
			</a>
		</div>
		<?php
		}
	}
}
add_action('customize_register', 'agama_customize_support_register');

/**
 * Register Customizer Agama Pro Block
 *
 * @since 1.0.9
 */
function agama_customize_premium_feature($wp_customize) {
	class Agama_Customize_Agama_Pro extends WP_Customize_Control {
		public function render_content() { ?>
			<div class="theme-premium-feature">
				<label>
					<span class="customize-control-title">
						Premium Feature - 
						<a href="<?php echo esc_url('http://www.theme-vision.com/agama-pro/'); ?>" title="Agama Pro" target="_blank">
							Get Agama Pro ($39)
						</a>
					</span>
					<span class="description customize-control-description">
						<strong>Agama Pro</strong> comes with allot of features & premium plugins <strong>worth over $68</strong>.<br /><br />
						<strong>Check demo: <a href="<?php echo esc_url('http://demo.theme-vision.com'); ?>" target="_blank">here</a></strong>
					</span>
				</label>
			</div>
		<?php
		}
	}
}
add_action('customize_register', 'agama_customize_premium_feature');

/**
 * Register Customizer Agama Heading
 *
 * @since 1.1.5
 */
function agama_customize_heading($wp_customize) {
	class Agama_Customize_Agama_Heading extends WP_Customize_Control {
		public function render_content() { ?>
			<div class="agama-customize-heading">
				<h3><?php echo esc_html( $this->label ); ?></h3>
			</div>
		<?php 
		}
	}
}
add_action('customize_register', 'agama_customize_heading');
 
/**
 * Define Customizer Settings, Controls etc...
 *
 * @since Agama 1.0
 */
function agama_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	$wp_customize->remove_section('colors');
###################################################################################
# AGAMA SUPPORT
###################################################################################
	$wp_customize->add_setting( 'agama_support', array(
		'default'			=> false,
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new Agama_Customize_Agama_Support(
			$wp_customize,'agama_support', array(
				'label'			=> __( 'Agama Upgrade', 'agama' ),
				'description'	=> __( 'Agama Upgrade', 'agama' ),
				'section'		=> 'agama_support_section',
				'settings'		=> 'agama_support',
			)
		)
	);
###################################################################################
# PRO FEATURE
###################################################################################
	$wp_customize->add_setting( 'agama_frontpage_box_5', array(
		'default'			=> false,
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new Agama_Customize_Agama_Pro(
			$wp_customize,'agama_frontpage_box_5', array(
				'label'			=> __( 'Frontpage Box #5', 'agama' ),
				'description'	=> __( 'Frontpage Box #5', 'agama' ),
				'section'		=> 'agama_frontpage_boxes_section_5',
				'settings'		=> 'agama_frontpage_box_5',
			)
		)
	);
###################################################################################
# PRO FEATURE
###################################################################################
	$wp_customize->add_setting( 'agama_frontpage_box_6', array(
		'default'			=> false,
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new Agama_Customize_Agama_Pro(
			$wp_customize,'agama_frontpage_box_6', array(
				'label'			=> __( 'Frontpage Box #6', 'agama' ),
				'description'	=> __( 'Frontpage Box #6', 'agama' ),
				'section'		=> 'agama_frontpage_boxes_section_6',
				'settings'		=> 'agama_frontpage_box_6',
			)
		)
	);
###################################################################################
# PRO FEATURE
###################################################################################
	$wp_customize->add_setting( 'agama_frontpage_box_7', array(
		'default'			=> false,
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new Agama_Customize_Agama_Pro(
			$wp_customize,'agama_frontpage_box_7', array(
				'label'			=> __( 'Frontpage Box #7', 'agama' ),
				'description'	=> __( 'Frontpage Box #7', 'agama' ),
				'section'		=> 'agama_frontpage_boxes_section_7',
				'settings'		=> 'agama_frontpage_box_7',
			)
		)
	);
###################################################################################
# PRO FEATURE
###################################################################################
	$wp_customize->add_setting( 'agama_frontpage_box_8', array(
		'default'			=> false,
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new Agama_Customize_Agama_Pro(
			$wp_customize,'agama_frontpage_box_8', array(
				'label'			=> __( 'Frontpage Box #8', 'agama' ),
				'description'	=> __( 'Frontpage Box #8', 'agama' ),
				'section'		=> 'agama_frontpage_boxes_section_8',
				'settings'		=> 'agama_frontpage_box_8',
			)
		)
	);
###################################################################################
# PRO FEATURE
###################################################################################
	$wp_customize->add_setting( 'agama_slide_3', array(
		'default'			=> false,
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new Agama_Customize_Agama_Pro(
			$wp_customize,'agama_slide_3', array(
				'label'			=> __( 'Slide #3', 'agama' ),
				'description'	=> __( 'Slide #3', 'agama' ),
				'section'		=> 'agama_slide_3_section',
				'settings'		=> 'agama_slide_3',
			)
		)
	);
###################################################################################
# PRO FEATURE
###################################################################################
	$wp_customize->add_setting( 'agama_slide_4', array(
		'default'			=> false,
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new Agama_Customize_Agama_Pro(
			$wp_customize,'agama_slide_4', array(
				'label'			=> __( 'Slide #4', 'agama' ),
				'description'	=> __( 'Slide #4', 'agama' ),
				'section'		=> 'agama_slide_4_section',
				'settings'		=> 'agama_slide_4',
			)
		)
	);
###################################################################################
# PRO FEATURE
###################################################################################
	$wp_customize->add_setting( 'agama_slide_5', array(
		'default'			=> false,
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new Agama_Customize_Agama_Pro(
			$wp_customize,'agama_slide_5', array(
				'label'			=> __( 'Slide #5', 'agama' ),
				'description'	=> __( 'Slide #5', 'agama' ),
				'section'		=> 'agama_slide_5_section',
				'settings'		=> 'agama_slide_5',
			)
		)
	);
###################################################################################
# PRO FEATURE
###################################################################################
	$wp_customize->add_setting( 'agama_slide_6', array(
		'default'			=> false,
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new Agama_Customize_Agama_Pro(
			$wp_customize,'agama_slide_6', array(
				'label'			=> __( 'Slide #6', 'agama' ),
				'description'	=> __( 'Slide #6', 'agama' ),
				'section'		=> 'agama_slide_6_section',
				'settings'		=> 'agama_slide_6',
			)
		)
	);
###################################################################################
# PRO FEATURE
###################################################################################
	$wp_customize->add_setting( 'agama_slide_7', array(
		'default'			=> false,
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new Agama_Customize_Agama_Pro(
			$wp_customize,'agama_slide_7', array(
				'label'			=> __( 'Slide #7', 'agama' ),
				'description'	=> __( 'Slide #7', 'agama' ),
				'section'		=> 'agama_slide_7_section',
				'settings'		=> 'agama_slide_7',
			)
		)
	);
###################################################################################
# PRO FEATURE
###################################################################################
	$wp_customize->add_setting( 'agama_slide_8', array(
		'default'			=> false,
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new Agama_Customize_Agama_Pro(
			$wp_customize,'agama_slide_8', array(
				'label'			=> __( 'Slide #8', 'agama' ),
				'description'	=> __( 'Slide #8', 'agama' ),
				'section'		=> 'agama_slide_8_section',
				'settings'		=> 'agama_slide_8',
			)
		)
	);
###################################################################################
# PRO FEATURE
###################################################################################
	$wp_customize->add_setting( 'agama_slide_9', array(
		'default'			=> false,
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new Agama_Customize_Agama_Pro(
			$wp_customize,'agama_slide_9', array(
				'label'			=> __( 'Slide #9', 'agama' ),
				'description'	=> __( 'Slide #9', 'agama' ),
				'section'		=> 'agama_slide_9_section',
				'settings'		=> 'agama_slide_9',
			)
		)
	);
###################################################################################
# PRO FEATURE
###################################################################################
	$wp_customize->add_setting( 'agama_slide_10', array(
		'default'			=> false,
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new Agama_Customize_Agama_Pro(
			$wp_customize,'agama_slide_10', array(
				'label'			=> __( 'Slide #10', 'agama' ),
				'description'	=> __( 'Slide #10', 'agama' ),
				'section'		=> 'agama_slide_10_section',
				'settings'		=> 'agama_slide_10',
			)
		)
	);
###################################################################################
# PRO FEATURE
###################################################################################
	$wp_customize->add_setting( 'agama_share_icons', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(
		new Agama_Customize_Agama_Pro(
			$wp_customize, 'agama_share_icons', array(
				'label'			=> __( 'Share Box', 'agama' ),
				'description'	=> __( 'Share Box', 'agama' ),
				'section'		=> 'agama_share_icons_section',
				'settings'		=> 'agama_share_icons'
			)
		)
	);
###################################################################################
# PRO FEATURE
###################################################################################
	$wp_customize->add_setting( 'agama_typography', array(
		'default'			=> false,
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control( 
		new Agama_Customize_Agama_Pro( 
			$wp_customize, 'agama_typography', array(
				'label'			=> __( 'Typography', 'agama' ),
				'description'	=> __( 'Typography', 'agama' ),
				'section'		=> 'agama_typography_section',
				'settings'		=> 'agama_typography',
			)
		)
	);
###################################################################################
# PRO FEATURE
###################################################################################
	$wp_customize->add_setting( 'agama_lightbox', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(
		new Agama_Customize_Agama_Pro(
			$wp_customize, 'agama_lightbox', array(
				'label'			=> __( 'Lightbox', 'agama' ),
				'description'	=> __( 'Lightbox', 'agama' ),
				'section'		=> 'agama_lightbox_section',
				'setting'		=> 'agama_lightbox'
			)
		)
	);
###################################################################################
# PRO FEATURE
###################################################################################
	$wp_customize->add_setting( 'agama_contact', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(
		new Agama_Customize_Agama_Pro(
			$wp_customize, 'agama_contact', array(
				'label'			=> __( 'Contact', 'agama' ),
				'description'	=> __( 'Contact', 'agama' ),
				'section'		=> 'agama_contact_section',
				'setting'		=> 'agama_contact'
			)
		)
	);
###################################################################################
# PRO FEATURE
###################################################################################
	$wp_customize->add_setting( 'agama_woocommerce', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(
		new Agama_Customize_Agama_Pro(
			$wp_customize, 'agama_woocommerce', array(
				'label'			=> __( 'WooCommerce', 'agama' ),
				'description'	=> __( 'WooCommerce', 'agama' ),
				'section'		=> 'agama_woocommerce_section',
				'setting'		=> 'agama_woocommerce'
			)
		)
	);
}
add_action( 'customize_register', 'agama_customize_register' );

/**
 * Enqueue Javascript postMessage handlers for the Customizer.
 *
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 * @since Agama 1.0
 */
function agama_customize_preview_js() {
	wp_register_script( 'agama-customizer', get_template_directory_uri() . '/assets/js/customize-preview.js', array( 'customize-preview' ), uniqid(), true );
	$localize = array(
		'skin_url' 			=> esc_url( get_stylesheet_directory_uri() . '/assets/css/skins/' ),
		'top_nav_enable'	=> esc_attr( get_theme_mod( 'agama_top_navigation', true ) )
	);
	wp_localize_script( 'agama-customizer', 'agama', $localize );
	wp_enqueue_script( 'agama-customizer' );
}
add_action( 'customize_preview_init', 'agama_customize_preview_js' );

/**
 * Agama Upgrade to PRO
 *
 * @since 1.2.0
 */
function agama_upgrade_to_pro() {
	wp_register_script( 'agama_customizer_script', AGAMA_JS . 'agama-customizer.js', array('jquery'), uniqid(), true );
    wp_enqueue_script( 'agama_customizer_script' );
    wp_localize_script( 'agama_customizer_script', 'themevision', array(
        'URL'   => esc_url( 'http://theme-vision.com/agama-pro/' ),
        'Label' => __( 'Upgrade to PRO', 'agama' ),
    ) );
}
add_action( 'customize_controls_enqueue_scripts', 'agama_upgrade_to_pro' );

/**
 * Generating Dynamic CSS
 *
 * @since Agama 1.0
 */
function agama_customize_css() { ?>
	<style type="text/css" id="agama-customize-css">
	
	<?php if( get_theme_mod( 'agama_custom_css',  '' ) ): ?>
		<?php echo esc_html( get_theme_mod( 'agama_custom_css', '' ) ); ?>
	<?php endif; ?>
	
	
	
	#masthead .logo {
		max-height: <?php echo esc_attr( get_theme_mod( 'agama_logo_max_height', '90' ) ); ?>px;
	}
	#masthead .sticky-header-shrink .logo {
		max-height: 65px !important;
	}
	
	/* MOBILE NAVIGATION
	 *********************************************************************************/
	.mobile-menu-toggle { background-color: <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#A2C605' ) ); ?>;}
	nav.mobile-menu { background: <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#A2C605' ) ); ?>; }
	
	<?php if( get_theme_mod( 'agama_slider_enable', true ) ): ?>
	/* SLIDER
	 *********************************************************************************/
	#agama_slider .slide-content.slide-1 {
		top: <?php echo esc_attr( get_theme_mod( 'agama_slider_content_top_1', '40' ) ); ?>%;
	}
	#agama_slider .slide-content.slide-2 {
		top: <?php echo esc_attr( get_theme_mod( 'agama_slider_content_top_2', '40' ) ); ?>%;
	}
	#agama_slider .slide-content.slide-1 a.button-3d:hover {
		background-color: <?php echo esc_attr( get_theme_mod( 'agama_slider_button_bg_color_1', '#A2C605' ) ); ?> !important;
	}
	#agama_slider .slide-content.slide-2 a.button-3d:hover {
		background-color: <?php echo esc_attr( get_theme_mod( 'agama_slider_button_bg_color_2', '#A2C605' ) ); ?> !important;
	}
	<?php endif; ?>
	
	<?php if( ! is_active_sidebar( 'sidebar-1' ) ): ?>
	#content[role=main] {
		max-width: 100% !important;
	}
	<?php endif; ?>
	
	<?php 
	if( 
		! get_theme_mod( 'agama_blog_post_meta', true ) && get_theme_mod( 'agama_blog_layout', 'list' ) == 'list' || 
		! get_theme_mod( 'agama_blog_post_date', true ) && get_theme_mod( 'agama_blog_layout', 'list' ) == 'list'
	): ?>
	.list-style .entry-content { margin-left: 0 !important; }
	<?php endif; ?>
	
	.sm-form-control:focus {
		border-color: <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#A2C605' ) ); ?>;
	}
	
	.entry-content .more-link {
		border-bottom: 1px solid <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#A2C605' ) ); ?>;
		color: <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#A2C605' ) ); ?>;
	}
	
	.comment-content .comment-author cite {
		background-color: <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#A2C605' ) ); ?>;
		border: 1px solid <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#A2C605' ) ); ?>;
	}
	
	#respond #submit {
		background-color: <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#A2C605' ) ); ?>;
	}
	
	<?php if( is_rtl() ): ?>
	blockquote {
		border-right: 3px solid <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#A2C605' ) ); ?>;
	}
	<?php else: ?>
	blockquote {
		border-left: 3px solid <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#A2C605' ) ); ?>;
	}
	<?php endif; ?>
	
	<?php if( get_theme_mod( 'agama_layout_style', 'fullwidth' ) == 'fullwidth' ): ?>
	#main-wrapper { max-width: 100%; }
	<?php else: ?>
	#main-wrapper { max-width: 1200px; }
	header .sticky-header { max-width: 1200px; }
	<?php endif; ?>
	
	.search-form .search-table .search-button input[type="submit"]:hover {
		background: <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#A2C605' ) ); ?>;
	}
	#main-wrapper {
		margin-top: <?php echo esc_attr( get_theme_mod( 'agama_header_top_margin', '0' ) ); ?>px;
	}
	
	<?php if( get_theme_mod( 'agama_header_style', 'transparent' ) == 'transparent' ): ?>
	/* HEADER V1
	 *********************************************************************************/
	.header_v1 .sticky-header { position: fixed; box-shadow: none; -webkit-box-shadow: none; border-bottom: 2px solid rgba(255,255,255, .1); }
	.header_v1.shrinked .sticky-header { border-bottom: 0 none; }
	<?php endif; ?>
	
	<?php if( get_theme_mod( 'agama_header_style', 'transparent' ) == 'sticky' && get_theme_mod( 'agama_top_navigation', true ) ): ?>
	
	#top-bar,
	.top-bar-out .sticky-header {
		border-top-width: <?php echo esc_attr( get_theme_mod( 'agama_header_top_border_size', '3' ) ); ?>px; 
		border-top-color: <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#A2C605' ) ); ?>;
		border-top-style: solid;
	}
	<?php elseif( get_theme_mod( 'agama_header_style', 'transparent' ) == 'sticky' && ! get_theme_mod( 'agama_top_navigation', true ) ): ?>
	.sticky-header {
		border-top-width: <?php echo esc_attr( get_theme_mod( 'agama_header_top_border_size', '3' ) ); ?>px; 
		border-top-color: <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#A2C605' ) ); ?>;
		border-top-style: solid;
	}
	<?php endif; ?>
	
	<?php if( get_theme_mod( 'agama_header_style', 'transparent' ) == 'default' && get_theme_mod( 'agama_top_navigation', true ) ): ?>
	.top-nav-wrapper { 
		border-top-width: <?php echo esc_attr( get_theme_mod( 'agama_header_top_border_size', '3' ) ); ?>px; 
		border-top-color: <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#A2C605' ) ); ?>;
		border-top-style: solid;
	}
	<?php elseif( get_theme_mod( 'agama_header_style', 'transparent' ) == 'default' && ! get_theme_mod( 'agama_top_navigation', true ) ): ?>
	#masthead { 
		border-top-width: <?php echo esc_attr( get_theme_mod( 'agama_header_top_border_size', '3' ) ); ?>px; 
		border-top-color: <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#A2C605' ) ); ?>;
		border-top-style: solid;
	}
	<?php endif; ?>
	
	#page-title { background-color: <?php echo esc_attr( get_theme_mod( 'agama_breadcrumb_bg_color', '#F5F5F5' ) ); ?>; }
	#page-title h1, .breadcrumb > .active { color: <?php echo esc_attr( get_theme_mod( 'agama_breadcrumb_text_color', '#444' ) ); ?>; }
	#page-title a { color: <?php echo esc_attr( get_theme_mod( 'agama_breadcrumb_links_color', '#444' ) ); ?>; }
	#page-title a:hover { color: <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#A2C605' ) ); ?>; }
	
	.breadcrumb a:hover { color: <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#A2C605' ) ); ?>; }
	
	<?php if( get_theme_mod('agama_blog_infinite_scroll', false) && get_theme_mod('agama_blog_layout', 'list') == 'grid' ): ?>
	#infscr-loading {
		position: absolute;
		bottom: 0;
		left: 25%;
	}
	<?php endif; ?>
	
	.tagcloud a:hover {
		border-color: <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#A2C605' ) ); ?>;
		color: <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#A2C605' ) ); ?>;
	}
	
	button,
	.button,
	input[type="submit"],
	.entry-date .date-box {
		background-color: <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#A2C605' ) ); ?>;
	}
	
	.button-3d:hover {
		background-color: <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#A2C605' ) ); ?> !important;
	}
	
	.entry-date .format-box i {
		color: <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#A2C605' ) ); ?>;
	}
	
	.vision_tabs #tabs li.active a {
		border-top: 3px solid <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#A2C605' ) ); ?>;
	}
	
	#toTop:hover {
		background-color: <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#A2C605' ) ); ?>;
	}
	
	.footer-widgets .widget-title:after {
		background: <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#A2C605' ) ); ?>;
	}
	</style>
	<?php
}
add_action( 'wp_head', 'agama_customize_css' );

/**
 * Styling Agama Support Section
 *
 * @since 1.0.7
 */
function customize_styles_agama_support( $input ) { ?>
	<style type="text/css">
		a:-webkit-any-link {
			text-decoration: none;
		}
		#customize-theme-controls #accordion-section-agama_support_section .accordion-section-title:after, 
		#customize-theme-controls #accordion-panel-agama_pro_panel .accordion-section-title:after {
			color: #fff;
		}
		#customize-theme-controls #accordion-section-agama_support_section .accordion-section-title,
		#customize-theme-controls #accordion-panel-agama_pro_panel .accordion-section-title {
			background-color: rgba(162, 198, 5, 0.9);
			color: #fff;
		}
		#customize-theme-controls #accordion-section-agama_support_section .accordion-section-title:hover,
		#customize-theme-controls #accordion-panel-agama_pro_panel .accordion-section-title:hover {
			background-color: rgba(162, 198, 5, 1);
		}
		#customize-theme-controls #accordion-section-agama_support_section .theme-info a {
			padding: 10px 8px;
			display: block;
			border-bottom: 1px solid #eee;
			color: #555;
		}
		#customize-theme-controls #accordion-section-agama_support_section .theme-info a:hover {
			color: #222;
			background-color: #f5f5f5;
		}
		.theme-headers label > input[type="radio"] {
		  display:none;
		}
		.theme-headers label > input[type="radio"] + img{
		  cursor:pointer;
		  border:2px solid transparent;
		}
		.theme-headers label > input[type="radio"]:checked + img{
		  border:2px solid #f00;
		}
		#accordion-section-agama_typography_section .accordion-section-content,
		#accordion-section-agama_share_icons_section .accordion-section-content,
		#accordion-section-agama_woocommerce_section .accordion-section-content,
		#accordion-section-agama_lightbox_section .accordion-section-content,
		#accordion-section-agama_body_background_animated_section .accordion-section-content,
		#accordion-section-agama_contact_section .accordion-section-content {
			background-color: #A2C605;
			color: #fff;
		}
		#accordion-section-agama_typography_section .accordion-section-content a,
		#accordion-section-agama_share_icons_section .accordion-section-content a,
		#accordion-section-agama_woocommerce_section .accordion-section-content a,
		#accordion-section-agama_lightbox_section .accordion-section-content a,
		#accordion-section-agama_body_background_animated_section .accordion-section-content a,
		#accordion-section-agama_contact_section .accordion-section-content a {
			color: #000;
		}
		#accordion-section-agama_typography_section .accordion-section-content a:hover,
		#accordion-section-agama_share_icons_section .accordion-section-content a:hover,
		#accordion-section-agama_woocommerce_section .accordion-section-content a:hover,
		#accordion-section-agama_lightbox_section .accordion-section-content a:hover,
		#accordion-section-agama_body_background_animated_section .accordion-section-content a:hover,
		#accordion-section-agama_contact_section .accordion-section-content a:hover {
			color: #fff;
		}
		#accordion-section-agama_frontpage_boxes_section_5 h3:before,
		#accordion-section-agama_frontpage_boxes_section_6 h3:before,
		#accordion-section-agama_frontpage_boxes_section_7 h3:before,
		#accordion-section-agama_frontpage_boxes_section_8 h3:before,
		#accordion-section-agama_slide_3_section h3:before,
		#accordion-section-agama_slide_4_section h3:before,
		#accordion-section-agama_slide_5_section h3:before,
		#accordion-section-agama_slide_6_section h3:before,
		#accordion-section-agama_slide_7_section h3:before,
		#accordion-section-agama_slide_8_section h3:before,
		#accordion-section-agama_slide_9_section h3:before,
		#accordion-section-agama_slide_10_section h3:before,
		#accordion-section-agama_body_background_animated_section h3:before,
		#accordion-section-agama_typography_section h3:before,
		#accordion-section-agama_share_icons_section h3:before,
		#accordion-section-agama_woocommerce_section h3:before,
		#accordion-section-agama_lightbox_section h3:before,
		#accordion-section-agama_contact_section h3:before {
			font-size: 11px;
			content: "premium";
			float: right;
			right: 20px;
			position: relative;
			color: #A2C605;
		}
		.agama-customize-heading h3 {
			border: 1px dashed #4A73AA;
			font-weight: 600;
			text-align: center;
			color: #4A73AA;
		}
	</style>
<?php }
add_action( 'customize_controls_print_styles', 'customize_styles_agama_support');