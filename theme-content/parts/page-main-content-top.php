<?php
use FitRazDva\SetPageSubmenu;

$page_main_content_classes = array('page-main-content');

if ( isset( $post->ID ) ) {

    $fitrazdva_set_page_submenu = new SetPageSubmenu( $post->ID );

    if ($fitrazdva_set_page_submenu->hasMenu) {
        array_push($page_main_content_classes, 'has-submenu');
    }

    echo '<div class="' . implode(' ', $page_main_content_classes) . '">';

    $fitrazdva_set_page_submenu->getMenu();

} else {

    echo '<div class="' . implode(' ', $page_main_content_classes) . '">';
}
