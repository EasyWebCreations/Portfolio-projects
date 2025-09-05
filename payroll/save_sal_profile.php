<?php
	include 'connectDB.php';
	$sal_designation = $_POST["sal_designation"]; 
    $sal_basic_pay = $_POST["sal_basic_pay"]; 
    $sal_spl_pay = $_POST["sal_spl_pay"]; 
    $sal_hra = $_POST["sal_hra"]; 
    $sal_ctc = $_POST["sal_ctc"];
	$sql = "INSERT INTO `sal_profile`(`DESIGNATION`, `BASIC`, `SPL_PAY`, `HRA`, `CTC`) 
    VALUES ('$sal_designation',$sal_basic_pay,$sal_spl_pay,$sal_hra,$sal_ctc)";
    //echo alert('$sql');
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>