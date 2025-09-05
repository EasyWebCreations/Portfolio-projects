<?php
    session_start();
    include_once "conn.php";

    $sender = $_SESSION['unique_id'];
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $minAge = mysqli_real_escape_string($conn, $_POST['minAge']);
    $maxAge = mysqli_real_escape_string($conn, $_POST['maxAge']);
    $height = mysqli_real_escape_string($conn, $_POST['height']);
    $qualification = mysqli_real_escape_string($conn, $_POST['qualification']);
    $worktype = mysqli_real_escape_string($conn, $_POST['worktype']);
    $salary = mysqli_real_escape_string($conn, $_POST['salary']);
    $language = mysqli_real_escape_string($conn, $_POST['language']);
    $gotra1 = mysqli_real_escape_string($conn, $_POST['gotra1']);
    $gotra2 = mysqli_real_escape_string($conn, $_POST['gotra2']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    //$output = $sender;
    $sql = "SELECT * FROM per_details WHERE (NOT id = {$sender})";
   
    if ($gender != "") {
       $sql = $sql." AND (gender = '{$gender}')";
    }
   
    if ($minAge != "" && $maxAge != "") {
        $sql = $sql." AND ( age > {$minAge}  AND age < {$maxAge} )";
    }
   
    if($height !=""){
        $sql = $sql." AND ( height> {$height}-30 AND height < {$height}+30 )";
    }
   
    if ($qualification != "") {
        $sql = $sql." AND (degree = '{$qualification}')";
     }
    
    if ($worktype != "") {
        $sql = $sql." AND (occupation = '{$worktype}')";
     }
    
    if ($salary != "") {
        $sql = $sql." AND (income = {$salary})";
     }
    
    if ($language != "") {
        $sql = $sql." AND (language = '{$language}')";
     }
    
    if ($gotra1 != "") {
        $sql = $sql." AND (gotra1 = '{$gotra1}')";
     }
    
    if ($gotra2 != "") {
        $sql = $sql." AND (gotra2 = '{$gotra2}')";
     }
    
    if ($state != "") {
        $sql = $sql." AND (c_state = '{$state}')";
     }
    
    if ($city != "") {
        $sql = $sql." AND (c_district = '{$city}')";
     }
    
     $sql = $sql . "AND approval_status = 'approved' AND id != '11111'";
    $output = "";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "filterdata.php";
    }else{
        $output .= 'No user found related to your search :(';
    }
    echo $output;
