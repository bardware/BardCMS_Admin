<? //SHOW 
/*
BardCMS (c) 2003 by Bardware - Programmer@Bardware.de

This file is part of BardCMS.

BardCMS is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

BardCMS is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with BardCMS; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

REQUESTMETHOD:
FILENAME:
*/
?>
<? if(isset($arrBilder)) {
if(count($arrBilder)>0) { ?>
<form method="post" action="admin.php<?=$GETString;?>">
<table border="0">
<? foreach($arrBilder as $aB) { ?>
<input type="hidden" name="bid[]" value="<?=$aB["bid"];?>" />
<tr>
<td colspan="2"><img src="<?=$aB["addr"];?>" width="<?=$aB["breite"];?>" height="<?=$aB["hoehe"];?>" /></td>
</tr><tr>
<td>Titel:</td><td><input type="text" name="text[<?=$aB["bid"];?>]" class="klein" /></td>
</tr><tr>
<td>Volltext:</td><td><textarea name="ftext[<?=$aB["bid"];?>]" wrap="virtual" lines="6" cols="60" class="klein"></textarea></td>
</tr><tr>
<td>Album:</td><td><select name="alben[<?=$aB["bid"];?>][]" multiple="multiple" size="5" class="klein">
<? foreach($Alben as $Album) { ?>
<option value="<? echo $Album["aid"]; ?>"<? if(isset($_GET["aid"])) {
    if($Album["aid"]==$_GET["aid"]) echo " selected=\"selected\"";
} ?>><? echo $Album["full"]; ?></option>
<? } ?>
</select></td>
</tr>
<? } ?>
</table>
<input type="submit" />
</form>
<? } } ?>
