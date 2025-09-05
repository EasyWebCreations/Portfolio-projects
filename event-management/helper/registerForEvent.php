<?php
session_start();
include_once("../connect.php");

$time = time();
$ran_id = substr(strval(rand($time, 100000)), 0, 5);

$AkshadaaID = 'AKEV' . $ran_id;
$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
$middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$contactnumber = mysqli_real_escape_string($conn, $_POST['contactnumber']);
$whatsappnumber = mysqli_real_escape_string($conn, $_POST['whatsappnumber']);
$bloodgorup = mysqli_real_escape_string($conn, $_POST['bloodgorup']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);
$firstGotram = mysqli_real_escape_string($conn, $_POST['firstGotram']);
$secondGotram = mysqli_real_escape_string($conn, $_POST['secondGotram']);
$birthname = mysqli_real_escape_string($conn, $_POST['birthname']);
$dob = mysqli_real_escape_string($conn, $_POST['dob']);
$education = mysqli_real_escape_string($conn, $_POST['education']);
$profession = mysqli_real_escape_string($conn, $_POST['profession']);
$partnerEdu = mysqli_real_escape_string($conn, $_POST['partnerEdu']);
$partnerProf = mysqli_real_escape_string($conn, $_POST['partnerProf']);

$candidateNVD = mysqli_real_escape_string($conn, $_POST['candidateNVD']);
$NoParent = mysqli_real_escape_string($conn, $_POST['NoParent']);
$fParentName = mysqli_real_escape_string($conn, $_POST['fParentName']);
$fParentNVD = mysqli_real_escape_string($conn, $_POST['fParentNVD']);
$sParentName = mysqli_real_escape_string($conn, $_POST['sParentName']);
$sParentNVD = mysqli_real_escape_string($conn, $_POST['sParentNVD']);

$tParentName = mysqli_real_escape_string($conn, $_POST['tParentName']);
$tParentNVD = mysqli_real_escape_string($conn, $_POST['tParentNVD']);
$foParentName = mysqli_real_escape_string($conn, $_POST['foParentName']);
$foParentNVD = mysqli_real_escape_string($conn, $_POST['foParentNVD']);

$biodata = mysqli_real_escape_string($conn, $_POST['biodata']);
// echo $_POST['biodata'];
// $biodata = $_POST['biodata'];
$fParentVacCer = mysqli_real_escape_string($conn, $_POST['fParentVacCer']);
$sParentVacCer = mysqli_real_escape_string($conn, $_POST['sParentVacCer']);
$tParentVacCer = mysqli_real_escape_string($conn, $_POST['tParentVacCer']);
$foParentVacCer = mysqli_real_escape_string($conn, $_POST['foParentVacCer']);
$candidateVacCer = mysqli_real_escape_string($conn, $_POST['candidateVacCer']);
$candidateAmount = mysqli_real_escape_string($conn, $_POST['candidateAmount']);
$parentAmount = mysqli_real_escape_string($conn, $_POST['parentAmount']);

// $fname = mysqli_real_escape_string($conn, $_POST['fname']);
// $lname = mysqli_real_escape_string($conn, $_POST['lname']);
// $blood = mysqli_real_escape_string($conn, $_POST['blood']);
// $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
// $gender = mysqli_real_escape_string($conn, $_POST['gender']);
// $dob = mysqli_real_escape_string($conn, $_POST['dob']);
// echo $fname . " " . $lname . " " . $c_country . " " . $mobile . " " . $gender . " " . $dob;
// $sqlGeneralSettings = "UPDATE per_details SET fname={$_POST['fname']}, lname={$_POST['lname']} WHERE id={$_SESSION['unique_id']}";
// $resultGeneralSetting = mysqli_query($conn, $sqlGeneralSettings);
// $rowGeneralSetting = mysqli_fetch_assoc($resultGeneralSetting);
// $queryGeneralSetting = "UPDATE per_details (fname, lname) VALUES(?, ?)";
// $queryGeneralSetting = "UPDATE per_details SET fname=?, lname=?, blood=?, mobile=?, gender=?, dob=? WHERE id={$_SESSION['unique_id']}";
// $stmtGeneralSetting = $conn->prepare($queryGeneralSetting);
// $stmtGeneralSetting->bind_param("ssssss", $fname, $lname, $blood, $mobile, $gender, $dob);
// $stmtGeneralSetting->execute();

$insert_query = mysqli_query($conn, "INSERT INTO users (id,anubandhaId,firstGotram,secondGotram,firstname,middlename,lastname,permentantAddress,email,contactnumber,whatsappnumber,bloodgroup,gender,birthname,DOB,education,profession,partnerEdu,partnerExpect,candidateNVD,NoParent,fParentName,fParentNVD,sParentName,sParentNVD,tParentName,tParentNVD,foParentName,foParentNVD,biodata,fParentVacCer,sParentVacCer,tParentVacCer,foParentVacCer,candidateVacCer,candidateAmount,parentAmount) VALUES ('{$ran_id}','{$AkshadaaID}','{$firstGotram}','{$secondGotram}','{$firstname}','{$middlename}','{$lastname}','{$address}','{$email}','{$contactnumber}','{$whatsappnumber}','{$bloodgorup}','{$gender}','{$birthname}','{$dob}','{$education}','{$profession}','{$partnerEdu}','{$partnerProf}','{$candidateNVD}','{$NoParent}','{$fParentName}','{$fParentNVD}','{$sParentName}','{$sParentNVD}','{$tParentName}','{$tParentNVD}','{$foParentName}','{$foParentNVD}','{$biodata}','{$fParentVacCer}','{$sParentVacCer}','{$tParentVacCer}','{$foParentVacCer}','{$candidateVacCer}','{$candidateAmount}','{$parentAmount}')");

// $insert_query = mysqli_query($conn, "INSERT INTO users (anubandhaId,firstname) VALUES ('{$ran_id}','{$AkshadaaID}')");

// echo $biodata;
