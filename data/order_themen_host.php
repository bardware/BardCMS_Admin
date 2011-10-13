<?php //DATA
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD:
FILENAME:
FILETYPE: INCLUDE
*/

needGETvar("sortdir");
needGETvar("sorthid");
needGETvar("sorttid");

if(!empty($GETsortdir) and !empty($GETsorthid) and !empty($GETsorttid)) {
	require($DATAdir."inc/order_host_themen.php");
}

$Abfrage="SELECT gt.tid, thema, gth.rang, gth.hid FROM ged_themen gt LEFT JOIN
ged_host_themen gth ON gt.tid=gth.tid
WHERE gth.hid=".$GEThid."
ORDER BY gth.rang";
//echo $Abfrage;
$erg=mysqli_query($conn, $Abfrage);

$arrThemaRang=Array();
while($row=mysqli_fetch_row($erg)) {
	$arrThemaRang[$row[0]]["tid"]=$row[0];
	$arrThemaRang[$row[0]]["thema"]=$row[1];
	$arrThemaRang[$row[0]]["rang"]=$row[2];
	$arrThemaRang[$row[0]]["hid"]=$row[3];
}

mysqli_free_result($erg);
?>
