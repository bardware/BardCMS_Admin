<?php //SHOW 
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD:
FILENAME:
FILETYPE: INCLUDE
*/

if(!empty($arrBeitragRang)) { ?>
$arrRepl=Array("action" => $arrGETaction[0].",".($arrGETaction[1]+1));?>
<form action="admin.php<?php echo mkGETString($arrRepl);?>" method="post">
<?php foreach($arrBeitragRang as $aBRKey => $aBRVal) { ?>
<input type="text" value="<?php echo $aBRVal["rang"];?>" size="5" name="rang[<?php echo $aBRKey;?>]"/> <?php echo $aBRVal["head"];?><br />
<?php } ?>
<input type="submit" />
</form>
<?php } ?>