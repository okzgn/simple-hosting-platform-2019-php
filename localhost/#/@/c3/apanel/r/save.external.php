<?php
header('Content-Type: text/html; charset=UTF-8');
if(!isset($_POST['p'])){ echo '<p data-err>Faltan datos</p>'; }
elseif(!password_verify($_POST['p'], $_SESSION['A'])){ echo '<p data-err>Contraseña incorrecta</p>'; }
else {
	if($_GET['site'] != 'legacy.localhost'){
		$_P = unserialize(file_get_contents($_SESSION['F'] . 'account'));
		if(!isset($_P['account']['active']) && isset($_P['account']['creation']) && ((time() - $_P['account']['creation']) > 600)){ die('<p data-err>Pago mediante soporte</p>'); }
		if(isset($_P['account']['creation']) && ((time() - $_P['account']['creation']) > 31536000)){
			unset($_P['account']['active']);
			file_put_contents(($_SESSION['F'] . 'account'), serialize($_P), LOCK_EX);
			die('<p data-err>Pago mediante soporte</p>');
		}

		foreach($_SESSION['C'] as $K => $V){
			if(is_readable('r/save/' . $K . '.php')){ require('r/save/' . $K . '.php'); }
			else { unset($_SESSION['C'][$K]); }
		}
	}
	echo '<p data-ok>¡Datos guardados!</p>';
}
?>
