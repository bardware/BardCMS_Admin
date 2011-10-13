<?php //SHOW/INC
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD:
FILENAME:
FILETYPE: INCLUDE
*/
?>
<select name="tid[]" multiple="multiple" size="5" class="enterdata" id="tid">
<?php foreach($Themen as $ThemenKey => $ThemenVal) { ?>
<option value="<?php echo $ThemenKey;?>"<?php if(!empty($arrThemenBeitrag)) {
	if(isset($arrThemenBeitrag[$ThemenKey])) echo ' selected="selected"';
 } elseif(!empty($GETtid)) {
	if($GETtid==$ThemenKey) echo 'selected="selected"';
 } ?>><?php echo $ThemenVal["full"];?></option>
<?php } ?>
</select>