<?php //SHOW
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: GET
FILENAME: edit_thema_0.php
FILETYPE: INCLUDE
*/

$arrRepl=Array("action" => $arrGETaction[0].",".($arrGETaction[1]+1));?>
<form action="admin.php<?php echo mkGETString($arrRepl);?>" method="post">
<div class="formblock">
<label for="hid"><?php echo $txtneuthema["host"];?>:</label><?php require_once("inc/list_hosts_thema.php");?><br />
<label for="thema"><?php echo $txtneuthema["thematitel"];?>:</label><input type="text" name="thema" id="thema" class="enterdata" value="<?php echo $selThema["thema"];?>" /><br />
<label for="beschr"><?php echo $txtneuthema["beschr"];?>:</label><textarea name="beschr" id="beschr" cols="60" rows="6" wrap="virtual" class="enterdata"><?php echo $selThema["beschr"];?></textarea><br />
<input type="submit" class="enterbutton" value="Eintragen" />
</div>
</form>