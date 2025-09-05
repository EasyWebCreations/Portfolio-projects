<?php
session_start();
include_once("../../backend/connect.php");
$complexion = mysqli_real_escape_string($conn, $_POST['complexion']);
$mother_tongue = mysqli_real_escape_string($conn, $_POST['mother_tongue']);
$brother_details = mysqli_real_escape_string($conn, $_POST['brother_details']);
$sister_details = mysqli_real_escape_string($conn, $_POST['sister_details']);

$age = mysqli_real_escape_string($conn, $_POST['age']);
$about_me = mysqli_real_escape_string($conn, $_POST['about_me']);
$education = mysqli_real_escape_string($conn, $_POST['education']);
$det_education = mysqli_real_escape_string($conn, $_POST['det_education']);
$det_occupation = mysqli_real_escape_string($conn, $_POST['det_occupation']);
$no_of_brothers = mysqli_real_escape_string($conn, $_POST['no_of_brothers']);
$no_of_sisters = mysqli_real_escape_string($conn, $_POST['no_of_sisters']);

$income = mysqli_real_escape_string($conn, $_POST['income']);
$occupation = mysqli_real_escape_string($conn, $_POST['occupation']);
$height = mysqli_real_escape_string($conn, $_POST['height']);
$c_country = mysqli_real_escape_string($conn, $_POST['c_country']);

$c_landmark = mysqli_real_escape_string($conn, $_POST['c_landmark']);
$c_locality = mysqli_real_escape_string($conn, $_POST['c_locality']);
$c_city = mysqli_real_escape_string($conn, $_POST['c_city']);
$c_district = mysqli_real_escape_string($conn, $_POST['c_district']);
$c_state = mysqli_real_escape_string($conn, $_POST['c_state']);
$c_pincode = mysqli_real_escape_string($conn, $_POST['c_pincode']);

$mother_name = mysqli_real_escape_string($conn, $_POST['mother_name']);
$mname = mysqli_real_escape_string($conn, $_POST['mname']);
$mother_occupation = mysqli_real_escape_string($conn, $_POST['mother_occupation']);
$father_occupation = mysqli_real_escape_string($conn, $_POST['father_occupation']);
$siblings = mysqli_real_escape_string($conn, $_POST['siblings']);
$family_income = mysqli_real_escape_string($conn, $_POST['family_income']);
$janma_tithi = mysqli_real_escape_string($conn, $_POST['janma_tithi']);
$zodiac = mysqli_real_escape_string($conn, $_POST['zodiac']);
$birth_time = mysqli_real_escape_string($conn, $_POST['birth_time']);
$gotra1 = mysqli_real_escape_string($conn, $_POST['gotra1']);
$gotra2 = mysqli_real_escape_string($conn, $_POST['gotra2']);
$birth_place = mysqli_real_escape_string($conn, $_POST['birth_place']);
$birth_name = mysqli_real_escape_string($conn, $_POST['birth_name']);

$queryProfileSetting = "UPDATE per_details SET complexion=?, mother_tongue=?, brother_details=?, sister_details=?, age=?, about_me=?, education=?, det_education=?, det_occupation=?, no_of_brothers=?, no_of_sisters=?, income=?, occupation=?, height=?, c_country=?, c_landmark=?, c_locality=?, c_city=?, c_district=?, c_state=?, c_pincode=?, mother_name=?, mname=?, mother_occupation=?, father_occupation=?, siblings=?, family_income=?, janma_tithi=?, zodiac=?, birth_time=?, gotra1=?, birth_place=?, birth_name=? WHERE id={$_SESSION['unique_id']}";
$stmtProfileSetting = $conn->prepare($queryProfileSetting);
$stmtProfileSetting->bind_param("sssssssssssssssssssssssssssssssss", $complexion, $mother_tongue, $brother_details, $sister_details, $age, $about_me, $education, $det_education, $det_occupation, $no_of_brothers, $no_of_sisters, $income, $occupation, $height, $c_country, $c_landmark, $c_locality, $c_city, $c_district, $c_state, $c_pincode, $mother_name, $mname, $mother_occupation, $father_occupation, $siblings, $family_income, $janma_tithi, $zodiac, $birth_time, $gotra1, $birth_place, $birth_name);
$stmtProfileSetting->execute();
// if ($detailsAdded) {
//   echo 'Details Added!';
// } else {
//   echo mysqli_error($conn);
// }
// echo $income . " " . $occupation . " " . $height . " " . $blood . " " . $mother_name . " " . $mname . " " . $mother_occupation . " " . $father_occupation . " " . $siblings . " " . $family_income . " " . $janma_tithi . " " . $zodiac . " " . $birth_time . " " . $gotra1 . " " . $birth_place . " " . $birth_name;
