<?php //DATA
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD:
FILENAME:
FILETYPE: INCLUDE
*/

needPOSTvar("rang");

foreach($POSTrang as $POSTRangKey => $POSTRangVal) {
$Abfrage="UPDATE ged_thema_beitraege set rang=".$POSTRangVal." where bid=".$POSTRangKey." and tid=".$GETtid;
mysqli_query($conn, $Abfrage);
} ?>