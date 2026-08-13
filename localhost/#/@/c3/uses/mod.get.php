<?php
class usesGet {
	function __get($mod){ include_once('libs/' . $mod . '.php'); $mod .= 'Uses'; return new $mod(); }
	function __set($mod, $arg){ include_once('libs/' . $mod . '.php'); $mod .= 'Uses'; new $mod($arg); }
}
?>