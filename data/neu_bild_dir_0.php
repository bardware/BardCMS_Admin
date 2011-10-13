<?php //DATA 
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD:
FILENAME: neu_bild_dir_0.php
FILETYPE: INCLUDE
*/

needGETVar('nebeneinander');
$GETnebeneinander=abs(intval($GETnebeneinander));
if($GETnebeneinander==0 or $GETnebeneinander>10) {
	$GETnebeneinander=6;
}

$arrBilderPHP=array();

$handle=opendir($imgStartDir.$GETdir);
while(false!==($DateiName=readdir($handle))) {
	if($DateiName!= "." && $DateiName!="..") {
		if(!is_dir($imgStartDir.$GETdir."/".$DateiName)) {
//			if(preg_match("/\.[jJ][pP][eE]?[gG]$/", $DateiName)) {
//			if(preg_match("/\.JPE?G$/i", $DateiName)) {
			if(stripos($DateiName, ".JPG", strlen($DateiName)-4)!==false or stripos($DateiName, ".JPEG", strlen($DateiName)-5)!==false ) {
				$arrSize=getimagesize($imgStartDir.$GETdir."/".$DateiName);
				$arrBilderPHP[$DateiName]['breit']=$arrSize[0];
				$arrBilderPHP[$DateiName]['hoch']=$arrSize[1];
				$arrBilderPHP[$DateiName]['pfad']=$GETdir;
				$arrBilderPHP[$DateiName]['datei']=$DateiName;
				$arrBilderPHP[$DateiName]['updates']=null;
				$arrBilderPHP[$DateiName]['kommentar']=null;
				$arrBilderPHP[$DateiName]['indb']=false;
				$arrBilderPHP[$DateiName]['nocomment']=true;
			}
		}
	}
}
closedir($handle);

if($stmt=mysqli_prepare($conn, "SELECT datei, kid, kommentar FROM ged_bilder b LEFT OUTER JOIN ged_kommentare k ON k.bid=b.bid AND k.datum=(SELECT MAX(datum) FROM ged_kommentare WHERE bid=k.bid) WHERE pfad=?")) {
	mysqli_stmt_bind_param($stmt, "s", $GETdir);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_bind_result($stmt, $datei, $kid, $komment);
	while(mysqli_stmt_fetch($stmt)) {
		$arrBilderPHP[$datei]['updates']=$kid;
		$arrBilderPHP[$datei]['kommentar']=$komment;
		$arrBilderPHP[$datei]['indb']=true;
		$arrBilderPHP[$datei]['nocomment']=(($kid=="")?true:false);
	}
	mysqli_stmt_close($stmt);
} else {
	echo mysqli_error($conn);
}
?>