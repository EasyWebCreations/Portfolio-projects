<?php
include_once 'db.php';
if(isset($_POST['submit']))
{    
	$EMP_ID = $_POST['EMP_ID'];
	$SITE_ID = $_POST['SITE_ID'];
	$EMP_NAME = $_POST['EMP_NAME'];
	$EMP_MOBILE	 = $_POST['EMP_MOBILE'];
	$EMP_ADDRESS = $_POST['EMP_ADDRESS'];
	$AADHAR = $_POST['AADHAR'];


	$UAN_NO = $_POST['UAN_NO'];
	$ESIC_NO = $_POST['ESIC_NO'];
	$BANK_AC_NO = $_POST['BANK_AC_NO'];
	$IFSC_CODE = $_POST['IFSC_CODE'];
	$BNK_NAME = $_POST['BNK_NAME'];
	$BNK_ADDRESS	 = $_POST['BNK_ADDRESS'];


	$DESIGNATION = $_POST['DESIGNATION'];
	$CATEGORY = $_POST['CATEGORY'];
	$BASIC_SAL = $_POST['BASIC_SAL'];
	$HRA_SAL = $_POST['HRA_SAL'];
	$SPL_ALLOW = $_POST['SPL_ALLOW'];
     

$sql = "INSERT INTO emp_details

(EMP_ID,SITE_ID,EMP_NAME,EMP_MOBILE,EMP_ADDRESS,AADHAR,
UAN_NO,ESIC_NO,BANK_AC_NO,IFSC_CODE,BNK_NAME,BNK_ADDRESS,
DESIGNATION,CATEGORY,BASIC_SAL,HRA_SAL,SPL_ALLOW)
VALUES
('$EMP_ID','$SITE_ID','$EMP_NAME','$EMP_MOBILE','$EMP_ADDRESS','$AADHAR',
'$UAN_NO','$ESIC_NO','$BANK_AC_NO','$IFSC_CODE','$BNK_NAME','$BNK_ADDRESS',
'$DESIGNATION','$CATEGORY','$BASIC_SAL','$HRA_SAL','$SPL_ALLOW')";
     if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
}
?>
