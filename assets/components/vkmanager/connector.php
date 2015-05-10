<?php
/** @noinspection PhpIncludeInspection */
require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CONNECTORS_PATH . 'index.php';
/** @var VKmanager $VKmanager */
$VKmanager = $modx->getService('vkmanager', 'VKmanager', $modx->getOption('vkmanager_core_path', null, $modx->getOption('core_path') . 'components/vkmanager/') . 'model/vkmanager/');
$modx->lexicon->load('vkmanager:default');

// handle request
$corePath = $modx->getOption('vkmanager_core_path', null, $modx->getOption('core_path') . 'components/vkmanager/');
$path = $modx->getOption('processorsPath', $VKmanager->config, $corePath . 'processors/');
$modx->request->handleRequest(array(
	'processors_path' => $path,
	'location' => '',
));