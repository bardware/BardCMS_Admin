<?php //DATA/INC
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD:
FILENAME:
FILETYPE: INCLUDE
*/

$arrHostsThema=Array();

if($stmt=mysqli_prepare($conn, "SELECT gh.hid, gh.hostname FROM ged_host_themen ght
		LEFT JOIN ged_hosts gh ON gh.hid=ght.hid WHERE ght.tid=? ORDER BY gh.hostname")) {
	mysqli_stmt_bind_param($stmt, "i", $TID);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_bind_result($stmt, $tmpHid, $Hostname);
	while(mysqli_stmt_fetch($stmt)) {
		$arrHostsThema[$tmpHid]=$Hostname;
	}
	mysqli_stmt_close($stmt);
} else {
	echo mysqli_error($conn);
}
?>