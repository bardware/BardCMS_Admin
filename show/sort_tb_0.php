<?php //SHOW
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: GET
FILENAME: sort_tb_0.php
FILETYPE: INCLUDE
*/

if(!empty($arrBeitragRang)) { 
?>
<table border="0">
<?php foreach($arrBeitragRang as $BRKey => $BRVal) { ?>
<tr><td><?php echo $BRVal["head"];?></td>
<?php $arrRepl=Array("sortdir" => "up", "sorttid" =>$BRVal["tid"], "sortbid" => $BRVal["bid"]);?>
<td><a href="admin.php<?php echo mkGETString($arrRepl);?>">UP</a></td>
<?php $arrRepl["sortdir"]="down";?>
<td><a href="admin.php<?php echo mkGETString($arrRepl);?>">DOWN</a></td>
</tr>
<?php } ?>
</table>
<?php } ?>