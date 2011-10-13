<?php 
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD:
FILENAME: list_subdirs.php
FILETYPE: INCLUDE
*/

//$arrimgDirs=Array();
function getDirList($dirName) {
global $imgStartDir/*, $arrimgDirs*/;
$Pattern="/^".str_replace("/", "\/", $imgStartDir)."(\/)?/";
//echo $Pattern."<br>\n";
//$arrimgDirs[]=preg_replace($Pattern, "", $dirName);
$_SESSION["img_subdirs"][]=preg_replace($Pattern, "", $dirName);
//echo "RealPath: ".realpath($dirName)."<br>\r\n";
//echo "DirName: ".$dirName."<br>\r\n";
//echo "Verz: ".str_replace($StartDir, "", $dirName)."<br>\r\n";
//echo "Preg: ".preg_replace("/^".str_replace("/", "\/", $imgStartDir)."(\/)?/", "", $dirName)."<br>\r\n";
$d = dir($dirName);
	while($entry = $d->read()) {
		if(is_dir($dirName."/".$entry)) {
			if($entry != "." && $entry != "..") getDirList($dirName."/".$entry);
		}
	}
$d->close();
}
?>