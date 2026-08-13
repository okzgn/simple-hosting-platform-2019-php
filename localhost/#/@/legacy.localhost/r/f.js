var F = function(i, n, g, e, r){
	(i = (i || {})), (i.n = (i.iframeName || ('_' + (++F.n)))), (F[i.n] = (F[i.n] || i)), (n = (i.containerStr || F.containerStr)), (g = (i.loadStyle || F.loadStyle)), (e = (i.destinyMethod || F.destinyMethod)), (r = ((e == 'after') ? 'next' : ((e == 'before') ? 'prev' : 'find'))), (i.formObj = (i.formObj || $(i.formStr))), (i.destinyObj = (i.destinyObj || i.formObj.find(i.destinyStr || F.destinyStr))), (i.container = i.destinyObj[r](n).first()), (i.iframe = i.container.find('iframe'));
	if(!i.iframe.length){ (i.destinyObj[e](i.containerHtml || F.containerHtml)), (i.container = i.destinyObj[r](n).first()), (i.iframe = $('<iframe />', { frameborder: 0, scrolling: 0, name: i.n }).appendTo(i.container)), i.formObj.attr('target', i.n); }
	(i.n = i.iframe.attr('name')), (i.container.removeClass(i.outStyle).addClass(g));
	if((typeof i.preSubmitFn == 'function') && (i.preSubmitFn.call(i, i.container) == 'stop')){ return; }
	i.iframe.hide().off('.F').on('load.F', function(o){
		(o = (i.iframe[0].contentDocument || i.iframe[0].document));
		if(!o){ (i.r = '<p data-err>Unexpected error</p>'); }
		else { (i.r = o.documentElement.innerHTML), $('head', o).append('<style>' + (i.cssObj || $(i.cssStr || F.cssStr)).html() + '</style>'), i.iframe.show(); }
		i.container.removeClass(g), (X.F_outStyles[i.n] = i.outTimeEnd = ((new Date).getTime() + (i.outTime || F.outTime)));
		if(typeof i.doneFn == 'function'){ i.doneFn.call(i, i.container, o); }
	}), i.formObj.submit();
	return i;
};
(F.n = 0),
(F.destinyStr = 'fieldset'),
(F.destinyMethod = 'prepend'),
(F.containerStr = 'p'),
(F.containerHtml = '<p><span>Cargando...</span></p>'),
(F.loadStyle = 'L'),
(F.cssStr = '#Bs'),
(F.outTime = 2567),
(X.F_outStyles = function(a){ setInterval(function(){ for(a in X.F_outStyles){ if((new Date).getTime() >= X.F_outStyles[a]){ F[a].container.addClass(F[a].outStyle), (delete X.F_outStyles[a]); } } }, 1000); });