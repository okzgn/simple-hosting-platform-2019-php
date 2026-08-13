<?php
$STYLE .= <<<CSS
@media screen and (max-width: 640px){ #L label { width: 100%; } }
CSS;

$MAIN .= <<<HTML

	<form id="L" method="post" action="$C/add" autocomplete="off">
		<fieldset>
			<legend><h3>Acceso panel</h3><a data-action="submit" data-action-event="click" href="#">Guardar</a><a href="#" data-action="help" data-action-event="click">?</a></legend>
			<input type="hidden" name="module" value="$module">
			<label><input type="text" name="user" placeholder="Usuario"></label><label><input type="text" name="password" placeholder="Contraseña"></label>
			<article>
				<ul>
					<li><b>NO ES RECOMENDABLE</b> usar nombres de usuario o contraseñas débiles o vacíos.</li>
					<li><b>EL USUARIO Y CONTRASEÑA</b> que estén al hacer clic en <b>GUARDAR</b> serán los nuevos datos de acceso a este panel de administración después de <b>GUARDAR TODO</b>.</li>
					<li><b>EL MÁXIMO DE CARACTERES</b> es de <b>24</b> para el nombre de usuario o contraseña, si uno o ambos tiene más caracteres no se guardará ninguno de los dos.</li>
					<li>Para más información contáctese mediante <a target="_blank" href="https://okzgn.com/#contact"><b>SOPORTE</b></a>.</li>
				</ul>
			</article>
		</fieldset>
	</form>
HTML;
?>
