<?php
class customGet {
	function __get($mod){ include_once('libs/' . $mod . '.php'); $mod .= 'Custom'; return new $mod(); }
	function __set($mod, $arg){ include_once('libs/' . $mod . '.php'); $mod .= 'Custom'; new $mod($arg); }
}
?>