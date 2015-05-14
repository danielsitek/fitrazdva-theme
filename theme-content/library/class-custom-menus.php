<?php

namespace FitRazDva;

use FitRazDva;

/**
 * Set Page Submenu
 * Add custom meta bog to page where editors can choose if he want to add menu.
 *
 * @author      Daniel Sitek
 */
class SetPageSubmenu
{

    private $post_id;
    private $menu_slug;
    private $generated_menu;
    private $generated_menu_dom;
    private $menu_parser;

    public $hasMenu = false;


    /**
     * Constructor
     *
     * @param string $post_id   Get post id
     */
    public function __construct( $post_id )
    {

        $menu_slug = get_post_meta($post_id, '_set_page_submenu', true);

        if (strlen($menu_slug) > 0) {
            $this->hasMenu = true;
            $this->post_id = $post_id;
            $this->menu_slug = $menu_slug;

            $this->init();
        }
    }


    /**
     * init()
     *
     */
    private function init()
    {

        if ($this->hasMenu) {

            $this->menu_parser = new WPMenuParser();

            $this->generated_menu = $this->menu_parser->parse( $this->menu_slug );

            $this->generated_menu_dom = $this->getMenuTemplate( $this->generated_menu );
        }
    }


    /**
     * getMenu()
     *
     * Render custom set menu for page
     *
     */
    public function getMenu()
    {

        if ($this->hasMenu) {

            echo $this->generated_menu_dom;
        }
    }


    /**
     * getMenuDetails()
     *
     * Render custom set menu for page
     *
     * @return array Array with navigation menu
     */
    function getMenuDetails()
    {

        return $this->generated_menu;
    }


    /**
     * getMenuName()
     *
     * Render custom set menu for page
     *
     * @return  string  Navigation menu name
     */
    function getMenuName()
    {

        return $this->getMenuDetails()->name;

    }


    private function getMenuTemplate( $menu_object = array() )
    {

        $templated_menu;
        $menu = $menu_object;

        ob_start();

        require_once( __DIR__ . '/view/template-page-custom-menu.php');

        $templated_menu = ob_get_contents();
        ob_end_clean();

        return $templated_menu;

    }

}