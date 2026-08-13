<?php
$_SERVER['REMOTE_ADDR'] = str_replace(':', '.', $_SERVER['REMOTE_ADDR']) . crc32(isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : 'Unknown-User-Agent');
if(file_exists($_SERVER['DOCUMENT_ROOT'] . '/c3/apanel/b/.' . $_SERVER['REMOTE_ADDR'])){ die('<p data-err>Contáctese mediante soporte</p>'); }

if(!is_readable($_SERVER['DOCUMENT_ROOT'] . '/' . $_GET['site'])){
	http_response_code(404);
	die('<meta http-equiv="refresh" content="1;url=https://legacy.localhost"/>Sitio no encontrado');
}

$A = [1, 30, 40, 7];
require_once($_SERVER['DOCUMENT_ROOT'] . '/c3/uses/libs/sessions.php'); new sessionsUses();

$I = (!isset($_SESSION['_' . $_SERVER['REMOTE_ADDR']]) ? [0, 0, 0] : $_SESSION['_' . $_SERVER['REMOTE_ADDR']]);
$S = 2;
if($I[0]){ $I = (((($_SERVER['REQUEST_TIME'] - $I[0]) / $A[1]) >= ($I[1] / $I[2])) ? [0, 0, 0] : [$I[0], ++$I[1], $I[2]]); }
if(!$I[0]) while(($A[0] > $A[1]) ? 0 : $A[0]){
	if(!isset($I[$S]) || (($_SERVER['REQUEST_TIME'] - $I[$S]) > $A[0])){
		$I[$S] = $_SERVER['REQUEST_TIME'];
		$I[$S + 1] = 0;
	}
	$I[++$S]++;
	if($I[$S] >= $A[2]){
		file_put_contents(($_SERVER['DOCUMENT_ROOT'] . '/c3/apanel/b/.' . $_SERVER['REMOTE_ADDR']), '');
		$I = [$_SERVER['REQUEST_TIME'], 1, $I[$S]];
		break;
	}
	$A[0] += $A[0];
	$A[2] += ($A[2] % $A[3]);
	++$S;
}
$_SESSION['_' . $_SERVER['REMOTE_ADDR']] = $I;
if($I[0]){ exit; }
unset($A, $S, $I);
?>
