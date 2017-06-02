/**
 * Main js
 */

$(document).foundation();

(function(window) {
    'use strict';

    if (window.App === undefined) {
        window.App = {};
    }

    var isMobile = window.App.isMobile = {
        Android: function() {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function() {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function() {
            return (isMobile.Android() ||
                isMobile.BlackBerry() ||
                isMobile.iOS() ||
                isMobile.Opera() ||
                isMobile.Windows());
        }
    };

    var requestAnimationFramePolyfil = (function() {

        var timeLast = 0;

        return window.requestAnimationFrame ||
            window.webkitRequestAnimationFrame ||
            window.mozRequestAnimationFrame ||
            function(callback) {
            var timeCurrent = (new Date()).getTime(),
                timeDelta;

            /* Dynamically set delay on a per-tick basis to match 60fps. */
            /* Technique by Erik Moller. MIT license: https://gist.github.com/paulirish/1579671 */
            timeDelta = Math.max(0, 16 - (timeCurrent - timeLast));
            timeLast = timeCurrent + timeDelta;

            return setTimeout(function() { callback(timeCurrent + timeDelta); }, timeDelta);
        };
    })();

    window.App.requestAnimationFramePolyfil = function(callback) {
        return requestAnimationFramePolyfil.call(window, callback);
    };

}(window));

(function($) {
    'use strict';

    var options = {
        mainClass: '.js-input-select',
        valueClass: '.js-input-select-value'
    };

    // init Select class
    if ($(options.mainClass).length > 0) {
        $(options.mainClass).each(function() {
            var el = this;
            return new Select(el, options);
        });
    }

}(jQuery));

(function($, window) {
    'use strict';

    var options = {
        priceEl: '#coupon_checkout_value_per_piece',
        selectEl: '#coupon_checkout_quantity'
    };

    // init PriceCounter class
    if ($(options.priceEl).length > 0 && $(options.selectEl).length > 0) {
        var price = new PriceCounter(options);

        price.on('price-updated', function() {
            var self = this;
            $('.js-return-counted-prize').text(window.formatNumberBy3(price.getPrice(), ',', ' '));
        });
    }

}(jQuery, window));

(function($, window) {
    'use strict';

    $('#menu-hlavni-menu').slicknav({
        prependTo: '#mobile-nav',
        brand: '<a href="/" class="slicknav_brand-link">' +
            '<em class="small-text-smaller color-gray-light slicknav_brand-link-part">Studio</em>' +
            '<strong class="slicknav_brand-link-part">Fit Raz Dva</strong>' +
        '</a>'
    });

}(jQuery, window));
