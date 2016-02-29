<?php

if ( ! function_exists( 'foundationpress_sidebar_widgets' ) ) :

function foundationpress_sidebar_widgets() {

	register_sidebar(array(
	  'id' => 'sidebar-widgets',
	  'name' => __( 'Sidebar widgets', 'foundationpress' ),
	  'description' => __( 'Drag widgets to this sidebar container.', 'foundationpress' ),
	  'before_widget' => '<article id="%1$s" class="row widget %2$s"><div class="small-12 columns">',
	  'after_widget' => '</div></article>',
	  'before_title' => '<h6>',
	  'after_title' => '</h6>',
	));

	register_sidebar(array(
	  'id' => 'footer-widgets-left',
	  'name' => __( 'Footer widgets left', 'foundationpress' ),
	  'description' => __( 'Drag widgets to this footer container', 'foundationpress' ),
	  'before_widget' => '<article id="%1$s" class="widget %2$s">',
	  'after_widget' => '</article>',
	  'before_title' => '<header class="footer-header"><strong class="h4">',
	  'after_title' => '</strong></header>',
	));

	register_sidebar(array(
	  'id' => 'footer-widgets-right',
	  'name' => __( 'Footer widgets right', 'foundationpress' ),
	  'description' => __( 'Drag widgets to this footer container', 'foundationpress' ),
	  'before_widget' => '<article id="%1$s" class="widget %2$s">',
	  'after_widget' => '</article>',
	  'before_title' => '<header class="footer-header"><strong class="h4">',
	  'after_title' => '</strong></header>',
	));

	register_sidebar(array(
	  'id' => 'scripts_body_end',
	  'name' => __( 'Body closing area', 'foundationpress' ),
	  'description' => __( '3rd party scripts area on closing <body> tag', 'foundationpress' ),
	  'before_widget' => '',
	  'after_widget' => '',
	  'before_title' => '',
	  'after_title' => '',
	));
}

add_action( 'widgets_init', 'foundationpress_sidebar_widgets' );

endif;
