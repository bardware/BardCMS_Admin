<?php //DATA
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD:
FILENAME:
FILETYPE: INCLUDE
*/

needPOSTvar("aname");

$Abfrage="INSERT INTO ged_alben (album) values('".$POSTaname."')";
//echo $Abfrage;
mysqli_query($conn, $Abfrage);
?>