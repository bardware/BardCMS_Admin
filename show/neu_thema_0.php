<?php //SHOW
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD: GET
FILENAME: neu_thema_0.php
FILETYPE: INCLUDE
*/

$arrRepl=Array("action" => $arrGETaction[0].",".($arrGETaction[1]+1));?>
<form action="admin.php<?php echo mkGETString($arrRepl);?>" method="post">
<div class="formblock">
<label for="hoststel"><?php echo $txtneuthema["host"];?>:</label><div id="selto" class="enterdata" style="border: 1px solid black;height:8em;overflow:scroll;"></div><br />
<label for="hoststel"></label>
<div id="selfrom" class="enterdata" style="border: 1px solid black;height:4em;overflow:scroll;">
	<div class="listitem" ondblclick="movediv(this);" pos="1">a</div>
	<div class="listitem" ondblclick="movediv(this);" pos="2">b</div>
	<div class="listitem" ondblclick="movediv(this);" pos="3">c</div>
</div><br />


<label for="neuthema"><?php echo $txtneuthema["thematitel"];?>:</label><input type="text" name="neuthema" id="neuthema" class="enterdata" value="" /><br />
<label for="beschr"><?php echo $txtneuthema["beschr"];?>:</label><textarea name="beschr" id="beschr" cols="60" rows="6" wrap="virtual" class="enterdata"></textarea><br />
<input type="submit" class="enterbutton" value="Eintragen" />
</div>
</form>

<script language="JavaScript">

function movediv(obj) {
	
	aktobjpos=obj.getAttribute('pos');
	
	if(obj.parentNode.id=='selfrom') {
		var andereliste=document.getElementById('selto');
	} else if(obj.parentNode.id=='selto') {
		var andereliste=document.getElementById('selfrom');
	}

	if(andereliste.hasChildNodes()) {

		for(zaehl=andereliste.childNodes.length-1;zaehl>=0;zaehl--) {
 	 		if(andereliste.childNodes[zaehl].nodeType==3) {
		 		andereliste.removeChild(andereliste.childNodes[zaehl]);
	 		}			
		}

		bFound=false;
		var listitem=andereliste.firstChild;
	 	if(listitem!=null) {
		 	while(!bFound) {

		 		if(listitem.getAttribute('pos')<aktobjpos) {
			 		listitem=listitem.nextSibling;
			 		if(listitem==null) {
			 			bFound=true;
			 		}
			 	} else {
			 		bFound=true;
			 	}	
		 	}
	 	}
	 	if(listitem!=null) {
	 		andereliste.insertBefore(obj, listitem);
	 	} else {
	 		andereliste.appendChild(obj);
	 	}
	} else {
		andereliste.appendChild(obj);
	}

}
</script>



<?php /* ?><label for="hid"><?php echo $txtneuthema["host"];?>:</label><?php require_once("inc/list_hosts_thema.php");?><br /><?php */ ?>
