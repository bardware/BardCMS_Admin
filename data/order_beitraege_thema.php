<?php //DATA 
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD:
FILENAME:
FILETYPE: INCLUDE
*/

$Abfrage="SELECT gb.bid, head, gtb.rang FROM ged_beitraege gb LEFT JOIN
ged_thema_beitraege gtb ON gb.bid=gtb.bid
WHERE gtb.tid=".$_GETtid."
ORDER BY gtb.rang";
//echo $Abfrage;
$erg=mysqli_query($conn, $Abfrage);

$arrBeitragRang=Array();
while($row=mysqli_fetch_row($erg)) {
	$arrBeitragRang[$row[0]]["head"]=$row[1];
	$arrBeitragRang[$row[0]]["rang"]=$row[2];
}

mysqli_free_result($erg);
?>