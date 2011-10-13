<?php //SHOW 
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD:
FILENAME: neu_bild_dir_0.php
FILETYPE: INCLUDE
*/

?>
<div id="grauer" style="z-Index:99;background-image:url(/img/div_back.gif);background-repeat:repeat;width:1000px;height:1000px;left:0px;top:0px;position:fixed;display:none;"></div>

<div id="inp" style="display:none;z-Index:100;position:fixed;width:480px;top:0px;left:0px;border:1px solid black;background-color:#d8d0c8;padding:10px;">
	<table border="0" cellspacing="0" cellpadding="0" style="width:100%;">
	<tr><td><div style="float:left;overflow:hidden;width:90%;white-space:nowrap;"><a href="" id="linker" class="head">vkjh</a></div><div style="text-align:right;float:right;"><span style="font-family:Arial,sans-serif;font-size:1em;font-weight:900;text-decoration:overline;cursor:pointer;padding:2px;border:1px solid black;" onMouseOver="this.style.textDecoration='overline underline';" onMouseOut="this.style.textDecoration='overline';" onClick="closer();">x</span></div></td></tr>
	<tr><td><img src="/img/div_back.gif" id="vollbild" style="border:1px solid black;margin-top:10px;width:0px;height:0px"></td></tr>
	<tr><td colspan="2"><textarea id="kommentar" style="width:100%;font-family:'Courier New', monospace, fixed;font-size:1em;margin-top:10px;border:1px solid black;">jhcmfjhn</textarea></td></tr>
	<tr><td colspan="2"><input type="checkbox" name="chknokommentar" id="chknokommentar"><label for="chknokommentar" style="font-family:'Courier New', monospace, fixed;font-size:1em;">No Comment</label><input type="checkbox" name="chkindb" id="chkindb" readonly="readonly"><label for="chkindb" style="font-family:'Courier New', monospace, fixed;font-size:1em;">In DB</label></td></tr>
	<tr><td colspan="2"><input type="button" id="btnsaver" style="width:100%;font-family:'Courier New', monospace, fixed;font-size:1em;margin-top:10px;" onclick="save();" value="Save"></td></tr>
	</table>
</div>
<!--- load the wddx.js file --->
<script type="text/javascript" src="wddx.js"></script>
<script language="JavaScript">

document.onmouseup=up;
arrBilder=new Array();
var aktid='';

function objRequest() {
	if (window.XMLHttpRequest) {
		this.XMLHttp = new XMLHttpRequest();
	} else if (window.ActiveXObject && !(navigator.userAgent.indexOf('Mac') >= 0 && navigator.userAgent.indexOf('MSIE') >= 0)) {
		this.XMLHttp = new window.ActiveXObject('Microsoft.XMLHTTP');
	}

	this.postparams='';
	this.postlocation='';
}

function objComboParams() {
	this.name='';
	this.kommentar='';
	this.nocomment=false;
	this.pfad='';
	this.datei='';
	this.breit='';
	this.hoch='';
	this.updates='';
}

function request(req) {

	try {
		req.XMLHttp.abort();
	} catch(e) {}

	wddxSerializer = new WddxSerializer();
	strwddxPacket = wddxSerializer.serialize(req.postparams);

	req.XMLHttp.onreadystatechange = function() { stateChange(req); }
	var Jetzt = new Date();
	req.XMLHttp.open('POST', req.postlocation + '&' + Date.parse(Jetzt.toGMTString()), true);
	req.XMLHttp.setRequestHeader('Content-Type', 'text/xml');
	req.XMLHttp.send(strwddxPacket);
}

function stateChange(req) {
	if(req.XMLHttp.readyState==4) {
		if(req.XMLHttp.status==200) {
			strresp=new String(req.XMLHttp.responseText);
			var werte = strresp.split(',');
			arrBilder[werte[0]]['updates']=werte[4].length==0?null:werte[4];
			arrBilder[werte[0]]['kommentar']=arrReq.postparams.kommentar;
			arrBilder[werte[0]]['nocomment']=arrReq.postparams.nocomment;
			if(werte[5]==0) {
				document.getElementById(werte[0]+'_indb').src='/img/gruen_an.gif';
				arrBilder[werte[0]]['indb']=true;
			} else {
				document.getElementById(werte[0]+'_indb').src='/img/rot_an.gif';
				arrBilder[werte[0]]['indb']=false;
			}
			if(arrReq.postparams.nocomment==false) {
				document.getElementById(werte[0]+'_nocomment').src='/img/gruen_an.gif';
				document.getElementById(werte[0]+'_nocomment').title='Kommentiert';
			}
		}
	}
}

