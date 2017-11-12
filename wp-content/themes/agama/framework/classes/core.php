<?php
// Prevent direct access to the file
if( ! defined( 'ABSPATH' ) ) exit; 

/**
 * Agama Core Class
 *
 * @since Agama v1.0.1
 */
if( ! class_exists( 'Agama_Core' ) ) {
	class Agama_Core {
		
		/**
		 * Refers to a single instance of this class.
		 * 
		 * @since 1.1.5
		 */
		private static $instance = null;
		
		/**
		 * Theme Version
		 *
		 * @rewritten
		 * @since 1.1.5
		 */
		static private $version = '1.2.8.10';
		
		/**
		 * Class Constructor
		 *
		 * @since 1.0.1
		 */
		function __construct() {
			
			$this->defines();
			
			add_action( 'wp_head', array( $this, 'IE_Scripts' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'scripts_styles' ) );
			add_action( 'wp_footer', array( $this, 'footer_scripts' ) );
		}
		
		/**
		 * Creates or returns an instance of this class.
		 *
		 * @since 1.1.5
		 */
		public static function get_instance() {
			if( null == self::$instance ) {
				self::$instance = new self;
			}
			
			return self::$instance;
		}
		
		/**
		 * Agama Defines
		 *
		 * @since Agama v1.0.1
		 */
		function defines() {
			// Set up Agama text domain
			if( ! defined( 'AGAMA_DOMAIN' ) ) {
				define( 'AGAMA_DOMAIN', 'agama' );
			}
			
			// Defina Agama URI
			if( ! defined( 'AGAMA_URI' ) ) {
				define( 'AGAMA_URI', get_template_directory_uri().'/' );
			}
			
			// Define Agama DIR
			if( ! defined( 'AGAMA_DIR' ) ) {
				define( 'AGAMA_DIR', get_template_directory().'/' );
			}
			
			// Define Agama framework DIR
			if( !defined( 'AGAMA_FMW' ) ) {
				define( 'AGAMA_FMW', AGAMA_DIR.'framework/' );
			}
			
			// Define Agama INC
			if( ! defined( 'AGAMA_INC' ) ) {
				define( 'AGAMA_INC', AGAMA_DIR.'includes/' );
			}
			
			// Define Agama CSS
			if( ! defined( 'AGAMA_CSS' ) ) {
				define( 'AGAMA_CSS', AGAMA_URI.'assets/css/' );
			}
			
			// Define Agama JS
			if( ! defined( 'AGAMA_JS' ) ) {
				define( 'AGAMA_JS', AGAMA_URI.'assets/js/' );
			}
			
			// Define Agama IMG
			if( ! defined( 'AGAMA_IMG' ) ) {
				define( 'AGAMA_IMG', AGAMA_URI.'assets/img/' );
			}
		}
		
		/**
		 * Enqueue scripts and styles for front-end.
		 *
		 * @since Agama 1.0
		 */
		function scripts_styles() {
			global $wp_styles;
			
			// Open Sans
			wp_register_style( 'OpenSans', esc_url( '//fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700&subset=latin,latin-ext' ) );
			wp_enqueue_style( 'OpenSans' );
			 
			// PT Sans
			wp_register_style( 'PTSans', esc_url( '//fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic' ) );
			wp_enqueue_style( 'PTSans' );
			 
			// Raleway
			wp_register_style( 'Raleway', esc_url( '//fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800,900,200,100' ) );
			wp_enqueue_style( 'Raleway' );
			 
			// Crete Round
			wp_register_style( 'CreteRound', esc_url( '//fonts.googleapis.com/css?family=Crete+Round:400,400italic' ) );
			wp_enqueue_style( 'CreteRound' );
			
			/*
			 * Adds JavaScript to pages with the comment form to support
			 * sites with threaded comments (when in use).
			 */
			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
				wp_enqueue_script( 'comment-reply' );
			
			// FontAwesome
			wp_register_style( 'fontawesome', AGAMA_CSS . 'font-awesome.min.css', array(), '4.6.3' );
			wp_enqueue_style( 'fontawesome' );
			
			// Enqueue Agama Woocommerce stylesheet
			if( class_exists('Woocommerce') ) {
				wp_register_style( 'agama-woocommerce', AGAMA_CSS . 'woocommerce.css', array(), self::$version );
				wp_enqueue_style( 'agama-woocommerce' );
			}
			
			// Agama main stylesheet
			wp_register_style( 'agama-style', get_stylesheet_uri(), array(), self::$version );
			 wp_enqueue_style( 'agama-style' );
			 
			// If dark skin selected, enqueue it's stylesheet
			if( get_theme_mod('agama_skin', 'light') == 'dark' ) {
				wp_register_style( 'agama-dark', AGAMA_CSS.'skins/dark.css', array(), self::$version );
				wp_enqueue_style( 'agama-dark' );
			}
			
			// Loads the Internet Explorer specific stylesheet.
			wp_register_style( 'agama-ie', AGAMA_CSS.'ie.min.css', array( 'agama-style' ), self::$version );
			wp_enqueue_style( 'agama-ie' );
			$wp_styles->add_data( 'agama-ie', 'conditional', 'lt IE 9' );
			
			// Load camera slider stylesheet
			if( get_theme_mod( 'agama_slider_image_1', AGAMA_IMG . 'header_img.jpg' ) || 
				get_theme_mod( 'agama_slider_image_2', AGAMA_IMG . 'header_img.jpg' ) ) {
				wp_register_style( 'agama-slider', AGAMA_CSS . 'camera.min.css', array(), self::$version );
				wp_enqueue_style( 'agama-slider' );
			}
			
			// Load Animate stylesheet
			wp_register_style( 'agama-animate', AGAMA_CSS . 'animate.min.css', array(), '3.5.1' );
			wp_enqueue_style( 'agama-animate' );
			
			// Load all jquery plugins
			wp_register_script( 'agama-plugins', AGAMA_JS . 'plugins.js', array('jquery'), self::$version );
			wp_enqueue_script( 'agama-plugins' );
			
			// Load Agama jQuery Functions
			wp_register_script( 'agama-functions', AGAMA_JS . 'functions.js', array(), self::$version, true );
			$translation_array = array(
				'is_admin_bar_showing'	=> esc_attr( is_admin_bar_showing() ),
				'is_home'				=> is_home(),
				'is_front_page'			=> is_front_page(),
				'headerStyle'			=> esc_attr( get_theme_mod( 'agama_header_style', 'transparent' ) ),
				'headerImage'			=> esc_attr( get_header_image() ),
				'top_navigation'		=> esc_attr( get_theme_mod( 'agama_top_navigation', true ) ),
				'background_image'		=> esc_attr( get_header_image() ),
				'primaryColor' 			=> esc_attr( get_theme_mod( 'agama_primary_color', '#A2C605' ) ),
				'header_top_margin'		=> esc_attr( get_theme_mod( 'agama_header_top_margin', '0' ) ),
				'slider_enable'			=> esc_attr( get_theme_mod( 'agama_slider_enable', true ) ),
				'slider_height'			=> esc_attr( get_theme_mod( 'agama_slider_height', '0' ) ),
				'slider_time'			=> esc_attr( get_theme_mod( 'agama_slider_time', '7000' ) )
			);
			wp_localize_script( 'agama-functions', 'agama', $translation_array );
			wp_enqueue_script( 'agama-functions' );
		}
		
		/**
		 * Enqueue Script for IE versions
		 *
		 * @since Agama v1.0.2
		 */
		function IE_Scripts() {
			global $wp_scripts;
			echo '<!--[if lt IE 9]><script src="' . AGAMA_JS . 'min/html5.min.js"></script><![endif]-->'; // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions.
		}
		
		/**
		 * Enqueue Footer Scripts
		 *
		 * @since Agama v1.0.3
		 */
		function footer_scripts() {
			if( get_theme_mod('agama_nicescroll', false) ) {
				echo '
				<script>
				jQuery(document).ready(function($) {
					$("html").niceScroll({
						cursorwidth:"10px",
						cursorborder:"1px solid #333",
						zindex:"9999"
					});
				});
				</script>
				';
			}
		}
		
		/**
		 * Return Theme Version
		 *
		 * @since 1.1.5
		 */
		public static function version() {
			return self::$version;
		}
	}
	Agama_Core::get_instance();
}