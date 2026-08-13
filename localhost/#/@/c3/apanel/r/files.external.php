<?php
global $O, $X;
$_POST['f'] = (!isset($_POST['f']) ? '/' : ('/' . preg_replace(['/[\/\\\]+/', '/(^|[\/])\.+([\/]|$)/', '/^\/|\/$/'], ['/', '', ''], $_POST['f']) . '/'));
$O = ['folder' => (($_POST['f'] == '//') ? '/' : $_POST['f']), 'folders' => [], 'files' => []];
$_POST['f'] = ($_SERVER['DOCUMENT_ROOT'] . '/' . $_GET['site'] . $_POST['f']);
if(!is_dir($_POST['f'])){ $O['error'] = 'Carpeta inexistente'; }
elseif($_POST['f'] = opendir($_POST['f'])){
	$X = require('r/files.data.php');
	$_POST['s'] = ((!isset($_POST['s']) || !is_numeric($_POST['s'])) ? 0 : $_POST['s']);
	$_POST['e'] = ((!isset($_POST['e']) || !is_numeric($_POST['e'])) ? ($_POST['s'] + $X['M']) : $_POST['e']);
	$Q = ($_POST['e'] - $_POST['s']);
	$Q = (($Q > $X['M']) ? $X['M'] : (($Q < 1) ? 0 : ($Q - 1)));
	if(!$Q){ $O['error'] = 'Rango incorrecto'; }
	elseif(($F = readdir($_POST['f'])) !== false){
		$R = 0;
		$C = 0;
		function G($F, &$R){
			$E = strrpos($F, '.');
			$E = (($E !== false) ? strtolower(substr($F, ($E + 1))) : '');
			if(!isset($GLOBALS['X']['E'][$E]) && !isset($GLOBALS['X']['U'][$E])){
				$GLOBALS['O'][(!is_dir($_SERVER['DOCUMENT_ROOT'] . '/' . $_GET['site'] . $GLOBALS['O']['folder'] . $F)) ? 'files' : 'folders'][base64_encode($F)] = [];
				$R++;
			}
		}
		do {
			if(!isset($X['D'][$F])){
				if(($C >= $_POST['s']) && ($C < $_POST['e'])){ G($F, $R); }
				if($R == $Q){ break; }
				$C++;
			}
		}
		while(($F = readdir($_POST['f'])) !== false);
		$O['range'] = (($F !== false) ? ++$C : 0);
		$O['next'] = (($F !== false) ? $F : 0);
		if(!$R){ $O['message'] = 'Sin archivos'; }
	        closedir($_POST['f']);
	}
	else { $O['message'] = 'Carpeta inaccesible'; }
}
else { $O['error'] = 'Carpeta inaccesible'; }
$O['opts'] = 1;
echo json_encode($O);
?>
