<?php
$STYLE .= <<<CSS
.U {
	overflow: hidden;
	padding: 0.5rem;
	border-bottom: 1px solid #000;
	transition: all 0.25s;
	background: #f63;
	color: #fff;
}
.S > div, .B > div {
	display: flex;
	background: #666;
}
@media screen and (max-width: 640px){ .S, .B { width: 100%; } }
CSS;

$SCRIPT .= <<<JS
A.updateProps = function(o, k){
	if(k.restriction){ return; }
	(k.restriction = 1),
	(k.form = (k.form || k.origin.closest('form'))),
	(k.fields = (k.fields || k.form.find('fieldset'))),
	(k.a = (k.a || $('.S .U'))), (k.c = (k.c || $('.B .U'))), (k.e = (k.e || $('.S .u'))), (k.f = (k.f || $('.B .u'))),
	o.preventDefault(),
	k.fields.addClass(A.files.style.load),
	$.get(k.form.attr('action'), function(r){
		try { r = JSON.parse(r); } catch(e){ throw e; }
		(X.props = r), k.fields.removeClass(A.files.style.load);

		k.a.css('width', (((r.diskspace_used_percent > 100) ? '100' : r.diskspace_used_percent) + '%')).html(A.updateProps.format(r.diskspace_used)),
		k.e.html('&nbsp;(' + r.diskspace_total + ' ' + r.diskspace_unity + ')'),

		k.c.css('width', (((r.output_used_percent > 100) ? '100' : r.output_used_percent) + '%')).html(A.updateProps.format(r.output_used)),
		k.f.html('&nbsp;(' + r.output_total + ' ' + r.output_unity + ')');

		setTimeout(function(){ delete k.restriction; }, 6789);

	});
};
A.updateProps.format = function(a){ (a = (a + '').split('.')), (a[1] = (!a[1] ? '00' : (a[1] + '0').slice(0, 2))); return a.slice(0, 2).join('.'); }
X.props = function(){ $('[data-action="updateProps"]').click(); };
JS;

$MAIN .= <<<HTML

	<form id="P" action="$C/properties" autocomplete="off">
		<fieldset>
			<legend><h3>Propiedades</h3><a href="#" data-action="updateProps" data-action-event="click">Actualizar</a><a href="#" data-action="help" data-action-event="click">?</a></legend>
			<input type="hidden" name="module" value="$module">
			<label class="S">
				<span>Espacio<b class="u"></b>:</span>
				<div><b class="U"></b></div>
			</label><label class="B">
				<span>Transfer.<b class="u"></b>:</span>
				<div><b class="U"></b></div>
			</label>
			<article>
				<ul>
					<li><b>EL ESPACIO</b> también contiene los archivos necesarios para la funcionalidad de este panel de administración y sitio web.</li>
					<li><b>AL CONSUMIR TODO EL ESPACIO</b> no podrá agregar más datos ni cambios que los hagan.</li>
					<li><b>LA TRANSFERENCIA</b> se consume inclusive al usar este panel de administración.</li>
					<li><b>AL CONSUMIR TODA LA TRANSFERENCIA</b> no se verá el sitio web ni partes o archivos de él, ni algunas funciones de este panel de administración.</li>
					<li><b>PARA RECARGAR O AUMENTAR</b> la transferencia, <b>AÑADIR</b> más espacio, o si necesita <b>AYUDA EXTRA</b> contáctese mediante <a target="_blank" href="https://okzgn.com/#contact"><b>SOPORTE</b></a>.</li>
				</ul>
			</article>
		</fieldset>
	</form>
HTML;
?>
