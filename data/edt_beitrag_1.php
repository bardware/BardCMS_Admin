<?php //DATA
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: POST
FILENAME: edit_beitrag_1.php
FILETYPE: INCLUDE
*/

needPOSTvar("tid");
needPOSTvar("head");
needPOSTvar("beitrag");

$BID=$GETbid;

GetText($SESSIONlang, "neubeitrag");

if($stmt=mysqli_prepare($conn, "UPDATE ged_beitraege SET head=?, beitrag=? WHERE bid=?")) {
	mysqli_stmt_bind_param($stmt, "ssi", $POSThead, $POSTbeitrag, $BID);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
} else {
	echo mysqli_error($conn);
}

if(!empty($POSTtid)) {
	require_once("inc/update_themen_beitrag.php");
}

require_once("inc/query_selBeitrag.php");
require_once("inc/list_themen_beitrag.php");
?>