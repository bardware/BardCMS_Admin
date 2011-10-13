<?
/*
BardCMS (c) 2003, 2004, 2005, 2006 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: GET
REQUESTMETHOD: POST
FILENAME: variables.inc.php
FILETYPE: INCLUDE
*/

    $Host="";
//  $Host="localhost";
    $Port=3306;
    $User="";
    $PWD="";
    $DB="";
    $imgStartDir="";
    $imgBildURL="";
    $ftp_server="";
//  $ftp_server="localhost";
    $ftp_user_name="";
    $ftp_user_pass="";
    $ftp_imgStartDir="";

$PictPerPage=5;
$TNSize=120;

$ServerName=$_SERVER["SERVER_NAME"];

$DATAdir="data/";
$SHOWdir="show/";

$MaxComboLen=27;
$BeitraegePP=10;

function HTML2TXT($Textos) {
$arrFrom[]="<";
$arrFrom[]=">";
$arrFrom[]="\r\n";
$arrFrom[]="\r";
$arrFrom[]="\n";
$arrTo[]="&lt;";
$arrTo[]="&gt;";
$arrTo[]="<br>";
$arrTo[]="<br>";
$arrTo[]="<br>";

$tmpText=str_replace($arrFrom, $arrTo, $Textos);

return $tmpText;
}

function myAddSlashes($string) {
  if (get_magic_quotes_gpc()==1) {
    return ($string);
  } else {
    return (addslashes($string));
  }
}

function IIF($Bedingung, $Wahr, $Falsch) {
     return $Bedingung?$Wahr:$Falsch;
}

function cbRmvACTIONfromGET($var) {
    return ($var!="action");
}

function addGET($GetKey, $GetVal) {
global $allowedGETVars, $arrGET;

    if(isset($allowedGETVars[$GetKey])) {
        $arrGET[$GetKey]=$GetVal;
    }
return true;
}

function MakeResetKey() {
    $key = '';

//    http://de2.php.net/shuffle
//    Seit PHP 4.2.0 besteht keine Notwendigkeit mehr, den Zufallsgenerator für Zahlen
//    mit srand() oder mt_srand() zu füttern, das geschieht nun automatisch.
//    srand((double)microtime()*1000000);
//    mt_srand((double)microtime()*1000000);
    
    $laenge=32;
    $anzrange=255;

    // build range
    for($i=0; $i<=$anzrange; $i++) {
        $range[]=chr($i);
    }

    // loop for random number generation
    for($i=0; $i<$laenge; $i++) {
        $key.=$range[mt_rand(0, $anzrange)];
    }

    $retval = sha1($key);

    if(!empty($retval)) {
        return $retval;
    } else {
       return 0;
    }
}

function _array_slice($array, $offset, $limit) {
    $max = $limit+$offset-1;
    for($x=0; $x<$offset; $x++) {
        next($array);
    }
    for($y=$offset; $y<=$max; $y++) {
        if(current($array)!==false) {
            $key = key($array);
            $new_array[$key] = current($array);
            next($array);
        }
    }
    return $new_array;
}

function mkGETString($arrRepl=false) {
$arrGET=Array();
$GETString="?";

foreach($_GET as $GETKey => $GETVal) {
    $arrGET[$GETKey]=$GETVal;
}

if($arrRepl!==false) {
    foreach($arrRepl as $arrReplKey => $arrReplVal) {
        $arrGET[$arrReplKey]=$arrReplVal;
    }
}

foreach($arrGET as $arrGETKey => $arrGETVal) {
    $GETString.=$arrGETKey."=".$arrGETVal."&amp;";
}

return $GETString;
}

function needGETVar($idx) {
global ${"GET".$idx};
    if(isset($_GET[$idx])) ${"GET".$idx}=$_GET[$idx];
return;
}

function needPOSTVar($idx) {
global ${"POST".$idx};
    if(isset($_POST[$idx])) ${"POST".$idx}=$_POST[$idx];
return;
}

function needSESSIONVar($idx) {
	global ${"SESSION".$idx};
	if(isset($_SESSION[$idx])) ${"SESSION".$idx}=$_SESSION[$idx];
return;
}

function GetText($sprache, $seite) {
global $conn;
global ${"txt".$seite};
${"txt".$seite}=array();

	if($stmt=mysqli_prepare($conn, "SELECT var, text FROM ged_texte WHERE sid=? AND seite=?")) {
	  /* bind parameters for markers */
	    mysqli_stmt_bind_param($stmt, "is", $sprache, $seite);
	
	    /* execute query */
	    mysqli_stmt_execute($stmt);
		echo mysqli_stmt_error($stmt);
		
		mysqli_stmt_bind_result($stmt, $var, $text);
	
	    while(mysqli_stmt_fetch($stmt)) {
	    	${"txt".$seite}[$var]=$text;
	    }
	
	    /* close statement */
	    mysqli_stmt_close($stmt);
	} else {
		echo mysqli_error($conn);
	}	
}

?>
