<?php

if ( ! function_exists( 'fitrazdva_theme_google_tag_manager' ) ) :

/**
 *
 */
function fitrazdva_theme_google_tag_manager()
{
    if ( defined( 'WP_DEVELOP' ) && WP_DEVELOP ) {
        echo "<!-- Google Tag Manager only on poduction -->";
        return;
    }

    get_template_part( 'parts/google-tag-manager' );

    return;
}


add_action('foundationpress_after_body', 'fitrazdva_theme_google_tag_manager');
endif;
