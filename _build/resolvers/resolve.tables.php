<?php

if ($object->xpdo) {
	/** @var modX $modx */
	$modx =& $object->xpdo;

	switch ($options[xPDOTransport::PACKAGE_ACTION]) {
		case xPDOTransport::ACTION_INSTALL:
			$modelPath = $modx->getOption('vkmanager_core_path', null, $modx->getOption('core_path') . 'components/vkmanager/') . 'model/';
			$modx->addPackage('vkmanager', $modelPath);

			$manager = $modx->getManager();
			$objects = array(
				'VKmanagerItem',
			);
			foreach ($objects as $tmp) {
				$manager->createObjectContainer($tmp);
			}
			break;

		case xPDOTransport::ACTION_UPGRADE:
			break;

		case xPDOTransport::ACTION_UNINSTALL:
			break;
	}
}
return true;
