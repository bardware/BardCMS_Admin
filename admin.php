<?
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
REQUESTMETHOD: POST
FILENAME: admin.php
FILETYPE: CALL
*/

require_once("data/start_session.php");

error_reporting(E_ALL);
@ini_set('display_errors', '1');

require("variables.inc.php");

$link = mysql_connect($Host, $User, $PWD) or die("Keine Verbindung möglich!");
mysql_select_db($DB, $link) or die("Auswahl der Datenbank fehlgeschlagen");

needGETvar("bid");
needGETvar("tid");
needGETvar("hid");
needGETvar("aid");
needGETvar("dir");
needGETvar("action");

if(!isset($GETaction)) {
    $act="";
} else {
    $act=strtolower($GETaction);
}

$arrAct["assoc_bb"]["incFile"]="assoc_beitrag_bilder.php";
$arrAct["assoc_bb"]["menu"]="assoc_bb";
$arrAct["assoc_bb"]["desc"]="Beitrag mit Bildern verknüpfen";
$arrAct["assoc_bb"]["2"]="assoc_bb2";
$arrAct[$arrAct["assoc_bb"]["2"]]["incFile"]="assoc_beitrag_bilder_2.php";
$arrAct[$arrAct["assoc_bb"]["2"]]["menu"]="assoc_bb";
$arrAct[$arrAct["assoc_bb"]["2"]]["2"]="assoc_bb3";
$arrAct[$arrAct[$arrAct["assoc_bb"]["2"]]["2"]]["incFile"]="assoc_beitrag_bilder_3.php";
$arrAct[$arrAct[$arrAct["assoc_bb"]["2"]]["2"]]["menu"]="assoc_bb";
$arrAct[$arrAct[$arrAct["assoc_bb"]["2"]]["2"]]["2"]="assoc_bb";
$arrAct["assoc_bl"]["incFile"]="assoc_beitrag_links.php";
$arrAct["assoc_bl"]["menu"]="assoc_bl";
$arrAct["assoc_bl"]["desc"]="Beitrag mit Links verknüpfen";
$arrAct["assoc_bl"]["2"]="assoc_bl2";
$arrAct[$arrAct["assoc_bl"]["2"]]["incFile"]="assoc_beitrag_links_2.php";
$arrAct[$arrAct["assoc_bl"]["2"]]["menu"]="assoc_bl";
$arrAct[$arrAct["assoc_bl"]["2"]]["2"]="assoc_bl3";
$arrAct[$arrAct[$arrAct["assoc_bl"]["2"]]["2"]]["incFile"]="assoc_beitrag_links_3.php";
$arrAct[$arrAct[$arrAct["assoc_bl"]["2"]]["2"]]["menu"]="assoc_bl";
$arrAct["disassoc_bb"]["incFile"]="disassoc_beitrag_bilder.php";
$arrAct["disassoc_bb"]["menu"]="disassoc_bb";
$arrAct["disassoc_bb"]["desc"]="Verknüpfung von Beitrag und Bildern aufheben";
$arrAct["disassoc_bb"]["2"]="disassoc_bb2";
$arrAct[$arrAct["disassoc_bb"]["2"]]["incFile"]="disassoc_beitrag_bilder_2.php";
$arrAct[$arrAct["disassoc_bb"]["2"]]["menu"]="disassoc_bb";
$arrAct["disassoc_bl"]["incFile"]="disassoc_beitrag_links.php";
$arrAct["disassoc_bl"]["menu"]="disassoc_bl";
$arrAct["disassoc_bl"]["desc"]="Verknüpfung von Beitrag und Links aufheben";
$arrAct["disassoc_bl"]["2"]="disassoc_bl2";
$arrAct[$arrAct["disassoc_bl"]["2"]]["incFile"]="disassoc_beitrag_links_2.php";
$arrAct[$arrAct["disassoc_bl"]["2"]]["menu"]="disassoc_bl";
$arrAct["edit_beitrag"]["incFile"]="edit_beitrag.php";
$arrAct["edit_beitrag"]["menu"]="edit_beitrag";
$arrAct["edit_beitrag"]["desc"]="Beitrag Editieren";
$arrAct["edit_beitrag"]["2"]="edit_beitrag2";
$arrAct[$arrAct["edit_beitrag"]["2"]]["incFile"]="edit_beitrag_2.php";
$arrAct[$arrAct["edit_beitrag"]["2"]]["menu"]="edit_beitrag";
$arrAct["edit_thema"]["incFile"]="edit_thema.php";
$arrAct["edit_thema"]["menu"]="edit_thema";
$arrAct["edit_thema"]["desc"]="Thema Editieren";
$arrAct["edit_thema"]["2"]="edit_thema2";
$arrAct[$arrAct["edit_thema"]["2"]]["incFile"]="edit_thema_2.php";
$arrAct[$arrAct["edit_thema"]["2"]]["menu"]="edit_thema";
$arrAct["neu_link"]["incFile"]="neu_link.php";
$arrAct["neu_link"]["menu"]="neu_link";
$arrAct["neu_link"]["desc"]="Links einfügen";
$arrAct["neu_link"]["2"]="neu_link2";
$arrAct[$arrAct["neu_link"]["2"]]["incFile"]="neu_link_2.php";
$arrAct[$arrAct["neu_link"]["2"]]["menu"]="neu_link";
$arrAct["neu_bild"]["incFile"]="neu_bild.php";
$arrAct["neu_bild"]["menu"]="neu_bild";
$arrAct["neu_bild"]["desc"]="Bilder einfügen";
$arrAct["neu_bild"]["2"]="neu_bild2";
$arrAct[$arrAct["neu_bild"]["2"]]["incFile"]="neu_bild_2.php";
$arrAct[$arrAct["neu_bild"]["2"]]["menu"]="neu_bild";
$arrAct["neu_album"]["incFile"]="neu_album.php";
$arrAct["neu_album"]["menu"]="neu_album";
$arrAct["neu_album"]["desc"]="Neues Album";
$arrAct["neu_album"]["2"]="neu_album2";
$arrAct[$arrAct["neu_album"]["2"]]["incFile"]="neu_album_2.php";
$arrAct[$arrAct["neu_album"]["2"]]["menu"]="neu_album";
$arrAct["neu_host"]["incFile"]="neu_host.php";
$arrAct["neu_host"]["menu"]="neu_host";
$arrAct["neu_host"]["desc"]="Host hinzufügen";
$arrAct["neu_host"]["2"]="neu_host2";
$arrAct[$arrAct["neu_host"]["2"]]["incFile"]="neu_host_2.php";
$arrAct[$arrAct["neu_host"]["2"]]["menu"]="neu_host";
$arrAct["assoc_ha"]["incFile"]="assoc_host_alias.php";
$arrAct["assoc_ha"]["menu"]="assoc_ha";
$arrAct["assoc_ha"]["desc"]="HostAlias hinzufügen";
$arrAct["assoc_ha"]["2"]="assoc_ha2";
$arrAct[$arrAct["assoc_ha"]["2"]]["incFile"]="assoc_host_alias_2.php";
$arrAct[$arrAct["assoc_ha"]["2"]]["menu"]="assoc_ha";
$arrAct["neu_thema"]["incFile"]="neu_thema.php";
$arrAct["neu_thema"]["menu"]="neu_thema";
$arrAct["neu_thema"]["desc"]="Neues Thema";
$arrAct["neu_thema"]["2"]="neu_thema2";
$arrAct[$arrAct["neu_thema"]["2"]]["incFile"]="neu_thema_2.php";
$arrAct[$arrAct["neu_thema"]["2"]]["menu"]="neu_thema";

