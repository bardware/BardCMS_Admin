<?php //DATA
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: GET
FILENAME: edit_beitrag_0
FILETYPE: INCLUDE
*/

GetText($SESSIONlang, "neubeitrag");

$BID=$GETbid;

$selBeitrag["bid"]="";
$selBeitrag["head"]="";
$selBeitrag["beitrag"]="";

if($stmt=mysqli_prepare($conn, "SELECT bid, head, beitrag FROM ged_beitraege WHERE bid=?")) {
	mysqli_stmt_bind_param($stmt, "i", $BID);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_bind_result($stmt, $selBeitrag["bid"], $selBeitrag["head"], $selBeitrag["beitrag"]);
	mysqli_stmt_fetch($stmt);
	mysqli_stmt_close($stmt);
} else {
	echo mysqli_error($conn);
}

require_once("inc/list_themen_beitrag.php");
?>