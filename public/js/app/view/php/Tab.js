Ext.define('KJSenchaApp.view.php.Tab', {
    
    extend: 'Ext.tab.Panel',
    
    alias: 'widget.phpTab',
    
    layout: 'fit',

    items: [
        { 
        	xtype: 'phpPopup', 
        	title: 'Popups' 
        }
    ]
});