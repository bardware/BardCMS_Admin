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

REQUESTMETHOD: GET
FILENAME: neu_bild_ftp.php
FILETYPE: INCLUDE
*/
?>
<form method="post" action="<?=$GETString;?>" ENCTYPE="multipart/form-data">
<table border="0">
<tr>
<td>Pfad:</td>
<td><select name="dir" class="klein"><?
foreach($_SESSION["img_subdirs"] as $imgDir) { ?>
    <option value="<?=$imgDir;?>"<? if(isset($_GET["dir"])) {
    if($imgDir==$_GET["dir"]) echo " selected=\"selected\"";
} ?>><?=$imgDir;?></option>
<? } ?>
</select></td>
</tr><tr>
<td>Unterpfad:</td>
<td><input type="text" name="subdir" class="klein" /></td>
</tr><tr>
<td>Datei 1:</td>
<td><input type="file" name="datei[]" class="klein" /></td>
</tr><tr>
<td>Datei 2:</td>
<td><input type="file" name="datei[]" class="klein" /></td>
</tr><tr>
<td>Datei 3:</td>
<td><input type="file" name="datei[]" class="klein" /></td>
</tr><tr>
<td>Datei 4:</td>
<td><input type="file" name="datei[]" class="klein" /></td>
</tr><tr>
<td>Datei 5:</td>
<td><input type="file" name="datei[]" class="klein" /></td>
</tr>
</table>
<input type="hidden" name="randstring" value="<?=$_SESSION["randstring"];?>">
<input type="submit" />
</form>
