<?php
/**
 * Facebook-sdk-controller php
 *
 * @package FitRazDva Theme
 */

if ( ! function_exists( 'fitrazdva_theme_facebook_sdk' ) ) :

	/**
	 * Fitrazdva_theme_facebook_sdk
	 */
	function fitrazdva_theme_facebook_sdk() {
		if ( defined( 'WP_DEVELOP' ) && WP_DEVELOP ) {
			echo '<!-- Facebook SDK only in production -->';
			// return;
			}

		get_template_part( 'parts/facebook-sdk' );

		return;
	}


add_action( 'foundationpress_after_body', 'fitrazdva_theme_facebook_sdk' );
endif;
