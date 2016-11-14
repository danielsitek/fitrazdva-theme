<?php
/**
 * Form-buy php
 *
 * @package FitRazDva Theme
 */

use FitRazDvaCoupons\Front\CouponItem;
$coupon_item = new CouponItem;

?>
<div class="coupon-form-buyout">
	<div class="coupon-form-buyout-content">

		<form action="<?php echo $coupon_item->get_action_url(); ?>" id="coupon_checkout" class="form" method="POST">
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
									<select name="coupon_checkout[quantity]" id="coupon_checkout_quantity" class="form-select form-mask-content span-12" tabindex="1">
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
						<input type="email" name="coupon_checkout[email]" id="coupon_checkout_email" placeholder="frantiska.krasna@seznam.cz" tabindex="1" class="form-input span-12" required="required">
					</label>
				</div>

				<div class="form-group input-checkbox">
					<label>
						<input type="checkbox" name="coupon_checkout[agreement]" id="coupon_checkout_agreement" tabindex="1" required="required">
						<div class="input-label">
							Souhlasím s&nbsp;<a href="/obchodni-podminky">obchodními podmínkami</a>
						</div>
					</label>
					<?php

					/*
					<label>
					<input type="checkbox" name="coupon_checkout[newsletter]" id="coupon_checkout_newsletter" checked="checked" tabindex="1">
					<div class="input-label">
					<strong>Dejte mi vědět o&nbsp;dalších akčních nabídkách.</strong> Nebojte se, žádný spam, jen naše speciální balíčky za speciální ceny.
					</div>
					</label>
					 */

					?>
				</div>

				<div class="form-group input-interested">
					<input type="checkbox" name="coupon_checkout[alive]" class="form-input-interested" id="coupon_checkout_alive" tabindex="-1">
				</div>

				<input type="hidden" name="coupon_checkout[value_per_piece]" id="coupon_checkout_value_per_piece" value="<?php echo $coupon_item->get_price_after_discount( true ); ?>">
				<input type="hidden" name="coupon_checkout[coupon_id]" id="coupon_checkout_token" value="<?php echo $coupon_item->get_id(); ?>">
				<input type="hidden" name="coupon_checkout[return_url]" id="coupon_checkout_return_url" value="<?php echo $coupon_item->get_action_url(); ?>">

				<div class="form-actions text-right">
					<button type="submit" id="coupon_checkout_submit" name="coupon_checkout[submit]" class="button button-primary button-large js-form-buyout-submit" tabindex="1">Koupit za <strong><span class="js-return-counted-prize"><?php echo $coupon_item->get_price_after_discount(); ?></span>&nbsp;Kč</strong></button>
				</div>

			</fieldset>
		</form>

	</div>
</div>

<script type="text/javascript" src="<?php echo $coupon_item->get_gate_js(); ?>"></script>
<script>

	( function ( $, dataLayer ){

		var $form = $( '#coupon_checkout' );
		var return_url = location.href;
		var formData;
		var $submit_button = $form.find( '.js-form-buyout-submit' );

		$form.on( 'submit', function ( event ) {

			event.preventDefault();
			formData = $(this).serialize();

			initPayment( formData );

			dataLayer.push({
				'conversionValue': $('.js-return-counted-prize').text().replace(' ', ''),
				'event': 'coupon_checkout_form_submit'
			});

			return false;

		} );

		function initPayment ( formData ) {
			// console.log( formData );

			$.ajax( {
				url: '<?php echo admin_url( 'admin-ajax.php' ); ?>',
				method: 'POST',
				data: 'action=coupon_checkout&' + formData
			} )
			.done( onInitPaymentDone );
		}

		function onInitPaymentDone ( res ) {

			console.log( res );

			// goToGateway( res );

			_gopay.checkout( { gatewayUrl: res.data.gwUrl }, initCheckout );
		}

		function goToGateway ( res ) {

			if ( res.data.gwUrl !== undefined ) {
				window.location.href = res.data.gwUrl;
			}
		}

		function initCheckout ( res ) {
			console.log( res );

			if ( res.url !== undefined ) {
				window.location.href = res.url;
			}
		}

	}( jQuery, (typeof dataLayer === 'undefined') ? window.dataLayer = [] : dataLayer ) );

</script>
