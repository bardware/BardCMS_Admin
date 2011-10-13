<?php //SHOW
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: GET
FILENAME: neu_album_0.php
FILETYPE: INCLUDE
*/

$arrRepl=Array("action" => $arrGETaction[0].",".($arrGETaction[1]+1));?>
<form action="admin.php<?php echo mkGETString($arrRepl);?>" method="post">
Album-Name: <input type="text" name="aname" /><br />
<input type="submit" />
</form>
