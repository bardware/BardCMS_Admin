<?php //SHOW 
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD:
FILENAME:
FILETYPE: INCLUDE
*/

if(!empty($arrThemaRang)) { ?>
$arrRepl=Array("action" => $arrGETaction[0].",".($arrGETaction[1]+1));?>
<form action="admin.php<?php echo mkGETString($arrRepl);?>" method="post">
<?php foreach($arrThemaRang as $aTRKey => $aTRVal) { ?>
<input type="text" value="<?php echo $aTRVal["rang"];?>" size="5" name="rang[<?php echo $aTRKey;?>]"/> <?php echo $aTRVal["thema"];?><br />
<?php } ?>
<input type="submit" />
</form>
<?php } ?>