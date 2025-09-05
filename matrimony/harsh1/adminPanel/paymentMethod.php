<?php

include_once "conn.php";
$paymentmethod = mysqli_real_escape_string($conn, $_POST['paymentmethod']);
$updatequery = "UPDATE `per_details` SET `payment_transation` = '{$paymentmethod}' WHERE `id` = '11111'";
$runquery = mysqli_query($conn, $updatequery);

if($runquery){
    echo "updated payment method and set to: ". $paymentmethod;
    header("refresh:1 ; url= adminPanel.php");
}else{
    echo "Error";
    header("refresh:1 ; url= adminPanel.php");
}

?>