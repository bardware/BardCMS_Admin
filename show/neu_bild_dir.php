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
<? if(count($_SESSION[$GewDir])>0) {
//printf("%s<br>\n", $_SESSION["lastShown"][$GewDir]);  ?>
<form action="admin.php<?=$GETString;?>" method="post">
<table border="0">
<?
//$Zaehl=$_SESSION["lastShown"][$GewDir];
$Bildzaehl=0;

$Zaehl=0;

end($_SESSION[$GewDir]);
$MaxIndex=key($_SESSION[$GewDir]);
reset($_SESSION[$GewDir]);

    if($_SESSION["lastShown"][$GewDir]>0 and $_SESSION["lastShown"][$GewDir]<$MaxIndex) {
        do {
           next($_SESSION[$GewDir]);
//           printf("%s<br>\n", key($_SESSION[$GewDir]));
        } while(key($_SESSION[$GewDir])<=$_SESSION["lastShown"][$GewDir]);
    }

    for($Zaehl=0; $Zaehl<$PictPerPage; $Zaehl++) {
        if(current($_SESSION[$GewDir])!==false) {
            $arrDirKey=key($_SESSION[$GewDir]);
            $tmpVal=current($_SESSION[$GewDir]);
            ?><tr>
<td colspan="2"><img src="<?=$imgBildURL.$GewDir.$tmpVal;?>" /></td>
</tr><tr>
<td><label for="datei_<?=$arrDirKey;?>">Eintragen:</label></td><td><input type="checkbox" name="datei[]" value="<?=$arrDirKey;?>" id="datei_<?=$arrDirKey;?>" /></td>
</tr><tr>
<td>Titel:</td><td><input type="text" name="text[<?=$arrDirKey;?>]" class="klein" /></td>
</tr><tr>
<td>Volltext:</td><td><textarea name="ftext[<?=$arrDirKey;?>]" wrap="virtual" lines="6" cols="60" class="klein"></textarea></td>
</tr><tr>
<td>Album:</td><td><select name="alben[<?=$arrDirKey;?>][]" multiple="multiple" size="5" class="klein">
<? foreach($Alben as $Album) { ?>
<option value="<? echo $Album["aid"]; ?>"<? if(isset($_GET["aid"])) {
    if($Album["aid"]==$_GET["aid"]) echo " selected=\"selected\"";
} ?>><? echo $Album["album"]; ?></option>
<? } ?>
</select></td>
</tr>
<?
            next($_SESSION[$GewDir]);
        }
    }
$_SESSION["lastShown"][$GewDir]=$arrDirKey;
/*
if($_SESSION["lastShown"][$GewDir]!=0) {
    foreach($_SESSION[$GewDir] as $arrDirKey => $arrDirVal) {
        if($arrDirKey>$_SESSION["lastShown"][$GewDir]) break;
        $Zaehl++;
    }
}

end($_SESSION[$GewDir]);
if(key($_SESSION[$GewDir])!=$arrDirKey or $arrDirKey==0) {

reset($_SESSION[$GewDir]);

$tmpArr=_array_slice($_SESSION[$GewDir], $Zaehl, $PictPerPage);

foreach($tmpArr as $tmpKey => $tmpVal) {
?>
<tr>
<td colspan="2"><img src="<?=$imgBildURL.$GewDir.$tmpVal;?>" /></td>
</tr><tr>
<td><label for="datei_<?=$arrDirKey;?>">Eintragen:</label></td><td><input type="checkbox" name="datei[]" value="<?=$arrDirKey;?>" id="datei_<?=$arrDirKey;?>" /></td>
</tr><tr>
<td>Titel:</td><td><input type="text" name="text[<?=$arrDirKey;?>]" class="klein" /></td>
</tr><tr>
<td>Volltext:</td><td><textarea name="ftext[<?=$arrDirKey;?>]" wrap="virtual" lines="6" cols="60" class="klein"></textarea></td>
</tr><tr>
<td>Album:</td><td><select name="alben[<?=$arrDirKey;?>][]" multiple="multiple" size="5" class="klein">
<? foreach($Alben as $Album) { ?>
<option value="<? echo $Album["aid"]; ?>"<? if(isset($_GET["aid"])) {
    if($Album["aid"]==$_GET["aid"]) echo " selected=\"selected\"";
} ?>><? echo $Album["album"]; ?></option>
<? } ?>
</select></td>
</tr>
<?
$Bildzaehl++;
if($Bildzaehl==$PictPerPage) break;
}

$_SESSION["lastShown"][$GewDir]=$tmpKey;
}
*/
?>
</table>
<input type="submit">
</form>
<? } ?>
