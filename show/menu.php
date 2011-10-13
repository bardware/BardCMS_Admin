<?php //SHOW
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: POST
REQUESTMETHOD: GET
FILENAME: menu.php
*/
?>
<form action="admin.php" method="get">
<span><?php echo $txtmenu["beitr"];?>:</span><br />
<select name="bid" style="width:28em;">
<?php foreach($Beitraege as $BeitraegeKey => $BeitraegeVal) { ?>
<option value="<?php echo $BeitraegeKey;?>"<?php if($BeitraegeKey==$GETbid) echo ' selected="selected"';?>><?php echo $BeitraegeVal["beitrag"];?></option>
<?php } ?>
</select><br />
<span><?php echo $txtmenu["themen"];?>:</span><br />
<select name="tid" style="width:28em;">
<?php foreach($Themen as $ThemenKey => $ThemenVal) { ?>
<option value="<?php echo $ThemenKey;?>"<?php if($ThemenKey==$GETtid) echo ' selected="selected"';?>><?php echo $ThemenVal["thema"];?></option>
<?php } ?>
</select><br />
<span>Hosts:</span><br />
<select name="hid" style="width:28em;">
<?php foreach($HostNamen as $HostNamenKey => $HostNamenVal) { ?>
<option value="<?php echo $HostNamenKey;?>"<?php if($HostNamenKey==$GEThid) echo ' selected="selected"';?>><?php echo $HostNamenVal["hostname"];?></option>
<?php } ?>
</select><br />
<span>Bilderalben:</span><br />
<select name="aid" style="width:28em;">
<?php foreach($Alben as $AlbenKey => $AlbenVal) { ?>
<option value="<?php echo $AlbenKey;?>"<?php if($AlbenKey==$GETaid) echo ' selected="selected"';?>><?php echo $AlbenVal["album"];?></option>
<?php } ?>
</select><br />

<span>Bildpfade:</span><br />
<select name="dir" style="width:20em;"><?php 
foreach($_SESSION["img_subdirs"] as $imgDir) { ?>
<option value="/<?php echo $imgDir;?>"<?php if("/".$imgDir."/"==$GETdir) echo ' selected="selected"';?>>/<?php echo $imgDir;?></option>
<?php } ?>
</select>
<select name="anz" style="width:7.7em;"><?php 
for($zaehl=0; $zaehl<=10; $zaehl++) { ?>
<option style="width:7em;" value="<?php echo $zaehl;?>"<?php if($zaehl==$PictPerPage) echo ' selected="selected"';?>><?php echo $zaehl;?></option>
<?php } ?>
</select><br />

<span>Action:</span><br />
<select name="action" style="width:28em;">
<?php foreach($Actions as $ActionsKey => $ActionsVal) { ?>
<option value="<?php echo $ActionsKey;?>"<?php echo IIF($ActionsKey==$arrGETaction[0], ' selected="selected"', '');?>><?php echo $txtmenu[$ActionsVal["link"]];?></option>
<?php } ?>
</select><br />

<?php if(""!=(session_id())) { ?>
<input type="hidden" name="<?php echo session_name();?>" value="<?php echo session_id();?>" />
<?php } ?>
<input type="submit" />
</form>
