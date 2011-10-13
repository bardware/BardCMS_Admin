<?php //DATA
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: POST
FILENAME: assoc_bb_2.php
FILETYPE: INCLUDE
*/

needGETvar("seite");

needPOSTvar("rang");

if(isset($GETseite))
	$Seite=$GETseite;
else
	$Seite=1;

if(!empty($POSTrang)) {
	foreach($POSTrang as $POSTRangKey => $POSTRangVal) {
		$Abfrage="UPDATE ged_beitrag_bilder set rang=".$POSTRangVal." where bildid=".$POSTRangKey." and beitrid=".$GETbid;
		mysqli_query($conn, $Abfrage);
	}
}

$Abfrage="select gb.bid, gbb.bildid, gb.datei, gb.breite, gb.hoehe, gbb.rang from ged_bilder gb left join
ged_beitrag_bilder gbb on gb.bid=gbb.bildid
where gbb.beitrid=".$GETbid."
ORDER BY gbb.rang, gbb.bildid";
//echo $Abfrage";
$erg=mysqli_query($conn, $Abfrage);

$arrBild=Array();
while($row=mysqli_fetch_array($erg)) {
	$arrBild[$row[0]]["bid"]=$row[0];
	$arrBild[$row[0]]["beitrid"]=$row[1];
	$arrBild[$row[0]]["datei"]=$row[2];
	$arrBild[$row[0]]["breite"]=$row[3];
	$arrBild[$row[0]]["hoehe"]=$row[4];
	$arrBild[$row[0]]["rang"]=$row[5];
}
mysqli_free_result($erg);

$allowedGETVars["seite"]=true;
addGET("seite", ($Seite+1));
?>