$arrAct["assoc_tb"]["incFile"]="assoc_thema_beitraege.php";
$arrAct["assoc_tb"]["menu"]="assoc_tb";
$arrAct["assoc_tb"]["desc"]="Verknüpfung von Beitrag und Themen bearbeiten";
$arrAct["assoc_tb"]["2"]="assoc_tb2";
$arrAct[$arrAct["assoc_tb"]["2"]]["incFile"]="assoc_thema_beitraege_2.php";
$arrAct[$arrAct["assoc_tb"]["2"]]["menu"]="assoc_tb";
$arrAct["assoc_ht"]["incFile"]="assoc_host_themen.php";
$arrAct["assoc_ht"]["menu"]="assoc_ht";
$arrAct["assoc_ht"]["desc"]="Verknüpfung von Thema und Hosts bearbeiten";
$arrAct["assoc_ht"]["2"]="assoc_ht2";
$arrAct[$arrAct["assoc_ht"]["2"]]["incFile"]="assoc_host_themen_2.php";
$arrAct[$arrAct["assoc_ht"]["2"]]["menu"]="assoc_ht";

$arrAct["assoc_ab"]["incFile"]="assoc_album_bilder.php";
$arrAct["assoc_ab"]["menu"]="assoc_ab";
$arrAct["assoc_ab"]["desc"]="Album mit Bildern verknüpfen";
$arrAct["assoc_ab"]["2"]="assoc_ab2";
$arrAct[$arrAct["assoc_ab"]["2"]]["incFile"]="assoc_album_bilder_2.php";
$arrAct[$arrAct["assoc_ab"]["2"]]["menu"]="assoc_ab";
$arrAct[$arrAct["assoc_ab"]["2"]]["2"]="assoc_ab";

