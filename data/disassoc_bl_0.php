<?php //DATA
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: GET
FILENAME: disassoc_bl_0.php
FILETYPE: INCLUDE
*/

$Head="";
$arrLink=Array();

GetText($SESSIONlang, "assocbl");

if($stmt=mysqli_prepare($conn, "SELECT head FROM ged_beitraege WHERE bid=?")) {
	mysqli_stmt_bind_param($stmt, "i", $GETbid);
	mysqli_stmt_bind_result($stmt, $Head);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_fetch($stmt);
	mysqli_stmt_close($stmt);
} else {
	echo mysqli_error($conn);
}

if($stmt=mysqli_prepare($conn, "SELECT gl.lid, gbl.bid, gl.link, gl.text FROM ged_links gl LEFT JOIN
		ged_beitrag_links gbl ON gl.lid=gbl.lid WHERE gbl.bid=? ORDER BY gbl.rang, gbl.lid")) {
	mysqli_stmt_bind_param($stmt, "i", $GETbid);
	mysqli_stmt_bind_result($stmt, $tmpLid, $tmpBid, $tmpLink, $tmpText);
	mysqli_stmt_execute($stmt);
	while(mysqli_stmt_fetch($stmt)) {
		$arrLink[$tmpLid]["lid"]=$tmpLid;
		$arrLink[$tmpLid]["bid"]=$tmpBid;
		$arrLink[$tmpLid]["link"]=$tmpLink;
		$arrLink[$tmpLid]["text"]=htmlspecialchars($tmpText);		
	}
	mysqli_stmt_close($stmt);
} else {
	echo mysqli_error($conn);
}
?>