<?php
$C = unserialize((!isset($C) ? file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/properties') : $C), ['allowed_classes' => false]);
$M = (1024 * 1024);
$G = ($M * 1024);
$C['diskspace'] = (($C['diskspace'] - $C['diskspace_reserved']) / $G);
$C['output'] = (($C['output'] - $C['output_reserved']) / $G);
$DISKSPACE_MB = ((($DISKSPACE_MB = strpos($C['diskspace'], '.')) !== false) ? (('0.' . substr($C['diskspace'], ($DISKSPACE_MB + 1))) * $G) : $C['diskspace_mbs_reserved']);
$DISKSPACE_GB = ((($C['diskspace'] * $G) - $DISKSPACE_MB) / $G);
$DISKSPACE_MB = ($DISKSPACE_MB / $M);
$OUTPUT_MB = ((($OUTPUT_MB = strpos($C['output'], '.')) !== false) ? (('0.' . substr($C['output'], ($OUTPUT_MB + 1))) * $G) : $C['output_mbs_reserved']);
$OUTPUT_GBS = (($C['output'] * $G) - $OUTPUT_MB);
$OUTPUT_GB = (($OUTPUT_GBS / $G) / ($C['output_gbs_parts']));
$OUTPUT_GB = ((($OUTPUT_GBS = strpos($OUTPUT_GB, '.')) !== false) ? ($C['output_gbs_parts'] * ('0.' . substr($OUTPUT_GB, ($OUTPUT_GBS + 1)))) : (!$OUTPUT_GB ? 0 : $C['output_gbs_parts']));
$OUTPUT_GBS = ($C['output'] - $OUTPUT_GB - ($OUTPUT_MB / $G));
$OUTPUT_MB = ($OUTPUT_MB / $M);
?>
