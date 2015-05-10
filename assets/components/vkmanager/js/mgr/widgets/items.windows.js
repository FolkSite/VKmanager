VKmanager.window.CreateItem = function (config) {
	config = config || {};
	if (!config.id) {
		config.id = 'vkmanager-item-window-create';
	}
	Ext.applyIf(config, {
		title: _('vkmanager_item_create'),
		width: 550,
		autoHeight: true,
		url: VKmanager.config.connector_url,
		action: 'mgr/item/create',
		fields: this.getFields(config),
		keys: [{
			key: Ext.EventObject.ENTER, shift: true, fn: function () {
				this.submit()
			}, scope: this
		}]
	});
	VKmanager.window.CreateItem.superclass.constructor.call(this, config);
};
Ext.extend(VKmanager.window.CreateItem, MODx.Window, {

	getFields: function (config) {
		return [{
			xtype: 'textfield',
			fieldLabel: _('vkmanager_item_name'),
			name: 'name',
			id: config.id + '-name',
			anchor: '99%',
			allowBlank: false,
		}, {
			xtype: 'textarea',
			fieldLabel: _('vkmanager_item_description'),
			name: 'description',
			id: config.id + '-description',
			height: 150,
			anchor: '99%'
		}, {
			xtype: 'xcheckbox',
			boxLabel: _('vkmanager_item_active'),
			name: 'active',
			id: config.id + '-active',
			checked: true,
		}];
	}

});
Ext.reg('vkmanager-item-window-create', VKmanager.window.CreateItem);


VKmanager.window.UpdateItem = function (config) {
	config = config || {};
	if (!config.id) {
		config.id = 'vkmanager-item-window-update';
	}
	Ext.applyIf(config, {
		title: _('vkmanager_item_update'),
		width: 550,
		autoHeight: true,
		url: VKmanager.config.connector_url,
		action: 'mgr/item/update',
		fields: this.getFields(config),
		keys: [{
			key: Ext.EventObject.ENTER, shift: true, fn: function () {
				this.submit()
			}, scope: this
		}]
	});
	VKmanager.window.UpdateItem.superclass.constructor.call(this, config);
};
Ext.extend(VKmanager.window.UpdateItem, MODx.Window, {

	getFields: function (config) {
		return [{
			xtype: 'hidden',
			name: 'id',
			id: config.id + '-id',
		}, {
			xtype: 'textfield',
			fieldLabel: _('vkmanager_item_name'),
			name: 'name',
			id: config.id + '-name',
			anchor: '99%',
			allowBlank: false,
		}, {
			xtype: 'textarea',
			fieldLabel: _('vkmanager_item_description'),
			name: 'description',
			id: config.id + '-description',
			anchor: '99%',
			height: 150,
		}, {
			xtype: 'xcheckbox',
			boxLabel: _('vkmanager_item_active'),
			name: 'active',
			id: config.id + '-active',
		}];
	}

});
Ext.reg('vkmanager-item-window-update', VKmanager.window.UpdateItem);