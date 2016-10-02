<?php

namespace FitRazDva;

use DOMDocument,
	FitRazDva;

/**
 * WPMenuParser
 *
 * Parse WP generated menu to nicely organized multidimensional array
 *
 * @author      Daniel Sitek
 */
class WPMenuParser {


	private $generated_wp_menu;
	private $menu_identificator;

	/**
	 * Constructor
	 */
	public function __construct() {
		// code...
	}


	/**
	 * parse()
	 *
	 * Generate WP default menu into buffer and same output to string.
	 *
	 * @param string $menu_identificator    Desired menu. Accepts (matching in order) id, slug or name
	 */
	public function parse( $menu_identificator = '' ) {
		$this->parse_wp_menu_to_string( $menu_identificator );
		return $this->parse_menu_string_to_array();
	}


	/**
	 * parse_wp_menu_to_string()
	 *
	 * Vygeneruje WP menu podle identifikátoru do bufferu, uloží do proměnné a pak buffer vyprázdní.
	 *
	 * @link    http://php.net/ob_start         ob_start — Turn on output buffering
	 * @param   string $menu_identificator      ID, slug nebo název pro získání menu
	 */
	private function parse_wp_menu_to_string( $menu_identificator = '' ) {
		$this->menu_identificator = $menu_identificator;

		ob_start();

		wp_nav_menu( array(
			'container' => 'div',                      // remove nav container
			'container_class' => '',                   // class of container
			'menu' => $this->menu_identificator,       // menu name
			'menu_class' => '',                        // adding custom nav class
			'theme_location' => '',                    // where it's located in the theme
			'before' => '',                            // before each link <a>
			'after' => '',                             // after each link </a>
			'link_before' => '',                       // before each link text
			'link_after' => '',                        // after each link text
			'depth' => 5,                              // limit the depth of the nav
			'fallback_cb' => false,// fallback function (see below)
		) );

		$this->generated_wp_menu = ob_get_contents();
		ob_end_clean();
	}


	/**
	 * parse_menu_string_to_array()
	 *
	 * Parse menu from html string
	 *
	 * @return  array    Array with menu items
	 */
	private function parse_menu_string_to_array() {
		$items = array();

		$parsedDOM = $this->parse_dom_to_array( $this->generated_wp_menu );
		$menu_details = $this->get_menu_details();

		$items['name']          = ( $menu_details ) ? $menu_details->name : 'name';
		$items['slug']          = ( $menu_details ) ? $menu_details->slug : 'slug';
		$items['id']            = ( $menu_details ) ? $menu_details->term_id : 'id';
		$items['description']   = ( $menu_details ) ? $menu_details->description : 'description';

		$items['items'] = $this->parse_list_items( $parsedDOM['ul']['li'] );

		return $items;
	}


	private function get_menu_details() {
		$menus = wp_get_nav_menus( array( 'slug' => $this->menu_identificator ) );

		if ( ! $menus ) {
			return;
		}

		$menus = $menus[0];

		return $menus;
	}


	/**
	 * parse_list_items()
	 *
	 * Metoda projde napříč všemi itemy v poli a poskládá z nich zpátky jednotlivé objekty menu.
	 * Pokud v poli podká další úroveň, zavolá pro dané subpole sama sebe a zachová tak původní strukturu.
	 *
	 * @param   array $list_item    XML Dom parsed to array
	 * @return  array               Array of menu objects
	 */
	private function parse_list_items( $list_item = array() ) {
		$items = array();

		/**
		 * Zjistíme, jestli je v poli více objektů nebo jen jeden
		 * Pokud jen jeden, zanoříme ho o úroveń hloub abychom nad
		 * ním mohli iterovat stejným způsobem jako u ostatnich.
		 */
		if ( isset( $list_item['@attributes'] ) ) {

			$bumped_item = array();
			$bumped_item[0] = $list_item;
			$list_item = $bumped_item;
		}

		foreach ( $list_item as $node ) {

			if ( isset( $node['@attributes'] ) ) {

				$attr = $this->get_link_object( $node['@attributes']['id'] );

				if ( isset( $node['ul'] ) ) {

					$attr['items'][] = $this->parse_list_items( $node['ul']['li'] );
				}

				$items[] = $attr;
			}
		}

		return $items;
	}


	/**
	 * get_link_object()
	 *
	 * Podle ID získá DOM element z uloženého stringu `$this->generated_wp_menu` a z něj vytáhne `title`, `href` a `label`,
	 * které složí do objektu představující jednu položku v menu.
	 *
	 * @param   string $el_id   ID identifikator
	 * @return  array           Return menu item array [ ['title' => '', 'href' => '', 'label' => ''] ]
	 */
	private function get_link_object( $el_id = '' ) {
		$dom = new DOMDocument();
		$items = array();

		$dom->loadHTML( mb_convert_encoding( $this->generated_wp_menu, 'HTML-ENTITIES', 'UTF-8' ) );

		/**
		 * Vybereme vždy první element `a`. Tím vyřadíme všechny další `a` v případné podúrovní.
		 */
		$el_node = $dom->getElementById( $el_id )->getElementsByTagName( 'a' )->item( 0 );

		$items['title'] = $el_node->getAttribute( 'title' );
		$items['href'] = $el_node->getAttribute( 'href' );
		$items['label'] = strip_tags( $dom->saveHTML( $el_node ) );

		/**
		 * return array(
		 *     'title' => '',
		 *     'href' => '',
		 *     'label' => '',
		 * )
		 */
		return $items;
	}


	/**
	 * parse_dom_to_array()
	 *
	 * Rozparsuje string s html do pole jednotlivých itemů podle xml
	 *
	 * @uses simplexml_load_string()
	 * @uses json_encode()
	 * @uses json_decode()
	 *
	 * @param   string $DOM             DOM uložený ve stringu
	 * @return  array                   Rozparosvaný DOM strom ze stringu do multidienzional array
	 */
	private function parse_dom_to_array( $DOM = '' ) {
		$parsedDOMxml = simplexml_load_string( $DOM );
		$parsedDOMjson = json_encode( $parsedDOMxml );
		$parsedDOM = json_decode( $parsedDOMjson, true );

		return $parsedDOM;
	}

}
