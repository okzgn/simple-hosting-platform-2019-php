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
fieldset, h1, h6 { padding: 1rem 1rem 0 1rem; }
input { padding: 0.25rem; }
h1, legend, a, h6, .E article h5::before {
	color: #039;
	text-decoration: none;
}
h1, h2, .E legend::before, legend::before { color: #f63; }
h1, legend {
	font-size: 1.25rem;
	text-transform: uppercase;
}
fieldset {
	margin: 1rem;
	border-color: #039;
	background: #f0f0f0;
}
h1 a { margin-left: 1rem; }
h2, h4, h5, fieldset > section > div { margin-bottom: 1rem; }
h2, h4 { text-transform: uppercase; }
h1, h5, h6 { text-align: center; }
body {
	display: flex;
	flex-wrap: wrap;
	width: 100%;
	justify-content: center;
}
div > div {
	display: inline-block;
	vertical-align: top;
	margin: 1rem 1rem 1rem 0;
}
div > div input { width: 9rem; }
body {  }
h1 {
	flex: none;
	width: 100%;
}
form { width: 50%; }
@media screen and (orientation: portrait){
	body { flex-flow: column; }
	form { width: 100%; }
}
legend {
	cursor: pointer;
	border: 1px solid #039;
	border-bottom: 0;
	padding: 0.5rem 0.5rem 0 0.5rem;
}
fieldset, legend { border-radius: 0.5rem; }
.E section, article { display: none; }
.E legend::before, legend::before, .E article h5::before {
	content: '^';
	display: inline-block;
	margin-right: 0.5rem;
	font-weight: bold;
}
.E {
	border: 0;
	padding: 0 0.5rem;
	background: linear-gradient(to bottom, transparent, rgba(0, 0, 0, 0.25));
}
.E legend {
	border: 0;
	padding: 0;
	margin-bottom: 0.5rem;
}
.E legend::before { content: '+'; }
.E article {
	display: block;
	word-break: break-all;
}
.E article h5::before { content: '-'; }
h6 { padding-bottom: 1rem; }
</style>
<script>function C(X){ (!X.parentNode.className ? (X.parentNode.className = 'E') : X.parentNode.removeAttribute('class')); }</script>
HTML;

$U = $_POST['U'];
$D = 'cfg/orders/';
$R = '';
$Q = '';
$J = '';

function d($D, $F){
	if(($F == '.') || ($F == '..')){ return; }
	if(!is_dir($D . $F)){
    	if(is_writable($D . $F)){
    		return unlink($D . $F);
    	}
    	return;
	}
	$D = ($D . $F . '/');
	if($E = opendir($D)){
		while(($F = readdir($E)) !== false){ d($D, $F); }
		closedir($E);
		if(is_dir($D) && is_writable($D)){
			rmdir($D);
		}
	}
}

if($_POST['U'] === $Z['username'] && password_verify($_POST['P'], $Z['password']) && isset($_POST['F']) && file_exists($D . $_POST['F'])){
	$A = (!isset($_POST['A']) ? 0 : $_POST['A']);
	$R = $_POST['F'];
	$F = fopen(($D . $R), 'r+');
	if(flock($F, LOCK_EX)){
		$C = fread($F, 1024);
		if(!$C){
			$J .= '<h5>Intente luego con la órden</h5>';
			fclose($F);
		}
		elseif(($C = unserialize($C, ['allowed_classes' => false])) && is_array($C)){
			unset($_POST['F'], $_POST['U'], $_POST['P'], $_POST['A']);

			if($A == 'd'){
				fclose($F);
				$X = $C;

				$W = fopen(($_SERVER['DOCUMENT_ROOT'] . '/properties'), 'r+');
				if(flock($W, LOCK_EX)){
					$C = fread($W, 1024);
					if(!$C){
						$J .= '<h5>Intente luego eliminar sitio</h5>';
						fclose($W);
					}
					else {
						require('cfg/docs/capacity.php');
						$C['diskspace'] = (($C['diskspace'] * $G) + $X['diskspace'][0] + $C['diskspace_reserved']);
						$C['output'] = (($C['output'] * $G) + $X['output'][0] + $C['output_reserved']);

						fseek($W, 0);
						ftruncate($W, 0);

						fwrite($W, serialize($C));
						fflush($W);
						flock($W, LOCK_UN);
						fclose($W);
						unset($C);
						unlink($D . $R);

						d(($_SERVER['DOCUMENT_ROOT'] . '/' . $X['domainInternal'] . '.localhost'), '');
						$H .= '<h6>Sitio y órden eliminados: ' . $X['domainInternal'] . '.localhost</h6>';
					}
				} else {
					$J .= '<h5>Intente luego eliminar sitio</h5>';
					fclose($W);
				}
			}
			else {

			if($A == 'r'){
				$X = ($_SERVER['DOCUMENT_ROOT'] . '/' . $C['domainInternal'] . '.localhost/cfg/output');
				$X = fopen($X, 'w');
				if(flock($X, LOCK_EX)){
					fwrite($X, '');
					fflush($X);
					flock($X, LOCK_UN);
					fclose($X);
					$J .= '<h5>Recargue transferencia</h5>';
				} else {
					$J .= '<h5>Intente luego recargar transferencia</h5>';
					fclose($X);
				}
			}

			if(isset($_POST['domainInternal']) && isset($C['domainInternal']) &&
				($C['domainInternal'] != $_POST['domainInternal']) && preg_match('/^[a-z0-9]+$/', $_POST['domainInternal'])){
				$X = ($_SERVER['DOCUMENT_ROOT'] . '/' . $_POST['domainInternal'] . '.localhost');

				if(!is_dir($X)){
					rename(($_SERVER['DOCUMENT_ROOT'] . '/' . $C['domainInternal'] . '.localhost'), $X);
					$J .= ('<h5>Cambió dirección interna de "' . $C['domainInternal'] . '" a "' . $_POST['domainInternal'] . '"</h5>');
					$C['domainInternal'] = $_POST['domainInternal'];
				}
				else { $J .= '<h5>Dirección interna ocupada</h5>'; }
			}

			if(isset($_POST['username']) && isset($C['username']) &&
				isset($_POST['password']) && isset($C['password']) &&
				(($C['username'] != $_POST['username']) || (!empty($_POST['password']) && !password_verify($_POST['password'], $C['password'])))){

				$PWD = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : $C['password'];
				$X = ($_SERVER['DOCUMENT_ROOT'] . '/' . $C['domainInternal'] . '.localhost/cfg/login');

				$X = fopen($X, 'w');
				if(flock($X, LOCK_EX)){
					fwrite($X, serialize(['login' => ['username' => $_POST['username'], 'password' => $PWD]]));
					fflush($X);
					flock($X, LOCK_UN);
					fclose($X);

					$J .= '<h5>Cambió usuario o contraseña</h5>';

					$C['username'] = $_POST['username'];
					$C['password'] = $_POST['password'];

				} else {
					$J .= '<h5>Intente luego usuario o contraseña</h5>';
					fclose($X);
				}

			}

			if(isset($_POST['templates']) && isset($C['templates']) &&
				isset($_POST['components']) && isset($C['components']) &&
				(($A == 'a') || ($C['templates'] != $_POST['templates']) || ($C['components'] != $_POST['components']))){
				$X = ($_SERVER['DOCUMENT_ROOT'] . '/' . $C['domainInternal'] . '.localhost/cfg/account');

				$X = fopen($X, 'r+');
				if(flock($X, LOCK_EX)){
					$W = fread($X, 200);
					if(!$W){
						$J .= '<h5>Intente luego plantillas o componentes</h5>';
						fclose($X);
					}
					else {
						$W = unserialize($W, ['allowed_classes' => false]);
						fseek($X, 0);
						ftruncate($X, 0);

						if($A == 'a'){
							if(!isset($W['account']['active'])){
								$J .= '<h5>Sitio ACTIVADO</h5>';
								$W['account']['active'] = 1;
								$W['account']['creation'] = time();
							}
							else {
								$J .= '<h5>Sitio DESACTIVADO</h5>';
								unset($W['account']['active']);
							}
						}
						if(($C['templates'] != $_POST['templates']) || ($C['components'] != $_POST['components'])){
							$J .= '<h5>Cambió plantillas o componentes</h5>';
                            $W['account']['templates'] = (!is_numeric($_POST['templates']) ? $C['templates'] : (int)$_POST['templates']);
                            $W['account']['components'] = (!is_numeric($_POST['components']) ? $C['components'] : (int)$_POST['components']);
							$C['templates'] = $W['account']['templates'];
							$C['components'] = $W['account']['components'];
						}

						fwrite($X, serialize($W));
						fflush($X);
						flock($X, LOCK_UN);
						fclose($X);
						unset($W);
					}
				} else {
					$J .= '<h5>Intente luego plantillas o componentes</h5>';
					fclose($X);
				}
			}

			if(isset($_POST['diskspace']) && isset($C['diskspace']) &&
				isset($_POST['output']) && isset($C['output']) &&
				(($C['diskspace'] != $_POST['diskspace']) || ($C['output'] != $_POST['output']))){

				$I = ['properties' => [
					'diskspace' => ((!is_numeric($_POST['diskspace'][0] * 1) ? $C['diskspace'][0] : $_POST['diskspace'][0]) * 1),
					'diskspace_unity' => ((($_POST['diskspace'][1] == 'MB') || ($_POST['diskspace'][1] == 'GB')) ? $_POST['diskspace'][1] : $C['diskspace'][1]),
					'output' => ((!is_numeric($_POST['output'][0] * 1) ? $C['output'][0] : $_POST['output'][0]) * 1),
					'output_unity' => ((($_POST['output'][1] == 'MB') || ($_POST['output'][1] == 'GB')) ? $_POST['output'][1] : $C['output'][1])
				]];

				if((($C['diskspace'][0] * 1) != $I['properties']['diskspace']) || (($C['output'][0] * 1) != $I['properties']['output'])){
					$E = $C;

					$I['properties']['diskspace_diff'] = ($I['properties']['diskspace'] - $E['diskspace'][0]);
					$I['properties']['output_diff'] = ($I['properties']['output'] - $E['output'][0]);

					$W = fopen(($_SERVER['DOCUMENT_ROOT'] . '/properties'), 'r+');
					if(flock($W, LOCK_EX)){
						$C = fread($W, 1024);
						if(!$C){
							$J .= '<h5>Intente luego espacio o transferencia a principal</h5>';
							fclose($W);
						}
						else {
							require('cfg/docs/capacity.php');
							$_O = ($I['properties']['output'] / $G);

							if((($I['properties']['diskspace_unity'] == 'MB') && (($I['properties']['diskspace_diff'] / $M) > $DISKSPACE_MB)) ||
								(($I['properties']['diskspace_unity'] == 'GB') && (($I['properties']['diskspace_diff'] / $G) > $DISKSPACE_GB))
							){
								$J .= '<h5>Espacio insuficiente</h5>';
								fclose($W);
							}
							elseif((($I['properties']['output_unity'] == 'MB') && (($I['properties']['output'] / $M) > $OUTPUT_MB)) ||
								(($I['properties']['output_unity'] == 'GB') && ($_O < $C['output_gbs_parts']) && ($_O > $OUTPUT_GB)) ||
								(($I['properties']['output_unity'] == 'GB') && ($_O >= $C['output_gbs_parts']) && ($_O > $OUTPUT_GBS))
							){
								$J .= '<h5>Transferencia insuficiente</h5>';
								fclose($W);
							}
							else {
								$C['diskspace'] = (($C['diskspace'] * $G) + $C['diskspace_reserved'] + ($I['properties']['diskspace_diff'] * -1));
								$C['output'] = (($C['output'] * $G) + $C['output_reserved'] + ($I['properties']['output_diff'] * -1));

								fseek($W, 0);
								ftruncate($W, 0);

								fwrite($W, serialize($C));
								fflush($W);
								flock($W, LOCK_UN);
								fclose($W);
								unset($C);

								$J .= '<h5>Cambió espacio o transferencia principal</h5>';

								$X = ($_SERVER['DOCUMENT_ROOT'] . '/' . $E['domainInternal'] . '.localhost/cfg/properties');
								$X = fopen($X, 'w');
								if(flock($X, LOCK_EX)){
									unset($I['properties']['diskspace_diff'], $I['properties']['output_diff']);
									fwrite($X, serialize($I));
									fflush($X);
									flock($X, LOCK_UN);
									fclose($X);

									$J .= '<h5>Cambió espacio o transferencia de cliente</h5>';
									$E['diskspace'][0] = $I['properties']['diskspace'];
									$E['diskspace'][1] = $I['properties']['diskspace_unity'];
									$E['output'][0] = $I['properties']['output'];
									$E['output'][1] = $I['properties']['output_unity'];
									unset($I);
								} else {
									$J .= '<h5>Intente luego espacio o transferencia a cliente</h5>';
									fclose($X);
								}
							}
						}
					} else {
						$J .= '<h5>Intente luego espacio o transferencia a principal</h5>';
						fclose($W);
					}
					$C = $E;
				}
			}

			if(isset($_POST['coupon']) && isset($C['coupon']) &&
				($C['coupon'] != $_POST['coupon'])){

				$J .= ('<h5>Cambió cupón de "' . $C['coupon'] . '" a "' . $_POST['coupon'] . '"</h5>');
				$C['coupon'] = $_POST['coupon'];
			}

			if(isset($_POST['domainNames']) && isset($C['domainNames']) &&
				($C['domainNames'] != $_POST['domainNames'])){

				$J .= ('<h5>Cambiaron las direcciones web de "' . $C['domainNames'] . '" a "' . $_POST['domainNames'] . '"</h5>');
				$C['domainNames'] = $_POST['domainNames'];
			}

			fseek($F, 0);
			ftruncate($F, 0);

			fwrite($F, serialize($C));
			fflush($F);
			flock($F, LOCK_UN);
			fclose($F);

			}
		}
		else {
			$J .= '<h5>Contenido incorrecto en la órden</h5>';
			fclose($F);
		}

	} else {
		$J .= '<h5>Intente luego con la órden</h5>';
		fclose($F);
	}
	unset($_POST);
}
$C = 0;
$L = '';
foreach(scandir($D) as $F){
	if($F == '.' || $F == '..' || $F == '.htaccess' || is_dir($D . $F)){ continue; }
	try { $X = unserialize(file_get_contents($D . $F), ['allowed_classes' => false]); } catch (Exception $E){ $X = 0; }
	if($X === 0 || !is_array($X)){ continue; }
	$L = $X['domainInternal'];
	if($R == $F){ $Q = (!$J ? '' : $J); } else { $Q = ''; }
	$Y = '';
	foreach($X as $K => $V){
		if($K == 'password'){ $V = ''; }
		$T = gettype($V);
		switch($T){
			case 'array':
				$Y .= '<div><h4>' . $K . '</h4><input type="hidden" name="' . $K . '">';
				$Y .= '<p><b>0:</b> <input type="text" name="' . $K . '[0]" value="' . $V[0] . '"></p><p><b>1:</b> <input type="text" name="' . $K . '[1]" value="' . $V[1] . '"></p>';
				$Y .= '</div>';
			break;
			default:
			if($T == 'string' || $T == 'integer' || $T == 'double'){
				$Y .= '<p><b>' . $K . ':</b>';
				$Y .= ' <input type="' . (($K != 'password') ? 'text' : $K) . '" name="' . $K . '" value="' . $V . '"></p>';
			}
		}
	}

	$H .= <<<HTML
<form id="$F" action="#$F" method="post" accept-charset="utf-8">
	<fieldset class="E">
		<legend onclick="C(this);">$L: $F</legend>
		<article>$Q</article>
		<section>
			<input type="hidden" name="F" value="$F">
			<input type="hidden" name="U" value="$U">
			<input type="password" name="P" placeholder="CONTRASEÑA">
			<input type="submit" value="GUARDAR"><br><br>
			<input type="radio" name="A" value="0" checked> <b>Solo guardar</b><br><br>
			<input type="radio" name="A" value="a"> <b>Activar/Desactivar sitio y guardar</b><br><br>
			<input type="radio" name="A" value="r"> <b>Recargar transferencia</b><br><br>
			<input type="radio" name="A" value="d"> <b>Eliminar órden y sitio</b><br><br>
			<div>$Y</div>
		</section>
	</fieldset>
</form>
HTML;
$C++;
}

if(!$C){ $H .= '<h6>Aún no hay órdenes de compra.</h6>'; }

?>
