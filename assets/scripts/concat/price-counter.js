
var PriceCounter = ( function() {
    'use strict';


    var options = {
        priceEl: '#coupon_checkout_value_per_piece',
        selectEl: '#coupon_checkout_quantity'
    };


    function PriceCounter(options) {
        this.options = options;
        this.selectEl = $(this.options.selectEl)[0];
        this.pricePerOne = $(this.options.priceEl).val();
        this.price = '';

        this._init();
    }

    new Emitter(PriceCounter.prototype);

    PriceCounter.prototype._init = function() {
        var self = this;

        $(this.selectEl).on('change.changed-value', function(event) {
            event.preventDefault();

            self.getPrice();
            self.emit('price-updated');
        });
    };

    PriceCounter.prototype.getPrice = function() {

        this.price = $(this.selectEl).val() * this.pricePerOne;
        return this.price;
    };


    return PriceCounter;

}() );