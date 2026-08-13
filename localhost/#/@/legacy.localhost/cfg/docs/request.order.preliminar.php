<?php

$F = fopen(($_SERVER['DOCUMENT_ROOT'] . '/properties'), 'r+');
if(flock($F, LOCK_EX)){
	$C = fread($F, 1024);
	if(!$C){ echo '<p data-err>Inténtelo luego</p>'; }
	else {
		require('cfg/docs/capacity.php');
		if((($_POST['s'][1] == 'MB') && ($_POST['s'][0] > $DISKSPACE_MB)) ||
			(($_POST['s'][1] == 'GB') && ($_POST['s'][0] > $DISKSPACE_GB))
		){
			echo '<p data-err>Disminuya espacio de hospedaje</p>';
		}
		elseif((($_POST['b'][1] == 'MB') && ($_POST['b'][0] > $OUTPUT_MB)) ||
			(($_POST['b'][1] == 'GB') && ($_POST['b'][0] < $C['output_gbs_parts']) && ($_POST['b'][0] > $OUTPUT_GB)) ||
			(($_POST['b'][1] == 'GB') && ($_POST['b'][0] >= $C['output_gbs_parts']) && ($_POST['b'][0] > $OUTPUT_GBS))
		){
			echo '<p data-err>Disminuya transferencia saliente</p>';
		}
		else { require('cfg/docs/request.order.final.php'); }
	}

} else { echo '<p data-err>Inténtelo luego</p>'; }
fclose($F);

?>
