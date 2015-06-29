<?php

if ( isset( $_SESSION['order_state'] ) ) {

    switch ( $_SESSION['order_state'] ) {
        case 'CREATED':
            get_template_part( 'parts/coupons/item/coupon-item-order-created' );
            break;

        case 'PAYMENT_METHOD_CHOSEN':
            get_template_part( 'parts/coupons/item/coupon-item-order-payment-method-chosen' );
            break;

        case 'PAID':
            get_template_part( 'parts/coupons/item/coupon-item-order-paid' );
            break;

        case 'CANCELED':
            get_template_part( 'parts/coupons/item/coupon-item-order-canceled' );
            break;

        case 'TIMEOUTED':
            get_template_part( 'parts/coupons/item/coupon-item-order-timeouted' );
            break;

        default:
            break;
    }

    unset( $_SESSION['order_state'] );
}

get_template_part( 'parts/coupons/item/form-buy' );
