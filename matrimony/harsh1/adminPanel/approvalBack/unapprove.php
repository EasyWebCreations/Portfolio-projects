<?php

session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "PHPMailer/src/PHPMailer.php";
require_once "PHPMailer/src/SMTP.php";
require_once "PHPMailer/src/Exception.php";


include_once "conn.php";

$email = mysqli_real_escape_string($conn , $_GET['email']);

$id = mysqli_real_escape_string($conn , $_GET['id']);

$approveQuery = "UPDATE per_details SET approval_status = 'unapproved' WHERE id = {$id}";

$query = mysqli_query($conn, $approveQuery);

if($query){
    echo "Account of has been unapproved!";
    header("refresh:1;url= ../adminPanel.php");

    
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

    $mail->addAddress($email);

    $mail->isHTML(true);

    $mail->Subject = "Account unapproved by admin panel";

    $mail->Body = nl2br("Sorry! your account has been unapproved by admin panel!\r\n" . "\rYou can re-register with appropriate data to use our website for sarching your life partner.");

    $mail->send();
}else{
    echo "There is problem occured, please try agian";
}


?>