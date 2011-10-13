<?php //SHOW/INC
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD:
FILENAME: list_hosts_thema.php
FILETYPE: INCLUDE
*/
?>
<select name="hid[]" multiple="multiple" size="5" class="enterdata" id="hid">
<?php foreach($HostNamen as $HostNamenKey => $HostNamenVal) { ?>
<option value="<?php echo $HostNamenKey;?>"<?php if(!empty($arrHostsThema)) {
	if(isset($arrHostsThema[$HostNamenKey])) echo ' selected="selected"';
 } elseif(!empty($GEThid)) {
	if($GEThid==$HostNamenKey) echo ' selected="selected"';
 } ?>><?php echo $HostNamenVal["full"];?></option>
<?php } ?>
</select>