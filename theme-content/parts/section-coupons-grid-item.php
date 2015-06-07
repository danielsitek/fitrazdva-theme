<div class="coupon-item" data-id="<?php echo $coupon_item->get_id(); ?>">
    <div class="coupon-item-image">
        <?php if ( isset( $coupon_item->get_banner()[0] ) ) { ?>
            <img
                src="<?php echo $coupon_item->get_banner()[0]['src']; ?>"
                alt="<?php echo $coupon_item->get_banner()[0]['alt']; ?>">
        <?php } ?>
        <div class="coupon-item-hover">
            <div class="coupon-item-hover-overlay"></div>
            <div class="coupon-item-hover-content">
                <a href="<?php echo $coupon_item->get_permalink(); ?>" class="button button-primary">Více o nabídce</a>
            </div>
        </div>
    </div>
    <div class="coupon-item-body">
        <div class="coupon-item-body-header">
            <h3 class="h4"><?php echo $coupon_item->get_title(); ?></h3>

            <div class="coupon-item-range">
                <div class="coupon-item-range-header">
                    <table class="small-12">
                        <tbody>
                            <tr>
                                <td>
                                    Platnost nabídky:
                                </td>
                                <td class="text-right" data-offer-ends="<?php echo $coupon_item->get_offer_to( true ); ?>">
                                    <?php echo $coupon_item->get_offer_remaining_msg(); ?> <i class="typcn typcn-stopwatch"></i>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="coupon-item-range-bar">
                    <div class="coupon-item-range-bar-filling" style="width: <?php echo $coupon_item->get_offer_remains_percent(); ?>;"></div>
                </div>
            </div>

        </div>
        <div class="coupon-item-body-properties">
            <div class="coupon-item-prop prop-due-date">
                <span class="coupon-item-prop-header">Původní cena</span>
                <span class="coupon-item-prop-content"><?php echo $coupon_item->get_price_original(); ?>&nbsp;Kč</span>
            </div>
            <div class="coupon-item-prop prop-percent">
                <span class="coupon-item-prop-header">Sleva</span>
                <span class="coupon-item-prop-content"><?php echo $coupon_item->get_price_discount(); ?>&nbsp;&#37;</span>
            </div>
            <div class="coupon-item-prop prop-price">
                <span class="coupon-item-prop-header">Cena po slevě</span>
                <span class="coupon-item-prop-content"><strong><?php echo $coupon_item->get_price_after_discount(); ?></strong>&nbsp;Kč</span>
            </div>
        </div>
    </div>
</div>
