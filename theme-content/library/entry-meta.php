<?php
/**
 * Entry-meta php
 *
 * @package FitRazDva Theme
 */

if ( ! function_exists( 'foundationpress_entry_meta' ) ) :

	function foundationpress_entry_meta() {
		echo '<time class="updated" datetime="' . get_the_time( 'c' ) . '">' . sprintf( __( 'Posted on %1$s at %1$s.', 'foundationpress' ), get_the_date(), get_the_time() ) . '</time>';
		echo '<p class="byline author">' . __( 'Written by', 'foundationpress' ) . ' <a href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '" rel="author" class="fn">' . get_the_author() . '</a></p>';
	}

endif;
