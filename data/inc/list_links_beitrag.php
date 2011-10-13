<?php //DATA/INC
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD:
FILENAME:
FILETYPE: INCLUDE
*/

if($stmt=mysqli_prepare($conn, "SELECT gl.lid, link, gbl.rang, gbl.bid, gl.text FROM ged_links gl LEFT JOIN
		ged_beitrag_links gbl ON gl.lid=gbl.lid WHERE gbl.bid=? ORDER BY gbl.rang")) {
	mysqli_stmt_bind_param($stmt, "i", $GETbid);
	mysqli_stmt_bind_result($stmt, $tmpLid, $tmpLink, $tmpRang, $tmpBid, $tmpText);
	mysqli_stmt_execute($stmt);
	while(mysqli_stmt_fetch($stmt)) {
		$arrLinkRang[$tmpLid]["lid"]=$tmpLid;
		$arrLinkRang[$tmpLid]["link"]=$tmpLink;
		$arrLinkRang[$tmpLid]["rang"]=$tmpRang;
		$arrLinkRang[$tmpLid]["bid"]=$tmpBid;
		$arrLinkRang[$tmpLid]["text"]=htmlspecialchars($tmpText);
	}
	mysqli_stmt_close($stmt);
} else {
	echo mysqli_error($conn);
}
?>