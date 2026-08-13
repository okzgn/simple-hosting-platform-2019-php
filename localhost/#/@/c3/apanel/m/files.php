<?php
$U = ($_SERVER['DOCUMENT_ROOT'] . '/c3/apanel/u/' . $_GET['site'] . '/');
if(!is_dir($U)){ mkdir($U, 0777, 1); }
if(!isset($_SESSION['U'])){ $_SESSION['U'] = $U; }
if($F = opendir($U)){
	while(($Y = readdir($F)) !== false){ if(($Y != '.') && ($Y != '..')){ unlink($U . $Y); } }
	closedir($F);
}

// Discarding previously unsaved uploaded files
unset($_SESSION['C']['files'], $_SESSION['C']['move']);

$STYLE .= <<<CSS
#F, .M { width: 100% !important; }
.M ::placeholder {
	color: #000;
	opacity: 0.5;
}
.M span, .M ul { align-self: center; }
.M span {
	margin: 0 0.5rem 0 0;
	flex: none;
}
.M input { flex-grow: 1; }
.M ul {
	font-weight: bold;
	flex: none;
	margin-left: 0.5rem;
}
.M li {
	flex: none;
	margin-right: 1rem;
}
.M li:last-child { margin-right: 0; }
@media screen and (max-width: 800px){
	.M { flex-wrap: wrap !important; }
	.M span {
		margin-right: 0;
		margin-bottom: 0.25rem;
	}
	.M ul {
		width: 100%;
		margin-left: 0;
	}
	.M li { margin-top: 1rem; }
}
#F [data-err], #F [data-ok] {
	margin: 0;
	width: 100%;
	padding-top: 0.5rem;
}
#F div, .M ul { flex-wrap: wrap !important; }
#F div {
	margin: 1rem 0 0 0.5rem;
	max-height: 15.5rem;
	overflow: auto;
	height: 0;
	opacity: 0;
}
#F div, .M ul { display: none; }
.M, #F .E, #F div label {
	display: flex;
	flex-flow: row;
}
#F .E { animation: E 0.5s ease 0s normal 1 forwards; }
@keyframes E {
	to {
		opacity: 1;
		height: auto;
	}
}

.M a, #F div a, .m a { color: #000; }
.M a:hover, .M a:active, .M a:focus,
#F div a:hover, #F div a:active, #F div a:focus { color: #06f; }
#F div label {
	justify-content: flex-start;
	height: 2rem;
	padding: 0;
	margin-top: 0.25rem;
}
@media screen and (min-width: 800px){
	#F div label { width: 20%; }
	#F div label:nth-child(1), #F div label:nth-child(2), #F div label:nth-child(3), #F div label:nth-child(4), #F div label:nth-child(5){ margin-top: 0; }
}
@media screen and (min-width: 640px) and (max-width: 799px){
	#F div label { width: 25%; }
	#F div label:nth-child(1), #F div label:nth-child(2), #F div label:nth-child(3), #F div label:nth-child(4){ margin-top: 0; }
}
@media screen and (min-width: 480px) and (max-width: 639px){
	#F div label { width: 33.33%; }
	#F div label:nth-child(1), #F div label:nth-child(2), #F div label:nth-child(3){ margin-top: 0; }
}
@media screen and (min-width: 320px) and (max-width: 479px){
	#F div label { width: 50%; }
	#F div label:nth-child(1), #F div label:nth-child(2){ margin-top: 0; }
}
@media screen and (max-width: 319px){
	#F div label { width: 100%; }
	#F div label:nth-child(1){ margin-top: 0; }
}
#F div span, .I {
	display: flex;
	flex-flow: column;
	justify-content: flex-end;
	width: 2rem;
	height: 2rem;
	text-align: center;
	font-size: 63%;
	margin: 0;
	color: rgba(255, 255, 255, 0.875);
	padding: 0.05rem 0;
	flex: none;
}
#F .p span, #F .f span {
	font-size: 100%;
	color: #039;
}
#F .p span, #F .f span, #F .NOEXT { justify-content: center; }
#F .p span, #F .f span { background: #ccc; }
#F .f { background: #fff; }
#F div a {
	word-break: break-all;
	line-height: 2;
	height: 2rem;
	padding: 0 0.5rem;
	flex-grow: 1;
}
#F div a:hover, #F div a:active, #F div a:focus { background: #fff; }
#F div label, #F div span, #F div a { overflow: hidden; }
#F div input {
	width: 1.125rem;
	height: 1.125rem;
	align-self: center;
	position: relative;
	flex: none;
}
#F .DIR input { top: -0.25rem; }
#F span:not(.DIR) input { top: 0.125rem; }
#F .NOEXT { background-position: center center; }
#F .NOEXT b { display: none; }
#F .NOEXT input { top: 0 !important; }
#F .S { background: rgba(255, 102, 51, 0.125); }
.m span {
	display: inline-block;
	margin: 0 0.5rem 0 0;
}
.j {
	text-align: right;
	color: #808080;
	font-size: 85%;
}
#edit form { width: 100%; }
#edit legend {
	border: 0;
	background: transparent;
	text-transform: none !important;
	height: calc(3rem + 1px);
	overflow: hidden;
	word-break: break-all;
	position: absolute;
	padding: 0 0 0 0.5rem;
	display: flex;
	flex-flow: column;
	justify-content: center;
	left: 0;
}
#edit legend.l { text-align: left; }
#edit legend, #edit .r { width: 50%; }
#edit .r {
	display: block;
	margin-left: auto;
	padding: 0.5rem 0.5rem 0.5rem 0;
}
#edit [data-action="requireClose"] { padding: 0.5rem 1rem; }
#edit p { margin: 0; }
#edit fieldset, #edit label {
	margin: 0;
	padding: 0;
	border: 0;
}
#edit .m textarea { height: calc(100vh - 9.25rem); }
#edit .m iframe { display: block !important; }
#action .h { width: 50%; }
.J { display: flex !important; }
.J span { margin-right: 0; }
.J input, .J span { align-self: center; }
.J .I { margin-right: 0.5rem; }
.J .DIR {
	display: flex;
	flex-flow: column;
	justify-content: center;
}
.J .okzgn b { height: 0.6rem; }
.tox-tinymce { border-radius: 0 !important; }
CSS;

