<?php //SHOW
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: GET
FILENAME: neu_host_0.php
FILETYPE: INCLUDE
*/

$arrRepl=Array("action" => $arrGETaction[0].",".($arrGETaction[1]+1));?>
<form action="admin.php<?php echo mkGETString($arrRepl);?>" method="post">

<div class="formblock">
<label for="host"><?php echo $txtneuhost["host"];?>:</label><input type="text" name="host" id="host" class="enterdata" value="" /><br />
<input type="submit" class="enterbutton" value="Eintragen" />
</div>
</form>