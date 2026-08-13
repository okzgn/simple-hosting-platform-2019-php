A.steps = function(o, k, e, y){
	o.preventDefault(), (k.steps = (k.steps || {})), (k.start *= 1), (y = ((k.start < 0) ? 0 : k.start)), (k.sense = ((k.sense != 'backward') ? 'forward' : k.sense)), (k.stepsObjects = $(k.targets)), (k.steps[y] = (k.steps[y] || { n: y, first: (y == 0), last: (y == (k.stepsObjects.length - 1)) }));
	if(k.sense != 'backward'){
		(k.stepObject = k.stepsObjects.eq(y)), (k.prevStepObject = k.stepsObjects.eq(y - 1)), (k.nextStepObject = k.stepsObjects.eq(y + 1)), (k.stepData = k.stepObject[0].dataset),
		(k.steps[y] = Object.assign(k.steps[y], (window[k.check] ? (window[k.check][y] ? (window[k.check][y].forward ? window[k.check][y].forward.call(this, k.steps[y], k) : 0) : 0) : 0)));
		if((k.steps[y].state == 'wait') && (!k.steps[y].previous || (k.steps[y].r != k.steps[y].previous.r))){ k.steps[y].previous = Object.assign({}, k.steps[y]); return; }
		if(k.steps[y].state == 'stop'){ return; }
	}
	(k.backward = ((typeof k.backward != 'string') ? k.backward : $(k.backward))),
	(e = (((k.start + 1) < k.stepsObjects.length)) && ((k.start + 1) >= 1)),
	(k.start = y = (e ? ++k.start : 0)), (k.stepObject = k.stepsObjects.eq(y));
	if(k.sense != 'forward'){
		(k.prevStepObject = k.stepsObjects.eq(y - 1)), (k.nextStepObject = k.stepsObjects.eq(y + 1)), (k.stepData = k.stepObject[0].dataset), (k.steps[y].n = y), (k.steps[y].first = (y == 0)), (k.steps[y].last = (y == (k.stepsObjects.length - 1))),
		(k.steps[y] = Object.assign(k.steps[y], (window[k.check] ? (window[k.check][y] ? (window[k.check][y].backward ? window[k.check][y].backward.call(this, k.steps[y], k) : 0) : 0) : 0)));
		if((k.steps[y].state == 'wait') && (!k.steps[y].previous || (k.steps[y].r != k.steps[y].previous.r))){ k.steps[y].previous = Object.assign({}, k.steps[y]); return; }
		if(k.steps[y].state == 'stop'){ return; }
	}
	(delete k.sense), (!e ? k.backward.off().hide() : k.backward.off().on('click', function(){ (k.start -= 2), (k.sense = 'backward'), k.steps(o); }).css('display', 'inline-block')),
	k.stepsObjects.hide(), k.stepObject.show();
};