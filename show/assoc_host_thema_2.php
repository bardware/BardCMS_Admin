<?php //SHOW 
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD:
FILENAME:
FILETYPE: INCLUDE
*/
?>
<table border="0">
<tr>
<td>Hosts:</td>
<td><?php foreach($arrHostsThema as $arrHT) {
echo $arrHT."<br />\n";
 } ?></td>
<tr></tr>
<td>�berschrift:</td>
<td><?php echo $selThema["thema"];?></td>
</tr>
</table>
