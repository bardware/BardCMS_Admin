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

if($_SESSION["randstring"]==$_POST["randstring"]) {

set_time_limit(500);

// set up basic connection
$conn_id = ftp_connect($ftp_server);
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
ftp_pasv($conn_id, TRUE);

// check connection
if ((!$conn_id) || (!$login_result)) {
    die("FTP connection has failed !");
}

$trimPOSTDir=trim($_POST["dir"]);
$trimPOSTSubDir=trim($_POST["subdir"]);

/*
echo "imgStartDir: ".$imgStartDir."<br>\n";
echo "POSTDir: ".$trimPOSTDir."<br>\n";
echo "POSTSubDir: ".$trimPOSTSubDir."<br>\n";
*/

ftp_chdir($conn_id, $ftp_imgStartDir.$trimPOSTDir);
if($trimPOSTSubDir!="") {
    ftp_mkdir($conn_id, $trimPOSTSubDir);
    ftp_chdir($conn_id, $trimPOSTSubDir);
}

if(isset($_FILES["datei"])) {
    for($i=0;$i<count($_FILES['datei']['tmp_name']);$i++) {
        $size=$_FILES['datei']['size'][$i];     // filesize
        $type=$_FILES['datei']['type'][$i];     // mime type
        $name=$_FILES['datei']['name'][$i];     // original name
        $temp=$_FILES['datei']['tmp_name'][$i]; // temporary name
        if($size) {
/*
            //whatever to do with uploaded files
            echo "original name: $name<br />";
            echo "temporary name: $temp<br />";
            echo "mime type: $type<br />";
            echo "size: $size<hr />";
*/
            if(ftp_put($conn_id, $name, $temp, FTP_BINARY)) {
//                echo "Uploaded";
                $info=getimagesize($temp);
                $ZielPfad=$imgBildURL;
                $ZielPfad.=$trimPOSTDir!=""?$trimPOSTDir."/":"";
                $ZielPfad.=$trimPOSTSubDir!=""?$trimPOSTSubDir."/":"";
                $ZielPfad.=$name;
//                echo $ZielPfad."<br>\n";
                $Abfrage="INSERT INTO ged_bilder(datei, breite, hoehe) values(\"".$ZielPfad."\", ".$info[0].", ".$info[1].")";
//                echo $Abfrage;
                mysql_query($Abfrage, $link);
                $arrBilder[$i]["bid"]=mysql_insert_id($link);
                $arrBilder[$i]["addr"]=$ZielPfad;
                $arrBilder[$i]["breite"]=$info[0];
                $arrBilder[$i]["hoehe"]=$info[1];
            } else {
                echo "Fehler!";
            }
        }
    }
}

ftp_close($conn_id);
$_SESSION["imgdirslisted"]=false;
$_SESSION["randstring"]=MakeResetKey(15, 20);

}

?>
