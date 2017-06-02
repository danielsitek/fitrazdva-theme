<?php
/**
 * Customize the output of menus for Foundation top bar
 *
 * @package FitRazDva Theme
 */

if ( ! class_exists( 'FitrazdvaTheme_main_nav_walker' ) ) :
class FitrazdvaTheme_main_nav_walker extends Walker_Nav_Menu {

		/**
		 * Display_element
		 *
		 * @param $element                  Element.
		 * @param $children_elements        Children elements.
		 * @param $max_depth                Max depth.
		 * @param int                                        $depth  Depth.
		 * @param $args                     Arguments.
		 * @param $output                   Output.
		 */
		function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {
			$element->has_children = ! empty( $children_elements[ $element->ID ] );
			$element->classes[] = ( $element->current || $element->current_item_ancestor ) ? 'active' : '';
			$element->classes[] = ( $element->has_children && 1 !== $max_depth ) ? 'has-dropdown' : '';

			parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
			}

		/**
		 * Start_el
		 *
		 * @param $output                       Output.
		 * @param $object                       Object.
		 * @param int                                 $depth                 Depth.
		 * @param array                               $args                  Arguments.
		 * @param int                                 $current_object_id     Object ID.
		 */
		function start_el( &$output, $item, $depth = 0, $args = array(), $current_object_id = 0 ) {
			$item_html = '';
			parent::start_el( $item_html, $item, $depth, $args );

			$output .= $item_html;
			}

		/**
		 * Start_lvl
		 *
		 * @param $output           Output.
		 * @param int                     $depth     Depth.
		 * @param array                   $args      Arguments.
		 */
		function start_lvl( &$output, $depth = 0, $args = array() ) {
			$output .= "\n<ul class=\"nav nav-dropdown\">\n";
			}

		/**
		 * End_el
		 *
		 * @param $output           Output.
		 * @param $item             Item.
		 * @param int                     $depth     Depth.
		 * @param array                   $args      Arguments.
		 */
		public function end_el( &$output, $item, $depth = 0, $args = array() ) {
			parent::end_el( $output, $item, $depth, $args );
			}

}
endif;
