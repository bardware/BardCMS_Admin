<?php //SHOW
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD:
FILENAME:
FILETYPE: INCLUDE
*/

if(!empty($arrBild)) {
	foreach($arrBild as $Bild) { ?>
<?php echo $Bild["datei"];?><br />
<img src="<?php echo $Bild["datei"];?>" width="<?php echo $Bild["breite"];?>" height="<?php echo $Bild["hoehe"];?>" alt="<?php echo htmlspecialchars($Bild["text"]);?>"/><br />
	<?php }
} ?>