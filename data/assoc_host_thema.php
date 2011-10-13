<?php //DATA
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD:
FILENAME:
FILETYPE: INCLUDE
*/

$TID=$GETtid;

$Abfrage="SELECT tid, thema from ged_themen where tid=".$TID;
$erg=mysqli_query($conn, $Abfrage);
$row=mysqli_fetch_row($erg);

$selThema["tid"]=$row[0];
$selThema["thema"]=$row[1];

mysqli_free_result($erg);

require_once("inc/list_hosts_thema.php");
?>