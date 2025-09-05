<?php
include_once('../../connect.php');

$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$mname = mysqli_real_escape_string($conn, $_POST['mname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);

// $insert_query = mysqli_query($conn, "UPDATE price SET fPrice='{$fname}',sPrice='{$mname}',tPrice='{$lname}'");
$queryGeneralSetting = "UPDATE price SET fPrice=?, sPrice=?, tPrice=?";
$stmtGeneralSetting = $conn->prepare($queryGeneralSetting);
$stmtGeneralSetting->bind_param("sss", $fname, $mname, $lname);
$insert_query = $stmtGeneralSetting->execute();
if ($insert_query) {
  echo "Price Updated successfully! " . mysqli_error($conn);
} else {
  echo "Error Updating Price: " . mysqli_error($conn);
}
