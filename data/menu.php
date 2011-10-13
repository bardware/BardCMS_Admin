<?php //DATA
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: GET
REQUESTMETHOD: POST
FILENAME: menu.php
FILETYPE: INCLUDE
*/

GetText($SESSIONlang, "menu");

$Abfrage="SELECT tid, IF(LENGTH(thema)>$MaxComboLen, CONCAT(LEFT(thema,$MaxComboLen), '...'), thema), thema FROM ged_themen ORDER BY thema";
//echo $Abfrage;
$erg=mysqli_query($conn, $Abfrage);

$Themen=Array();
while($row=mysqli_fetch_row($erg)) {
	$Themen[$row[0]]["tid"]=$row[0];
	$Themen[$row[0]]["thema"]=$row[1];
	$Themen[$row[0]]["full"]=$row[2];
}
mysqli_free_result($erg);

$Abfrage="SELECT bid, IF(LENGTH(head)>$MaxComboLen, CONCAT(LEFT(head,$MaxComboLen), '...'), head), head FROM ged_beitraege ORDER BY head";
$erg=mysqli_query($conn, $Abfrage);

$Beitraege=Array();
while($row=mysqli_fetch_row($erg)) {
	$Beitraege[$row[0]]["bid"]=$row[0];
	$Beitraege[$row[0]]["beitrag"]=$row[1];
	$Beitraege[$row[0]]["full"]=$row[2];
}

mysqli_free_result($erg);

$Abfrage="SELECT hid, IF(LENGTH(hostname)>$MaxComboLen, CONCAT(LEFT(hostname,$MaxComboLen), '...'), hostname), hostname FROM ged_hosts ORDER BY hostname";
$erg=mysqli_query($conn, $Abfrage);

$HostNamen=Array();
while($row=mysqli_fetch_row($erg)) {
	$HostNamen[$row[0]]["hid"]=$row[0];
	$HostNamen[$row[0]]["hostname"]=$row[1];
	$HostNamen[$row[0]]["full"]=$row[2];
}

mysqli_free_result($erg);

$Abfrage="SELECT aid, IF(LENGTH(album)>$MaxComboLen, CONCAT(LEFT(album,$MaxComboLen), '...'), album), album FROM ged_alben ORDER BY album";
//echo $Abfrage;
$erg=mysqli_query($conn, $Abfrage);

$Alben=Array();
while($row=mysqli_fetch_row($erg)) {
	$Alben[$row[0]]["aid"]=$row[0];
	$Alben[$row[0]]["album"]=$row[1];
	$Alben[$row[0]]["full"]=$row[2];
}
mysqli_free_result($erg);

if($stmt=mysqli_prepare($conn, "SELECT aid, link FROM ged_actions ORDER BY nutzung DESC, beschreibung ASC")) {
	mysqli_stmt_execute($stmt);
	echo mysqli_stmt_error($stmt);
	mysqli_stmt_bind_result($stmt, $aid, $tmpLink);

	$Actions=Array();
	while(mysqli_stmt_fetch($stmt)) {
		$Actions[$aid]["aid"]=$aid;
		$Actions[$aid]["link"]=$tmpLink;
	}

	mysqli_stmt_close($stmt);
} else {
	echo mysqli_error($conn);
}

?>
