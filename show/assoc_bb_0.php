<?php //SHOW
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: GET
FILENAME: assoc_beitrag_bilder.php
FILETYPE: INCLUDE
*/

if(!empty($arrBild)) { ?>
Bilder, die nicht mir Beitrag: <?php echo $Head;?> verkn�pft sind:<br />
<?php 
$arrRepl=Array();
$arrRepl["action"]=$arrGETaction[0];
if($arrGETaction[1]+1<=$arrActMax[$arrGETaction[0]])
$arrRepl["action"].=','.($arrGETaction[1]+1);
$arrRepl['MorePicturesAvailable']=$MorePicturesAvailable;
$arrRepl['seite']=($GETseite+1);
?>
<form action="admin.php<?php echo mkGETString($arrRepl);?>" method="post">
<?php foreach($arrBild as $Bild) { ?>
<input type="checkbox" name="bid[]" value="<?php echo $Bild["bid"];?>" /><?php echo $Bild["datei"];?><br />
<img src="<?php echo $Bild["datei"];?>" width="<?php echo $Bild["breite"];?>" height="<?php echo $Bild["hoehe"];?>" alt="<?php echo htmlspecialchars($Bild["text"]);?>"/><br />
<?php } ?>
<input type="submit" />
</form>
<div class="center-fixed"><?php 
$arrRepl=Array();
$arrRepl["action"]=$arrGETaction[0].','.$arrGETaction[1];

if($GETseite>1) {
	$arrRepl["seite"]=(1);
	echo '<a href="admin.php'.mkGETString($arrRepl).'" title="First"><<</a> '; 
	$arrRepl["seite"]=($GETseite-1);
	echo '<a href="admin.php'.mkGETString($arrRepl).'" title="Prev"><-</a> ';
} else {
	echo "&nbsp;&nbsp; &nbsp;&nbsp; ";
}

if($MorePicturesAvailable) {
	$arrRepl["seite"]=($GETseite+1);
	echo '<a href="admin.php'.mkGETString($arrRepl).'" title="Next">-></a> ';
	$arrRepl["seite"]="last";
	echo '<a href="admin.php'.mkGETString($arrRepl).'" title="Last">>></a>';
} else {
	echo "&nbsp;&nbsp; &nbsp;&nbsp; ";
}
?>
</div><?php 

} ?>
