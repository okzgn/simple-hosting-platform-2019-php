<?php
$dir = ($_SERVER['DOCUMENT_ROOT'] . '/' . $A['site'] . '/');
if(!is_readable($dir . 'dynamics.php')){
	http_response_code(404);
	if(!is_readable($dir . '404.php')){ echo 'Archivo no encontrado'; }
	else {
		chdir($dir);
		require($dir . '404.php');
	}
}
else {
	chdir($dir);
	require($dir . 'dynamics.php');
}
exit;
?>