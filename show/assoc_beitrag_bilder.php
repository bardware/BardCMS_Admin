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
FILENAME: assoc_beitrag_bilder.php
FILETYPE: INCLUDE
*/

if(isset($arrBild)) { ?>
Bilder, die nicht mir Beitrag: <? echo $Head; ?> verknüpft sind:<br />
<form action="admin.php<?=$GETString;?>" method="post">
<? foreach($arrBild as $Bild) { ?>
<input type="checkbox" name="bid[]" value="<? echo $Bild["bid"]; ?>" /><? echo $Bild["datei"]; ?><br />
<img src="<? echo $Bild["datei"]; ?>" width="<? echo $Bild["breite"]; ?>" height="<? echo $Bild["hoehe"]; ?>" alt="<? echo htmlspecialchars($Bild["text"]); ?>"/><br />
<? } ?>
<input type="submit" />
</form>
<div class="center-fixed"><?
$arrRepl=Array();
$arrRepl["action"]=$act;

if($Seite>1) {
    $arrRepl["seite"]=(1);
    echo "<a href=\"admin.php".mkGETString($arrRepl)."\" title=\"First\"><<</a> "; 
    $arrRepl["seite"]=($Seite-1);
    echo "<a href=\"admin.php".mkGETString($arrRepl)."\" title=\"Prev\"><-</a> ";
} else {
    echo "&nbsp;&nbsp; &nbsp;&nbsp; ";
}

if($MorePicturesAvailable) {
    $arrRepl["seite"]=($Seite+1);
    echo "<a href=\"admin.php".mkGETString($arrRepl)."\" title=\"Next\">-></a> ";
    $arrRepl["seite"]="last";
    echo "<a href=\"admin.php".mkGETString($arrRepl)."\" title=\"Last\">>></a>";
} else {
    echo "&nbsp;&nbsp; &nbsp;&nbsp; ";
}
?>
</div><?

} ?>
