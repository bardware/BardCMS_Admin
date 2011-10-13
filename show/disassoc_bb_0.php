<?php //SHOW
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: GET
FILENAME: disassoc_bb_0.php
FILETYPE: INCLUDE
*/

if(!empty($arrBild)) {
$arrRepl=Array("action" => $arrGETaction[0].",".($arrGETaction[1]+1));?>
<form action="admin.php<?php echo mkGETString($arrRepl);?>" method="post">
<?php foreach($arrBild as $Bild) { ?>
<input type="checkbox" name="bid[]" value="<?php echo $Bild["bid"];?>" /><?php echo $Bild["datei"];?><br />
<img src="<?php echo $Bild["datei"];?>" width="<?php echo $Bild["breite"];?>" height="<?php echo $Bild["hoehe"];?>" /><br />
<?php } ?>
<input type="submit" />
</form>
<?php } else { ?>
Keine Bilder mit gew�hltem Beitrag verkn�pft
<?php } ?>
