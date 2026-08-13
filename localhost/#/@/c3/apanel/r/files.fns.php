<?php
function S($X, $Y){
	$Z = 0;
	foreach(scandir($X) as $D){
		if(isset($Y['S'][$D])){ continue; }
		$D = ($X . $D);
		if(is_dir($D)){
		    $Z += S(($D . '/'), $Y);
		}
		else {
			$Z += (int)@filesize($D);
			# Optimization: The following line is probably unnecessary for directories with many files.
			# clearstatcache(1, $D);
		}
	}
	return $Z;
}
?>
