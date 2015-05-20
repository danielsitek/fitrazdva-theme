<?php

namespace FitRazDva;

use FitRazDva,
    DOMDocument;


class CouponItem
{


    public $post_metadata;
    public $post_id;

    private $offer_from;
    private $offer_to;
    private $original_price;
    private $price_discount;
    private $price_after_discount;
    private $coupon_photo_01;

    /**
     * Constructor
     */
    public function __construct()
    {

        $this->post_id = $this->get_WP_data( 'the_ID' );

        if ( ! $this->post_id ) {
            return false;
        }

        $this->map_fields();

        $this->generate_metadata();
    }


    /**
     * Get grid item metadata
     */
    public function get_metadata()
    {
        // dump( $this->post_metadata );
        return $this->post_metadata;
    }


    private function map_fields()
    {

        $this->offer_from =             strtotime( get_field( 'offer_from', $this->post_id ) );
        $this->offer_to =               strtotime( get_field( 'offer_to', $this->post_id ) );
        $this->original_price =         get_field( 'original_price', $this->post_id );
        $this->price_discount =         get_field( 'price_discount', $this->post_id );
        $this->price_after_discount =   get_field( 'price_after_discount', $this->post_id );
        $this->coupon_photo_01 =        get_field( 'coupon_photo_01', $this->post_id );
    }


    private function generate_metadata()
    {

        $this->post_metadata = array(
            'id' => $this->post_id,
            'banner' => array(
                $this->get_featured_image()
            ),
            'offer' => array(
                'from' => $this->offer_from,
                'to' => $this->offer_to
            ),
            'offer-ends' => array(
                'days' => '',
                'hours' => '',
                'minutes' => '',
                'percent' => $this->count_remaining_offer_time_in_percent(),
                'message' => ''
            ),
            'price' => array(
                'original_price' => $this->original_price,
                'price_discount' => $this->price_discount,
                'price_after_discount' => $this->price_after_discount
            ),
            'permalink' => $this->get_WP_data( 'the_permalink' ),
            'title' => $this->get_WP_data( 'the_title' )
        );
    }


    /**
     * Convert remaining time to percent
     *
     * @return integer Remaining time in percent value
     */
    private function count_remaining_offer_time_in_percent()
    {

        // dump( $this->post_metadata['offer']['to'] );

        $count_a = $this->offer_to - time();
        $cound_b = $this->offer_to - $this->offer_from;
        $count = ( $count_a / $cound_b ) * 100;
        // $count = 30;

        return $count;
    }


    private function get_featured_image()
    {

        $imageHTML = $this->get_WP_data( 'the_post_thumbnail' );

        $dom = new DOMDocument();

        $dom->loadHTML( mb_convert_encoding( $imageHTML, 'HTML-ENTITIES', 'UTF-8' ) );

        $image_element = $dom->getElementsByTagName('img')->item(0);

        return array(
            'src' => $image_element->getAttribute( 'src' ),
            'width' => $image_element->getAttribute( 'width' ),
            'height' => $image_element->getAttribute( 'height' ),
            'alt' => $image_element->getAttribute( 'alt' )
        );
    }


    /**
     * Get post ID
     *
     * @return string Get ID from WP function
     */
    private function get_WP_data( $method_name )
    {

        $return_content;

        if ( ! $method_name ) {
            return;
        }

        if ( function_exists( $method_name ) ) {

            ob_start();
            $method_name();
            $return_content = ob_get_contents();
            ob_end_clean();
        }

        return $return_content;
    }

}