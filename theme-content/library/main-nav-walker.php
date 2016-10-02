<?php
/**
 * Customize the output of menus for Foundation top bar
 */
if ( ! class_exists( 'FitrazdvaTheme_main_nav_walker' ) ) :
class FitrazdvaTheme_main_nav_walker extends Walker_Nav_Menu {

		function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {
			$element->has_children = ! empty( $children_elements[ $element->ID ] );
			$element->classes[] = ( $element->current || $element->current_item_ancestor ) ? 'active' : '';
			$element->classes[] = ( $element->has_children && 1 !== $max_depth ) ? 'has-dropdown' : '';

			parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
			}

		function start_el( &$output, $item, $depth = 0, $args = array(), $current_object_id = 0 ) {
			$item_html = '';
			parent::start_el( $item_html, $item, $depth, $args );

			$output .= $item_html;
			}

		function start_lvl( &$output, $depth = 0, $args = array() ) {
			$output .= "\n<ul class=\"nav nav-dropdown\">\n";
			}

		public function end_el( &$output, $item, $depth = 0, $args = array() ) {
			parent::end_el( $output, $item, $depth, $args );
			}

}
endif;
