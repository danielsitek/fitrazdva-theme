<?php

// http://fullrefresh.com/2013/08/02/getting-a-wp-post-excerpt-outside-the-loop-updated/
function get_excerpt_by_id( $post_id, $max_word_count = 35 ) {
	$the_post = get_post( $post_id ); // Gets post ID
	$the_excerpt = $the_post->post_content; // Gets post_excerpt to be used as a basis for the excerpt
	$excerpt_length = $max_word_count; // Sets excerpt length by word count
	$the_excerpt = strip_tags( strip_shortcodes( $the_excerpt ) ); // Strips tags and images
	$the_excerpt = str_replace( array( "\r", "\n" ), ' ', $the_excerpt ); // Strips new lines
	$the_excerpt = trim( preg_replace( '/\s{2,}/', ' ', $the_excerpt ) ); // Trim whitespace
	$words = explode( ' ', $the_excerpt, $excerpt_length + 1 );

	if ( count( $words ) > $excerpt_length ) {
		array_pop( $words );
		array_push( $words, '&hellip;' );
		$the_excerpt = implode( ' ', $words );
	}

	$the_excerpt = trim( $the_excerpt );

	return $the_excerpt;
}