$SCRIPT .= <<<JS

A.files = function(o, k){
	if(!A.files.previousFolder){ A.files.init(o, k); }
	if(o.which == 13){ o.preventDefault(); }
	A.files.val = (A.files.input.val() || A.files.init.folder);
	if((A.files.folder = (A.files.trim(A.files.val) || A.files.init.folder)) && (A.files.folder == A.files.previousFolder)){ return; }
	A.files.wait(A.files.folder, A.files.val);
};
A.files.empty = function(x, y){ for(y in x){} return !y; };
A.files.count = function(x, y, z){ y = 0; for(z in x){ y++; } return y; };
A.files.trim = function(x){ return x.replace(/[\\\/]+/g, '/').replace(/(^|[\/])\.+([\/]|$)/g, '').replace(/^\/+|\/+$/g, ''); };
A.files.init = function(o, k, s){
	s = A.files;
	s.input = (s.input || $(k.input));
	s.output = (s.output || $(k.output));
	s.options = (s.options || $(k.options));
	s.handler = (s.handler || k.origin.closest('form').attr('action'));
	s.trigger = (s.trigger || function(){ k.origin[k.actionEvent](); });
	s.style.ref = (s.style.ref || s.style.object());
	A.files.style.icons['DIR'] = (A.files.style.icons['DIR'] || A.files.icons.folders('DIR'));
};
A.files.init.folder = '/';
A.files.init.count = 0;
A.files.cache = {};
A.files.style = {
	load: 'l',
	open: 'E',
	std: 'S',
	icons: {},
	object: function(){ return $('<style id="Fs"></style>').appendTo('head'); }
};
A.files.wait = function(x, y, z){
	A.files.input.removeClass(A.files.style.load), A.files.options.removeClass(A.files.style.open), A.files.output.removeClass(A.files.style.open);
	clearTimeout(A.files.wait.a), clearTimeout(A.files.wait.z);
	z = ((A.files.cache[x]) ? Math.round(A.files.wait.time / 1.5) : A.files.wait.time);
	A.files.wait.a = setTimeout(function(){ A.files.fn(x), (A.files.val = y), (A.files.previousFolder = x); }, z);
	A.files.wait.z = setTimeout(function(){ A.files.input.addClass(A.files.style.load); }, Math.round(z / 2));
};
A.files.wait.time = 1456;
A.files.fn = function(x){
	if(!A.files.cache[x]){ A.files.fn.get(x, A.files.implement); }
	else { A.files.implement(A.files.cache[x]); }
};
A.files.fn.get = function(x, e, o, n){
	(x = ((typeof x != 'string') ? x : { f: x })), (o = (($.type(this) != 'string') ? 'save' : this));
	$.post(A.files.handler, x, function(u, s, i){
		try { if(s != 'success'){ throw new Error(); } else { s = $.parseJSON(u); } }
		catch(u){ s = { error: 'Bad data transfer' }; }
		(s.files = A.files.fn.get.save.clean(s.files)),
		(s.folders = A.files.fn.get.save.clean(s.folders)),
		(s = { files: s, data: x }),
		A.files.fn.get[o].call(s);
		if(typeof e == 'function'){ e.call(s, A.files.cache[x.f]); }
	});
};
A.files.fn.get.update = function(i, a, m){
	(m = A.files.cache[this.data.f]), (i = A.files.fn.get.update.list);
	for(a in this.files){ m[a] = ((typeof i[a] != 'function') ? this.files[a] : i[a](m[a], this.files[a])); }
};
A.files.fn.get.update.list = { files: Object.assign, folders: Object.assign };
A.files.fn.get.save = function(){ (this.files.id = this.data.f), (this.files.val = A.files.val), (A.files.cache[this.files.id] = this.files); };
A.files.fn.get.save.clean = function(x, y){ for(y in x){ (x[atob(y)] = []), (delete x[y]); } return x; }
A.files.implement = function(i){
	var x = ($.type(this) == 'string'), y, z;
	for(z in (y = (!x ? i : $.trim(this).split(/\s+/)))){
		(z = (!x ? z : y[z])), (this.section = i[z]);
		if((z = A.files.implement[z]) && (z.apply(this, arguments) == 'stop')){ break; }
	}
	if((++A.files.init.count == 1) && ((typeof A.files.init.fn) == 'function')){ A.files.init.fn.call(i); }
};
A.files.implement.folder = function(x){ A.files.input.removeClass(A.files.style.load).val(x.val), A.files.output.empty().addClass(A.files.style.open); };
A.files.implement.error = function(){ A.files.output.append('<p data-err>' + this.section + '</p>'); };

A.files.implement.message = function(){ A.files.output.append('<p data-ok>' + this.section + '</p>'); };
A.files.implement.message.textEmpty = 'Sin archivos';
A.files.implement.message.remove = function(){ A.files.output.find('[data-ok]').remove(); };

