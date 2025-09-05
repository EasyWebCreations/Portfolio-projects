<?php
include '../Add_Live_Records/wait.php';
include_once 'db.php';
include '../get_month.php';
if (isset($_POST['submit'])) {
	$FIRM = $_POST['FIRM'];
	$SITE_ID = $_POST['SITE_ID'];
	$EMP_NAME = $_POST['EMP_NAME'];
	$EMP_MOBILE	 = $_POST['EMP_MOBILE'];
	$EMP_ADDRESS = $_POST['EMP_ADDRESS'];
	$AADHAR = $_POST['AADHAR'];
	$PAN = $_POST['PAN'];

	$UAN_NO = $_POST['UAN_NO'];
	$ESIC_NO = $_POST['ESIC_NO'];
	$BANK_AC_NO = $_POST['BANK_AC_NO'];
	$IFSC_CODE = $_POST['IFSC_CODE'];
	$BNK_NAME = $_POST['BNK_NAME'];
	$BNK_ADDRESS = $_POST['BNK_ADDRESS'];

	$DESIGNATION = $_POST['DESIGNATION'];
	$CATEGORY = $_POST['CATEGORY'];
	$BASIC_SAL = $_POST['BASIC_SAL'];
	$HRA_SAL = $_POST['HRA_SAL'];
	$ALLOW = $_POST['SPL_ALLOW'];
	$ESIC_STATUS = $_POST["STATUS"];
	// $STATUS = $_POST['STATUS'];
	$month = get_current_month();
	$sql = "INSERT INTO emp_details
	(FIRM,SITE_ID,EMP_NAME,EMP_MOBILE,EMP_ADDRESS,AADHAR,PAN,
	UAN_NO,ESIC_NO,BANK_AC_NO,IFSC_CODE,BNK_NAME,BNK_ADDRESS,
	DESIGNATION,CATEGORY,BASIC_SAL,HRA_SAL,ALLOW,`STATUS`)
	VALUES
	('$FIRM','$SITE_ID','$EMP_NAME','$EMP_MOBILE','$EMP_ADDRESS','$AADHAR','$PAN',
	'$UAN_NO','$ESIC_NO','$BANK_AC_NO','$IFSC_CODE','$BNK_NAME','$BNK_ADDRESS',
	'$DESIGNATION','$CATEGORY','$BASIC_SAL','$HRA_SAL','$ALLOW','$ESIC_STATUS')";
	if (mysqli_query($conn, $sql)) {
		$queryForEmpId = "SELECT MAX(EMP_ID) from emp_details";
		$res_emp_id = mysqli_query($conn, $queryForEmpId);
		$row_emp_id = mysqli_fetch_assoc($res_emp_id);
		$EMP_ID =  $row_emp_id['MAX(EMP_ID)'];
		$sql2 = "INSERT INTO leaves(EMP_ID, SITE_ID,`MONTH`,C_OFF_AVAILABLE,E_LEAVE_AVAILABLE) VALUES ($EMP_ID,'$SITE_ID','$month',18,0)";
		mysqli_query($conn, $sql2);
		echo "<script src='../js/sweetalert.min.js'></script>
    <script>
    swal('Operation Completed','Employee Added Successfully','success');
    setTimeout(function()
    {
        window.location.href = 'add_employee.php';	
    }, 2000);
    </script>";
		// header('Location: add_monthly_records.php');
	} else {
		echo "<script src='../js/sweetalert.min.js'></script>
    <script>
    swal('Operation Failed','" . mysqli_error($conn) . "','error');
    setTimeout(function()
    {
        window.location.href = 'add_employee.php';
    }, 2000);
    </script>";
	} // header('Location: add_employee.php');

	mysqli_close($conn);
}