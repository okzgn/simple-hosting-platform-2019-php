<?php
$S = require('r/files.data.php');
require_once('r/files.commons.php');
function Z($V, &$A, &$S){
	foreach($V as $F){
		if(!$F || !is_string($F)){ continue; }
		$F = X($F);
		if(!file_exists($A['f'] . $F) || isset($S['D'][$F])){ continue; }
		$E = Y($F);
		if(isset($S['E'][$E]) || isset($S['U'][$E])){ continue; }
		$H = ('__' . $A['a']);
		$H($E, $F, $A, $S);
	}
}
function _f($V, &$A, &$S){
	if(is_array($V)){ if(isset($V[0])){ $V = $V[0]; } else { return '@'; } }
	$V = X($V);
	if(isset($S['D'][$V])){ return '@'; }
	$V = ($_SERVER['DOCUMENT_ROOT'] . '/' . $_GET['site'] . '/' . $V . (!$V ? '' : '/'));
	return (!is_dir($V) ? '@' : $V);
}
function _a($V, &$A, &$S){
	if(is_array($V)){ if(isset($V[0])){ $V = $V[0]; } else { return '@'; } }
	if(isset($S[$V])){ return $V; }
	if(!is_readable('r/save/files/' . $V . '.php')){ return '@'; }
	include_once('r/save/files/' . $V . '.php');
	$S[$V] = $H;
	return $V;
}
function _d($V, &$A, &$S){
	if(!isset($A['a']) || !isset($S['O']['a']) || !isset($S['O']['f'])){ return '@'; }
	$H = (($S[$A['a']] != 'Z') ? ('__' . $A['a']) : 'Z');
	return $H($V, $A, $S);
}
function _n($V, &$A, &$S){
	if(is_array($V)){ if(isset($V[0])){ $V = $V[0]; } else { return '@'; } }
	return $V;
}
function _o($V, &$A, &$S){
	if(is_array($V)){ if(isset($V[0])){ $V = $V[0]; } else { return '@'; } }
	return (($V != 'F' && $V != 'D') ? '@' : $V);
}
foreach($_SESSION['C'][$K] as $H => $A){
	$S['o'] = 0;
	$S['O'] = [];
	foreach($A as $N => $F){
		$E = ('_' . $N);
		if(!function_exists($E)){ break; }
		$S['O'][$N] = $S['o']++;
		if(($A[$N] = $E($F, $A, $S)) == '@'){ break; }
	}
	unset($_SESSION['C'][$K][$H]);
}
unset($_SESSION['C'][$K], $S, $K, $H, $A, $N, $F, $E);
?>