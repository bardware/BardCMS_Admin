<?php //DATA
/*
BardCMS (c) 2003, 2004, 2005, 2006, 2009 by Bardware - Programmer@Bardware.de

REQUESTMETHOD:
FILENAME:
FILETYPE: INCLUDE
*/

needPOSTvar("bid");
needPOSTvar("text");
needPOSTvar("ftext");
needPOSTvar("alben");

foreach($POSTbid as $BildID) {
	if(isset($POSTtext[$BildID]))
		$Text=myAddSlashes($POSTtext[$BildID]);
	else
		$Text="";
	
	if(isset($POSTftext[$BildID]))
		$FText=myAddSlashes($POSTftext[$BildID]);
	else
		$FText="";

	$Abfrage="UPDATE ged_bilder set text='".$Text."', langtext='".$FText."' where bid=".$BildID;
//	echo $Abfrage."<br>\n";
	mysqli_query($conn, $Abfrage);
	if(isset($POSTalben[$BildID])) {
		foreach($POSTalben[$BildID] as $POSTalbum) {
			$Abfrage="INSERT INTO ged_alben_bilder(aid, bid) values(".$POSTalbum.", ".$BildID.")";
//			echo $Abfrage."<br>\n";
			mysqli_query($conn, $Abfrage);
		}
	}
}
?>
