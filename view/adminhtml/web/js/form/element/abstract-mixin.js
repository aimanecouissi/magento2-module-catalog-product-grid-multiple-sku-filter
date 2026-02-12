/**
 * Aimane Couissi - https://aimanecouissi.com
 * Copyright © Aimane Couissi 2026–present. All rights reserved.
 * Licensed under the MIT License. See LICENSE for details.
 */

define([], function () {
    'use strict';

    return function (Component) {
        return Component.extend({
            initConfig: function () {
                this._super();
                if (this.index === 'sku' && this.template === 'ui/grid/filters/field') {
                    this.elementTmpl = 'AimaneCouissi_CatalogProductGridMultipleSkuFilter/form/element/input';
                }
                return this;
            }
        });
    };
});
