<?php
/**
 * Sklik-controller php
 *
 * @package FitRazDva Theme
 */

if ( ! function_exists( 'fitrazdva_sklik' ) ) :

/**
 * Theme sklik manager
 */
function fitrazdva_sklik() {
	if ( defined( 'WP_DEVELOP' ) && WP_DEVELOP ) {
		echo '<!-- Sklik only on poduction -->';
		return;
	}

	get_template_part( 'parts/sklik' );

	return;
}

add_action( 'foundationpress_after_body', 'fitrazdva_sklik' );
endif;
