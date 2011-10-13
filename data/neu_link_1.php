<?php //DATA
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: POST
FILENAME: neu_link_1.php
FILETYPE: INCLUDE
*/

needPOSTvar("neulink");
needPOSTvar("title");

if($stmt=mysqli_prepare($conn, "INSERT INTO ged_links (link, text) VALUES(?, ?)")) {
	mysqli_stmt_bind_param($stmt, "ss", $POSTneulink, $POSTtitle);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	$BID=mysqli_insert_id($conn);
} else {
	echo mysqli_error($conn);
}
?>