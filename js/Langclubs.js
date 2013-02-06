var Langclubs = Ext.extend(Ext.Panel,
{
       initComponent : function(test)
       {
       var form = new Kwf.Auto.FormPanel({
                                         controllerUrl   : '/langclub',
                                         region          : 'center',
                                         title           : trl('General Info')
                                         });

       var subgrid = new Kwf.Auto.GridPanel({
              controllerUrl   : '/langclubgroups',
              collapsible     : true,
              title           : trl('Groups')
       });
              
       var grid = new Kwf.Auto.GridPanel({
                                         controllerUrl   : '/langclubs',
                                         region          : 'west',
                                         width           : 400,
                                         resizable       : true,
                                         split           : true,
                                         collapsible     : true,
                                         title           : trl('Lang clubs'),
                                         bindings: [{
                                                        queryParam: 'id',
                                                        item: form
                                                    },
                                                    {
                                                        queryParam: 'clubId',
                                                        item: subgrid
                                                    }]
                                         });
       var tabs = new Ext.TabPanel({
               border    : true,
               activeTab : 0,
               region    : 'center',
               tabPosition:'top',
               items:[form, subgrid]
       });
       
       this.layout = 'border';
       this.items = [grid, {
                     layout: 'border',
                     region: 'center',
                     items: [tabs]
                     }];
       Langclubs.superclass.initComponent.call(this);
    }
});