<?php

session_start();
include_once "conn.php";

$viewedTo = $_SESSION['unique_id'];

$sql = "SELECT DISTINCT viewed_by, viewed_to  FROM views WHERE ( viewed_to = {$viewedTo})";
$output = "";
$query = mysqli_query($conn, $sql);
if(mysqli_num_rows($query) > 0){
    include_once "visitordata.php";
}else{
    $output .= 'No user viewed your profile :(';
}
echo $output;

?>