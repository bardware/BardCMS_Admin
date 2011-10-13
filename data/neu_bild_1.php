<?php //DATA
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: POST
FILENAME: neu_bild_1.php
FILETYPE: INCLUDE
*/

needPOSTvar("url");
needPOSTvar("beschr");

if(!empty($POSTurl)) {
	$info=getimagesize($imgStartDir.$POSTurl);
	$Abfrage="INSERT INTO ged_bilder (text, datei, breite, hoehe) VALUES('".myAddSlashes($POSTbeschr)."', '".$imgBildURL.$POSTurl."', ".$info[0].", ".$info[1].")";
//  echo $Abfrage;
	mysqli_query($conn, $Abfrage);
}   



if($stmt=mysqli_prepare($conn, "INSERT INTO ged_bilder (text, datei, breite, hoehe) VALUES(?, ?, ?, ?)")) {
	mysqli_stmt_bind_param($stmt, "ssii", $POSTbeschr, $imgBildURL.$POSTurl, $info[0], $info[1]);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	$BID=mysqli_insert_id($conn);
} else {
	echo mysqli_error($conn);
} 
?>