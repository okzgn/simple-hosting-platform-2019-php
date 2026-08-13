<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/c3/requests/mod.set.php');
$_GET['k'] = (__DIR__ . '/ico/' . (!isset($_GET['k']) ? '404' : (($_GET['k'] == 'DIR') ? 'DIR' : strtolower($_GET['k']))) . '.png');
new requestsSet([
	'mode' => 'statics',
	'handler' => 'png',
	'request' => (!file_exists($_GET['k']) ? (__DIR__ . '/ico/404.png') : $_GET['k'])
]);
?>