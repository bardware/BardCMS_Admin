<? //DATA
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
<?

if(isset($_GET["seite"]))
    $Seite=$_GET["seite"];
else
    $Seite=1;

$Abfrage="SELECT gb.bid, gb.text, gb.datei, gb.breite, gb.hoehe from ged_bilder gb
LEFT JOIN ged_alben_bilder gab on gab.bid=gb.bid
WHERE (gab.aid IS NULL or gab.aid!=".$_GET["aid"].") and gb.datei like \"".$imgBildURL.$_GET["dir"]."%\"
ORDER BY gb.bid
LIMIT ".(($Seite-1)*$PictPerPage).", ".$PictPerPage;

$erg=mysql_query($Abfrage, $link);

$Zaehl=0;
while($row=mysql_fetch_array($erg)) {
    $arrBild[$Zaehl]["bid"]=$row[0];
    $arrBild[$Zaehl]["text"]=$row[1];
    $arrBild[$Zaehl]["datei"]=$row[2];
    $arrBild[$Zaehl]["breite"]=$row[3];
    $arrBild[$Zaehl]["hoehe"]=$row[4];
    ++$Zaehl;
}
mysql_free_result($erg);

$allowedGETVars["seite"]=true;
addGET("seite", $Seite);
?>
