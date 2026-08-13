var C = Communicate = function(x, c, z){
	c = (c || document);
	if(typeof x == 'string'){ return (C.cache[x] || {}); }
	var d = { id: ('C_' + (++C.count)), style: null, styleIn: null, styleOut: null, effectIn: 'show', effectOut: 'hide', effectTimeIn: 400, effectTimeOut: 400, message: '[empty]', context: c };
	(z = $(z || window)), (x = $.extend(d, x)), (C.cache[x.id] = x);
	$('body', c).prepend('<div data-communicate="' + x.id + '"><div class="x"></div></div>');
	x.container = $('[data-communicate="' + x.id + '"]', c);
	if(x.style){ x.container.addClass(x.style); }
	x.container.css('z-index', (C.count + C.n));
	x._keydownFn = ((typeof x.keydownFn != 'function') ? function(e){ if(e.which == 27){ C.remove(0, 0, c) } } : function(e){ return x.keydownFn.call(x, e); });
	z.off('.C').on('keydown.C', x._keydownFn);
	x._clickFn = ((typeof x.clickFn != 'function') ? function(e){
		e = $(e.target);
		if(e.attr('data-communicate') || e.hasClass('x') || e.hasClass('close')){ C.remove(0, 0, c); }
	} : function(e){ return x.clickFn.call(x, e); });
	x.container.on('click', x._clickFn);
	z.add(C.blurables).blur();
	x.messageBox = x.container.find('.x');
	if(typeof x.message == 'function' && (z = x.message.call(x, x.messageBox, x.container))){ x.messageBox.html(z); }
	else if(typeof x.message == 'string'){ x.messageBox.html(x.message); }
	x._enterFn = ((typeof x.enterFn != 'function') ? $.noop : function(){ return x.enterFn.call(x); });
	if(!x.styleIn){ (x.container[x.effectIn](x.effectTimeIn)), (x._enterFn()); }
	else { (x.container.addClass(x.styleIn)), (setTimeout(x._enterFn, x.effectTimeIn)); }
	return x;
};
(C.n = 254), (C.cache = {}), (C.count = 0), (C.blurables = 'input, label, select, textarea, button, a');
C.remove = function(i, f, m, y, x){
	if(typeof i == 'function'){ f = i; }
	(m = $('[data-communicate' + ((typeof i == 'string') ? '="' + i + '"' : '') + ']', m).first()), (i = m.attr('data-communicate')), (y = C.cache[i]), (x = function(){
		if(typeof y.exitFn == 'function'){ y.exitFn.call(y); }
		(delete C.cache[i]), m.remove();
	});
	if(!y.styleOut){ m[y.effectOut](y.effectTimeOut), x(); }
	else { m.removeClass(y.styleIn).addClass(y.styleOut), setTimeout(x, y.effectTimeOut); }
};