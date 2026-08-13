<?php
class cfmImageCustom {
	function salt(){ return ('salt-' . date('YFh') . '-'); }
	function hash($val = 0){ return md5($this->salt() . ((!$val && isset($_SESSION['cfmImage'])) ? $_SESSION['cfmImage'] : $val)); }
	function check($val){ return ($_SESSION['cfmImageHash'] === $this->hash($val)); }
	function renew(){
		$_SESSION['cfmImage'] = mt_rand(1000, 9999);
		$_SESSION['cfmImageHash'] = $this->hash();
		$this->hashVal = $_SESSION['cfmImageHash'];
	}
	function show(){
		header('Content-Type:image/png');
		$img = imagecreate(55, 33);
		$bg = imagecolorallocate($img, 128, 128, 128);
		$rgb = imagecolorallocate($img, 51, 51, 102);
		$ln1 = imageline($img, 0, 11, 67, 11, $rgb);
		$ln2 = imageline($img, 0, 22, 67, 22, $rgb);
		$ln3 = imageline($img, 11, 0, 11, 33, $rgb);
		$ln4 = imageline($img, 22, 0, 22, 33, $rgb);
		$ln5 = imageline($img, 33, 0, 33, 33, $rgb);
		$ln6 = imageline($img, 44, 0, 44, 33, $rgb);
		$dist = 7;
		$l = strlen($_SESSION['cfmImage']);
		$x = 0;
		do {
			$c = substr($_SESSION['cfmImage'], $x, 1);
			$g = ((($x % 2) == 0) ? mt_rand(1, 30) : mt_rand(-1, -30));
			imagettftext($img, 15, $g, $dist, 23, $rgb, ($_SERVER['DOCUMENT_ROOT'] . '/c3/custom/libs/cfmImage/r.ttf'), $c);
			$dist += 11;
			$x++;
		}
		while($x < $l);
		imagepng($img);
		imagedestroy($img);
	}
	function __construct(){
		require_once($_SERVER['DOCUMENT_ROOT'] . '/c3/uses/libs/sessions.php');
		new sessionsUses();
		if(!isset($_SESSION['cfmImage'])){ $this->renew(); }
		else { $this->hashVal = $_SESSION['cfmImageHash']; }
	}
}
?>
