<?php
require('r/files.fns.php');
require('r/properties.data.php');
echo json_encode([
	'diskspace_used' => $DISKSPACE_USED,
	'diskspace_total' => $DISKSPACE_TOTAL,
	'diskspace_unity' => $DISKSPACE_UNITY,
	'diskspace_unity_val' => $DISKSPACE_UNITY_VAL,
	'diskspace_used_percent' => $DISKSPACE_USED_PERCENT,
	'diskspace_free_percent' => $DISKSPACE_FREE_PERCENT,
	'output_total' => $OUTPUT_TOTAL,
	'output_unity' => $OUTPUT_UNITY,
	'output_unity_val' => $OUTPUT_UNITY_VAL,
	'output_free_percent' => $OUTPUT_FREE_PERCENT,
	'output_used' => $OUTPUT_USED,
	'output_used_percent' => $OUTPUT_USED_PERCENT
]);
?>
