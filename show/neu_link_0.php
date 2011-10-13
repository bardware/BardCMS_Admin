<?php //SHOW
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: GET
FILENAME: neu_link_0.php
FILETYPE: INCLUDE

*/

$arrRepl=Array("action" => $arrGETaction[0].",".($arrGETaction[1]+1));?>
<form action="admin.php<?php echo mkGETString($arrRepl);?>" method="post">
<div class="formblock">
<label for="neulink"><?php echo $txtneulink["url"];?>:</label><input type="text" name="neulink" id="neulink" class="enterdata" value="http://"><br />
<label for="title"><?php echo $txtneulink["beschr"];?>:</label><input type="text" name="title" id="title" class="enterdata" value="" /><br />
<input type="submit" class="enterbutton" value="Eintragen" />
</div>
</form>