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

REQUESTMETHOD: GET
FILENAME: disassoc_beitrag_links.php
FILETYPE: INCLUDE
*/

$Abfrage="select head from ged_beitraege where bid=".$_GET["bid"];
//echo $Abfrage;
$erg=mysql_query($Abfrage, $link);
$row=mysql_fetch_row($erg);
$Head=$row[0];
mysql_free_result($erg);

$Abfrage="select gl.lid, gbl.bid, gl.link, gl.text from ged_links gl left join
ged_beitrag_links gbl on gl.lid=gbl.lid 
where gbl.bid=".$_GET["bid"]."
ORDER BY gbl.rang, gbl.lid";
//echo $Abfrage;
$erg=mysql_query($Abfrage, $link);

$Zaehl=0;
while($row=mysql_fetch_array($erg)) {
    $arrLink[$Zaehl]["lid"]=$row[0];
    $arrLink[$Zaehl]["bid"]=$row[1];
    $arrLink[$Zaehl]["link"]=$row[2];
    $arrLink[$Zaehl]["text"]=htmlspecialchars($row[3]);
    ++$Zaehl;
}
mysql_free_result($erg);
?>
