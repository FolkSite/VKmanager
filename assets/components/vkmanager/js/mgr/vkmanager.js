var VKmanager = function (config) {
	config = config || {};
	VKmanager.superclass.constructor.call(this, config);
};
Ext.extend(VKmanager, Ext.Component, {
	page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, utils: {}
});
Ext.reg('vkmanager', VKmanager);

VKmanager = new VKmanager();