<?php
class requestsSet {
	function __construct($A){
		if(!isset($_SESSION['_'])){
			$F = fopen(($_SERVER['DOCUMENT_ROOT'] . '/' . $_GET['site'] . '/cfg/properties'), 'r');
			if(flock($F, LOCK_SH)){
				$N = fread($F, 256);
				if(!$N || !($N = unserialize($N, ['allowed_classes' => false])) || !is_array($N)){
					fclose($F);
					exit;
				}
				$_SESSION['_'] = $N;
				unset($N);
				fclose($F);
			} else {
				fclose($F);
				exit;
			}
		}

		$A['request'] = (!isset($A['request']) ? ($_SERVER['DOCUMENT_ROOT'] . '/' . $A['site'] . '/' . $A['dir'] . $A['target'] . (!$A['type'] ? '' : ('.' . $A['type']))) : $A['request']);
		$F = fopen(($_SERVER['DOCUMENT_ROOT'] . '/' . $_GET['site'] . '/cfg/output'), 'r+');
		if(flock($F, LOCK_EX)){
			$N = fread($F, 10);
			if(!is_numeric($N)){ $N = 0; }
			if((time() - $_SESSION['_']['properties']['output_lastReset']) > 2592000){ /* 30 days */
				$N = 0;
				$_SESSION['_']['properties']['output_lastReset'] = time();
				$_F = fopen(($_SERVER['DOCUMENT_ROOT'] . '/' . $_GET['site'] . '/cfg/properties'), 'w');
				if(flock($_F, LOCK_EX)){
					fwrite($_F, serialize($_SESSION['_']));
					fflush($_F);
					flock($_F, LOCK_UN);
				} else { $A = 0; }
				fclose($_F);
			}
			$N += strlen($A['request']);
			if(is_readable($A['request'])){ $S = filesize($A['request']); }
			else { $S = 0; }
			if(($N >= $_SESSION['_']['properties']['output']) || (($N + $S) >= $_SESSION['_']['properties']['output'])){
				$A = 0;
				$S = 0;
			}
			fseek($F, 0);
			ftruncate($F, 0);
			fwrite($F, ($N + $S));
			fflush($F);
			flock($F, LOCK_UN);
			fclose($F);
			if(!$A){ die('<script>top.location="https://legacy.localhost/support";</script><meta http-equiv="refresh" content="1;url=https://legacy.localhost/support"/>'); }
		} else {
			die('<script>top.location="https://legacy.localhost/support";</script><meta http-equiv="refresh" content="1;url=https://legacy.localhost/support"/>');
			fclose($F);
			exit;
		}
		require($A['mode'] . '/type.' . $A['handler'] . '.php');
		readfile($A['request']);
	}
}
?>
