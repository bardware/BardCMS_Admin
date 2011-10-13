<?php //SHOW
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: GET
FILENAME: assoc_ha_0.php
FILETYPE: INCLUDE
*/

$arrRepl=Array("action" => $arrGETaction[0].",".($arrGETaction[1]+1));?>
<form action="admin.php<?php echo mkGETString($arrRepl);?>" method="post">
<div class="formblock">
<label><?php echo $txtneuhost["host"];?></label><?php echo $HostNamen[$GEThid]["full"];?><br />
<?php foreach($arrHostAliases as $arrHostAliasesKey => $arrHostAliasesVal) { ?>
	<label><?php echo $txtneuhost["vorhanden"];?>:</label><?php echo $arrHostAliasesVal;?><br />
<?php } ?>
<label for="neualias"><?php echo $txtneuhost["neualias"];?>:</label><input type="text" name="neualias" id="neualias" class="enterdata" value="" /><br />
<input type="submit" class="enterbutton" value="Eintragen" />
</div>
</form>