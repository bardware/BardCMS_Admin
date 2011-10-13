<?php //DATA
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: POST
FILENAME: disassoc_bb_1.php
FILETYPE: INCLUDE
*/

needPOSTvar("bid");

foreach($POSTbid as $bildID) {
	$Abfrage="delete from ged_beitrag_bilder where beitrid=".$GETbid. " and bildid=$bildID";
//	echo $Abfrage;
	$erg=mysqli_query($conn, $Abfrage);
}

$Abfrage="update ged_beitraege set eintragdatum=now() where bid=".$GETbid;
//	echo $Abfrage;
$erg=mysqli_query($conn, $Abfrage);

$Abfrage="select gb.bid, gbb.bildid, gb.datei, gb.breite, gb.hoehe from ged_bilder gb left join
ged_beitrag_bilder gbb on gb.bid=gbb.bildid
where gbb.beitrid=".$GETbid."
ORDER BY gbb.rang, gbb.bildid";
//echo $Abfrage;
$erg=mysqli_query($conn, $Abfrage);

$arrBild=Array();
while($row=mysqli_fetch_row($erg)) {
	$arrBild[$row[0]]["nid"]=$row[0];
	$arrBild[$row[0]]["bildid"]=$row[1];
	$arrBild[$row[0]]["datei"]=$row[2];
	$arrBild[$row[0]]["breite"]=$row[3];
	$arrBild[$row[0]]["hoehe"]=$row[4];
}

mysqli_free_result($erg);
?>
