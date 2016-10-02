<?php
/*
Author: Daniel Sitek
URL: http://danielsitek.cz
*/

if ( ! defined( 'WP_DEVELOP' ) ) {
	define( 'WP_DEVELOP', false );
}

require __DIR__ . '/library/class-page-custom-menu-admin.php';
require __DIR__ . '/library/class-wp-menu-parser.php';
require __DIR__ . '/library/class-custom-menus.php';


require_once( 'library/function-get-excerpt-by-id.php' );

// Various clean up functions
require_once( 'library/cleanup.php' );

// Required for Foundation to work properly
require_once( 'library/foundation.php' );

// Register all navigation menus
require_once( 'library/navigation.php' );

// Add menu walkers
require_once( 'library/main-nav-walker.php' );
require_once( 'library/menu-walker.php' );
require_once( 'library/offcanvas-walker.php' );

// Create widget areas in sidebar and footer
require_once( 'library/widget-areas.php' );

// Return entry meta information for posts
require_once( 'library/entry-meta.php' );

// Enqueue scripts
require_once( 'library/enqueue-scripts.php' );

// Add theme support
require_once( 'library/theme-support.php' );

// Add Header image
require_once( 'library/custom-header.php' );

// Customized gallery
require_once( 'library/custom-gallery.php' );

// Extending TinyMCE editor
require_once( 'library/tinymce-init.php' );

// Insert Google Tag Manager
require_once( 'library/google-tag-managager-controller.php' );

// Insert Facebook SDK
require_once( 'library/facebook-sdk-controller.php' );

/**
 * Init for WP Admin section
 */

use FitRazDva\SetPageCustomMenuAdmin;

$set_page_custom_menu_admin = new SetPageCustomMenuAdmin();
