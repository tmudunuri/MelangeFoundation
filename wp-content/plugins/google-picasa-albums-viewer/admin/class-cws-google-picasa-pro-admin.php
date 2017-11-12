<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://cheshirewebsolutions.com/
 * @since      2.0.0
 *
 * @package    CWS_Google_Picasa_Pro
 * @subpackage CWS_Google_Picasa_Pro/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 * @author     Your Name <email@example.com>
 */
class CWS_Google_Picasa_Pro_Admin {

    var $debug = false;
    
	/**
	 * The ID of this plugin.
	 *
	 * @since    2.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    2.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * The is user authenticated with Google.
	 *
	 * @since    2.0.0
	 * @access   private
	 * @var      int    $authenticated    Check is user authenticated with Google.
	 */    
    private $authenticated = 0;

    /**
     * The check is this a Pro version.
     *
     * @since    2.0.0
     * @access   private
     * @var      int    $isPro    Check is if this is pro version.
     */    
    private $isPro ;  

    /**
     * User Id used to check ignore upgrade notice.
     *
     * @since    2.1.1
     * @access   private
     * @var      int    $userId    User Id of loggedin user.
     */ 
    private $userId;
    
    var $client; // Used for Google Client
    
	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    2.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version, $isPro ) {

        $this->plugin_name = $plugin_name;
		$this->version = $version;
        $this->isPro = $isPro;
/*        $this->client = new Google_Client();
        $this->client->setApplicationName("Client_Library_Examples");
        $this->client->setDeveloperKey("AIzaSyCP9XMYoQdxXfI-gK1bvZDW2RxyfvYENuM");  
        $this->client->setClientId('806353319710-g782kn9ed0gm77ucl0meen5ohs84qgqm.apps.googleusercontent.com');
        $this->client->setClientSecret('P6BMMEWLKUSoxB48X2Tzu8ds');
        $this->client->setRedirectUri('urn:ietf:wg:oauth:2.0:oob');
        $this->client->setScopes('https://picasaweb.google.com/data/');
        $this->client->setAccessType('offline');
  */      
        // Include required files
		$this->includes();

        //$this->cws_gpp_admin_installed_notice();
        //$this->cws_gpp_admin_notices_styles();
	}


	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function includes() {

		if( $this->debug ) error_log( 'Inside: CWS_WPPicasaPro::includes()' );
		
		if ( is_admin() ) $this->admin_includes();
            
        include_once( dirname(__FILE__) . '/../cws-gpp-functions.php' );				// TODO: split file out in admin and non-admin functions
		include_once( dirname(__FILE__) . '/../shortcodes/shortcode-init.php' );		// Init the shortcodes
        include_once( dirname(__FILE__) . '/../widgets/widget-init.php' );				// Widget classes		

        if( $this->isPro ==1 ) {
            // TODO: change this into an include for Pro shortcodes...
            add_shortcode( 'cws_gpp_images_by_albumid', 'cws_gpp_shortcode_images_in_album' );  // new one, shortcode provides album id
        }
	}

	public function admin_includes() {
	
		if( $this->debug ) error_log( 'Inside: CWS_WPPicasaPro::admin_includes()' );

		include_once( dirname(__FILE__) . '/../cws-gpp-functions.php' );				// TODO: split file out in admin and non-admin functions
	}    
    

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    2.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/cws-google-picasa-pro-admin.css', array(), $this->version, 'all' );
	}


	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    2.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/cws-google-picasa-pro-admin.js', array( 'jquery' ), $this->version, false );
	}
    

    /**
     * Check if the plugin is a Pro version.
     *
     * @since    2.0.0
     */  
    private function get_Pro( $isPro ) {

        if( $isPro == 1 ){ return "Pro"; }
        return;
    }


	/**
	 * Register the Options for the admin area.
	 *
	 * @since    2.0.0
	 */    
    /*
    public function add_options_page() {
       
        $strIsPro = $this->get_Pro( $this->isPro );

        // add_options_page( $page_title, $menu_title, $capability, $menu_slug, $function);
        add_options_page( 'Google Picasa ' . $strIsPro, 'Google Picasa '. $strIsPro, 'manage_options', 'cws_gpp', array( $this, 'options_page') );  
    } */

    /**
     * Register the Top Level Menu Page for the admin area.
     *
     * @since    2.3.0
     */    
    public function add_menu_page() {

        $strIsPro = $this->get_Pro( $this->isPro );
        // add_menu_page('Page Title', 'Google Photos', 10, 'cws_gpp', 'section');
        add_menu_page( 'Page Title', 'Google Photos', 'manage_options', 'cws_gpp', array( $this, 'options_page') );
        add_submenu_page( 'cws_gpp', 'Google Photos Settings', 'Settings', 'manage_options', 'cws_gpp', array( $this, 'options_page') );
        //add_submenu_page( 'cws_gpp', 'Google Photos Getting Started', 'Get Started', 'manage_options', 'cws_gpp', array( $this, 'getting_started_page') );
    }    

    /**
     * Register the Options for the admin area.
     *
     * @since    2.3.0
     */    
    public function add_options_sc_page() {

        //$strIsPro = $this->get_Pro( $this->isPro );
        // add_submenu_page( 'cws_gpp', 'Google Photos Album Shortcodes', 'Album Shortcodes', 'manage_options', 'cws_sc', array( $this, 'options_page_sc') );
        add_submenu_page( 'cws_gpp', 'Google Photos Album Shortcodes', 'Shortcode Examples', 'manage_options', 'cws_sc', array( $this, 'options_page_sc') );
    }
 

    /**
     * Register the Getting Started Options for the admin area.
     *
     * @since    3.0.9
     */    
    public function add_options_gs_page() {

        //$strIsPro = $this->get_Pro( $this->isPro );
        add_submenu_page( 'cws_gpp', 'Google Photos Getting Started', 'Getting Started', 'manage_options', 'cws_gs', array( $this, 'options_page_gs') );
    }


    /**
     * Draw the Options page for the admin area. This contains simple shortcode snippets for *** PRO ONLY ***
     *
     * @since    2.3.0
     */
    public function options_page_gs() {
 ?>
        <div class="wrap">
        <?php screen_icon(); ?>
            <h2>Getting Started</h2>

            <!-- <div class="widget-liquid-left"> -->
            <div>

                <form action="options.php" method="post">

                <?php 
                // Step 1:  The user has not authenticated we give them a link to login    
                if( $this->isAuthenticated() !== true ) {
                    // settings_fields( $option_group )
                    // Output nonce, action, and option_page fields for a settings page. Please note that this function must be called inside of the form tag for the options page.
                    // $option_group - A settings group name. This should match the group name used in register_setting(). 
                    ////settings_fields( 'cws_gpp_code' );

                    // do_settings_sections( $page );
                    // Prints out all settings sections added to a particular settings page.
                    // The slug name of the page whose settings sections you want to output. This should match the page name used in add_settings_section().
                    ////do_settings_sections( 'cws_gpp' ); 
                    ?>

                    Not authenticated...
                    <!-- <input name="Submit" type="submit" value="Save Changes" />  -->
                    </form> 
                    <?php
                } else {
                ?>
                <style>
                span.sc-highlight{
                background-color:#f7f7f7;padding:6px;border:1px solid #c2c2c2; border-radius:4px;
                }
                </style>
                <div style="width: 95%;" class="postbox-container">
                    <h2>1. Basic Setup</h2>
                    <p>To have your albums covers on one page and display the your images from within the selected album on another page.</p>
                    <p>See example on <a href="http://wordpress-plugin-google-photos.cheshirewebsolutions.com/display-albums-grid/" target="_blank">demo site</a> or <a href="https://www.youtube.com/watch?v=cx-2PcRcbao" target="_blank">watch video</a> of what we are trying to achieve.</p>
                    
                    <p>First, it's important to realise that 2 shortcodes are needed for this. One shortcode (a) to display the album covers and and the second shortcode (b) to display the results of the clicked album.</p>
                    <p>Second, it's also important to realise that you must put the slug of the page from the second shortcode (b) into the first shortcode (a).</p>

                    <p>Stick with it, it's not nearly as complicated as it sounds.</p>
  <br/>                 
<h3>Display Album Covers</h3>

                    <p><strong>(a) Shortcode to display album covers</strong></p>
                    <p>Below is an example of the shortcode to display the album covers. Place the shortcode on a page and update the <span class="sc-highlight"><i>results_page='results-grid'</i></span> to the slug of the page where you place shortcode (b)</p>
                    <p><strong>[cws_gpp_albums theme='grid' results_page='results-grid' show_title=1 show_details=1 num_results=6 hide_albums='Auto Backup,Profile Photos']</strong></p>
                    <p>The option <i>results-page='results-grid'</i> is set to the slug of the page where you place shortcode (b). So if you placed shortcode (b) on a page called 'images' then 
                        you would use <span class="sc-highlight"><i>results-page='images'</i></span>.</p>

<h4>Shortcode (a) Options</h4>
<p>The album title and details (Date created and number of images in album) can be hidden using options <span class="sc-highlight"><i>show_title=0</i></span> and <span class="sc-highlight"><i>show_details=0</i></span> respectively.</p>
<p>Control the number of albums covers per page using <span class="sc-highlight"><i>num_results=6</i></span>
<p>Hide unwanted albums using <span class="sc-highlight"><i>hide_albums='Auto Backup,Profile Photos'</i></span>, obviously replacing with the names of the albums you want to hide</p>

  <br/> 
<h3>Display Images in Clicked Album</h3>


                    <p><strong>(b) Shortcode to display images in clicked album</strong></p>
                    <p>[cws_gpp_images_in_album theme=grid show_title=1 show_details=1 album_title=1]</p>
<h4>Shortcode (b) Options</h4>
<p>The album title can be hidden using option <span class="sc-highlight"><i>album_title=0</i></span></p>
<p>The image titles and details can be hidden using options <span class="sc-highlight"><i>show_title=0</i></span> and <span class="sc-highlight"><i>show_details=0</i></span> respectively.</p>

  <br/> 
<h3>What is the <i>theme</i> option all about?</h3>
<p>This option controls the display of the Albums and Images, it has 3 options (grid, list, carousel)</p>
<p>To display albums / images in a <strong>grid</strong> format use <span class="sc-highlight"><i>theme=grid</i></span>
<p>To display albums / images in a <strong>list</strong> format use <span class="sc-highlight"><i>theme=list</i></span>
<p>To display albums / images in a <strong>carousel</strong> format use <span class="sc-highlight"><i>theme=carousel</i></span>
<p>This option is supported in both shortcode (a) and shortcode (b)</p>

                        <div class="metabox-holder">
              
                            <div class="postboxxxx" id="settingsxxx">
                                <?php
                                // $plugin = new CWS_Google_Picasa_Pro( $plugin_name, $version, $isPro );
                                $plugin = new CWS_Google_Picasa_Pro();
                                $plugin_admin = new CWS_Google_Picasa_Pro_Admin( $plugin->get_plugin_name(), $plugin->get_version(), $plugin->get_isPro() );

                                // Only display shortcode snippets to Pro users...
                                if( $plugin->isPro == 1 ) {

                                    ?>
                                        <!-- <h2>Pro Features Setup</h2> -->
                                    <?php

                                    // Grab options stored in db
                                    $options = get_option( 'cws_gpp_options' );

                                    // set some defaults...
                                    $options['results_page'] = isset($options['results_page']) ? $options['results_page'] : "";
                                    $options['hide_albums'] = isset($options['hide_albums']) ? $options['hide_albums'] : "";
                                    $options['theme'] = isset($options['theme']) ? $options['theme'] : "";

                                    // Extract the options from db and overwrite with any set in the shortcode
                                   // extract( shortcode_atts( array(
                                    extract( array(
                                        'thumb_size'   => $options['thumb_size'],
                                        'album_thumb_size'   => $options['album_thumb_size'], 
                                        'show_title'         => $options['show_album_title'],
                                        'show_details' => $options['show_album_details'],
                                        'num_results'  => $options['num_album_results'],
                                        'visibility'         => $options['private_albums'],                                        
                                        'results_page'       => $options['results_page'],
                                        'hide_albums'        => $options['hide_albums'],
                                        'theme'              => $options['theme'],
                                        'imgmax'            => $options['lightbox_image_size'],            
                                    ) );
                                    // ), $atts ) );
                                    // Map albums names to hide to array and trim white space
                                    //$hide_albums = array_map( 'trim', explode( ',', $hide_albums ) );
                            /*
                                        if( isset( $hide_albums ) ) {
                                            $hide_albums[] = 'Auto Backup';
                                        }
                                        else {
                                            $hide_albums = 'Auto Backup';
                                        }
                            */
                                    // TODO: cast other vars to int if required
                                    $thumb_size = ( int ) $thumb_size;

                                    if ( $show_title === 'false' ) $show_title = false; // just to be sure...
                                    if ( $show_title === 'true' ) $show_title = true; // just to be sure...
                                    if ( $show_title === '0' ) $show_title = false; // just to be sure...
                                    if ( $show_title === '1' ) $show_title = true; // just to be sure...
                                    $show_title = ( bool ) $show_title;  

                                    if ( $show_details === 'false' ) $show_details = false; // just to be sure...
                                    if ( $show_details === 'true' ) $show_details = true; // just to be sure...
                                    if ( $show_details === '0' ) $show_details = false; // just to be sure...
                                    if ( $show_details === '1' ) $show_details = true; // just to be sure...
                                    $show_details = ( bool ) $show_details;  
                        
                                    // Grab page from url
                                    $cws_page = $_GET[ 'cws_page' ]; // $cws_page = get_query_var( 'cws_page' );

                                    // Grab the access token
                                    $AccessToken = get_option( 'cws_gpp_access_token' );

                                    // Get Albums
                                    $response = $plugin_admin->getAlbumList( $AccessToken, $album_thumb_size, $show_title, 0, 0, $visibility );  
                              
                                    ?>
                            </div> <!-- / . postbox -->

                        </div> <!-- / meta holder -->
                    </div> <!-- / .postbox-container -->
            <?php   } else { ?>
            <?php       // Display upgrade content if not Pro
                        // echo $plugin_admin->cws_gpp_upgrade_content(); 
                    }

               } 

                ?>

            </div><!-- / left -->
        </div>
        <?php
        } // end function options_page_gs()









    
    /**
     * Draw the Options page for the admin area. This contains simple shortcode snippets for *** PRO ONLY ***
     *
     * @since    2.3.0
     */
    public function options_page_sc() {
 ?>
        <div class="wrap">
        <?php screen_icon(); ?>
            <h2>Google Picasa <?php echo $this->get_Pro( $this->isPro );?> Settings</h2>

            <!-- <div class="widget-liquid-left"> -->
            <div>

                <form action="options.php" method="post">

                <?php 
                // Step 1:  The user has not authenticated we give them a link to login    
                if( $this->isAuthenticated() !== true ) {
                    // settings_fields( $option_group )
                    // Output nonce, action, and option_page fields for a settings page. Please note that this function must be called inside of the form tag for the options page.
                    // $option_group - A settings group name. This should match the group name used in register_setting(). 
                    ////settings_fields( 'cws_gpp_code' );

                    // do_settings_sections( $page );
                    // Prints out all settings sections added to a particular settings page.
                    // The slug name of the page whose settings sections you want to output. This should match the page name used in add_settings_section().
                    ////do_settings_sections( 'cws_gpp' ); 
                    ?>

                    Not authenticated...
                    <!-- <input name="Submit" type="submit" value="Save Changes" />  -->
                    </form> 
                    <?php
                } else {
                ?>
                <div style="width: 95%;" class="postbox-container">
                    <h2>Google Photo Album Details</h2>
                    <p>Use this shortcode to display photos in a album specified by the ID.</p>
                        <div class="metabox-holder">
              
                            <div class="postbox" id="settings">
                                <?php
                                // $plugin = new CWS_Google_Picasa_Pro( $plugin_name, $version, $isPro );
                                $plugin = new CWS_Google_Picasa_Pro();
                                $plugin_admin = new CWS_Google_Picasa_Pro_Admin( $plugin->get_plugin_name(), $plugin->get_version(), $plugin->get_isPro() );

                                // Only display shortcode snippets to Pro users...
                                if( $plugin->isPro == 1 ) {

                                    // Grab options stored in db
                                    $options = get_option( 'cws_gpp_options' );

                                    // set some defaults...
                                    $options['results_page'] = isset($options['results_page']) ? $options['results_page'] : "";
                                    $options['hide_albums'] = isset($options['hide_albums']) ? $options['hide_albums'] : "";
                                    $options['theme'] = isset($options['theme']) ? $options['theme'] : "";

                                    // Extract the options from db and overwrite with any set in the shortcode
                                   // extract( shortcode_atts( array(
                                    extract( array(
                                        'thumb_size'   => $options['thumb_size'],
                                        'album_thumb_size'   => $options['album_thumb_size'], 
                                        'show_title'         => $options['show_album_title'],
                                        'show_details' => $options['show_album_details'],
                                        'num_results'  => $options['num_album_results'],
                                        'visibility'         => $options['private_albums'],                                        
                                        'results_page'       => $options['results_page'],
                                        'hide_albums'        => $options['hide_albums'],
                                        'theme'              => $options['theme'],
                                        'imgmax'            => $options['lightbox_image_size'],            
                                    ) );
                                    // ), $atts ) );
                                    // Map albums names to hide to array and trim white space
                                    //$hide_albums = array_map( 'trim', explode( ',', $hide_albums ) );
                            /*
                                        if( isset( $hide_albums ) ) {
                                            $hide_albums[] = 'Auto Backup';
                                        }
                                        else {
                                            $hide_albums = 'Auto Backup';
                                        }
                            */
                                    // TODO: cast other vars to int if required
                                    $thumb_size = ( int ) $thumb_size;

                                    if ( $show_title === 'false' ) $show_title = false; // just to be sure...
                                    if ( $show_title === 'true' ) $show_title = true; // just to be sure...
                                    if ( $show_title === '0' ) $show_title = false; // just to be sure...
                                    if ( $show_title === '1' ) $show_title = true; // just to be sure...
                                    $show_title = ( bool ) $show_title;  

                                    if ( $show_details === 'false' ) $show_details = false; // just to be sure...
                                    if ( $show_details === 'true' ) $show_details = true; // just to be sure...
                                    if ( $show_details === '0' ) $show_details = false; // just to be sure...
                                    if ( $show_details === '1' ) $show_details = true; // just to be sure...
                                    $show_details = ( bool ) $show_details;  
                        
                                    // Grab page from url
                                    if( isset($_GET[ 'cws_page' ]) ){
                                      $cws_page = $_GET[ 'cws_page' ]; // $cws_page = get_query_var( 'cws_page' );
                                    }

                                    // Grab the access token
                                    $AccessToken = get_option( 'cws_gpp_access_token' );

                                    // Get Albums
                                    $response = $plugin_admin->getAlbumList( $AccessToken, $album_thumb_size, $show_title, 0, 0, $visibility );  
                                    // $response = $plugin_admin->getAlbumList( $AccessToken, $album_thumb_size, $show_title, 0, 0 );             
                              
                                    // var_dump($response);

                                    #----------------------------------------------------------------------------
                                    # Convert the XML response into SimpleXML Object
                                    #----------------------------------------------------------------------------
                                    if (!function_exists('produce_XML_object_tree')) {

                                        function produce_XML_object_tree( $response ) {
                                            libxml_use_internal_errors( true );
                                            try {
                                                // Create simplexml object from feed
                                                $xml = new SimpleXMLElement( $response );
                                            }  catch ( Exception $e ) {
                                                // Something went wrong.
                                                $error_message = 'SimpleXMLElement threw an exception.';
                                                foreach( libxml_get_errors() as $error_line ) {
                                                    $error_message .= "\t" . $error_line->message;
                                                }
                                                trigger_error( $error_message );
                                                return false;
                                            }
                                            return $xml;
                                        } // end function produce

                                    }

                                    // Create SimpleXML Object
                                    $xml = produce_XML_object_tree ( $response );

                                    if( $xml === false ) {
                                        echo 'Sorry there has been a problem with your feed.';
                                    } else {

                                        // TODO: create a helper function
                                        if( isset($_GET[ 'cws_debug' ]) ){
                                            $cws_debug = $_GET[ 'cws_debug' ]; // $cws_debug = get_query_var( 'cws_debug' );
                                            if( $_GET["cws_debug"] == "1" ) { 
                                                echo "<pre>" . print_r( $xml, true ) . "</pre>";
                                            }
                                        }
                                        
                                        $xml->registerXPathNamespace('gphoto', 'http://schemas.google.com/photos/2007');
                                        $xml->registerXPathNamespace('media', 'http://search.yahoo.com/mrss/');

                                        // register namespace to get access to total number of albums found
                                        $xml->registerXPathNamespace('opensearch', 'http://a9.com/-/spec/opensearch/1.1/');
                                        $totalResults = $xml->xpath( "opensearch:totalResults" );
                                        $total_num_albums = $totalResults[0]; 
                                    ?>
                                        <table class="wp-list-table widefat fixed posts">
                                            <thead>
                                             <tr valign="top">
                                                  <th scope="row" width="100">Album Name </th>
                                                  <!--<th scope="row" width="70">Published</th>
                                                  <th scope="row" width="50">Num Photos </th> -->
                                                  <th scope="row" width="100">Album ID </th>
                                                  <th scope="row">Example shortcode</th>
                                             </tr>
                                            </thead>
                                    <?php
                                        // loop over the albums
                                        foreach( $xml->entry as $feed ) {

                                            // get the data we need
                                            $title = $feed->title;
                                            
                                            $gphoto = $feed->children( 'http://schemas.google.com/photos/2007' );
                                            $num_photos = $gphoto->numphotos; 
                                            $published = $feed->published; 
                                            $published = trim( $published );
                                            $published = substr( $published, 0, 10 );      

                                            $group = $feed->xpath( './media:group/media:thumbnail' );
                                            $a = $group[0]->attributes(); // we need thumbnail path
                                            $id = $feed->xpath( './gphoto:id' ); // and album id for our thumbnail
                                            ?>
                                                <tbody data-wp-lists="list:post" id="the-list">

                                                    <tr>
                                                        <td class="title column-title">
                                                            <strong><?php echo $title;?></strong>
                                                        </td>
                                                        <td class="shortcode column-deescription"><?php echo $id[0];?></td>
                                                        <td class="shortcode column-shortcode">
                                                            <input size="80" type="text" class="shortcode-in-list-table wp-ui-text-highlight code" value="[cws_gpp_images_by_albumid theme=grid id=&quot;<?php echo $id[0];?>&quot;]" readonly="readonly" onfocus="this.select();">                                     
                                                    </tr>

                                                 </tbody>
                                            <?php
                                        } // end foreach
                                    ?>
                                            <foot>
                                             <tr valign="top">
                                                  <th scope="row">Album Name </th>
                                                  <!-- <th scope="row">Published</th>
                                                  <th scope="row">Num Photos </th> -->                               
                                                  <th scope="row">Album ID </th>
                                                  <th scope="row">Example shortcode </th>
                                             </tr>
                                            </foot>                                  
                                        </table>                        
                                    <?php
                                    } // end else
                                    ?>
                            </div> <!-- / . postbox -->

                            <h3>Shortcode Usage Examples</h3>

                            <h4>Display Albums Covers in a Carousel</h4>
                            <input size="80" type="text" class="shortcode-in-list-table wp-ui-text-highlight code" value="[cws_gpp_albums theme='carousel' results_page='page-slug-here' show_titles=1]" readonly="readonly" onfocus="this.select();">       
                                
                            <h4>Display Album Covers in a Grid View</h4>
                            <input size="80" type="text" class="shortcode-in-list-table wp-ui-text-highlight code" value="[cws_gpp_albums theme='grid' results_page='page-slug-here' show_details='1' num_results=5]" readonly="readonly" onfocus="this.select();">  

                            <h4>Display Album Covers in a List View</h4>
                            <input size="80" type="text" class="shortcode-in-list-table wp-ui-text-highlight code" value="[cws_gpp_albums theme='list' results_page='page-slug-here' show_title='1' show_details='1' thumb_size='250' num_results='3' visibility='all']" readonly="readonly" onfocus="this.select();">  

                            <h4>Display Images from Clicked Album Cover in a Carousel View</h4>
                            <input size="80" type="text" class="shortcode-in-list-table wp-ui-text-highlight code" value="[cws_gpp_images_in_album theme='carousel' show_title=0 thumbsize='150']" readonly="readonly" onfocus="this.select();">  

                            <h4>Display Images from Clicked Album Cover in a Grid View</h4>
                            <input size="80" type="text" class="shortcode-in-list-table wp-ui-text-highlight code" value="[cws_gpp_images_in_album theme='grid' show_title=1 show_details='1']" readonly="readonly" onfocus="this.select();">  

                            <h4>Display Images from Clicked Album Cover in a List View</h4>
                            <input size="80" type="text" class="shortcode-in-list-table wp-ui-text-highlight code" value="[cws_gpp_images_in_album theme='list' show_title=1 show_details=1 num_results='13' thumb_size='250']" readonly="readonly" onfocus="this.select();">  
                            <!--
                            <h4>Display Images from Clicked Album Cover in a Expander View, great for when there are long Captions.</h4>
                            <input size="80" type="text" class="shortcode-in-list-table wp-ui-text-highlight code" value="[cws_gpp_images_in_album theme='expander' show_title=0]" readonly="readonly" onfocus="this.select();">  
                            -->
                            <h4>Display Images in a Specific Album. Only one album per page.</h4>
                            <input size="80" type="text" class="shortcode-in-list-table wp-ui-text-highlight code" value="[cws_gpp_images_by_albumid id='05218507736478682657' theme='grid' show_title='0' show_details='0']" readonly="readonly" onfocus="this.select();">  

                            <!-- <h4>Display Album Images in Photo Booth Strips</h4>
                            <input size="80" type="text" class="shortcode-in-list-table wp-ui-text-highlight code" value="[cws_gpp_albums theme='propbs' show_details='1' num_results='4']" readonly="readonly" onfocus="this.select();">  

                            <h4>Display Album Covers in Polaroid Scatter Grid</h4>
                            <input size="80" type="text" class="shortcode-in-list-table wp-ui-text-highlight code" value="[cws_gpp_albums theme='propsg' results_page='results-grid' show_details='1']" readonly="readonly" onfocus="this.select();">  
                            <p>Theme options supported by the results page for this are 'grid', 'list', 'carousel' </p> -->
                        </div> <!-- / meta holder -->
                    </div> <!-- / .postbox-container -->
            <?php   } else { ?>
            <?php       // Display upgrade content if not Pro
                        echo $plugin_admin->cws_gpp_upgrade_content(); 
                    }

               } 

                ?>

            </div><!-- / left -->
        </div>
        <?php
        } // end function options_page_sc()


	/**
	 * Draw the Options page for the admin area.
	 *
	 * @since    2.0.0
	 */
    public function options_page() {

        if( $this->deauthorizeGoogleAccount() ) {
            // TODO: finsish this delete_option unset()
            delete_option( 'cws_gpp_reset' );
            delete_option( 'cws_gpp_token_expires' );
            delete_option( 'cws_gpp_code' );
            delete_option( 'cws_gpp_access_token' );
        } ?>

        <div class="wrap">
        <?php screen_icon(); ?>
            <h2>Google Picasa <?php echo $this->get_Pro( $this->isPro );?> Settings</h2>

            <div class="widget-liquid-left">

                <form action="options.php" method="post">

            <?php 
                // Step 1:  The user has not authenticated we give them a link to login    
                if( $this->isAuthenticated() !== true ) {
                    // settings_fields( $option_group )
                    // Output nonce, action, and option_page fields for a settings page. Please note that this function must be called inside of the form tag for the options page.
                    // $option_group - A settings group name. This should match the group name used in register_setting(). 
                    settings_fields( 'cws_gpp_code' );

                    // do_settings_sections( $page );
                    // Prints out all settings sections added to a particular settings page.
                    // The slug name of the page whose settings sections you want to output. This should match the page name used in add_settings_section().
                    do_settings_sections( 'cws_gpp' ); 
                    ?>
                    <input name="Submit" type="submit" value="Save Changes" />  

                </form> 
            <?php
                } 
                else {
                    /**
                     * User is authenticated so display plugin config settings
                     * 
                     */

                    // Get Access Token
                    $token = $this->getAccessToken();
                    
                    settings_fields( 'cws_gpp_options' );
                    do_settings_sections( 'cws_gpp_defaults' );
                    ?>
                    <input name="Submit" type="submit" value="Save Changes" />  
                </form> 

                <form action="options.php" method="post">

            <?php   settings_fields( 'cws_gpp_reset' );
                    do_settings_sections( 'cws_gpp_reset' );  
            ?>
                    <input name="Submit" type="submit" value="Deauthorise" onclick="if(!this.form.reset.checked){alert('You must click the checkbox to confirm you want to deauthorize current Google account.');return false}" />

                </form>                             
            <?php                      
                }
            ?>

            </div><!-- / left -->
                <?php // $this->cws_gpp_meta_box_feedback(); ?>

            <?php
                if( !$this->isPro == 1 ) {
                    // Only call for the upgrade meta box if this is not a Pro install
                    $this->cws_gpp_meta_box_pro(); 
                }
            ?>

        </div>
        <?php
    }
    

    // Display a feedback links
    public function cws_gpp_meta_box_feedback() {
    ?>

        <div class="widget-liquid-right">
            <div id="widgets-right">    
                <div style="width:20%;" class="postbox-container side">
                    <div class="metabox-holder">
                        <div class="postbox" id="feedback">
                            <h3><span>Please rate the plugin!</span></h3>
                            <div class="inside">                            
                                <p>If you have found this useful please leave us a <a href="http://wordpress.org/extend/plugins/google-picasa-albums-viewer/">good rating</a></p>
                                <p>&raquo; Share it with your friends <a href="<?php echo "http://twitter.com/share?url=http://bit.ly/q4nqNA&text=Check out this awesome WordPress Plugin I'm using - Google Picasa Viewer" ?>">Tweet It</a></p>
                                <p>If you have found a bug please email me <a href="mailto:info@cheshirewebsolutions.com?subject=Feedback%20Google%20Picasa%20Viewer">info@cheshirewebsolutions.com</a></p>                               
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>  
        
    <?php
        
    }


    // Display a Picasa Pro Promo Box
    function cws_gpp_meta_box_pro() {
    ?>
    <div class="widget-liquid-right">
        <div id="widgets-right">
            <!-- <div style="width:20%;" class="postbox-container side"> -->
            <div class="postbox-container side">
                <div class="metabox-holder">
                    <div class="postbox" id="donate">
                        <?php echo $this->cws_gpp_upgrade_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div><?php   
    }


    // seperate upgrade content from markup so can use content in more places, like shortcode snippets page and pro shortcodes in the frontend
    function cws_gpp_upgrade_content() {

        $strOutput = "<h3><span>Get Google Picasa Pro!</span></h3>
                    <div class=\"inside\">
                        <p>Grab yourself the <a href=\"http://www.cheshirewebsolutions.com/?utm_source=cws_gpp_config&utm_medium=text-link&utm_content=meta_box_pro&utm_campaign=cws_gpp_plugin\">Pro</a> version of the plugin.                        
                        <a href=\"http://www.cheshirewebsolutions.com/?utm_source=wp_gp_viewer&utm_medium=wp_plugin&utm_content=meta_box_download_it_here&utm_campaign=plugin_upgrade\">Download it here</a> <span><strong>GET 20% OFF!</strong> – use discount code <strong>WPMEGA20</strong> on checkout</span></p>
                        <h3>
                            Reasons to UPGRADE!
                        </h3>
                        <ol>
                            <li>Priority Email Support!</li>
                            <li>It’s much faster! We cache the Google Feed</li>
                            <li>Justified Image Grid Layout</li>
                            <li>Touch enabled lightbox, flick to the next or previous image, spread to zoom in etc</li>
                            <li>Native HTML5 full screen lightbox</li>
                            <li>Display image description as caption in lightbox</li>
                            <li>Social sharing</li>
                            <li>Customisable Lightbox Dimensions! have it as big as you like</li>
                            <li>Fantastic hover style effects</li>
                            <li>Display images in a specific album! just supply the album id</li>
                            <li>Helpful Shortcode Snippets Admin page!</li>
                            <li>Powered by link has been removed!</li>
                            <li>Included Download Original Image link</li>
                        </ol>

                    </div>";

        return $strOutput;
    }


	/**
	 * Register Settings, Settings Section and Settings Fileds.
     * 
     * @link    https://codex.wordpress.org/Function_Reference/register_setting
     * @link    https://codex.wordpress.org/Function_Reference/add_settings_section
     * @link    https://codex.wordpress.org/Function_Reference/add_settings_field
	 *
	 * @since    2.0.0
	 */    
    public function register_plugin_settings() {
        // register_setting( $option_group, $option_name, $sanitize_callback ).
        // $option_group - A settings group name. Must exist prior to the register_setting call. This must match the group name in settings_fields().
        // $option_name - The name of an option to sanitize and save.
        // $sanitize_callback - A callback function that sanitizes the option's value.
        register_setting( 'cws_gpp_code', 'cws_gpp_code', array( $this, 'validate_options' ) );
        register_setting( 'cws_gpp_options', 'cws_gpp_options', array( $this, 'validate_main_options' ) );

        register_setting( 'cws_gpp_reset', 'cws_gpp_reset', array( $this, 'validate_reset_options' ) );

        // add_settings_section( $id, $title, $callback, $page )
        // $id - String for use in the 'id' attribute of tags
        // $title - Title of the section
        // $callback - Function that fills the section with the desired content. The function should echo its output.
        // $page - The menu page on which to display this section. Should match $menu_slug in add_options_page();
        add_settings_section( 'cws_gpp_add_code', 'Authenticate with Google', array( $this, 'section_text' ), 'cws_gpp' );
        add_settings_section( 'cws_gpp_add_options', 'Default Settings', array( $this, 'section_main_text' ), 'cws_gpp_defaults' );

        add_settings_section( 'cws_gpp_add_reset', 'Deauthorise Plugin from your Google Account', array( $this, 'section_reset_text' ), 'cws_gpp_reset' );

        // add_settings_field( $id, $title, $callback, $page, $section, $args );
        // $id - String for use in the 'id' attribute of tags
        // $title - Title of the field
        // $callback - Function that fills the field with the desired inputs as part of the larger form. Passed a single argument, 
        // the $args array. Name and id of the input should match the $id given to this function. The function should echo its output.
        // $page - The menu page on which to display this field. Should match $menu_slug in add_options_page();
        // $section - (optional) The section of the settings page in which to show the box. A section added with add_settings_section() [optional]
        // $args - (optional) Additional arguments that are passed to the $callback function
        add_settings_field( 'cws_myplugin_oauth2_code', 'Enter Google Access Code here', array( $this, 'setting_input' ), 'cws_gpp', 'cws_gpp_add_code' );
        

        // Add default option field - Thumbnail Size 
        add_settings_field( 'cws_gpp_thumbnail_size', 'Thumbnail Size (px)', array( $this, 'options_thumbnail_size' ), 'cws_gpp_defaults', 'cws_gpp_add_options' );

        // Add default option field - Album Thumbnail Size 
        add_settings_field( 'cws_gpp_album_thumbnail_size', 'Album Thumbnail Size (px)', array( $this, 'options_album_thumbnail_size' ), 'cws_gpp_defaults', 'cws_gpp_add_options' );

        if( $this->isPro ) {
            // PRO ONLY
            // Add default option field - Lighbox Image Size 
            add_settings_field( 'cws_gpp_lightbox_image_size', 'Lightbox Image Size (px)', array( $this, 'options_lightbox_image_size' ), 'cws_gpp_defaults', 'cws_gpp_add_options' );        
        }
        // Add default option field - Number of image results
        add_settings_field( 'cws_gpp_num_image_results', 'Number of images per page', array( $this, 'options_num_image_results' ), 'cws_gpp_defaults', 'cws_gpp_add_options' );

        // Add default option field - Number of album results
        add_settings_field( 'cws_gpp_num_album_results', 'Number of albums per page', array( $this, 'options_num_album_results' ), 'cws_gpp_defaults', 'cws_gpp_add_options' );
        
        // Add default option checkbox - Show private albums checkbox
        add_settings_field( 'cws_gpp_show_private_albums', 'Show which albums', array( $this, 'options_show_private_albums' ), 'cws_gpp_defaults', 'cws_gpp_add_options' );        

        // Add default option checkbox - Show album title
        add_settings_field( 'cws_gpp_show_album_title', 'Show Album Title', array( $this, 'options_show_album_title' ), 'cws_gpp_defaults', 'cws_gpp_add_options' );   

        // Add default option checkbox - Show image title
        add_settings_field( 'cws_gpp_show_image_title', 'Show Image Title', array( $this, 'options_show_image_title' ), 'cws_gpp_defaults', 'cws_gpp_add_options' ); 

        // Add default option checkbox - Show album details
        add_settings_field( 'cws_gpp_show_album_details', 'Show Album Details', array( $this, 'options_show_album_details' ), 'cws_gpp_defaults', 'cws_gpp_add_options' );   

        // Add default option checkbox - Show image details
        add_settings_field( 'cws_gpp_show_image_details', 'Show Image Details', array( $this, 'options_show_image_details' ), 'cws_gpp_defaults', 'cws_gpp_add_options' ); 
        
        if( $this->isPro ) {
            // PRO ONLY
            // Add default option checkbox - Enable Cache
            add_settings_field( 'cws_gpp_enable_cache', 'Enable Cache', array( $this, 'options_enable_cache' ), 'cws_gpp_defaults', 'cws_gpp_add_options' );
            // Add default option checkbox - Expose Original file
            add_settings_field( 'cws_gpp_enable_download', 'Download Original Image Link', array( $this, 'options_enable_download' ), 'cws_gpp_defaults', 'cws_gpp_add_options' );
        }

        // Add reset option
        add_settings_field( 'cws_gpp_reset', 'Click here to confirm you want to deauthorise plugin from your google account', array( $this, 'options_reset' ), 'cws_gpp_reset', 'cws_gpp_add_reset' );   
    }
    
    
	/**
	 * Draw the Section Header for the admin area.
	 *
	 * @since    2.0.0
	 */
    function section_text() {
        echo 'You need to click here to authorize access and paste the Access Code provided by Google in the field below.';
		
		// get the google authorisation url
        //$authUrl = $this->client->createAuthUrl();
        $authUrl = $this->authentication_process();

//var_dump($authUrl);

        // display the google authorisation url
        echo $this->createAuthLink( $authUrl );
        
        $code = get_option( 'cws_gpp_code' );
        $oauth2_code = $code['oauth2_code'];
        
        $token = get_option( 'cws_gpp_access_token' );
        $token = $token['access_token'];
  
//var_dump($code['oauth2_code'] );

        if ( isset( $code['oauth2_code'] ) ) {
            
$client = cws_gpp_google_class();
$client->setApplicationName("Client_Library_Examples");
$client->setDeveloperKey("AIzaSyCP9XMYoQdxXfI-gK1bvZDW2RxyfvYENuM");  
$client->setClientId('806353319710-g782kn9ed0gm77ucl0meen5ohs84qgqm.apps.googleusercontent.com');
$client->setClientSecret('P6BMMEWLKUSoxB48X2Tzu8ds');
$client->setRedirectUri('urn:ietf:wg:oauth:2.0:oob');
$client->setScopes('https://picasaweb.google.com/data/');
$client->setAccessType('offline');


            // $this->client->authenticate( $code['oauth2_code'] );  
            $client->authenticate( $code['oauth2_code'] );
            //$AccessToken = $this->client->getAccessToken();
            $AccessToken = $client->getAccessToken();
            $AccessToken = json_decode( $AccessToken, TRUE );
            
            // delete code
           	$code = get_option( 'cws_gpp_code' );
            
            if ( $code ) {
                unset($code['oauth2_code']);
                update_option( 'cws_gpp_code', $code );
            }
                        
            // store access token
            if( update_option( 'cws_gpp_access_token', $AccessToken ) )
            {
                if( $this->debug ) error_log( 'Update option: cws_gpp_access_token' );
               
                // store token expires
                $now = date("U");
                $token_expires = $now + $AccessToken['expires_in'];
                add_option( 'cws_gpp_token_expires', $token_expires );      
                
                $url = admin_url( "options-general.php?page=".$_GET["page"] );
                // error_log($url);
                
                wp_redirect( "$url" );
                exit;               
            }
        }        
    }
    

    function section_main_text() {
        
    }

    //
    function section_reset_text() {
        
    }   

    function section() {

    } 


    /**
      * @since      3.0.10
    */

    function authentication_process() {

        $client = cws_gpp_google_class();

        // $this->client = new Google_Client();
        $client->setApplicationName("Client_Library_Examples");
        $client->setDeveloperKey("AIzaSyCP9XMYoQdxXfI-gK1bvZDW2RxyfvYENuM");  
        $client->setClientId('806353319710-g782kn9ed0gm77ucl0meen5ohs84qgqm.apps.googleusercontent.com');
        $client->setClientSecret('P6BMMEWLKUSoxB48X2Tzu8ds');
        $client->setRedirectUri('urn:ietf:wg:oauth:2.0:oob');
        $client->setScopes('https://picasaweb.google.com/data/');
        $client->setAccessType('offline');

        if ( ! isset($_GET['code']) ) 
        {
            $loginUrl = $client->createAuthurl();
        }

        return $loginUrl;
    }
   
    
	/**
	 * Get the Access Token stored in db.
	 *
	 * @since    2.0.0
	 */    
    public function getAccessToken() {
        $token = get_option( 'cws_gpp_access_token' );

        return $token;
    }
    

    /**
     * Get the authourisation link.
     *
     * @since    2.0.0
     */     
    public function createAuthLink( $authUrl ) {

        if ( isset( $authUrl ) ) {

            $output = "<br><br><a class='login' href='$authUrl' target='_blank'>Connect My Google Account</a>"; 
        } else {
            $output = "There was a problem generating the Google Autherisation link";
        }

        return $output;
    }
    

    /** GOOD WORKFLOW OF STEPS https://www.domsammut.com/code/php-server-side-youtube-v3-oauth-api-video-upload-guide **/   
    /**
     * Get the Reset option stored in db.
     *
     * @since    2.0.0
     */  
    public function deauthorizeGoogleAccount() {
        // get options from db

        if( get_option( 'cws_gpp_reset' ) ){
            return true;
        } 

        return false;
    }


    public function isAuthenticated(){
        
        // get options from db
        $code = get_option( 'cws_gpp_code' );
        $token = get_option( 'cws_gpp_access_token' );
        
        if ( !isset( $token['access_token'] ) ) {
            // get oauth2 code
            //$this->getOAuthToken();
        }
        else{
            // check if it needs refreshing
            $now = date("U");
            
            // get cws_gpp_token_expires
            $token_expires = get_option( 'cws_gpp_token_expires' );

            // check if $now is greater than cws_gpp_token_expires
            if ( $now > $token_expires ) {
                $this->refreshToken(); 
                return;
            }   
			
			return true;
        }

        return false;
    }

    
    public function refreshToken(){
        
        if($this->debug){ error_log('Inside refreshToken()'); }

        $GOOGLE_OAUTH2_REFERER = "";

        // get access token and refresh it      
        $now = date( "U" );
        $clientId = '806353319710-g782kn9ed0gm77ucl0meen5ohs84qgqm.apps.googleusercontent.com';
        $clientSecret = 'P6BMMEWLKUSoxB48X2Tzu8ds';
        $token = get_option( 'cws_gpp_access_token' );
        $refreshToken = $token['refresh_token'];

        $postBody = 'client_id='.urlencode($clientId)
                  .'&client_secret='.urlencode($clientSecret)
                  .'&refresh_token='.urlencode($refreshToken)
                  .'&grant_type=refresh_token';
          
        $curl = curl_init();
        curl_setopt_array( $curl,
                         array( CURLOPT_CUSTOMREQUEST => 'POST'
                               , CURLOPT_URL => 'https://www.googleapis.com/oauth2/v3/token'
                               , CURLOPT_HTTPHEADER => array( 'Content-Type: application/x-www-form-urlencoded'
                                                             , 'Content-Length: '.strlen($postBody)
                                                             )
                               , CURLOPT_POSTFIELDS => $postBody                              
                               , CURLOPT_REFERER => $GOOGLE_OAUTH2_REFERER
                               , CURLOPT_RETURNTRANSFER => 1    // means output will be a return value from curl_exec() instead of simply echoed
                               , CURLOPT_TIMEOUT => 12          // max seconds to wait
                               , CURLOPT_FOLLOWLOCATION => 0    // don't follow any Location headers, use only the CURLOPT_URL, this is for security
                               , CURLOPT_FAILONERROR => 0       // do not fail verbosely fi the http_code is an error, this is for security
                               , CURLOPT_SSL_VERIFYPEER => 0    // do verify the SSL of CURLOPT_URL, this is for security
                               , CURLOPT_VERBOSE => 0           // don't output verbosely to stderr, this is for security
                         ) );

        $orig_response = curl_exec( $curl );
        $response = json_decode( $orig_response, true );        // convert returned objects into associative arrays
        $token_expires = $now + $response['expires_in'];
        $http_code = curl_getinfo( $curl, CURLINFO_HTTP_CODE );
        curl_close( $curl );

        if ( $response['access_token'] ) {            
            // get options update access token part
            $token = get_option( 'cws_gpp_access_token' );
            $token['access_token'] = $response['access_token'];
            
            update_option("cws_gpp_access_token",$token);                            # save the access token
            update_option("cws_gpp_token_expires",$token_expires);                   # save the epoch when the token expires
            
            if( $this->debug ){ error_log( 'Refresh Access Token...' ); }

            $url = $this->getUrl();
            wp_redirect( "$url" );
            exit;        
            
        } else {
            // echo "refreshOAuth2Token got the following response:<br />";
            // echo $orig_response;
    		// echo "using refreshToken $refreshToken";
        }  
        // TODO: Improve error handling here for various curl error codes etc      
    }
    

    /**
     * Get current url.
     *
     * @since    2.3.0
     */ 
    function getUrl() {
        $url  = ( $_SERVER["HTTPS"] != 'on' ) ? 'http://'.$_SERVER["SERVER_NAME"] :  'https://'.$_SERVER["SERVER_NAME"];
        $url .= ( $_SERVER["SERVER_PORT"] != 80 ) ? ":".$_SERVER["SERVER_PORT"] : "";
        $url .= $_SERVER["REQUEST_URI"];
        return $url;
    }

    
	/**
	 * Get list of Albums for authenticated user.
	 *
	 * @since    2.0.0
	 */     
    public function getAlbumList( $AccessToken, $album_thumb_size, $show_title, $cws_page, $num_image_results, $visibility) {    
        
        if( $this->debug ){ error_log( 'Inside getAlbumList()' ); }

        // Work out pagination variables
        if ( !( isset( $cws_page ) ) ) {
            $cws_page = 1;
        }
        if ( $cws_page > 1 ) {
            $start_index = ( ( $cws_page - 1 ) * $num_image_results ) + 1;
        } else {
            $start_index = 1;
        }            

        $visibility = strtolower( $visibility );

        // https://developers.google.com/accounts/docs/OAuth2WebServer#callinganapi
        $curl = curl_init();
        // https://developers.google.com/picasa-web/docs/2.0/reference#Visibility
        // http://picasaweb.google.com/data/feed/api/user/userID?kind=photo&q=penguin

        // limit results or not
        if( $num_image_results > 0 ) {
            $url = "https://picasaweb.google.com/data/feed/api/user/default?kind=album&thumbsize=" . $album_thumb_size . "c&max-results=" . $num_image_results . "&start-index=" . $start_index . "&access=" . $visibility;
            //$url = "https://picasaweb.google.com/data/feed/api/user/default?kind=album&thumbsize=" . $album_thumb_size . "c&max-results=" . $num_image_results . "&start-index=" . $start_index ;            
            //$url = "https://picasaweb.google.com/data/feed/api/user/default?kind=album&thumbsize=" . $album_thumb_size . "c&max-results=" . $num_image_results . "&start-index=" . $start_index . "&access=all";                  
        } else {
            $url = "https://picasaweb.google.com/data/feed/api/user/default?kind=album&thumbsize=" . $album_thumb_size . "c&access=" . $visibility;
            // $url = "https://picasaweb.google.com/data/feed/api/user/default?kind=album&thumbsize=" . $album_thumb_size . "c";
            //$url = "https://picasaweb.google.com/data/feed/api/user/default?kind=album&thumbsize=" . $album_thumb_size . "c&access=visible";
        }

        if ( isset( $_GET['cws_debug'] ) ) {

            // TODO: create a helper function
            $cws_debug = $_GET[ 'cws_debug' ];// $cws_debug = get_query_var( 'cws_debug' );
            if( $cws_debug == "1" ) { 
                echo "url = $url<br>"; 
                echo "show_title = $show_title<br>";
            }

        }

        curl_setopt_array( $curl, 
                         array( CURLOPT_CUSTOMREQUEST => 'GET'
                               , CURLOPT_URL => $url
                               , CURLOPT_HTTPHEADER => array( 'GData-Version: 2'
                                                             , 'Authorization: Bearer '.$AccessToken['access_token'] )
                               , CURLOPT_REFERER => 'http://wp-picasa-pro.wordpress.dev/wp-admin/options-general.php?page=cws_gpp'
                               , CURLOPT_RETURNTRANSFER => 1 // means output will be a return value from curl_exec() instead of simply echoed
                         ) );
        $response = curl_exec($curl);
        $http_code = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        
        // Return $response to shortcode if http_code is 200
        if( $http_code == 200 ) { return $response; }
        // TODO: Add in some error handling better reporting of http code
        return false;
    }


    /**
     * Get list of Images in a specific Album for authenticated user.
     *
     * @since    2.0.0
     */
    // public function getAlbumImages( $AccessToken, $album_thumb_size, $show_album_ttl, $cws_page, $num_image_results, $cws_album, $imgmax='450' ) {
    public function getAlbumImages( $AccessToken, $album_thumb_size, $show_album_ttl, $cws_page, $num_image_results, $cws_album, $imgmax='800', $theme ) {

        // Crop the image or not, projig wants not cropped...
        if ( $theme != 'projig' ) { $crop = 'c'; } else { $crop = ''; }

        if( $imgmax == 0 || $imgmax == 0 ) { $imgmax = 800; }

        if( $this->debug ){ error_log( 'Inside getAlbumImages()' ); }

        // Work out pagination variables
        if ( !( isset( $cws_page ) ) ) {
            $cws_page = 1;
        }
        if ( $cws_page > 1 ) {
            $start_index = ( ( $cws_page - 1 ) * $num_image_results ) + 1;
        } else {
            $start_index = 1;
        }   

        $curl = curl_init();

        if( $num_image_results > 0 ) {
            // $url = "https://picasaweb.google.com/data/feed/api/user/default/albumid/" . $cws_album . "?thumbsize=" . $album_thumb_size . "c&max-results=" . $num_image_results . "&start-index=" . $start_index . "&imgmax=" . $imgmax;                    
            $url = "https://picasaweb.google.com/data/feed/api/user/default/albumid/" . $cws_album . "?thumbsize=" . $album_thumb_size . $crop . "&max-results=" . $num_image_results . "&start-index=" . $start_index . "&imgmax=" . $imgmax;            
        } else {
            // $url = "https://picasaweb.google.com/data/feed/api/user/default/albumid/" . $cws_album . "?thumbsize=" . $album_thumb_size . "c&imgmax=" . $imgmax;
            $url = "https://picasaweb.google.com/data/feed/api/user/default/albumid/" . $cws_album . "?thumbsize=" . $album_thumb_size . $crop . "&imgmax=" . $imgmax;            
        }

        // TODO: create a helper function
        if( isset( $_GET[ 'cws_debug' ] ) ) {
            $cws_debug = $_GET[ 'cws_debug' ]; // $cws_debug = get_query_var( 'cws_debug' );
        }

//, CURLOPT_REFERER => 'http://wp-picasa-pro.wordpress.dev/wp-admin/options-general.php?page=cws_gpp'
        
        curl_setopt_array( $curl, 
                         array( CURLOPT_CUSTOMREQUEST => 'GET'
                               , CURLOPT_URL => $url
                               , CURLOPT_HTTPHEADER => array( 'GData-Version: 2'
                                                             , 'Authorization: Bearer '.$AccessToken['access_token'] )
                               , CURLOPT_RETURNTRANSFER => 1 // means output will be a return value from curl_exec() instead of simply echoed
                         ) );
        $response = curl_exec( $curl );
        $http_code = curl_getinfo( $curl, CURLINFO_HTTP_CODE );
        curl_close( $curl );

        if( isset( $_GET[ 'cws_debug' ] ) ) {
            if( $cws_debug == "1" ) { 
                echo "url = $url";
                echo "http code: $http_code<br>";
                echo '<pre>';
                print_r($response);
                echo '</pre>'; 
                var_dump($imgmax);
            }
        }

        // Return $response to shortcode if http_code is 200
        if( $http_code == 200 ) { return $response; }
    }


    /*
     *
     * Pagination Helper
     *
     * $num_pages, int
     * $current_page, int
     * $album_id
     *
     * return string
     */     
    public function get_pagination( $total_num_albums, $num_image_results, $cws_page, $album_id=NULL ) {
    
// global $post;

// echo $post->post_name;
    
        if( $this->debug ) error_log( 'Inside: CWS_Google_Picasa_Pro_Admin::get_pagination()' ); 

        // Calcualte how many pages we need, total number of albums / number of images to display per page as set in settings of shortcode
        if( $num_image_results > 0 ){
            $num_pages  = ceil( $total_num_albums / $num_image_results );

            // If ony need one page then do not display pagination
            if ( $num_pages <= 1 ){
                return;
            }


        if( ! isset( $cws_page ) || $cws_page < 1 ){ $cws_page = 1; } // TODO: Do we need this check?

        //$_GET[ 'cws_album_title' ] = '';

        $cws_album_title = '';
        if ( isset( $_GET['cws_album_title'] ) ) {
            $cws_album_title = $_GET[ 'cws_album_title' ];
        }        
        // Create page links
        $html[] = "<div class=\"cws-pagination\"><ul class=\"page-nav\">\n";
        
        $previous = $cws_page - 1;
        $next     = $cws_page + 1;
        
        // Previous link
        if( $previous > 0 ) {

            // if have album id, i.e. display this on the results page
            if( $album_id ) {
                $cws_album_title = stripslashes( $cws_album_title );
                $html[] = "<li><a href=\"?cws_page=$previous&cws_album=$album_id&cws_album_title=$cws_album_title\" id='prev_page'>Previous</a></li>";
            } else {
                $html[] = "<li><a href=\"?cws_page=$previous\" id='prev_page'>Previous</a></li>";                
            }
        }
        
        for( $i=1; $i <= $num_pages; $i++ ) {
        
            $class = "";

            // Add class to current page
            if( $i == $cws_page) {
                $class = " class='selected'";
            }

            $html[] = "<li".$class.">";

            if( $album_id ) {
                $cws_album_title = stripslashes( $cws_album_title );
                $html[] = "<a href=\"?cws_page=$i&cws_album=$album_id&cws_album_title=$cws_album_title\" id='page_".$i."'>".$i."</a></li>\n";
            } else {
                $html[] = "<a href=\"?cws_page=$i\" id='page_".$i."'>".$i."</a></li>\n";
            }
        }
        
        // Next link
        if( $next <= $num_pages ) {

            // if have album id
            if( $album_id ){
                $cws_album_title = stripslashes( $cws_album_title );
                $html[] = "<li><a href=\"?cws_page=$next&cws_album=$album_id&cws_album_title=$cws_album_title\" id='next_page'>Next</a></li>";
            } else {
                $html[] = "<li><a href=\"?cws_page=$next\" id='next_page'>Next</a></li>";
            }
        }
        
        // Display Powered by link if not Pro
        if( !$this->isPro == 1 ){
            // $html[] = "</ul><span>Powered by: <a href=\"http://www.cheshirewebsolutions.com/\">Cheshire Web Solutions</a></span></div>\n";
            $html[] = "</ul><span>Powered by: <a href=\"http://www.cheshirewebsolutions.com/\">Google Photos for WordPress Plugin</a></span></div>\n";            
        } else {
            $html[] = "</ul></div>\n";
        }
        return implode( "\n", $html );
        }
        return;
    }


	/**
	 * Display and fill the form field.
	 *
	 * @since    2.0.0
	 */    
    function setting_input() {
		
		// get option 'oauth2_code' value from the database
        $code = get_option( 'cws_gpp_code' );
        $oauth2_code = $code['oauth2_code'];
        // echo the field
        echo "<input id='oauth2_code' name='cws_gpp_code[oauth2_code]' type='text' value='$oauth2_code' >";
    }
    
    
	/**
	 * Display and fill the form fields for storing defaults.
     *
     * Thumbnail Size in pixels
	 *
	 * @since    2.0.0
	 */    
    function options_thumbnail_size() {

        // get option 'thumb_size' value from the database
        $options = get_option( 'cws_gpp_options' );
        $thumb_size = $options['thumb_size'];

        echo "<input id='thumb_size' name='cws_gpp_options[thumb_size]' type='text' value='$thumb_size' >";
    }    
    
 
    /**
     * Display and fill the form fields for storing defaults.
     *
     * Album Thumbnail Size in pixels
     *
     * @since    2.0.0
     */    
    function options_album_thumbnail_size() {

        // get option 'album_thumb_size' value from the database
        $options = get_option( 'cws_gpp_options' );
        $album_thumb_size = $options['album_thumb_size'];

        echo "<input id='album_thumb_size' name='cws_gpp_options[album_thumb_size]' type='text' value='$album_thumb_size' >";
    }  


    /**
     * Display and fill the form fields for storing defaults.
     *
     * Lightbox Image Size in pixels
     *
     * @since    2.3.0
     */    
    function options_lightbox_image_size() {

        // get option 'lightbox_image_size' value from the database
        $options = get_option( 'cws_gpp_options' );
        $lightbox_image_size = $options['lightbox_image_size'];

        echo "<input id='lightbox_image_size' name='cws_gpp_options[lightbox_image_size]' type='text' value='$lightbox_image_size' >";
    }      


    /**
     * Enable Cache
     *
     * caches feed and stores for 1 hour
     * Pro Only
     *
     * @since    2.3.0
     */    
    function options_enable_cache() {

        // set some defaults...
        $checked = '';

        // get option 'enable_cache' value from the database
        $options = get_option( 'cws_gpp_options' );
        $enable_cache = $options['enable_cache'];

        if($options['enable_cache']) { $checked = ' checked="checked" '; }
        echo "<input ".$checked." id='enable_cache' name='cws_gpp_options[enable_cache]' type='checkbox' /><small>Only check this once you are happy with other settings.</small>";
    }  


    /**
     * Enable Download
     *
     * Exposes download link next to each thumbnail to allow user to access original image file
     * Pro Only
     *
     * @since    2.3.1
     */    
    function options_enable_download() {

        // set some defaults...
        $checked = '';

        // get option 'enable_download' value from the database
        $options = get_option( 'cws_gpp_options' );

        $options['enable_download'] = isset($options['enable_download']) ? $options['enable_download'] : "";

        $enable_cache = $options['enable_download'];

        if($options['enable_download']) { $checked = ' checked="checked" '; }
        echo "<input ".$checked." id='enable_download' name='cws_gpp_options[enable_download]' type='checkbox' /><small>Allow user to download original image file.</small>";
    }  

    /**
     * Display and fill the form fields for storing defaults.
     *
     * Number of images results to display per page
     *
     * @since    2.0.0
     */    
    function options_num_image_results() {

        // get option 'num_image_results' value from the database
        $options = get_option( 'cws_gpp_options' );
        $num_image_results = $options['num_image_results'];

        echo "<input id='num_image_results' name='cws_gpp_options[num_image_results]' type='text' value='$num_image_results' >";
    }       


    /**
     * Display and fill the form fields for storing defaults.
     *
     * Number of albums results to display per page
     *
     * @since    2.0.0
     */    
    function options_num_album_results() {

        // get option 'num_album_results' value from the database
        $options = get_option( 'cws_gpp_options' );
        $num_album_results = $options['num_album_results'];

        echo "<input id='num_album_results' name='cws_gpp_options[num_album_results]' type='text' value='$num_album_results' >";
    } 


    /**
     * Display and fill the form fields for storing defaults.
     *
     * Show Private Albums
     *
     * @since    2.0.0
     */
    
    function options_show_private_albums() {
        $options = get_option('cws_gpp_options'); 
        $options['private_albums'] = isset($options['private_albums']) ? $options['private_albums'] : "";

        // DROP-DOWN-BOX - Name: plugin_options[dropdown1]
        $items = array("All", "Private", "Public", "Visible");
        echo "<select id='cws_gpp_show_private_albums' name='cws_gpp_options[private_albums]'>";
        foreach($items as $item) {
            $selected = ($options['private_albums']==$item) ? 'selected="selected"' : '';
            echo "<option value='$item' $selected>$item</option>";
        }
        echo "</select>";
    }


    /**
     * Display and fill the form fields for storing defaults.
     *
     * Show Album Title
     *
     * @since    2.0.0
     */    
    function options_show_album_title() {

        // set some defaults...
        $checked = '';

        // get option 'show_album_title' value from the database
        $options = get_option( 'cws_gpp_options' );
        $show_album_title = $options['show_album_title'];

        if($options['show_album_title']) { $checked = ' checked="checked" '; }
        echo "<input ".$checked." id='show_album_title' name='cws_gpp_options[show_album_title]' type='checkbox' />";
    }  


    /**
     * Display and fill the form fields for storing defaults.
     *
     * Show Image Title
     *
     * @since    2.0.0
     */    
    function options_show_image_title() {

        // set some defaults...
        $checked = '';

        // get option 'show_image_title' value from the database
        $options = get_option( 'cws_gpp_options' );
        $show_album_title = $options['show_image_title'];

        if($options['show_image_title']) { $checked = ' checked="checked" '; }
        echo "<input ".$checked." id='show_image_title' name='cws_gpp_options[show_image_title]' type='checkbox' />";
    } 


    /**
     * Display and fill the form fields for storing defaults.
     *
     * Show Album Details
     *
     * @since    2.0.0
     */    
    
    function options_show_album_details() {

        // set some defaults...
        $checked = '';

        // get option 'show_album_details' value from the database
        $options = get_option( 'cws_gpp_options' );
        $show_album_details = $options['show_album_details'];

        if($options['show_album_details']) { $checked = ' checked="checked" '; }
        echo "<input ".$checked." id='show_album_details' name='cws_gpp_options[show_album_details]' type='checkbox' />";
    } 
    

    /**
     * Display and fill the form fields for storing defaults.
     *
     * Show Image Details
     *
     * @since    2.0.0
     */    
    function options_show_image_details() {

        // set some defaults...
        $checked = '';

        // get option 'show_album_details' value from the database
        $options = get_option( 'cws_gpp_options' );
        $options['show_image_details'] = isset($options['show_image_details']) ? $options['show_image_details'] : "";
        $show_image_details = $options['show_image_details'];

        if($options['show_image_details']) { $checked = ' checked="checked" '; }
        echo "<input ".$checked." id='show_image_details' name='cws_gpp_options[show_image_details]' type='checkbox' />";
    } 


    /**
     * Display and fill the form fields for storing defaults.
     *
     * Show Album Details
     *
     * @since    2.0.0
     */    
    function options_reset() {

        // set some defaults...
        $checked = '';

         // get option 'show_album_details' value from the database
        $options = get_option( 'cws_gpp_reset' );       
        
        if($options['cws_gpp_reset']) { $checked = ' checked="checked" '; }
        echo "<input ".$checked." id='reset' name='cws_gpp_reset[reset]' type='checkbox' required />";
    } 


	/**
	 * Validate user input (we want text only).
	 *
	 * @since    2.0.0
	 */        
    function validate_options( $input ) {
        
        $valid['oauth2_code'] = esc_attr ( $input['oauth2_code'] );

        return $valid;
    }
    

    /**
     * Validate user input.
     *
     * @since    2.0.0
     */         
    function validate_main_options( $input ) {

        $valid['thumb_size']            = esc_attr( $input['thumb_size'] );
        $valid['album_thumb_size']      = esc_attr( $input['album_thumb_size'] );
        $valid['num_image_results']     = esc_attr( $input['num_image_results'] );
        $valid['num_album_results']     = esc_attr( $input['num_album_results'] );
        $valid['lightbox_image_size']   = esc_attr( $input['lightbox_image_size'] );
        $valid['private_albums']        = esc_attr( $input['private_albums'] );

        // Correct validation of checkboxes
        $valid['show_album_title'] = ( isset( $input['show_album_title'] ) && true == $input['show_album_title'] ? true : false );
        $valid['show_album_details'] = ( isset( $input['show_album_details'] ) && true == $input['show_album_details'] ? true : false );

        $valid['show_image_title'] = ( isset( $input['show_image_title'] ) && true == $input['show_image_title'] ? true : false );
        $valid['enable_cache'] = ( isset( $input['enable_cache'] ) && true == $input['enable_cache'] ? true : false );
        $valid['show_image_details'] = ( isset( $input['show_image_details'] ) && true == $input['show_image_details'] ? true : false );
        $valid['enable_download'] = ( isset( $input['enable_download'] ) && true == $input['enable_download'] ? true : false );

        return $valid;
    } 


    /**
     * Validate user input.
     *
     * @since    2.0.0
     */         
    function validate_reset_options( $input ) {

        // Correct validation of checkboxes
        $valid['reset'] = ( isset( $input['reset'] ) && true == $input['reset'] ? true : false );

        return $valid;
    } 


    // Dispay upgrade notice
    function cws_gpp_admin_installed_notice( $userObj ) {

        // var_dump($userObj->ID);

            // check if already Pro
            if( !$this->isPro ) {

                // Check if user has dismissed notice previously
                // if ( ! get_user_meta( $current_user->getID(), 'cws_gpp_ignore_upgrade' ) ) 
                if ( ! get_user_meta( $userObj->ID, 'cws_gpp_ignore_upgrade' ) ) {
                    global $pagenow;
                    // Only show upgrade notice if on this page
                    if ( $pagenow == 'options-general.php' || $pagenow == 'admin.php' ) {
                    ?>
                    <div id="message" class="updated cws-gpp-message">
                        <div class="squeezer">
                            <h4><?php _e( '<strong>Google Photos Viewer has been installed &#8211; Get the Pro version</strong>', 'cws_gpp_' ); ?></h4>
                            <h4><?php _e( '<strong>GET 20% OFF! &#8211; use discount code WPMEGA20 on checkout</strong>', 'cws_gpp_' ); ?></h4>
                            <p class="submit">
                                <a href="http://www.cheshirewebsolutions.com/?utm_source=cws_gpp_config&utm_medium=button&utm_content=upgrade_notice_message&utm_campaign=cws_gpp_plugin" class="button-primary"><?php _e( 'Visit Site', 'cws_gpp_' ); ?></a>
                                <a href="<?php echo admin_url('admin.php?page=cws_gpp'); ?>" class="button-primary"><?php _e( 'Settings', 'cws_gpp_' ); ?></a>
                                <a href="?cws_gpp_ignore_upgrade=0" class="secondary-button">Hide Notice</a>
                            </p>
                        </div>
                    </div>
                    <?php
                    }                
                } // end check if already dismissed

            } // end isPro check

            // Set installed option
            //update_option( 'cws_gpp_installed', 0);
    }

  
    // If installed display upgrade notice
    function cws_gpp_admin_notices_styles() {
    
        // Installed notices
        if ( get_option( 'cws_gpp_installed' ) == 1 ) {
            // error_log("****** ADDING ACTION ADMIN NOTICES ********");
            //add_action( 'admin_notices', 'cws_gpp_admin_installed_notice' );     
            add_action( 'admin_notices', $this->cws_gpp_admin_installed_notice() );  
        }
    }
        
    // Allow user to dismiss upgrade notice :)
    function cws_gpp_ignore_upgrade( $userObj2 ) {   

        /* If user clicks to ignore the notice, add that to their user meta */
        if ( isset( $_GET['cws_gpp_ignore_upgrade'] ) && '0' == $_GET['cws_gpp_ignore_upgrade'] ) {
            // add_user_meta($current_user->ID, 'cws_gpp_ignore_upgrade', 'true', true);
            add_user_meta($userObj2->ID, 'cws_gpp_ignore_upgrade', 'true', true);

            // Redirect to plugin settings page
            wp_redirect( admin_url( 'admin.php?page=cws_gpp' ) );
        }
    }   

