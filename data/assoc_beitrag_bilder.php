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
FILENAME: assoc_beitrag_bilder.php
FILETYPE: INCLUDE
*/

needGETvar("seite");

if(!empty($GETseite)) {
    if($GETseite=="last") {
        $Abfrage="SELECT count(gb.bid)
        FROM ged_bilder gb
        LEFT JOIN ged_alben_bilder gab ON gab.bid = gb.bid AND gab.aid = ".$GETaid."
        LEFT JOIN ged_beitrag_bilder gbb ON gb.bid = gbb.bildid AND gbb.beitrid = ".$GETbid."
        WHERE gbb.bildid IS NULL and gab.aid=".$GETaid." and gb.datei like '".$imgBildURL.$GETdir."%'";
        //echo $Abfrage;
        $erg=mysql_query($Abfrage, $link);
        $row=mysql_fetch_row($erg);
        $Seite=ceil($row[0]/$PictPerPage);
        mysql_free_result($erg);
    } else {
        $Seite=abs(intval($GETseite));
        if($Seite==0) $Seite=1;
    }
} else {
    $Seite=1;
}

$Abfrage="select head from ged_beitraege where bid=".$GETbid;
//echo $Abfrage;
if(false!==($erg=mysql_query($Abfrage, $link))) {
    if(false!==($row=mysql_fetch_row($erg))) {
        $Head=$row[0];
        mysql_free_result($erg);
    }
}

$Abfrage="SELECT gb.bid, gb.text, gb.datei, gb.breite, gb.hoehe
FROM ged_bilder gb
LEFT JOIN ged_alben_bilder gab ON gab.bid = gb.bid AND gab.aid = ".$GETaid."
LEFT JOIN ged_beitrag_bilder gbb ON gb.bid = gbb.bildid AND gbb.beitrid = ".$GETbid."
WHERE gbb.bildid IS NULL and gab.aid=".$GETaid." and gb.datei like \"".$imgBildURL.$GETdir."%\"
ORDER BY gb.bid
LIMIT ".(($Seite-1)*$PictPerPage).", ".($PictPerPage+1);

//echo $Abfrage;
if(false!==($erg=mysql_query($Abfrage, $link))) {

    $MorePicturesAvailable=false;
    $MorePicturesAvailable=mysql_num_rows($erg)>$PictPerPage;

    $Zaehl=0;
    if(false!==($row=mysql_fetch_array($erg))) {
        do {
            $arrBild[$Zaehl]["bid"]=$row[0];
            $arrBild[$Zaehl]["text"]=$row[1];
            $arrBild[$Zaehl]["datei"]=$row[2];
            $arrBild[$Zaehl]["breite"]=$row[3];
            $arrBild[$Zaehl]["hoehe"]=$row[4];
            ++$Zaehl;
        } while($Zaehl<$PictPerPage and $row=mysql_fetch_array($erg));
    }

    mysql_free_result($erg);

}

$allowedGETVars["seite"]=true;
addGET("seite", $Seite);
?>
