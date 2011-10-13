<?php //DATA
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD:
FILENAME:
FILETYPE: INCLUDE
*/

needPOSTvar("tid");
needPOSTvar("head");
needPOSTvar("beitrag");

GetText($SESSIONlang, "neubeitrag");

$datum=date("Y-m-d H:i:s");

if($stmt=mysqli_prepare($conn, "INSERT INTO ged_beitraege (eintragdatum, head, beitrag) VALUES (?, ?, ?)")) {
	mysqli_stmt_bind_param($stmt, "sss", $datum, $POSThead, $POSTbeitrag);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	$BID=mysqli_insert_id($conn);
} else {
	echo mysqli_error($conn);
}
	
require_once("inc/update_themen_beitrag.php");

require_once("inc/query_selBeitrag.php");
require_once("inc/list_themen_beitrag.php");

$GETbid=$BID;
?>