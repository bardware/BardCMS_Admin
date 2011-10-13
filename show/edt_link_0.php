<?php //SHOW
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: GET
FILENAME: edit_link_0.php
FILETYPE: INCLUDE
*/

if(!empty($arrLink)) {
$arrRepl=Array("action" => $arrGETaction[0].",".($arrGETaction[1]+1));?>
<form action="admin.php<?php echo mkGETString($arrRepl);?>" method="post">
<div class="formblock">
<?php foreach($arrLink as $arrLinkKey => $arrLinkVal) { ?>
	<input type="checkbox" name="lid[]" value="<?php echo $arrLinkKey;?>"/>
	<a href="<?php echo $arrLinkVal["link"];?>" target="_blank"><?php echo IIF(!empty($arrLinkVal["text"]), $arrLinkVal["text"], $arrLinkVal["link"]);?></a><br />
<?php } ?>
<input type="submit" class="enterbutton" value="Eintragen" />
</div>
</form>
<?php } ?>