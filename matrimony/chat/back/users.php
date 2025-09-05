<?php
    session_start();
    include_once "conn.php";
    $sender = $_SESSION['unique_id'];
    $gendersql = "SELECT gender FROM per_details WHERE id = {$sender}";
    $genderquery = mysqli_query($conn, $gendersql);
    $genderrow = mysqli_fetch_assoc($genderquery);
    
    //echo $genderrow['gender'];
    $sql = "SELECT * FROM per_details WHERE (NOT id = {$sender} AND NOT gender = '{$genderrow['gender']}') AND approval_status = 'approved' AND id != '11111'";
    $query = mysqli_query($conn, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "userdata.php";
    }
    echo $output;
?>