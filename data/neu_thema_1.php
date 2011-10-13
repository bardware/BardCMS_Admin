<?php //DATA
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: POST
FILENAME: neu_thema_1.php
FILETYPE: INCLUDE
*/

needPOSTvar("hid");
needPOSTvar("neuthema");
needPOSTvar("beschr");

GetText($SESSIONlang, "neuthema");

if($stmt=mysqli_prepare($conn, "INSERT INTO ged_themen (thema, beschreibung) VALUES(?, ?)")) {
	mysqli_stmt_bind_param($stmt, "ss", $POSTneuthema, $POSTbeschr);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	$TID=mysqli_insert_id($conn);
} else {
	echo mysqli_error($conn);
}

if(!empty($POSThid)) {
	foreach($POSThid as $HID) {
		if($stmt=mysqli_prepare($conn, "INSERT INTO ged_host_themen (hid, tid) VALUES(?, ?)")) {
			mysqli_stmt_bind_param($stmt, "ii", $HID, $TID);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_close($stmt);
		} else {
			echo mysqli_error($conn);
		}
	}
}

require_once("inc/query_selThema.php");
require_once("inc/list_hosts_thema.php");

$GETtid=$TID;
?>