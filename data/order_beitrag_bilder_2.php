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

REQUESTMETHOD: POST
FILENAME: order_beitrag_bilder_2.php
FILETYPE: INCLUDE
*/

if(isset($_POST["rang"])) {
    foreach($_POST["rang"] as $POSTRangKey => $POSTRangVal) {
        $Abfrage="UPDATE ged_beitrag_bilder set rang=".$POSTRangVal." where bildid=".$POSTRangKey." and beitrid=".$_GET["bid"];
        mysql_query($Abfrage, $link);
    }
}

$Abfrage="select gb.bid, gbb.bildid, gb.datei, gb.breite, gb.hoehe, gbb.rang from ged_bilder gb left join
ged_beitrag_bilder gbb on gb.bid=gbb.bildid
where gbb.beitrid=".$_GET["bid"]."
ORDER BY gbb.rang, gbb.bildid";
//echo $Abfrage";
$erg=mysql_query($Abfrage, $link);

$Zaehl=0;
while($row=mysql_fetch_array($erg)) {
    $arrBild[$Zaehl]["bid"]=$row[0];
    $arrBild[$Zaehl]["beitrid"]=$row[1];
    $arrBild[$Zaehl]["datei"]=$row[2];
    $arrBild[$Zaehl]["breite"]=$row[3];
    $arrBild[$Zaehl]["hoehe"]=$row[4];
    $arrBild[$Zaehl]["rang"]=$row[5];
    ++$Zaehl;
}
mysql_free_result($erg);
?>
