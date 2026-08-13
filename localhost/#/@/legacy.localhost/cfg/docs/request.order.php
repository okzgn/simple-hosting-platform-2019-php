<?php
header('Access-Control-Allow-Origin: https://localhost');
$O = glob('cfg/ips/' . str_replace(':', '-', $_SERVER['REMOTE_ADDR']) . crc32(isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : 'Unknown-User-Agent') . '_*');
if(isset($O[0])){
	foreach($O as $V){
		$V = explode('_', $V);
		$V[2] = (time() - $V[1]);
		if($V[2] < 3600){
			#die('<p data-err>Inténtelo en ' . ceil((3600 - $V[2]) / 60) . ' minuto(s).</p>');
			die('<p data-err>Inténtelo luego.</p>');
		}
		unlink($V[0] . '_' . $V[1]);
	}
}
$O = 0;
foreach($_POST as $V){ if(!is_string($V) || $O > 11){ break; } $O++; }
if($O != 8 && $O != 11){ echo '<p data-err>Datos incorrectos</p>'; }
elseif(!isset($_POST['n']) || !isset($_POST['e']) || !isset($_POST['i']) || !isset($_POST['u']) || !isset($_POST['p']) || !isset($_POST['r']) || !isset($_POST['s']) || !isset($_POST['b'])){ echo '<p data-err>Faltan datos</p>'; }
elseif(!isset($_POST['n'][4]) || isset($_POST['n'][24]) || preg_match('/[^a-z0-9]/', $_POST['n'])){ echo '<p data-err>Dirección web incorrecta</p>'; }
elseif(!($Z = unserialize(file_get_contents('../extensions'), ['allowed_classes' => false])) || !isset($Z[$_POST['e']])){ echo '<p data-err>Extensión web incorrecta</p>'; }
elseif(!isset($_POST['i'][2]) || isset($_POST['i'][24]) || preg_match('/[^a-z0-9]/', $_POST['i']) || is_dir('../' . $_POST['i'] . '.localhost') || file_exists('../c3/blocked/' . $_POST['i'])){ echo '<p data-err>Dirección interna incorrecta</p>'; }
elseif($_POST['p'] != $_POST['r']){ echo '<p data-err>Contraseñas desiguales</p>'; }
elseif(!isset($_POST['s'][3]) || isset($_POST['s'][7])){ echo '<p data-err>Espacio de hospedaje incorrecto</p>'; }
elseif(!isset($_POST['b'][3]) || isset($_POST['b'][7])){ echo '<p data-err>Transferencia saliente incorrecta</p>'; }
elseif(isset($_POST['k']) && isset($_POST['k'][24])){ echo '<p data-err>Cupón muy largo</p>'; }
elseif(isset($_POST['t']) && (!is_numeric($_POST['t']) || $_POST['t'] > 5 || $_POST['t'] < 0)){ echo '<p data-err>Plantillas web incorrectas</p>'; }
elseif(isset($_POST['c']) && (!is_numeric($_POST['c']) || $_POST['c'] > 5 || $_POST['c'] < 0)){ echo '<p data-err>Componentes funcionales incorrectos</p>'; }
else { require('cfg/docs/request.order.continue.php'); }
?>
