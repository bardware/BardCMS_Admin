<?php //DATA
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: GET
FILENAME: assoc_tb_0.php
FILETYPE: INCLUDE
*/

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


$BID=$GETbid;

require_once("inc/list_themen_beitrag.php");
?>