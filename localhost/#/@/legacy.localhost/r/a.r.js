A.requireClose = function(o, k){ o.preventDefault(), k.cancel(k.communicateRef); };
A.require = function(o, k){
	o.preventDefault();
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
			effectTimeIn: 250,
			effectTimeOut: 250,
			enterFn: function(t){
				(t = this), clearTimeout(A.require.t);
				if(typeof k.openFn == 'function'){ k.openFn.call(t, o, k); }
				A({ targetObj: t.messageBox.find('[data-action]'), action: { communicateRef: t, cancel: k.cancel } });
				t.messageBox.find('input[type="text"], input[type="password"], textarea').first().focus();
				if(typeof k.requiredFn == 'string' && typeof A[k.requiredFn] == 'function'){ A[k.requiredFn].call(t, t.messageBox, k); }
			}
		}
	});
};