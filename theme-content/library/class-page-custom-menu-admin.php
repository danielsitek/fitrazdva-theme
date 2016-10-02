<?php

namespace FitRazDva;

use FitRazDva;

/**
 * Set Page Submenu
 * Add custom meta box to admin page where editors can choose if he want to add menu.
 *
 * @author      Daniel Sitek
 */
class SetPageCustomMenuAdmin {


	const POST_TYPE             = 'page';
	const TRANSLATION_DOMAIN    = 'fitrazdva_set_page_submenu';

	private $post_id;


	/**
	 * Constructor
	 *
	 * @uses add_action     Hooks a function on to a specific action.
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_action/ add_action
	 */
	public function __construct() {

		add_action( 'add_meta_boxes', array( $this, 'register_meta_boxes' ) );
		add_action( 'save_post', array( $this, 'save_meta_boxes' ) );

	}

	/**
	 * Registers a Meta Box on our Contact Custom Post Type, called 'Contact Details'
	 * reference:
	 * https://developer.wordpress.org/reference/functions/add_meta_box/
	 *
	 * @uses add_meta_box    Add a meta box to an edit form.
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_meta_box/ add_meta_box
	 */
	function register_meta_boxes() {

		add_meta_box( 'pase-custom-submenu', 'Set Page Submenu', array( $this, 'output_meta_box' ), self::POST_TYPE, 'side', 'low' );

	}


	/**
	 * Output a Contact Details meta box
	 *
	 * @uses get_post_meta description
	 * @param WP_Post $post WordPress Post object
	 */
	function output_meta_box( $post ) {

		$menus = wp_get_nav_menus();
		$saved_menu = get_post_meta( $post->ID, '_set_page_submenu', true );

		// Add a nonce field so we can check for it later.
		// https://developer.wordpress.org/reference/functions/wp_nonce_field/
		wp_nonce_field( 'save_page_menu', 'page_menu_nonce' );

		require_once( __DIR__ . '/view/meta-box-custom-menus.php' );

	}


	/**
	 * Saves the meta box field data
	 *
	 * @uses wp_verify_nonce description
	 * @uses current_user_can description
	 * @uses sanitize_text_field description
	 * @uses update_post_meta description
	 * @param string $post_id   Get post id
	 */
	function save_meta_boxes( $post_id ) {

		/* Check if our nonce is set. */
		if ( ! isset( $_POST['page_menu_nonce'] ) ) {
			return $post_id;
		}

		/* Verify that the nonce is valid. */
		if ( ! wp_verify_nonce( $_POST['page_menu_nonce'], 'save_page_menu' ) ) {
			return $post_id;
		}

		/* Check this is the Contact Custom Post Type */
		if ( self::POST_TYPE != $_POST['post_type'] ) {
			return $post_id;
		}

		/* Check the logged in user has permission to edit this post */
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
		}

		/* OK to save meta data */
		$validity_from = sanitize_text_field( $_POST['set_page_submenu'] );
		update_post_meta( $post_id, '_set_page_submenu', $validity_from );

		return $post_id;
	}

}
