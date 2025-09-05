<?php


include_once 'conn.php';

use PHPMailer\PHPMailer\PHPMailer;
use SMTP\SMTP\SMTP;
use Exception\Exception\Exception;

require_once "PHPMailer/src/PHPMailer.php";
require_once "PHPMailer/src/SMTP.php";
require_once "PHPMailer/src/Exception.php";

    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $txnid = mysqli_real_escape_string($conn, $_POST['txnId']);
    $plan = mysqli_real_escape_string($conn, $_POST['plan']);
    $currentDate = new DateTime();
    $datetime = $currentDate->format('d/m/Y h:i a');
    if($plan == "classic"){
        $validity = date('d M Y',strtotime(date('Y-m-d', time()) . ' + 1 days'));
    }else{
        $validity = date('d M Y',strtotime(date('Y-m-d', time()) . ' + 2 days'));
    }
    // $insert_query = "UPDATE per_details SET `payment_transation`='{$txnid}' WHERE `id` = '{$id}'";
    $insert_query = "UPDATE per_details SET `payment_transation`='{$txnid}', `date_of_payment`='{$datetime}',`planName`='{$plan}', `Validity`='{$validity}' WHERE `id` = '{$id}'";
    $runQuery = mysqli_query($conn, $insert_query);

    $userQuery = "SELECT * FROM per_details where id = '{$id}'";
    $runuserQuery = mysqli_query($conn, $userQuery);
    $row = mysqli_fetch_assoc($runuserQuery);

    $adminEmail = 'akshadaasite@gmail.com';

    $linktoApprove = 'https://akshadaa.herokuapp.com/harsh1/adminPanel/approvalBack/approve.php?email='.$row['email'].'&id='.$id;
    if($runQuery){

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

        $mail->addAddress($adminEmail, 'New User' . " " . 'Added');

        $mail->isHTML(true);

        $mail->Subject = "Akshadaa Registration";

        $mail->Body = nl2br("Hey!\r\nA new user has been registered to akshadaa site whose further details are: \r\n Name: ".$row['fname']." ".$row['lname']."\r\nEmail Id: " . $row['email'] . "\r\nMobile No: " . $row['mobile'] . "\r\nPlan: " . $row['planName'] . "\r\nPayment Txn Id: " . $row['payment_transation'] . "\r\nDate of payment: " . $row['date_of_payment'] . "\r\nYou can approve new user by clicking link below: " ."\r\n".$linktoApprove);

        $mail->send();

        header("refresh:0;url= txnsuccess.html");
    }else{
        echo "Please try again!";
    }
?>