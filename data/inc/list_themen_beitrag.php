<?php //DATA/INC 
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD:
FILENAME:
FILETYPE: INCLUDE
*/

$arrThemenBeitrag=Array();

if($stmt=mysqli_prepare($conn, "SELECT gt.tid, gt.thema FROM ged_thema_beitraege gtb
		LEFT JOIN ged_themen gt ON gt.tid=gtb.tid WHERE gtb.bid=? ORDER BY gt.thema")) {
	mysqli_stmt_bind_param($stmt, "i", $BID);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_bind_result($stmt, $tmpTid, $tmpHead);
	while(mysqli_stmt_fetch($stmt)) {
		$arrThemenBeitrag[$tmpTid]=$tmpHead;
	}
	mysqli_stmt_close($stmt);
} else {
	echo mysqli_error($conn);
}
?>