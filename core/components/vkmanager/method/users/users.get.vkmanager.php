<?php
	$vkmanager_base = $modx->getOption('vkmananger_core_path',$scriptProperties,$modx->getOption('core_path').'components/vkmanager/method/');
	
	if (!isset($outerTpl)) $outerTpl = 'VKMusers.get.outerTpl';
	if (!isset($rowTpl )) $rowTpl = 'VKMusers.get.rowTpl';
	
	//$outerTpl = $modx->getOption('outerTpl', $scriptProperties, 'VKMusers.get.outerTpl');
	//$rowTpl = $modx->getOption('rowTpl', $scriptProperties, 'VKMusers.get.rowTpl');
	
	error_reporting(E_ALL);
	require_once($vkmanager_base.'class/VK.php');
	require_once($vkmanager_base.'class/VKException.php');

	$api_id = $modx->getOption('vkmanager_api_id');
	$api_secret = $modx->getOption('vkmanager_api_secret');

	try {
		$vk = new VK\VK($api_id, $api_secret); // Use your app_id and api_secret
		
		$users = $vk->api('users.get', array(
			'uids'   => '477979',
			'fields' => 'first_name,last_name,sex'));
			
		foreach ($users['response'] as $user) {
			echo '<pre>';
			var_dump($user);
			echo '</pre>';
			
			$firstname = $user["first_name"];
			$lastname = $user["last_name"];
			$sex = $user["sex"];
			
					$arr = array
					   (
						  'vkm.firstname' => $firstname,
						  'vkm.lastname' => $lastname,
						  'vkm.sex' => $sex
					   );
					
				    $response.= $modx->parseChunk($rowTpl, $arr, '[[+', ']]');
		}
		
		return str_replace("[[+vkm.wrapper]]", $response, $modx->getChunk($outerTpl));
		
	} catch (VK\VKException $error) {
		echo $error->getMessage();
	}