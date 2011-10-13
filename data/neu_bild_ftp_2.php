<?php //DATA
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD:
FILENAME:
FILETYPE: INCLUDE
*/

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
		$size=$_FILES['datei']['size'][$i];	 // filesize
		$type=$_FILES['datei']['type'][$i];	 // mime type
		$name=$_FILES['datei']['name'][$i];	 // original name
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
//				echo "Uploaded";
				$info=getimagesize($temp);
				$ZielPfad=$imgBildURL;
				$ZielPfad.=$trimPOSTDir!=""?$trimPOSTDir."/":"";
				$ZielPfad.=$trimPOSTSubDir!=""?$trimPOSTSubDir."/":"";
				$ZielPfad.=$name;
//				echo $ZielPfad."<br>\n";
				$Abfrage="INSERT INTO ged_bilder (datei, breite, hoehe) values('".$ZielPfad."', ".$info[0].", ".$info[1].")";
//				echo $Abfrage;
				mysqli_query($conn, $Abfrage);
				$arrBilder[$i]["bid"]=mysqli_insert_id($conn);
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
