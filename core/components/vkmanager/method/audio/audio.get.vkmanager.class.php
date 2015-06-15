<?php
	$vkmanager_base = $modx->getOption('vkmananger_core_path',$scriptProperties,$modx->getOption('core_path').'components/vkmanager/method/');
	
	if (!isset($outerTpl)) $outerTpl = 'VKMaudio.get.outerTpl';
	if (!isset($rowTpl )) $rowTpl = 'VKMaudio.get.rowTpl';
	
	//$outerTpl = $modx->getOption('outerTpl', $scriptProperties, 'VKMusers.get.outerTpl');
	//$rowTpl = $modx->getOption('rowTpl', $scriptProperties, 'VKMusers.get.rowTpl');
	
	error_reporting(E_ALL);
	require_once($vkmanager_base.'class/VK.php');
	require_once($vkmanager_base.'class/VKException.php');

	$api_id = $modx->getOption('vkmanager_api_id');
	$api_secret = $modx->getOption('vkmanager_api_secret');
	$api_settings = $modx->getOption('vkmanager_api_settings');
	$redirect_url = $modx->getOption('vkmanager_callback_url');

$vk_config = array(
    'app_id'        => $api_id,
    'api_secret'    => $api_secret,
    'callback_url'  => $redirect_url,
    'api_settings'  => $api_settings // In this example use 'friends'.
    // If you need infinite token use key 'offline'.
);
try {
    $vk = new VK\VK($vk_config['app_id'], $vk_config['api_secret']);
    
    if (!isset($_REQUEST['code'])) {
        /**
         * If you need switch the application in test mode,
         * add another parameter "true". Default value "false".
         * Ex. $vk->getAuthorizeURL($api_settings, $callback_url, true);
         */
        $authorize_url = $vk->getAuthorizeURL($vk_config['api_settings'], $vk_config['callback_url']);
            
        echo '<a href="' . $authorize_url . '">Sign in with VK</a>';
    } else {
        $access_token = $vk->getAccessToken($_REQUEST['code'], $vk_config['callback_url']);
        
        echo 'access token: ' . $access_token['access_token']
            . '<br />expires: ' . $access_token['expires_in'] . ' sec.'
            . '<br />user id: ' . $access_token['user_id'] . '<br /><br />';
            
        $user_friends = $vk->api('friends.get', array(
            'uid'       => '12345',
            'fields'    => 'uid,first_name,last_name',
            'order'     => 'name'
        ));
        
        foreach ($user_friends['response'] as $key => $value) {
            echo $value['first_name'] . ' ' . $value['last_name'] . ' ('
                . $value['uid'] . ')<br />';
        }
    }
} catch (VK\VKException $error) {
    echo $error->getMessage();
}