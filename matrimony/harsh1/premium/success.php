<!-- <?php
// session_start();
// include_once "conn.php";

// $user = $_SESSION['unique_id'];
// $plan_validity = $_COOKIE['Validity'];
// $plan_name = $_COOKIE['planName'];
// $amount = $_COOKIE['amount'];

// $planName_planAmount = 'Name: '. $plan_name . ' Rs: ' . $amount; 
// if(!empty($plan_validity) and !empty($planName_planAmount)){
// $status = 'active';
// $sql = "INSERT INTO per_details (planStatus, Validity, planName) VALUES ('{$status}', '{$plan_validity}' , '{$planName_planAmount}') WHERE id = {$user}";
// $query = mysqli_query($conn, $sql);

// if($query){
// echo "Payment successful! and plan activated";
// header("refresh:1;url= ../index1.php");
// }else{
//     echo "Something went wrong! Please contact to admin!";
// }
// }else{
//     echo "something went wrong!";
//}
?> -->

<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use SMTP\SMTP\SMTP;
use Exception\Exception\Exception;

require_once "../../backend/PHPMailer/src/PHPMailer.php";
require_once "../../backend/PHPMailer/src/SMTP.php";
require_once "../../backend/PHPMailer/src/Exception.php";

include_once "conn.php";
$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];

// echo $email;
// echo $productinfo;


$key = "FAdIOw";
$salt = "l4BuaAiHdmeLWwVuSoY8ltxwZBLBashw";



// Salt should be same Post Request 

if (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
  } else {
        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
         }
		 $hash = hash("sha512", $retHashSeq);
       if ($hash != $posted_hash) {
	       echo "Invalid Transaction. Please try again";
		   } else {

            $planstatus = 'active';
            $sql = "UPDATE `per_details` SET `planStatus`='{$planstatus}',`Validity`='{$productinfo}' WHERE `email` = '{$email}'";
            $query = mysqli_query($conn, $sql);
            
            $userSql = "SELECT `password` from `per_details` WHERE `email` = '{$email}'"; 
            $userQuery = mysqli_query($conn, $userSql);
            $userRow = mysqli_fetch_assoc($userQuery);
            if($query){

                  $mail = new PHPMailer(true);

                  $mail->SMTPDebug = 0;
          
                  $mail->isSMTP();
          
                  $mail->Host = "smtp.gmail.com";
          
                  $mail->SMTPAuth = true;
          
                  $mail->SMTPOptions = array(
                      'ssl' => array(
                          'verify_peer' => false,
                          'verify_peer_name' => false,
                          'allow_self_signed' => false,
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
          
                  $mail->Subject = "Akshadaa Registration";
          
                  $mail->Body = nl2br("This mail contains sensitive information!\r\nCongratulation!!\r\nYou are successfully registered to Akshadaa. Enter email id and password to login.\r\n" . "\r\nEmail ID: " . $email . "\r\nPassword: " .$userRow['password']);
          
                  $mail->send();

                  // $mail = new PHPMailer(true);

                  // $mail->SMTPDebug = 0;
          
                  // $mail->isSMTP();
          
                  // $mail->Host = "smtp.gmail.com";
          
                  // $mail->SMTPAuth = true;
          
                  // $mail->SMTPOptions = array(
                  //     'ssl' => array(
                  //         'verify_peer' => false,
                  //         'verify_peer_name' => false,
                  //         'allow_self_signed' => false,
                  //     )
                  // );
          
                  // $mail->Username = "akshadaasite@gmail.com";
                  // $mail->Password = "AkshadaaSitePass@1";
          
                  // $mail->SMTPSecure = "tls";
          
                  // $mail->Port = 587;
          
                  // $mail->From = "akshadaasite@gmail.com";
                  // $mail->FromName = 'Akshadaa Site';
          
                  // $mail->addAddress($email, $firstname);
          
                  // $mail->isHTML(true);
          
                  // $mail->Subject = "Akshadaa Registration confirmation!";
          
                  // $mail->Body = nl2br("This mail contains sensitive information!\r\nYour registration for Akshadaa Site is confirmed.\r\nYour payment is successful and your profile is activated.");
          
                  // $mail->send();
            echo "Payment successful! and plan activated";
            header("refresh:1;url= ../index1.php");
            }else{
             echo "Something went wrong! Please contact to admin!";
                }


          echo "<h3>Thank You. Your order status is ". $status .".</h3>";
          echo "<h4>Your Transaction ID for this transaction is ".$txnid.".</h4>";
          echo "<h4>We have received a payment of Rs. " . $amount . ".</h4>";
		   }
?>	