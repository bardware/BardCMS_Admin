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
if(isset($_GET["dir"]))
    $GewDir=$_GET["dir"];
else 
    $GewDir="";
    
if(substr($GewDir, -1)!="/") $GewDir.="/";

if(isset($_POST["datei"])) {
    foreach($_POST["datei"] as $POSTDatei) {
        if(isset($_POST["text"][$POSTDatei]))
            $Text=myAddSlashes($_POST["text"][$POSTDatei]);
        else
            $Text="";
        if(isset($_POST["ftext"][$POSTDatei])) 
            $FText=myAddSlashes($_POST["ftext"][$POSTDatei]);
        else
            $FText="";
        $info=getimagesize($imgStartDir.$GewDir.$_SESSION[$GewDir][$POSTDatei]);
        $Abfrage="INSERT INTO ged_bilder(text, langtext, datei, breite, hoehe) values(\"".$Text."\", \"".$FText."\", \"".$imgBildURL.$GewDir.$_SESSION[$GewDir][$POSTDatei]."\", ".$info[0].", ".$info[1].")";
//        echo $Abfrage."<br>\n";
        mysql_query($Abfrage, $link);
        $id=mysql_insert_id($link);
//        echo $id."<br>\n";
        if(isset($_POST["alben"][$POSTDatei])) {
            foreach($_POST["alben"][$POSTDatei] as $POSTalbum) {
                $Abfrage="INSERT INTO ged_alben_bilder(aid, bid) values(".$POSTalbum.", ".$id.")";
//              echo $Abfrage."<br>\n";
                mysql_query($Abfrage, $link);
                unset($_SESSION[$GewDir][$POSTDatei]);
            }
        }
    }
}
?>
