<? //DATA
/*
BardCMS (c) 2003, 2004 by Bardware - Programmer@Bardware.de

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
FILENAME: disassoc_beitrag_bilder.php
FILETYPE: INCLUDE
*/

$Abfrage="select head from ged_beitraege where bid=".$GETbid;
//echo $Abfrage;
if(false!==($erg=mysql_query($Abfrage, $link))) {
    if(false!==($row=mysql_fetch_row($erg))) {
        $Head=$row[0];
        mysql_free_result($erg);
    }
}

$Abfrage="select gb.bid, gbb.bildid, gb.datei, gb.breite, gb.hoehe, gb.text from ged_bilder gb left join
ged_beitrag_bilder gbb on gb.bid=gbb.bildid
where gbb.beitrid=".$GETbid."
ORDER BY gbb.rang, gbb.bildid";
//echo $Abfrage;
if(false!==($erg=mysql_query($Abfrage, $link))) {

    $Zaehl=0;
    while($row=mysql_fetch_array($erg)) {
        $arrBild[$Zaehl]["bid"]=$row[0];
        $arrBild[$Zaehl]["bildid"]=$row[1];
        $arrBild[$Zaehl]["datei"]=$row[2];
        $arrBild[$Zaehl]["breite"]=$row[3];
        $arrBild[$Zaehl]["hoehe"]=$row[4];
        $arrBild[$Zaehl]["text"]=$row[5];
        ++$Zaehl;
    }
    mysql_free_result($erg);
}
?>
