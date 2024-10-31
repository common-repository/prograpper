<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://prograpper.com
 * @since      1.0.0
 *
 * @package    Prograpper
 * @subpackage Prograpper/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Prograpper
 * @subpackage Prograpper/admin
 * @author     Prograpper Team <hello@prograpper.com>
 */
class Prograpper_Admin {

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
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/prograpper-admin-display.php';
		add_action('admin_menu', array( $this, 'prograpper_admin_menu'));
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
		 * defined in Prograpper_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Prograpper_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/prograpper-admin.css', array(), $this->version, 'all' );

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
		 * defined in Prograpper_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Prograpper_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/prograpper-admin.js', array( 'jquery' ), $this->version, false );

	}
	public function prograpper_admin_menu()
	{
		add_menu_page(__('prograpper','prograpper'), __('Prograpper','prograpper'), 'administrator', basename(__FILE__), 'prograpper_admin_function',plugins_url('prograpper/admin/images/prograpper-wordpress.png') );//
	}
}
