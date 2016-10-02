<?php

namespace FitRazDva;

use FitRazDva;

/**
 * Set Page Submenu
 * Add custom meta bog to page where editors can choose if he want to add menu.
 *
 * @author      Daniel Sitek
 */
class SetPageSubmenu {


	private $post_id;
	private $menu_slug;
	private $generated_menu;
	private $generated_menu_dom;
	private $menu_parser;

	public $has_menu = false;


	/**
	 * Constructor
	 *
	 * @param string $post_id   Get post id
	 */
	public function __construct( $post_id ) {

		$menu_slug = get_post_meta( $post_id, '_set_page_submenu', true );

		if ( strlen( $menu_slug ) > 0 && $menu_slug != '0' ) {

			$this->has_menu = true;
			$this->post_id = $post_id;
			$this->menu_slug = $menu_slug;

			$this->init();
		}
	}


	/**
	 * Init
	 */
	private function init() {

		if ( $this->has_menu ) {

			$this->menu_parser = new WPMenuParser();
			$this->generated_menu = $this->menu_parser->parse( $this->menu_slug );
			$this->generated_menu_dom = $this->get_menu_template( $this->generated_menu );
		}
	}


	/**
	 * Get menu
	 *
	 * Render custom set menu for page
	 */
	public function get_menu() {

		if ( $this->has_menu ) {

			echo $this->generated_menu_dom;
		}
	}

	/**
	 * Get menu template
	 *
	 * @param  array  $menu_object [description]
	 * @return [string]            [description]
	 */
	private function get_menu_template( $menu_object = array() ) {

		$templated_menu;
		$menu = $menu_object;
		$active_url = (isset( $_SERVER['HTTPS'] ) ? 'https' : 'http') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		ob_start();
		require_once( __DIR__ . '/view/template-page-custom-menu.php' );
		$templated_menu = ob_get_contents();
		ob_end_clean();

		return $templated_menu;

	}

}
