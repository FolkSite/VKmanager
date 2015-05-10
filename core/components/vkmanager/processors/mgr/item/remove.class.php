<?php

/**
 * Remove an Items
 */
class VKmanagerItemRemoveProcessor extends modObjectProcessor {
	public $objectType = 'VKmanagerItem';
	public $classKey = 'VKmanagerItem';
	public $languageTopics = array('vkmanager');
	//public $permission = 'remove';


	/**
	 * @return array|string
	 */
	public function process() {
		if (!$this->checkPermissions()) {
			return $this->failure($this->modx->lexicon('access_denied'));
		}

		$ids = $this->modx->fromJSON($this->getProperty('ids'));
		if (empty($ids)) {
			return $this->failure($this->modx->lexicon('vkmanager_item_err_ns'));
		}

		foreach ($ids as $id) {
			/** @var VKmanagerItem $object */
			if (!$object = $this->modx->getObject($this->classKey, $id)) {
				return $this->failure($this->modx->lexicon('vkmanager_item_err_nf'));
			}

			$object->remove();
		}

		return $this->success();
	}

}

return 'VKmanagerItemRemoveProcessor';