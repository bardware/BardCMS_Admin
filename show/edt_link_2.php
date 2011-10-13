<?php //SHOW
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: POST
FILENAME: edit_link_2.php
FILETYPE: INCLUDE
*/

if(!empty($arrLink)) {
	foreach($arrLink as $arrLinkKey => $arrLinkVal) { ?>
		<a href="<?php echo $arrLinkVal["link"];?>" target="_blank"><?php echo IIF(!empty($arrLinkVal["text"]), $arrLinkVal["text"], $arrLinkVal["link"]);?></a><br />
<?php  }
} ?>