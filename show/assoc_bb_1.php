<?php //SHOW
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: POST
FILENAME: assoc_beitrag_bilder_2.php
FILETYPE: INCLUDE
*/

?>
<form action="admin.php<?php echo mkGETString(false);?>" method="post">
<?php foreach($arrBild as $Bild) { ?>
<input type="text" name="rang[<?php echo $Bild["bid"];?>]" value="<?php echo $Bild["rang"];?>" />
<img src="<?php echo $Bild["datei"];?>" width="<?php echo $Bild["breite"];?>" height="<?php echo $Bild["hoehe"];?>" /><br />
<?php } ?>
<input type="submit" />
</form>