<?php
$V['a'] = ((!isset($V['a']) || !is_numeric($V['a']) || !is_int($V['a'] * 1) || ($V['a'] < 1)) ? 1 : (($V['a'] > 10) ? 10 : $V['a']));
$V['b'] = ((!isset($V['b']) || !is_numeric($V['b']) || !is_int($V['b'] * 1) || ($V['b'] < 11)) ? 11 : (($V['b'] < ($V['a'] + 1)) ? ($V['a'] + 1) : (($V['b'] > 120) ? 120 : $V['b'])));
$V['c'] = ((!isset($V['c']) || !is_numeric($V['c']) || !is_int($V['c'] * 1) || ($V['c'] < 2)) ? 2 : (($V['c'] > 100) ? 100 : $V['c']));
$V['d'] = ((!isset($V['d']) || !is_numeric($V['d']) || !is_int($V['d'] * 1) || ($V['d'] < 1) || ($V['d'] > 50)) ? 7 : $V['d']);
$_SESSION['S'] = ['timeCountStart' => $V['a'], 'timeCountEnd' => $V['b'], 'maxReqsPerTimeCount' => $V['c'], 'maxReqsIncrement' => $V['d']];
file_put_contents(($_SESSION['F'] . $K), serialize($_SESSION['S']), LOCK_EX);
unset($_SESSION['C'][$K]);
?>
