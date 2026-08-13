<?php
$dir = ($_SERVER['DOCUMENT_ROOT'] . '/' . $A['site'] . '/' . (!$A['dir'] ? '' : ($A['dir'] . '/')));
chdir($dir);
require($dir . $A['target'] . '.php');
exit;
?>