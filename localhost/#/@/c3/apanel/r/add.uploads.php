<?php
foreach($_FILES as $K => $V){
    if(!is_array($V['error'])){ continue; }
	foreach($V['error'] as $A => $B){
		if($B){
			unset($V['name'][$A], $V['type'][$A], $V['size'][$A], $V['tmp_name'][$A], $V['error'][$A]);
			continue;
		}
		$B = ($_SESSION['U'] . basename($V['tmp_name'][$A]));
		move_uploaded_file($V['tmp_name'][$A], $B);
		$V['tmp_name'][$A] = $B;
	}
	if($H !== false){ $_SESSION['C'][$M][$H][$K] = $V; }
	else { $_SESSION['C'][$M][$K] = $V; }
	unset($_FILES[$K]);
}
?>
