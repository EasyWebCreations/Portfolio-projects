<?php

include_once "connect.php";
$paymentmethod = mysqli_real_escape_string($conn, $_POST['paymentmethod']);
$updatequery = "UPDATE `admin` SET `payment_method` = '{$paymentmethod}' WHERE `id` = '11111'";
$runquery = mysqli_query($conn, $updatequery);

if($runquery){
    echo "updated payment method and set to: ". $paymentmethod;
    header("refresh:1 ; url= index.php");
}else{
    echo "Error";
    header("refresh:1 ; url= index.php");
}

?>