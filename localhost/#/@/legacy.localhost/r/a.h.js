A.help = function(o, k, x, y, g, e, n, z){
	o.preventDefault(), (z = $(k.origin).position()), (g = $(k.helpBox)), (k.distance = (k.distance || 2)), (k.time = (k.time || 33)),
	(e = function(){ clearTimeout(A.help[k.helpBox]), g.removeClass('I').removeClass('O').addClass('I'); }),
	(n = function(){ A.help[k.helpBox] = setTimeout(function(){ g.removeClass('I').removeClass('O').addClass('O'); }, k.time); });
	if(o.type != 'mouseout'){ e(); }
	else { g.off().on({ mouseover: e, mouseout: n }), n(); }
	(x = ((o.x || parseInt(z.left)) + k.distance)), (y = ((o.y || parseInt(z.top)) + k.distance)), (o = $(window)), (e = ((x + g.width()) - o.width())), (n = ((y + g.height()) - o.height()));
	(x -= ((e < 1) ? 0 : e)), (y -= ((n < 1) ? 0 : n)), g.css({ top: y, left: x });
};