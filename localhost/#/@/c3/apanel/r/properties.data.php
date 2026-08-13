<?php
require('r/properties.update.php');
$DISKSPACE_TOTAL = ($P['properties']['diskspace'] / $DISKSPACE_UNITY_VAL);
$DISKSPACE_USED_PERCENT = ceil(($DISKSPACE_USED * 100) / $DISKSPACE_TOTAL);
$DISKSPACE_FREE_PERCENT = (100 - $DISKSPACE_USED_PERCENT);
$OUTPUT_UNITY = $P['properties']['output_unity'];
$OUTPUT_UNITY_VAL = (($OUTPUT_UNITY != 'GB') ? (1024 * 1024) : (1024 * 1024 * 1024));
$OUTPUT_TOTAL = ($P['properties']['output'] / $OUTPUT_UNITY_VAL);

$F = fopen(($_SESSION['F'] . 'output'), 'r');
flock($F, LOCK_SH);
$OUTPUT_USED = fread($F, 10);
flock($F, LOCK_UN);
fclose($F);

$OUTPUT_USED = (!is_numeric($OUTPUT_USED) ? 0 : $OUTPUT_USED);
$OUTPUT_USED = ((($N = strpos($OUTPUT_USED, '.')) !== false) ? substr($OUTPUT_USED, 0, ($N + 3)) : $OUTPUT_USED);
$OUTPUT_USED = ($OUTPUT_USED / $OUTPUT_UNITY_VAL);
$OUTPUT_USED_PERCENT = ceil(($OUTPUT_USED  * 100) / $OUTPUT_TOTAL);
$OUTPUT_FREE_PERCENT = (100 - $OUTPUT_USED_PERCENT);
?>
