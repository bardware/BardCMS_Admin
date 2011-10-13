<?php //SHOW
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: POST
FILENAME: assoc_ab_1.php
FILETYPE: INCLUDE
*/

foreach($arrBild as $BildKey => $BildVal) { ?>
<?php echo $BildVal["datei"];?><br />
<img src="<?php echo $BildVal["datei"];?>" width="<?php echo $BildVal["breite"];?>" height="<?php echo $BildVal["hoehe"];?>" alt="<?php echo htmlspecialchars($BildVal["text"]);?>"/><br />
<?php }
$arrRepl=Array("action" => $arrGETaction[0].",0", "seite" => ($Seite+1));?>
<a href="admin.php<?php echo mkGETString($arrRepl);?>">Weiter</a>
