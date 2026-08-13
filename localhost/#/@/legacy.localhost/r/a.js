var A = function(x, y){
	(x = (x || {})), (x.id = (x.id || ('_' + ++(A.n)))), (A[x.id] = (A[x.id] || x)), (x.targetObj = (x.targetObj || $(x.targetStr || '[data-action]'))), x.targetObj.each(function(o, k, s){
		(s = (k.dataset.actionName || o)), (x[s] = Object.assign({}, k.dataset));
		if(x[s].action){
			for(y in x.action){ x[s][y] = x.action[y]; }
			(x[s].r = 0), (x[s].origin = $(k)), $.each($.trim(x[s].actionEvent).split(/\s+/), function(y, o){ (x[s].actionEvent = o), (x[s][x[s].action] = function(i){ return (x[s].r = A[x[s].action].call(x, i, x[s])); }), x[s].origin.on((o + '.' + x[s].action), x[s][x[s].action]); });
		}
	});
	return x;
};
(A.n = 0),
(A.submit = function(i, d){
	i.preventDefault();
	if(d.origin.restriction){ return; }
	(d.origin.restriction = 1), F($.extend({ formObj: d.origin.closest('form'), outStyle: 'O', doneFn: function(){ return (!d.restriction ? delete d.origin.restriction : 0); } }, d));
}),
(X.actions = A);