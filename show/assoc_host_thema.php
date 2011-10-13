<?php //SHOW 
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD:
FILENAME:
FILETYPE: INCLUDE
*/

$arrRepl=Array("action" => $arrGETaction[0].",".($arrGETaction[1]+1));?>
<form action="admin.php<?php echo mkGETString($arrRepl);?>" method="post">
<table border="0">
<tr>
<td>Hosts:</td>
<td><?php require_once("inc/list_hosts_thema.php");?></td>
<tr></tr>
<td>�berschrift:</td>
<td><?php echo $selThema["thema"];?></td>
</tr>
</table>
<input type="submit" />
</form>