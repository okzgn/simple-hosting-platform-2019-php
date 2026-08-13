<?php
class security {
	function __construct($A = [1, 60, 100, 7]){
		$_SERVER['REMOTE_ADDR'] = str_replace(':', '.', $_SERVER['REMOTE_ADDR']) . crc32(isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : 'Unknown-User-Agent');
		if(file_exists($_SERVER['DOCUMENT_ROOT'] . '/c3/blocked/.' . $_SERVER['REMOTE_ADDR'])){ die('<p data-err>Contáctese mediante soporte</p>'); }

		if(!is_readable($_SERVER['DOCUMENT_ROOT'] . '/' . $_GET['site'])){
			http_response_code(404);
			die('<meta http-equiv="refresh" content="1;url=https://legacy.localhost"/>Sitio no encontrado');
		}

		require_once($_SERVER['DOCUMENT_ROOT'] . '/c3/uses/libs/sessions.php'); new sessionsUses();

		if(!isset($_SESSION['$'])){
			$I = fopen(($_SERVER['DOCUMENT_ROOT'] . '/' . $_GET['site'] . '/cfg/security'), 'r');
			if(flock($I, LOCK_SH)){
				$S = fread($I, 140);
				if(!$S || !($S = unserialize($S, ['allowed_classes' => false])) || !is_array($S)){
					fclose($I);
					exit;
				}
				$_SESSION['$'] = [$S["timeCountStart"], $S["timeCountEnd"], $S["maxReqsPerTimeCount"], $S["maxReqsIncrement"]];
				unset($S);
				fclose($I);
			} else {
				fclose($I);
				exit;
			}
		} else { $A = $_SESSION['$']; }
		$I = (!isset($_SESSION[$_SERVER['REMOTE_ADDR']]) ? [0, 0, 0] : $_SESSION[$_SERVER['REMOTE_ADDR']]);
		$S = 2;
		if($I[0]){ $I = (((($_SERVER['REQUEST_TIME'] - $I[0]) / $A[1]) >= ($I[1] / $I[2])) ? [0, 0, 0] : [$I[0], ++$I[1], $I[2]]); }
		if(!$I[0]) while(($A[0] > $A[1]) ? 0 : $A[0]){
			if(!isset($I[$S]) || (($_SERVER['REQUEST_TIME'] - $I[$S]) > $A[0])){
				$I[$S] = $_SERVER['REQUEST_TIME'];
				$I[$S + 1] = 0;
			}
			$I[++$S]++;
			if($I[$S] >= $A[2]){
				file_put_contents(($_SERVER['DOCUMENT_ROOT'] . '/c3/blocked/.' . $_SERVER['REMOTE_ADDR']), '');
				$I = [$_SERVER['REQUEST_TIME'], 1, $I[$S]];
				break;
			}
			$A[0] += $A[0];
			$A[2] += ($A[2] % $A[3]);
			++$S;
		}
		$_SESSION[$_SERVER['REMOTE_ADDR']] = $I;
		if($I[0]){ exit; }
		unset($A, $S, $I);
	}
}
?>
