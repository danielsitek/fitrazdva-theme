<?php

use FitRazDvaCoupons\Front\CouponItem;
$coupon_item = new CouponItem;

?>
<a name="koupit"></a>
<div class="coupon-form-buyout">
    <div class="coupon-form-buyout-content">

        <form action="" id="couponBuyout" class="form" method="POST">
            <fieldset>
                <p>
                    <span>Původní cena:</span> <strong class="float-right"><?php echo $coupon_item->get_price_original(); ?> Kč</strong><br>
                    <span>Sleva:</span> <strong class="float-right"><?php echo $coupon_item->get_price_discount(); ?> %</strong>
                </p>

                <p class="text-large">
                    <span>Cena poukazu po slevě:</span> <strong class="float-right"><?php echo $coupon_item->get_price_after_discount(); ?> Kč</strong>
                </p>

                <div class="form-group form-controls-horizontal innput-select js-input-select">
                    <label>
                        <div class="row">
                            <div class="column span-6">
                                <div class="input-label">Počet poukazů:</div>
                            </div>
                            <div class="column span-6">
                                <span class="form-mask">
                                    <select name="couponBuyout[quantity]" id="couponBuyout_quantity" class="form-select form-mask-content span-12" tabindex="1">
                                        <option value="1">1 ks</option>
                                        <option value="2">2 ks</option>
                                        <option value="3">3 ks</option>
                                        <option value="4">4 ks</option>
                                        <option value="5">5 ks</option>
                                    </select>
                                    <div class="form-select-mask form-mask-item">
                                        <div class="form-select-mask-value js-input-select-value">1 ks</div>
                                        <div class="form-select-mask-icon">
                                            <i class="typcn typcn-arrow-unsorted"></i>
                                        </div>
                                    </div>
                                </span>
                            </div>
                        </div>
                    </label>
                </div>

                <div class="form-group input-text">
                    <label>
                        <div class="input-label span-12">
                            <strong>Váš email:</strong><br>
                            <span>Zašleme vám na něj informace o&nbsp;objednávce</span>
                        </div>
                        <input type="email" name="couponBuyout[email]" id="couponBuyout_email" placeholder="frantiska.krasna@seznam.cz" tabindex="1" class="form-input span-12" required="required">
                    </label>
                </div>

                <div class="form-group input-checkbox">
                    <label>
                        <input type="checkbox" name="couponBuyout[agreement]" id="couponBuyout_agreement" tabindex="1" required="required">
                        <div class="input-label">
                            Souhlasím s&nbsp;<a href="/obchodni-podminky">obchodními podmínkami</a>
                        </div>
                    </label>
                    <label>
                        <input type="checkbox" name="couponBuyout[newsletter]" id="couponBuyout_newsletter" checked="checked" tabindex="1">
                        <div class="input-label">
                            <strong>Dejte mi vědět o&nbsp;dalších akčních nabídkách.</strong> Nebojte se, žádný spam, jen naše speciální balíčky za speciální ceny.
                        </div>
                    </label>
                </div>

                <div class="form-group input-interested">
                    <input type="checkbox" name="couponBuyout[alive]" class="form-input-interested" id="couponBuyout_alive" tabindex="-1">
                </div>

                <input type="hidden" name="couponBuyout[value_per_piece]" id="couponBuyout_value_per_piece" value="<?php echo $coupon_item->get_price_after_discount( true ); ?>">
                <input type="hidden" name="couponBuyout[token]" id="couponBuyout_token" value="cup001">
                <input type="hidden" name="couponBuyout[return_url]" id="couponBuyout_return_url" value="/slevove-poukazy/cup001">

                <div class="form-actions text-right">
                    <button type="submit" id="couponBuyout_submit" name="couponBuyout[submit]" class="button button-primary button-large js-form-buyout-submit" tabindex="1">Koupit za <strong><span class="js-return-counted-prize"><?php echo $coupon_item->get_price_after_discount(); ?></span>&nbsp;Kč</strong></button>
                </div>

            </fieldset>
        </form>

    </div>
</div>