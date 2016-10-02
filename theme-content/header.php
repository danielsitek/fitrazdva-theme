<!doctype html>
<!--[if lt IE 9]>
<html
    itemscope
    itemtype="http://schema.org/Article"
    class="old-ie no-js"
    xml:lang="cs"
    <?php language_attributes(); ?>
	xmlns="http://www.w3.org/1999/xhtml"
	xmlns:og="http://ogp.me/ns#"
>
<![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html <?php language_attributes(); ?>
	xml:lang="cs"
	class="no-js"
	xmlns="http://www.w3.org/1999/xhtml"
	xmlns:og="http://ogp.me/ns#"
>
<!--<![endif]-->
<head>
<?php get_template_part( 'parts/page-head' ); ?>
</head>
<body <?php body_class(); ?>>
<?php

do_action( 'foundationpress_after_body' );

do_action( 'foundationpress_layout_start' );

get_template_part( 'parts/page-header' );

?>

<section class="container page-main" role="document">
<div class="row">
<div class="column small-12">
<?php

get_template_part( 'parts/page-main-content-top' );
do_action( 'foundationpress_after_header' );
