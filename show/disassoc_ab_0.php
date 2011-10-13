<?php //SHOW
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: GET
FILENAME: disassoc_ab_0.php
FILETYPE: INCLUDE
*/

if(!empty($arrBild)) {
$arrRepl=Array("action" => $arrGETaction[0].",".($arrGETaction[1]+1));?>
<form action="admin.php<?php echo mkGETString($arrRepl);?>" method="post">
<?php foreach($arrBild as $BildKey => $BildVal) { ?>
<input type="checkbox" name="bid[]" value="<?php echo $BildKey;?>" /><?php echo $BildVal["datei"];?><br />
<img src="<?php echo $BildVal["datei"];?>" width="<?php echo $BildVal["breite"];?>" height="<?php echo $BildVal["hoehe"];?>" alt="<?php echo htmlspecialchars($BildVal["text"]);?>"/><br />
<?php } ?>
<input type="submit" />
</form>
<?php } ?>
