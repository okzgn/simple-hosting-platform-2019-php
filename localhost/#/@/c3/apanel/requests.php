<?php

require('../adapter.php');
require('security.php');

chdir($_SERVER['DOCUMENT_ROOT'] . '/c3/apanel/');
$_SESSION['F'] = ($_SERVER['DOCUMENT_ROOT'] . '/' . $_GET['site'] . '/cfg/');

if(!isset($_SESSION['C'])){
	$I = fopen(($_SESSION['F'] . 'login'), 'r');
	if(flock($I, LOCK_SH)){
		$S = fread($I, 140);
		if(!$S || !($S = unserialize($S, ['allowed_classes' => false])) || !is_array($S)){
			fclose($I);
			exit;
		}
		$_SESSION['C'] = $S;
		unset($S);
		fclose($I);
	} else {
		fclose($I);
		exit;
	}
}

$_GET['requestComplement'] = ((strpos($_GET['request'], '?') !== false) ? strstr($_GET['request'], '?', true) : $_GET['request']);
$_GET['requestBase'] = ('http' . (!isset($_SERVER['HTTPS']) ? '' : 's') . '://' . $_GET['site'] . '/apanel/');
$_GET['request'] = ($_GET['requestBase'] . $_GET['requestComplement']);

if(!isset($_SESSION['A'])){
	require('r/login.external.php');
	exit;
}

if(!$_GET['requestComplement']){
	require('r/account.external.php');
	exit;
}

if(is_readable('r/' . $_GET['requestComplement'] . '.external.php')){
	require('r/' . $_GET['requestComplement'] . '.external.php');
	exit;
}

$I = explode('/', $_GET['requestComplement']);
if(!isset($I[1]) || !$I[1]){ require('r/404.php'); }

switch($I[0]){
	case 'edit': require('r/account.external.php'); break;
	default: require('r/404.php');
}

?>
