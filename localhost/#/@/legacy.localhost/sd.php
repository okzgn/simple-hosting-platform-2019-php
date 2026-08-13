<?php
ini_set('display_errors', 1);
header('Content-Type: text/html; charset=UTF-8');
switch($X = ($_GET['dir'] . $_GET['target'] . '.' . $_GET['type'])){
case '.':
	require('cfg/docs/capacity.php');
	if((($C['diskspace'] * $G) > ($C['diskspace_mbs_parts'] * $M)) && (($C['output'] * $G) > ($C['output_mbs_parts'] * $M))){ require('cfg/docs/home_available.php'); }
	else { readfile('cfg/docs/home_unavailable.html'); }
break;
case 'admin/panel.': require('cfg/docs/admin.panel.php'); break;
case 'orders/panel.': require('cfg/docs/orders.panel.php'); break;
case 'verify.': echo ((isset($_GET['n']) && !is_array($_GET['n']) && isset($_GET['n'][2]) && !isset($_GET['n'][24]) && !is_dir('../' . $_GET['n'] . '.localhost') && !file_exists('../c3/blocked/' . $_GET['n'])) ? ' ' : ''); break;
case 'support.': readfile('cfg/docs/contact_support.html'); break;
default:
	$X = ('cfg/docs/request.' . substr($X, 0, -1) . '.php');
	if(!is_file($X)){
		header("HTTP/1.1 404 Not Found");
		echo 'Archivo no encontrado';
	}
	else { require($X); }
}
?>
