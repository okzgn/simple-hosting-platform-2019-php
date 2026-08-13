<?php
class sessionsUses {
	function __construct($A = []){
		if(session_status() == PHP_SESSION_ACTIVE){ return; }
		if($I = (!isset($A['id']) ? 0 : $A['id'])){ session_id($I); unset($A['id']); }
		$A = array_merge([
			'save_path' => ($_SERVER['DOCUMENT_ROOT'] . '/' . $_GET['site'] . '/cfg/sessions'),
			'name' => 'OKZGN',
			'use_only_cookies' => 1,
			'cookie_httponly' => 1,
			'cookie_lifetime' => 0,
			'cookie_samesite' => 'Strict',
			'gc_probability' => 50,
			'gc_divisor' => 100
		], $A);
		if(!is_dir($A['save_path'])){ mkdir($A['save_path'], 0777, 1); }
		session_start($A);
	}
}
?>
