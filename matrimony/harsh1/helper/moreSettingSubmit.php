<?php
session_start();
include_once("../../backend/connect.php");
$pe_country = mysqli_real_escape_string($conn, $_POST['pe_country']);
$pe_state = mysqli_real_escape_string($conn, $_POST['pe_state']);
$pe_city = mysqli_real_escape_string($conn, $_POST['pe_city']);
$pe_education = mysqli_real_escape_string($conn, $_POST['pe_education']);
$pe_occupation = mysqli_real_escape_string($conn, $_POST['pe_occupation']);
$pe_income = mysqli_real_escape_string($conn, $_POST['pe_income']);
$pe_height = mysqli_real_escape_string($conn, $_POST['pe_height']);
$pe_age = mysqli_real_escape_string($conn, $_POST['pe_age']);

// echo $fname . " " . $lname . " " . $c_country . " " . $mobile . " " . $gender . " " . $dob;
// $sqlGeneralSettings = "UPDATE per_details SET fname={$_POST['fname']}, lname={$_POST['lname']} WHERE id={$_SESSION['unique_id']}";
// $resultGeneralSetting = mysqli_query($conn, $sqlGeneralSettings);
// $rowGeneralSetting = mysqli_fetch_assoc($resultGeneralSetting);
// $queryGeneralSetting = "UPDATE per_details (fname, lname) VALUES(?, ?)";
$queryGeneralSetting = "UPDATE per_details SET pe_country=?, pe_state=?, pe_city=?, pe_education=?, pe_occupation=?, pe_income=?, pe_age=?, pe_height=? WHERE id={$_SESSION['unique_id']}";
$stmtGeneralSetting = $conn->prepare($queryGeneralSetting);
$stmtGeneralSetting->bind_param("ssssssss", $pe_country, $pe_state, $pe_city, $pe_education, $pe_occupation, $pe_income, $pe_age, $pe_height);
$stmtGeneralSetting->execute();
