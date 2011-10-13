<?php //DATA
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: POST
FILENAME: disassoc_ab_1.php
FILETYPE: INCLUDE
*/

needPOSTvar("bid");

if(!empty($POSTbid)) {
	foreach($POSTbid as $BID) {
		$Abfrage="DELETE FROM ged_alben_bilder WHERE aid=".$GETaid." AND bid=".$BID;
		mysqli_query($conn, $Abfrage);
	}
}

$Abfrage="SELECT gb.bid, gb.text, gb.datei, gb.breite, gb.hoehe FROM ged_bilder gb
LEFT JOIN ged_alben_bilder gab ON gab.bid=gb.bid
WHERE gab.aid=".$GETaid;
//echo $Abfrage;
$erg=mysqli_query($conn, $Abfrage);

$arrBild=Array();
while($row=mysqli_fetch_row($erg)) {
	$arrBild[$row[0]]["bid"]=$row[0];
	$arrBild[$row[0]]["text"]=$row[1];
	$arrBild[$row[0]]["datei"]=$row[2];
	$arrBild[$row[0]]["breite"]=$row[3];
	$arrBild[$row[0]]["hoehe"]=$row[4];
}
mysqli_free_result($erg);
?>
