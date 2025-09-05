<?php
	include 'connectDB.php';
	$siteID=$_POST['siteId'];
	$siteName=$_POST['siteName'];
	$sql = "INSERT INTO `sites`( `SITE_ID`, `SITE_NAME`) 
	VALUES ('$siteID','$siteName')";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>