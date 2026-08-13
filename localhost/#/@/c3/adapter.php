<?php

$_GET['site'] = (($_GET['first_site'] != '') ? $_GET['first_site'] : $_GET['site']);
$_GET['dir'] = urldecode($_GET['dir']);
if(strpos($_GET['dir'], '..') !== false) { http_response_code(403); exit; }
if(strlen($_GET['dir']) > 1){ $_GET['dir'] = (substr($_GET['dir'], 1) . '/'); }
$_GET['file'] = urldecode($_GET['file']);
$_GET['mode'] = (!is_file($_SERVER['DOCUMENT_ROOT'] . '/' . $_GET['site'] . '/' . $_GET['dir'] . $_GET['file']) ? 'dynamics' : 'statics');
$_GET['handler'] = (!is_file($_SERVER['DOCUMENT_ROOT'] . '/c3/requests/' . $_GET['mode'] . '/type.' . $_GET['type'] . '.php') ? 'default' : $_GET['type']);
$_GET['target'] = basename($_GET['file'], ('.' . $_GET['type']));

?>
