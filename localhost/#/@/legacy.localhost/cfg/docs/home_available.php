<?php
echo <<<HTML
<!doctype html>
<html>

<head>
	<title>OKZGN Server Legacy</title>
	<link rel="icon" href="i.png">
	<link rel="manifest" href="m.json">

	<meta charset="utf-8">
	<meta name="description" content="Sistema web para economizar los costos y gastos al mantener páginas o sitios de Internet sin perder rendimiento, control ni facilidad de administración.">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="author" content="OKZGN">
	<meta name="theme-color" content="#211539">

	<meta property="og:title" content="OKZGN Server Legacy">
	<meta property="og:description" content="Sistema web para economizar los costos y gastos al mantener páginas o sitios de Internet sin perder rendimiento, control ni facilidad de administración.">
	<meta property="og:image" content="https://legacy.localhost/i.png">
	<meta property="og:url" content="https://legacy.localhost">
	<meta property="og:site_name" content="OKZGN">
	<meta property="og:type" content="website">

	<style id="Bs">
*,::before,::after{box-sizing:inherit}::before,::after{text-decoration:inherit;vertical-align:inherit}html{box-sizing:border-box;cursor:default;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}article,aside,footer,header,nav,section,figcaption,figure,main{display:block}body{line-height:1}figure{margin:1em 40px}hr{box-sizing:content-box;height:0;overflow:visible}ol,ul{list-style:none;padding:0}pre{font-family:monospace,monospace;font-size:1em}a{text-decoration:none;background-color:transparent;-webkit-text-decoration-skip:objects}abbr[title],dfn[title]{border-bottom:0;text-decoration:underline;text-decoration:underline dotted}del{text-decoration:line-through}b,strong{font-weight:inherit}b,strong{font-weight:bolder}code,kbd,samp{font-family:monospace,monospace;font-size:1em}dfn{font-style:italic}mark{background-color:#ff9;color:#000}small{font-size:80%}sub,sup{font-size:77%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}::-moz-selection{background-color:#000;color:#fff;text-shadow:none}::selection{background-color:#000;color:#fff;text-shadow:none}audio,canvas,iframe,img,svg,video,input,select{vertical-align:middle}audio,video{display:inline-block}audio:not([controls]){display:none;height:0}img{border-style:none}svg{fill:currentColor}svg:not(:root){overflow:hidden}table{border-collapse:collapse;border-spacing:0}body,h1,h2,h3,h4,h5,h6,button,input,optgroup,select,textarea,ul,p,fieldset{margin:0}fieldset{border:0;padding:0}button,input,select,textarea{background-color:transparent;color:inherit;font:inherit;line-height:inherit}button,input{overflow:visible}button,select{text-transform:none}button,html [type="button"],[type="reset"],[type="submit"]{-webkit-appearance:button}button::-moz-focus-inner,[type="button"]::-moz-focus-inner,[type="reset"]::-moz-focus-inner,[type="submit"]::-moz-focus-inner{border-style:none;padding:0}button:-moz-focusring,[type="button"]:-moz-focusring,[type="reset"]:-moz-focusring,[type="submit"]:-moz-focusring{outline:1px dotted ButtonText}legend{box-sizing:border-box;color:inherit;display:table;max-width:100%;padding:0;white-space:normal}progress{display:inline-block;vertical-align:baseline}textarea{overflow:auto;resize:vertical}[type="checkbox"],[type="radio"]{box-sizing:border-box;padding:0}[type="number"]::-webkit-inner-spin-button,[type="number"]::-webkit-outer-spin-button{height:auto}[type="search"]{-webkit-appearance:textfield;outline-offset:-2px}[type="search"]::-webkit-search-cancel-button,[type="search"]::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}details,menu{display:block}summary{display:list-item}canvas{display:inline-block}template{display:none}a,area,button,input,label,select,summary,textarea,[tabindex]{-ms-touch-action:manipulation;touch-action:manipulation}[hidden]{display:none}[aria-busy="true"]{cursor:progress}[aria-controls]{cursor:pointer}[aria-hidden="false"][hidden]:not(:focus){clip:rect(0,0,0,0);display:inherit;position:absolute}[aria-disabled]{cursor:default}
@font-face {
	font-family: 'A';
	src: url(r.ttf);
	font-weight: normal;
}
@font-face {
	font-family: 'A';
	src: url(b.ttf);
	font-weight: bold;
}
p {
	display: block;
	padding: 0.5rem;
	text-shadow: 0 1px rgba(0, 0, 0, 0.25);
}
[data-err] { background: linear-gradient(to left, #b13, #d34); }
[data-ok] { background: linear-gradient(to left, #194, #3b5); }
body {
	font: normal 100% 'A', helvetica;
	word-spacing: 0.3rem;
	text-align: center;
	color: #fff;
}
*, ::after, ::before {
	scrollbar-color: #000 #999;
	scrollbar-width: thin;
}
::-webkit-scrollbar {
	width: 0.25rem;
	height: 0.25rem;
}
::-webkit-scrollbar-thumb { background: #000; }
::-webkit-scrollbar-track { background: #999; }
</style>
<style>
body {
	background: #211539 url(../b.jpg) center center no-repeat;
	background-size: 100% 100%;
	overflow: hidden;
	flex-flow: column;
	color: #fff;
}
select, input, button { word-spacing: 0.3rem; }
::placeholder { opacity: 0.5; }
a, input, select, button { transition: all 0.125s; }
a { text-decoration: none; }
a:hover, a:active, a:focus { text-decoration: underline; }
:active, :focus {
	outline: 0;
	-webkit-tap-highlight-color: transparent;
}
label:focus, label:active { background: transparent !important; }
html, body, main { height: 100%; }
body, main section, main, article, .x section, .x div, .x ul { display: flex; }
main { flex-flow: row; }
article, main section, .x section, .x div, .x ul { flex-flow: column; }
article h3, div > b:first-child, article li a, article li, [data-steps-backward], option { color: #9dc; }
form a, ::placeholder { color: #79c; }
main {
	overflow-y: auto;
	overflow-x: hidden;
	justify-content: center;
}
article, main section { width: 50%; }
article {
	justify-content: center;
	padding-right: 1rem;
}
article h1, article h3 {
	align-self: flex-end;
	opacity: 0;
}
article h1 {
	position: relative;
	line-height: 0;
}
article h1, article h1 a { height: 3rem; }
article h1 img { height: 100%; }
article h3 {
	font-size: 200%;
	padding-top: 1.5rem;
	text-align: right;
}
#R article h1 { animation: R 2s ease-in 0s normal 1 forwards; }
#R article h3 { animation: R 2s ease-in 0.175s normal 1 forwards; }
@keyframes R { to { opacity: 1; } }
article ul { padding-top: 2rem; }
article li {
	text-align: right;
	margin-bottom: 0.5rem;
	position: relative;
	z-index: 1;
	left: -50%;
	opacity: 0;
}
article li:last-child { margin-bottom: 0; }
article li:before {
	content: '>';
	margin-right: 1rem;
	font-weight: bold;
	display: inline-block;
	vertical-align: middle;
}
#R article li:first-child { animation: V 1.25s ease-out 0.25s normal 1 forwards, X 20.3s linear 4.3s normal infinite, Z 20.3s linear 4.3s normal infinite; }
#R article li:nth-child(2) { animation: V 1.25s ease-out 0.6s normal 1 forwards, X 20.3s linear 4.15s normal infinite, Z 20.3s linear 4.15s normal infinite; }
#R article li:nth-child(3) { animation: V 1.25s ease-out 0.95s normal 1 forwards, X 20.3s linear 4s normal infinite, Z 20.3s linear 4s normal infinite; }
#R article li:nth-child(4) { animation: V 1.25s ease-out 1.3s normal 1 forwards, X 20.3s linear 3.85s normal infinite, Z 20.3s linear 3.85s normal infinite; }
#R article li:nth-child(5) { animation: V 1.25s ease-out 1.65s normal 1 forwards, X 20.3s linear 3.7s normal infinite, Z 20.3s linear 3.7s normal infinite; }
#R article li:last-child { animation: V 1.25s ease-out 2s normal 1 forwards, X 20.3s linear 3.55s normal infinite, Z 20.3s linear 3.55s normal infinite; }
@keyframes V {
	to {
		opacity: 1;
		left: 0;
	}
}
@keyframes X {
	2% { transform: scale(1.15); }
	3.5% { transform: scale(1); }
	to { transform: scale(1); }
}
#R article li:first-child a { animation: W 1s linear 0.85s normal 1 forwards, Z 20.3s linear 4.3s normal infinite; }
#R article li:nth-child(2) a { animation: W 1s linear 1.35s normal 1 forwards, Z 20.3s linear 4.15s normal infinite; }
#R article li:nth-child(3) a { animation: W 1s linear 1.85s normal 1 forwards, Z 20.3s linear 4s normal infinite; }
#R article li:nth-child(4) a { animation: W 1s linear 2.35s normal 1 forwards, Z 20.3s linear 3.85s normal infinite; }
#R article li:nth-child(5) a { animation: W 1s linear 2.85s normal 1 forwards, Z 20.3s linear 3.7s normal infinite; }
#R article li:last-child span { animation: W 1s linear 3.3s normal 1 forwards, Z 20.3s linear 3.55s normal infinite; }
@keyframes W { to { color: #fff; } }
@keyframes Z {
	2% { text-shadow: 0 0.25rem 1rem #211539; }
	3.5% { text-shadow: none; }
	to { text-shadow: none; }
}
main section {
	text-align: left;
	justify-content: center;
	position: relative;
	right: 5%;
	opacity: 0;
	padding-left: 1rem;
}
main#R section { animation: J 1.25s ease-out 2.7s normal 1 forwards; }
@keyframes J {
	55% { opacity: 0.175; }
	to {
		right: 0;
		opacity: 1;
	}
}
fieldset > div { margin-bottom: 1rem; }
fieldset > div:last-child { margin-bottom: 0; }
select, input[type="submit"], input[type="text"], input[type="password"]{ border: 0; }
.z > .i, input[type="text"], input[type="password"]{
	display: inline-block;
	vertical-align: bottom;
	padding: 0.5rem 0;
	border-bottom: 1px solid #fff;
	background: transparent;
}
.z select { margin: 0 0.125rem 0 0.3rem; }
option { background: rgb(33, 21, 57); }
.z input[type="text"] { width: 9.5rem; }
select {
	display: inline-block;
	vertical-align: top;
}
input[type="text"], input[type="password"]{ width: 12rem; }
input[type="submit"]{
	font-weight: bold;
	background: linear-gradient(to right, #211539, rgba(33, 21, 57, 0.33));
	padding: 0.75rem 1rem;
	line-height: 1.25;
	cursor: pointer;
	border-bottom: 0;
	word-spacing: 0.5rem;
	border-radius: 0 !important;
}
input[type="submit"]:hover, input[type="submit"]:focus {
	color: #211539;
	background: #9dc;
	position: relative;
	left: 0;
	animation: Q 0.5s linear 0s alternate infinite;
}
@keyframes Q { to { left: 0.25rem; } }
body > section, [data-step], [data-steps-backward], [data-step="4"] select { display: none; }
.x section {
	width: 75%;
	text-align: left;
	align-self: center;
}
.x h3 {
	color: rgb(33, 21, 57);
	padding: 1rem;
	flex: none;
	font-size: 1.5em;
	z-index: 1;
	text-shadow: 0 0 0.5rem #9dc, 0 0 1rem #9dc, 0 0 2rem #9dc;
	background: linear-gradient(to right, #9dc 33%, transparent);
}
.x section > div, .x ul {
	justify-content: flex-start;
}
.x ul { padding-right: 1rem; }
.x li { text-indent: -1rem; }
.x li, [data-step] { line-height: 1.3; }
.x li:before {
	content: '>';
	display: inline-block;
	font-weight: bold;
	margin-right: 1rem;
	position: relative;
	left: 1rem;
}
.x li:after { content: ''; }
.x li:after { margin-bottom: 0.5rem; }
.x li:last-child:after { margin-bottom: 0; }
.x section > div {
	background: #fff;
	padding: 1.5rem 0;
	text-shadow: 0 0 0.5rem #fff, 0 0 0.5rem #fff, 0 0 1rem #fff, 0 0 1rem #fff;
	justify-content: center;
	cursor: default;
}
.x a, .x li:before, .x article li span { color: #06f; }
.x a.b {
	font-weight: bold;
	font-size: 125%;
	position: relative;
	left: 0;
}
.x a.b:hover, .x a.b:active, .x a.b:focus { animation: Q 0.5s linear 0s alternate infinite; }
.x p {
	padding: 0 1rem;
	text-align: right;
}
.x ul { margin-left: 13rem; }
#A div { background: #fff url(../s/7.jpg) no-repeat; }
#A select {
	font-weight: bold;
	border: 0;
	position: relative;
	left: -0.25rem;
}
#B div { background: #fff url(../s/6.jpg) no-repeat; }
#B div { padding: 3rem 0; }
#C div { background: #fff url(../s/9.jpg) no-repeat; }
#D div { background: #fff url(../s/5.jpg) no-repeat; }
#C div > a:first-child,
#D div > a:first-child {
	text-align: center;
	line-height: 0;
}
#C ul, #D ul, #C p, #D p, #E p { margin-top: 1.5rem; }
#E > div { background: #fff url(../s/8.jpg) no-repeat; }
.o a, .o:before { color: #f63 !important; }
.o > span, #A li > span, #D li span { color: #999; }
.o .z { text-indent: 0; }
.o .i { border-color: #211539; }
#L {
	position: fixed;
	top: calc(100% + 5rem);
	left: calc(50% - 2rem);
	animation: M 5s linear 0s normal 1 forwards;
	width: 5rem;
	z-index: -1;
}
#L b {
	position: relative;
	background-image: radial-gradient(#fff, transparent 50%);
	border-radius: 100%;
	opacity: 0;
}
@keyframes M {
	to {
		top: calc(100% - 5rem);
		opacity: 0.33;
	}
}
@keyframes N1 { from { transform: scale(1); } to { opacity: 0.8; transform: scale(0.8); top: -0.9rem; left: 0.7rem; } }
@keyframes N2 { from { transform: scale(1); } to { opacity: 0.7; transform: scale(0.7); top: -6.2rem; } }
@keyframes N3 { from { transform: scale(1); } to { opacity: 0.6; transform: scale(0.6); top: -10.1rem; left: 1rem; } }
@keyframes N4 { from { transform: scale(1); } to { opacity: 0.5; transform: scale(0.5); top: -14.3rem; left: 0.9rem; } }
@keyframes N5 { from { transform: scale(1); } to { opacity: 0.4; transform: scale(0.4); top: -17.8rem; left: 1.65rem; } }
@keyframes N6 { from { transform: scale(1); } to { opacity: 1; transform: scale(0.9); top: -10.7rem; left: 0.45rem; } }
#L b:nth-child(1){
	width: 3.5rem;
	height: 3.5rem;
	top: 0;
	left: 0.6rem;
	animation: N1 1s ease 0.2s alternate infinite;
}
#L b:nth-child(2){
	width: 3rem;
	height: 3rem;
	top: -5.7rem;
	left: 0.3rem;
	animation: N2 1s ease 0.4s alternate infinite;
}
#L b:nth-child(3){
	width: 2.5rem;
	height: 2.5rem;
	top: -9.25rem;
	left: 1.25rem;
	animation: N3 1s ease 0.6s alternate infinite;
}
#L b:nth-child(4){
	width: 1.75rem;
	height: 1.75rem;
	top: -12.75rem;
	left: 0.75rem;
	animation: N4 1s ease 0.8s alternate infinite;
}
#L b:nth-child(5){
	width: 1.4rem;
	height: 1.4rem;
	top: -16rem;
	left: 1.6rem;
	animation: N5 1s ease 1s alternate infinite;
}
#L b:nth-child(6){
	width: 3rem;
	height: 3rem;
	top: -9.7rem;
	left: 0.5rem;
	animation: N6 1s ease 0s alternate infinite;
}
#L b:nth-child(6) svg {
	height: 100%;
	fill: rgba(0, 0, 0, 0.5);
}
[data-step], [data-step] p {
	position: relative;
	left: -2rem;
	opacity: 0;
	animation: V 0.25s linear 0s normal 1 forwards;
}
[data-step="0"], #L b, #C div > a:first-child, #D div > a:first-child, .x li:after, form div > b:first-child, label { display: block; }
[data-steps-backward] {
	margin-right: 1rem;
	vertical-align: middle;
}
[data-step] b { margin-bottom: 0.5rem; }
[data-step] p {
	margin: 1rem 0 0 0;
	height: auto !important;
	padding: 0.5rem 0.75rem;
	left: -1rem;
}
[data-step] p b, [data-step] p a { color: #ff9; }
.x article {
	padding: 0 0 0.5rem 0;
	margin: 0 1rem;
	width: calc(100% - 2rem);
	background: #fff;
}
.x article h1, .x article h3 { width: 100%; }
.x article h1 {
	background: url(../b.png) center center;
	background-size: 100%;
	box-sizing: content-box;
	padding: 1rem 0;
}
.x article h3 { padding: 1rem 0; }
.x article h3, .x article li { text-align: center; }
.x article ul {
	padding: 1rem 0;
	margin: 0;
}
.x article h1, .x article h3, .x article li { opacity: 1; }
.x article li { left: 0; }
.x article li:after { margin-bottom: 0; }
.x article li:before {
	color: rgb(33, 21, 57);
	margin-right: 1.5rem;
}
article.bw { padding-top: 0.5rem; }
article.bw h1 img { filter: invert(); }
article.bw h3 { display: none; }
article.bw h1 { padding-bottom: 0; }
.l { font-size: 93%; }
.l a:last-child img {
	margin: 0.75rem 0.5rem 0 0;
	vertical-align: -0.6rem;
}
.f {
    display: flex;
    flex-flow: column;
}
.f a { margin-bottom: 0.5rem; }
@media screen and (orientation: portrait){
	main { flex-flow: column; }
	main section, article { width: 100%; }
	article {
		justify-content: flex-end;
		padding-bottom: 1rem;
		padding-right: 0;
	}
	article li, article h3 { text-align: center; }
	article h1, article h3, main form { align-self: center; }
	main section {
		justify-content: flex-start;
		padding: 1rem 1rem 0 1rem;
	}
	.c { text-align: center; }
	.x section { width: 100%; }
	.x h3 { background: linear-gradient(to right, #9dc 50%, transparent); }
	.x div { background-size: 50% !important; }
	.x ul { margin-left: 2rem; }
	#B div { padding: 2rem 0; }
	#E li:first-child {
		padding-left: 3.5rem;
		margin-bottom: 1rem;
	}
}
@media screen and (max-width: 560px),
	screen and (max-height: 560px){

	body { font-size: 93%; }
	article h1 { height: 2.65rem; }
}
@media screen and (max-width: 440px),
	screen and (max-height: 440px){

	body { font-size: 85%; }
	article h1 { height: 2.40rem; }
}
@media screen and (max-width: 320px),
	screen and (max-height: 320px){

	body { font-size: 77%; }
	article h1 { height: 2.15rem; }
}
@media screen and (max-width: 240px),
	screen and (max-height: 240px){

	body { font-size: 70%; }
	article h1 { height: 1.90rem; }
}
@media screen and (max-width: 560px) and (max-height: 560px),
	screen and (max-width: 440px) and (max-height: 440px),
	screen and (max-width: 320px),
	screen and (max-height: 320px){

	main { flex-flow: column; }
	main section, article { width: 100%; }
	article h3, article ul { display: none; }
	article h1, article h3, main form { align-self: center; }
	article { padding-bottom: 0; }
	main section {
		justify-content: center;
		padding: 1rem 1rem 0 1rem;
	}
	.c { text-align: center; }
	.x section {
		height: 100%;
		overflow-y: auto;
	}
}
[data-communicate="LEGAL"], [data-communicate="LEGAL"] .x, [data-communicate="LEGAL"] section {	-webkit-tap-highlight-color: transparent; }
[data-communicate="LEGAL"] section {
	margin: 0;
	width: 100%;
	height: 100%;
	background: linear-gradient(to bottom, transparent 25%, #f63);
	color: #fff;
	justify-content: flex-end;
	font-weight: bold;
	text-align: center;
	padding: 1rem;
	text-shadow: 0 1px 1px rgba(0, 0, 0, 0.25);
}
[data-communicate="LEGAL"] a { color: #e8ebae; }
[data-communicate="LEGAL"] a:last-child {
	display: inline-block;
	margin-top: 1rem;
	padding: 0.5rem 1rem;
	background: #fff;
	color: #211539 !important;
}
</style>
	<script src="r/z.js"></script>
	<script>
var X = {}; $(function(Y){ for(Y in X){ if(typeof X[Y] == 'function'){ X[Y](); } } });
window.onload = function(){ $('main').attr('id', 'R'); };
X.welcome = function(){ terminal({ objs: $('h3 b'), betweenIntervals: 1789, betweenLetters: 125, markWait: 3000, startWait: 567 }); };
	</script>
</head>
<body>
	<div id="L"><b></b><b></b><b></b><b></b><b></b><b></b></div>
	<main>
		<article>
			<h1><a href="https://legacy.localhost"><img src="w.svg" alt="Logo"></a></h1>
			<h3><b data-text="Server Legacy"></b><b data-text="Crea tu sitio web"></b><b class="I">&nbsp;</b></h3>
			<ul>
				<li><a data-action="require" data-action-event="click" data-required-object="#A" href="#">Dirección y hospedaje web</a></li>
				<li><a data-action="require" data-action-event="click" data-required-object="#C" href="#">Editor visual de páginas</a></li>
				<li><a data-action="require" data-action-event="click" data-required-object="#D" href="#">Panel de administración</a></li>
				<li><a data-action="require" data-action-event="click" data-required-object="#B" href="#">Control de visitantes</a></li>
				<li><a data-action="require" data-action-event="click" data-required-object="#E" href="#">Soporte y opciones</a></li>
				<li><span>Plantilla gratis</span></li>
			</ul>
		</article>
		<section>
			<form action="/order" method="post" autocomplete="off">
				<fieldset>
					<div class="z" data-step="0" data-current-btn="Cotizar >" data-next-btn="Continuar >" data-ok-message="La dirección web {SITE} se activa mediante soporte en línea. Mientras tanto podrá usar la <b>dirección interna</b>." data-err-name="De 5 a 24 letras minúsculas sin tilde, puntos, espacios ni símbolos">
						<b>Elija dirección web</b>
						<input class="i" type="text" name="n" placeholder="nombre" data-action="adapt" data-action-event="keydown keyup focus blur"><span class="i" >&nbsp;.</span><div class="i" >
							<select name="e" data-action="price" data-action-event="change">
HTML;

$P = 0;
foreach(unserialize(file_get_contents('../extensions')) as $A => $B){ echo '<option data-item-price="' . $B['price'] . '" value="' . $A . '"' . (($A == 'com') ? 'selected' : '') . '>' . $A . '</option>'; }
$P = unserialize(file_get_contents('../prices'));

echo <<<HTML
							</select>
						</div>
					</div>
					<div class="z" data-step="1" data-current-btn="Continuar >" data-wait-btn="Verificando..." data-next-btn="Continuar >" data-ok-message="Con esta dirección: {SITE}, podrá entrar al sitio." data-ok-wait="Podría estar disponible" data-err-name="De 3 a 24 letras minúsculas sin tilde, puntos, espacios ni símbolos" data-err-unav="Dirección no disponible">
						<b>Dirección interna</b>
						<input class="i" type="text" name="i" placeholder="nombre" data-action="adapt" data-action-event="keydown keyup focus blur"><span class="i" >&nbsp;.&nbsp;okzgn&nbsp;.&nbsp;com&nbsp;</span>
					</div>
					<div data-step="2" data-user="[name='u']" data-password="[name='p']" data-password-repeat="[name='r']" data-current-btn="Continuar >" data-err-large="Usuario o contraseña muy larga" data-err-equal="Contraseña mal escrita" data-err-weak="Usuario y contraseña débil" data-ok-message="Anote su contraseña y nombre de usuario: {USER}. Con esta dirección: {SITE}, podrá ingresar al panel.">
						<b>Panel de administración</b>
						<input type="text" name="u" placeholder="Nombre de usuario"><br>
						<input type="password" name="p" placeholder="Contraseña"><br>
						<input type="password" name="r" placeholder="Repetir contraseña">
					</div>
					<div data-step="3" data-current-btn="Continuar >" data-next-btn="Crear">
						<b>¿Tiene algún cupón?</b>
						<input type="text" name="k" placeholder="Código del cupón"><br>

					</div>
					<div data-step="4">
						<b>Acuerdo de servicios y costos</b>
						<p data-ok>Al crear el sitio web expresa que: conoce, entiende y cumplirá las <a target="_blank" href="https://localhost/politicas-vigentes"><b>políticas vigentes</b></a>. El costo es <b data-total-price>$0.00</b> por los <a data-action="require" data-action-event="click" data-required-object="article" data-required-fn="addClassInside" data-required-fn-str="article" data-required-fn-class="bw" href="#"><b>servicios</b></a> con la configuración actual que puede <a data-action="require" data-action-event="click" data-required-object="article" data-required-fn="addClassInside" data-required-fn-str="article" data-required-fn-class="bw" href="#"><b>configurar</b></a> o ver haciendo clic en los ítems. Después de crearlo podrá probarlo gratis unos diez minutos, luego deberá continuar con el pago mediante soporte en línea.</p>
					</div>
					<div class="c"><a data-steps-backward href="#"><b>Atrás</b></a><input type="submit" value="Cotizar &gt;" data-action="steps" data-backward="[data-steps-backward]" data-start="0" data-targets="[data-step]" data-check="fields" data-action-event="click"></div>
					<div class="c l f"><a target="_blank" href="https://localhost/politicas-vigentes">Políticas vigentes</a><a target="_blank" href="https://okzgn.com/#contact">Soporte</a></div>
				</fieldset>
			</form>
		</section>
	</main>
	<section id="A">
		<h3>Dirección y hospedaje web</h3>
		<div>
			<ul>
				<li><b>Dirección de tipo .localhost</b><br>
					<span>(Ejemplo: https://sitio.localhost)</span>
				</li>
				<li><select name="s" data-action="price" data-action-event="change">
HTML;
$B = $P['mbs'][$C['diskspace_mbs_parts']];
for($A = $C['diskspace_mbs_parts']; $A <= $DISKSPACE_MB; ($A += $C['diskspace_mbs_parts'])){
	$B = (!isset($P['mbs'][$A]) ? $B : $P['mbs'][$A]);
	echo '<option data-item-price="' . ($B * $A) . '" value="' . $A . ' MB">' . $A . ' MB</option>';
}

$B = $P['gb'][$C['output_gb_parts']];
for($A = $C['diskspace_gbs_parts']; $A <= $DISKSPACE_GB; ($A += $C['diskspace_gbs_parts'])){
	if($A > $C['diskspace_gbs_limit']){ break; }
	$B = (!isset($P['gb'][$A]) ? $B : $P['gb'][$A]);
	echo '<option data-item-price="' . ($B * $A) . '" value="' . $A . ' GB"' . (($A == 1) ? 'selected' : '') . '>' . $A . ' GB</option>';
}

echo <<<HTML
					</select><b>de espacio</b> de hospedaje de información<br>
					<span>(Archivos, imágenes, datos subidos o guardados)</span>
				</li>
				<li><select name="b" data-action="price" data-action-event="change">
HTML;

$B = $P['mbs'][$C['output_mbs_parts']];
for($A = $C['output_mbs_parts']; $A <= $OUTPUT_MB; ($A += $C['output_mbs_parts'])){
	$B = (!isset($P['mbs'][$A]) ? $B : $P['mbs'][$A]);
	echo '<option data-item-price="' . ($B * $A) . '" value="' . $A . ' MB">' . $A . ' MB</option>';
}

$B = $P['gb'][$C['output_gb_parts']];
for($A = $C['output_gb_parts']; $A <= $OUTPUT_GB; ($A += $C['output_gb_parts'])){
	$B = (!isset($P['gb'][$A]) ? $B : $P['gb'][$A]);
	echo '<option data-item-price="' . ($B * $A) . '" value="' . $A . ' GB">' . $A . ' GB</option>';
}
$D = ($C['output_gbs_parts'] * 2);
$B = $P['gbs'][$D];
for($A = $D; $A <= $OUTPUT_GBS; ($A += $C['output_gbs_parts'])){
	if($A > $C['output_gbs_limit']){ break; }
	$B = (!isset($P['gbs'][$A]) ? $B : $P['gbs'][$A]);
	echo '<option data-item-price="' . ($B * $A) . '" value="' . $A . ' GB"' . (($A == 50) ? 'selected' : '') . '>' . $A . ' GB</option>';
}

echo <<<HTML
					</select><b>de transferencia</b> saliente por mes<br>
					<span>(Páginas o información que visitantes ven, descargan, solicitan o reciben)</span>
				</li>
			</ul>
		</div>
	</section>
	<section id="B">
		<h3>Control de visitantes</h3>
		<div>
			<ul>
				<li><b>Protección contra <a target="_blank" href="https://es.wikipedia.org/wiki/Ataque_de_fuerza_bruta">ataques de "fuerza bruta"</a></b></li>
				<li><b>Bloqueo de exceso de visitas</b> en intervalos de tiempo</li>
				<li><b>Configuración del mecanismo</b> de bloqueos</li>
			</ul>
		</div>
	</section>
	<section id="C">
		<h3>Editor visual de páginas</h3>
		<div>
			<a href="http://www.tiny.cloud"><img src="t.svg" width="126" height="58" alt="TinyMCE"></a>
			<ul>
				<li><b>Subida automática</b> de imágenes</li>
				<li><b>Herramientas para fotos</b>, estilo, formato, y más</li>
				<li><b>Búsqueda, reemplazo</b> de palabras</li>
				<li><b>Índice de contenido</b> y marcadores</li>
				<li><b>Ayudas visuales</b> para editar</li>
				<li><b>Modificación de HTML</b></li>
			</ul>
			<p><a class="b" target="_blank" href="/apanel/edit/EJEMPLO.html?action=enter">Demostración &gt;</a></p>
		</div>
	</section>
	<section id="D">
		<h3>Panel de administración</h3>
		<div>
			<a href="/apanel/?action=enter"><img src="a.svg" width="151" height="58" alt="Apanel CMS"></a>
			<ul>
				<li><b>Rápido y seguro</b></li>
				<li><b>Administrador de archivos</b> básico</li>
				<li><b>Editor visual de páginas</b> integrado</li>
				<li><b>Proceso de guardado en 2 etapas</b><br><span>(Seguridad contra cambios no autorizados)</span></li>
				<li><b>Controlador de visitas</b></li>
			</ul>
			<p><a class="b" target="_blank" href="/apanel/?action=enter">Demostración &gt;</a></p>
		</div>
	</section>
	<section id="E">
		<h3>Soporte y opciones</h3>
		<div>
			<ul>
				<li><b>1 hora mensual incluida de soporte</b> solicitado</li>
				<li class="o"><a href="https://localhost/politicas-vigentes#delivery"><b>Plantillas de páginas web</b></a> compatibles con dispositivos móviles<br>
					<span>(Creación visual o estética de páginas e interfaces web)</span>
					<label class="z">
						<div class="i">
							<select name="t" data-action="price" data-target="[data-templates-price]" data-action-event="change">
HTML;

$P = unserialize(file_get_contents('../templates'));
foreach($P as $A => $B){ echo '<option data-item-price="' . $B . '" value="' . $A . '"' . (($A == 1) ? 'selected' : '') . '>' . $A . '</option>'; }

echo <<<HTML
							</select>
						</div><span class="i">&nbsp;plantilla(s)&nbsp;</span><span class="p i"><b data-templates-price>$0.00</b></span>
					</label>
				</li>
				<li class="o"><a href="https://localhost/politicas-vigentes#delivery"><b>Componentes funcionales</b></a> compatibles con navegadores de escritorio y móviles<br>
					<span>(Creación del funcionamiento de páginas e interfaces web, como registro de usuarios o datos, validaciones, envíos, etc)</span>
					<label class="z">
						<div class="i">
							<select name="c" data-action="price" data-target="[data-components-price]" data-action-event="change">
HTML;

$P = unserialize(file_get_contents('../components'));
foreach($P as $A => $B){ echo '<option data-item-price="' . $B . '" value="' . $A . '"' . (!$A ? 'selected' : '') . '>' . $A . '</option>'; }

echo <<<HTML
							</select>
						</div><span class="i">&nbsp;componente(s)&nbsp;</span><span class="p i"><b data-components-price>$0.00</b></span>
					</label>
				</li>
				<li><b>Cuentas de emails y bases de datos</b> no se incluyen, se ofrecen por separado</li>
			</ul>
			<p><a class="b" target="_blank" href="https://okzgn.com/#contact">Contactar &gt;</a></p>
		</div>
	</section>
	<script src="r/t.js"></script><link rel="stylesheet" href="r/t.css">
	<script src="r/c.js"></script><link rel="stylesheet" href="r/c.css">
	<script src="r/q.js"></script>
	<script src="r/f.js"></script><link rel="stylesheet" href="r/f.css">
	<script src="r/a.js"></script>
	<script src="r/a.r.js"></script>
	<script src="r/a.a.js"></script>
	<script src="r/a.s.js"></script>
	<script>
var fields = [
	{
		forward: function(o, k, e, y, s){
			(e = k.stepObject.find('[type="text"]').val().toLowerCase()), (s = k.stepObject.find('option').filter(function(){ return this.selected; }).val()), k.stepObject.find('p').remove();
			if(!(e.length > 4 && e.length < 25) || /[^a-z0-9]/.test(e)){ (o.r = ('<p data-err>' + k.stepData.errName + '</p>')), (o.state = 'stop'); }
			else { (o.r = ('<p data-ok>' + k.stepData.okMessage.replace('{SITE}', ('<b>' + e + '.' + s + '</b>'))) + '</p>'), (o.state = 'wait'), k.stepObject.parent().find('[type="submit"]').val(k.stepData.nextBtn), setTimeout(function(){ k.nextStepObject.find('[type="text"]').first().val((e.indexOf('.') != -1) ? e.split('.').pop() : e).focus(); }, 250); }
			$(o.r).appendTo(k.stepObject);
			return o;
		},
		backward: function(o, k){ k.stepObject.parent().find('[type="submit"]').val(k.stepData.currentBtn); }
	},
	{
		forward: function(o, k, e, y, s){
			(e = k.stepObject.find('[type="text"]').val().toLowerCase()), (s = k.stepObject.find('option').filter(function(){ return this.selected; }).val());
			if(!(e.length > 2 && e.length < 25) || /[^a-z0-9]/.test(e)){ (delete k.verify), (o.r = ('<p data-err>' + k.stepData.errName + '</p>')); }
			else if(e == k.verify){ (delete o.state), setTimeout(function(){ k.nextStepObject.find('[type="text"]').val(e), k.nextStepObject.find('[type="password"]').first().focus(); }, 250); return o; }
			else {
				(s = k.stepObject.parent().find('[type="submit"]')),
				$.get('/verify', { n: e }, function(i, m){
					(m = k.stepObject.find('p')), s.val(k.stepData.nextBtn);
					m.html((k.verify = (!i ? 0 : e)) ? k.stepData.okMessage.replace('{SITE}', ('<b>' + e + '.localhost</b>')) : k.stepData.errUnav);
					if(!k.verify){ m.removeAttr('data-ok').attr('data-err', ''); }
					else { setTimeout(function(){ k.nextStepObject.find('[type="text"]').val(e), k.nextStepObject.find('p').remove(), k.nextStepObject.find('[type="password"]').first().focus(); }, 250); }
				});
				(o.r = ('<p data-ok>' + k.stepData.okWait + '</p>')), s.val(k.stepData.waitBtn);
			}
			k.stepObject.find('p').remove(), $(o.r).appendTo(k.stepObject), (o.state = 'stop');
			return o;
		},
		backward: function(o, k){ k.stepObject.parent().find('[type="submit"]').val(k.stepData.currentBtn); }
	},
	{
		forward: function(o, k, e, y, s){
			(e = k.stepObject.find(k.stepData.user).val()), (y = k.stepObject.find(k.stepData.password).val()), (s = k.stepObject.find(k.stepData.passwordRepeat).val()),  k.stepObject.find('p').remove();
			if(y != s){ (o.r = ('<p data-err>' + k.stepData.errEqual + '</p>')), (o.state = 'stop'), $(o.r).appendTo(k.stepObject), (o.r = (e + y + s)); }
			else if(e.length > 24 || y.length > 24){ (o.r = ('<p data-err>' + k.stepData.errLarge + '</p>')), (o.state = 'wait'), $(o.r).appendTo(k.stepObject), (o.r = (e + y + s)); }
			else if(e.length < 3 && y.length < 3){ (o.r = ('<p data-err>' + k.stepData.errWeak + '</p>')), (o.state = 'wait'), $(o.r).appendTo(k.stepObject), (o.r = (e + y + s)); }
			else { (o.r = ('<p data-ok>' + k.stepData.okMessage.replace('{USER}', ('<b>' + e + '</b>')).replace('{SITE}', ('<b>' + k.prevStepObject.find('[type="text"]').val() + '.localhost/apanel/</b>')) + '</p>')), $(o.r).appendTo(k.stepObject), (o.r = (e + y + s)), (o.state = 'wait'), setTimeout(function(){ k.nextStepObject.find('[type="text"]').focus(); }, 250); }
			return o;
		},
		backward: function(o, k){ k.stepObject.parent().find('[type="submit"]').val(k.stepData.currentBtn); }
	},
	{
		forward: function(o, k){ k.stepObject.parent().find('[type="submit"]').val(k.stepData.nextBtn); },
		backward: function(o, k){ k.stepObject.parent().find('[type="submit"]').val(k.stepData.currentBtn); }
	},
	{
		forward: function(m, e){
			if(e.restriction){ return; }
			e.restriction = 1;
			e.stepObject.find('select').remove(), e.stepObject.append($('body > section [data-action="price"]').clone()), (m.state = 'stop');
			F({ formObj: e.stepObject.closest('form'), destinyMethod: 'before', destinyStr: '.c:not(.l)', outStyle: 'O', doneFn: function(){ return (e.restriction = 0); }});
			return m;
		}
	}
];
A.price = function(o, k, s){
	o = k.origin.find('option').filter(function(i){ if(this.selected){ $('body > section [name="' + k.origin.attr('name') + '"] option').removeAttr('selected').eq(i).attr('selected', ''); return 1; } }), (o = o.attr('data-item-price')), A.price.total();
	if(k.target){ $(k.target).text('$' + A.price.format(o)); }
};
A.price.format = function(a){ (a = (a + '').split('.')), (a[1] = (!a[1] ? '00' : (a[1] + '0').slice(0, 2))); return a.slice(0, 2).join('.'); }
A.price.total = function(x){ (x = 0), $('body > section [data-action="price"], [name="e"]').each(function(){ x += ($(this).find('option').filter(function(){ return this.selected }).attr('data-item-price') * 1); }), $('[data-total-price]').text('$' + A.price.format(x + 18.5) + ' por año'); };
A.addClassInside = function(b, d){ b.find(d.requiredFnStr).addClass(d.requiredFnClass); };
A.orderOk = function(x, y){ $('[data-step="4"] [data-ok]').html('<b><a href="https://okzgn.com/#contact">Continúe con el pago mediante soporte en línea</a></b>, o pruebe el sitio durante unos minutos.<br><br>Identificador de venta: <b>' + x + '</b><br>Sitio web: <b><a target="_blank" href="https://' + y + '.localhost">' + y + '.localhost</a></b><br>Panel de administración: <b><a target="_blank" href="https://' + y + '.localhost/apanel/">' + y + '.localhost/apanel/</a></b>'), $('form .c').remove(); };
X.init = function(x, y, z){
	(x = function(i, s){ (i = $(this)), i.val(i.val().replace(/\s+/g, '')); }), (y = $('[data-step="0"] input, [data-step="1"] input')), y.on({ keydown: x, keyup: x }),
	setTimeout(function(){ y.first().focus(), $('[data-action="price"]').change(); }, 123);
	if(window['localStorage'] && (z = localStorage.getItem('OKZGN-POLICIES'))){
		if(((new Date).getTime() - z) > 5184000000){ localStorage.removeItem('OKZGN-POLICIES'), (z = 0); }
		else { z = 1; }
	}
	if(!z){ Communicate({ id: 'LEGAL', message: '<section><span>El/La visitante o cliente expresa que está de acuerdo con las <a href="https://localhost/politicas-vigentes">políticas vigentes</a> (de privacidad, condiciones de uso, etc) al entrar a, hacer clic en, o usar cualquier servicio, sitio web o aplicación de OKZGN.<br><a onclick="X.init.ok();">Aceptar</a></span></section>' }); }
};
X.init.ok = function(){
	if(window['localStorage']){ localStorage.setItem('OKZGN-POLICIES', (new Date).getTime()); }
	C.remove();
};
	</script>
</body>
</html>
HTML;
?>
