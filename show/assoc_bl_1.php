<?php //SHOW
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: POST
FILENAME: assoc_bl_1.php
FILETYPE: INCLUDE
*/

if(!empty($arrLinkRang)) {
?>
<table border="0">
<?php foreach($arrLinkRang as $LRKey => $LRVal) { ?>
<tr>
<td><a href="<?php echo $LRVal["link"];?>" target="_blank" title="<?php echo $LRVal["text"];?>"><?php echo $LRVal["link"];?></td>
<?php $arrRepl=Array("sortdir" => "up", "sortlid" =>$LRVal["lid"], "sortbid" => $LRVal["bid"]);?>
<td><a href="admin.php<?php echo mkGETString($arrRepl);?>">UP</a></td>
<?php $arrRepl["sortdir"]="down";?>
<td><a href="admin.php<?php echo mkGETString($arrRepl);?>">DOWN</a></td>
</tr>
<?php } ?>
</table>
<?php } ?>