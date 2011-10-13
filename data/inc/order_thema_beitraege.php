<?php //DATA/INC
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: GET
FILENAME: order_beitrag_links.php
FILETYPE: INCLUDE
*/

if($stmt=mysqli_prepare($conn, "SELECT tid, bid, rang FROM ged_thema_beitraege WHERE tid=? AND bid=?")) {
	mysqli_stmt_bind_param($stmt, "ii", $GETsorttid, $GETsortbid);
	mysqli_stmt_bind_result($stmt, $tmpTid, $tmpBid, $RANG);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_fetch($stmt);
	mysqli_stmt_close($stmt);
} else {
	echo mysqli_error($conn);
}


echo $RANG;

if($GETsortdir=="up") {
	$stmt=mysqli_prepare($conn, "SELECT tid, bid, rang FROM ged_thema_beitraege WHERE tid=? AND rang < ? ORDER BY RANG DESC limit 0,1");
} else if($GETsortdir=="down") {
	$stmt=mysqli_prepare($conn, "SELECT tid, bid, rang FROM ged_thema_beitraege WHERE tid=? AND rang > ? ORDER BY RANG ASC limit 0,1");
}

mysqli_stmt_bind_param($stmt, "ii", $GETsorttid, $RANG);
mysqli_stmt_bind_result($stmt, $tmpTid, $BID2, $RANG2);
mysqli_stmt_execute($stmt);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

if($stmt=mysqli_prepare($conn, "UPDATE ged_thema_beitraege SET rang=? WHERE tid=? AND bid=?")) {
	mysqli_stmt_bind_param($stmt, "iii", $RANG, $GETsorttid, $BID2);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
} else {
	echo mysqli_error($conn);
}

if($stmt=mysqli_prepare($conn, "UPDATE ged_thema_beitraege SET rang=? WHERE tid=? AND bid=?")) {
	mysqli_stmt_bind_param($stmt, "iii", $RANG2, $GETsorttid, $GETsortbid);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
} else {
	echo mysqli_error($conn);
}
?>