<?php
$Z = require('r/files.data.php');
require_once('r/files.commons.php');
function __f($V, &$A, &$Z){
	if(is_array($V)){ if(isset($V[0])){ $V = $V[0]; } else { return '@'; } }
	if(!$V){ return '@'; }
	$V = X($V);
	if(isset($Z['D'][$V])){ return '@'; }
	$V = ($_SERVER['DOCUMENT_ROOT'] . '/' . $_GET['site'] . '/' . $V . (!$V ? '' : '/'));
	return (!is_dir($V) ? '@' : $V);
}
function __t($V, &$A, &$Z){
	if(is_array($V)){ if(isset($V[0])){ $V = $V[0]; } else { return '@'; } }
	return __f($V, $A, $Z);
}
function __l($V, &$A, &$Z){
	if(is_array($V)){ if(isset($V[0])){ $V = $V[0]; } else { return '@'; } }
	if(!isset($A['f']) || !isset($A['t']) || (strpos($V, ':') === false)){ return '@'; }
	foreach(explode(':', $V) as $F){
		if(!$F || !is_string($F)){ continue; }
		$F = X($F);
		if((($A['f'] . $F . '/') == substr($A['t'], 0, strlen($A['f'] . $F . '/'))) || !file_exists($A['f'] . $F) || isset($Z['D'][$F])){ continue; }
		$E = Y($F);
		$H = ($A['t'] . $F);
		if(isset($Z['E'][$E]) || isset($Z['U'][$E]) || isset($H[$Z['N']])){ continue; }
		rename(($A['f'] . $F), $H);
	}
}
foreach($_SESSION['C'][$K] as $H => $A){
	foreach($A as $N => $F){
		$E = ('__' . $N);
		if(!function_exists($E)){ break; }
		if(($A[$N] = $E($F, $A, $Z)) == '@'){ break; }
	}
	unset($_SESSION['C'][$K][$H]);
}
unset($_SESSION['C'][$K], $K, $H, $A, $N, $F, $E, $Z);
?>
