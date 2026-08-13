<?php

if((count($_POST) < 2) || !isset($_POST['module']) || strpos(urldecode($_POST['module']), '..') !== false || !file_exists($_SESSION['F'] . $_POST['module'])){ echo '<p data-err>Datos incorrectos</p>'; }
else {
	require('r/files.fns.php');
	require('r/properties.update.php');
	if(!is_array($P)){
		die('<p data-err>Error de acceso</p>');
		unset($_POST, $_FILES);
	}

	$Q = false;
	if($P['properties']['diskspace_used'] >= $P['properties']['diskspace']){
		$_POST['a'] = (!isset($_POST['a']) ? '' : $_POST['a']);
		$Q = ($_POST['module'] != 'files' && $_POST['a'] != 'remove');
		if($Q){
			die('<p data-err>Espacio de hospedaje lleno</p>');
			unset($_POST, $_FILES);
		}
	}

	$M = $_POST['module'];
	unset($_POST['module']);
	if(!isset($_SESSION['C'][$M])){ $_SESSION['C'][$M] = []; }
	if($H = isset($_POST['H'])){
		unset($_POST['H']);
		$H = count($_SESSION['C'][$M]);
		if($H > 9){ die('<p data-err>Acción requerida: guardar todo</p>'); }
		$_SESSION['C'][$M][$H] = [];
	}
	foreach($_POST as $K => $V){
		$C = strlen($K);
		$P['properties']['diskspace_used'] += ($C + strlen('' . $C) + 5);
		if(is_array($V)){ $Z = implode("", $V); }
		else { $Z = $V; }
		$C = strlen($Z);
		$P['properties']['diskspace_used'] += ($C + strlen('' . $C) + 5);
		if($P['properties']['diskspace_used'] >= $P['properties']['diskspace']){
			if($Q){
				unset($_POST, $_FILES);
				if($H !== false){ unset($_SESSION['C'][$M][$H]); } else { unset($_SESSION['C'][$M]); }
				die('<p data-err>Falta espacio de hospedaje</p>');
			}
		}
		if($H !== false){ $_SESSION['C'][$M][$H][$K] = $V; }
		else { $_SESSION['C'][$M][$K] = $V; }
		unset($_POST[$K]);
	}
	if(isset($_SESSION['U']) && isset($_FILES)){ include('r/add.uploads.php'); }
	echo '<p data-ok>Cambios realizados</p>';
}

?>
