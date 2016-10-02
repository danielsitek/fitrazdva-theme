<?php

/**
 * Register Menus
 * http://codex.wordpress.org/Function_Reference/register_nav_menus#Examples
 */
register_nav_menus(array(
	'main-nav-bar' => 'Main Nav',
	'mobile-off-canvas' => 'Mobile',
));


/**
 * Main menu
 */
if ( ! function_exists( 'fitrazdvatheme_main_nav_bar' ) ) {
	function fitrazdvatheme_main_nav_bar() {
	    wp_nav_menu(array(
	        'container' => false,                           // remove nav container
	        'container_class' => '',                        // class of container
	        'menu' => '',                                   // menu name
	        'menu_class' => 'nav nav-main',           		// adding custom nav class
	        'theme_location' => 'main-nav-bar',             // where it's located in the theme
	        'before' => '',                                 // before each link <a>
	        'after' => '',                                  // after each link </a>
	        'link_before' => '',                            // before each link text
	        'link_after' => '',                             // after each link text
	        'depth' => 4,                                   // limit the depth of the nav
	        'fallback_cb' => false,                         // fallback function (see below)
	        'walker' => new FitrazdvaTheme_main_nav_walker(),
	    ));
	}
}

/**
 * Mobile off-canvas
 */
if ( ! function_exists( 'foundationpress_mobile_off_canvas' ) ) {
	function foundationpress_mobile_off_canvas() {
	    wp_nav_menu(array(
	        'container' => false,                           // remove nav container
	        'container_class' => '',                        // class of container
	        'menu' => '',                                   // menu name
	        'menu_class' => 'off-canvas-list',              // adding custom nav class
	        'theme_location' => 'mobile-off-canvas',        // where it's located in the theme
	        'before' => '',                                 // before each link <a>
	        'after' => '',                                  // after each link </a>
	        'link_before' => '',                            // before each link text
	        'link_after' => '',                             // after each link text
	        'depth' => 5,                                   // limit the depth of the nav
	        'fallback_cb' => false,                         // fallback function (see below)
	        'walker' => new Foundationpress_Offcanvas_Walker(),
	    ));
	}
}

/**
 * Add support for buttons in the top-bar menu:
 * 1) In WordPress admin, go to Apperance -> Menus.
 * 2) Click 'Screen Options' from the top panel and enable 'CSS CLasses' and 'Link Relationship (XFN)'
 * 3) On your menu item, type 'has-form' in the CSS-classes field. Type 'button' in the XFN field
 * 4) Save Menu. Your menu item will now appear as a button in your top-menu
*/
if ( ! function_exists( 'foundationpress_add_menuclass' ) ) {
	function foundationpress_add_menuclass( $ulclass ) {
	    $find = array( '/<a rel="button"/', '/<a title=".*?" rel="button"/' );
	    $replace = array( '<a rel="button" class="button"', '<a rel="button" class="button"' );

	    return preg_replace( $find, $replace, $ulclass, 1 );
	}
	add_filter( 'wp_nav_menu','foundationpress_add_menuclass' );
}


/**
 * Prida classy `first` a `last` itemum v menu
 */
function custom_first_and_last_menu_class( $items ) {
	$items[1]->classes[] = 'first'; // add first class

	$cnt = count( $items );
	while ( $items[ $cnt-- ]->post_parent != 0 ) {
// find last li item
}	$items[ $cnt + 1 ]->classes[] = 'last'; // last item class
	return $items;
}
add_filter( 'wp_nav_menu_objects', 'custom_first_and_last_menu_class' ); // filter to iterate each menu

