//{namespace name=backend/index/view/widgets}

Ext.define('Shopware.apps.Index.oneBackendClock.view.Main', {
    extend: 'Shopware.apps.Index.view.widgets.Base',
    alias: 'widget.one-backend-clock',
    resizable: {
        handles: 's'
    },
    minHeight: 110,
    maxHeight: 600,

    /**
     * @public
     * @return void
     */
    initComponent: function() {
        var me = this;
        me.callParent(arguments);
    }
});