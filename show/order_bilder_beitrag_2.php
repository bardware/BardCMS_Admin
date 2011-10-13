<?php //SHOW
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD:
FILENAME:
FILETYPE: INCLUDE
*/

foreach($arrBild as $Bild) { ?>
<img src="<?php echo $Bild["datei"];?>" width="<?php echo $Bild["breite"];?>" height="<?php echo $Bild["hoehe"];?>" /><br />
<?php } ?>