A.files.implement.files = function(x, y){ for(y in this.section){ A.files.implement.files.file.object(y, { section: A.files.cache[x.id].files, type: 'file', files: A.files.cache[x.id], current: y }); } };
A.files.implement.folders = function(x, y){ for(y in this.section){ A.files.implement.folders.folder.object(y, { section: A.files.cache[x.id].folders, type: 'folder', files: A.files.cache[x.id], current: y }); } };
A.files.implement.range = function(x, y){
	y = A.files.implement.range;
	if(y.parts.ref){ y.parts.ref.remove(), (delete y.parts.ref); }
	if(this.section){ y.parts.ref = y.parts.object(x); }
}
A.files.implement.range.parts = {
	text: '<label class="p"><span><b>&gt;</b></span><a href="#"><b>Siguientes</b></a></label>',
	textLoad: 'Cargando...',
	object: function(y, o){ (o = $(A.files.implement.range.parts.text).appendTo(A.files.output)); o.find('a').on('click', y, A.files.implement.range.parts.fn); return o; },
	fn: function(i, m){
		(m = $(this)), m.addClass(A.files.style.load).text(A.files.implement.range.parts.textLoad).blur();
		A.files.fn.get.call('update', { f: i.data.id, s: i.data.range }, function(y, o){
			for(o in y){ if(!this.files[o]){ this.files[o] = y[o]; } }
			this.files.opts = { all: 1, selection: { excluded: 1 }, history: { excluded: 1 } };
			A.files.implement.call('folders files range opts', this.files);
		});
	}
};
A.files.implement.files.file = {
	object: function(m, e, a, n, d){
     	(a = m.lastIndexOf('.')), (n = ((a != -1) ? m.slice(a + 1) : 'NOEXT')), (d = ((a != -1) ? m.slice(0, a) : m));
     	var sm = m.replace(/</g, '&lt;').replace(/"/g, '&quot;'), sd = d.replace(/</g, '&lt;');
     	A.files.style.icons[n] = (A.files.style.icons[n] || A.files.icons.files(n));
     	a = $('<label><span class="' + A.files.style.icons[n] + '"><b>' + n + '</b></span><a ' + ((m.length > 16) ? 'title="' + sm + '"' : '') + 'href="' + e.files.folder + sm + '" data-section="files" data-name="' + sm + '" target="_blank">' + sd + '</a></label>').appendTo(A.files.output);
     	(e.origin = a), (e.ext = n), (e.link = a.find('a')), (e.icon = a.find('span')), (e.val = (e.files.folder + m)), (e.section[m] = e), e.icon.on('click', e, A.files.implement.files.file.iconFn), e.link.on('click', e, A.files.implement.files.file.fn);
     	return a;
	},
	iconFn: function(i){ if(i.data.selected == undefined){ A.files.selection.object.call($(this).closest(A.files.selection.strFiles)); } },
	fn: function(i){ i.preventDefault(), i.data.icon.click(); }
};
A.files.implement.folders.folder = {
	object: function(y, o, u){
     	var sy = y.replace(/</g, '&lt;').replace(/"/g, '&quot;');
     	(u = $('<label><span class="' + A.files.style.icons['DIR'] + '"></span><a ' + ((y.length > 16) ? 'title="' + sy + '"' : '') + 'href="' + o.files.folder + sy + '" data-section="folders" data-name="' + sy + '" >' + sy + '</a></label>').prependTo(A.files.output));
     	(o.origin = u), (o.link = u.find('a')), (o.icon = u.find('span')), (o.val = (o.files.folder + y)), (o.section[y] = o), o.icon.on('click', o, A.files.implement.folders.folder.iconFn), o.link.on('click', o, A.files.implement.folders.folder.fn);
     	return u;
	},
	iconFn: A.files.implement.files.file.iconFn,
	fn: function(a, n, d){ a.preventDefault(), A.files.input.val(a.data.val), A.files.trigger(); }
};
A.files.icons = {
	color: function(n){ return { r: Math.round(Math.random() * n), g: Math.round(Math.random() * n), b: Math.round(Math.random() * n) }; },
	folders: function(x, y){ (y = A.files.icons.color(128)), A.files.style.ref.append('.' + x + ' { background: linear-gradient(to bottom, rgba(' + y.r + ', ' + y.g + ', ' + y.b + ', 0.75), rgb(' + y.r + ', ' + y.g + ', ' + y.b + ')); border-top-left-radius: 1.5rem; }'); return x; },
	files: function(x, y){ (y = A.files.icons.color(128)), A.files.style.ref.append('.' + x + ' { padding: 0 !important; box-shadow: inset 0 -0.075rem 0.5rem rgba(' + y.r + ', ' + y.g + ', ' + y.b + ', 0.25); background: url($C/ico?k=' + x + ') top center no-repeat, linear-gradient(to bottom, rgba(' + y.r + ', ' + y.g + ', ' + y.b + ', 0.25), rgba(' + y.r + ', ' + y.g + ', ' + y.b + ', 0.5)); } .' + x + ' b { padding: 0.075rem 0; text-shadow: 0 1px #000, 0 0.25rem 1rem rgb(' + (y.r + 95) + ', ' + (y.g + 95) + ', ' + (y.b + 95) + '); background: linear-gradient(to bottom, rgba(' + y.r + ', ' + y.g + ', ' + y.b + ', 0.8), rgb(' + y.r + ', ' + y.g + ', ' + y.b + ')); }'); return x; }
};
A.files.implement.opts = function(){
	var i, a = (this.section && (typeof this.section == 'object')), m = (!a ? A.files.implement.opts : (!this.section.all ? this.section : ((delete this.section.all), Object.assign({}, A.files.implement.opts, this.section))));
	A.files.options.addClass(A.files.style.open);
	for(i in m){
		if(m[i].excluded){ continue; }
		if(A.files.implement.opts[i].apply(m[i], arguments) == 'stop'){ return 'stop'; }
	}
};
A.files.implement.opts.history = function(o, k, e, y){
	y = A.files.history;
	switch(this.way){
		case 'private':
			(e = y.n), (y.n = ((this.n < 1) ? 0 : ((this.n > y.list.length) ? y.list.length : this.n)));
			(y.sense = ((y.n < e) ? 'backward' : 'forward')), (y[y.sense].previous = e);
			A.files.previousFolder = y.list[(y.sense != 'backward') ? e : y.n];
		break;
		default:
			if(y.sense != 'normal'){ y.list = y.list.slice(0, (y.previous + 1)); }
			(y.list[y.list.length] = o.id), (y.n = (y.list.length - 1)), (y.sense = 'normal');
	}
	(y.previous = y.n), (y.backward.ref = (y.backward.ref || y.backward.object())), (y.forward.ref = (y.forward.ref || y.forward.object()));
	if(!y.n && y.backward.ref){ y.backward.ref.remove(), (delete y.backward.ref); }
	if((y.n == (y.list.length - 1)) && y.forward.ref){ y.forward.ref.remove(), (delete y.forward.ref); }
};
A.files.history = {
	backward: {
		str: '[data-b]',
		text: '<li data-b><a href="#">&lt; Atrás</a></li>',
		object: function(b, e){
			(e = A.files.options.find(A.files.history.forward.str)), (b = $(A.files.history.backward.text).prependTo(A.files.options)), b.find('a').on('click', A.files.history.backward.fn);
			if(e.length){ b.after(e); } return b;
		},
		fn: function(i, s, o, k){
			i.preventDefault(), (s = A.files.history), (o = (s.n - 1)), (k = A.files.cache[s.list[o]]);
			return (!k ? 0 : ((k = Object.assign({}, k, { opts: { all: 1, history: { way: 'private', n: o }}})), A.files.implement(k)));
		}
	},

	forward: {
		str: '[data-f]',
		text: '<li data-f><a href="#">Adelante &gt;</a></li>',
		object: function(b, e){
			(e = A.files.options.find(A.files.history.backward.str)), (b = $(A.files.history.forward.text).prependTo(A.files.options)), b.find('a').on('click', A.files.history.forward.fn);
			if(e.length){ b.before(e); } return b;
		},
		fn: function(i, s, o, k){
			i.preventDefault(), (s = A.files.history), (o = (s.n + 1)), (k = A.files.cache[s.list[o]]);
			return (!k ? 0 : ((k = Object.assign({}, k, { opts: { all: 1, history: { way: 'private', n: o }}})), A.files.implement(k)));
		}
	},
	sense: 'normal',
	list: [],
	n: 0
};
A.files.implement.opts.selection = function(x, y, z){
	(z = A.files.selection), (x = (z.folder = A.files.cache[x.id]));
	x.selection = (x.selection || { n: 0, list: {} });
	if(x.selection.n){
		x.selection.n = 0;
		for(y in x.selection.list){ (y = x[x.selection.list[y].type + 's'][y]), A.files.selection.object.call(y.origin), y.ref.prop('checked', 1).change(); }
	}
	A.files.selection.change.call({ source: 'open', available: 1 });
};
A.files.selection = {
	strFiles: 'label:not(.p):not(.f)',
	strContainers: 'span',
	strPathRef: 'a',
	object: function(i, s){
		(i = $('<input type="checkbox" name="d[]">').prependTo(this.find(A.files.selection.strContainers))),
		(s = this.find(A.files.selection.strPathRef)),
		(s = A.files.selection.folder[s[0].dataset.section][s[0].dataset.name]),
		(s.selected = 0), (s.ref = i), i.on('change', { file: s }, A.files.selection.fn);
		return i;
	},
	fn: function(i, a, m){ i.stopPropagation(), m = i.data.file, m.ref.val(m.current), (a = (!m.ref.prop('checked') ? 'remove' : 'add')), A.files.selection[a](m), A.files.selection.change.call({ source: a, available: 1, ref: m.ref, data: m }); },
	add: function(x){  (x.selected = 1), A.files.selection.folder.selection.list[x.current] = x; },
	remove: function(x, y){
		(y = A.files.selection.folder.selection), x.ref.remove(), (delete x.ref), (delete x.selected), (delete y.list[x.current]);
		if(!y.n){ A.files.selection.change.call({ source: 'unset', available: 0 }); }
	},
	change: function(x, y){ for(y in (x = A.files.selection.change)){ x[y].call(this); } }
};
A.files.selection.change.n = function(){
	if(!this.available){ return; }
	A.files.selection.folder.selection.n = A.files.count(A.files.selection.folder.selection.list);
};
A.files.selection.change.actions = function(i, a, m, x, z){
	(m = (!this.available ? 'unavailable' : ((x = A.files.selection.folder.selection.n) ? ((x > 1) ? 'multiple' : 'single') : 'unselected'))), (this.n = x);
	for(a in (i = A.files.actions.selection)){
		if(a == m){ continue; }
		for(z in i[a]){ if(i[a][z] && (typeof i[a][z] == 'object') && i[a][z].ref){ i[a][z].ref.remove(), delete i[a][z].ref; } }
	}
	this.group = m;
	for(a in (m = i[m])){
		if(!m[a]){ continue; }
		switch(typeof m[a]){
			case 'function': m[a].call(this); break;
			case 'object': m[a].ref = (m[a].ref || m[a].object.call(this));
		}
	}
};
A.files.actions = {
	fn: function(i){
		A({
			targetObj: ((this[0].nodeName != 'A') ? this.find('a') : this),
			action: {
				closeFn: i.closeFn,
				cancelFn: i.cancelFn,
				submit: (i.submit || { okFn: i.okFn, notFn: i.notFn }),
				openFn: function(o, k, e, y){
					y = Object.assign({}, k);
					y.folderTarget = this.messageBox.find(y.folderTarget);
					y.folderTarget.val(A.files.selection.folder.id);
					y.methodTarget = this.messageBox.find(y.methodTarget);
					y.methodTarget.val(y.method);
					y.messageTarget = this.messageBox.find(y.messageTarget);
					if(y.includeSelection != undefined){
						e = A.files.selection.folder;
						for(o in e.selection.list){ (e.selection.list[o].ref).clone().attr('type', 'hidden').appendTo(y.messageTarget); }
						if(y.message){ y.message = y.message.replace('{STD_NUM}', ('<b>' + e.selection.n + '</b>')).replace('{STD_OBJS}', ('<b>' + ((e.selection.n > 1) ? A.files.upload.handler.textFiles : A.files.upload.handler.textFile).toLowerCase() + '</b>')).replace('{STD_NAME}', ('"<b>' + o.split('/').slice(-1) + '</b>"')); }
					}
					if(typeof (o = i.addon) == 'function'){ (this.data = y), (this.action = k), (this.addon = o.call(this)); }
				}
			}
		});
	},
	selection: { unavailable: {}, unselected: {}, multiple: {}, single: {} },
	complete: function(o, k, e, y){
		e = A.files.selection.folder;
		for(y in e.selection.list){ if(typeof (o = A.files.actions.after[k.method]) == 'function'){ o.call(this, e, e.selection.list[y], y); } }
		A.files.selection.change.call({ source: 'after', available: 1 });
	},
	after: {
		remove: function(o, k, s){
			(o.selection.n--), k.section[s].origin.remove(), (delete k.section[s]), (delete o.selection.list[s]);
			if(A.files.empty(o.files) && A.files.empty(o.folders)){ (o.message = A.files.implement.message.textEmpty), A.files.implement.message.call({ section: o.message }); }
		},
		rename: function(o, k, e, y, s){
			(y = A.files.trim(this.addon.val())),
			(y = (!y ? e : ((k.type != 'file') ? y : ((y.indexOf('.') != -1) ? y : ((e.indexOf('.') != -1) ? (y + '.' + e.split('.').pop()) : y)))));
			if(!k.section[y]){ (delete k.selected), (k.section[y] = Object.assign({}, k, { section: k.section, current: y }), A.files.implement[k.type + 's'][k.type].object(y, k.section[y])), A.files.actions.after.remove(o, k, e); }
			else { k.section[e].icon.click(); }
		}
	}
};
A.files.actions.selection.single.open = {
	str: 'a',
	text: '<li><a href="#">Abrir</a></li>',
	object: function(i, s, I){ (s = A.files.actions.selection.single.open), (i = $(s.text).appendTo(A.files.options)), (I = i.find(s.str)), I.on('click', s.event), A.files.actions.fn.call(i, s); return i; },
	event: function(i, s){
		(i = A.files.selection.folder.selection.list);
		for(s in i){
			if(i[s].type == 'folder'){ i[s].link.click(); break; }
			window.open(i[s].link[0].href, '_blank');
		}
	}
};
A.files.actions.selection.single.remove = {
	text: '<li><a data-action="require" data-action-event="click" data-include-selection data-required-object="#action" data-folder-target="[name=f]" data-method-target="[name=a]" data-method="remove" data-message-target=".m" data-message="¿Eliminar {STD_NUM} {STD_OBJS}?" href="#">Eliminar</a></li>',
	object: function(i, s){ (s = A.files.actions.selection.single.remove), (i = $(s.text).appendTo(A.files.options)), A.files.actions.fn.call(i, s); return i; },
	addon: function(){ this.data.messageTarget.append(this.data.message); },
	okFn: A.files.actions.complete
};
A.files.actions.selection.single.rename = {
	str: '[name="n"]',
	text: '<li><a data-action="require" data-action-event="click" data-include-selection data-required-object="#action" data-folder-target="[name=f]" data-method-target="[name=a]" data-method="rename" data-message-target=".m" data-message="Cambiar nombre de {STD_NAME} por:" href="#">Renombrar</a></li>',
	object: function(i, s){	(s = A.files.actions.selection.single.rename), (i = $(s.text).appendTo(A.files.options)), A.files.actions.fn.call(i, s); return i; },
	addon: function(){ this.data.messageTarget.append(this.data.message).after('<label><input type="text" name="n" placeholder="Nuevo nombre"></label>'); return this.messageBox.find('[name=n]'); },
	okFn: A.files.actions.complete
};
A.files.actions.selection.multiple.remove = Object.assign({}, A.files.actions.selection.single.remove);
A.files.implement.opts.upload = A.files.actions.selection.unselected.upload = function(x, y){
	(x = A.files.cache[(!x ? A.files.selection.folder : x).id]), (y = A.files.upload.reset);
	if(!x.error && !A.files.selection.folder.selection.n){ (A.files.upload.ref = (A.files.upload.ref || A.files.upload.object())), A.files.output.closest(A.files.upload.strArea).off().on({ drag: y, dragstart: y, dragover: y, dragenter: y }, 0, { action: 'focus' }).on({ dragleave: y, dragend: y, mouseout: y }, 0, { action: 'blur' }).on({ drop: y }, 0, { action: 'handler' }); }
	else { A.files.actions.selection.single.removeUpload(); }
};
A.files.upload = {
	stat: 0,
	strArea: 'form',
	text: '<li><a data-action="require" data-action-event="click" data-required-object="#action" data-folder-target="[name=f]" data-method-target="[name=a]" data-method="upload" data-message-target=".m" data-message="Subir archivos:" href="#">Subir</a></li>',
	object: function(i){ (i = $(A.files.upload.text).appendTo(A.files.options)), A.files.actions.fn.call(i, A.files.upload.object); return i; },
	reset: function(i, s){
		(i.preventDefault()), (i.stopPropagation()), clearTimeout(A.files.upload.blur.t);
		if(A.files.upload.stat){ return; }
		if(typeof (s = A.files.upload[!i.data ? 'focus' : (i.data.action || 'focus')]) == 'function'){ s.call($(this), i); }
	},
	focus: function(i){ A.files.upload.focus.ref = (A.files.upload.focus.ref || A.files.upload.focus.object()); },
	blur: function(i){
		if(!A.files.upload.focus.ref){ return; }
		A.files.upload.blur.t = setTimeout(function(){ A.files.upload.focus.ref.remove(), (delete A.files.upload.focus.ref); }, 123);
	},
	handler: function(i, s){
		if(s = i.dataTransfer){
			if(!s.files.length){ A.files.upload.blur.call(this, i); }
			else {
				(A.files.upload.stat = { origin: this, event: i, text: A.files.upload.handler.textFn(s), files: s.files }),
				A.files.upload.focus.ref.html(A.files.upload.stat.text),
				(s = A.files.upload.focus.ref.find('a')),
				s.addClass(A.files.style.load),
				(i = s.text()),
				s.html('<b>' + (i.charAt(0).toUpperCase() + i.slice(1).toLowerCase()) + '</b>'),
				A.files.upload.ref.find('a').click();
			}
		}
	}
};
A.files.upload.handler.textFile = 'Archivo';
A.files.upload.handler.textFiles = 'Archivos';
A.files.upload.handler.textZero = 'ningún archivo';
A.files.upload.handler.textFn = function(i, s){
	(s = A.files.upload.handler);
	return (!i.files.length ? s.textZero : s.textUpload.replace('{UP_NUM}', i.files.length).replace('{UP_FILES}', ((i.files.length > 1) ? s.textFiles : s.textFile).toLowerCase()));
};
A.files.upload.handler.textUpload = '<span><b>{UP_NUM}</b></span><a><b>{UP_FILES}</b></a>';
A.files.upload.object.addon = function(s, i, x){
	(x = this), (s = A.files.upload.stat), x.data.messageTarget.html(this.data.message).after('<label><input type="file" name="d[]" multiple></label><label class="j">El límite por cada subida de archivos es de 1 MB.</label>'), (i = x.messageBox.find('[name="d[]"]'));
	x.messageBox.find('form').attr('enctype', 'multipart/form-data');
	i.on('change', function(){ x.data.messageTarget.html(A.files.upload.object.addon.text.replace('{UP_TEXT}', (!s ? A.files.upload.handler.textFn(i[0]) : s.text))); });
	if(s){ (i[0].files = s.files), i.change(); }
	return i;
};
A.files.upload.object.addon.text = '¿Subir {UP_TEXT}?';
A.files.upload.object.cancelFn = function(){ (A.files.upload.stat = 0), A.files.upload.blur.call(A.files.upload.stat.origin, A.files.upload.stat.event); };
A.files.upload.object.okFn = function(i, s, m, e){
	(s = this.addon[0].files), (i = s.length), (m = A.files.cache[A.files.selection.folder.id]);
	if(m.message){ (delete m.message), A.files.implement.message.remove(); }
	while(i--){ if((e = A.files.trim(s[i].name)) && !m.files[e]){ A.files.implement.files.file.object(e, { section: m.files, type: 'file', files: m, current: e }); } }
};
A.files.upload.focus.text = '<label class="f"><span></span><a></a></label>';
A.files.upload.focus.object = function(){ return $(A.files.upload.focus.text).appendTo(A.files.output); };
A.files.actions.selection.single.removeUpload = A.files.actions.selection.multiple.removeUpload = function(i){ if(i = A.files.upload.ref){ i.remove(), (delete A.files.upload.ref); } };
A.files.actions.selection.single.edit = A.files.edition = {
	text: '<li><a data-action="require" data-action-event="click" data-include-selection data-required-object="#edit" data-folder-target="[name=f]" data-method-target="[name=a]" data-method="edit" data-message-target=".m" data-message="{STD_NAME}" data-title-target="legend" href="#">Editar</a></li>',
	object: function(i, s, M){
		if(!window['tinymce']){ return; }
		M = A.files.selection.folder.selection.list;
		for(s in M){
			if(M[s].ext != 'html' && M[s].ext != 'htm'){ return; }
			A.files.edition.file = M[s];
			break;
		}
		(s = A.files.actions.selection.single.edit),
		(i = $(s.text).appendTo(A.files.options)),
		A.files.actions.fn.call(i, s);
		return i;
	},
	addon: function(x, y){
		y = this.messageBox.find(this.data.titleTarget);
		y.html(this.data.message.replace(/^"<b>|<\/b>"$/g, '')), (x = $('<textarea></textarea>').appendTo(this.data.messageTarget));
		tinymce.init({
			selector: 'textarea',
			plugins: 'preview searchreplace autolink code visualblocks visualchars fullscreen image link media table charmap pagebreak anchor insertdatetime advlist lists quickbars emoticons',
			menubar: 'file edit view insert format tools table',
			toolbar: 'fullscreen | fontselect fontsizeselect formatselect | bold italic | forecolor backcolor removeformat | alignleft aligncenter alignright alignjustify | numlist bullist | outdent indent | code preview | image media link anchor',
			toolbar_sticky: true,
			image_advtab: true,
			image_caption: true,
			quickbars_selection_toolbar: 'formatselect | forecolor removeformat | bold italic | quicklink quickimage quicktable',
			contextmenu: 'link image media anchor | code preview',
			language: 'es',
			init_instance_callback: function(z){ $.get(A.files.edition.file.val, function(r){ y.removeClass(A.files.style.load), z.setContent(r); }); },
			skin: 'oxide-dark',
			mobile: {
				menubar: false,
				toolbar_mode: 'floating'
			},
			promotion: false
		});
	},
	submit: {
		destinyMethod: 'before',
		preSubmitFn: function(i){
			i = A.files.edition.submit.preSubmitFn;
			if(i.ref){ i.ref.remove(), (delete i.ref); }
			(i.ref = i.object.call(this.destinyObj)), i.ref.val(tinymce.activeEditor.getContent({ format: 'html' }));
		}
	}
};
A.files.edition.submit.preSubmitFn.object = function(){ return $('<input type="hidden" name="n">').appendTo(this); };
A.files.implement.opts.newObject = A.files.actions.selection.unselected.newObject = function(x){
	x = A.files.cache[(!x ? A.files.selection.folder : x).id];
	if(!x.error && !A.files.selection.folder.selection.n){ A.files.newObject.ref = (A.files.newObject.ref || A.files.newObject.object()); }
	else { A.files.actions.selection.single.removeNewObject(); }
};
A.files.newObject = {
	strOpts: '[name=o]',
	text: '<li><a data-action="require" data-action-event="click" data-required-object="#action" data-folder-target="[name=f]" data-method-target="[name=a]" data-method="new" data-message-target=".m" data-message="Nuevo" data-title-target="legend" href="#">Nuevo</a></li>',
	object: function(i){ (i = $(A.files.newObject.text).appendTo(A.files.options)), A.files.actions.fn.call(i, A.files.newObject); return i; },
	addon: function(i, S){
		(i = this.messageBox.find(this.data.titleTarget)), i.html(this.data.message), A.files.icons.files('okzgn'),
		this.data.messageTarget.html('<span class="J"><span class="I DIR"><input name="o" type="radio" value="D"></span><span>Carpeta</span></span>').addClass('h').after('<label class="h"><span class="J"><span class="I okzgn"><input name="o" type="radio" value="F" checked><b></b></span><span>Archivo</span></span></label><label><input type="text" name="d" placeholder="Nombre"></label>');
		(S = this.messageBox.find(A.files.newObject.strOpts)), S.on('change', function(){});
	},
	submit: {
		destinyMethod: 'before',
		destinyStr: '[name=a]',
		okFn: function(t, v, Y, K){
			(t = this.messageBox.find('[name=o]:checked').val()), (v = this.messageBox.find('[name=d]').val());
			if(((t != 'D') && (t != 'F')) || !v){ return; }

			(Y = ((t != 'D') ? 'file' : 'folder')), (K = A.files.cache[A.files.selection.folder.id]);
			if(K.message){ (delete K.message), A.files.implement.message.remove(); }
			K[Y + 's'][v] = { section: K[Y + 's'], type: Y, files: K, current: v }, A.files.implement[Y + 's'][Y].object(v, K[Y + 's'][v]);
		}
	}
};
A.files.actions.selection.single.removeNewObject = A.files.actions.selection.multiple.removeNewObject = function(i){ if(i = A.files.newObject.ref){ i.remove(), (delete A.files.newObject.ref); } };
A.files.actions.selection.single.move = A.files.actions.selection.multiple.move = A.files.move = {
	text: '<li><a href="#"></a></li>',
	textStr: 'a',
	textOff: 'Mover',
	textCancel: 'No mover',
	textOn: 'Mover aquí',
	object: function(i, s, I){
		s = A.files.move;
		if(s.folder && A.files.selection.folder.selection.n){ return s.remove(); }
		(i = $(s.text).appendTo(A.files.options)), (I = i.find(s.textStr).text(!s.folder ? s.textOff : ((s.folder != A.files.selection.folder.id) ? s.textOn : s.textCancel))), I.on('click', s.event);
		return i;
	},
	event: function(s, e, E, K, Y, S){
		(s = A.files.move), (e = $(this)), (Y = (s.folder ? A.files.selection.folder.id.slice(0, s.folder.length) : 0));
		if(s.folder == A.files.selection.folder.id){ $(this).text(s.textOff), s.mark(0), (delete A.files.move.folder), (delete A.files.move.list); return s.remove(); }
		if(s.folder){
			(S = ''), (function(l, m, n, o){
				for(m in l){
					n = ((s.folder != '/') ? s.folder : '');
					o = (!n ? m : ('/' + m));

					if((n + o) == A.files.selection.folder.id.slice(0, (n + o).length)){ (delete s.list[m]); continue; }

					S += (':' + m);
				}
				return m.slice(1);
			})(s.list), e.addClass(A.files.style.load);

			return $.post(A.files.handler.replace(/\/files/, '/move'), { module: 'move', f: s.folder, t: A.files.selection.folder.id, l: S }, function(r, c){
				try { if(c != 'success'){ throw new Error(); } else { r = $.parseJSON(r); } }
				catch(c){ r = { error: c }; }
				if(r.ok){
					e.text(s.textOff), s.mark(0), s.remove(), (K = A.files.cache[A.files.selection.folder.id]);
					if(K.message){ (delete K.message), A.files.implement.message.remove(); }
					for(E in s.list){
						(Y = s.list[E].type), K[Y + 's'][E] = Object.assign({}, A.files.move.list[E], { section: K[Y + 's'], current: E, files: K }), A.files.implement[Y + 's'][Y].object(E, K[Y + 's'][E]), (delete s.list[E].section[E]);
						if(A.files.empty(A.files.cache[s.folder].files) && A.files.empty(A.files.cache[s.folder].folders)){ A.files.cache[s.folder].message = A.files.implement.message.textEmpty; }
					}
					(delete A.files.move.folder), (delete A.files.move.list);
				}
			});
		}
		(s.folder = A.files.selection.folder.id), (s.list = Object.assign({}, A.files.selection.folder.selection.list)), e.text(s.textCancel), s.mark(1, function(i){ if(i){ i.prop('checked', 0).change(); } });
	},
	mark: function(i, s, I, S, Z){
		(s = ((typeof s == 'function') ? s : 0)), (Z = A.files.move), (I = i), (S = A.files.cache[Z.folder]);
		for(i in Z.list){
			i = S[Z.list[i].type + 's'][i];
			i.link[!I ? 'removeClass' : 'addClass'](A.files.style.std);
			if(s){ s.call(i, i.ref); }
		}
	},
	remove: function(i){ if(i = A.files.move.ref){ i.remove(), (delete A.files.move.ref); } }
};
A.files.implement.opts.move = A.files.actions.selection.unselected.move = function(x, y, z){
	(x = A.files.cache[(!x ? A.files.selection.folder : x).id]), (y = A.files.move), (z = y.folder);
	if(!x.error){
		if(!z){ return; }
		else if(z == A.files.selection.folder.id){ y.mark(1); }
		y.ref = (y.ref || y.object());
	}
	else { y.remove(); }
};
A.startFolder = function(o, k){
	o.preventDefault();
	if(A.files.previousFolder == A.files.init.folder){ delete A.files.previousFolder; }
	$(k.target).val(A.files.init.folder).keydown();
};
X.filesStart = function(a, b, c, d, e, f){
	(a = '/apanel/'),
	(b = A.files.trim(location.pathname.slice((!location.pathname.indexOf(a + 'edit/') ? (a + 'edit/') : a).length)).split('/')),
	(c = ((d = (b[b.length - 1].indexOf('.') != -1)) ? b.slice(0, (b.length - 1)) : b)),
	(c = ((!c.length || !c[0]) ? ['/'] : [''].concat(c)).join('/')),
	(d = (!d ? '' : b[b.length - 1])),
	(b = c.length);
	$(X.filesStart.inputStr).val(c).keydown(), history.pushState({}, '', a);
	if(d){
		if((f = d.lastIndexOf('.')) == -1){ return; }
		(f = d.slice(f + 1));
		if((f != 'html' && f != 'htm')){ return; }
		A.files.init.fn = function(x){
			if(this.files[d]){ this.files[d].icon.click(), (x = A.files.options.find('[data-required-object="#edit"]')), (x = (!x.length ? 0 : x.click())); }
			else { Communicate({ style: "MESSAGE", message: '<section><span><b>ARCHIVO NO ENCONTRADO</b><br><a class="ok" onclick="C.remove();">Aceptar</a></span></section>' }); }
		};
	}
};
X.filesStart.inputStr = '#F .M input[name="f"]';
JS;

$BODY .= <<<HTML

	<section id="action">
		<form method="post" action="$C/add" autocomplete="off">
			<fieldset>
				<legend>Proceder a</legend>
				<input type="hidden" name="module" value="$module"><input type="hidden" name="H"><input type="hidden" name="f"><input type="hidden" name="a">
				<label class="m"></label>
				<label class="r"><input type="submit" value="Sí" data-action="submit" data-action-event="click"> <button data-action="requireClose" data-action-event="click">Cerrar</button></label>
			</fieldset>
		</form>
	</section>
	<section id="edit">
		<form method="post" action="$C/add" autocomplete="off">
			<fieldset>
				<legend class="l">Edición</legend>
				<label class="r"><button data-action="submit" data-action-event="click">Guardar</button> <button data-action="requireClose" data-action-event="click">X</button></label>
				<input type="hidden" name="module" value="$module"><input type="hidden" name="H"><input type="hidden" name="f"><input type="hidden" name="a">
				<label class="m"></label>
			</fieldset>
		</form>
	</section>
	<script src="/editor/tinymce.min.js"></script>
HTML;
$MAIN .= <<<HTML
	<form id="F" method="post" action="$C/files" autocomplete="off">
		<fieldset>
			<legend><h3>Archivos</h3><a href="#" data-action="startFolder" data-action-event="click" data-target=".M input">Inicio</a><a href="#" data-action="help" data-action-event="click">?</a></legend>
			<label class="M">
				<span>Carpeta:</span>
				<input type="text" name="f" placeholder="Nombre o ubicación de carpeta" data-action="files" data-action-event="keydown keyup" data-input="#F .M input" data-output="#F div" data-options="#F .M ul">
				<ul></ul>
			</label>
			<div></div>
			<article>
				<ul>
					<li><b>PARA SELECCIONAR</b> archivos o carpetas haga clic en sus íconos.</li>
					<li><b>PARA VER O DESCARGAR</b> cualquier archivo haga clic en su nombre.</li>
					<li><b>EL LÍMITE</b> de cada archivo es de <b>1 MB</b> (optimiza el tiempo de carga).</li>
					<li><b>EL LÍMITE</b> del nombre o ruta de cada archivo y carpeta es de 80 caracteres.</li>
					<li><b>GUARDE TODO</b> al hacer cambios en archivos o carpetas, o no se realizarán.</li>
					<li>Para más información contáctese mediante <a target="_blank" href="https://okzgn.com/#contact"><b>SOPORTE</b></a>.</li>
				</ul>
			</article>
		</fieldset>
	</form>
HTML;
?>
