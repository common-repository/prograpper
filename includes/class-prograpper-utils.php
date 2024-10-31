<?php

/**
 * Register all actions and filters for the plugin
 *
 * @link       http://prograpper.com
 * @since      1.0.0
 *
 * @package    Prograpper
 * @subpackage Prograpper/includes
 */

/**
 * Register all actions and filters for the plugin.
 *
 * Maintain a list of all hooks that are registered throughout
 * the plugin, and register them with the WordPress API. Call the
 * run function to execute the list of actions and filters.
 *
 * @package    Prograpper
 * @subpackage Prograpper/includes
 * @author     Prograpper Team <hello@prograpper.com>
 */
class Prograpper_Utils {

	/**
	 * The array of actions registered with WordPress.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      array    $actions    The actions registered with WordPress to fire when the plugin loads.
	 */
	/*protected $actions;

	/**
	 * Initialize the collections used to maintain the actions and filters.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		/*$this->actions = array();
		$this->filters = array();*/

	}

	/**
	 * Add a new action to the collection to be registered with WordPress.
	 *
	 * @since    1.0.0
	 * @param      string               $hook             The name of the WordPress action that is being registered.
	 * @param      object               $component        A reference to the instance of the object on which the action is defined.
	 * @param      string               $callback         The name of the function definition on the $component.
	 * @param      int      Optional    $priority         The priority at which the function should be fired.
	 * @param      int      Optional    $accepted_args    The number of arguments that should be passed to the $callback.
	 */
	function checkApiAuth( $result ){
		return true;

	}


}
