<?php //DATA/INC
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: GET
FILENAME: order_beitrag_links.php
FILETYPE: INCLUDE
*/

if($stmt=mysqli_prepare($conn, "SELECT hid, tid, rang FROM ged_host_themen WHERE hid=? AND tid=?")) {
	mysqli_stmt_bind_param($stmt, "ii", $GETsorthid, $GETsorttid);
	mysqli_stmt_bind_result($stmt, $tmpHid, $tmpTid, $RANG);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_fetch($stmt);
	mysqli_stmt_close($stmt);
} else {
	echo mysqli_error($conn);
}

if($GETsortdir=="up") {
	$stmt=mysqli_prepare($conn, "SELECT hid, tid, rang FROM ged_host_themen WHERE hid=? AND rang < ? ORDER BY RANG DESC limit 0,1");
} else if($GETsortdir=="down") {
	$stmt=mysqli_prepare($conn, "SELECT hid, tid, rang FROM ged_host_themen WHERE hid=? AND rang > ? ORDER BY RANG ASC limit 0,1");
}

mysqli_stmt_bind_param($stmt, "ii", $GETsorthid, $RANG);
mysqli_stmt_bind_result($stmt, $tmpHid, $TID2, $RANG2);
mysqli_stmt_execute($stmt);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

if($stmt=mysqli_prepare($conn, "UPDATE ged_host_themen SET rang=? WHERE hid=? AND tid=?")) {
	mysqli_stmt_bind_param($stmt, "iii", $RANG, $GETsorthid, $TID2);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
} else {
	echo mysqli_error($conn);
}

if($stmt=mysqli_prepare($conn, "UPDATE ged_host_themen SET rang=? WHERE hid=? AND tid=?")) {
	mysqli_stmt_bind_param($stmt, "iii", $RANG2, $GETsorthid, $GETsorttid);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
} else {
	echo mysqli_error($conn);
}
?>