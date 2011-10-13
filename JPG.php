<?php 
$last_modi=gmdate("D, d M Y H:i:s", filemtime($_SERVER["SCRIPT_FILENAME"]))." GMT";

if(isset($_SERVER['HTTP_IF_MODIFIED_SINCE'])) {
	if($last_modi==$_SERVER['HTTP_IF_MODIFIED_SINCE']) {
		header('HTTP/1.1 304 Not Modified');
		exit;
	}
}
ob_start();

header("content-type:image/jpeg");
header("Last-Modified: ".$last_modi);

//require_once("data/start_session.php");
require("variables.inc.php");

if($im=imagecreatefromjpeg($imgStartDir.$_GET["file"])) {

	$Breite=ImagesX($im);
	$Hoehe=ImagesY($im);

	set_time_limit(120);

	if($Breite>$Hoehe) {
		$NeuBreite=$TNSize;
	   	$NeuHoehe=$Hoehe * ($NeuBreite / $Breite);
  	} else {
   		$NeuHoehe=$TNSize;
   		$NeuBreite=$Breite * ($NeuHoehe / $Hoehe);
  	}

  	$NeuImg=ImageCreateTrueColor($NeuBreite, $NeuHoehe);
  	ImageCopyResampled($NeuImg, $im, 0, 0, 0, 0, $NeuBreite, $NeuHoehe, $Breite, $Hoehe);

	ImageJPEG($NeuImg, "", 80);
	ImageDestroy($NeuImg);
	ImageDestroy($im);

}
$size=ob_get_length();
header("Content-Length: $size");
ob_end_flush();
?>