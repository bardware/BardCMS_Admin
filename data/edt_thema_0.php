<?php //DATA
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: GET
FILENAME: edit_thema_0.php
FILETYPE: INCLUDE
*/

$TID=$GETtid;

GetText($SESSIONlang, "neuthema");

require_once("inc/query_selThema.php");
require_once("inc/list_hosts_thema.php");
?>