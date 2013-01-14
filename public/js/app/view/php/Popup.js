Ext.define('KJSenchaApp.view.php.Popup', {
    extend: 'Ext.Panel',
    alias: 'widget.phpPopup',
    title: 'Server Side generated popup',
    items: [
        {
            anchor: '100%',
            baseCls: 'x-plain',
            layout: {
                type: 'hbox',
                padding: 10
            },
            defaults: {
                xtype: 'button'
            },
            items: [
                {
                    text: 'Show Window',
                    handler: function() {
                        Ext.create('Ext.Window', {
                            width: 800,
                            height: 400,
                            layout: 'fit',
                            loader: KJSenchaApp.data.createCmpLoader('TestComponent')
                        }).show();
                    }
                }
            ]
        }
    ]
});