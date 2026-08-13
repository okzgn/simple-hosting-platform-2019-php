<?php
$_POST['s'] = explode(' ', $_POST['s']);
$_POST['b'] = explode(' ', $_POST['b']);
if(!$_POST['s'][0] || !is_numeric($_POST['s'][0]) || !isset($_POST['s'][1]) ||
	(($_POST['s'][1] != 'MB') && ($_POST['s'][1] != 'GB')) ||
	(($_POST['s'][1] == 'MB') && (($_POST['s'][0] < 25) || ($_POST['s'][0] > 1000))) ||
	(($_POST['s'][1] == 'GB') && (($_POST['s'][0] < 1) || ($_POST['s'][0] > 2)))
){ echo '<p data-err>Espacio de hospedaje incorrecto</p>'; }
elseif(!$_POST['b'][0] || !is_numeric($_POST['b'][0]) || !isset($_POST['b'][1]) ||
	(($_POST['b'][1] != 'MB') && ($_POST['b'][1] != 'GB')) ||
	(($_POST['b'][1] == 'MB') && (($_POST['b'][0] < 25) || ($_POST['b'][0] > 1000))) ||
	(($_POST['b'][1] == 'GB') && (($_POST['b'][0] < 1) || ($_POST['b'][0] > 100)))
){ echo '<p data-err>Transferencia saliente incorrecta</p>'; }
else { require('cfg/docs/request.order.preliminar.php'); }
?>