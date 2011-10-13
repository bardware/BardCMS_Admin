<?php 
require_once("data/start_session.php");
require("variables.inc.php");

$POSTERVar=wddx_deserialize(file_get_contents("php://input"));

$anz=false;
$datum=date("Y-m-d H:i:s");
$bid=false;
$updates='';
$del=1;

$conn=mysqli_connect($Host, $User, $PWD, $DB, $Port);
if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
}

if($stmt=mysqli_prepare($conn, "SELECT bid, del FROM ged_bilder WHERE pfad=? and datei=? order by datum desc")) {
  /* bind parameters for markers */
	mysqli_stmt_bind_param($stmt, "ss", $POSTERVar['pfad'], $POSTERVar['datei']);

	/* execute query */
	mysqli_stmt_execute($stmt);

	echo mysqli_stmt_error($stmt);
	/* bind result variables */

	  mysqli_stmt_bind_result($stmt, $bid, $del);

	/* fetch value */
	mysqli_stmt_fetch($stmt);
//	printf("Anz: ".$anz);

	/* close statement */
	mysqli_stmt_close($stmt);
} else {
	echo mysqli_error($conn);
}

if($bid!=0 and $POSTERVar['nocomment']==true) {

	if($del==1) {
		$del=0;
	} else {
		$del=1;
	}

	if($stmt=mysqli_prepare($conn, "UPDATE ged_bilder SET del=?, datum=? WHERE pfad=? AND datei=?")) {
	  /* bind parameters for markers */
		mysqli_stmt_bind_param($stmt, "isss", $del, $datum, $POSTERVar['pfad'], $POSTERVar['datei']);

		/* execute query */
		mysqli_stmt_execute($stmt);
		echo mysqli_stmt_error($stmt);
		/* close statement */
		mysqli_stmt_close($stmt);
	} else {
		echo mysqli_error($conn);
 	}

}

if($bid==0) {

	$del=0;
	if($stmt=mysqli_prepare($conn, "INSERT INTO ged_bilder (pfad, datei, breit, hoch, datum, del) VALUES (?, ?, ?, ? ,?, ?)")) {
	  /* bind parameters for markers */
		mysqli_stmt_bind_param($stmt, "ssiisi", $POSTERVar['pfad'], $POSTERVar['datei'], $POSTERVar['breit'], $POSTERVar['hoch'], $datum, $del);

		/* execute query */
		mysqli_stmt_execute($stmt);
		echo mysqli_stmt_error($stmt);
		/* close statement */
		mysqli_stmt_close($stmt);
	} else {
		echo mysqli_error($conn);
 	}
  	$bid=mysqli_insert_id($conn);

}

if($POSTERVar['nocomment']==false) {
	if($stmt=mysqli_prepare($conn, "INSERT INTO ged_kommentare (bid, datum, kommentar, updates) VALUES (?, ?, ?, ?)")) {
	  /* bind parameters for markers */
		mysqli_stmt_bind_param($stmt, "issi", $bid, $datum, $POSTERVar['kommentar'], $POSTERVar['updates']);

		/* execute query */
		mysqli_stmt_execute($stmt);
		echo mysqli_stmt_error($stmt);
		/* close statement */
		mysqli_stmt_close($stmt);
	} else {
		echo mysqli_error($conn);
 	}

 	$updates=mysqli_insert_id($conn);

 }

mysqli_close($conn);

echo $POSTERVar['datei'].",".$bid.",".$anz.",".$datum.",".$updates.",".$del;

?>