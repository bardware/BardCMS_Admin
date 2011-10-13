<?php //DATA/INC
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD:
FILENAME:
FILETYPE: INCLUDE
*/

if($stmt=mysqli_prepare($conn, "DELETE FROM ged_thema_beitraege WHERE bid=?")) {
	mysqli_stmt_bind_param($stmt, "i", $BID);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
} else {
	echo mysqli_error($conn);
}

if(!empty($POSTtid)) {

	if($stmt=mysqli_prepare($conn, "SELECT IFNULL(MAX(rang),0)+1 FROM ged_thema_beitraege WHERE tid=?")) {
		mysqli_stmt_bind_param($stmt, "i", $GETtid);
		mysqli_stmt_bind_result($stmt, $Zahl);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_fetch($stmt);
		mysqli_stmt_close($stmt);
	} else {
		echo mysqli_error($conn);
	}
	
	if($stmt=mysqli_prepare($conn, "INSERT INTO ged_thema_beitraege (bid, tid, rang) VALUES(?, ?, ?)")) {
		mysqli_stmt_bind_param($stmt, "iii", $BID, $TID, $Zahl);
		foreach($POSTtid as $TID) {
			mysqli_stmt_execute($stmt);
			$Zahl++;
		}
		mysqli_stmt_close($stmt);
	} else {
		echo mysqli_error($conn);
	}
	
}
?>