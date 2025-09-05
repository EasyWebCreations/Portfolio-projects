<?php
session_start();
include_once("../../backend/connect.php");
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$blood = mysqli_real_escape_string($conn, $_POST['blood']);
$mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);
$dob = mysqli_real_escape_string($conn, $_POST['dob']);
// echo $fname . " " . $lname . " " . $c_country . " " . $mobile . " " . $gender . " " . $dob;
// $sqlGeneralSettings = "UPDATE per_details SET fname={$_POST['fname']}, lname={$_POST['lname']} WHERE id={$_SESSION['unique_id']}";
// $resultGeneralSetting = mysqli_query($conn, $sqlGeneralSettings);
// $rowGeneralSetting = mysqli_fetch_assoc($resultGeneralSetting);
// $queryGeneralSetting = "UPDATE per_details (fname, lname) VALUES(?, ?)";
$queryGeneralSetting = "UPDATE per_details SET fname=?, lname=?, blood=?, mobile=?, gender=?, dob=? WHERE id={$_SESSION['unique_id']}";
$stmtGeneralSetting = $conn->prepare($queryGeneralSetting);
$stmtGeneralSetting->bind_param("ssssss", $fname, $lname, $blood, $mobile, $gender, $dob);
$stmtGeneralSetting->execute();
