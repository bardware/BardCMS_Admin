<?php //DATA
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: POST
FILENAME: edit_thema_1.php
FILETYPE: INCLUDE
*/

needPOSTvar("hid");
needPOSTvar("thema");
needPOSTvar("beschr");

$TID=$GETtid;

GetText($SESSIONlang, "neuthema");

if($stmt=mysqli_prepare($conn, "UPDATE ged_themen SET thema=?, beschreibung=? WHERE tid=?")) {
	mysqli_stmt_bind_param($stmt, "ssi", $POSTthema, $POSTbeschr, $TID);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
} else {
	echo mysqli_error($conn);
}

if(!empty($POSThid)) {
	require_once("inc/update_hosts_thema.php");
}

require_once("inc/query_selThema.php");
require_once("inc/list_hosts_thema.php");
?>