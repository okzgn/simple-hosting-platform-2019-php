<?php
if(isset($V['user']) && isset($V['password']) && !isset($V['user'][24]) && !isset($V['password'][24]) && is_string($V['user']) && is_string($V['password'])){
    $V['password'] = password_hash($V['password'], PASSWORD_DEFAULT);
    $_SESSION['A'] = $V['password']; # Previous: $_SESSION['C']['login']['password'];
	file_put_contents(($_SESSION['F'] . $K), serialize([$K => $V]), LOCK_EX);
}
?>
