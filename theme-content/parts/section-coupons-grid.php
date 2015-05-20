<div class="row">
    <div class="column span-12">
        <h2>Ostatní slevové poukazy</h2>
    </div>
</div>

<div class="row">
    <div class="column span-12">

        <div class="coupon-grid">
            <div class="row" data-columns>

<?php

use FitRazDva\CouponGridItem;

$args = array(
    'post_type' => 'coupon'
);

/**
 *
 * @uses WP_Query https://codex.wordpress.org/Class_Reference/WP_Query
 */
$coupons_grid = new WP_Query( $args );

if ( $coupons_grid->have_posts() ) {

    while ( $coupons_grid->have_posts() ) {

        $coupons_grid->the_post();

        $coupon_object = new CouponGridItem;

        $coupon = $coupon_object->get_metadata();

        dump( $coupon );

        if ( get_field( 'offer_is_active', $coupon['id'] ) ) {

            include __DIR__ . '/section-coupons-grid-item.php';
        }
    }
}

?>

            </div>
        </div>
    </div>
</div>