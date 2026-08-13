<?php
if(!isset($_GET['n']) || !isset($_GET['n'][2]) || isset($_GET['n'][25])){ exit; }
$_GET['n'] = strtolower($_GET['n']);
if(($_GET['n'] == 'www') || ($_GET['n'] == 'apanel')){ exit; }
echo (!file_exists($_GET['n'] . '.localhost') ? ' ' : '');
?>