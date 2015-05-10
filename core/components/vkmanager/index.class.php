<?php

/**
 * Class VKmanagerMainController
 */
abstract class VKmanagerMainController extends modExtraManagerController {
	/** @var VKmanager $VKmanager */
	public $VKmanager;


	/**
	 * @return void
	 */
	public function initialize() {
		$corePath = $this->modx->getOption('vkmanager_core_path', null, $this->modx->getOption('core_path') . 'components/vkmanager/');
		require_once $corePath . 'model/vkmanager/vkmanager.class.php';

		$this->VKmanager = new VKmanager($this->modx);
		$this->addCss($this->VKmanager->config['cssUrl'] . 'mgr/main.css');
		$this->addJavascript($this->VKmanager->config['jsUrl'] . 'mgr/vkmanager.js');
		$this->addHtml('
		<script type="text/javascript">
			VKmanager.config = ' . $this->modx->toJSON($this->VKmanager->config) . ';
			VKmanager.config.connector_url = "' . $this->VKmanager->config['connectorUrl'] . '";
		</script>
		');

		parent::initialize();
	}


	/**
	 * @return array
	 */
	public function getLanguageTopics() {
		return array('vkmanager:default');
	}


	/**
	 * @return bool
	 */
	public function checkPermissions() {
		return true;
	}
}


/**
 * Class IndexManagerController
 */
class IndexManagerController extends VKmanagerMainController {

	/**
	 * @return string
	 */
	public static function getDefaultController() {
		return 'home';
	}
}