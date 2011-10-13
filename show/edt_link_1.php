<?php //SHOW
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: POST
FILENAME: edit_link_1.php
FILETYPE: INCLUDE
*/

if(!empty($arrLink)) {
$arrRepl=Array("action" => $arrGETaction[0].",".($arrGETaction[1]+1));?>
<form action="admin.php<?php echo mkGETString($arrRepl);?>" method="post">
<div class="formblock">
<?php foreach($arrLink as $arrLinkKey => $arrLinkVal) { ?>
	<input type="checkbox" name="lid[]" value="<?php echo $arrLinkKey;?>" style="display: block;float: left;" checked="checked" />
	<input type="text" name="lnk[<?php echo $arrLinkKey;?>]" value="<?php echo $arrLinkVal["link"];?>" class="enterdata" />
	<input type="text" name="txt[<?php echo $arrLinkKey;?>]" value="<?php echo $arrLinkVal["text"];?>" class="enterdata" /><br />
<?php } ?>
<input type="submit" class="enterbutton" value="Eintragen" />
</div>
</form>
<?php } ?>