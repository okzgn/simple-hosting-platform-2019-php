<?php
$STYLE .= <<<CSS
.Q {
	width: 25%;
}
.q {
	width: 75%;
	vertical-align: bottom;
}
.q input { width: 3rem !important; }
.q input + span {
	display: inline-block;
	padding: 0 0.5rem;
}
@media screen and (max-width: 640px){
	#S .Q { width: 42%; }
	#S .q { width: 58%; }
	#S .q input + span:last-child {
		display: block;
		margin-top: 0.25rem;
		padding-left: 0;
	}
}
CSS;

if(!isset($_SESSION['S'])){ $_SESSION['S'] = unserialize(file_get_contents($_SESSION['F'] . 'security'), ['allowed_classes' => false]); }

$a = $_SESSION['S']['timeCountStart'];
$b = $_SESSION['S']['timeCountEnd'];
$c = $_SESSION['S']['maxReqsPerTimeCount'];

$MAIN .= <<<HTML
	<form id="S" method="post" action="$C/add" autocomplete="off">
		<fieldset>
			<legend><h3>Visitas</h3><a data-action="submit" data-action-event="click" href="#">Guardar</a><a href="#" data-action="help" data-action-event="click">?</a></legend>
			<input type="hidden" name="module" value="$module">
			<label class="Q"><span>Máx. Accesos:</span><input type="text" name="c" value="$c"></label><label class="q"><span>Entre cada:</span><input type="text" name="a" value="$a"><span>a</span><input type="text" name="b" value="$b"><span>segundos.</span></label>
			<article>
				<ul>
					<li><b>NO ES RECOMENDABLE</b> cambiar los datos del controlador de visitas sin entender bien qué es y cómo funciona.</li>
					<li><b>EL MÁXIMO DE ACCESOS</b> mínimo es de <b>2</b> y el límite es de <b>100</b> para cada intervalo.</li>
					<li><b>EL MÁXIMO DE ACCESOS</b> aumenta ligeramente en proporción al intervalo.</li>
					<li><b>EL INICIO DEL INTERVALO</b> mínimo es de <b>1</b> segundo y el máximo es de <b>10</b> segundos.</li>
					<li><b>EL FINAL DEL INTERVALO</b> mínimo es de <b>11</b> segundos, el máximo es de <b>120</b> segundos, y disminuye según el inicio del intervalo.</li>
					<li><b>PARA CONFIGURAR</b> ingrese los datos, haga clic en <b>Guardar</b> y se efectuará después de <b>GUARDAR TODO</b>.</li>
					<li><b>SI INGRESA DATOS SUPERIORES</b> se cambiarán por los límites respectivos.</li>
					<li>Para más información contáctese mediante <a target="_blank" href="https://okzgn.com/#contact"><b>SOPORTE</b></a>.</li>
				</ul>
			</article>
		</fieldset>
	</form>
HTML;
?>
