/**
 * KJSencha Example Application 
 * 
 * @see http://docs.sencha.com/ext-js/4-1/#!/guide/application_architecture
 */
Ext.application({

    name: 'KJSenchaApp',

    appFolder: 'app',

    launch: function() {
        Ext.create('Ext.container.Viewport', {
            layout: {
                type: 'border',
                padding: '0 5 5 5'
            },
            items: [
                {
                    id: 'app-header',
                    xtype: 'box',
                    region: 'north',
                    height: 40,
                    html: 'KJ Sencha'
                },
                {
                    xtype: 'tabpanel',
                    region: 'center',
                    plain: true,
                    items: [
                        { xtype: 'panel', title: 'Users' },
                        { xtype: 'panel', title: 'Test' },
                        { xtype: 'panel', title: 'Test 2' },
                    ]
                }
            ]
        });
    }
});