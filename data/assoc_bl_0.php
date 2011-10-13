<?php //DATA
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: GET
FILENAME: assoc_bl_0.php
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

if($stmt=mysqli_prepare($conn, "SELECT l.lid, bl.bid, l.link, l.text FROM ged_links l 
		LEFT JOIN ged_beitrag_links bl ON l.lid=bl.lid and bl.bid=? WHERE bl.bid is null")) {
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