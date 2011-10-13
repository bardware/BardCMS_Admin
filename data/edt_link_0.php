<?php //DATA
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: GET
FILENAME: edit_link_0.php
FILETYPE: INCLUDE
*/

$arrLink=Array();
if($stmt=mysqli_prepare($conn, "SELECT l.lid, l.link, l.text FROM ged_links l")) {
	mysqli_stmt_execute($stmt);
	mysqli_stmt_bind_result($stmt, $tmpLid, $tmpLink, $tmpText);
	while(mysqli_stmt_fetch($stmt)) {
		$arrLink[$tmpLid]["lid"]=$tmpLid;
		$arrLink[$tmpLid]["link"]=$tmpLink;
		$arrLink[$tmpLid]["text"]=htmlspecialchars($tmpText);
	}
	mysqli_stmt_close($stmt);
} else {
	echo mysqli_error($conn);
}
?>