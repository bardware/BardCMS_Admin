<? //DATA/INC 
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
$Abfrage="SELECT bid, head, beitrag FROM ged_beitraege gb
WHERE bid=".$BID;
//echo $Abfrage;
$erg=mysql_query($Abfrage, $link);
$row=mysql_fetch_row($erg);

$selBeitrag["bid"]=$row[0];
$selBeitrag["head"]=$row[1];
$selBeitrag["beitrag"]=$row[2];

mysql_free_result($erg);
?>
