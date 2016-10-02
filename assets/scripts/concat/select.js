/**
 * Class Select
 */

var Select = (function() {
    'use strict';

    var options = {
        mainClass: '.js-input-select',
        valueClass: '.js-input-select-value'
    };

    function Select(el, options) {
        this.el = el;
        this.options = options;
        this.selectEl = $(this.el).find('select')[0];
        this.valueEl = $(this.el).find(this.options.valueClass)[0];

        this._init();
    }

    Select.prototype._init = function() {
        var self = this;
        $(this.selectEl).on('change.select', function(event) {
            event.preventDefault();
            self._setValue(event.target.selectedOptions[0].label);
        });
    };

    Select.prototype._setValue = function(val) {

        if (val.length > 0) {
            $(this.valueEl).text(val);
        }
    };

    return Select;

}());
