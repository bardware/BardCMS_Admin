<?php //DATA
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: GET
FILENAME: assoc_bb_0.php
FILETYPE: INCLUDE
*/

needGETvar("seite");

if(!empty($GETseite)) {
	if($GETseite=="last") {
		$Abfrage="SELECT count(gb.bid)
		FROM ged_bilder gb
		LEFT JOIN ged_alben_bilder gab ON gab.bid = gb.bid AND gab.aid = ".$GETaid."
		LEFT JOIN ged_beitrag_bilder gbb ON gb.bid = gbb.bildid AND gbb.beitrid = ".$GETbid."
		WHERE gbb.bildid IS NULL and gab.aid=".$GETaid." and gb.datei like '".$imgBildURL.$GETdir."%'";
		//echo $Abfrage;
		$erg=mysqli_query($conn, $Abfrage);
		$row=mysqli_fetch_row($erg);
		$GETseite=ceil($row[0]/$PictPerPage);
		mysqli_free_result($erg);
	} else {
		$GETseite=abs(intval($GETseite));
		if($GETseite==0) $GETseite=1;
	}
} else {
	$GETseite=1;
}

$Abfrage="select head from ged_beitraege where bid=".$GETbid;
//echo $Abfrage;
$erg=mysqli_query($conn, $Abfrage);
$row=mysqli_fetch_row($erg);
$Head=$row[0];
mysqli_free_result($erg);

$Abfrage="SELECT gb.bid, gb.text, gb.datei, gb.breite, gb.hoehe
FROM ged_bilder gb
LEFT JOIN ged_alben_bilder gab ON gab.bid = gb.bid AND gab.aid = ".$GETaid."
LEFT JOIN ged_beitrag_bilder gbb ON gb.bid = gbb.bildid AND gbb.beitrid = ".$GETbid."
WHERE gbb.bildid IS NULL and gab.aid=".$GETaid." and gb.datei like '".$imgBildURL.$GETdir."%'
ORDER BY gb.bid
LIMIT ".(($GETseite-1)*$PictPerPage).", ".($PictPerPage+1);

$Abfrager=$Abfrage;

//echo $Abfrage;
$erg=mysqli_query($conn, $Abfrage);

$MorePicturesAvailable=false;
$MorePicturesAvailable=mysqli_num_rows($erg)>$PictPerPage;

$arrBild=Array();
$Zaehl=0;
if(false!==($erg=mysqli_query($conn, $Abfrage))) {
	do {
		$arrBild[$row[0]]["bid"]=$row[0];
		$arrBild[$row[0]]["text"]=$row[1];
		$arrBild[$row[0]]["datei"]=$row[2];
		$arrBild[$row[0]]["breite"]=$row[3];
		$arrBild[$row[0]]["hoehe"]=$row[4];
		++$Zaehl;
	} while($Zaehl<$PictPerPage and $row=mysqli_fetch_row($erg));
	mysqli_free_result($erg);
}
?>