arrReq=new objRequest();
arrReq.postparams=new objComboParams();
arrReq.postparams.name='';
arrReq.postparams.kommentar='';
arrReq.postlocation='http://bardcms/dumper.php?<?php echo session_name();?>=<?php echo session_id();?>';

function up(e) {
 eventObj=(window.event)?  window.event.srcElement : e.target;
 evt=(window.event)?  window.event : e;

	if(eventObj.tagName=='IMG' && eventObj.name=='foto') {
		BildNrX=Math.ceil(eval(evt.clientX+document.body.scrollLeft-document.getElementById('fototab').offsetLeft)/140);
		BildNrY=Math.ceil(eval(evt.clientY+document.body.scrollTop-document.getElementById('fototab').offsetTop)/140);

		if(typeof(document.getElementById(aktid))=='object' && document.getElementById(aktid)!=null) {
			document.getElementById(aktid).style.border='';
			document.getElementById(aktid).parentNode.style.backgroundColor='';
		}
		document.getElementById(eventObj.id).parentNode.style.backgroundColor='#d8d0c8';
		aktid=eventObj.id;
		document.getElementById('vollbild').src='<?php echo $imgBildURL;?>'+arrBilder[eventObj.id]['pfad']+arrBilder[eventObj.id]['datei'];
		document.getElementById('vollbild').style.width=arrBilder[eventObj.id]['breit']+'px';
		document.getElementById('vollbild').style.height=arrBilder[eventObj.id]['hoch']+'px';
		document.getElementById('inp').style.width=arrBilder[eventObj.id]['breit']+'px';
		document.getElementById('linker').href='<?php echo $imgBildURL;?>'+arrBilder[eventObj.id]['pfad']+arrBilder[eventObj.id]['datei'];
		document.getElementById('linker').firstChild.nodeValue = document.getElementById('linker').href;
		document.getElementById('linker').title = document.getElementById('linker').href;
		if(typeof(arrBilder[aktid]['kommentar'])!='undefined') {
			document.getElementById('kommentar').value=arrBilder[aktid]['kommentar'];
		} else {
			document.getElementById('kommentar').value='';
		}
		document.getElementById('chknokommentar').checked=arrBilder[eventObj.id]['nocomment'];
		document.getElementById('chkindb').checked=arrBilder[eventObj.id]['indb'];
		document.getElementById('grauer').style.zIndex=99;
//		document.getElementById('grauer').style.position='absolute';
		document.getElementById('grauer').style.display='block';
		document.getElementById('grauer').style.width=document.body.scrollWidth+'px';
		document.getElementById('grauer').style.height=document.body.scrollHeight+'px';
		document.getElementById('inp').style.zIndex=100;
		document.getElementById('inp').style.display='block';
//		document.getElementById('inp').style.position='absolute';
		document.getElementById('inp').style.left=eval((document.body.clientWidth-480)/2)+'px';
		document.getElementById('inp').style.top='30px';
//		alert(document.getElementById('inp').style.left);
//		alert(document.getElementById('inp').style.top);
//		document.getElementById('inp').style.left='0px';
//		document.getElementById('inp').style.top='0px';
	} else if(eventObj.tagName=='IMG' && eventObj.name=='led') {
		Ergebnis = eventObj.id.match(/^(.*\.jpg)_indb/i);

		if (Ergebnis) {
			if(Ergebnis.length>=2) {
				arrReq.postparams.kommentar='';
				arrReq.postparams.nocomment=true;
				arrReq.postparams.pfad=arrBilder[Ergebnis[1]]['pfad'];
				arrReq.postparams.datei=arrBilder[Ergebnis[1]]['datei'];
				arrReq.postparams.breit=arrBilder[Ergebnis[1]]['breit'];
				arrReq.postparams.hoch=arrBilder[Ergebnis[1]]['hoch'];
				arrReq.postparams.updates=null;
				request(arrReq);
			}
		}
	} else if (eventObj.tagName=='INPUT' && eventObj.id=='btnsaver') {
		arrReq.postparams.kommentar=document.getElementById('kommentar').value;
		arrReq.postparams.nocomment=document.getElementById('chknokommentar').checked;
		arrReq.postparams.pfad=arrBilder[aktid]['pfad'];
		arrReq.postparams.datei=arrBilder[aktid]['datei'];
		arrReq.postparams.breit=arrBilder[aktid]['breit'];
		arrReq.postparams.hoch=arrBilder[aktid]['hoch'];
		arrReq.postparams.updates=arrBilder[aktid]['updates'];
 		request(arrReq);
		closer();
	}
}

