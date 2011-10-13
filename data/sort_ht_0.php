<?php //DATA
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: GET
FILENAME: order_ht_0.php
FILETYPE: INCLUDE
*/

needGETvar("sortdir");
needGETvar("sorthid");
needGETvar("sorttid");

$arrThemaRang=Array();

if(!empty($GETsortdir) and !empty($GETsorthid) and !empty($GETsorttid)) {
	require($DATAdir."inc/order_host_themen.php");
}

if($stmt=mysqli_prepare($conn, "SELECT gt.tid, thema, gth.rang, gth.hid FROM ged_themen gt LEFT JOIN
		ged_host_themen gth ON gt.tid=gth.tid WHERE gth.hid=? ORDER BY gth.rang")) {
	mysqli_stmt_bind_param($stmt, "i", $GEThid);
	mysqli_stmt_bind_result($stmt, $tmpTid, $tmpThema, $tmpRang, $tmpHid);
	mysqli_stmt_execute($stmt);
	while(mysqli_stmt_fetch($stmt)) {
	$arrThemaRang[$tmpTid]["tid"]=$tmpTid;
	$arrThemaRang[$tmpTid]["thema"]=$tmpThema;
	$arrThemaRang[$tmpTid]["rang"]=$tmpRang;
	$arrThemaRang[$tmpTid]["hid"]=$tmpHid;
	}
	mysqli_stmt_close($stmt);
} else {
	echo mysqli_error($conn);
}
?>