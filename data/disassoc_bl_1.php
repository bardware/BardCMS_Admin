<?php //DATA
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: POST
FILENAME: disassoc_bl_1.php
FILETYPE: INCLUDE
*/

needPOSTvar("lid");

needGETvar("sortdir");
needGETvar("sortbid");
needGETvar("sortlid");

GetText($SESSIONlang, "assocbl");

if(!empty($POSTlid)) {
	
	if($stmt=mysqli_prepare($conn, "DELETE FROM ged_beitrag_links WHERE bid=? AND lid=?")) {
		mysqli_stmt_bind_param($stmt, "ii", $GETbid, $linkID);
		foreach($POSTlid as $linkID) {
			mysqli_stmt_execute($stmt);
		}
		mysqli_stmt_close($stmt);
	} else {
		echo mysqli_error($conn);
	}
	
	if($stmt=mysqli_prepare($conn, "UPDATE ged_beitraege SET updatedate=now() WHERE bid=?")) {
		mysqli_stmt_bind_param($stmt, "i", $GETbid);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	} else {
		echo mysqli_error($conn);
	}

}

if(!empty($GETsortdir) and !empty($GETsortbid) and !empty($GETsortlid)) {
	require($DATAdir."inc/order_beitrag_links.php");
}

require($DATAdir."inc/list_links_beitrag.php");
?>