<?php //ADMIN
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: GET
REQUESTMETHOD: POST
FILENAME: admin.php
FILETYPE: CALL
*/
header("Content-Type: text/html; charset=UTF-8");
//mb_internal_encoding("UTF-8");
//mb_http_output("UTF-8");
// callback function
//ob_start('mb_output_handler');
//iconv_set_encoding("internal_encoding", "ISO-8859-1");
//iconv_set_encoding("output_encoding", "UTF-8");  
//ob_start("ob_iconv_handler"); // start output buffering 

require_once("data/start_session.php");

error_reporting(E_ALL);
@ini_set('display_errors', '1');

require("variables.inc.php");
require("data/list_subdirs.php");

$conn=mysqli_connect($Host, $User, $PWD, $DB, $Port);
if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
}

//mysqli_query($conn, "SET CHARACTER SET 'utf8'");	
//mysqli_query($conn, "SET SESSION collation_connection ='utf8_general_ci'");

needGETvar("bid");
needGETvar("tid");
needGETvar("hid");
needGETvar("aid");
needGETvar("dir");
needGETvar("action");

if(substr($GETdir, 0, 1)!="/") {
	$GETdir="/".$GETdir;
}

needSESSIONVar("lang");
$SESSIONlang=1;

needSESSIONVar("imgdirslisted");
needSESSIONVar("img_subdirs");
if(!$SESSIONimgdirslisted) {
	$_SESSION["img_subdirs"]=Array();
	getDirList($imgStartDir);
	$SESSIONimg_subdirs=$_SESSION["img_subdirs"];
	$SESSIONimgdirslisted=true;
}

$arrGETaction=explode(',', $GETaction);
if(isset($arrGETaction[0])) {
	$arrGETaction[0]=abs(intval($arrGETaction[0]));
} else {
	$arrGETaction[0]=0;
}
if(isset($arrGETaction[1])) {
	$arrGETaction[1]=abs(intval($arrGETaction[1]));
} else {
	$arrGETaction[1]=0;
}

$anzincludes=0;

if($stmt=mysqli_prepare($conn, "SELECT aid, link FROM ged_actions WHERE aid=? AND max_step>=?")) {
  /* bind parameters for markers */
	mysqli_stmt_bind_param($stmt, "ii", $arrGETaction[0], $arrGETaction[1]);

	/* execute query */
	mysqli_stmt_execute($stmt);
	echo mysqli_stmt_error($stmt);
	
	/* store result */
	mysqli_stmt_store_result($stmt);

	$anzincludes=mysqli_stmt_num_rows($stmt);

	mysqli_stmt_bind_result($stmt, $actionid, $link);

	/* fetch value */
	mysqli_stmt_fetch($stmt);

	/* close statement */
	mysqli_stmt_close($stmt);
} else {
	echo mysqli_error($conn);
}

if($stmt=mysqli_prepare($conn, "UPDATE ged_actions SET nutzung=nutzung+1 WHERE aid=?")) {
  /* bind parameters for markers */
	mysqli_stmt_bind_param($stmt, "i", $actionid);

	/* execute query */
	mysqli_stmt_execute($stmt);
	echo mysqli_stmt_error($stmt);
	/* close statement */
	mysqli_stmt_close($stmt);
} else {
	echo mysqli_error($conn);
}

if($anzincludes>0) {
	$datei=$DATAdir.$link.'_'.$arrGETaction[1].'.php';
	if(file_exists($datei)) {
		require($datei);
	}
}

require($DATAdir."menu.php");

/*echo '<?xml version="1.0" encoding="UTF-8" ?>'; 
echo "\n"; */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8 />
<meta http-equiv="Content-Language" content="de" />
<link href="/styles.css" type="text/css" rel="stylesheet" />
<title>BardCMSAdmin V2</title>
</head>
<body>

<div id="cont" class="fliesstext">
<?php if($anzincludes>0) {
	$datei=$SHOWdir.$link.'_'.$arrGETaction[1].'.php';
	echo $datei;
	if(file_exists($datei)) {
		require($datei);
	}
} ?>
</div>

<div id="mnu" class="klein"><?php require($SHOWdir."menu.php");?></div>

</body>
</html>
<?php mysqli_close($conn);?>