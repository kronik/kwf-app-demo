var Report = Ext.extend(Ext.Panel,
{
    initComponent : function()
    {
        this.form = new Ext.FormPanel({
            region: 'west',
            width: 300,
            title: trl('Report Settings'),
            items: [ new Ext.form.TextField({
                    fieldLabel: 'Foo',
                    name: 'foo'
                }), new Ext.form.TextField({
                    fieldLabel: 'Bar',
                    name: 'bar'
                })
            ],

            buttons: [{
                text: trl('Create Report'),
                scope: this,
                handler: function() {
                    this.updateReport();
                }
            }]
        });

        this.reportContents = new Ext.Panel({
            region          : 'center',
            height          : 200
        });

        this.layout = 'border';
        this.items = [this.form, this.reportContents];
        Report.superclass.initComponent.call(this);
    },

    updateReport: function() {
        Ext.Ajax.request({
            mask: this.reportContents.el,
            url: '/report/json-get-report',
            params: this.form.getForm().getValues(),
            success: function(response, options, result) {
                this.reportContents.body.update(result.html);
            },
            scope: this
        });
    }
});
Ext.reg('report', Report);
