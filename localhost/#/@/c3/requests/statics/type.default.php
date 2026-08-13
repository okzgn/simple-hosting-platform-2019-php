<?php
header('Content-Type:application/octet-stream');
header('Content-Disposition:attachment;filename="' . $A['target'] . (($A['type'] == 'untyped') ? '' : ('.' . $A['type'])) . '"');
?>