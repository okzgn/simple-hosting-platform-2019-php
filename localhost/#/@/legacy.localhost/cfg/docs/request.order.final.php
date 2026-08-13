<?php
if (!class_exists('ZipArchive')) {
    echo '<p data-err>Servidor desconfigurado (Zip).</p>';
    exit;
}
$Z = new ZipArchive();
if($Z->open('cfg/docs/blank_site.zip') !== true){ echo '<p data-err>Inténtelo luego</p>'; }
else {
	/* COUPON */ $_POST['k'] = (!isset($_POST['k']) ? '' : $_POST['k']);

	switch($_POST['k']){
		case 'FREE-12082026':
			$_POST['s'][0] = 100;
			$_POST['s'][1] = 'MB';
			$_POST['b'][0] = 1;
			$_POST['b'][1] = 'GB';
		break;
	}

	$_POST['s'][0] *= (($_POST['s'][1] != 'GB') ? $M : $G);
	$_POST['b'][0] *= (($_POST['b'][1] != 'GB') ? $M : $G);
	$C['diskspace'] = (($C['diskspace'] * $G) - $_POST['s'][0] + $C['diskspace_reserved']);
	$C['output'] = (($C['output'] * $G) - $_POST['b'][0] + $C['output_reserved']);

	fseek($F, 0);
	ftruncate($F, 0);

	fwrite($F, serialize($C));
	fflush($F);
	flock($F, LOCK_UN);
	fclose($F);
	unset($C);

	$_POST['r'] = ($_SERVER['DOCUMENT_ROOT'] . ('/' . $_POST['i'] . '.localhost/'));
	mkdir($_POST['r'], 0777, 1);
	$Z->extractTo($_POST['r']);
	$Z->close();

	@mkdir($_POST['r'] . 'cfg/', 0777, true);

	$PWD = password_hash($_POST['p'], PASSWORD_DEFAULT);

	file_put_contents($_POST['r'] . 'cfg/index.php', '<?php http_response_code(403); die(); ?>');
	file_put_contents(($_POST['r'] . 'cfg/login'), serialize(['login' => ['user' => $_POST['u'], 'password' => $PWD]]), LOCK_EX);

	$Z = time();
	/* TEMPLATES */ $_POST['t'] = (!isset($_POST['t']) ? 0 : $_POST['t']);
	/* COMPONENTS */ $_POST['c'] = (!isset($_POST['c']) ? 0 : $_POST['c']);

	file_put_contents(($_POST['r'] . 'cfg/properties'), serialize(['properties' => ['diskspace' => $_POST['s'][0], 'output' => $_POST['b'][0], 'output_lastReset' => $Z, 'diskspace_unity' => $_POST['s'][1], 'output_unity' => $_POST['b'][1]]]), LOCK_EX);
	file_put_contents(($_POST['r'] . 'cfg/account'), serialize(['account' => ['coupon' => $_POST['k'], 'creation'=> $Z, 'templates' => $_POST['t'], 'components' => $_POST['c'], 'homepage' => 'inicio.html']]), LOCK_EX);
	file_put_contents(($_POST['r'] . 'inicio.html'), str_replace(['{SITE}', '{OKZGN_SITE}'], [strtoupper($_POST['n']), ('https://' . strtolower($_POST['i']) . '.localhost/')], file_get_contents($_POST['r'] . 'inicio.html')), LOCK_EX);

	$_POST['r'] = ($Z - 1677716450);
	file_put_contents(('cfg/orders/' . $_POST['r']), serialize(['domainNames' => ($_POST['n'] . '.' . $_POST['e']), 'domainInternal' => $_POST['i'], 'username' => $_POST['u'], 'password' => $PWD, 'coupon' => $_POST['k'], 'diskspace' => $_POST['s'], 'output' => $_POST['b'], 'templates' => $_POST['t'], 'components' => $_POST['c'], 'date' => date("Y-m-d H:i:s", $Z), 'timeMark' => $Z, 'ip' => $_SERVER['REMOTE_ADDR']]), LOCK_EX);
	file_put_contents(('cfg/ips/' . str_replace(':', '-', $_SERVER['REMOTE_ADDR']) . crc32(isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : 'Unknown-User-Agent') . '_' . $Z), '');

	die('<p data-ok>¡Listo! Sitio creado</p><script>top.A.orderOk("' . $_POST['r'] . '", "' . $_POST['i'] . '");</script>');
}
?>
