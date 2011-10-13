<?php //SHOW
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: POST
FILENAME: neu_bild_1.php
FILETYPE: INCLUDE
*/

needPOSTvar("url");

?>
<img src="<?php echo $imgBildURL;?><?php echo $POSTurl;?>" width="<?php echo $info[0];?>" height="<?php echo $info[1];?>">
