VKmanager.panel.Home = function (config) {
	config = config || {};
	Ext.apply(config, {
		baseCls: 'modx-formpanel',
		layout: 'anchor',
		/*
		 stateful: true,
		 stateId: 'vkmanager-panel-home',
		 stateEvents: ['tabchange'],
		 getState:function() {return {activeTab:this.items.indexOf(this.getActiveTab())};},
		 */
		hideMode: 'offsets',
		items: [{
			html: '<h2>' + _('vkmanager') + '</h2>',
			cls: '',
			style: {margin: '15px 0'}
		}, {
			xtype: 'modx-tabs',
			defaults: {border: false, autoHeight: true},
			border: true,
			hideMode: 'offsets',
			items: [{
				title: _('vkmanager_items'),
				layout: 'anchor',
				items: [{
					html: _('vkmanager_intro_msg'),
					cls: 'panel-desc',
				}, {
					xtype: 'vkmanager-grid-items',
					cls: 'main-wrapper',
				}]
			}]
		}]
	});
	VKmanager.panel.Home.superclass.constructor.call(this, config);
};
Ext.extend(VKmanager.panel.Home, MODx.Panel);
Ext.reg('vkmanager-panel-home', VKmanager.panel.Home);
