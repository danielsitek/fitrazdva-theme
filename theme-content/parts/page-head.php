
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="content-type" content="text/html;">
<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, minimum-scale=1.0">
<meta name="msvalidate.01" content="E8E082613BE024D283123691F4EED881">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<!-- <meta name="author" content="Daniel Sitek | danielsitek.cz | @danielsitek"> -->
<meta name="author" content="Studio Fit Raz Dva">
<meta name="copyright" content="<?php echo date( 'Y' );?>, I&amp;K FIT RAZ DVA s.r.o. | fitrazdva.cz">
<title><?php
if ( is_category() ) {
	echo 'Category Archive for &quot;';
single_cat_title();
echo '&quot; | ';
bloginfo( 'name' );
} elseif ( is_tag() ) {
	echo 'Tag Archive for &quot;';
single_tag_title();
echo '&quot; | ';
bloginfo( 'name' );
} elseif ( is_archive() ) {
	wp_title( '' );
echo ' Archive | ';
bloginfo( 'name' );
} elseif ( is_search() ) {
	echo 'Search for &quot;' . esc_html( $s ) . '&quot; | ';
bloginfo( 'name' );
} elseif ( is_home() || is_front_page() ) {
	bloginfo( 'name' );
echo ' | ';
bloginfo( 'description' );
} elseif ( is_404() ) {
	echo 'Error 404 Not Found | ';
bloginfo( 'name' );
} elseif ( is_single() ) {
	wp_title( '' );
} else {
	echo wp_title( ' | ', 'false', 'right' );
bloginfo( 'name' );
}
?></title>
<?php

$thumb_id = get_post_thumbnail_id();
$thumb_url_array = wp_get_attachment_image_src( $thumb_id, 'large', true );
$thumb_url = $thumb_url_array[0];

$__meta = array();

$__meta['global'] = array(
	'image'          => ($thumb_url) ? $thumb_url : get_template_directory_uri() . '/dist/images/content/sharing-studio-fit-raz-dva.jpg',
	'description'    => get_excerpt_by_id( get_the_ID() ),
);
// ###############################################
// # Open Graph data #
$__meta['facebook'] = array(
	'og:type'           => 'website',
	'og:title'          => get_the_title(),
	'og:url'            => get_permalink(),
	'og:locale'         => 'cs_CZ',
	'og:description'    => get_excerpt_by_id( get_the_ID() ),
	'og:image'          => $__meta['global']['image'],
	'og:image:type'     => 'image/jpeg',
	'og:image:width'    => '620',
	'og:image:height'   => '350',
	'og:site_name'      => get_bloginfo( 'name' ),
	// 'fb:app_id'         => '1413736542',
	// 'fb:admins'         => '125723587609346',
	'fb:app_id'         => '125723587609346',
);

// ###############################################
// # Twitter Card data #
$__meta['twitter'] = array(
	'twitter:card' => 'summary_large_image',
	'twitter:domain' => home_url(),
	// 'twitter:site' =>  '...',
	'twitter:title' => get_the_title(),
	// 'twitter:description' =>  '...',
	// 'twitter:creator' =>  '...',
	// 'twitter:creator:id' =>  '...',
	'twitter:image:src' => $__meta['global']['image'],
	'twitter:image:width' => '620',
	'twitter:image:height' => '350',
);

// ###############################################
// # Google Authorship and Publisher Markup #
$__meta['google_authorship'] = array(
	// 'author' => '...',
	// 'publisher' => '...',
);

// ###############################################
// # Schema.org markup for Google+ #
$__meta['schema_org'] = array(
	'name' => get_the_title(),
	'description' => $__meta['global']['description'],
	'image' => $__meta['global']['image'],
);

$__meta['general'] = array(
	'description' => $__meta['global']['description'],
);

do_action( 'foundationpress_head_meta_setting' );

foreach ( $__meta['general'] as $property => $content ) {
	echo "<meta name='" . $property . "' content='" . $content . "' />";
}

foreach ( $__meta['facebook'] as $property => $content ) {
	echo "<meta property='" . $property . "' content='" . $content . "' />";
}

foreach ( $__meta['twitter'] as $property => $content ) {
	echo "<meta name='" . $property . "' content='" . $content . "' />";
}

foreach ( $__meta['google_authorship'] as $rel => $href ) {
	echo "<link rel='" . $rel . "' href='" . $href . "' />";
}

foreach ( $__meta['schema_org'] as $itemprop => $content ) {
	echo "<meta itemprop='" . $itemprop . "' content='" . $content . "' />";
}

// ###############################################
?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/dist/images/icons/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/dist/images/icons/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/dist/images/icons/apple-touch-icon-144x144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/dist/images/icons/apple-touch-icon-114x114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/dist/images/icons/apple-touch-icon-72x72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/dist/images/icons/apple-touch-icon-precomposed.png">
<link type="text/plain" rel="author" href="/humans.txt">
<?php wp_head(); ?>
<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
