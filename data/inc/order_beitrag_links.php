<?php //DATA/INC
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: GET
FILENAME: order_beitrag_links.php
FILETYPE: INCLUDE
*/

if($stmt=mysqli_prepare($conn, "SELECT bid, lid, rang FROM ged_beitrag_links WHERE bid=? AND lid=?")) {
	mysqli_stmt_bind_param($stmt, "ii", $GETsortbid, $GETsortlid);
	mysqli_stmt_bind_result($stmt, $tmpBid, $tmpLid, $RANG);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_fetch($stmt);
	mysqli_stmt_close($stmt);
} else {
	echo mysqli_error($conn);
}

if($GETsortdir=="up") {
	$stmt=mysqli_prepare($conn, "SELECT bid, lid, rang FROM ged_beitrag_links WHERE bid=? AND rang < ? ORDER BY RANG DESC limit 0,1");
} else if($GETsortdir=="down") {
	$stmt=mysqli_prepare($conn, "SELECT bid, lid, rang FROM ged_beitrag_links WHERE bid=? AND rang > ? ORDER BY RANG ASC limit 0,1");
}

mysqli_stmt_bind_param($stmt, "ii", $GETsortbid, $RANG);
mysqli_stmt_bind_result($stmt, $tmpBid, $LID2, $RANG2);
mysqli_stmt_execute($stmt);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

if($stmt=mysqli_prepare($conn, "UPDATE ged_beitrag_links SET rang=? WHERE bid=? AND lid=?")) {
	mysqli_stmt_bind_param($stmt, "iii", $RANG, $GETsortbid, $LID2);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
} else {
	echo mysqli_error($conn);
}
	
if($stmt=mysqli_prepare($conn, "UPDATE ged_beitrag_links SET rang=? WHERE bid=? AND lid=?")) {
	mysqli_stmt_bind_param($stmt, "iii", $RANG2, $GETsortbid, $GETsortlid);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
} else {
	echo mysqli_error($conn);
}
?>