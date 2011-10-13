<?php //SHOW
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: GET
FILENAME: neu_beitrag.php
FILETYPE: INCLUDE
*/

$arrRepl=Array("action" => $arrGETaction[0].",".($arrGETaction[1]+1));
?><form action="admin.php<?php echo mkGETString($arrRepl);?>" method="post">
<div class="formblock">
<label for="tid"><?php echo $txtneubeitrag["themen"];?>:</label><?php require_once("inc/list_themen_beitrag.php");?><br />
<label for="head"><?php echo $txtneubeitrag["ueberschr"];?>:</label><input type="text" name="head" id="head" class="enterdata" value="" /><br />
<label for="beitrag"><?php echo $txtneubeitrag["beitrag"];?>:</label><textarea name="beitrag" id="beitrag" cols="60" rows="6" wrap="virtual" class="enterdata" style="width:29.8em;"></textarea><br />
<input type="submit" class="enterbutton" value="Eintragen" />
</div>
</form>