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
FILENAME: assoc_beitrag_links.php
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

$Abfrage="select l.lid, bl.bid, l.link, l.text from ged_links l 
left join ged_beitrag_links bl on l.lid=bl.lid and bl.bid=".$GETbid."
where bl.bid is null";
//echo $Abfrage;
if(false!==($erg=mysql_query($Abfrage, $link))) {

    $Zaehl=0;
    while($row=mysql_fetch_array($erg)) {
        $arrLink[$Zaehl]["lid"]=$row[0];
        $arrLink[$Zaehl]["bid"]=$row[1];
        $arrLink[$Zaehl]["link"]=$row[2];
        $arrLink[$Zaehl]["text"]=htmlspecialchars($row[3]);
        ++$Zaehl;
    }
    mysql_free_result($erg);
}    
?>
