<?php //DATA/INC
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD:
FILENAME:
FILETYPE: INCLUDE
*/

$selThema["tid"]="";
$selThema["thema"]="";
$selThema["beschr"]="";

if($stmt=mysqli_prepare($conn, "SELECT tid, thema, beschreibung FROM ged_themen WHERE tid=?")) {
	mysqli_stmt_bind_param($stmt, "i", $TID);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_bind_result($stmt, $selThema["tid"], $selThema["thema"], $selThema["beschr"]);
	mysqli_stmt_fetch($stmt);
	mysqli_stmt_close($stmt);
} else {
	echo mysqli_error($conn);
}
?>