<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "../PHPMailer/src/PHPMailer.php";
require_once "../PHPMailer/src/SMTP.php";
require_once "../PHPMailer/src/Exception.php";
include_once("../connect.php");
$time = time();
$enq_id = substr(strval(rand($time, 10000)), 0, 5);
$enq_name = mysqli_real_escape_string($conn, $_POST['enq_name']);
$enq_email = mysqli_real_escape_string($conn, $_POST['enq_email']);
$enq_cno = mysqli_real_escape_string($conn, $_POST['enq_cno']);
// echo $fname . " " . $lname . " " . $c_country . " " . $mobile . " " . $gender . " " . $dob;
// $sqlGeneralSettings = "UPDATE per_details SET fname={$_POST['fname']}, lname={$_POST['lname']} WHERE id={$_SESSION['unique_id']}";
// $resultGeneralSetting = mysqli_query($conn, $sqlGeneralSettings);
// $rowGeneralSetting = mysqli_fetch_assoc($resultGeneralSetting);
// $queryGeneralSetting = "UPDATE per_details (fname, lname) VALUES(?, ?)";
// $queryGeneralSetting = "INSERT INTO enquiry (enq_id, enq_name, enq_email) VALUES (enq_id=?, enq_name=?, enq_email=?)";
// $stmtGeneralSetting = $conn->prepare($queryGeneralSetting);
// $stmtGeneralSetting->bind_param("sss", $enq_id, $enq_name, $enq_email);
// $insert_query = $stmtGeneralSetting->execute();
$insert_query = mysqli_query($conn, "INSERT INTO enquiry (enq_id, enq_name, enq_email, enq_cno) VALUES ('{$enq_id}','{$enq_name}','{$enq_email}','{$enq_cno}')");

if ($insert_query) {
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

  $mail->addAddress($enq_email, $enq_name);

  $mail->isHTML(true);

  $mail->Subject = "Akshadaa Site Enquiry";

  $mail->Body = nl2br("Your Details For Enquiry Are Submitted Successfully, We Will Reach Out To You Soon!");

  $mail->send();
}

echo 'Response: ' . mysqli_error($conn);
