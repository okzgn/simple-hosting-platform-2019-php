<?php
$H = 'Z';
function __remove($E, $F, $A, $X){
	if(($F == '.') || ($F == '..') || (strpos($F, '/') !== false)){ return; }
	if(!is_dir($A['f'] . $F)){ return unlink($A['f'] . $F); }
	$A['f'] = ($A['f'] . $F . '/');
	if($E = opendir($A['f'])){
		while(($Y = readdir($E)) !== false){ __remove('', $Y, $A, $X); }
		closedir($E);
		rmdir($A['f']);
	}
}
?>