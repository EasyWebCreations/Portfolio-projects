<?php

session_start();
include_once "connect.php";

$mobile =  $_POST['mobile'];
  $otp = mt_rand(1000,9999);
  setcookie("mobile",$mobile);
  setcookie("otp",$otp);
  
	$username = "mahajansangmeshwar04@gmail.com";
	$hash = "9816f10a2f23c3373c05840811681b3c3e6858f7973f6aa9bdf5d6d7308b53a0";

	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "600010"; // This is who the message appears to be from.
	$numbers = $mobile; // A single number or a comma-seperated list of numbers
	$message = "Hi there, thank you for sending your first test message from Textlocal. Get 20% off today with our code: ". $otp.".";
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch);
  curl_close($ch);
  
?>