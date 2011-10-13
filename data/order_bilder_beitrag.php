<?php //DATA 
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD:
FILENAME:
FILETYPE: INCLUDE
*/

$Abfrage="SELECT gb.bid, datei, gbb.rang FROM ged_bilder gb LEFT JOIN
ged_beitrag_bilder gbb ON gb.bid=gbb.bildid
WHERE gbb.beitrid=".$GETbid."
ORDER BY gbb.rang";
//echo $Abfrage;
$erg=mysqli_query($conn, $Abfrage);

$arrBildRang=Array();
while($row=mysqli_fetch_row($erg)) {
	$arrBildRang[$row[0]]["datei"]=$row[1];
	$arrBildRang[$row[0]]["rang"]=$row[2];
}

mysqli_free_result($erg);
?>