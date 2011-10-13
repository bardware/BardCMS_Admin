<?php //DATA
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD:
FILENAME:
FILETYPE: INCLUDE
*/

$BID=$GETbid;

$Abfrage="SELECT head from ged_beitraege where bid=".$BID;
//echo $Abfrage;
$erg=mysqli_query($conn, $Abfrage);

$row=mysqli_fetch_row($erg);

$Head=$row[0];

mysqli_free_result($erg);

require_once("inc/list_themen_beitrag.php");
?>