<?php

session_start();
include_once "conn.php";

$coupon = mysqli_real_escape_string($conn, $_POST['coupon']);
$sql = "SELECT * FROM coupon WHERE code = '{$coupon}' LIMIT 1";
$query = mysqli_query($conn, $sql);
$output = "";

if(mysqli_num_rows($query) > 0){
    $row = mysqli_fetch_assoc($query);
    $output = '-₹'.$row['concession'] . '<input type="number" name="couponRate" value="'.$row['concession'].'" id="couponRate" hidden>';
    
}else{
    $output = "Invalid Coupon" . '<input type="number" name="couponRate" value="0" id="couponRate" hidden>';
}
echo $output;

?>