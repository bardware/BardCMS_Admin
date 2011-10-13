<?php //DATA
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD:
FILENAME:
FILETYPE: INCLUDE
*/

needPOSTvar("datei");
needPOSTvar("text");
needPOSTvar("ftext");
needPOSTvar("alben");

if(!empty($GETdir))
	$GewDir=$GETdir;
else 
	$GewDir="";
	
if(substr($GewDir, -1)!="/") $GewDir.="/";

if(!empty($POSTdatei)) {
	foreach($POSTdatei as $POSTDatei) {
		if(isset($POSTtext[$POSTDatei]))
			$Text=myAddSlashes($POSTtext[$POSTDatei]);
		else
			$Text="";
		if(isset($POSTftext[$POSTDatei])) 
			$FText=myAddSlashes($POSTftext[$POSTDatei]);
		else
			$FText="";
		$info=getimagesize($imgStartDir.$GewDir.$_SESSION[$GewDir][$POSTDatei]);
		$Abfrage="INSERT INTO ged_bilder (text, langtext, datei, breite, hoehe) values('".$Text."', '".$FText."', '".$imgBildURL.$GewDir.$_SESSION[$GewDir][$POSTDatei]."', ".$info[0].", ".$info[1].")";
//		echo $Abfrage."<br>\n";
		mysqli_query($conn, $Abfrage);
		$id=mysqli_insert_id($conn);
//		echo $id."<br>\n";
		if(isset($POSTalben[$POSTDatei])) {
			foreach($POSTalben[$POSTDatei] as $POSTalbum) {
				$Abfrage="INSERT INTO ged_alben_bilder (aid, bid) values(".$POSTalbum.", ".$id.")";
//			  echo $Abfrage."<br>\n";
				mysqli_query($conn, $Abfrage);
				unset($_SESSION[$GewDir][$POSTDatei]);
			}
		}
	}
}
?>
