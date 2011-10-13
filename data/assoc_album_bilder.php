<?php //DATA
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD:
FILENAME:
FILETYPE: INCLUDE
*/

needGETvar("seite")

if(!empty($GETseite)) {
	$Seite=abs)intval($GETseite));
} else {
	$Seite=1;
}

$Abfrage="SELECT gb.bid, gb.text, gb.datei, gb.breite, gb.hoehe from ged_bilder gb
LEFT JOIN ged_alben_bilder gab on gab.bid=gb.bid
WHERE (gab.aid IS NULL or gab.aid!=".$GETaid.") and gb.datei like '".$imgBildURL.$GETdir."%'
ORDER BY gb.bid
LIMIT ".(($Seite-1)*$PictPerPage).", ".$PictPerPage;

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

$allowedGETVars["seite"]=true;
addGET("seite", $Seite);
?>
