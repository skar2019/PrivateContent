define([
    'uiComponent',
    'Magento_Customer/js/customer-data',
], function (Component, customerData) {
    'use strict';

    return Component.extend({
        /** @inheritdoc */
        initialize: function () {
            this._super();
            this.legacyAccountNumber = customerData.get('customsection')()['legacy_account_number'];
        }
    });
});