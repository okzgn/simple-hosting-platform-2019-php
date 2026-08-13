<?php
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
fieldset, input {
	border: 1px solid #000;
	margin-bottom: 1px;
}
input[type="submit"] {
	font-weight: bold;
	cursor: pointer;
}
input { padding: 0.25rem; }
h1, legend, a {
	color: #039;
	text-decoration: none;
}
h1, h2, legend::before { color: #f63; }
h1 { text-align: center; }
h1, legend {
	font-size: 1.25rem;
	text-transform: uppercase;
}
fieldset {
	border-color: #039;
	background: #f0f0f0;
	padding: 1rem 1rem 0 1rem;
	margin: 1rem;
}
fieldset > section > div { margin-bottom: 1rem; }
section > div, body {
	display: flex;
	flex-wrap: wrap;
}
body { justify-content: center; }
div > div {
	margin: 0 1rem 1rem 0;
}
div > div:last-child { margin-right: 0; }
div > div input { width: 5rem; }
h1 a { margin-left: 1rem; }
h2, h4 {
	margin-bottom: 1rem;
	text-transform: uppercase;
}
h2 {
	text-align: center;
	margin: 1rem;
}
legend {
	cursor: pointer;
	border: 1px solid #039;
	border-bottom: 0;
	padding: 0.5rem 0.5rem 0 0.5rem;
}
fieldset, legend { border-radius: 0.5rem; }
.E {
	border: 0;
	padding: 0 0.5rem;
	background: linear-gradient(to bottom, transparent, rgba(0, 0, 0, 0.25));
}
.E legend::before, legend::before {
	content: '+';
	display: inline-block;
	margin-right: 0.5rem;
	font-weight: bold;
}
.E legend {
	margin-bottom: 0.5rem;
	border: 0;
	padding: 0;
}
.E section, article { display: none; }
.E article { display: block; }
legend::before { content: '^'; }
h1 {
	flex: none;
	width: 100%;
	padding: 1rem 1rem 0 1rem;
}
form { width: 50%; }
label {
	margin: 1rem 1rem 0 0;
	padding: 0.25rem;
	border: 1px solid #808080;
	font-weight: bold;
}
label.N { background: #ccc; }
article { word-break: break-all; }
@media screen and (orientation: portrait){
	body { flex-flow: column; }
	form { width: 100%; }
}
</style>
<script>function C(X){ (!X.parentNode.className ? (X.parentNode.className = 'E') : X.parentNode.removeAttribute('class')); }</script>
HTML;

$U = $_POST['U'];
$D = ($_SERVER['DOCUMENT_ROOT'] . '/');
$R = '';
$N = '';
$J = '';
$W = '';

if($_POST['U'] === $Z['username'] && password_verify($_POST['P'], $Z['password']) && isset($_POST['F']) && (strpos($_POST['F'], '/') === false) && (strpos($_POST['F'], '.') === false)){
	$R = $_POST['F'];
	unset($_POST['U'], $_POST['P'], $_POST['F']);
	switch($R){
		case 'B':
			$_POST['N'] = (!isset($_POST['N']) ? '' : $_POST['N']);
			if($_POST['N'] && (strpos($_POST['N'], '/') === false) && !preg_match('/[^a-zA-Z0-9\.\,]/', $_POST['N'])){
				if(strpos($_POST['N'], ',') !== false){
					if(strpos($_POST['N'], ',,,') === false){
						$_POST['N'] = explode(',', $_POST['N']);
						$I = 0;
						foreach($_POST['N'] as $F){
							if(!$F || file_exists($D . 'c3/blocked/' . $F)){ continue; }
							file_put_contents(($D . 'c3/blocked/' . $F), '');
							$I++;
						}
						$J = ($I ? ('<h2>Se agregó: ' . $I . ' elementos</h2>') : '<h2>No se agregó</h2>');
					}
					else { $J = '<h2>Mal escrito</h2>'; }
				} else {
					file_put_contents(($D . 'c3/blocked/' . $_POST['N']), '');
					$J = ('<h2>Se agregó: ' . $_POST['N'] . '</h2>');
				}
			}
			unset($_POST['N']);

			$_POST['I'] = ((!isset($_POST['I']) || !is_array($_POST['I'])) ? [] : $_POST['I']);
			if(isset($_POST['I'][0])){
				foreach($_POST['I'] as $F){
					if(file_exists($D . 'c3/blocked/' . $F) && ($F != '.') && ($F != '..') && (strpos($F, '/') === false)){
						unlink($D . 'c3/blocked/' . $F);
					}
				}
				$J .= ('<h2>Se borró: ' . implode(', ', $_POST['I']) . '</h2>');
			}
			unset($_POST['I']);
		break;
		default:
		if(file_exists($D . $R)){
			$F = fopen(($D . $R), 'w');
			if(flock($F, LOCK_EX)){
    			if(isset($_POST['password'])){
                    if(!empty($_POST['password'])){
                        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    }
                    else {
                        $OD = unserialize(file_get_contents($D . $R), ['allowed_classes' => false]);
                        $_POST['password'] = isset($OD['password']) ? $OD['password'] : '';
                    }
    			}

				fwrite($F, serialize($_POST));
				fflush($F);
				flock($F, LOCK_UN);
			} else { $W = '<h2>Intente luego</h2>'; }
			fclose($F);
		}
	}
}

foreach(scandir($D) as $F){
	if($F == '.' || $F == '..' || is_dir($D . $F)){ continue; }
	if(strpos($F, '.') !== false && strpos($F, '.copy') === false){ continue; }
	$X = unserialize(file_get_contents($D . $F), ['allowed_classes' => false]);
	if(!is_array($X)){ continue; }
	if($R == $F){ $N = (!$W ? '<h2>Acción realizada</h2>' : $W); } else { $N = ''; }
	$Y = '';
	foreach($X as $K => $V){
		$T = gettype($V);
		switch($T){
			case 'array':
				$Y .= '<div><h4>' . $K . '</h4><input type="hidden" name="' . $K . '">';
				foreach($V as $KK => $VV){
					if($KK == 'password'){ $VV = ''; }
					$T = gettype($VV);
					if($T == 'string' || $T == 'integer' || $T == 'double'){
						$Y .= '<p><b>' . $KK . ':</b>';
						$Y .= ' <input type="text" name="' . $K . '[' . $KK . ']" value="' . $VV . '"></p>';
					}
				}
				$Y .= '</div>';
			break;
			default:
			if($T == 'string' || $T == 'integer' || $T == 'double'){
				$Y .= '<p><b>' . $K . ':</b>';
				$Y .= (($K !== 'password') ? (' <input type="text" name="' . $K . '" value="' . $V . '"></p>') : (' <input type="' . $K . '" name="' . $K . '"></p>'));
			}
		}
	}

	$H .= <<<HTML
<form id="$F" action="#$F" method="post" accept-charset="utf-8">
	<fieldset class="E">
		<legend onclick="C(this);">$F</legend>
		<article>$N</article>
		<section>
			<input type="hidden" name="F" value="$F">
			<input type="hidden" name="U" value="$U">
			<input type="password" name="P" placeholder="CONTRASEÑA">
			<input type="submit" value="GUARDAR"><br><br>
			<div>$Y</div>
		</section>
	</fieldset>
</form>
HTML;

}

$B .= <<<HTML
<form id="B" action="#B" method="post">
	<fieldset class="E">
		<legend onclick="C(this);">BLOCKED</legend>
		<article>$J</article>
		<section>
			<input type="hidden" name="F" value="B">
			<input type="hidden" name="U" value="$U">
			<input type="password" name="P" placeholder="CONTRASEÑA">
			<input type="submit" value="GUARDAR"><br><br>
			<input type="text" name="N" placeholder="AGREGAR"><br>
			<div>
HTML;

foreach(scandir($D . 'c3/blocked/') as $F){
	if(($F == '.') || ($F == '..')){ continue; }
	$T = (($F[0] != '.') ? ' class="N"' : '');
	$B .= ('<label' . $T . '><input type="checkbox" name="I[]" value="' . $F . '"> ' . (!$T ? substr($F, 1) : $F) . '</label>');
}

$B .= <<<HTML
			</div>
		</section>
	</fieldset>
</form>
HTML;

?>
