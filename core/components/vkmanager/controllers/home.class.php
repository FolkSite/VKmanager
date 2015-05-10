<?php

/**
 * The home manager controller for VKmanager.
 *
 */
class VKmanagerHomeManagerController extends VKmanagerMainController {
	/* @var VKmanager $VKmanager */
	public $VKmanager;


	/**
	 * @param array $scriptProperties
	 */
	public function process(array $scriptProperties = array()) {
	}


	/**
	 * @return null|string
	 */
	public function getPageTitle() {
		return $this->modx->lexicon('vkmanager');
	}


	/**
	 * @return void
	 */
	public function loadCustomCssJs() {
		$this->addCss($this->VKmanager->config['cssUrl'] . 'mgr/main.css');
		$this->addCss($this->VKmanager->config['cssUrl'] . 'mgr/bootstrap.buttons.css');
		$this->addJavascript($this->VKmanager->config['jsUrl'] . 'mgr/misc/utils.js');
		$this->addJavascript($this->VKmanager->config['jsUrl'] . 'mgr/widgets/items.grid.js');
		$this->addJavascript($this->VKmanager->config['jsUrl'] . 'mgr/widgets/items.windows.js');
		$this->addJavascript($this->VKmanager->config['jsUrl'] . 'mgr/widgets/home.panel.js');
		$this->addJavascript($this->VKmanager->config['jsUrl'] . 'mgr/sections/home.js');
		$this->addHtml('<script type="text/javascript">
		Ext.onReady(function() {
			MODx.load({ xtype: "vkmanager-page-home"});
		});
		</script>');
	}


	/**
	 * @return string
	 */
	public function getTemplateFile() {
		return $this->VKmanager->config['templatesPath'] . 'home.tpl';
	}
}