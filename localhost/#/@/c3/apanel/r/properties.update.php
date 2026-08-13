<?php

$F = fopen(($_SESSION['F'] . 'properties'), 'r');
flock($F, LOCK_SH);
$P = unserialize(fread($F, 200));

$DISKSPACE_UNITY = $P['properties']['diskspace_unity'];
$DISKSPACE_UNITY_VAL = (($DISKSPACE_UNITY != 'GB') ? (1024 * 1024) : (1024 * 1024 * 1024));
$P['properties']['diskspace_used'] = S(($_SERVER['DOCUMENT_ROOT'] . '/' . $_GET['site'] . '/'), require('r/files.data.php'));
$DISKSPACE_USED = ($P['properties']['diskspace_used'] / $DISKSPACE_UNITY_VAL);
$DISKSPACE_USED = ((($N = strpos($DISKSPACE_USED, '.')) !== false) ? substr($DISKSPACE_USED, 0, ($N + 3)) : $DISKSPACE_USED);

flock($F, LOCK_UN);
fclose($F);

?>
