<?php //DATA
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: POST
FILENAME: assoc_bb_1.php
FILETYPE: INCLUDE
*/

needGETvar("seite");
needGETvar("MorePicturesAvailable");

needPOSTvar("bid");

if(!empty($GETseite))
	$GETseite=abs(intval($GETseite));
	if($GETseite==0) $GETseite=1;
else
	$GETseite=1;

if(!empty($POSTbid)) {
	foreach($POSTbid as $bildID) {
		$Abfrage="insert into ged_beitrag_bilder (beitrid, bildid) values(".$GETbid.", $bildID)";
		// echo $Abfrage;
		mysqli_query($conn, $Abfrage);
	}
}

$Abfrage="update ged_beitraege set eintragdatum=now() where bid=".$GETbid;
// echo $Abfrage;
$erg=mysqli_query($conn, $Abfrage);

if($GETMorePicturesAvailable) {
	$arrGETaction[1]=($arrGETaction[1]-1);
	require($DATAdir.$arrActShort[$arrGETaction[0]].IIF(abs(intval($arrGETaction[1]))<=$arrActMax[$arrGETaction[0]], '_'.abs(intval($arrGETaction[1])), '').'.php');
} else {

$Abfrage="select gb.bid, gbb.bildid, gb.datei, gb.breite, gb.hoehe, gbb.rang from ged_bilder gb left join
ged_beitrag_bilder gbb on gb.bid=gbb.bildid
where gbb.beitrid=".$GETbid."
ORDER BY gbb.rang, gbb.bildid";
//echo $Abfrage";
$erg=mysqli_query($conn, $Abfrage);

$arrBild=Array();
while($row=mysqli_fetch_row($erg)) {
	$arrBild[$row[0]]["bid"]=$row[0];
	$arrBild[$row[0]]["beitrid"]=$row[1];
	$arrBild[$row[0]]["datei"]=$row[2];
	$arrBild[$row[0]]["breite"]=$row[3];
	$arrBild[$row[0]]["hoehe"]=$row[4];
	$arrBild[$row[0]]["rang"]=$row[5];
}
mysqli_free_result($erg);

}
?>
