<?php
class securitySet {
	function __construct(&$A){
		require_once('mod.php');
		new security($A);
	}
}
?>