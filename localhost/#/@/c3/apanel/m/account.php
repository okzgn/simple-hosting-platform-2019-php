<?php
$O = ($C . 'logout');
$STYLE .= <<<CSS
nav {
	position: relative;
	z-index: 2;
	text-align: right;
	padding: 1rem 0.5rem;
	margin-left: auto;
}
nav li {
	display: inline-block;
	padding: 0 0.5rem;
}
nav li:first-child { padding-left: 0; }
nav li:last-child { padding-right: 0; }
nav, nav a { color: #666; }
nav a { font-weight: bold; }
@media screen and (max-width: 640px){
	nav {
		margin: 3.2rem 0 0 0;
		text-align: center;
	}
	main { height: calc(100% - 6.4rem); }
}
body > section { display: none; }
section form {
	margin: 0 auto;
	width: 40%;
	text-align: left;
}
section fieldset { margin: 0 0.5rem; }
section label {
	width: 100%;
	word-break: break-all;
}
@media screen and (max-width: 640px){ section form { width: 100%; } }
article { display: none; }
.MESSAGE, .MESSAGE .x, .MESSAGE section { -webkit-tap-highlight-color: transparent; }
.MESSAGE section {
	background: #f63;
	padding: 1rem;
	color: #fff;
	margin: 0 0.5rem;
	box-shadow: 0 0 1rem rgba(0, 0, 0, 0.25);
}
.MESSAGE a.ok {
	color: #f63;
	display: inline-block;
	padding: 0.5rem 1rem;
	background: #fff;
	color: #211539;
	margin-top: 1rem;
	font-weight: bold;
}
.MESSAGE a { color: #fff; }
.MESSAGE a:hover, .MESSAGE a:active, .MESSAGE a:focus { text-decoration: underline; }
.MESSAGE section, .help { text-shadow: 0 1px 1px rgba(0, 0, 0, 0.25); }
[data-action="help"]{
	background: linear-gradient(to bottom, rgba(0, 0, 0, 0.125), rgba(0, 0, 0, 0.25));
	padding: 0 0.4rem;
	border-radius: 50%;
	text-shadow: 0 0 1px #fff;
}
.help { padding: 0 0 1rem 0 !important; }
.help h2 {
	text-transform: uppercase;
	background: #fff;
	color: #f63;
	padding: 1rem;
}
.help ul { padding: 1rem 1rem 0 1rem; }
.help li { margin-bottom: 1rem; }
.help li:last-child { margin-bottom: 0; }
.help li::before {
	content: '';
	display: inline-block;
	width: 0.375rem;
	height: 0.375rem;
	background: rgba(255, 255, 255, 0.5);
	border-radius: 50%;
	vertical-align: middle;
	margin-right: 1rem;
}
@media screen and (min-width: 1024px){
	.help {
		width: 50%;
		align-self: center;
	}
}
@media screen and (max-width: 560px),
	screen and (max-height: 560px){
	.help li::before {
		width: 0.375rem;
		height: 0.375rem;
	}
	[data-action="help"]{ padding: 0 0.325rem; }
}
@media screen and (max-width: 440px),
	screen and (max-height: 440px){
	.help li::before {
		width: 0.3rem;
		height: 0.3rem;
	}
	[data-action="help"]{ padding: 0 0.25rem; }
}
@media screen and (max-width: 320px),
	screen and (max-height: 320px){
	.help li::before {
		width: 0.225rem;
		height: 0.225rem;
	}
}
@media screen and (max-width: 240px),
	screen and (max-height: 240px){
	.help li::before {
		width: 0.15rem;
		height: 0.15rem;
	}
}
@media screen and (max-width: 560px) and (max-height: 560px),
	screen and (max-width: 440px) and (max-height: 440px),
	screen and (max-width: 320px),
	screen and (max-height: 320px){

	.x section {
		height: 100%;
		overflow-y: auto;
	}
}
CSS;

$SCRIPT .= <<<JS
A.requireClose = function(o, k){ o.preventDefault(), k.cancel(k.communicateRef); };
A.require = function(o, k){
	k.submit = (k.submit || {});
	k.cancel = function(t){
		clearTimeout(A.require.t), (A.require.t = setTimeout(function(){
			if(typeof k.cancelFn == 'function'){ k.cancelFn.call(t, o, k); }
			if((typeof k.closeFn == 'function') && (k.closeFn.call(t, o, k) == 'stop')){ return; }
			QX();
		}, (t.effectTimeOut || (t.outTimeEnd - (new Date).getTime()) + 1000)));
	};
	return Q({
		sections: k.requiredObject,
		forward: '[type="submit"]',
		keydownFn: function(e){
			switch(e.which){
				case 13: this.ref.objRef.box.find(this.ref.args.forward).click(); break;
				case 27: k.cancel(this);
			}
		},
		disposition: 'finite',
		finiteFn: function(){ return 0; },
		clickFn: function(i){ return (i = $(i.target)), ((i.is(k.requiredObject) || !i.closest(k.requiredObject).length) ? k.cancel(this) : 0); },
		addons: {
			styleIn: 'in',
			styleOut: 'out',
			effectTimeIn: 125,
			effectTimeOut: 125,
			enterFn: function(t){
				(t = this), clearTimeout(A.require.t);
				if(typeof k.openFn == 'function'){ k.openFn.call(t, o, k); }
				A({
					targetObj: this.messageBox.find('[data-action="submit"]'),
					action: Object.assign({
						destinyStr: '.m',
						destinyMethod: 'after',
						doneFn: function(){
							(t.submit = this), clearTimeout(A.require.t);
							return ((this.r.indexOf('data-ok') != -1) ? (((typeof k.submit.okFn != 'function') ? 0 : k.submit.okFn.call(t, o, k)), k.cancel(this)) : ((delete this.origin.restriction), ((typeof k.submit.notFn != 'function') ? 0 : k.submit.notFn.call(t, o, k))));
						}
					}, k.submit)
				});
				A({ targetObj: this.messageBox.find('button:not([data-action="submit"])'), action: { communicateRef: t, cancel: k.cancel } });
				t.messageBox.find('input[type="text"], input[type="password"], textarea').first().focus();
			}
		}
	});
};
A.help = function(o, k){
	o.preventDefault(), Communicate({ style: "MESSAGE", message: function(M){
		if(!k.helpContent){
			(M = $(k.origin).closest('form'));
			return ('<section class="help"><h2>Ayuda: ' + (k.helpTitle || M.find(k.helpTitleStr || 'legend h3').text()) + '</h2>' + M.find('article').html() + '<a class="ok" onclick="C.remove();">Cerrar</a></section>');
		}
		(M = $(k.helpContent));
		return ('<section class="help"><h2>Ayuda: ' + (k.helpTitle || M.find(k.helpTitleStr).text()) + '</h2>' + M.html() + '<a class="ok" onclick="C.remove();">Cerrar</a></section>');
	}});
};
X.message = function(z){
	if(window['sessionStorage']){
		if(!sessionStorage.getItem('OKZGN-MESSAGE')){ sessionStorage.setItem('OKZGN-MESSAGE', 1); }
		else { z = 1; }
	}
	if(!z){ Communicate({ style: "MESSAGE", message: '<section><span><b>SI NO GUARDA TODO</b> perderá cualquier cambio y no se verá al actualizar o cerrar el panel.<br><a class="ok" onclick="C.remove();">Aceptar</a></span></section>' }); }
};
JS;

$X = (isset($_SESSION['X']) ? '<li><b>FECHA DE TERMINACIÓN DEL SITIO WEB Y ACUERDO DE SERVICIOS: ' . date("Y-m-d H:i", $_SESSION['X']) . '</b></li>' : '');

$BODY .= <<<HTML
	<nav><ul><li><a data-action="require" href="#" data-action-event="click" data-required-object="#saveAll">Guardar todo</a></li><li><a data-action="help" href="#" data-action-event="click" data-help-content="#help" data-help-title="General">?</a></li><li><a href="$O">Salir &gt;</a></li></ul></nav>
	<article id="help">
		<ul>
			<li><b>SI NO GUARDA TODO</b> perderá cualquier cambio y no se verá al actualizar o cerrar el panel.</li>
			<li>Para más información contáctese mediante <a target="_blank" href="https://okzgn.com/#contact"><b>SOPORTE</b></a>.</li>
			$X
		</ul>
	</article>
	<section id="saveAll">
		<form method="post" action="$C/save" autocomplete="off">
			<fieldset>
				<legend>Guardar todo</legend>
				<label class="m">Contraseña actual:</label>
				<label><input type="password" name="p"></label>
				<label class="r"><input type="submit" value="Guardar" data-action="submit" data-action-event="click"> <button data-action="requireClose" data-action-event="click">Cerrar</button></label>
			</fieldset>
		</form>
	</section>
HTML;

?>
