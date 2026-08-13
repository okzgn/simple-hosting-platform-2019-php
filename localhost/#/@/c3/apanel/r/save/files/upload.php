<?php
$H = 1;
function __upload($V, &$A, &$S){
	if(!is_array($V)){ return '@'; }
	foreach($V['name'] as $N => $X){
		$X = X($X);
		if(isset($S['D'][$X]) || isset($X[$S['N']]) || (strpos($X, '/') !== false)){ continue; }
		$E = Y($X);
		$H = ($A['f'] . $X);
		if(isset($H[$S['N']]) || isset($S['E'][$E]) || isset($X['U'][$E])){ continue; }
		if(file_exists($V['tmp_name'][$N])){
			rename($V['tmp_name'][$N], $H);
		}
	}
}
?>
