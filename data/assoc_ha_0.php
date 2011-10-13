<?php //DATA
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: GET
FILENAME: assoc_ha_0.php
FILETYPE: INCLUDE
*/

GetText($SESSIONlang, "neuhost");

$arrHostAliases=Array();
if($stmt=mysqli_prepare($conn, "SELECT haid, hostalias from ged_host_aliases where hid=?")) {
	mysqli_stmt_bind_param($stmt, "i", $GEThid);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_bind_result($stmt, $tmpHid, $tmpAlias);
	while(mysqli_stmt_fetch($stmt)) {
		$arrHostAliases[$tmpHid]=$tmpAlias;
	}
	mysqli_stmt_close($stmt);
} else {
	echo mysqli_error($conn);
}
?>