<?php
	include 'connectDB.php';
	$siteID=$_POST['siteID'];
	$sql = "DELETE FROM `sites` WHERE  SITE_ID = '$siteID' ";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>