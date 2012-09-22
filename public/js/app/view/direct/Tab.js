Ext.define('KJSenchaApp.view.direct.Tab', {
    
    extend: 'Ext.tab.Panel',
    
    alias: 'widget.directTab',
    
    layout: 'fit',

    items: [
        { xtype: 'directForm', title: 'Form' },
        { xtype: 'directGrid', title: 'Grid' },
        { xtype: 'directNamed', title: 'Named Arguments' },
        { xtype: 'directTree', title: 'Tree' }
    ]
});