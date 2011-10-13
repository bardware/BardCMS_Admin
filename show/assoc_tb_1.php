<?php //SHOW
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: POST
FILENAME: assoc_tb_1.php
FILETYPE: INCLUDE
*/
?>
<table border="0">
<tr>
<td>Themen:</td>
<td><?php foreach($arrThemenBeitrag as $aTB) echo $aTB."<br />";?></td>
</tr><tr>
<td>�berschrift:</td>
<td><?php echo $selBeitrag["head"];?></td>
</tr>
</table>
