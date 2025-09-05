<?php
  session_start();
  include_once "connect.php";


  if(isset($_POST['register'])){
    $in_otp = $_POST['inotp'];
   
    
    if($in_otp == $_COOKIE['otp']){
      //echo "Success!";
      $_SESSION['mobile'] = $_COOKIE['mobile'];
      header("refresh:0; url = ../code/register.html");

    }else{
      echo "Otp didn't matched!";
      header("refresh:2; url= ../index.php");
    }
  }else{
    echo "something went wrong!";
    header("refresh:2; url = ../index.php");
  }
    
 /*   if($in_otp != $_COOKIE['otp']){
      $mobileno = $_COOKIE['mobile'];
      $insert_query = mysqli_query($conn, "INSERT INTO per_details (id, mobile)
      VALUES ('{$ran_id}','{$mobileno}')");
if($insert_query){
echo "Thank You! Your data inserted successfully!";
$select_sql2 = mysqli_query($conn, "SELECT * FROM per_details WHERE mobile = '{$mobileno}'");
if(mysqli_num_rows($select_sql2) > 0){
    $result = mysqli_fetch_assoc($select_sql2);
    $_SESSION['id'] = $result['id'];
header("location: ../code/register.html");
}
else{
echo "Failed to insert Data!"; 
header("refresh:1;url= ../index.php");
    }
  }else{
    echo'<script type="text/JavaScript"> 
    alert("Kindly enter valid OTP!);
    </script>';
  }
}else {
  echo "Enter valid OTP!";
}
  }*/

?>