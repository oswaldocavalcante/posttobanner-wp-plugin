<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://oswaldocavalcante.com
 * @since      1.0.0
 *
 * @package    Posttobanner
 * @subpackage Posttobanner/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Posttobanner
 * @subpackage Posttobanner/admin
 * @author     Oswaldo Cavalcante <contato@oswaldocavalcante.com>
 */
class Posttobanner_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;


	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Posttobanner_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Posttobanner_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/posttobanner-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Posttobanner_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Posttobanner_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/posttobanner-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function ptb_admin_menu() {

		add_submenu_page(
			'options-general.php',
			'Post to Banner Settings',
			'Post to Banner',
			'manage_options',
			'posttobanner',
			array( $this, 'ptb_admin_page'),
		);
	
	}

	public function ptb_admin_register_settings() {
		
		register_setting( 'ptb_settings', 'ptb_blog_url' );
		register_setting( 'ptb_settings', 'ptb_image_id' );
		register_setting( 'ptb_settings', 'ptb_category' );
		register_setting( 'ptb_settings', 'ptb_footer_title' );

	}

	public function ptb_admin_page() {

		require_once 'partials/posttobanner-admin-display.php';

	}

	public function ptb_meta_box() {
		
		require_once 'class-posttobanner-metabox.php';
		new ptbMetaBox();

	}

}
