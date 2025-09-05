<?php

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "../../backend/PHPMailer/src/PHPMailer.php";
require_once "../../backend/PHPMailer/src/SMTP.php";
require_once "../../backend/PHPMailer/src/Exception.php";

// if (isset($_SESSION['mobile'])) {
include_once('../../backend/connect.php');
// $mobileno = $_SESSION['mobile'];
$time = time();
$ran_id = substr(strval(rand($time, 10000)), 0, 5);
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$mname = mysqli_real_escape_string($conn, $_POST['mname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$call = mysqli_real_escape_string($conn, $_POST['call']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);
$marital = mysqli_real_escape_string($conn, $_POST['marital']);
$mobileno = mysqli_real_escape_string($conn, $_POST['mobileno']);


if ($fname != null && $fname != '' && $mname != null && $mname != '' && $lname != null && $lname != '' && $call != null && $call != '' && $email != null && $email != '' && $mobileno != null && $mobileno != '') {

  // echo $ran_id . ' ' . $fname . ' ' . $mname . ' ' . $lname . ' ' . $call . ' ' . $mobileno . ' ' . $email . ' ' . $gender . ' ' . $marital;

  //     $sql = mysqli_query($conn, "UPDATE `per_details` SET `mobile`='{$mobileno}', `email`='{$email}',`fname`='{$fname}',`mname`='{$mname}',`lname`='{$lname}',`gender`='{$gender}',`martial_status`='{$marital}',`callno`='{$call}' WHERE `id` = '$user_id'") ;

  $insert_query = mysqli_query($conn, "INSERT INTO per_details (id,password,mobile,email,fname,mname,lname,gender,martial_status,callno)
                        VALUES ('{$ran_id}','{$ran_id}','{$mobileno}','{$email}','{$fname}','{$mname}','{$lname}','{$gender}','{$marital}','{$call}')");

  if ($insert_query) {
    echo "Registration successful!";

    $mail = new PHPMailer(true);

    $mail->SMTPDebug = 0;

    $mail->isSMTP();

    $mail->Host = "smtp.gmail.com";

    $mail->SMTPAuth = true;

    $mail->SMTPOptions = array(
      'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
      )
    );

    $mail->Username = "akshadaasite@gmail.com";
    $mail->Password = "AkshadaaSitePass@1";

    $mail->SMTPSecure = "tls";

    $mail->Port = 587;

    $mail->From = "akshadaasite@gmail.com";
    $mail->FromName = 'Akshadaa Site';

    $mail->addAddress($email, $fname . " " . $lname);

    $mail->isHTML(true);

    $mail->Subject = "Akshadaa Registration Confirmation";

    $mail->Body = nl2br("This mail contains sensitive information!\r\nYour registration for Akshadaa Site is confirmed\r\n" . "\r\nUserID: " . $ran_id . "\r\nPassword: " . $ran_id);

    $mail->send();

    header("refresh:2 ; url= adminPanel.php");
  } else {
    echo "Registration failed: " . mysqli_error($conn);
  }
} else {
  echo "Registration failed, Please Enter All Details!";
}
