<?php //DATA
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: POST
FILENAME: assoc_tb_1.php
FILETYPE: INCLUDE
*/

needPOSTvar("tid");

if(!empty($POSTtid)) {

	$BID=$GETbid;

	require_once("inc/update_themen_beitrag.php");

	require_once("inc/query_selBeitrag.php");
	require_once("inc/list_themen_beitrag.php");
}
?>
