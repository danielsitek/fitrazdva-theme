<?php

namespace FitRazDva;

use DOMDocument,
    FitRazDva;

/**
 * WPMenuParser
 *
 * Parse WP generated menu to nicely organized multidimensional array
 *
 * @author      Daniel Sitek
 */
class WPMenuParser
{

    private $generated_wp_menu;
    private $menu_identificator;

    /**
     * Constructor
     */
    public function __construct()
    {
        # code...
    }


    /**
     * parse()
     *
     * Generate WP default menu into buffer and same output to string.
     *
     * @param string $menu_identificator    Desired menu. Accepts (matching in order) id, slug or name
     */
    public function parse( $menu_identificator = '' )
    {

        $this->parseWPMenuToString( $menu_identificator );
        return $this->parseMenuStringToArray();

    }


    /**
     * parseWPMenuToString()
     *
     * Vygeneruje WP menu podle identifikátoru do bufferu, uloží do proměnné a pak buffer vyprázdní.
     *
     * @link    http://php.net/ob_start         ob_start — Turn on output buffering
     * @param   string $menu_identificator      ID, slug nebo název pro získání menu
     */
    private function parseWPMenuToString( $menu_identificator = '' )
    {

        $this->menu_identificator = $menu_identificator;

        ob_start();

        wp_nav_menu(array(
            'container' => 'div',                      // remove nav container
            'container_class' => '',                   // class of container
            'menu' => $this->menu_identificator,       // menu name
            'menu_class' => '',                        // adding custom nav class
            'theme_location' => '',                    // where it's located in the theme
            'before' => '',                            // before each link <a>
            'after' => '',                             // after each link </a>
            'link_before' => '',                       // before each link text
            'link_after' => '',                        // after each link text
            'depth' => 5,                              // limit the depth of the nav
            'fallback_cb' => false                     // fallback function (see below)
        ));

        $this->generated_wp_menu = ob_get_contents();
        ob_end_clean();

    }


    /**
     * parseMenuStringToArray()
     *
     * Parse menu from html string
     *
     * @return  array    Array with menu items
     */
    private function parseMenuStringToArray()
    {

        $items = array();

        $parsedDOM = $this->parseDomToArray( $this->generated_wp_menu );

        $items = $this->parseListItems( $parsedDOM['ul']['li'] );

        return $items;

    }


    /**
     * parseListItems()
     *
     * Metoda projde napříč všemi itemy v poli a poskládá z nich zpátky jednotlivé objekty menu.
     * Pokud v poli podká další úroveň, zavolá pro dané subpole sama sebe a zachová tak původní strukturu.
     *
     * @param   array $list_item    XML Dom parsed to array
     * @return  array               Array of menu objects
     */
    private function parseListItems( $list_item = array() )
    {

        $items = array();

        /**
         * Zjistíme, jestli je v poli více objektů nebo jen jeden
         * Pokud jen jeden, zanoříme ho o úroveń hloub abychom nad
         * ním mohli iterovat stejným způsobem jako u ostatnich.
         */
        if ( isset( $list_item['@attributes'] ) ) {

            $bumpedItem = array();
            $bumpedItem[0] = $list_item;
            $list_item = $bumpedItem;
        }

        foreach ($list_item as $node) {

            if ( isset( $node['@attributes'] ) ) {

                $attr = $this->getLinkObject( $node['@attributes']['id'] );

                if ( isset( $node['ul'] ) ) {

                    $attr['items'][] = $this->parseListItems( $node['ul']['li'] );
                }

                $items[] = $attr;
            }
        }

        return $items;
    }


    /**
     * getLinkObject()
     *
     * Podle ID získá DOM element z uloženého stringu `$this->generated_wp_menu` a z něj vytáhne `title`, `href` a `label`,
     * které složí do objektu představující jednu položku v menu.
     *
     * @param   string $el_id   ID identifikator
     * @return  array           Return menu item array [ ['title' => '', 'href' => '', 'label' => ''] ]
     */
    private function getLinkObject( $el_id = '' )
    {

        $dom = new DOMDocument();
        $items = array();

        $dom->loadHTML( mb_convert_encoding( $this->generated_wp_menu, 'HTML-ENTITIES', 'UTF-8' ) );
        /**
         * Vybereme vždy první element `a`. Tím vyřadíme všechny další `a` v případné podúrovní.
         */
        $el_node = $dom->getElementById( $el_id )->getElementsByTagName( 'a' )->item(0);

        $items['title'] = $el_node->getAttribute( 'title' );
        $items['href'] = $el_node->getAttribute( 'href' );
        $items['label'] = strip_tags( $dom->saveHTML($el_node) );

        /**
         * return array(
         *     'title' => '',
         *     'href' => '',
         *     'label' => '',
         * )
         */
        return $items;
    }


    /**
     * parseDomToArray()
     *
     * Rozparsuje string s html do pole jednotlivých itemů podle xml
     *
     * @uses simplexml_load_string()
     * @uses json_encode()
     * @uses json_decode()
     *
     * @param   string $DOM             DOM uložený ve stringu
     * @return  array                   Rozparosvaný DOM strom ze stringu do multidienzional array
     */
    private function parseDomToArray( $DOM = '' )
    {

        $parsedDOMxml = simplexml_load_string( $DOM );
        $parsedDOMjson = json_encode( $parsedDOMxml );
        $parsedDOM = json_decode( $parsedDOMjson, true );

        return $parsedDOM;
    }

}