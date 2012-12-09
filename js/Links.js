var Links = Ext.extend(Ext.Panel,
{
    initComponent : function(test)
    {
        var linkdata = new Kwf.Auto.GridPanel({
            controllerUrl   : '/link-data',
            region          : 'center',
            height          : 600,
            resizable       : true,
            split           : true,
            title           : trlKwf('Dictionary')
        });

        var grid = new Kwf.Auto.GridPanel({
            controllerUrl   : '/links',
            region          : 'west',
            width           : 400,
            resizable       : true,
            split           : true,
            collapsible     : true,
            title           : trlKwf('Dictionaries'),
            bindings: [{
                queryParam: 'link_id',
                item: linkdata
            }]
        });

        this.layout = 'border';
        this.items = [grid, {
            layout: 'border',
            region: 'center',
            items: [linkdata]
        }];
        Links.superclass.initComponent.call(this);
    }
});
