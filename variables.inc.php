<?
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

    $Host="";
//  $Host="localhost";
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

function MakeResetKey($min_length = 32, $max_length = 64) {
    $key = '';

    // build range and shuffle range using ASCII table
    for ($i=0; $i<=255; $i++) {
        $range[] = chr($i);
    }

    // shuffle our range 3 times
    for ($i=0; $i<=3; $i++) {
        shuffle($range);
    }

    // loop for random number generation
    for ($i = 0; $i < mt_rand($min_length, $max_length); $i++) {
        $key .= $range[mt_rand(0, count($range))];
    }

    $return = base64_encode($key);

    if (!empty($return)) {
       return $return;
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

?>
