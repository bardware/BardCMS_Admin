<?php //SHOW
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD:
FILENAME:
FILETYPE: INCLUDE
*/

if(!empty($arrBilder)) {
if(count($arrBilder)>0) { ?>
<form method="post" action="admin.php<?php echo $GETString;?>">
<table border="0">
<?php foreach($arrBilder as $aB) { ?>
<input type="hidden" name="bid[]" value="<?php echo $aB["bid"];?>" />
<tr>
<td colspan="2"><img src="<?php echo $aB["addr"];?>" width="<?php echo $aB["breite"];?>" height="<?php echo $aB["hoehe"];?>" /></td>
</tr><tr>
<td>Titel:</td><td><input type="text" name="text[<?php echo $aB["bid"];?>]" class="klein" /></td>
</tr><tr>
<td>Volltext:</td><td><textarea name="ftext[<?php echo $aB["bid"];?>]" wrap="virtual" lines="6" cols="60" class="klein"></textarea></td>
</tr><tr>
<td>Album:</td><td><select name="alben[<?php echo $aB["bid"];?>][]" multiple="multiple" size="5" class="klein">
<?php foreach($Alben as $Album) { ?>
<option value="<?php echo $Album["aid"];?>"<?php if($Album["aid"]==$GETaid) echo ' selected="selected"';?>><?php echo $Album["full"];?></option>
<?php } ?>
</select></td>
</tr>
<?php } ?>
</table>
<input type="submit" />
</form>
<?php } } ?>