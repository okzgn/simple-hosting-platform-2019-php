A.adapt = function(a, r, e, n, t){
	e = r.origin.val(), a = r.origin.parent().children('.A');
	if(!a.length){ a = $('<span class="A"></span>').css({ position: 'absolute', visibility: 'hidden' }).appendTo(r.origin.parent()); }
	a.text(e), (n = (a.width() + 1));
	if(!r.initialWidth){ r.initialWidth = r.origin.width(); }
	if(!e.length || (n < 5)){ r.origin.width(r.initialWidth), a.remove(); }
	else { r.origin.width(n); }
};