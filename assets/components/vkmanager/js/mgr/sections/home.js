VKmanager.page.Home = function (config) {
	config = config || {};
	Ext.applyIf(config, {
		components: [{
			xtype: 'vkmanager-panel-home', renderTo: 'vkmanager-panel-home-div'
		}]
	});
	VKmanager.page.Home.superclass.constructor.call(this, config);
};
Ext.extend(VKmanager.page.Home, MODx.Component);
Ext.reg('vkmanager-page-home', VKmanager.page.Home);