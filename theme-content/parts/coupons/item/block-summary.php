<?php

use FitRazDvaCoupons\Front\CouponItem;
$coupon_item = new CouponItem;

?>
<div class="coupon-info-box">
    <div class="coupon-info-box-content">

        <h3>Detaily nabídky</h3>

        <strong><i class="typcn typcn-stopwatch"></i> Platnost nabídky:</strong>

        <div class="coupon-item-range">
            <div class="coupon-item-range-header">
                <table class="small-12">
                    <tbody>
                        <tr>
                            <td>Zbývá:</td>
                            <td class="text-right" data-offer-ends="<?php echo $coupon_item->get_offer_to( true ); ?>">
                                <?php echo $coupon_item->get_offer_remaining_msg(); ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="coupon-item-range-bar">
                <div class="coupon-item-range-bar-filling" style="width: <?php echo $coupon_item->get_offer_remains_percent(); ?>;"></div>
            </div>
            <div class="text-right color-gray-light medium-text-small">
                <em>Nabídka končí <?php echo $coupon_item->get_offer_to(); ?></em>
            </div>
        </div>

        <strong><i class="typcn typcn-calendar-outline"></i> Platnost poukazu:</strong>

        <table class="small-12">
            <tbody>
                <tr>
                    <td>od:</td>
                    <td class="text-right"><strong><?php echo $coupon_item->get_validity_from(); ?></strong></td>
                </tr>
                <tr>
                    <td>do:</td>
                    <td class="text-right"><strong><?php echo $coupon_item->get_validity_to(); ?></strong></td>
                </tr>
            </tbody>
        </table>

        <p></p>


        <strong><i class="typcn typcn-chart-bar-outline"></i> Cena:</strong>

        <table class="small-12">
            <tbody>
                <tr>
                    <td>Původní cena:</td>
                    <td class="text-right"><strong><?php echo $coupon_item->get_price_original(); ?> Kč</strong></td>
                </tr>
                <tr>
                    <td>Sleva:</td>
                    <td class="text-right"><strong><?php echo $coupon_item->get_price_discount(); ?> %</strong></td>
                </tr>
            </tbody>
        </table>

        <p></p>

        <table class="small-12 text-large">
            <tbody>
                <tr>
                    <td>Cena po slevě:</td>
                    <td class="text-right"><strong><?php echo $coupon_item->get_price_after_discount(); ?> Kč</strong></td>
                </tr>
            </tbody>
        </table>

        <p></p>

        <div class="text-center">
            <a href="#koupit" class="button button-primary button-outline button-expand">Koupit poukaz</a>
        </div>

       <!--  <p class="text-center">
            <a href="#" class="button button-small button-expand">Sdílejte poukaz na FB <i class="fa fa-fb"></i></a>
        </p> -->

        <!-- <p class="text-center">
            <a href="#" class="button button-small button-expand">Sdílejte poukaz emailem <i class="fa fa-envelope"></i></a>
        </p> -->

        <!-- <div class="row row-reset">
            <div class="row row-table text-center">
                <div class="column">
                    <a href="#" class="button button-small button-expand">FB <i class="fa fa-envelope"></i></a>
                </div>
                <div class="column">
                    <a href="#" class="button button-small button-expand">email <i class="fa fa-envelope"></i></a>
                </div>
                <div class="column">
                    <a href="#" class="button button-small button-expand">Pic <i class="fa fa-envelope"></i></a>
                </div>
            </div>
        </div> -->

    </div>
</div>