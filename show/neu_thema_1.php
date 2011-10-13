<?php //SHOW
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: POST
FILENAME: neu_thema_1.php
FILETYPE: INCLUDE
*/
?>
<table border="0">
<tr>
<td><?php echo $txtneuthema["host"];?>:</td>
<td><?php foreach($arrHostsThema as $arrHT) {
echo $arrHT."<br />\n";
 } ?></td>
<tr></tr>
<td><?php echo $txtneuthema["thematitel"];?>:</td>
<td><?php echo $selThema["thema"];?></td>
</tr><tr>
<td><?php echo $txtneuthema["beschr"];?>:</td>
<td><?php echo $selThema["beschr"];?></td>
</tr>
</table>