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
<form action="admin.php" method="get">
<span class="klein">Beiträge:</span><br />
<select name="bid" class="klein">
<? foreach($Beitraege as $Beitrag) { ?>
<option value="<? echo $Beitrag["bid"]; ?>"<? if(isset($_GET["bid"])) {
    if($Beitrag["bid"]==$_GET["bid"]) echo " selected=\"selected\"";
} ?>><? echo $Beitrag["beitrag"]; ?></option>
<? } ?>
</select><br />
<span class="klein">Themen:</span><br />
<select name="tid" class="klein">
<? foreach($Themen as $Thema) { ?>
<option value="<? echo $Thema["tid"]; ?>"<? if(isset($_GET["tid"])) {
    if($Thema["tid"]==$_GET["tid"]) echo " selected=\"selected\"";
} ?>><? echo $Thema["thema"]; ?></option>
<? } ?>
</select><br />
<span class="klein">Hosts:</span><br />
<select name="hid" class="klein">
<? foreach($HostNamen as $HostName) { ?>
<option value="<? echo $HostName["hid"]; ?>"<? if(isset($_GET["hid"])) {
    if($HostName["hid"]==$_GET["hid"]) echo " selected=\"selected\"";
} ?>><? echo $HostName["hostname"]; ?></option>
<? } ?>
</select><br />
<span class="klein">Bilderalben:</span><br />
<select name="aid" class="klein">
<? foreach($Alben as $Album) { ?>
<option value="<? echo $Album["aid"]; ?>"<? if(isset($_GET["aid"])) {
    if($Album["aid"]==$_GET["aid"]) echo " selected=\"selected\"";
} ?>><? echo $Album["album"]; ?></option>
<? } ?>
</select><br />

<? /* ?>
<span class="klein">Bildpfade:</span><br />
<select name="dir" class="klein"><?
foreach($arrimgDirs as $imgDir) { ?>
    <option value="<?=$imgDir;?>"<? if(isset($_GET["dir"])) {
    if($imgDir==$_GET["dir"]) echo " selected=\"selected\"";
} ?>><?=$imgDir;?></option>
<? } ?>
</select><br />
<? */ ?>
<span class="klein">Bildpfade:</span><br />
<select name="dir" class="klein"><?
foreach($_SESSION["img_subdirs"] as $imgDir) { ?>
    <option value="<?=$imgDir;?>"<? if(isset($_GET["dir"])) {
    if($imgDir==$_GET["dir"]) echo " selected=\"selected\"";
} ?>><?=$imgDir;?></option>
<? } ?>
</select><br />

<? /* ?>
<? foreach($arrAct as $ActKey => $ActValue) {
   if($ActValue["menu"]) { ?>
<input type="radio" name="action" value="<?=$ActKey;?>" id="<?=$ActKey;?>"<?
if(isset($_GET["action"])) {
    if($_GET["action"]==$ActKey or $_GET["action"]==$ActValue["2"]) echo " checked=\"checked\"";
} ?> /><label for="<?=$ActKey;?>" class="klein"><?=$ActValue["desc"];?></label><br /><?="\n";?><?
    }
} ?>
<? */ ?>
<span class="klein">Action:</span><br />
<select name="action" class="klein">
<? foreach($arrAct as $ActKey => $ActValue) {
$ActionSelected=($arrAct[$_GET["action"]]["menu"]==$ActKey);
   if($ActValue["menu"]==$ActKey) { ?>
<option value="<?=$ActKey;?>"<?
if(isset($_GET["action"])) {
    if($ActionSelected) echo " selected=\"selected\"";
} ?>><?=$ActValue["desc"];?></option>
<?  }
} ?>
</select>
<? if(""!=(session_id())) { ?>
<input type="hidden" name="<?=session_name();?>" value="<?=session_id();?>" />
<? } ?>
<input type="submit" />
</form>
