<?php

use FitRazDvaCoupons\Front\CouponItem;

if ( ! class_exists('FitRazDvaCoupons\Bootstrap') ) {
    return;
}

/**
 *
 * @uses WP_Query https://codex.wordpress.org/Class_Reference/WP_Query
 */
// http://www.advancedcustomfields.com/resources/orde-posts-by-custom-fields/

$today = date('Ymd');

$coupons_grid = new WP_Query( array(
    'post_type'         => 'coupon',
    'posts_per_page'    => -1,
    'meta_key'          => 'offer_to',
    'orderby'           => 'meta_value_num',
    'order'             => 'DESC'
) );

if ( ! $coupons_grid->have_posts() ) {
    return;
}

// <div class="row">
//     <div class="column span-12">
//         <h2>Ostatní slevové poukazy</h2>
//     </div>
// </div>
?>

<div class="row">
    <div class="column span-12">

        <div class="coupon-grid">
            <div class="row" data-columns>
<?php

if ( $coupons_grid->have_posts() ) {

    while ( $coupons_grid->have_posts() ) {

        $coupons_grid->the_post();

        $coupon_item = new CouponItem;

        if ( $coupon_item->is_active() ) {

            include __DIR__ . '/section-coupons-grid-item.php';
        }
    }
}

?>
            </div>
        </div>
    </div>
</div>