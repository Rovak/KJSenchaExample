/**
 * KJSencha Example Application 
 * 
 * @see http://docs.sencha.com/ext-js/4-1/#!/guide/application_architecture
 */
Ext.application({

    name: 'KJSenchaApp',

    appFolder: App.basePath + '/js/app',
    
    controllers: [
        'Direct'
    ],

    launch: function() {
        Ext.create('KJSenchaApp.view.Viewport');
    }
});