<?php //DATA
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: GET
FILENAME: disassoc_bb_0.php
FILETYPE: INCLUDE
*/

$Abfrage="select head from ged_beitraege where bid=".$GETbid;
//echo $Abfrage;
$erg=mysqli_query($conn, $Abfrage);
$row=mysqli_fetch_row($erg);
$Head=$row[0];

mysqli_free_result($erg);

$Abfrage="select gb.bid, gbb.bildid, gb.datei, gb.breite, gb.hoehe, gb.text from ged_bilder gb left join
ged_beitrag_bilder gbb on gb.bid=gbb.bildid
where gbb.beitrid=".$GETbid."
ORDER BY gbb.rang, gbb.bildid";
//echo $Abfrage;
$erg=mysqli_query($conn, $Abfrage);

$arrBild=Array();
while($row=mysqli_fetch_row($erg)) {
	$arrBild[$row[0]]["bid"]=$row[0];
	$arrBild[$row[0]]["bildid"]=$row[1];
	$arrBild[$row[0]]["datei"]=$row[2];
	$arrBild[$row[0]]["breite"]=$row[3];
	$arrBild[$row[0]]["hoehe"]=$row[4];
	$arrBild[$row[0]]["text"]=$row[5];
}
mysqli_free_result($erg);
?>
