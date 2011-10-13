<?php //SHOW
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: POST
FILENAME: neu_beitrag_2.php
FILETYPE: INCLUDE
*/
?>
<table border="0">
<tr>
<td><?php echo $txtneubeitrag["themen"];?>:</td>
<td><?php foreach($arrThemenBeitrag as $aTB) echo $aTB."<br />";?></td>
</tr><tr>
<td><?php echo $txtneubeitrag["ueberschr"];?>:</td>
<td><?php echo $selBeitrag["head"];?></td>
</tr><tr>
<td><?php echo $txtneubeitrag["beitrag"];?>:</td>
<td><?php echo $selBeitrag["beitrag"];?></td>
</tr>
</table>