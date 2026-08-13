<?php

const SC = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789.-';

$_GET['site'] = (($_GET['first_site'] != '') ? $_GET['first_site'] : $_GET['site']);
if(
    is_array($_GET['site']) ||
    strspn($_GET['site'], SC) !== strlen($_GET['site']) ||
    is_array($_GET['dir']) ||
    strpos($_GET['dir'], '..') !== false ||
    is_array($_GET['file']) ||
    strpos($_GET['file'], '..') !== false
){
    exit;
}

$DL = strlen($_GET['dir']);
if($DL > 1){
    $_GET['dir'] = (substr($_GET['dir'], 1) . '/');
    if($DL > 3 && in_array('cfg', explode('/', $_GET['dir']))){
        http_response_code(403);
        exit;
    }
}

$_GET['mode'] = (!is_file($_SERVER['DOCUMENT_ROOT'] . '/' . $_GET['site'] . '/' . $_GET['dir'] . $_GET['file']) ? 'dynamics' : 'statics');
$_GET['handler'] = (!is_file($_SERVER['DOCUMENT_ROOT'] . '/c3/requests/' . $_GET['mode'] . '/type.' . $_GET['type'] . '.php') ? 'default' : $_GET['type']);
$_GET['target'] = basename($_GET['file'], ('.' . $_GET['type']));

?>