$arrAct["disassoc_ab"]["incFile"]="disassoc_album_bilder.php";
$arrAct["disassoc_ab"]["menu"]="disassoc_ab";
$arrAct["disassoc_ab"]["desc"]="Verknüpfung von Album und Bildern aufheben";
$arrAct["disassoc_ab"]["2"]="disassoc_ab2";
$arrAct[$arrAct["disassoc_ab"]["2"]]["incFile"]="disassoc_album_bilder_2.php";
$arrAct[$arrAct["disassoc_ab"]["2"]]["menu"]="disassoc_ab";
$arrAct["neu_beitrag"]["incFile"]="neu_beitrag.php";
$arrAct["neu_beitrag"]["menu"]="neu_beitrag";
$arrAct["neu_beitrag"]["desc"]="Neuer Beitrag";
$arrAct["neu_beitrag"]["2"]="neu_beitrag2";
$arrAct[$arrAct["neu_beitrag"]["2"]]["incFile"]="neu_beitrag_2.php";
$arrAct[$arrAct["neu_beitrag"]["2"]]["menu"]="neu_beitrag";
$arrAct["edit_link"]["incFile"]="neu_link.php";
$arrAct["edit_link"]["menu"]="edit_link";
$arrAct["edit_link"]["desc"]="Links editieren";
$arrAct["edit_link"]["2"]="edit_link2";
$arrAct[$arrAct["edit_link"]["2"]]["incFile"]="edit_link_2.php";
$arrAct[$arrAct["edit_link"]["2"]]["menu"]="edit_link";
$arrAct["edit_bild"]["incFile"]="neu_bild.php";
$arrAct["edit_bild"]["menu"]="edit_bild";
$arrAct["edit_bild"]["desc"]="Bilder editieren";
$arrAct["edit_bild"]["2"]="edit_bild2";
$arrAct[$arrAct["edit_bild"]["2"]]["incFile"]="edit_bild.php";
$arrAct[$arrAct["edit_bild"]["2"]]["menu"]="edit_bild";

$arrAct["neu_bild_ftp"]["incFile"]="neu_bild_ftp.php";
$arrAct["neu_bild_ftp"]["menu"]="neu_bild_ftp";
$arrAct["neu_bild_ftp"]["desc"]="Bild POSTen, auf FTP laden und einfügen";
$arrAct["neu_bild_ftp"]["2"]="neu_bild_ftp2";
$arrAct[$arrAct["neu_bild_ftp"]["2"]]["incFile"]="neu_bild_ftp_2.php";
$arrAct[$arrAct["neu_bild_ftp"]["2"]]["menu"]="neu_bild_ftp";
$arrAct[$arrAct["neu_bild_ftp"]["2"]]["2"]="neu_bild_ftp3";
$arrAct[$arrAct[$arrAct["neu_bild_ftp"]["2"]]["2"]]["incFile"]="neu_bild_ftp_3.php";
$arrAct[$arrAct[$arrAct["neu_bild_ftp"]["2"]]["2"]]["menu"]="neu_bild_ftp";

$arrAct["neu_bild_dir"]["incFile"]="neu_bild_dir.php";
$arrAct["neu_bild_dir"]["menu"]="neu_bild_dir";
$arrAct["neu_bild_dir"]["desc"]="Bilder einfügen, die schon auf Server liegen";
$arrAct["neu_bild_dir"]["2"]="neu_bild_dir2";
$arrAct[$arrAct["neu_bild_dir"]["2"]]["incFile"]="neu_bild_dir_2.php";
$arrAct[$arrAct["neu_bild_dir"]["2"]]["menu"]="neu_bild_dir";
$arrAct[$arrAct["neu_bild_dir"]["2"]]["2"]="neu_bild_dir";

