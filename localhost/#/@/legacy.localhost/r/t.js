var terminal = function(t, e, r, m, i, n, a, l){
	t.objs.addClass('terminal');
	e = t.objs.filter('[data-text]');
	r = function(){
		m = (t.startWait || 2000);
		t.startFn();
		e.each(function(x, y, z){
			m += (!x ? 0 : (t.objsWait || 2000));
			y = $(y);
			z = y.attr('data-text');
			a(function(){
				if(x){ e.eq(x - 1).hide(); }
				y.css('display', 'inline');
				i(y, z, 1);
			}, m);
			m += ((z.length + 1) * (t.betweenLetters || 150));
			a(function(){ y.addClass('S'); }, m);
			m += (t.markWait || 1250);
			a(function(){ y.removeClass('S').text('').hide(); }, m);
		});
		a(t.endFn, m);
		return m;
	};
	i = function(x, y, z){
		n = a(function(){
			clearTimeout(n);
			x.html(y.slice(0, z));
		}, ((t.betweenLetters || 150) * (z - 1)));
		return (((z - 1) < y.length) ? i(x, y, (z + 1)) : 0);
	},
	a = function(x, y){ return (t.timeouts[++t.timeouts[0]] = setTimeout(x, y)); };
	t.timeouts = [0];
	t._startFn = (t.startFn || $.noop);
	t._endFn = (t.endFn || $.noop);
	t.startFn = function(){ return t._startFn.call(t, t.objs, e); };
	t.endFn = function(){ return t._endFn.call(t, t.objs, e); };
	t.stop = function(){
		for(l = 1; l < t.timeouts.length; l++){ clearTimeout(t.timeouts[l]); }
		clearInterval(t.interval);
	};
	t.start = function(){ t.interval = setInterval(r, (r() + (t.betweenIntervals || 3000))); };
	t.remove = function(){
		t.stop();
		t.objs.remove();
	};
	t.start();
	return t;
};