<?php //SHOW
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: POST
FILENAME: assoc_beitrag_bilder_3.php
FILETYPE: INCLUDE
*/

if(!empty($arrBild)) {
foreach($arrBild as $Bild) { ?>
<img src="<?php echo $Bild["datei"];?>" width="<?php echo $Bild["breite"];?>" height="<?php echo $Bild["hoehe"];?>" /><br />
<?php }
} ?>
<a href="admin.php<?php echo $GETString;?>">admin.php<?php echo str_replace("&", "&amp;", $GETString);?></a>
