<?php //DATA
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: POST
FILENAME: neu_host_1.php
FILETYPE: INCLUDE
*/	  

needPOSTvar("host");

if($stmt=mysqli_prepare($conn, "INSERT INTO ged_hosts (hostname) VALUES(?)")) {
	mysqli_stmt_bind_param($stmt, "s", $POSThost);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	$GEThid=mysqli_insert_id($conn);
} else {
	echo mysqli_error($conn);
}
?>