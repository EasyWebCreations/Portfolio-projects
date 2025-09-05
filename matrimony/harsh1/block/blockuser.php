<?php

session_start();
include_once "conn.php";

$blocker = $_SESSION['unique_id'];
$blockTo = mysqli_real_escape_string($conn, $_POST['blockTo']);
$blockreason = mysqli_real_escape_string($conn, $_POST['blockreason']);

$sql = "INSERT INTO block_user (blocked_by, blocked_to, block_reason) VALUES ({$blocker},{$blockTo},'{$blockreason}')";

$query=mysqli_query($conn, $sql);

if($query){
    echo "You block user successfully!";
    header("refresh:1;url= ../index1.php");
}else{
    echo "Please try again!";
}

?>