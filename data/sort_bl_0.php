<?php //DATA
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD:
FILENAME:
FILETYPE: INCLUDE
*/

needGETvar("sortdir");
needGETvar("sortbid");
needGETvar("sortlid");

if(!empty($GETsortdir) and !empty($GETsortbid) and !empty($GETsortlid)) {
	require($DATAdir."inc/order_beitrag_links.php");
}

require($DATAdir."inc/list_links_beitrag.php");
?>
