<?php
switch($X = ($_GET['dir'] . $_GET['target'] . '.' . $_GET['type'])){
	case '.':
		if(($X = unserialize(file_get_contents('cfg/account'), ['allowed_classes' => false])) && isset($X['account']['homepage']) && is_readable($X['account']['homepage'])){
			new requestsSet(['mode' => 'statics', 'handler' => 'html', 'request' => $X['account']['homepage']]);
		} else {
			echo 'No está la página: <b>inicio.html</b>';
		}
		unset($X);
	break;
	default:
	http_response_code(404);
	if(is_readable('no_encontrado.html')){
		new requestsSet(['mode' => 'statics', 'handler' => 'html', 'request' => 'no_encontrado.html']);
	} else {
		echo 'Archivo no encontrado';
	}
}
?>
