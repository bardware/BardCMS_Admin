<?php //SHOW
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: GET
FILENAME: disassoc_bl_0.php
FILETYPE: INCLUDE
*/

if(!empty($arrLink)) {
$arrRepl=Array("action" => $arrGETaction[0].",".($arrGETaction[1]+1));?>
<form action="admin.php<?php echo mkGETString($arrRepl);?>" method="post">
<div class="formblock">
<?php printf($txtassocbl["linksassoc"], $Head);?>:<br />
<?php foreach($arrLink as $Link) { ?>
<input type="checkbox" name="lid[]" value="<?php echo $Link["lid"];?>" title="<?php echo $Link["text"];?>" /><a href="<?php echo $Link["link"];?>" target="_blank"><?php echo $Link["text"];?></a><br />
<?php } ?>
<input type="submit" class="enterbutton" value="Eintragen" />
</div>
</form>
<?php } else {
	printf($txtassocbl["nolinksassoc"], $Head);?><br />
<?php } ?>