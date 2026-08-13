<?php
$H = 'Z';
function __rename($E, $F, &$A, &$X){
	if(!isset($A['n']) || !$A['n'] || (strpos($A['n'], '/') !== false) || isset($A['n'][$X['N']])){ return; }
	$A['a'] = Y($A['n']);
	$A['n'] = (X($A['n']) . ((!$A['a'] && !is_dir($A['f'] . $F)) ? (!$E ? '' : ('.' . $E)) : ''));
	$H = ($A['f'] . $A['n']);
	if(!isset($H[$X['N']]) && !file_exists($H) && !isset($X['D'][$A['n']]) && !isset($X['E'][$A['a']]) && !isset($X['U'][$A['a']])){ rename(($A['f'] . $F), $H); }
}
?>
