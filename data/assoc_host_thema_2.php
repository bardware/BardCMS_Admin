<?php //DATA
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD:
FILENAME:
FILETYPE: INCLUDE
*/

needPOSTvar("hid");

if(!empty($POSThid)) {

	$TID=$GETtid;

	require_once("inc/update_hosts_thema.php");

	require_once("inc/query_selThema.php");
	require_once("inc/list_hosts_thema.php");
}
?>