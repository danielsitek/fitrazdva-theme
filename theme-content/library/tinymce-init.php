<?php

if ( ! function_exists( 'fitrazdva_theme_tinymce_init' ) ) :
// Prevent TinyMCE from stripping out schema.org metadata
function fitrazdva_theme_tinymce_init( $options )
{
    /**
     *   Edit extended_valid_elements as needed. For syntax, see
     *   http://www.tinymce.com/wiki.php/Configuration:valid_elements
     *
     *   NOTE: Adding an element to extended_valid_elements will cause TinyMCE to ignore
     *   default attributes for that element.
     *   Eg. a[title] would remove href unless included in new rule: a[title|href]
     */

    $extended_valid_elements = '@[id|class|style|title|itemscope|itemtype|itemprop|datetime|rel|content],div,dl,dt,dd,ul,ol,li,span,hr,meta,link,p,a[rev|charset|href|lang|tabindex|accesskey|type|name|href|target|title|class|onfocus|onblur]';

    // http://stackoverflow.com/a/23578423/4617589
    if ( ! isset( $options['extended_valid_elements'] ) ) {
        $options['extended_valid_elements'] = $extended_valid_elements;
    } else {
        $options['extended_valid_elements'] .= ',' . $extended_valid_elements;
    }

    if ( ! isset( $options['valid_children'] ) ) {
        $options['valid_children'] = '+body[style],meta,link,p,dl,dt,dd';
    } else {
        $options['valid_children'] .= ',+body[style],meta,link,p,dl,dt,dd';
    }

    if ( ! isset( $options['custom_elements'] ) ) {
        $options['custom_elements'] = 'meta,link';
    } else {
        $options['custom_elements'] .= ',meta,link';
    }

    $options['content_css'] = get_template_directory_uri() . "/dist/styles/editor-style.min.css";

    return $options;
}

add_filter('tiny_mce_before_init', 'fitrazdva_theme_tinymce_init' );
endif;
