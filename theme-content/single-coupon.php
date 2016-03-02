<?php

use FitRazDvaCoupons\Front\CouponItem;

$layout['template'] = 'single-coupon.php';

get_header();

do_action( 'foundationpress_before_content' );

while ( have_posts() ) : the_post(); ?>
    <?php

    $coupon_item = new CouponItem;

    ?>
    <article <?php post_class(); ?> id="coupon-<?php the_ID(); ?>">
        <div class="page-main-section">
            <div class="page-main-section-content section-header">
                <header>
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header>
            </div>

            <?php do_action( 'foundationpress_page_before_entry_content' ); ?>

            <div class="page-main-section-content">
                <div class="row">
                    <div class="column small-12 medium-4 medium-push-8">
                        <?php get_template_part( 'parts/coupons/item/block-summary' ); ?>
                    </div>
                    <div class="column small-12 medium-8 medium-pull-4">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-main-section bg-light section-terms">
            <div class="page-main-section-content">
                <h2 id="podminky-akce">Podmínky akce</h2>
                <?php echo $coupon_item->get_terms_of_event(); ?>
            </div>
        </div>

        <?php
        $today = date( 'yymmdd' );
        $offer_from = date( 'yymmdd', $coupon_item->get_offer_from( true ) );
        $offer_to = date( 'yymmdd', $coupon_item->get_offer_to( true ) );
        if ( $coupon_item->is_active() && ( $offer_from <= $today && $offer_to >= $today ) ) { ?>
        <div class="page-main-section" id="koupit">
            <div class="page-main-section-content">
                <?php get_template_part( 'parts/coupons/item/coupon-item-form-dispenzer' ); ?>
            </div>
        </div>
        <?php } ?>

    </article>
<?php endwhile;

do_action( 'foundationpress_after_content' );

get_template_part( 'parts/sklik' );

get_footer();
