<?php
switch($X = ($_GET['dir'] . $_GET['target'] . '.' . $_GET['type'])){
case '.':
	require('cfg/docs/capacity.php');
	if((($C['diskspace'] * $G) > ($C['diskspace_mbs_parts'] * $M)) && (($C['output'] * $G) > ($C['output_mbs_parts'] * $M))){ require('cfg/docs/home_available.php'); }
	else {
		new requestsSet(['mode' => 'statics', 'handler' => 'html', 'request' => ('cfg/docs/home_unavailable.html')]);
	}
break;
case 'admin/panel.': require('cfg/docs/admin.panel.php'); break;
case 'orders/panel.': require('cfg/docs/orders.panel.php'); break;
case 'verify.': echo ((isset($_GET['n']) && !is_array($_GET['n']) && isset($_GET['n'][2]) && !isset($_GET['n'][24]) && !is_dir('../' . $_GET['n'] . '.localhost') && !file_exists('../c3/blocked/' . $_GET['n'])) ? ' ' : ''); break;
case 'support.':
	new requestsSet(['mode' => 'statics', 'handler' => 'html', 'request' => ('cfg/docs/contact_support.html')]);
break;
default:
	$X = ('cfg/docs/request.' . substr($X, 0, -1) . '.php');
	if(!is_file($X)){
		http_response_code(404);
		echo 'Archivo no encontrado';
	}
	else { require($X); }
}
?>
