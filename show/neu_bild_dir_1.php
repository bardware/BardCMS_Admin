<?php //SHOW
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD:
FILENAME:
FILETYPE: INCLUDE
*/

if(count($_SESSION[$GewDir])>0) { ?>
<a href="admin.php<?php echo $GETString;?>">admin.php<?php echo str_replace("&", "&amp;", $GETString)?></a>
<?php } ?>
