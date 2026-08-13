<?php
header('Content-Type: text/html; charset=UTF-8');
if((count($_POST) != 4) || !isset($_POST['module']) || ($_POST['module'] != 'move')){ echo '{"error":"Datos incorrectos"}'; }
else {
	require('r/files.fns.php');
	require('r/properties.update.php');
	if(!is_array($P)){
		die('({"error":"Error de acceso"})');
		unset($_POST, $_FILES);
	}

	if(($P['properties']['diskspace_used'] >= $P['properties']['diskspace'])){
		die('{"error":"Espacio de hospedaje lleno"}');
		unset($_POST, $_FILES);
	}

	$M = $_POST['module'];
	unset($_POST['module']);
	if(!isset($_SESSION['C'][$M])){ $_SESSION['C'][$M] = []; }

	$H = count($_SESSION['C'][$M]);
	if($H > 9){ die('{"error":"Acción requerida: guardar todo"}'); }
	$_SESSION['C'][$M][$H] = [];

	foreach($_POST as $K => $V){
		$C = strlen($K);
		$P['properties']['diskspace_used'] += ($C + strlen('' . $C) + 5);
		if(is_array($V)){ $Z = implode("", $V); }
		else { $Z = $V; }
		$C = strlen($Z);
		$P['properties']['diskspace_used'] += ($C + strlen('' . $C) + 5);
		if($P['properties']['diskspace_used'] >= $P['properties']['diskspace']){
			unset($_POST, $_FILES, $_SESSION['C'][$M][$H]);
			die('{"error":"Falta espacio de hospedaje"}');
		}
		$_SESSION['C'][$M][$H][$K] = $V;
		unset($_POST[$K]);
	}
	echo '{"ok":"Cambios realizados"}';
}
?>
