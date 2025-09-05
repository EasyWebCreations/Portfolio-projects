<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "PHPMailer/src/PHPMailer.php";
require_once "PHPMailer/src/SMTP.php";
require_once "PHPMailer/src/Exception.php";

include_once 'connect.php';
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $txnid = mysqli_real_escape_string($conn, $_POST['txnId']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $number = mysqli_real_escape_string($conn, $_POST['contactnumber']);
    // $insert_query = "UPDATE per_details SET `payment_transation`='{$txnid}' WHERE `id` = '{$id}'";
    $plan = "success";
    $insert_query = "UPDATE `users` SET `transactionId`='{$txnid}',`payment_Status`='{$plan}' WHERE `email` = '{$email}' AND `contactnumber` = '{$number}'";
    $runQuery = mysqli_query($conn, $insert_query);

    $fetchQuery = "SELECT `id` FROM users WHERE (`email` = '{$email}')";
    $runquery = mysqli_query($conn, $fetchQuery);
    $row = mysqli_fetch_assoc($runquery);
    
    if($runQuery){
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

        $mail->addAddress($email, $firstname);

        $mail->isHTML(true);

        $mail->Subject = "Akshadaa Event Registration Confirmation";

        $mail->Body = nl2br("This mail contains sensitive information!\r\nYour registration for Akshadaa Event is confirmed\r\n" . "\r\n Registration ID: " . $row['id']);

        $mail->send();
        header("refresh:1;url= index.php");
    }else{
        echo "Please try again!";
    }
?>