$arrAct["order_ht"]["incFile"]="order_host_themen.php";
$arrAct["order_ht"]["menu"]="order_ht";
$arrAct["order_ht"]["desc"]="Reihenfolge der Themen des Hosts bearbeiten";
$arrAct["order_ht"]["2"]="order_ht2";
$arrAct[$arrAct["order_ht"]["2"]]["incFile"]="order_host_themen_2.php";
$arrAct[$arrAct["order_ht"]["2"]]["menu"]="order_ht";

$arrAct["order_tb"]["incFile"]="order_thema_beitraege.php";
$arrAct["order_tb"]["menu"]="order_tb";
$arrAct["order_tb"]["desc"]="Reihenfolge der Beiträge des Themas bearbeiten";
$arrAct["order_tb"]["2"]="order_tb2";
$arrAct[$arrAct["order_tb"]["2"]]["incFile"]="order_thema_beitraege_2.php";
$arrAct[$arrAct["order_tb"]["2"]]["menu"]="order_tb";

$arrAct["order_bl"]["incFile"]="order_beitrag_links.php";
$arrAct["order_bl"]["menu"]="order_bl";
$arrAct["order_bl"]["desc"]="Reihenfolge der Links des Beitrags bearbeiten";
$arrAct["order_bl"]["2"]="order_bl2";
$arrAct[$arrAct["order_bl"]["2"]]["incFile"]="order_beitrag_links_2.php";
$arrAct[$arrAct["order_bl"]["2"]]["menu"]="order_bl";

$arrAct["order_bb"]["incFile"]="order_beitrag_bilder.php";
$arrAct["order_bb"]["menu"]="order_bb";
$arrAct["order_bb"]["desc"]="Reihenfolge der Bilder des Beitrags bearbeiten";
$arrAct["order_bb"]["2"]="order_bb2";
$arrAct[$arrAct["order_bb"]["2"]]["incFile"]="order_beitrag_bilder_2.php";
$arrAct[$arrAct["order_bb"]["2"]]["menu"]="order_bb";

//ksort($arrAct);

require("data/list_subdirs.php");

$arrGET=Array();

$allowedGETVars["tid"]=true;
$allowedGETVars["aid"]=true;
$allowedGETVars["bid"]=true;
$allowedGETVars["hid"]=true;
$allowedGETVars["dir"]=true;
$allowedGETVars["action"]=true;
$allowedGETVars[session_name()]=true;

foreach($_GET as $getkey => $getVal) {
    addGET($getkey, $getVal);
}

if(isset($arrAct[$act]["2"])) addGET("action", $arrAct[$act]["2"]);

if(isset($arrAct[$act]["incFile"])) require($DATAdir.$arrAct[$act]["incFile"]);

if(isset($_SESSION["imgdirslisted"]))
    $imgdirslisted=$_SESSION["imgdirslisted"];
else
    $imgdirslisted=false;

if(!$imgdirslisted) {
    $_SESSION["img_subdirs"]=Array();
    getDirList($imgStartDir);
    $_SESSION["imgdirslisted"]=true;
}

$GETString="?";

if(isset($arrGET)) {
    ksort($arrGET);
    foreach($arrGET as $GETKey => $GETVar) {
        $GETString.=$GETKey."=".$GETVar."&";
    }
}

require($DATAdir."menu.php");

echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>\n" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<meta http-equiv="Content-Language" content="de" />
<meta name="keywords"
    content="bernhard,doebler,döbler,gotha,99867" />
<meta name="DESCRIPTION"
    content="Bardware.de" />
<meta name="ROBOTS" content="index,all,follow" />
<meta name="revisit-after" content="10 days" />
<link href="/styles.css" type="text/css" rel="stylesheet" />
<title>BardCMSAdmin V1</title>
</head>
<body>

<table border="0">
<tr>
<td width="35%"><? require($SHOWdir."menu.php"); ?></td>
<td>
<? if(isset($arrAct[$act]["incFile"])) require($SHOWdir.$arrAct[$act]["incFile"]);?>
</td>
</tr>
</table>

</body>
</html>
<? mysql_close($link); ?>
