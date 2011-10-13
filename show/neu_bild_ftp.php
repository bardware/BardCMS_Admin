<?php //SHOW 
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD:
FILENAME:
FILETYPE: INCLUDE
*/
?>
<form method="post" action="<?php echo $GETString;?>" ENCTYPE="multipart/form-data">
<table border="0">
<tr>
<td>Pfad:</td>
<td><select name="dir" class="klein"><?php 
foreach($_SESSION["img_subdirs"] as $imgDir) { ?>
<option value="<?php echo $imgDir;?>"<?php if($imgDir==$GETdir) echo ' selected="selected"';?>><?php echo $imgDir;?></option>
<?php } ?>
</select></td>
</tr><tr>
<td>Unterpfad:</td>
<td><input type="text" name="subdir" class="klein" /></td>
</tr><tr>
<td>Datei 1:</td>
<td><input type="file" name="datei[]" class="klein" /></td>
</tr><tr>
<td>Datei 2:</td>
<td><input type="file" name="datei[]" class="klein" /></td>
</tr><tr>
<td>Datei 3:</td>
<td><input type="file" name="datei[]" class="klein" /></td>
</tr><tr>
<td>Datei 4:</td>
<td><input type="file" name="datei[]" class="klein" /></td>
</tr><tr>
<td>Datei 5:</td>
<td><input type="file" name="datei[]" class="klein" /></td>
</tr>
</table>
<input type="hidden" name="randstring" value="<?php echo $_SESSION["randstring"];?>">
<input type="submit" />
</form>