function closer() {
	document.getElementById('inp').style.display='none';
	document.getElementById('grauer').style.display='none';
	document.getElementById('vollbild').src='/img/div_back.gif';
}

function save() {
	closer();
}

<?php foreach($arrBilderPHP as $Key => $Val) { ?>
	arrBilder['<?php echo $Key;?>']=new Array();
	<?php foreach($Val as $ValKey => $ValVal) { ?>
		arrBilder['<?php echo $Key;?>']['<?php echo $ValKey;?>']=<?php 
			if(is_bool($ValVal)) {
				if($ValVal) {
					echo 'true';
				} else {
					echo 'false';
				}
			} else if($ValVal==null) {
				echo 'null';
			} else {
				echo "'".$ValVal."'";
			}
			?>;
	<?php } ?>
<?php } ?>
</script>
<style type="text/css">
.head { text-decoration:none; color:#000000; background-color:#d8d0c8; font-family:Arial,sans-serif; font-weight:bold; font-size:11pt; }
a.head:link { text-decoration:underline; color:#000000; background-color:#d8d0c8; font-family:Arial,sans-serif; font-weight:bold; font-size:11pt; }
a.head:visited { text-decoration:underline; color:#000000; background-color:#d8d0c8; font-family:Arial,sans-serif; font-weight:bold; font-size:11pt; }
a.head:hover { text-decoration:none; color:#000000; background-color:#d8d0c8; font-family:Arial,sans-serif; font-weight:bold; font-size:11pt; }
</style>

<table border="0" id="fototab" cellpadding="0" cellspacing="0" style="border:1px solid black;">
<?php 
$zaehl=0;

foreach($arrBilderPHP as $Key => $Val) {

	if($zaehl==0) {
		?><tr><?php 
	}
	
	if($Val['breit']>$Val['hoch']) {
		$NeuBreite=$TNSize;
	   	$NeuHoehe=$Val['hoch'] * ($NeuBreite / $Val['breit']);
  	} else {
   		$NeuHoehe=$TNSize;
   		$NeuBreite=$Val['breit'] * ($NeuHoehe / $Val['hoch']);
  	}

	$zaehl++;
	?><td style="text-align:center;padding:10px;border:1px;border:1px solid black;"><table border="0" cellpading="0" cellspacing="0"><tr><td style="height:<?php echo $NeuHoehe;?>px;width:<?php echo $NeuBreite;?>px;text-align:center;" colspan="2"><img src="JPG.php?file=<?php echo $GETdir."/".$Key;?>" name="foto" id="<?php echo $Key;?>" style="height:<?php echo $NeuHoehe;?>px;width:<?php echo $NeuBreite;?>px;" border="1"></td><?php echo "\n";?>
	</tr><tr><td style="text-align:center;"><img src="/img/<?php echo $Val['indb']?'gruen':'rot';?>_an.gif" id="<?php echo $Key;?>_indb" alt="led" title="<?php echo $Val['indb']?'in DB':'';?>" name="led" width="16" height="16"></td><td style="text-align:center;"><img src="/img/<?php echo $Val['nocomment']?'rot':'gruen';?>_an.gif" id="<?php echo $Key;?>_nocomment" alt="led" title="<?php echo $Val['nocomment']?'No Comment':'Kommentiert';?>" name="led" width="16" height="16"></td></tr></table></td><?php 

	if($zaehl==$GETnebeneinander) {
		?></tr><?php 
		$zaehl=0;
	}

}

while($zaehl<$GETnebeneinander and $zaehl>0) {
	?><td>&nbsp;</td><?php 
	if($zaehl==$GETnebeneinander) {
		?><tr><?php 
	}
	$zaehl++;
}
?>
</tr>
</table>