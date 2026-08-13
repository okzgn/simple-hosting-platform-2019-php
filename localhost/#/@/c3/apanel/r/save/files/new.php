<?php
$H = 1;
function __new($F, &$A, &$X){
	if(!isset($A['o']) || !$A['f'] || !is_dir($A['f']) || !$F || (strpos($F, '/') !== false) || is_readable($A['f'] . $F) || isset($F[$X['N']])){ return; }
	$F = X($F);
	$Y = Y($F);
	$H = ($A['f'] . $F);
	if(!$F || isset($X['D'][$F]) || isset($X['E'][$Y]) || isset($X['U'][$Y]) || isset($H[$X['N']])){ return; }
	if($A['o'] == 'D'){ mkdir($H, 0777); }
	elseif($A['o'] == 'F'){ file_put_contents($H, ''); }
}
?>
