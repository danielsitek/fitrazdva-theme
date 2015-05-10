<meta charset="utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="content-type" content="text/html;">
<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, minimum-scale=1.0">
<meta name="msvalidate.01" content="E8E082613BE024D283123691F4EED881">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="author" content="Daniel Sitek | danielsitek.cz | @danielsitek">
<meta name="copyright" content="<?php echo date('Y');?>, I&amp;K FIT RAZ DVA s.r.o. | fitrazdva.cz">
<title><?php if ( is_category() ) {
    echo 'Category Archive for &quot;'; single_cat_title(); echo '&quot; | '; bloginfo( 'name' );
} elseif ( is_tag() ) {
    echo 'Tag Archive for &quot;'; single_tag_title(); echo '&quot; | '; bloginfo( 'name' );
} elseif ( is_archive() ) {
    wp_title( '' ); echo ' Archive | '; bloginfo( 'name' );
} elseif ( is_search() ) {
    echo 'Search for &quot;'.esc_html( $s ).'&quot; | '; bloginfo( 'name' );
} elseif ( is_home() || is_front_page() ) {
    bloginfo( 'name' ); echo ' | '; bloginfo( 'description' );
} elseif ( is_404() ) {
    echo 'Error 404 Not Found | '; bloginfo( 'name' );
} elseif ( is_single() ) {
    wp_title( '' );
} else {
    echo wp_title( ' | ', 'false', 'right' ); bloginfo( 'name' );
} ?></title>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/icons/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/icons/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/icons/apple-touch-icon-144x144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/icons/apple-touch-icon-114x114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/icons/apple-touch-icon-72x72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/icons/apple-touch-icon-precomposed.png">
<link type="text/plain" rel="author" href="/humans.txt">
<?php wp_head(); ?>
<link href="//fonts.googleapis.com/css?family=Ubuntu:400,700,400italic,700italic&subset=latin,latin-ext" rel="stylesheet" type="text/css">
<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->