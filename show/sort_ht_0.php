<?php //SHOW
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: GET
FILENAME: order_ht_0.php
FILETYPE: INCLUDE
*/

if(!empty($arrThemaRang)) { 
?>
<table border="0">
<?php foreach($arrThemaRang as $TRKey => $TRVal) { ?>
<tr><td><?php echo $TRVal["thema"];?></td>
<?php $arrRepl=Array("sortdir" => "up", "sorthid" =>$TRVal["hid"], "sorttid" => $TRVal["tid"]);?>
<td><a href="admin.php<?php echo mkGETString($arrRepl);?>">UP</a></td>
<?php $arrRepl["sortdir"]="down";?>
<td><a href="admin.php<?php echo mkGETString($arrRepl);?>">DOWN</a></td>
</tr>
<?php } ?>
</table>
<?php } ?>
