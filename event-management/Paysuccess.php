<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "PHPMailer/src/PHPMailer.php";
require_once "PHPMailer/src/SMTP.php";
require_once "PHPMailer/src/Exception.php";

include_once "connect.php";
$status=$_POST["status"];
$firstname=$_POST["firstname"];
$lastname = $_POST['lastname'];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$phone = $_POST['phone'];
// echo $email;
// echo $productinfo;
$salt="l4BuaAiHdmeLWwVuSoY8ltxwZBLBashw";



// Salt should be same Post Request 

if(isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
  } else {
        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
         }
		 $hash = hash("sha512", $retHashSeq);
       if ($hash != $posted_hash) {
	       echo "Invalid Transaction. Please try again";
		   } else {

            $planstatus = 'success';
            $sql = "UPDATE `users` SET `payment_Status`='{$planstatus}' WHERE `email` = '{$email}'";
            $query = mysqli_query($conn, $sql);

            $fetchQuery = "SELECT * FROM users WHERE (`email` = '{$email}')";
            $runquery = mysqli_query($conn, $fetchQuery);
            $row = mysqli_fetch_assoc($runquery);
            if($query){
            echo "Payment successful! and You are registred for event!<br>";
            echo "Your registration id is: ". $row['anubandhaId'];

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

        $mail->addAddress($email, $firstname . " " . $lastname);

        $mail->isHTML(true);

        $mail->Subject = "Akshadaa Event Registration Confirmation";

        $mail->Body = nl2br("This mail contains sensitive information!\r\nYour registration for Akshadaa Event is confirmed\r\n" . "\r\n Registration ID: " . $row['anubandhaId']);

        $mail->send();

            // header("refresh:1;url= ../index1.php");
            }else{
             echo "Something went wrong! Please contact to admin!";
                }


          echo "<h3>Thank You. Your payment status is ". $status .".</h3>";
          echo "<h4>Your Transaction ID for this transaction is ".$txnid.".</h4>";
          echo "<h4>We have received a payment of Rs. " . $amount . ".</h4>";
		   }
?>	