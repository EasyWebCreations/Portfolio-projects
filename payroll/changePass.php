<?php
	include 'connectDB.php';
	$confPass=$_POST['confPass'];
    $oldPass = $_POST['oldPass'];
	$sql = "UPDATE `users` SET `password`='$confPass' WHERE `username`='test' AND `password`='$oldPass';";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>