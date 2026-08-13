var Q = function(x, y){
	(Q.r = {}), (y = []), $(x.sections).each(function(i, m){ (y[i] = (isNaN(m.dataset.order) ? i : m.dataset.order)), (Q.r[y[i]] = { args: x, nodeRef: m }); }), (y = y.sort()), $(y).each(function(e, f){
		Q.r[f] = { args: Q.r[f].args, nodeRef: Q.r[f].nodeRef, forwardFn: (x.forwardFn || function(n){ return (Q.x.call(this, n.ref.forwardAddons, [n]), (!Q.r[f].forwardState ? 0 : (QX(), QC(Q.r[n.ref.next].C)))); }), forwardState: 1, forwardAddons: Object.assign([], x.forwardAddons), backwardFn: (x.backwardFn || function(n){ return (Q.x.call(this, n.ref.backwardAddons, [n]), (!Q.r[f].backwardState ? 0 : (QX(), QC(Q.r[n.ref.previous].C)))); }), backwardState: 1, backwardAddons: Object.assign([], x.backwardAddons), current: f, next: (y[e - 1] || y[y.length - 1]), previous: (y[e + 1] || y[0]), first: (e == (y.length - 1)), last: (!e), C: Object.assign({}, x.addons) };
		Q.r[f].C.message = function(a, s){
			(this.ref = Q.r[f]), (Q.r[f].objRef = s = { box: a, section: $(Q.r[f].nodeRef).clone(), ref: Q.r[f], collection: Q.r }), a.append(s.section);
			if(x.navigation){ a.append($(x.navigation).clone()); }
			if(x.forward){ a.find(x.forward).on('click', function(j){ return ((s.event = j), s.ref.forwardFn.call(x, s)); }); }
			if(x.backward){ a.find(x.backward).on('click', function(j){ return ((s.event = j), s.ref.backwardFn.call(x, s)); }); }
			if(x.disposition){ ((typeof x.disposition == 'function') ? x.disposition : Q.d[x.disposition]).call(x, s); }
			Q.x.call(x, s.ref.addons, [s]);
		};
		(Q.r[f].C.keydownFn = (x.keydownFn || top.$.noop)), (Q.r[f].C.clickFn = (x.clickFn || top.$.noop));
		if(Q.r[f].addons = Q.r[f].nodeRef.dataset.addons){ Q.a.call(x, Q.r[f]); }
	}), QC(Q.r[x.start || (y.length - 1)].C);
},
QC = window.C,
QX = (!QC ? 0 : QC.remove);
Q.x = function(y, e, s){
	for(s in y){
		if(!y[s]){ continue; }
		switch(typeof y[s]){
			case 'function': this.args = {}; break;
			case 'object': (this.args = y[s].args), y[s] = y[s].fn;
		}
		if(!this.args){ continue; }
		y[s].apply(this, e);
	}
};
Q.a = function(m, e){
	m.addons = top.$.trim(m.addons).split(/\s+/);
	for(s in m.addons){ if(typeof this.addons[m.addons[s]] == 'function'){ m.addons[s] = this.addons[m.addons[s]]; } }
};
Q.d = {
	limited: function(o){ o.box.find(this.backward).css('display', (!o.ref.first ? 'inline-block' : 'none')), o.box.find(this.forward).css('display', (!o.ref.last ? 'inline-block' : 'none')); },
	finite: function(o){
		o.box.find(this.backward).css('display', (!o.ref.first ? 'inline-block' : 'none'));
		if(o.ref.last){ o.ref.forwardAddons['finiteFn'] = function(x){ return (x.ref.forwardState = 0, (!this.finiteFn.apply(this, arguments) ? 0 : QX())); } }
	}
};