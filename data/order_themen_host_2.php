<?php //DATA
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD:
FILENAME:
FILETYPE: INCLUDE
*/

needPOSTvar("rang");

foreach($POSTrang as $POSTRangKey => $POSTRangVal) {
$Abfrage="UPDATE ged_host_themen set rang=".$POSTRangVal." where tid=".$POSTRangKey." and hid=".$GEThid;
mysqli_query($conn, $Abfrage);
} ?>
