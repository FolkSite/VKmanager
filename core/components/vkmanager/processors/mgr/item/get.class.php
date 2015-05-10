<?php

/**
 * Get an Item
 */
class VKmanagerItemGetProcessor extends modObjectGetProcessor {
	public $objectType = 'VKmanagerItem';
	public $classKey = 'VKmanagerItem';
	public $languageTopics = array('vkmanager:default');
	//public $permission = 'view';


	/**
	 * We doing special check of permission
	 * because of our objects is not an instances of modAccessibleObject
	 *
	 * @return mixed
	 */
	public function process() {
		if (!$this->checkPermissions()) {
			return $this->failure($this->modx->lexicon('access_denied'));
		}

		return parent::process();
	}

}

return 'VKmanagerItemGetProcessor';