<?php
use FitRazDva\SetPageSubmenu;
$fitrazdva_set_page_submenu = new SetPageSubmenu;
$fitrazdva_set_page_submenu->onPageInit( $post->ID );

$page_main_content_cLasses = ['page-main-content'];
$fitrazdva_set_page_submenuName;


if ($fitrazdva_set_page_submenu->hasMenu) {
    array_push($page_main_content_cLasses, 'has-submenu');
    $fitrazdva_set_page_submenuName = $fitrazdva_set_page_submenu->getMenuName();
}

echo '<div class="' . implode(' ', $page_main_content_cLasses) . '">';

if ( isset($fitrazdva_set_page_submenuName) ) {
    echo $fitrazdva_set_page_submenuName;
}
// if ($fitrazdva_set_page_submenu->hasMenu) {
    // echo '<nav class="nav-submenu">';
    $fitrazdva_set_page_submenu->getMenu();
    // echo '</nav>';
// }
