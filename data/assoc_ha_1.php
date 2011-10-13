<?php //DATA
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: POST
FILENAME: assoc_ha_1.php
FILETYPE: INCLUDE
*/

needPOSTvar("neualias");

GetText($SESSIONlang, "neuhost");

if($stmt=mysqli_prepare($conn, "INSERT INTO ged_host_aliases (hostalias, hid) VALUES (?, ?)")) {
	mysqli_stmt_bind_param($stmt, "si", $POSTneualias, $GEThid);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	$BID=mysqli_insert_id($conn);
} else {
	echo mysqli_error($conn);
}
?>