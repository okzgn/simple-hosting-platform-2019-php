<?php

$_POST['U'] = (!isset($_POST['U']) ? '' : $_POST['U']);
$_POST['P'] = (!isset($_POST['P']) ? '' : $_POST['P']);

if(is_readable('../login')){
	$Z = unserialize(file_get_contents('../login'), ['allowed_classes' => false]);
	if($_POST['U'] === '' && $_POST['P'] === ''){ $B = ''; }
	else if($_POST['U'] === $Z['username'] && password_verify($_POST['P'], $Z['password'])){ $B = 'Ok'; }
	else { $B = '<h3>Inautorizado</h3>'; }
} else { $B = '<h3>Sin acceso</h3>'; }


if($B != 'Ok'){
$S = <<<HTML

<style>
* {
	outline: 0;
	padding: 0;
	margin: 0;
	font-size: 1rem;
	font-family: helvetica;
	box-sizing: border-box;
}
html, body { height: 100%; }
body {
	display: flex;
	justify-content: center;
	line-height: 1;
}
form { align-self: center; }
fieldset, input {
	padding: 1rem;
	border: 1px solid #000;
	margin-bottom: 1px;
	display: block;
}
input[type="submit"] {
	font-weight: bold;
	cursor: pointer;
}
h3 {
	color: #c00;
	margin-bottom: 1rem;
}
fieldset, b {
	border: 1px solid #808080;
	border-right-color: #000;
	border-bottom-color: #000;
	border-top-left-radius: 0.5rem;
	border-top-right-radius: 0.5rem;
}
b {
	font-size: 1.25rem;
	margin-bottom: 0.5rem;
	display: inline-block;
	color: #039;
	padding: 1rem 1rem 0 1rem;
	border-bottom: 0;
	background: linear-gradient(to bottom, #fff, transparent);
}
fieldset {
	background: #eee;
	box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.25);
}
</style>
HTML;

$H = <<<HTML
<form method="post" accept-charset="utf-8">
	<fieldset>$B
		<legend><b>ADMINISTRADOR</b></legend>
		<input type="text" name="U" placeholder="USUARIO">
		<input type="password" name="P" placeholder="CONTRASEÑA">
		<input type="submit" value="ENTRAR">
	</fieldset>
</form>
HTML;

} else {
	$S = '';
	$B = '';
	$H = '<h1>Consola de administración<a href="/admin/panel">SALIR &raquo;</a></h1>';
	require('cfg/docs/admin.panel.logged.php');
	$H .= $B;
}

echo <<<HTML
<!doctype html>
<html>

<head>
	<title>ADMINISTRADOR</title>
	<link rel="icon" href="../i.png">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<meta name="description" content="Consola de administración">
	<meta name="author" content="OKZGN">
	<meta name="theme-color" content="#211539">
$S
</head>
<body>
$H
</body>
</html>
HTML;

?>
