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
$Abfrage="select tid, if(length(thema)>$MaxComboLen, concat(left(thema,$MaxComboLen), \"...\"), thema), thema from ged_themen order by thema";
//echo $Abfrage;
$erg=mysql_query($Abfrage, $link);

$Zaehl=0;
while($row=mysql_fetch_row($erg)) {
    $Themen[$Zaehl]["tid"]=$row[0];
    $Themen[$Zaehl]["thema"]=$row[1];
    $Themen[$Zaehl]["full"]=$row[2];
    ++$Zaehl;
}
mysql_free_result($erg);

$Abfrage="select bid, if(length(head)>$MaxComboLen, concat(left(head,$MaxComboLen), \"...\"), head), head from ged_beitraege order by head";
$erg=mysql_query($Abfrage, $link);

$Zaehl=0;
while($row=mysql_fetch_row($erg)) {
    $Beitraege[$Zaehl]["bid"]=$row[0];
    $Beitraege[$Zaehl]["beitrag"]=$row[1];
    $Beitraege[$Zaehl]["full"]=$row[2];
    ++$Zaehl;
}

mysql_free_result($erg);

$Abfrage="select hid, if(length(hostname)>$MaxComboLen, concat(left(hostname,$MaxComboLen), \"...\"), hostname), hostname from ged_hosts order by hostname";
$erg=mysql_query($Abfrage, $link);

$Zaehl=0;
while($row=mysql_fetch_row($erg)) {
    $HostNamen[$Zaehl]["hid"]=$row[0];
    $HostNamen[$Zaehl]["hostname"]=$row[1];
    $HostNamen[$Zaehl]["full"]=$row[2];
    ++$Zaehl;
}

mysql_free_result($erg);

$Abfrage="select aid, if(length(album)>$MaxComboLen, concat(left(album,$MaxComboLen), \"...\"), album), album from ged_alben order by album";
//echo $Abfrage;
$erg=mysql_query($Abfrage, $link);

$Zaehl=0;
while($row=mysql_fetch_row($erg)) {
    $Alben[$Zaehl]["aid"]=$row[0];
    $Alben[$Zaehl]["album"]=$row[1];
    $Alben[$Zaehl]["full"]=$row[2];
    ++$Zaehl;
}
mysql_free_result($erg);

?>
