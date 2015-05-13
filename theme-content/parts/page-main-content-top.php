<?php
use FitRazDva\SetPageSubmenu;
$fitrazdva_set_page_submenu = new SetPageSubmenu( $post->ID );

$page_main_content_cLasses = ['page-main-content'];

if ($fitrazdva_set_page_submenu->hasMenu) {
    array_push($page_main_content_cLasses, 'has-submenu');
}

echo '<div class="' . implode(' ', $page_main_content_cLasses) . '">';

$fitrazdva_set_page_submenu->getMenu();
