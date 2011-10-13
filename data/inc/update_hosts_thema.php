<?php //DATA/INC
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD:
FILENAME:
FILETYPE: INCLUDE
*/



if($stmt=mysqli_prepare($conn, "DELETE FROM ged_host_themen WHERE tid=?")) {
	mysqli_stmt_bind_param($stmt, "i", $TID);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
} else {
	echo mysqli_error($conn);
}

if(!empty($POSThid)) {

	if($stmt=mysqli_prepare($conn, "SELECT IFNULL(MAX(rang),0)+1 FROM ged_host_themen WHERE tid=?")) {
		mysqli_stmt_bind_param($stmt, "i", $GEThid);
		mysqli_stmt_bind_result($stmt, $Zahl);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_fetch($stmt);
		mysqli_stmt_close($stmt);
	} else {
		echo mysqli_error($conn);
	}
	
	if($stmt=mysqli_prepare($conn, "INSERT INTO ged_host_themen (tid, hid, rang) VALUES(?, ?, ?)")) {
		mysqli_stmt_bind_param($stmt, "iii", $TID, $HID, $Zahl);
		foreach($POSThid as $HID) {
			mysqli_stmt_execute($stmt);
			$Zahl++;
		}
		mysqli_stmt_close($stmt);
	} else {
		echo mysqli_error($conn);
	}
	
}
?>