<?php //DATA
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: GET
FILENAME: sort_tb_0.php
FILETYPE: INCLUDE
*/

needGETvar("sortdir");
needGETvar("sorttid");
needGETvar("sortbid");

if(!empty($GETsortdir) and !empty($GETsorttid) and !empty($GETsortbid)) {
	require($DATAdir."inc/order_thema_beitraege.php");
}

$Abfrage="SELECT gb.bid, head, gtb.rang, gtb.tid FROM ged_beitraege gb LEFT JOIN
ged_thema_beitraege gtb ON gb.bid=gtb.bid
WHERE gtb.tid=".$GETtid."
ORDER BY gtb.rang";
//echo $Abfrage;
$erg=mysqli_query($conn, $Abfrage);

$arrBeitragRang=Array();
while($row=mysqli_fetch_row($erg)) {
	$arrBeitragRang[$row[0]]["bid"]=$row[0];
	$arrBeitragRang[$row[0]]["head"]=$row[1];
	$arrBeitragRang[$row[0]]["rang"]=$row[2];
	$arrBeitragRang[$row[0]]["tid"]=$row[3];
}

mysqli_free_result($erg);
?>