//

}


class WP_PM_User extends WP_User {

    function getID() {
        return $this->ID;
    }

}


class WP_PM {

  protected $user;

  function __construct ( WP_PM_User $user = NULL) {
    if ( ! is_null( $user ) && $user->exists() ) $this->user = $user;
  }

  function getUser() {
    return $this->user;
  }

}


/*
    For explanation and usage, see:
    
    http://www.jongales.com/blog/2009/02/18/simple-file-based-php-cache-class/
*/  
class JG_Cache {

    function __construct($dir)
    {
        $this->dir = $dir;
        // error_log("JG CACHE: dir: $dir");
    }

    private function _name($key)
    {
        return sprintf("%s/%s", $this->dir, sha1($key));
    }

    public function get($key, $expiration = 3600)
    {

        if ( !is_dir($this->dir) OR !is_writable($this->dir))
        {
            return FALSE;
        }

        $cache_path = $this->_name($key);

        if (!@file_exists($cache_path))
        {
            return FALSE;
        }

        if (filemtime($cache_path) < (time() - $expiration))
        {
            $this->clear($key);
            return FALSE;
        }

        if (!$fp = @fopen($cache_path, 'rb'))
        {
            return FALSE;
        }

        flock($fp, LOCK_SH);

        $cache = '';

        if (filesize($cache_path) > 0)
        {
            $cache = unserialize(fread($fp, filesize($cache_path)));
        }
        else
        {
            $cache = NULL;
        }

        flock($fp, LOCK_UN);
        fclose($fp);

        return $cache;
    }

    public function set($key, $data)
    {

        if ( !is_dir($this->dir) OR !is_writable($this->dir))
        {
            return FALSE;
        }

        $cache_path = $this->_name($key);

        if ( ! $fp = fopen($cache_path, 'wb'))
        {
            return FALSE;
        }

        if (flock($fp, LOCK_EX))
        {
            fwrite($fp, serialize($data));
            flock($fp, LOCK_UN);
        }
        else
        {
            return FALSE;
        }
        fclose($fp);
        @chmod($cache_path, 0777);
        return TRUE;
    }

    public function clear($key)
    {
        $cache_path = $this->_name($key);

        if (file_exists($cache_path))
        {
            unlink($cache_path);
            return TRUE;
        }

        return FALSE;
    }
}

